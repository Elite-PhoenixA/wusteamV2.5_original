<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'thanhdieu-installer-v2') {
    usleep(500000);
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $dbServer = trim($_POST['__ThanhDieuDbServer']);
    $dbName = trim($_POST['__ThanhDieuDbName']);
    $dbUser = trim($_POST['__ThanhDieuDbUser']);
    $dbPwd = trim($_POST['__ThanhDieuDbPwd']);
    $hovaten = trim($_POST['hovaten']);
    $taikhoan = trim($_POST['taikhoan']);
    $matkhau = password_hash($_POST['matkhau'], PASSWORD_BCRYPT, ['cost' => 7]);
    $quyenhan = $_POST['quyenhan'];
    $response = ['success' => false, 'message' => ''];
    try {
        $thanhdieudb = new mysqli($dbServer, $dbUser, $dbPwd);
        if ($thanhdieudb->connect_error) {
            throw new Exception('Kết nối thất bại: ' . $thanhdieudb->connect_error);
        }

        if ($thanhdieudb->select_db($dbName) === FALSE) {
            throw new Exception('Không thể chọn cơ sở dữ liệu: ' . $thanhdieudb->error);
        }

        $sql_file = $_SERVER['DOCUMENT_ROOT'] . '/install/wusteamv3.sql';
        if (file_exists($sql_file)) {
            $sql = file_get_contents($sql_file);
            $multi_query_result = $thanhdieudb->multi_query($sql);
            if (!$multi_query_result) {
                throw new Exception('Lỗi nhập dữ liệu SQL: ' . $thanhdieudb->error);
            }
            do {
                if ($result = $thanhdieudb->store_result()) {
                    $result->free();
                }
            } while ($thanhdieudb->next_result());

            $db_config = '<?php' . PHP_EOL .
                '$localhost_db = \'' . $dbServer . '\';' . PHP_EOL .
                '$username_db = \'' . $dbUser . '\';' . PHP_EOL .
                '$password_db = \'' . $dbPwd . '\';' . PHP_EOL .
                '$database_db = \'' . $dbName . '\';' . PHP_EOL;

            @file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/app/function/db.sql.php', $db_config);
            $thanhdieudb->set_charset("utf8mb4");
            $stmt = $thanhdieudb->prepare("INSERT INTO users (hovaten, username, password, rank) VALUES (?, ?, ?, ?)");

            $stmt->bind_param("ssss", $hovaten, $taikhoan, $matkhau, $quyenhan);
            if (!$stmt->execute()) {
                throw new Exception('Lỗi khi khi tạo tài khoản: ' . $stmt->error);
            }
            $stmt->close();
            $current_time = date("Y-m-d H:i:s");
            $secret_key = bin2hex(openssl_random_pseudo_bytes(12));
            $UpdateDeploys = $thanhdieudb->prepare("UPDATE ws_settings SET `deploy-date`= ?, `key-aes`=?");
            $UpdateDeploys->bind_param("ss", $current_time,$secret_key);
            if (!$UpdateDeploys->execute()) {
                throw new Exception('Lỗi khi cập nhật: ' . $UpdateDeploys->error);
            }
            $UpdateDeploys->close();
            if (!unlink($sqlFile)) {
                throw new Exception('Không thể xóa tệp wusteamv3.sql.');
            }
            if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/install.lock', 'thanhdieu') === false) {
                throw new Exception('Không thể tạo file install.lock.');
            }
            $response['success'] = true;
            $response['message'] = '<b>Cài đặt CSDL Hoàn Tất!</b><br>Tài Khoản: ' . $taikhoan . '<br>Mật Khẩu: ' . trim($_POST['matkhau']) . '';
        } else {
            throw new Exception('Không tìm thấy file sql WusTeamV3.sql ở mục /install/.');
        }
        $thanhdieudb->close();
    } catch (Exception $e) {
        $response['message'] = 'Thông tin kết nối không chính xác, vui lòng quay lại bước cấu hình CSDL.';
        // $response['message'] = $e->getMessage();
    }
    exit(json_encode($response));
}