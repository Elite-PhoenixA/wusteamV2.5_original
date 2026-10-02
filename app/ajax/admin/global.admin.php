<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')) {
    header('location: /');
}
// LOGIN ADMIN
class AdminLogin extends DatabaseConnection
{
    private $ip;

    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    public function login($username, $password)
    {
        global $TD;
        $username = strtolower(trim($username));
        $password = trim($password);

        if (empty($username) || empty($password)) {
            return json_encode(array("success" => false, "message" => "Không bỏ trống mục nào!"));
        }

        $vtd = self::ThanhDieuDB()->prepare("SELECT * FROM `users` WHERE `username`=?");
        $vtd->bind_param("s", $username);
        $vtd->execute();
        $OoO = $vtd->get_result();

        if ($OoO && $OoO->num_rows > 0) {
            $row = $OoO->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                if ($row['banned'] == 1) {
                    return json_encode(array("success" => false, "message" => "Tài khoản của bạn đã bị cấm!"));
                } else {
                    $rank = strtolower(trim($row['rank']));
                    if ($rank === 'admin' || $rank === 'partner') {
                        setcookie('taikhoan', encrypt($username, $TD->Setting('key-aes')), time() + (14 * 24 * 60 * 60), "/", "", true, true);
                        self::ThanhDieuDB()->query("UPDATE users SET ip='{$this->ip}' WHERE username='{$username}'");
                        setcookie('admin', encrypt($username, $TD->Setting('key-aes')), time() + (14 * 24 * 60 * 60), "/", "", true, true);
                        return json_encode(array("success" => true, "message" => "Đăng nhập thành công!"));
                    } else {
                        return json_encode(array("success" => false, "message" => "Bạn không có quyền truy cập!"));
                    }
                }
            } else {
                return json_encode(array("success" => false, "message" => "Tài khoản hoặc mật khẩu sai!"));
            }
        } else {
            return json_encode(array("success" => false, "message" => "Tài khoản hoặc mật khẩu sai!"));
        }
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'auth-admin-lg') {
    usleep(random_int(300000, 600000));
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo (new AdminLogin($ip))->login($username, $password);
}
if (isset($_POST['user_logout'])) {
    setcookie('taikhoan', '', time() - 3600, "/", "", true, true);
    setcookie('admin', '', time() - 3600, "/", "", true, true);
    echo json_encode(array("success" => true, "message" => "Đã đăng xuất thành công!"));
}
/**
 * @function: Cài Đặt Trang Webs
 * @role: Admin
 */
if (isset($_POST['ws-settings'])) {
    usleep(random_int(200000, 500000));
    CheckRankAndSession::TD($user, $taikhoan);
    $set_name = $_POST['site-name'];
    $set_author = $_POST['site-author'];
    $set_geetest = $_POST['site-geetest'];
    $set_loader = $_POST['site-loader'];
    $set_landing = $_POST['site-landing'];
    $set_footer = $_POST['site-footer'];
    $set_blacklist = $_POST['site-blacklist'];
    $vtd = $thanhdieudb->prepare("UPDATE `ws_settings` SET `name-site` = ?, `author` = ?, `key-geetest` = ?, `loader` = ?,`landing`=?, `footer` = ?, `black-ip` = ?");
    if ($vtd) {
        $vtd->bind_param("sssiiss", $set_name, $set_author, $set_geetest, $set_loader, $set_landing, $set_footer, $set_blacklist);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => true, "message" => "Thông tin đã được cập nhật!")));
        } else {
            exit(json_encode(array("success" => false, "message" => $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => false, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['modal'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $modal = $_POST['modal'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `is-modal` = ?")) {
        $vtd->bind_param("i", $modal);
        if ($vtd->execute()) {
            $message = $modal ? 'Đã hiện thông báo modal' : 'Đã ẩn thông báo modal';
            exit(json_encode(array("success" => true, "message" => $message)));
        } else {
            exit(json_encode(array("success" => false, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => false, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['clear_cache'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    // $newCache =($td = $thanhdieudb->query("SELECT `cache` FROM ws_settings LIMIT 1")) ? ((int) $td->fetch_assoc()['cache'] + 1) : 0;
    $newCache = rand(1, 10) . '.' . random_int(1, 20) . '.' . rand(1, 50);
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `cache` = ?")) {
        $vtd->bind_param("s", $newCache);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => true, "message" => 'Đã làm mới cache trên máy chủ!')));
        } else {
            exit(json_encode(array("success" => false, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => false, "message" => "Có lỗi khi làm mới cache.")));
    }
}
if (isset($_POST['action']) && $_POST['action'] === 'vtd-modal-system') {
    CheckRankAndSession::TD($user, $taikhoan);
    $content = $_POST['content'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `modal-content` = ?")) {
        $vtd->bind_param("s", $content);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => true, "message" => 'Đã cập nhật thông báo!')));
        } else {
            exit(json_encode(array("success" => false, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => false, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['ws-setting-info'])) {
    usleep(random_int(200000, 400000));
    CheckRankAndSession::TD($user, $taikhoan);
    $site_title = $_POST['site-title'];
    $site_desc = $_POST['site-desc'];
    $site_keywords = $_POST['site-keywords'];
    $site_logo = $_POST['site-logo'];
    $site_navbar_logo = $_POST['site-navbar-logo'];
    $site_images = $_POST['site-images'];
    $site_skin = $_POST['site-skin'];
    $site_facebook = $_POST['site-facebook'];
    $site_zalo = $_POST['site-zalo'];
    $site_telegram = $_POST['site-telegram'];
    $site_boxchat = $_POST['site-boxchat'];
    $site_ads = $_POST['site-ads'];
    $vtd = $thanhdieudb->prepare("UPDATE `ws_settings` SET `title` = ?, `description` = ?, `keywords` = ?, `logo` = ?,`navbar-logo` = ?, `og:image` = ?, `skin-theme` = ?,`facebook`=?,`zalo`=?,`telegram`=?,`boxchat`=?,`ads`=?");
    if ($vtd) {
        $vtd->bind_param("ssssssssssss", $site_title, $site_desc, $site_keywords, $site_logo, $site_navbar_logo, $site_images, $site_skin, $site_facebook, $site_zalo, $site_telegram, $site_boxchat, $site_ads);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => true, "message" => "Thông tin đã được cập nhật!")));
        } else {
            exit(json_encode(array("success" => false, "message" => $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => false, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['anti_spam'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $anti_spam = $_POST['anti_spam'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `anti-spam` = ?")) {
        $vtd->bind_param("i", $anti_spam);
        if ($vtd->execute()) {
            $message = $anti_spam ? 'Đã bật chế độ chống spam' : 'Đã tắt chế độ chống spam';
            exit(json_encode(array("success" => 1, "message" => $message)));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['footer_lite'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $footer_lite = $_POST['footer_lite'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `footer-lite` = ?")) {
        $vtd->bind_param("i", $footer_lite);
        if ($vtd->execute()) {
            $message = $footer_lite ? 'Đã bật hiện footer lite' : 'Đã tắt hiện footer lite';
            exit(json_encode(array("success" => 1, "message" => $message)));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['reset_key_aes'])) {
    usleep(random_int(1000000, 1200000));
    CheckRankAndSession::TD($user, $taikhoan);
    $key = bin2hex(openssl_random_pseudo_bytes(12));
    $vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `key-aes` = ?");
    if ($vtd) {
        $vtd->bind_param("s", $key);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => true, "message" => 'Đã làm mới lại mã hoá cấp cao!')));
        } else {
            exit(json_encode(array("success" => false, "message" => "Không thể làm mới mã hoá cấp cao.")));
        }
    } else {
        exit(json_encode(array("success" => false, "message" => "Có lỗi khi làm mới mã hoá cấp cao.")));
    }
}

if (isset($_POST['AdminPage'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $AdminPage = $_POST['AdminPage'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `admin-page` = ?")) {
        $vtd->bind_param("i", $AdminPage);
        if ($vtd->execute()) {
            $message = $AdminPage ? 'Đã bật ẩn trang login admin' : 'Đã tắt ẩn trang login admin';
            exit(json_encode(array("success" => 1, "message" => $message)));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['maintenance'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $maintenance = $_POST['maintenance'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `bao-tri` = ?")) {
        $vtd->bind_param("i", $maintenance);
        if ($vtd->execute()) {
            $message = $maintenance == 1 ? 'Đã kích hoạt trạng thái bảo trì' : 'Bạn đã tắt trạng thái bảo trì';
            exit(json_encode(array("success" => 1, "message" => $message)));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['fuckdevtools'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $fuckdevtools = $_POST['fuckdevtools'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `fuck-devtools` = ?")) {
        $vtd->bind_param("i", $fuckdevtools);
        if ($vtd->execute()) {
            $message = $fuckdevtools == 1 ? 'Đã kích hoạt anti-devtools' : 'Bạn đã tắt anti-devtools';
            exit(json_encode(array("success" => 1, "message" => $message)));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['https'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $https = $_POST['https'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `https` = ?")) {
        $vtd->bind_param("i", $https);
        if ($vtd->execute()) {
            $message = $https == 1 ? 'Đã bật giao thức HTTP và SSL' : 'Đã tắt giao thức HTTP và SSL';
            exit(json_encode(array("success" => 1, "message" => $message)));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
if (isset($_POST['limit_view'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $limit_view = $_POST['limit_view'];
    if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `view-limit` = ?")) {
        $vtd->bind_param("i", $limit_view);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => 1, "message" => 'Đã cập nhật giới hạn lượt xem.')));
        } else {
            exit(json_encode(array("success" => 0, "message" => "Thất bại: " . $vtd->error)));
        }
    } else {
        exit(json_encode(array("success" => 0, "message" => "Có lỗi khi cập nhật thông tin.")));
    }
}
/**
 * @function: Thay Đổi Ảnh Đại Diện
 * @role: All
 */
function FileUpload($action, $filePath, $column, $Msg, $user, $taikhoan, $thanhdieudb)
{
    if (SessionExpiredChecker::check($taikhoan, $user)) {
        $response = array("success" => 0, "message" => "Phiên đã hết hạn vui lòng đăng nhập lại.");
    } else {
        if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === UPLOAD_ERR_OK) {
            $file = $_FILES["avatar"];
            foreach (glob($filePath . $taikhoan . '_*') as $oldFilePath) {
                unlink($oldFilePath);
            }
            $target_img = $filePath . $taikhoan . '_n.' . WsRandomString::TD(20) . '.' . random_int(10000000, 999999999) . '.t.' . date('Y-m-d') . '&user_id=' . $user['user_id'] . '.' . pathinfo($file["name"], PATHINFO_EXTENSION);
            $extension = strtolower(pathinfo($target_img, PATHINFO_EXTENSION));

            if (!in_array($extension, array("jpg", "jpeg", "png", "gif", "webp"))) {
                $response = array("success" => 0, "Chỉ cho phép tải lên các tệp JPG, WEBP, PNG hoặc GIF.");
            } elseif ($file["size"] > 2097152) {
                $response = array("success" => 0, "Kích thước ảnh quá lớn hãy chọn ảnh dưới 2MB!");
            } elseif (move_uploaded_file($file["tmp_name"], $target_img)) {
                if ($thanhdieudb->query("UPDATE users SET $column='" . basename($target_img) . "' WHERE username='$taikhoan'")) {
                    $response = array("success" => 1, "message" => $Msg, "file_path" => $target_img);
                } else {
                    $response = array("success" => 0, "message" => "Có lỗi xảy ra khi cập nhật $column.");
                }
            } else {
                $response = array("success" => 0, "message" => "Có lỗi xảy ra khi tải ảnh lên.");
            }
        } else {
            $response = array("success" => 0, "message" => "Vui lòng chọn hình ảnh cần thay đổi avatar.");
        }
    }
    exit(json_encode($response));
}
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'admin_change_avatar':
            FileUpload(
                'admin_change_avatar',
                $_SERVER['DOCUMENT_ROOT'] . '/' . __IMG__ . '/users/',
                'avatar',
                'Đã thay đổi ảnh đại diện thành công!',
                $user,
                $taikhoan,
                $thanhdieudb
            );
            break;
    }
}
// Cộng Tiền
if (isset($_POST['CongTien'])) {
    CheckRankAndSession::TD($user, $taikhoan);
    $sotien = preg_replace('/[^0-9]/', '', trim($_POST["sotien"]));
    $taikhoan_users = mysqli_real_escape_string($thanhdieudb, $_POST["taikhoan"]);
    $display_username = ($taikhoan == $taikhoan_users) ? 'chính mình' : $taikhoan_users;
    if (!is_numeric($sotien)) {
        $TDTV = array('success' => 0, 'message' => "Số tiền phải là số, và có thể chứa dấu chấm!");
    } else {
        $ruby = CalculateRuby($sotien, $TD);
        $OoO = mysqli_query($thanhdieudb, "SELECT sodu,ruby FROM `users` WHERE `username`='$taikhoan_users'");
        if ($OoO && mysqli_num_rows($OoO) > 0) {
            $td = mysqli_fetch_assoc($OoO);
            $sodu_hientai = $td['sodu'];
            $sodu_moi = $sodu_hientai + $sotien;
            if (mysqli_query($thanhdieudb, "UPDATE `users` SET `sodu`= '$sodu_moi', `tongnap`=`tongnap` + '$sotien', `ruby`=`ruby` + '$ruby' WHERE `username`='$taikhoan_users'")) {
                $thanhdieudb->query("INSERT INTO `ws_logs` SET 
                `username`='$taikhoan', 
                `content`= 'đã cộng " . FormatNumber::TD($sotien) . "đ và thưởng $ruby điểm ruby vào tài khoản $display_username', 
                `time`='$time', 
                `action`='Cộng Tiền'");
                $thanhdieudb->query("INSERT INTO `ws_ruby` SET
                `username`='$taikhoan_users',
                `nhiemvu`='Nạp tiền vào tài khoản',
                `sodiem`= sodiem + $ruby,
                `sodiem_hientai`= " . $td['ruby'] . ",
                `thoigian`='$time'
             ");
                $thanhdieudb->query("INSERT INTO `ws_history_bank` SET `loai`='Admin Cộng Tay', `magiaodich`='WT" . random_int(1000000, 9999999) . "', `sotien`='" . preg_replace('/\D/', '', $sotien) . "', `noidung`='Nạp tiền vào tài khoản', `thoigian`='$time', `username`='$taikhoan_users',`trangthai`='thanhcong'");
                $TDTV = array('success' => 1, 'message' => "Đã cộng " . FormatNumber::TD($sotien) . "đ và thưởng $ruby điểm ruby cho tài khoản $display_username!");
            } else {
                $TDTV = array('success' => 0, 'message' => "Lỗi khi cập nhật thông tin!");
            }
        } else {
            $TDTV = array('success' => 0, 'message' => "Made by -> ThanhDieuTv");
        }
    }
    exit(json_encode($TDTV));
} elseif (isset($_POST['TruTien'])) {
    CheckRankAndSession::TD($user, $taikhoan);
    $sotien = preg_replace('/[^0-9]/', '', trim($_POST["sotien"]));
    $taikhoan_users = mysqli_real_escape_string($thanhdieudb, $_POST["taikhoan"]);
    $display_username = ($taikhoan == $taikhoan_users) ? 'chính mình' : $taikhoan_users;
    if (!is_numeric($sotien)) {
        $TDTV = array(
            'success' => 0,
            'message' => "Tổng Nạp hoặc Tổng Tiêu phải là số, và có thể chứa dấu chấm!"
        );
    } else {
        $rl = mysqli_query($thanhdieudb, "SELECT `sodu` FROM `users` WHERE `username`='$taikhoan'");
        if ($rl && mysqli_num_rows($rl) > 0) {
            $td = mysqli_fetch_assoc($rl);
            $sodu_hientai = $td['sodu'];
            $sodu_moi = $sodu_hientai - $sotien;
            if ($sodu_moi >= 0) {
                if (mysqli_query($thanhdieudb, "UPDATE `users` SET `sodu`= '$sodu_moi', `tongtieu`=`tongtieu` + '$sotien' WHERE `username`='$taikhoan_users'")) {
                    $sotien_format = (strpos($sotien, '.') === false) ? number_format($sotien, 0, ',', '.') : $sotien;
                    $thanhdieudb->query("INSERT INTO `ws_logs` SET `username`='$taikhoan', `content`='đã trừ " . FormatNumber::TD($sotien) . "đ khỏi tài khoản $display_username', `time`='$time', `action`='Trừ Tiền'");
                    $TDTV = array(
                        'success' => 1,
                        'message' => "Đã trừ " . FormatNumber::TD($sotien) . "đ khỏi tài khoản $display_username!"
                    );
                } else {
                    $TDTV = array('success' => 0, 'message' => "Lỗi khi thực hiện trừ tiền!");
                }
            } else {
                $TDTV = array('success' => 0, 'message' => "Số dư trong tài khoản này không đủ để thực hiện trừ tiền!");
            }
        } else {
            $TDTV = array('success' => 0, 'message' => "Made by -> ThanhDieuTv");
        }
    }
    exit(json_encode($TDTV));
}
// Cấm Và Mở Khoá Tài Khoản
if (isset($_POST['banned_users'])) {
    usleep(random_int(700000, 900000));
    CheckRankAndSession::TD($user, $taikhoan);
    $id = $_POST['id'];
    if ($user['user_id'] == $id) {
        exit(json_encode(['success' => false, 'message' => 'Không thể tự khoá bản thân']));
    }
    $vtd = $thanhdieudb->prepare("SELECT banned,username FROM users WHERE user_id = ?");
    $vtd->bind_param("i", $id);
    $vtd->execute();
    $vtd->bind_result($banned, $username);
    $vtd->fetch();
    $vtd->close();
    if ($banned !== null) {
        $new_status = $banned == 0 ? 1 : 0;
        $log_content = $new_status == 0 ? 'mở khoá' : 'đình chỉ';
        $action_content = $new_status == 0 ? 'Mở Khoá Tài Khoản' : 'Đình Chỉ Tài Khoản';
        $update = $thanhdieudb->prepare("UPDATE users SET banned = ? WHERE user_id = ?");
        $update->bind_param("ii", $new_status, $id);
        $thanhdieudb->query("INSERT INTO `ws_logs` SET `username`='$taikhoan', `content`='đã $log_content tài khoản $username', `time`='$time', `action`='$action_content'");
        exit(json_encode(['success' => $update->execute(), 'new_status' => $new_status]));
    } else {
        exit(json_encode(['success' => false, 'message' => 'Người dùng không tồn tại.']));
    }
}
// Xoá All Logs
if (isset($_POST['truncate_logs'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    if ($thanhdieudb->query("SELECT COUNT(*) FROM ws_logs")->fetch_row()[0] > 0) {
        if ($thanhdieudb->query("TRUNCATE TABLE ws_logs") === TRUE) {
            exit(json_encode(['success' => true, 'message' => 'Đã xóa tất cả nhật ký.']));
        } else {
            exit(json_encode(['success' => false, 'message' => 'Xóa nhật ký thất bại.']));
        }
    } else {
        exit(json_encode(['success' => false, 'message' => 'Không thể xoá vì chưa có dữ liệu.']));
    }
}
// Xoá All Ngân Hàng
if (isset($_POST['truncate_transfer'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    if ($thanhdieudb->query("SELECT COUNT(*) FROM ws_transfer")->fetch_row()[0] > 0) {
        if ($thanhdieudb->query("TRUNCATE TABLE ws_transfer") === TRUE) {
            exit(json_encode(['success' => true, 'message' => 'Đã xóa tất cả ngân hàng.']));
        } else {
            exit(json_encode(['success' => false, 'message' => 'Xóa ngân hàng thất bại.']));
        }
    } else {
        exit(json_encode(['success' => false, 'message' => 'Không thể xoá vì chưa có dữ liệu.']));
    }
}
// Thêm Ngân Hàng
if (isset($_POST['add-transfer-bank'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $nganhang = $_POST["ten-ngan-hang"];
    $logo = $_POST["logo-ngan-hang"];
    $chutaikhoan = $_POST["chu-tai-khoan"];
    $stk = $_POST["stk"];
    if (!filter_var($logo, FILTER_VALIDATE_URL) || pathinfo($logo, PATHINFO_EXTENSION) !== 'png') {
        exit(json_encode([
            'success' => false,
            'message' => "Logo phải là ảnh nền trong suốt<br/> và đuôi ảnh phải là .png!"
        ]));
    } elseif (($vtd = $thanhdieudb->prepare("SELECT 1 FROM ws_transfer WHERE stk = ?")) && $vtd->bind_param("s", $stk) && $vtd->execute() && $vtd->get_result()->num_rows > 0) {
        exit(json_encode([
            'success' => false,
            'message' => "Số tài khoản hoặc ngân hàng <br/>này đã tồn tại!"
        ]));
    } elseif (($vtd = $thanhdieudb->prepare("SELECT COUNT(*) as total FROM ws_transfer")) && $vtd->execute() && ($row = $vtd->get_result()->fetch_assoc()) && $row['total'] >= 2) {
        exit(json_encode(['success' => false, 'message' => "Đã đạt tối đa 2 ngân hàng!"]));
    } else {
        $vtd = $thanhdieudb->prepare("INSERT INTO ws_transfer (stk, chutaikhoan, nganhang, logo) VALUES (?, ?, ?, ?)");
        $vtd->bind_param("ssss", $stk, $chutaikhoan, $nganhang, $logo);

        if ($vtd->execute()) {
            exit(json_encode([
                'success' => true,
                'message' => "Thêm ngân hàng mới thành công!"
            ]));
        } else {
            exit(json_encode([
                'success' => false,
                'message' => "Không thể thêm ngân hàng chuyển khoản."
            ]));
        }
    }
}
// EDIT NGÂN HÀNG
if (isset($_POST['edit-transfer-bank'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $transfer_id = $_POST["transfer-id"];
    $nganhang = $_POST["ten-ngan-hang"];
    $logo = $_POST["logo-ngan-hang"];
    $qrcode = trim($_POST["qrcode"]) ?? null;
    $chutaikhoan = $_POST["chu-tai-khoan"];
    $stk = $_POST["stk"];
    if (!filter_var($logo, FILTER_VALIDATE_URL) || pathinfo($logo, PATHINFO_EXTENSION) !== 'png') {
        exit(json_encode([
            'success' => false,
            'message' => "Logo phải là ảnh nền trong suốt<br/> và đuôi ảnh phải là .png!"
        ]));
    } else {
        if ($vtd = $thanhdieudb->prepare("UPDATE ws_transfer SET `nganhang`=?, `logo`=?, `chutaikhoan`=?,`stk`=?,`qr-code`=? WHERE `transfer_id`='$transfer_id'")) {
            $vtd->bind_param("sssss", $nganhang, $logo, $chutaikhoan, $stk, $qrcode);
            if ($vtd->execute()) {
                exit(json_encode(array("success" => true, "message" => 'Thông tin đã được cập nhật.')));
            } else {
                exit(json_encode(array("success" => false, "message" => "Cập nhật thất bại: <br/>" . $vtd->error)));
            }
        } else {
            exit(json_encode(array("success" => false, "message" => "Có lỗi xảy ra khi cập nhật ngân hàng.")));
        }
    }
}
// CẬP NHẬT CALL BACK
if (isset($_POST['ws-setting-callback'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $cuphap = trim($_POST['cu-phap']);
    $minnap = preg_replace('/[^0-9]/', '', trim($_POST['min-nap']));
    $partner_id = trim($_POST['partner-id']);
    $partner_key = trim($_POST['partner-key']);
    if (strpos($cuphap, ' ') !== false) {
        exit(json_encode(array("success" => false, "message" => "Cú pháp không được chứa dấu cách.")));
    } else {
        if ($vtd = $thanhdieudb->prepare("UPDATE ws_settings SET `cuphap-transfer`=?, `min-transfer`=?, `partner-id`=?,`partner-key`=?")) {
            $vtd->bind_param("siis", $cuphap, $minnap, $partner_id, $partner_key);
            if ($vtd->execute()) {
                exit(json_encode(array("success" => true, "message" => 'Cấu hình đã được cập nhật.')));
            } else {
                exit(json_encode(array("success" => false, "message" => "Cập nhật thất bại: <br/>" . $vtd->error)));
            }
        } else {
            exit(json_encode(array("success" => false, "message" => "Có lỗi xảy ra khi cập nhật cấu hình.")));
        }
    }
}
/**
 * Xử lý đơn tố cáo | report handle
 */
if (isset($_POST['ws_accept_report']) || isset($_POST['ws_reject_report'])) {
    usleep(random_int(800000, 1100000));
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["success" => false, "message" => "Phiên đã hết hạn vui lòng đăng nhập lại!",]));
    }
    $id_report = $_POST['id_report'];
    $victim = $_POST['victim'];
    $reporter = $_POST['reporter'];
    if ($OoO = mysqli_query($thanhdieudb, "SELECT ruby, hovaten FROM `users` WHERE `username`='$reporter'")) {
        $td = mysqli_fetch_assoc($OoO);
        $action = isset($_POST['ws_accept_report']) ? 'accept' : 'reject';
        if ($action === 'accept') {
            $into->wusteam('insert', 'ws_notify_system', array(
                'username' => $reporter,
                'title' => 'Chúng tôi đã xử lý tài khoản ' . $victim . ' mà bạn đã báo cáo!',
                'message' => 'Xin chào! ' . $td['hovaten'] . '<br/>Sau khi xem xét báo cáo bạn gửi, chúng tôi đã nhận thấy rằng tài khoản này có dấu hiệu vi phạm và đã đình chỉ theo chính sách và điều khoản của chúng tôi.<br/><br/><div style="padding:10px 15px;border-radius:8px;line-height:1.7" class="muted-box">50 điểm ruby sẽ được tặng cho bạn thay cho lời cảm ơn đã dành thời gian báo cáo tài khoản này.</div><br/>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với dịch vụ CSKH.',
                'created_at' => $time
            )
            );
            $into->wusteam('insert', 'ws_ruby', array(
                'username' => $reporter,
                'nhiemvu' => 'Cảnh sát báo cáo',
                'sodiem' => 50,
                'sodiem_hientai' => $td['ruby'],
                'thoigian' => $time
            )
            );
            $update->update("UPDATE users SET ruby = ruby + 50 WHERE username = '$reporter'");
            $update->update("UPDATE users SET banned = 1 WHERE username = '$victim'");
            $successMessage = "Đơn tố cáo này đã được chấp nhận.";
        } elseif ($action === 'reject') {
            $into->wusteam('insert', 'ws_notify_system', array(
                'username' => $reporter,
                'title' => 'Chúng tôi không đình chỉ tài khoản của ' . $victim . '!',
                'message' => '' . $td['hovaten'] . ' ơi, sau khi hệ thống xem xét báo cáo của bạn và nhận thấy rằng tài khoản này không vi phạm chính sách và điều khoản, chúng tôi quyết định không đình chỉ tài khoản này.<br/><br/>Nếu tài khoản nào có nội dung cụ thể nào đó khiến bạn tin rằng chúng tôi nên xem xét lại (ví dụ: một bài viết), vui lòng chủ động báo cáo nội dung đó.<br/><br/>Một lần nữa, cảm ơn bạn đã giúp giữ cho ' . $TD->Setting('name-site') . ' luôn an toàn và thân thiện với mọi người.',
                'created_at' => $time
            )
            );
            $successMessage = "Đã từ chối đơn tố cáo này.";
        }

        // $into->wusteam('insert', 'ws_logs',['username' => $reporter,'content' => 'tố cáo ' . $victim . ' có hành vi vi phạm','action' => 'Tố Cáo','time' => $time]);
        $update->update("UPDATE ws_reports SET status = '$action' WHERE id_report = '$id_report'");

        exit(json_encode(array("success" => true, "message" => $successMessage)));
    }
}
// Sửa Thành Viên
if (isset($_POST['editUsers'])) {
    CheckRankAndSession::TD($user, $_POST["Username"]);
    $taikhoan = $_POST["Username"];
    $hovaten = $_POST["editHoVaTen"];
    $gioitinh = $_POST["editGioiTinh"];
    $email = $_POST["editEmail"];
    $tongnap = preg_replace('/[^0-9.]/', '', trim($_POST["editTongNap"]));
    $tongtieu = preg_replace('/[^0-9]/', '', trim($_POST["editTongTieu"]));
    $sodu = preg_replace('/[^0-9]/', '', trim($_POST["editSoDu"]));
    $quyenhan = $_POST["editQuyenHan"];
    $danhhieu = $_POST["editDanhhieu"];
    if (!is_numeric($tongnap) || !is_numeric($tongtieu)) {
        $TDTV = array('success' => 0, 'message' => "Tổng Nạp hoặc Tổng Tiêu phải là số, và có thể chứa dấu chấm!");
    } elseif (!is_numeric($sodu)) {
        $TDTV = array('success' => 0, 'message' => "Số Dư phải là số!");
    } else {
        $vtd = $thanhdieudb->prepare("UPDATE users SET `hovaten`=?, `gender`=?, `email`=?, `tongnap`=?, `tongtieu`=?, `sodu`=?, `rank`=?, `danhhieu`=? WHERE username=?");
        $vtd->bind_param("sssiiisss", $hovaten, $gioitinh, $email, $tongnap, $tongtieu, $sodu, $quyenhan, $danhhieu, $taikhoan);
        if ($vtd->execute()) {
            $TDTV = array('success' => 1, 'message' => "Thông tin chỉnh sửa đã được cập nhật!");
        } else {
            $TDTV = array('success' => 0, 'message' => "Lỗi khi cập nhật thông tin!");
        }
    }
    exit(json_encode($TDTV));
}

// Tạo Sản Phẩm Mới 
if (isset($_POST['action']) && $_POST['action'] == 'ws-create-products') {
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["success" => false, "message" => "Phiên đã hết hạn vui lòng đăng nhập lại!"]));
    }

    $title = $_POST["title"];
    $noidung = FilterTags($_POST["content"]);
    $slug = $_POST["slug"];
    $giatien = preg_replace('/[^0-9]/', '', trim($_POST["giatien"])) ?: 0;
    $phanloai = $_POST["phanloai"];
    $download_url = $_POST["download-url"];
    $privacy = $_POST["post_privacy"];
    $upload_img = [];
    $uploadedFiles = [];
    $error = false;

    if (empty($title) || empty($noidung) || $phanloai == 0 || empty($download_url) || empty($privacy)) {
        exit(json_encode(['success' => 0, 'message' => 'Vui lòng điền đầy đủ thông tin vào các mục có chứa (*).']));
    } elseif (strlen($title) > 100) {
        exit(json_encode(['success' => 0, 'message' => 'Tiêu đề quá dài, vui lòng nhập tiêu đề ngắn hơn!']));
    } elseif (!valid_url($download_url)) {
        exit(json_encode(['success' => 0, 'message' => 'Liên kết tải xuống không hợp lệ, vui lòng nhập đúng định dạng URL.']));
    } elseif (empty($slug)) {
        $slug = TDSlug($title);
        $stmt = $thanhdieudb->prepare("SELECT COUNT(*) AS count FROM ws_products WHERE slug=?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result['count'] > 0) {
            $slug .= '.' . random_int(1000, 99999);
        }
        $stmt->close();
    }

    if (isset($_FILES['anhsanpham'])) {
        foreach ($_FILES['anhsanpham']['tmp_name'] as $key => $tmp_name) {
            $fileInfo = pathinfo($_FILES['anhsanpham']['name'][$key]);
            $extension = strtolower($fileInfo['extension']);
            $fileSize = $_FILES['anhsanpham']['size'][$key];
            if (WsCheckIMG::WsCheckImg($extension)) {
                $sizeCheck = WsCheckIMG::SizeImgLimit($fileSize);
                if ($sizeCheck === true) {
                    $_t = $_SERVER['DOCUMENT_ROOT'] . "/" . __IMG__ . "/uploads/san-pham/" . md5(random_int(1000, 999999)) . '_' . date("Y-m-d") . '.' . $extension;
                    $imageHash = md5_file($tmp_name);
                    if (!in_array($imageHash, $uploadedFiles)) {
                        if (move_uploaded_file($_FILES["anhsanpham"]["tmp_name"][$key], $_t)) {
                            $upload_img[] = $_t;
                            $uploadedFiles[] = $imageHash;
                        } else {
                            $error = true;
                            break;
                        }
                    }
                } else {
                    $error = true;
                    exit(json_encode(['success' => 0, 'message' => $sizeCheck]));
                }
            } else {
                $error = true;
                exit(json_encode(['success' => 0, 'message' => 'Định dạng của tệp không hợp lệ. Vui lòng chọn ảnh có định dạng png, jpg, jpeg, webp hoặc gif.']));
            }
        }

        $upload_img_basename = array_map(function ($path) {
            return 'san-pham/' . basename($path);
        }, $upload_img);
        $anhsanpham = implode('|', $upload_img_basename);
        $hinhthunho = $upload_img_basename[0];

        if (!$error) {
            $stmt = $thanhdieudb->prepare("INSERT INTO ws_products (taikhoan, slug, tieude, noidung, hinhthunho, giatien, ngaydang, ngaycapnhat, phanloai, download_url, anhsanpham, privacy, xetduyet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");
            $stmt->bind_param("sssssissssss", $taikhoan, $slug, $title, $noidung, $hinhthunho, $giatien, $time, $time, $phanloai, $download_url, $anhsanpham, $privacy);

            if ($stmt->execute()) {
                exit(json_encode([
                    'success' => 1,
                    'message' => 'Đã đăng sản phẩm này lên trang thành công!<br/>Link bài viết: <a target="_blank" href="https://' . $domain . '/view-code/' . $slug . '">https://' . $domain . '/view-code/' . $slug . '</a>',
                ]));
            } else {
                exit(json_encode(['success' => 0, 'message' => 'Lỗi: ' . $stmt->error]));
            }
            $stmt->close();
        }
    } else {
        exit(json_encode(['success' => 0, 'message' => 'Không có ảnh nào được tải lên, hãy chọn ít nhất 1 ảnh.']));
    }
}

if (isset($_POST['delete_product'])) {
    usleep(random_int(400000, 600000));
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["success" => false, "message" => "Phiên đã hết hạn vui lòng đăng nhập lại!"]));
    }

    $id_product = $_POST['id_product'];
    $stmt = $thanhdieudb->prepare("SELECT taikhoan, hinhthunho, anhsanpham FROM ws_products WHERE id = ?");
    $stmt->bind_param("i", $id_product);
    $stmt->execute();
    $result = $stmt->get_result();
    $product_data = $result->fetch_assoc();
    $stmt->close();
    if (!$product_data) {
        exit(json_encode(['success' => false, 'message' => "Sản phẩm không tồn tại."]));
    }
    if ($user['rank'] === 'partner' && $product_data['taikhoan'] !== $taikhoan) {
        exit(json_encode(['success' => false, 'message' => "Không đủ quyền để xoá sản phẩm này."]));
    }

    $thumbnail = $product_data['hinhthunho'];
    $images = $product_data['anhsanpham'];

    $thanhdieudb->query("SET FOREIGN_KEY_CHECKS = 0");

    if (!empty($thumbnail)) {
        $thumbnail_path = $_SERVER['DOCUMENT_ROOT'] . '/' . __IMG__ . '/uploads/' . $thumbnail;
        if (file_exists($thumbnail_path)) {
            unlink($thumbnail_path);
        }
    }

    if (!empty($images)) {
        $image_list = explode('|', $images);
        foreach ($image_list as $image) {
            $image_path = $_SERVER['DOCUMENT_ROOT'] . '/' . __IMG__ . '/uploads/' . trim($image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    $thanhdieudb->query("DELETE FROM ws_products WHERE id = $id_product");
    $thanhdieudb->query("DELETE FROM ws_comments WHERE product_id = $id_product");
    $thanhdieudb->query("DELETE FROM ws_views WHERE product_id = $id_product");
    $thanhdieudb->query("DELETE FROM ws_like WHERE product_id = $id_product");
    $thanhdieudb->query("DELETE cr FROM ws_comments_reply cr LEFT JOIN ws_comments c ON cr.parent_comment_id = c.comment_id WHERE c.product_id IS NULL");
    $thanhdieudb->query("SET FOREIGN_KEY_CHECKS = 1");

    exit(json_encode(['success' => true, 'message' => "Xoá sản phẩm thành công."]));
}

if (isset($_POST['pin_product'])) {
    usleep(random_int(400000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $id_product = $_POST['id_product'];
    $rs = $thanhdieudb->query("SELECT is_pinned FROM ws_products WHERE id = '$id_product'");
    $row = $rs->fetch_assoc();
    if ($row['is_pinned'] == 1) {
        $thanhdieudb->query("UPDATE ws_products SET is_pinned = 0 WHERE id = $id_product");
        exit(json_encode(['success' => true, 'message' => "Gỡ ghim sản phẩm thành công.", 'new_status' => 0]));
    } else {
        $rs = $thanhdieudb->query("SELECT COUNT(*) as pin_count FROM ws_products WHERE is_pinned = 1");
        $row = $rs->fetch_assoc();
        if ($row['pin_count'] < 4) {
            $thanhdieudb->query("UPDATE ws_products SET is_pinned = 1 WHERE id = $id_product");
            exit(json_encode(['success' => true, 'message' => "Ghim sản phẩm thành công.", 'new_status' => 1]));
        } else {
            exit(json_encode(['success' => false, 'message' => "Chỉ có thể ghim tối đa 4 sản phẩm."]));
        }
    }
}
// Sửa Sản Phẩm
if (isset($_POST['action']) && $_POST['action'] == 're-edit-product') {
    usleep(random_int(400000,700000));
    CheckRankAndSession::TD($user, $taikhoan);
    $product_id = $_POST["product-id"];
    $tieude = $_POST["tieu-de"];
    $noidung = FilterTags($_POST["content"]);
    $giaban = preg_replace('/[^0-9]/', '', trim($_POST["gia-ban"]));
    $phanloai = $_POST["phanloai"];
    $privacy = $_POST["post_privacy"];
    $url = $_POST["download-url"];
    if ($user['rank'] == 'partner') {
        if ($OoO = mysqli_query($thanhdieudb, "SELECT taikhoan FROM `ws_products` WHERE id=$product_id")) {
            $td = mysqli_fetch_assoc($OoO);
            if ($user['username'] != $td['taikhoan']) {
                exit(json_encode(['success' => false, 'message' => 'Không thể chỉnh sửa sản phẩm này.']));
            }
        }
    } elseif (empty($tieude) || empty($noidung) || empty($phanloai) || empty($url)) {
        exit(json_encode(['success' => false, 'message' => 'Không được bỏ trống mục nào.']));
    } else if (!is_numeric($giaban)) {
        exit(json_encode(['success' => false, 'message' => "Giá bán phải là số!"]));
    } else if (!valid_url($url)) {
        exit(json_encode(['success' => false, 'message' => 'Liên kết tải xuống không hợp lệ.']));
    } else {
        $vtd = $thanhdieudb->prepare("UPDATE ws_products SET tieude=?, noidung=?, giatien=?, phanloai=?, privacy=?, ngaycapnhat=? WHERE id=?");
        $vtd->bind_param("ssisssi", $tieude, $noidung, $giaban, $phanloai, $privacy, $time, $product_id);
        if ($vtd->execute()) {
            exit(json_encode(['success' => true, 'message' => "Thông tin đã được cập nhật!"]));
        } else {
            exit(json_encode(['success' => false, 'message' => "Lỗi khi cập nhật thông tin!"]));
        }
    }
}
// Xoá comment
if (isset($_POST['delete_comment'])) {
    usleep(random_int(500000, 700000));
    CheckRankAndSession::TD($user, $taikhoan);
    $id_comment = $_POST['id_comment'];
    $thanhdieudb->begin_transaction();
    try {
        $vtd_reply = $thanhdieudb->prepare("DELETE FROM ws_comments_reply WHERE parent_comment_id = ?");
        $vtd_reply->bind_param("i", $id_comment);
        $vtd_reply->execute();
        $vtd_comment = $thanhdieudb->prepare("DELETE FROM ws_comments WHERE comment_id = ?");
        $vtd_comment->bind_param("i", $id_comment);
        $vtd_comment->execute();
        $thanhdieudb->commit();
        exit(json_encode(['success' => true, 'message' => 'Đã xóa bình luận thành công.']));
    } catch (Exception $e) {
        $thanhdieudb->rollback();
        exit(json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]));
    }
}
// Duyệt xác minh 
if (isset($_POST['id']) && isset($_POST['action'])) {
    usleep(random_int(400000, 700000));
    CheckRankAndSession::TD($user, $taikhoan);
    $id = $_POST['id'];
    $action = $_POST['action'];
    $id = $_POST['id'];
    $result = mysqli_query($thanhdieudb, "SELECT * FROM users WHERE username = (SELECT username FROM ws_verification WHERE verify_id = '$id')");
    if ($result) {
        $user_data = mysqli_fetch_assoc($result);
        switch ($action) {
            case 'accept':
                $OoO = $thanhdieudb->query("SELECT status, created_at FROM ws_verification WHERE verify_id = '$id'");
                if ($OoO && $OoO->num_rows > 0) {
                    $verification_data = $OoO->fetch_assoc();
                    $status = $verification_data['status'];
                    $created_at = $verification_data['created_at'];
                    if ($status === 'approved') {
                        exit(json_encode(['success' => false, 'message' => 'Lỗi: Yêu cầu xác minh này đã chấp nhận.']));
                    }
                } else {
                    exit(json_encode(['success' => false, 'message' => 'Yêu cầu xác minh không tồn tại.']));
                }
                $into->wusteam('insert', 'ws_notify_system', array(
                    'username' => $user_data['username'],
                    'title' => 'Chúng tôi đã chấp nhận yêu cầu xác minh danh tính',
                    'message' => 'Xin chào! ' . $user_data['hovaten'] . '<br>Yêu cầu xác thực danh tính bạn khởi tạo lúc ' . FormatTime::TD($created_at) . ' đã được chấp nhận <br/>Nhận dạng danh tính: ' . $user_data['hovaten'] . '<br/>Thời gian nộp đơn: ' . FormatTime::TD($created_at) . '<br/>Thời gian xử lý: ' . FormatTime::TD($time) . '<br/><br/><div style="padding:10px 15px;border-radius:8px;line-height:1.7" class="muted-box">Bây giờ bạn đã là người dùng chính thức của chúng tôi, để tránh tài khoản giả mạo hệ thống đã cung cấp dấu tích xác nhận giúp bạn nổi bật hơn các thành viên khác.</div><br>Nếu bạn có thắc mắc nào, vui lòng liên hệ bộ phận chăm sóc khách hàng.',
                    'created_at' => $time
                )
                );
                $update->update("UPDATE ws_verification SET status = 'approved', `time_approved` = '$time' WHERE verify_id = '$id'");
                exit(json_encode(['success' => true, 'message' => 'Yêu cầu xác minh đã được chấp nhận.', 'status' => 'approved']));
            case 'reject':
                $OoO = $thanhdieudb->query("SELECT status, created_at FROM ws_verification WHERE verify_id = '$id'");
                if ($OoO && $OoO->num_rows > 0) {
                    $verification_data = $OoO->fetch_assoc();
                    $created_at = $verification_data['created_at'];
                } else {
                    exit(json_encode(['success' => false, 'message' => 'Yêu cầu xác minh không tồn tại.']));
                }
                $into->wusteam('insert', 'ws_notify_system', array(
                    'username' => $user_data['username'],
                    'title' => 'Đơn đăng ký xác minh danh tính của bạn đã bị từ chối',
                    'message' => 'Xin chào! ' . $user_data['hovaten'] . '<br>Yêu cầu xác thực danh tính bạn khởi tạo lúc ' . FormatTime::TD($created_at) . ' đã bị từ chối <br/>Nhận dạng danh tính: ' . $user_data['hovaten'] . '<br/>Thời gian nộp đơn: ' . FormatTime::TD($created_at) . '<br/>Thời gian xử lý: ' . FormatTime::TD($time) . '<br/><br/><div style="padding:10px 15px;border-radius:8px;line-height:1.7" class="muted-box">Tài khoản của bạn không đủ yêu cầu để xác minh danh tính hoặc thông tin xác minh không hơp lệ.</div><br>Nếu bạn có thắc mắc nào, vui lòng liên hệ bộ phận chăm sóc khách hàng.',
                    'created_at' => $time
                )
                );
                $update->update("UPDATE ws_verification SET status = 'rejected' WHERE verify_id = '$id'");
                exit(json_encode(['success' => true, 'message' => 'Yêu cầu xác minh đã bị từ chối.', 'status' => 'rejected']));
            case 'delete':
                $thanhdieudb->query("SET @num := 0");
                $thanhdieudb->query("UPDATE ws_verification SET verify_id=@num := @num + 1");
                $thanhdieudb->query("ALTER TABLE ws_verification AUTO_INCREMENT=1");
                $thanhdieudb->query("DELETE FROM ws_verification WHERE verify_id = '$id'");
                exit(json_encode(['success' => true, 'message' => 'Yêu cầu xác minh đã bị xóa.', 'status' => 'deleted']));
            default:
                exit(json_encode(['success' => false, 'message' => 'Hành động không hợp lệ.']));
        }
    } else {
        exit(json_encode(['success' => false, 'message' => 'Không thể lấy thông tin người dùng từ cơ sở dữ liệu.']));
    }
}
if (isset($_POST['delete_users'])) {
    usleep(random_int(300000, 600000));
    CheckRankAndSession::TD($user, $taikhoan);
    $username = $_POST['username'];
    $thanhdieudb->query("SET FOREIGN_KEY_CHECKS = 0");
    try {
        $thanhdieudb->query("DELETE FROM users WHERE username = '$username'");
        $thanhdieudb->query("DELETE FROM ws_comments WHERE user_username = '$username'");
        $thanhdieudb->query("DELETE FROM ws_views WHERE taikhoan = '$username'");
        $thanhdieudb->query("DELETE FROM ws_like WHERE username = '$username'");
        $thanhdieudb->query("SET FOREIGN_KEY_CHECKS = 1");

        exit(json_encode(['success' => true, 'message' => 'Đã xóa thành viên thành công.']));
    } catch (Exception $e) {
        $thanhdieudb->rollback();
        exit(json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]));
    }
}
if (isset($_POST['TaoThanhVien'])) {
    usleep(random_int(300000, 500000));
    CheckRankAndSession::TD($user, $taikhoan);
    $hovaten = mysqli_real_escape_string($thanhdieudb, trim($_POST['hovaten']));
    $username = mysqli_real_escape_string($thanhdieudb, trim($_POST['username']));
    $password = mysqli_real_escape_string($thanhdieudb, trim($_POST['password']));
    $quyenhan = mysqli_real_escape_string($thanhdieudb, trim($_POST['quyenhan']));
    if (!CheckFullName($hovaten)) {
        exit(json_encode(['success' => false, 'message' => 'Họ và tên không được chứa kí tự đặc biệt!']));
    } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        exit(json_encode(['success' => false, 'message' => 'Tên tài khoản không được chứa kí tự đặc biệt.']));
    } elseif (strlen($hovaten) < 5) {
        exit(json_encode(['success' => false, 'message', 'Họ và tên quá ngắn!']));
    } elseif (strlen($username) < 4 || strlen($password) < 5) {
        exit(json_encode(['success' => false, 'message' => 'Tên tài khoản hoặc mật khẩu quá ngắn!']));
    } elseif (stripos($username, 'admin') !== false || stripos($username, 'dieu') !== false) {
        exit(json_encode(['success' => false, 'message' => 'Tên tài khoản này không hợp lệ!']));
    } elseif (strlen($username) > 22 || strlen($password) > 27) {
        exit(json_encode(['success' => false, 'message' => 'Tài khoản hoặc mật khẩu quá dài!']));
    } elseif ($username == $password) {
        exit(json_encode(['success' => false, 'message' => 'Không được lấy tên tài khoản làm mật khẩu!']));
    } elseif (!CheckPassword($password)) {
        exit(json_encode(['success' => false, 'message' => 'Mật khẩu không đúng định dạng!']));
    } elseif (($check_username = $thanhdieudb->query("SELECT COUNT(*) as count FROM users WHERE username='$username'")) && $check_username->fetch_assoc()['count'] > 0) {
        exit(json_encode(['success' => false, 'message' => 'Tên tài khoản đã tồn tại, hãy chọn tên tài khoản khác!']));
    } else {
        if ($thanhdieudb->query("INSERT INTO users (hovaten, username, password, ip, ruby, ngaythamgia) VALUES ('$hovaten', '$username', '" . password_hash($password, PASSWORD_BCRYPT, ['cost' => 7]) . "', '$ip', ruby + 20, '$time')") === TRUE) {
            $thanhdieudb->query("INSERT INTO `ws_logs` SET  `username`='$username',`content`='đã tạo tài khoản tại website',`action`='Sign Up',`time`='$time'");
            $thanhdieudb->query("INSERT INTO `ws_ruby` SET`username`='$username',`nhiemvu`='Tạo tài khoản mới',`sodiem`= sodiem + 20,`sodiem_hientai`= 20,`thoigian`='$time' ");
            exit(json_encode(['success' => true, 'message' => 'Tạo thành viên mới thành công!']));
        } else {
            exit(json_encode(['success' => false, 'message' => 'Đã xảy ra lỗi khi tạo thành viên mới!']));
        }
    }
}
//  Tạo Bài Viết
if (isset($_POST['action']) && $_POST['action'] == 'ws-create-forum') {
    CheckRankAndSession::TD($user, $taikhoan);
    $title = $_POST["title"];
    $noidung = FilterTags($_POST["content"]);
    $slug = $_POST["slug"];
    $quyen_rieng_tu = $_POST["quyen-rieng-tu"];
    $is_comments = $_POST["turn-on-cmt"];
    $upload_img = [];
    $uploadedFiles = [];
    $error = false;
    if (empty($title) || empty($noidung) || empty($quyen_rieng_tu)) {
        exit(json_encode(['success' => 0, 'message' => 'Vui lòng điền đầy đủ thông tin vào các mục có chứa (*).']));
    } elseif (strlen($title) > 100) {
        exit(json_encode(['success' => 0, 'message' => 'Tiêu đề quá dài, vui lòng nhập tiêu đề ngắn hơn!']));
    } elseif (empty($slug)) {
        $slug = TDSlug($title);
        $OOO = mysqli_fetch_assoc(mysqli_query($thanhdieudb, "SELECT COUNT(*) AS count FROM ws_forums WHERE slug='$slug'"));
        if ($OOO['count'] > 0) {
            $slug .= '.' . random_int(10000, 99999);
        }
    }
    if (isset($_FILES['anhbaiviet']) && !empty(array_filter($_FILES['anhbaiviet']['name']))) {
        foreach ($_FILES['anhbaiviet']['tmp_name'] as $key => $tmp_name) {
            $fileInfo = pathinfo($_FILES['anhbaiviet']['name'][$key]);
            $extension = strtolower($fileInfo['extension']);
            $fileSize = $_FILES['anhbaiviet']['size'][$key];
            if (WsCheckIMG::WsCheckImg($extension)) {
                $sizeCheck = WsCheckIMG::SizeImgLimit($fileSize);
                if ($sizeCheck === true) {
                    $_t = $_SERVER['DOCUMENT_ROOT'] . "/" . __IMG__ . "/uploads/bai-viet/" . md5(random_int(1000, 999999)) . '_' . date("Y-m-d") . '.' . $extension;
                    $imageHash = md5_file($tmp_name);
                    if (!in_array($imageHash, $uploadedFiles)) {
                        if (move_uploaded_file($_FILES["anhbaiviet"]["tmp_name"][$key], $_t)) {
                            $upload_img[] = $_t;
                            $uploadedFiles[] = $imageHash;
                        } else {
                            $error = true;
                            break;
                        }
                    }
                } else {
                    $error = true;
                    exit(json_encode(['success' => 0, 'message' => $sizeCheck]));
                }
            } else {
                $error = true;
                exit(json_encode(['success' => 0, 'message' => 'Định dạng của tệp không hợp lệ. Vui lòng chọn ảnh có định dạng png, jpg, jpeg, webp hoặc gif.']));
            }
        }

        $upload_img_basename = array_map(function ($path) {
            return 'bai-viet/' . basename($path);
        }, $upload_img);
        $anhsanpham = implode('|', $upload_img_basename);
        $hinhthunho = $upload_img_basename[0];
    } else {
        $anhsanpham = '';
        $hinhthunho = '';
    }
    if (!$error) {
        if (mysqli_query($thanhdieudb, "INSERT INTO ws_forums (nguoidang, slug, tieude, noidung, anhbaiviet, `quyen-rieng-tu`,is_comments, trangthai) VALUES ('$taikhoan', '$slug', '$title', '$noidung', '$anhsanpham', '$quyen_rieng_tu','$is_comments', '1')")) {
            exit(json_encode([
                'success' => 1,
                'message' => 'Đã đăng bài viết này lên diễn đàn thành công!<br/>Link bài viết: <a target="_blank" href="https://' . $domain . '/dien-dan/' . $slug . '">https://' . $domain . '/dien-dan/' . $slug . '</a>',
            ]));
        } else {
            exit(json_encode(['success' => 0, 'message' => 'Lỗi: ' . mysqli_error($thanhdieudb)]));
        }
    }
}
