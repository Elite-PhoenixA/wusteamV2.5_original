<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');
/**
 * @author Vương Thanh Diệu
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!class_exists('DatabaseConnection')) {
    header('location: /');
}
class UserLogin extends DatabaseConnection
{
    private $ip;
    private $encryption_key;

    public function __construct($ip)
    {
        global $TD;
        $this->ip = $ip;
        $this->encryption_key = $TD->Setting('key-aes');
    }

    public function login($username_or_email, $password, $remember)
    {
        $username_or_email = strtolower(trim($username_or_email));
        $password = trim($password);

        if (empty($username_or_email) || empty($password)) {
            return ['status' => false, 'message' => 'Vui lòng không bỏ trống mục nào!'];
        }

        if (valid_email($username_or_email)) {
            $vtd = self::ThanhDieuDB()->prepare("SELECT * FROM `users` WHERE `email`=?");
        } else {
            $vtd = self::ThanhDieuDB()->prepare("SELECT * FROM `users` WHERE `username`=?");
        }

        if (SecurityUtils::DetectSQLInjection($username_or_email) || SecurityUtils::DetectSQLInjection($password)) {
            return ['status' => false, 'message' => 'Phát hiện tấn công SQL Injection!', 'xss' => true];
        }
        $vtd->bind_param("s", $username_or_email);
        $vtd->execute();
        $OoO = $vtd->get_result();
        if ($OoO && $OoO->num_rows > 0) {
            $user = $OoO->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                if ($user['banned'] == 1) {
                    return ['status' => false, 'message' => 'Tài khoản của bạn đã bị đình chỉ, do không tuân thủ tiêu chuẩn cộng đồng!'];
                } else {
                    self::ThanhDieuDB()->query("UPDATE users SET ip='$this->ip' WHERE username='{$user['username']}'");
                    if ($remember) {
                        $this->Remember($user['username'], $user['password']);
                    } else {
                        $this->DeleteRemember();
                    }
                    setcookie('taikhoan', encrypt($user['username'], $this->encryption_key), time() + (14 * 24 * 60 * 60), "/", "", true, true);
                    return ['status' => true, 'message' => 'Đăng nhập thành công!'];
                }
            } else {
                return ['status' => false, 'message' => 'Tài khoản hoặc mật khẩu không chính xác!'];
            }
        } else {
            return ['status' => false, 'message' => 'Tài khoản hoặc mật khẩu không chính xác!'];
        }
    }

    public function Logout()
    {
        setcookie('taikhoan', '', time() - 3600, "/", "", true, true);
        setcookie('admin', '', time() - 3600, "/", "", true, true);
        return ['status' => true, 'message' => 'Đăng xuất thành công!'];
    }

    private function Remember($username, $password)
    {
        $cookie_name = "remember_me";
        $cookie_value = json_encode(['username' => $username, 'password' => $password]);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", "", true, true); // Ghi nhớ 30 ngày, HttpOnly và Secure
    }

    private function DeleteRemember()
    {
        setcookie("remember_me", "", time() - 3600, "/", "", true, true);
    }
}

$AuthUser = new UserLogin($ip);
if (isset($_POST['action']) && $_POST['action'] == 'auth-user-login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) && $_POST['remember'] === 'true';
    echo json_encode($AuthUser->login($username, $password, $remember));
}

// LogOut 
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    echo json_encode($AuthUser->Logout());
}

// Đăng Ký
if (isset($_POST['action']) && $_POST['action'] == 'auth-user-register') {
    $hovaten = mysqli_real_escape_string($thanhdieudb, trim($_POST['hovaten']));
    $username = mysqli_real_escape_string($thanhdieudb, trim($_POST['username']));
    $password = mysqli_real_escape_string($thanhdieudb, trim($_POST['password']));
    if (!TDSpamChecker::TD($ip, $TD)) {
        exit(json_encode(['success' => false, 'message' => 'Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!']));
    } elseif (!CheckFullName($hovaten)) {
        exit(json_encode(['success' => false, 'message' => 'Họ và tên không được chứa kí tự đặc biệt!']));
    } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        exit(json_encode(['success' => false, 'message' => 'Tên tài khoản không được chứa kí tự đặc biệt.']));
    } elseif (strlen($hovaten) < 7) {
        exit(json_encode(['success' => false, 'message' => 'Họ và tên quá ngắn!']));
    } elseif (($Owo = $thanhdieudb->query("SELECT COUNT(*) as count FROM users WHERE ip='$ip'")) && ($check_ip = $Owo->fetch_assoc()) && $check_ip['count'] > 0) {
        exit(json_encode(['success' => false, 'message' => 'Bạn đang bị hạn chế tạo tài khoản.']));
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
    } elseif (!CheckStrongPassword($password)) {
        exit(json_encode(['success' => false, 'message' => 'Mật khẩu của bạn quá dễ đoán, hãy chọn mật khẩu khác!']));
    } elseif (($check_username = $thanhdieudb->query("SELECT COUNT(*) as count FROM users WHERE username='$username'")) && $check_username->fetch_assoc()['count'] > 0) {
        exit(json_encode(['success' => false, 'message' => 'Tên tài khoản đã tồn tại, hãy chọn tên tài khoản khác!']));
    }
    if ($thanhdieudb->query("INSERT INTO users (hovaten, username, password, ip, ruby,tieusu, ngaythamgia) VALUES ('$hovaten', '$username', '" . password_hash($password, PASSWORD_BCRYPT, ['cost' => 7]) . "', '$ip', ruby + 20, 'Chưa có tiểu sử','$time')") === TRUE) {
        $thanhdieudb->query("INSERT INTO `ws_logs` SET  `username`='$username',`content`='đã tạo tài khoản tại website',`action`='Sign Up',`time`='$time'");
        $thanhdieudb->query("INSERT INTO `ws_ruby` SET`username`='$username',`nhiemvu`='Tạo tài khoản mới',`sodiem`= sodiem + 20,`sodiem_hientai`= 20,`thoigian`='$time' ");
        setcookie('taikhoan', encrypt($username, $TD->Setting('key-aes')), time() + (14 * 24 * 60 * 60), "/", "", true, true);
        exit(json_encode(['success' => true, 'message' => 'Tạo tài khoản mới thành công!']));
    } else {
        exit(json_encode(['success' => false, 'message' => 'Đã xảy ra lỗi khi tạo tài khoản mới!']));
    }
}
// BÌNH LUẬN
if (isset($_POST['WsComments'])) {
    $product_id = $_POST["product_id"];
    $comment_text = $_POST["comment"];
    $is_reply = $_POST["is_reply"];
    $parent_comment_id = $_POST["parent_comment_id"];
    $usernamereply = $_POST["usernamereply"];
    $time = date('Y-m-d H:i:s');

    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["success" => 0, "message" => "Phiên đã hết hạn vui lòng đăng nhập lại."]));
    } elseif (!TDSpamChecker::TD($ip, $TD)) {
        exit(json_encode(["success" => 0, "message" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!"]));
    } elseif (empty(trim($comment_text))) {
        exit(json_encode(['success' => 0, 'message' => "Hãy nhập nội dung cần bình luận!"]));
    } elseif (CheckDuplicateComment($taikhoan, $comment_text, $thanhdieudb)) {
        exit(json_encode(['success' => 0, 'message' => "Bạn đã bình luận nội dung này quá nhiều lần trong thời gian ngắn!"]));
    } elseif (strlen(trim($comment_text)) < 4) {
        exit(json_encode(['success' => 0, 'message' => "Bình luận quá ngắn!"]));
    } elseif (strlen(trim($comment_text)) > 2000) {
        exit(json_encode(['success' => 0, 'message' => "Bình luận quá dài, vui lòng hạn chế ngôn từ!"]));
    } else {
        if (preg_match('/\[img=([^\]]+)\]/', $comment_text, $matches)) {
            $img_url = $matches[1];
            if (!filter_var($img_url, FILTER_VALIDATE_URL) || !preg_match('/\.(png|gif|jpg|jpeg)$/i', $img_url)) {
                exit(json_encode(["success" => 0, "message" => "Vui lòng nhập đúng địa chỉ hình ảnh!"]));
            }
        }

        if ($is_reply == 0) {
            $vtd = $thanhdieudb->prepare("INSERT INTO ws_comments (user_username, product_id, comment_text, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
            $vtd->bind_param("sisss", $taikhoan, $product_id, $comment_text, $time, $time);
            if ($vtd->execute()) {
                exit(json_encode(['success' => 1, 'message' => "Bình luận của bạn đã được gửi!"]));
            } else {
                exit(json_encode(['success' => 0, 'message' => "Lỗi khi cố gắng tạo bình luận!"]));
            }
        } elseif ($is_reply == 1 && $thanhdieudb->query("SELECT COUNT(*) FROM ws_comments WHERE comment_id = $parent_comment_id")->fetch_row()[0] > 0) {
            $vtd = $thanhdieudb->prepare("INSERT INTO ws_comments_reply (parent_comment_id, user_username, reply_text, created_at, updated_at, reply_username) VALUES (?, ?, ?, ?, ?, ?)");
            $vtd->bind_param("isssss", $parent_comment_id, $taikhoan, $comment_text, $time, $time, $usernamereply);
            if ($vtd->execute()) {
                exit(json_encode(['success' => 1, 'message' => "Phản hồi của bạn đã được gửi!"]));
            } else {
                exit(json_encode(['success' => 0, 'message' => "Lỗi khi cố gắng tạo phản hồi!"]));
            }
        } else {
            exit(json_encode(['success' => 0, 'message' => "Bình luận không còn tồn tại nữa hoặc đã bị xoá."]));
        }
    }
}
// XOÁ COMMENTS
if (isset($_POST['delete_comment'])) {
    $id_comment = $_POST['id_comment'];
    $is_comments = $_POST['is_comments'];
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["success" => false, "message" => "Phiên đã hết hạn vui lòng đăng nhập lại."]));
    } elseif ($is_comments == 0) {
        $vtd = $thanhdieudb->prepare("DELETE FROM ws_comments_reply WHERE parent_comment_id = ?");
        $vtd->bind_param("i", $id_comment);
        if ($vtd->execute()) {
            $vtd = $thanhdieudb->prepare("DELETE FROM ws_comments WHERE comment_id = ?");
            $vtd->bind_param("i", $id_comment);
            if ($vtd->execute()) {
                exit(json_encode(['success' => true, 'message' => 'Bình luận của bạn đã được xóa.', 'is_cmt' => '0']));
            } else {
                exit(json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi xóa bình luận.']));
            }
        } else {
            exit(json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi xóa bình luận phản hồi.']));
        }
    } elseif ($is_comments == 1) {
        $reply_id = $_POST['reply_id'];
        $vtd = $thanhdieudb->prepare("DELETE FROM ws_comments_reply WHERE reply_id = ? AND user_username = ?");
        $vtd->bind_param("is", $reply_id, $taikhoan);
        if ($vtd->execute()) {
            exit(json_encode(['success' => true, 'message' => 'Bình luận của bạn đã được xóa.', 'is_cmt' => '1']));
        } else {
            exit(json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi xóa bình luận phản hồi.']));
        }
    }
}
// LIKE BÀI VIẾT
if (isset($_POST['ws_like'])) {
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(['success' => false, 'message' => 'Phiên đã hết hạn vui lòng đăng nhập lại.']));
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        exit(json_encode(['success' => false, 'message' => 'Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!']));
    } else {
        usleep(random_int(1000000, 1200000));
        $product_id = $_POST['postId'];
        if ($thanhdieudb->query("SELECT COUNT(*) AS count FROM ws_like WHERE username='$taikhoan' AND product_id=$product_id")->fetch_assoc()['count'] > 0) {
            if ($thanhdieudb->query("DELETE FROM ws_like WHERE username='$taikhoan' AND product_id=$product_id") === TRUE) {
                $thanhdieudb->query("UPDATE ws_products SET luotlike=luotlike - 1 WHERE id=$product_id");
                exit(json_encode(['success' => true, 'message' => 'Bạn đã bỏ thích bài viết này']));
            } else {
                exit(json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi hủy like']));
            }
        } else {
            if ($thanhdieudb->query("INSERT INTO ws_like (username, created_at, product_id) VALUES ('$taikhoan', '$time', $product_id)") === TRUE) {
                $thanhdieudb->query("UPDATE ws_products SET luotlike=luotlike + 1 WHERE id=$product_id");
                exit(json_encode(['success' => true, 'message' => 'thành công']));
            } else {
                exit(json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi thêm like']));
            }
        }
    }
}
// SHARE BÀI VIẾT
if (isset($_POST['ws_share'])) {
    header('Content-Type: application/json');
    $product_id = $_POST['postId'];
    if (mysqli_query($thanhdieudb, "UPDATE ws_products SET luotshare=luotshare + 1 WHERE id=$product_id")) {
        $TDTV = array('success' => true, 'message' => 'Cảm ơn bạn đã chia sẽ.');
    } else {
        $TDTV = array('success' => false, 'message' => 'Có lỗi không mong muốn xảy ra.');
    }
    exit(json_encode($TDTV));
}
// THAY ĐỔI ẢNH ĐẠI DIỆN & ẢNH BÌA
function FileUpload($action, $filePath, $column, $Msg, $user, $taikhoan, $thanhdieudb, $TD)
{
    $file = $_FILES["image_upload"];
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        $response = array("error" => "Phiên đã hết hạn vui lòng đăng nhập lại.");
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        $response = array("error" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!");
    } else {
        foreach (glob($filePath . $taikhoan . '_*') as $oldFilePath) {
            unlink($oldFilePath);
        }
        $target_img = $filePath . $taikhoan . '_n.' . md5(WsRandomString::TD(50)) . '.' . pathinfo($file["name"], PATHINFO_EXTENSION);
        $extension = strtolower(pathinfo($target_img, PATHINFO_EXTENSION));

        if (!in_array($extension, array("jpg", "jpeg", "png", "gif", "webp"))) {
            $response = array("error" => "Chỉ cho phép tải lên các tệp JPG, WEBP, PNG hoặc GIF.");
        } elseif ($file["size"] > 2097152) {
            $response = array("error" => "Kích thước ảnh quá lớn hãy chọn ảnh dưới 2MB!");
        } elseif (move_uploaded_file($file["tmp_name"], $target_img)) {
            if ($thanhdieudb->query("UPDATE users SET $column='" . basename($target_img) . "' WHERE username='$taikhoan'")) {
                $response = array("success" => true, "message" => $Msg, "file_path" => $target_img);
            } else {
                $response = array("error" => "Có lỗi xảy ra khi cập nhật $column.");
            }
        } else {
            $response = array("error" => "Có lỗi xảy ra khi tải ảnh lên.");
        }
    }
    exit(json_encode($response));
}
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'user_upload_avatar':
            FileUpload(
                'user_upload_avatar',
                $_SERVER['DOCUMENT_ROOT'] . '/' . __IMG__ . '/users/',
                'avatar',
                'Đã thay ảnh đại diện!',
                $user,
                $taikhoan,
                $thanhdieudb,
                $TD
            );
            break;
        case 'user_upload_anhbia':
            FileUpload(
                'user_upload_anhbia',
                $_SERVER['DOCUMENT_ROOT'] . '/' . __IMG__ . '/users/anh-bia/',
                'anhbia',
                'Ảnh bìa của bạn đã được thay đổi!',
                $user,
                $taikhoan,
                $thanhdieudb,
                $TD
            );
            break;
    }
}
// CHỈNH SỬA TÀI KHOẢN
if (isset($_POST['action']) && $_POST['action'] == 'user_edit_account') {
    $hovaten = trim($_POST['hovaten']);
    $tieusu = trim($_POST['tieusu']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        $TDTV = array("error" => "Phiên đã hết hạn vui lòng đăng nhập lại.");
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        $TDTV = array("error" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!");
    } elseif (strlen($hovaten) > 25) {
        $TDTV = array("error" => "Họ và tên quá dài!.");
    } elseif (!CheckFullName($hovaten)) {
        $TDTV = array("error" => "Họ và tên không được chứa kí tự đặc biệt!");
    } else {
        $change_hovaten = false;
        $days_left = 0;
        $json_file = $_SERVER['DOCUMENT_ROOT'] . '/public/cache/user_data.json';
        if (!file_exists($json_file)) {
            file_put_contents($json_file, '[]');
        }
        $json_data = file_get_contents($json_file);
        $logs = json_decode($json_data, true);

        foreach ($logs as $log) {
            if ($log['username'] === $taikhoan && $log['fullname'] !== hash('sha256', $hovaten)) {
                $change_hovaten = true;
                $days_left = ceil(($log['limit_change_time'] - time()) / (60 * 60 * 24));
                break;
            }
        }
        if ($change_hovaten && $days_left > 0) {
            $TDTV = array("error" => "Bạn đã đổi tên trước đó, bạn có thể đổi lại tên sau $days_left ngày.");
            exit(json_encode($TDTV));
        }
        if (!$change_hovaten || $days_left <= 0) {
            $oOo = $thanhdieudb->prepare("UPDATE users SET hovaten=? WHERE username=?");
            $oOo->bind_param("ss", $hovaten, $taikhoan);
            if ($oOo->execute()) {
                $log_data = array(
                    "username" => $taikhoan,
                    "fullname" => hash('sha256', $hovaten),
                    "change_time" => time(),
                    "limit_change_time" => strtotime('+7 days')
                );
                $log_exists = false;
                foreach ($logs as &$log) {
                    if ($log['username'] === $taikhoan) {
                        $log = $log_data;
                        $log_exists = true;
                        break;
                    }
                }
                if (!$log_exists) {
                    $logs[] = $log_data;
                }
                $new_json_data = json_encode($logs);
                file_put_contents($json_file, $new_json_data);
                $TDTV = array("success" => true, "message" => "Hồ sơ của bạn đã được cập nhật!");
            } else {
                $TDTV = array("error" => "Đã xảy ra lỗi khi cập nhật thông tin của bạn: " . $oOo->error);
            }
        }
        $oOo = $thanhdieudb->prepare("UPDATE users SET tieusu=?, gender=? WHERE username=?");
        $oOo->bind_param("sss", $tieusu, $gender, $taikhoan);
        if ($oOo->execute()) {
            $TDTV = array("success" => true, "message" => "Hồ sơ của bạn đã được cập nhật!");
        } else {
            $TDTV = array("error" => "Đã xảy ra lỗi khi cập nhật thông tin của bạn: " . $oOo->error);
        }
    }
    exit(json_encode($TDTV));
}

// THAY ĐỔI MẬT KHẨU
if (isset($_POST['action']) && $_POST['action'] == 'user_change_password') {
    $passwordold = trim($_POST['passwordold']);
    $newpassword = trim($_POST['newpassword']);
    $newpassword2 = trim($_POST['newpassword2']);
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        $TDTV = array("error" => "Phiên đã hết hạn vui lòng đăng nhập lại.");
    } elseif (empty($newpassword) || empty($newpassword2)) {
        $TDTV = array("error" => "Vui lòng nhập mật khẩu mới và xác nhận lại mật khẩu mới.");
    } elseif ($newpassword !== $newpassword2) {
        $TDTV = array("error" => "Mật khẩu nhập lại không khớp.");
    } elseif (empty($passwordold)) {
        $TDTV = array("error" => "Vui lòng nhập mật khẩu cũ để có thể thay đổi mật khẩu mới.");
    } elseif (!CheckPassword($newpassword2)) {
        $TDTV = array("error" => "Mật khẩu mới không đúng định dạng!");
    } elseif (!CheckStrongPassword($newpassword2)) {
        $TDTV = array("error" => "Mật khẩu mới của bạn quá dễ đoán, hãy chọn mật khẩu khác!");
    } else {
        if (VerifyOldPassword($taikhoan, $passwordold, $thanhdieudb)) {
            if ($newpassword === $passwordold) {
                $TDTV = array("error" => "Mật khẩu mới phải khác với mật khẩu cũ.");
            } else {
                $hashed_pass = password_hash($newpassword, PASSWORD_BCRYPT, ['cost' => 7]);
                $oOo = $thanhdieudb->prepare("UPDATE users SET password=? WHERE username=?");
                $oOo->bind_param("ss", $hashed_pass, $taikhoan);
                if ($oOo->execute()) {
                    $TDTV = array("success" => true, "message" => "Bạn đã thay đổi mật khẩu mới thành công!");
                } else {
                    $TDTV = array("error" => "Đã xảy ra lỗi khi thay đổi mật khẩu mới.");
                }
            }
        } else {
            $TDTV = array("error" => "Mật khẩu cũ không đúng.");
        }
    }
    exit(json_encode($TDTV));
}
// YÊU CẦU HUY HIỆU XÁC MINH
if (isset($_POST['action']) && $_POST['action'] == 'user_verify_apply') {
    usleep(random_int(1500000, 2000000));
    $reason_desc = trim($_POST['reason_desc']);
    $tdtv = $thanhdieudb->query("SELECT level, ngaythamgia FROM users WHERE username='$taikhoan'")->fetch_assoc();
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["error" => "Phiên đã hết hạn vui lòng đăng nhập lại."]));
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        exit(json_encode(["error" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!"]));
    }

    if ($tdtv) {
        $isSVIP = (strpos($tdtv['level'], 'svip') !== false);
        $levelNumber = (int) filter_var($tdtv['level'], FILTER_SANITIZE_NUMBER_INT);
        if ((!$isSVIP && $tdtv['level'] < 4) || (time() - strtotime($tdtv['ngaythamgia'])) < (7 * 24 * 60 * 60)) {
            exit(json_encode(["error" => "Tài khoản của bạn chưa đạt yêu cầu để gửi yêu cầu xác minh danh tính."]));
        }
    }

    if (strlen($reason_desc) < 10) {
        exit(json_encode(["error" => "Lý do quá ngắn, hãy đảm bảo rằng bạn đang mô tả lý do đầy đủ!"]));
    } elseif (strlen($reason_desc) > 50) {
        exit(json_encode(["error" => "Nội dung lý do xác minh quá dài, vui lòng tóm tắt lại nội dung!"]));
    } else {
        $Owo = $thanhdieudb->prepare("SELECT status, created_at FROM ws_verification WHERE username=?");
        $Owo->bind_param("s", $taikhoan);
        $Owo->execute();
        $TD = $Owo->get_result();

        if ($TD->num_rows > 0) {
            $w = $TD->fetch_assoc();
            $created_at = strtotime($w['created_at']);
            if ($w['status'] == 'rejected' && (time() - $created_at) >= (3 * 24 * 60 * 60)) {
                $delete = $thanhdieudb->prepare("DELETE FROM ws_verification WHERE username=? AND status='rejected'");
                $delete->bind_param("s", $taikhoan);
                if ($delete->execute()) {
                    $thanhdieudb->query("SET @num := 0");
                    $thanhdieudb->query("UPDATE ws_verification SET verify_id=@num := @num + 1");
                    $thanhdieudb->query("ALTER TABLE ws_verification AUTO_INCREMENT=1");
                    $OoO = $thanhdieudb->prepare("INSERT INTO ws_verification (username, reason_desc, created_at) VALUES (?, ?, ?)");
                    $OoO->bind_param("sss", $taikhoan, $reason_desc, $time);
                    if ($OoO->execute()) {
                        exit(json_encode(["success" => true, "message" => "Yêu cầu xác minh của bạn đã được gửi, vui lòng kiên nhẫn chờ đợi."]));
                    } else {
                        exit(json_encode(["error" => "Đã xảy ra lỗi khi xác minh danh tính."]));
                    }
                } else {
                    exit(json_encode(["error" => "Đã xảy ra lỗi khi xác minh danh tính."]));
                }
            } else {
                if ($w['status'] == 'rejected') {
                    exit(json_encode(["error" => "Yêu cầu trước của bạn đã bị từ chối."]));
                } elseif ($w['status'] == 'pending') {
                    exit(json_encode(["error" => "Yêu cầu xác minh trước đó của bạn đang được xử lý, hãy kiên nhẫn chờ đợi kết quả!"]));
                } else {
                    exit(json_encode(["error" => "Tài khoản của bạn đã được xác minh danh tính."]));
                }
            }
        } else {
            $OoO = $thanhdieudb->prepare("INSERT INTO ws_verification (username, reason_desc, created_at,updated_at) VALUES (?, ?, ?, ?)");
            $OoO->bind_param("ssss", $taikhoan, $reason_desc, $time, $time);
            $thanhdieudb->query("INSERT INTO ws_logs SET username='$taikhoan', content='yêu cầu xác minh danh tính', action='Xác Minh Tài Khoản', time='$time'");
            exit(json_encode($OoO->execute() ? ["success" => true, "message" => "Yêu cầu xác minh của bạn đã được gửi, vui lòng kiên nhẫn chờ đợi."] : ["error" => "Đã xảy ra lỗi khi xác minh danh tính."]));
        }
    }
}
// THUÊ THANH TOÁN GÓI PLAN
if (isset($_POST['action']) && ($_POST['action'] == 'user_rent_plans_legacy' || $_POST['action'] == 'user_rent_plans_premium')) {
    usleep(random_int(700000, 1000000));
    $timeleft = trim($_POST['vip_product_timeleft']);
    $plans_name = trim($_POST['plan_name']);
    function RubyPoints($plans_name, $timeleft)
    {
        if ($plans_name == 'premium') {
            return ($timeleft == 'forever') ? random_int(1000, 2000) : random_int(2000, 5000);
        } elseif ($plans_name == 'legacy') {
            return ($timeleft == 'forever') ? random_int(300, 800) : random_int(800, 2000);
        }
        return 0;
    }
    function CheckExistingPlan($db, $taikhoan, $plans_name)
    {
        return mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) AS count FROM ws_plans WHERE taikhoan = '$taikhoan' AND tengoi = '$plans_name' AND trangthai = 1"))['count'] > 0;
    }

    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["error" => "Phiên đã hết hạn vui lòng đăng nhập lại."]));
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        exit(json_encode(["error" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!"]));
    } else {
        $price = 0;
        $duration = '';
        if ($plans_name == 'premium') {
            if (CheckExistingPlan($thanhdieudb, $taikhoan, 'premium')) {
                exit(json_encode(["error" => "Bạn đang sở hữu gói này. Không thể mua thêm nữa!"]));
            } elseif (CheckExistingPlan($thanhdieudb, $taikhoan, 'legacy')) {
                exit(json_encode(["error" => "Bạn đang sở hữu gói này. Không thể mua thêm nữa!"]));
            } else {
                $price = ($timeleft == 'forever') ? 399999 : 159999;
                $duration = ($timeleft == 'forever') ? '+888 year' : '+1 month';
            }
        } elseif ($plans_name == 'legacy') {
            if (CheckExistingPlan($thanhdieudb, $taikhoan, 'legacy')) {
                exit(json_encode(["error" => "Bạn đã sở hữu gói Legacy. Không thể mua thêm gói Legacy!"]));
            } elseif (CheckExistingPlan($thanhdieudb, $taikhoan, 'premium')) {
                exit(json_encode(["error" => "Bạn đã sở hữu gói Premium. Không thể mua thêm gói Legacy!"]));
            } else {
                $price = ($timeleft == 'forever') ? 199999 : 49000;
                $duration = ($timeleft == 'forever') ? '+888 year' : '+1 month';
            }
        }
        if ($price > 0 && empty($TDTV)) {
            if ($user['sodu'] >= $price) {
                $sodu_moi = $user['sodu'] - $price;
                $ngayhethan = date('Y-m-d H:i:s', strtotime($duration));
                $ruby_points = RubyPoints($plans_name, $timeleft);
                if (
                    mysqli_query($thanhdieudb, "INSERT INTO ws_plans (taikhoan, tengoi, giatien, ngaymua, ngayhethan, trangthai) 
                VALUES ('$taikhoan', '$plans_name', '$price', '$time', '$ngayhethan', 1)")
                ) {
                    mysqli_query($thanhdieudb, "UPDATE users SET sodu = '$sodu_moi', tongtieu = tongtieu + '$price', ruby = ruby + '$ruby_points' WHERE username = '$taikhoan'");
                    $into->wusteam(
                        'insert',
                        'ws_notify_system',
                        array(
                            'username' => $taikhoan,
                            'title' => 'Bạn đã thanh toán thành công gói ' . ucfirst($plans_name),
                            'message' => 'Xin chào! ' . $user['hovaten'] . '<br/>Cảm ơn bạn đã đăng ký gói dịch vụ thành viên vip.<br/><br/><div style="padding:10px 15px;border-radius:8px;line-height:1.7" class="muted-box">Thời Gian Đăng Ký: ' . FormatTime::TD($time) . '.<br/>Ngày Hết Hạn: ' . FormatTime::TD($ngayhethan) . '.<br>Gói Dịch Vụ: Thành viên ' . ucfirst($plans_name) . '</div><br/>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với dịch vụ CSKH.',
                            'created_at' => $time
                        )
                    );
                    $thanhdieudb->query("INSERT INTO `ws_logs` SET `username`='$taikhoan', `content`='đã thuê gói " . ucfirst($plans_name) . " với giá $price" . "đ', `time`='$time',`action`='Thuê Gói Đăng Ký'");
                    $thanhdieudb->query("INSERT INTO `ws_ruby` SET
                    `username`='$taikhoan',
                    `nhiemvu`='Mua gói " . ucfirst($plans_name) . "',
                    `sodiem`= sodiem + $ruby_points,
                    `sodiem_hientai`= " . $user['ruby'] . ",
                    `thoigian`='$time'
                 ");
                    exit(json_encode(["success" => true, "message" => "Đã thanh toán thành công gói " . ucfirst($plans_name) . "!"]));
                } else {
                    exit(json_encode(["error" => "Lỗi khi thực hiện giao dịch. Vui lòng thử lại sau!"]));
                }
            } else {
                exit(json_encode(["error" => "Số dư trong tài khoản không đủ để thanh toán gói này!"]));
            }
        }
    }
}
// Follow & Unfollow
if (isset($_POST['ws_follow_user'])) {
    header('Content-Type: application/json');
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : 0;
    $username = isset($_POST['username']) ? $_POST['username'] : 'THANHDIEU';
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(array('success' => false, 'message' => 'Phiên đã hết hạn vui lòng đăng nhập lại.')));
    } elseif ($taikhoan === $username) {
        exit(json_encode(array('success' => false, 'message' => 'Không thể tự theo dõi chính mình!')));
    } elseif (isset($user['ngaythamgia']) && ((time() - strtotime($user['ngaythamgia'])) < (24 * 60 * 60))) {
        exit(json_encode(array('success' => false, 'message' => 'Tài khoản được lập hơn 1 ngày mới có thể theo dõi!')));
    }
    $OoO = $thanhdieudb->prepare("SELECT COUNT(*) AS count FROM ws_follower WHERE follower_username = ? AND followed_id = ?");
    $OoO->bind_param("si", $taikhoan, $userID);
    $OoO->execute();
    $TD_Count = $OoO->get_result()->fetch_assoc()['count'];
    if ($TD_Count > 0) {
        $OoO = $thanhdieudb->prepare("DELETE FROM ws_follower WHERE follower_username = ? AND followed_id = ?");
        $OoO->bind_param("si", $taikhoan, $userID);
        $OoO->execute();
    } else {
        $OoO = $thanhdieudb->prepare("INSERT INTO ws_follower (follower_username, followed_username, followed_id, created_at) VALUES (?, ?, ?, '$time')");
        $OoO->bind_param("ssi", $taikhoan, $username, $userID);
        $OoO->execute();
    }
    if ($OoO->affected_rows > 0) {
        if ($TD_Count > 0) {
            exit(json_encode(array('error' => true, 'message' => 'Bạn đã bỏ theo dõi người dùng này!')));
        } else {
            exit(json_encode(array('success' => true, 'message' => 'Bạn đã theo dõi người dùng này!')));
        }
    } else {
        exit(json_encode(array('success' => false, 'message' => 'Có lỗi xảy ra khi thực hiện thao tác này!')));
    }
}
// Reset Password
if (isset($_POST['action']) && $_POST['action'] == 'send_code') {
    usleep(random_int(1000000, 1200000));
    $email = trim($_POST['email']);
    $query = $thanhdieudb->prepare("SELECT username FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $oOo = $thanhdieudb->prepare("SELECT expires_at FROM ws_resetpw WHERE email = ? AND expires_at > NOW() LIMIT 1");
        $oOo->bind_param("s", $email);
        $oOo->execute();
        $oOo = $oOo->get_result();
        if ($oOo->num_rows > 0) {
            $row = $oOo->fetch_assoc();
            $expires_at = $row['expires_at'];
            $remaining_time = strtotime($expires_at) - time();
            exit(json_encode(['success' => true, 'message' => 'Mã xác minh đã được gửi trước đó, hãy thử kiểm tra tin nhắn trong thư rác!', 'expires_at' => $expires_at, 'remaining_time' => $remaining_time]));
        } else {
            $reset_code = random_int(100000, 999999);
            $expires_at = date('Y-m-d H:i:s', strtotime('+1 minute 2 second'));
            $OoO = $thanhdieudb->prepare("INSERT INTO ws_resetpw (username, email, reset_code, created_at, expires_at) VALUES (?, ?, ?, ?, ?)");
            $OoO->bind_param("sssss", $username, $email, $reset_code, $time, $expires_at);
            $OoO->execute();
            if ($OoO->affected_rows > 0) {
                $remaining_time = strtotime($expires_at) - time();
                exit(json_encode(['success' => true, 'message' => 'Hệ thống đã gửi mã xác nhận gồm 6 chữ số, hãy kiểm tra hộp thư email của bạn!', 'expires_at' => $expires_at, 'remaining_time' => $remaining_time]));
            } else {
                exit(json_encode(['success' => false, 'error' => 'Có lỗi xảy ra khi gửi mã xác nhận.']));
            }
        }
    } else {
        exit(json_encode(['success' => false, 'error' => 'Địa chỉ email này không tồn tại hoặc chưa liên kết với một tài khoản nào.']));
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'user_reset_pass') {
    $code = trim($_POST['code']);
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit(json_encode(['success' => false, 'error' => 'Vui lòng nhập địa chỉ email của bạn!']));
    } else {
        exit(json_encode(['success' => false, 'error' => 'Không thể xử lý yêu cầu này ngay bay giờ, mã lỗi 0x000001!']));
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'report_user') {
    function ValidateField($field, $fieldname, &$errormsg)
    {
        if (empty($field) && empty($errormsg)) {
            $errormsg = "{$fieldname}";
        }
    }
    $victim = isset($_POST['victim']) ? trim($_POST['victim']) : null;
    $url = isset($_POST['url']) ? trim($_POST['url']) : null;
    $reason = isset($_POST['reason']) ? trim($_POST['reason']) : null;
    $reason_other = isset($_POST['reason_other']) ? trim($_POST['reason_other']) : null;
    $desc = isset($_POST['desc']) ? trim($_POST['desc']) : null;
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . __IMG__ . '/uploads/bang-chung/';
    ValidateField($url, 'Vui lòng nhập liên kết báo cáo!', $errors);
    if ((empty($reason)) || ($reason === 'Lý do khác' && empty($reason_other))) {
        $errors = "Vui lòng chọn hoặc nêu lý do vi phạm!";
    }
    ValidateField($desc, 'Vui lòng cung cấp mô tả hành vi vi phạm cụ thể!', $errors);
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(array("error" => "Phiên đã hết hạn vui lòng đăng nhập lại.")));
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        exit(json_encode(array("error" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!")));
    } elseif (!empty($errors)) {
        exit(json_encode(array("error" => $errors)));
    } else {
        $stmt = $thanhdieudb->prepare("SELECT status FROM ws_reports WHERE username = ? AND victim = ? ORDER BY created_at DESC LIMIT 1");
        $stmt->bind_param("ss", $taikhoan, $victim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $report = $result->fetch_assoc();
            if ($report['status'] === 'pending') {
                exit(json_encode(array("modal" => "show")));
            }
        }
        $uploadSuccess = true;
        $uploadMessages = array();
        if (!empty($_FILES['image_upload']['name'])) {
            foreach ($_FILES['image_upload']['name'] as $key => $name) {
                $fileTmpPath = $_FILES['image_upload']['tmp_name'][$key];
                $fileNameCmps = explode(".", $name);
                $fileExtension = strtolower(end($fileNameCmps));
                $fileName = md5($name) . '.t.' . date('Y-m-d') . '.' . $fileExtension;
                $target_img = $filePath . $fileName;
                $fileSize = $_FILES['image_upload']['size'][$key];

                if (!in_array($fileExtension, array("jpg", "jpeg", "png", "gif", "webp"))) {
                    $uploadSuccess = false;
                    $uploadMessages[] = "Chỉ cho phép tải lên các tệp JPG, WEBP, PNG hoặc GIF.";
                } elseif ($fileSize > 2097152) {
                    $uploadSuccess = false;
                    $uploadMessages[] = "Kích thước ảnh quá lớn hãy chọn ảnh dưới 2MB!";
                } elseif (!move_uploaded_file($fileTmpPath, $target_img)) {
                    $uploadSuccess = false;
                    $uploadMessages[] = "Không thể tải lên hình ảnh: $name.";
                } else {
                    $uploadedImages[] = $fileName;
                }
            }
        } else {
            $uploadSuccess = false;
            $uploadMessages[] = "Không có tệp nào được tải lên.";
        }
        if (!$uploadSuccess) {
            exit(json_encode(array("error" => implode(", ", $uploadMessages))));
        }
        $images = implode(",", $uploadedImages);
        $vtd = $thanhdieudb->prepare("INSERT INTO ws_reports (username, victim, reason, reason_other, url_report, desc_content, images, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $vtd->bind_param("ssssssss", $taikhoan, $victim, $reason, $reason_other, $url, $desc, $images, $time);
        if ($vtd->execute()) {
            exit(json_encode(array("success" => true, "message" => "Chúng tôi sẽ sớm xem xét báo cáo của bạn!")));
        } else {
            exit(json_encode(array("error" => "Có lỗi xảy ra khi gửi báo cáo của bạn.")));
        }
    }
}
if (isset($_POST['notification_system'])) {
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(array('success' => false, 'message' => 'Phiên đã hết hạn vui lòng đăng nhập lại.')));
    }
    usleep(random_int(700000, 1000000));
    $id = $_POST['id'];
    $query = $thanhdieudb->prepare("SELECT * FROM ws_notify_system WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        $notification = $result->fetch_assoc();
        $update->update("UPDATE ws_notify_system SET isread = 1 WHERE id = '$id'");
        ob_start();
        Show($notification, $TD);
        $output = ob_get_clean();
        echo $output;
    } else {
        echo '<div class="text-center mb20 padding-h10 muted-2-color no-more separator">Không có thông báo nào</div>';
    }
}

function Show($notification, $TD)
{ ?>
    <div class="msg-content ajax-item">
        <div class="box-body nopw-sm border-bottom">
            <dt class="em12"><?= $notification['title'] ?></dt>
            <dd class="mt10 muted-2-color flex ac">
                <span class="msg-img">
                    <img class="fit-cover lazyload" src="/<?= __IMG__ ?>/favicon.png" data-src="/<?= __IMG__ ?>/favicon.png"
                        alt="Hệ Thống <?= $TD->Setting('name-site') ?>">
                </span>
                Hệ Thống <?= $TD->Setting('name-site'); ?>
            </dd>
        </div>
        <div class="box-body nopw-sm border-bottom"><?= $notification['message'] ?></div>
        <div class="box-body nopw-sm">
            <a href="javascript:;" data-onclick="[data-target='#msg-tab-system']" class="focus-color back-msg">
                <i class="fa fa-angle-left"></i> Trở lại
            </a>
            <div class="muted-2-color pull-right">
                <span class="time-ago" data-timeago="<?= $notification['created_at'] ?>">
                    <i class="fa fa-clock-o mr3" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
    <?php
}
if (isset($_POST['action']) && $_POST['action'] == 'dohot') {
    $author = $_POST['author'];
    $update->update("UPDATE users SET dohot = dohot + 1 WHERE username = '$author'");
    $count = $thanhdieudb->query("SELECT dohot FROM users WHERE username = '$author'")->fetch_assoc()['dohot'];
    exit(json_encode(['dohot' => CountFormatter::WS($count)]));
}
// Mua sản phẩm
if (isset($_POST['action']) && $_POST['action'] == 'order-product') {
    usleep(random_int(1000000, 1200000));
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(["error" => "Phiên đã hết hạn vui lòng đăng nhập lại."]));
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        exit(json_encode(["error" => "Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!"]));
    } else {
        $product_id = $_POST['product_id'];
        $order_name = $_POST['order_name'];
        $phan_loai = $_POST['phan_loai'];
        $vtd = $thanhdieudb->query("SELECT giatien, download_url FROM ws_products WHERE id = '$product_id'");
        if ($vtd->num_rows == 0) {
            exit(json_encode(["error" => "Sản phẩm không còn tồn tại nữa."]));
        }
        $w = $vtd->fetch_assoc();
        $gia_ban = $w['giatien'] ?? null;
        $download_url = $w['download_url'] ?? null;
        if ($user['sodu'] < $gia_ban) {
            exit(json_encode(["error" => "Số dư không đủ để thanh toán."]));
        }
        if ($thanhdieudb->query("SELECT * FROM ws_history_products WHERE product_id = '$product_id' AND taikhoan = '$taikhoan'")->num_rows > 0) {
            exit(json_encode(["error" => "Thất bại! bạn đã mua sản phẩm này rồi."]));
        }
        $new_sodu = $user['sodu'] - $gia_ban;
        $update->update("UPDATE users SET sodu = '$new_sodu' WHERE username = '$taikhoan'");
        $into->wusteam('insert', 'ws_history_products', ['product_id' => $product_id, 'taikhoan' => $taikhoan, 'giamua' => $gia_ban, 'ngaymua' => $time, 'phanloai' => $phan_loai, 'magiaodich' => bin2hex(random_bytes(10))]);
        $into->wusteam('insert', 'ws_logs', ['username' => $taikhoan, 'content' => 'mua sản phẩm #' . $product_id . '', 'action' => 'Thanh Toán Đơn Hàng', 'time' => $time]);
        $update->update("UPDATE ws_products SET luotmua = luotmua + 1 WHERE id = '$product_id'");
        exit(json_encode(["success" => true, "message" => "Bạn đã thanh toán thành công!", "download" => $download_url, "hovaten" => $user['hovaten'], "giamua" => FormatNumber::TD($gia_ban) . 'đ', "ngaymua" => FormatTime::TD($time)]));
    }
}
// Điểm Danh
if (isset($_POST['action']) && $_POST['action'] == 'diemdanh') {
    usleep(random_int(400000, 700000));
    if ((new SessionExpiredChecker())->check($taikhoan, $user)) {
        exit(json_encode(['success' => false, 'message' => 'Phiên đã hết hạn vui lòng đăng nhập lại.']));
    } elseif (!TDSpamChecker::TD($taikhoan, $TD)) {
        exit(json_encode(['success' => false, 'message' => 'Bạn thao tác quá thường xuyên. Vui lòng thử lại sau!']));
    } else {
        $today = date('Y-m-d');
        if (mysqli_num_rows(mysqli_query($thanhdieudb, "SELECT * FROM ws_diemdanh WHERE taikhoan='$taikhoan' AND DATE(thoigian) >= '$today'")) > 0) {
            exit(json_encode(['success' => false, 'message' => 'Bạn đã điểm danh trong hôm nay rồi, hãy quay lại sau.']));
        }
        if (mysqli_query($thanhdieudb, "UPDATE users SET ruby=ruby + 5, exp=exp + 40 WHERE username='$taikhoan'")) {
            mysqli_query($thanhdieudb, "INSERT INTO ws_diemdanh (taikhoan, ruby, exp, thoigian) VALUES ('$taikhoan', 5, 40, '$time')");
            $into->wusteam('insert', 'ws_logs', [
                'username' => $taikhoan,
                'content' => 'điểm danh +5 điểm ruby và +40 kinh nghiệm',
                'action' => 'Điểm Danh',
                'time' => $time
            ]);
            $thanhdieudb->query("INSERT INTO ws_ruby (username, nhiemvu, sodiem, sodiem_hientai, thoigian) VALUES ('$taikhoan', 'Điểm danh hằng ngày', 5, '{$user['ruby']}', '$time')");
            exit(json_encode(['success' => true, 'message' => 'Đã điểm danh +5 điểm ruby và +40 kinh nghiệm.']));
        } else {
            exit(json_encode(['success' => false, 'message' => 'Có lỗi không mong muốn xảy ra.']));
        }
    }
}

if (isset($_POST['main_products'])) {
    usleep(random_int(100000, 280000));
    class ProductManager extends DatabaseConnection
    {
        public function WsShowProducts($current_page = 1, $tab = 'index-main', $type = null)
        {
            global $cut,$taikhoan,$ip;
            $limit = 16;
            $offset = ($current_page - 1) * $limit;
            $ws_tab = ($tab === 'index-website') ? "phanloai = 'manguon-website'" :
                (($tab === 'index-software') ? "phanloai = 'manguon-phanmem'" :
                    (($tab === 'index-other') ? "phanloai = 'manguon-khac'" : "1"));
            if ($type === 'update') {
                $orderBy = 'ws_products.ngaycapnhat';
            } elseif ($type === 'views') {
                $orderBy = 'ws_products.luotxem';
            } elseif ($type === 'like') {
                $orderBy = 'luotlike';
            } elseif ($type === 'comment') {
                $orderBy = 'luotcmt';
            } elseif ($type === 'price') {
                $orderBy = 'giatien';
            } else {
                $orderBy = 'ws_products.ngaydang';
            }
            $OoOo = self::ThanhDieuDB()->query("SELECT 
                ws_products.*, 
                users.user_id, 
                users.hovaten,
                users.banned,
                users.username, 
                users.avatar, 
                users.rank, 
                COUNT(DISTINCT ws_comments.comment_id) AS luotcmt,
                ws_plans.tengoi AS plans, 
                COUNT(DISTINCT ws_like.like_id) AS luotlike
            FROM 
                ws_products
            LEFT JOIN 
                users ON ws_products.taikhoan = users.username
            LEFT JOIN 
                ws_comments ON ws_products.id = ws_comments.product_id
            LEFT JOIN 
                ws_plans ON users.username = ws_plans.taikhoan
            LEFT JOIN 
                ws_like ON ws_products.id = ws_like.product_id
            WHERE 
                ws_products.xetduyet = 1 
                AND $ws_tab 
                AND users.banned != 1
            GROUP BY 
                ws_products.id, 
                users.user_id, 
                users.hovaten, 
                users.banned, 
                users.username, 
                users.avatar, 
                users.rank, 
                ws_plans.tengoi
            ORDER BY 
                ws_products.is_pinned DESC, 
                $orderBy DESC
            LIMIT 
                $limit OFFSET $offset
        ");
            $totalProducts = self::ThanhDieuDB()->query("SELECT COUNT(ws_products.id) as total FROM ws_products LEFT JOIN users ON ws_products.taikhoan = users.username WHERE ws_products.xetduyet = 1 AND $ws_tab AND users.banned != 1")->fetch_assoc()['total'];
            $WsNumRows = $OoOo->num_rows;
            $products = array();
            if ($WsNumRows > 0) {
                $mau = array('manguon-website' => 'c-blue', 'manguon-phanmem' => 'c-yellow', 'manguon-khac' => 'c-pink', );
                $icon = array('manguon-website' => 'ri-code-s-slash-line', 'manguon-phanmem' => 'ri-tools-line', 'manguon-khac' => 'ri-openai-fill', );
                while ($td = $OoOo->fetch_assoc()) {
                    (new GlobalViews($td['id'], $taikhoan, $ip, $td['slug']))->LuotXem();
                    if ($td['is_pinned'] == 1) {
                        $ghim = '<badge class="hk-pinned img-badge left jb-red">Ghim đầu trang</badge><div class="n-collect-item-bottom post-2">
                    <span class="bottom-l">Sản Phẩm Được Ghim 📌</span>
                  </div>';
                    } else {
                        $ghim = null;
                    }
                    $hk_product = '<posts class="posts-item card ajax-item" role="group" aria-label="ThanhDieu / ' . $td['id'] . '">
                        <div class="item-thumbnail">
                            <a href="/view-code/' . $td['slug'] . '">
                                <img src="/' . __IMG__ . '/loading.gif" data-src="/' . __IMG__ . '/uploads/' . $td['hinhthunho'] . '" alt="' . $td['tieude'] . '" class="fit-cover radius8 lazyload">
                            </a>
                            ' . $ghim . '
                        </div>
                        <div class="item-body">
                            <h2 class="item-heading">
                                <a href="/view-code/' . $td['slug'] . '">' . $td['tieude'] . '</a>
                            </h2>
                            ' . ((time() - strtotime($td['ngaydang']) <= 2 * 24 * 60 * 60) ? '<div class="new"><img src="/' . __IMG__ . '/icon/news.png"></div>' : '') . '
                            <div class="item-tags scroll-x no-scrollbar mb6">
                                <a class="meta-pay but ' . ((empty($td['giatien']) || $td['giatien'] === 0) ? 'c-green' : ColorGiaBan($td['giatien'])) . '">
                                    ' . ((empty($td['giatien']) || $td['giatien'] === 0) ? 'Miễn Phí' : FormatNumber::TD($td['giatien'], 2) . 'đ') . '
                                </a>
                                <a class="but ' . $mau[$td['phanloai']] . '">
                                    <i class="' . $icon[$td['phanloai']] . '" aria-hidden="true"></i>&nbsp;' . PhanLoai($td['phanloai']) . '
                                </a>
                            </div>
                            <a class="down" href="/view-code/' . $td['slug'] . '">Xem Ngay</a>
                        </div></posts>';
                    $products[] = $hk_product;
                }
            }
            $totalProducts = intval($totalProducts);
            if ($totalProducts > $limit) {
                $totalPages = ceil($totalProducts / $limit);
                $pagination = null;
                $pagination .= '<div class="pagenav ajax-pag">';
                if ($current_page > 1) {
                    $pagination .= '<a class="prev page-numbers" href="?page=' . ($current_page - 1) . '">';
                    $pagination .= '<i class="fa fa-angle-left em12"></i>';
                    $pagination .= '<span class="hide-sm ml6">Trang trước</span>';
                    $pagination .= '</a>';
                }
                $showDots = true;
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i === $current_page) {
                        $pagination .= '<a class="page-numbers current" href="?page=' . $i . '">' . $i . '</a>';
                        $showDots = true;
                    } else {
                        if (
                            $i === 1 || $i === $totalPages ||
                            ($i >= $current_page - 1 && $i <= $current_page + 1) ||
                            ($i <= 2 || $i >= $totalPages - 2)
                        ) {
                            $pagination .= '<a class="page-numbers" href="?page=' . $i . '">' . $i . '</a>';
                            $showDots = true;
                        } elseif ($showDots) {
                            $pagination .= '<span class="page-numbers dots">…</span>';
                            $showDots = false;
                        }
                    }
                }
                if ($current_page < $totalPages) {
                    $pagination .= '<a class="next page-numbers" href="?page=' . ($current_page + 1) . '">';
                    $pagination .= '<span class="hide-sm mr6">Trang tiếp theo</span>';
                    $pagination .= '<i class="fa fa-angle-right em12"></i>';
                    $pagination .= '</a>';
                }

                $pagination .= '</div>';
            } else {
                $pagination = '<div class="hide text-center mb20 padding-h10 muted-2-color no-more separator">Đã hiển thị tất cả dữ liệu</div>';
            }
            if ($WsNumRows > 0) {
                $response = array(
                    'success' => true,
                    'products' => $products,
                    'pagination' => $pagination
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => '<div class="f404"><img src="/' . __IMG__ . '/svg/404.svg"><p class="mt6 em09 muted-3-color separator">Chưa có mã nguồn nào</p></div>'
                );
            }

            echo json_encode($response);
        }
    }
    (new ProductManager())->WsShowProducts(isset($_POST['page']) ? intval($_POST['page']) : 1, isset($_POST['tab']) ? $_POST['tab'] : 'index-main', isset($_POST['type']) ? $_POST['type'] : null);
}
// Search
if (isset($_POST['search_code'])) {
    usleep(random_int(300000, 500000));
    class SearchCode extends DatabaseConnection
    {
        public function WsShowCode($current_page = 1, $tab = 'code', $keywords = null)
        {
            global $cut, $TD, $taikhoan, $ip;
            $limit = 20;
            $offset = ($current_page - 1) * $limit;

            $escaped_keywords = self::ThanhDieuDB()->real_escape_string($keywords);
            if ($keywords !== null && $keywords !== 'Tất Cả') {
                $query = "(ws_products.slug LIKE '%$escaped_keywords%' OR ws_products.tieude LIKE '%$escaped_keywords%' OR ws_products.noidung LIKE '%$escaped_keywords%') AND";
            } else {
                $query = '';
            }
            $OoOo = self::ThanhDieuDB()->query("SELECT 
                    ws_products.*, 
                    users.user_id, 
                    users.hovaten,
                    users.banned,
                    users.username, 
                    users.avatar, 
                    users.rank, 
                    COUNT(DISTINCT ws_comments.comment_id) + COUNT(DISTINCT ws_comments_reply.reply_id) AS luotcmt,
                    ws_plans.tengoi AS plans
                FROM 
                    ws_products
                LEFT JOIN 
                    users ON ws_products.taikhoan = users.username
                LEFT JOIN 
                    ws_comments ON ws_products.id = ws_comments.product_id
                LEFT JOIN 
                    ws_comments_reply ON ws_comments.comment_id = ws_comments_reply.parent_comment_id
                LEFT JOIN 
                    ws_plans ON users.username = ws_plans.taikhoan
                LEFT JOIN 
                    ws_like ON ws_products.id = ws_like.product_id
                WHERE 
                    ws_products.xetduyet = 1 
                    AND $query 
                    users.banned != 1
                GROUP BY 
                    ws_products.id, users.user_id, users.hovaten, users.banned, users.username, users.avatar, users.rank, ws_plans.tengoi
                ORDER BY 
                    ws_products.ngaydang DESC
                LIMIT 
                    $limit OFFSET $offset
            ");

            $totalProducts = self::ThanhDieuDB()->query("
                SELECT COUNT(ws_products.id) as total 
                FROM ws_products 
                LEFT JOIN users ON ws_products.taikhoan = users.username 
                WHERE ws_products.xetduyet = 1 AND $query users.banned != 1
            ")->fetch_assoc()['total'];

            $WsNumRows = $OoOo->num_rows;
            $products = array();
            $pagination = '';
            if ($WsNumRows > 0) {
                $mau = array(
                    'manguon-website' => 'c-blue',
                    'manguon-phanmem' => 'c-yellow',
                    'manguon-khac' => 'c-pink'
                );
                $icon = array(
                    'manguon-website' => 'ri-code-s-slash-line',
                    'manguon-phanmem' => 'ri-tools-line',
                    'manguon-khac' => 'ri-openai-fill'
                );
                while ($td = $OoOo->fetch_assoc()) {
                    (new GlobalViews($td['id'], $taikhoan, $ip, $td['slug']))->LuotXem();
                    $hk_product = '<posts class="posts-item card ajax-item" role="group" aria-label="ThanhDieu /">
                        <div class="item-thumbnail">
                            <a href="/view-code/' . $td['slug'] . '">
                                <img src="/' . __IMG__ . '/loading.gif" data-src="/' . __IMG__ . '/uploads/' . $td['hinhthunho'] . '" alt="' . THANHDIEU($td['tieude']) . '" class="fit-cover radius8 lazyload">
                            </a>
                        </div>
                        <div class="item-body">
                            <h2 class="item-heading">
                                <a href="/view-code/' . $td['slug'] . '">' . $td['tieude'] . '</a>
                            </h2>' .
                        ((time() - strtotime($td['ngaydang']) <= 3 * 24 * 60 * 60) ? '<div class="new"><img src="/' . __IMG__ . '/icon/news.png"></div>' : '') .
                        '<div class="item-tags scroll-x no-scrollbar mb6">
                                <a class="meta-pay but ' . (empty($td['giatien']) || $td['giatien'] === 0 ? 'c-green' : ColorGiaBan($td['giatien'])) . '">
                                    ' . (empty($td['giatien']) || $td['giatien'] === 0 ? 'Miễn Phí' : FormatNumber::TD($td['giatien'], 2) . 'đ') . '
                                </a>
                                <a class="but ' . $mau[$td['phanloai']] . '">
                                    <i class="' . $icon[$td['phanloai']] . '" aria-hidden="true"></i>&nbsp;' . PhanLoai($td['phanloai']) . '
                                </a>
                            </div>
                            <div class="item-meta muted-2-color flex jsb ac">
                                <item class="meta-author flex ac">
                                    <a href="/profile/@' . $td['username'] . '">
                                        <span class="avatar-mini">
                                            <img alt="Avatar của ' . $td['hovaten'] . ' - ' . $TD->Setting('name-site') . '" src="/' . __IMG__ . '/users/' . $td['avatar'] . '" data-src="/' . __IMG__ . '/users/' . $td['avatar'] . '" class="avatar avatar-id-' . $td['user_id'] . ' lazyload">
                                            ' . (new PlansIcon())->icon($td['username']) . '
                                            ' . ShowPlans::TD($td['username']) . '
                                        </span>
                                    </a>
                                    <div class="ml6" style="white-space:nowrap;">
                                    <b>' . (isMobile() ? $cut->characters($td['hovaten'], 11) : $td['hovaten']) . '</b><br />
                                        <span data-timeago="' . $td['ngaydang'] . '" class="time-ago">' . $td['ngaydang'] . '</span>
                                    </div>
                                </item>
                                <div class="meta-right text-nowrap">
                                    <item class="meta-view">
                                        <i class="icon ri-eye-line"></i> ' . CountFormatter::WS($td['luotxem']) . '
                                    </item>
                                    <item class="meta-like">
                                        <i class="icon ri-thumb-up-line"></i> ' . CountFormatter::WS($td['luotlike']) . '
                                    </item>
                                    <item class="meta-comm">
                                        <i class="icon ri-message-2-line"></i> ' . CountFormatter::WS($td['luotcmt']) . '
                                    </item>
                                </div>
                            </div>
                        </div>
                    </posts>';
                    $products[] = $hk_product;
                }
            }
            $totalProducts = intval($totalProducts);
            $searchInfo = '<div win-ajax-replace="search-key">
                <div class="badg">Tìm kiếm [ <a href="#">
                <b class="search-key focus-color">' . THANHDIEU($keywords ?? 'Tất Cả') . '</b>
                    </a>] tổng cộng <b class="focus-color">' . $totalProducts . '</b> mã nguồn </div>
            </div>';
            if ($totalProducts > $limit) {
                $totalPages = ceil($totalProducts / $limit);
                $pagination = '<div class="pagenav ajax-pag">';
                if ($current_page > 1) {
                    $pagination .= '<a class="prev page-numbers" href="?page=' . ($current_page - 1) . '">';
                    $pagination .= '<i class="fa fa-angle-left em12"></i>';
                    $pagination .= '<span class="hide-sm ml6">Trang trước</span>';
                    $pagination .= '</a>';
                }
                $showDots = true;
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i === $current_page) {
                        $pagination .= '<a class="page-numbers current" href="?page=' . $i . '">' . $i . '</a>';
                        $showDots = true;
                    } else {
                        if (
                            $i === 1 || $i === $totalPages ||
                            ($i >= $current_page - 1 && $i <= $current_page + 1) ||
                            ($i <= 2 || $i >= $totalPages - 2)
                        ) {
                            $pagination .= '<a class="page-numbers" href="?page=' . $i . '">' . $i . '</a>';
                            $showDots = true;
                        } elseif ($showDots) {
                            $pagination .= '<span class="page-numbers dots">…</span>';
                            $showDots = false;
                        }
                    }
                }
                if ($current_page < $totalPages) {
                    $pagination .= '<a class="next page-numbers" href="?page=' . ($current_page + 1) . '">';
                    $pagination .= '<span class="hide-sm mr6">Trang sau</span>';
                    $pagination .= '<i class="fa fa-angle-right em12"></i>';
                    $pagination .= '</a>';
                }
                $pagination .= '</div>';
            }

            if ($WsNumRows > 0) {
                $response = array(
                    'success' => true,
                    'message' => $searchInfo,
                    'products' => $products,
                    'pagination' => $pagination
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => $searchInfo . '<div class="f-not-found"><img src="/' . __IMG__ . '/icon/no-found.png"><p class="mt20 em09 muted-3-color separator">Không còn nội dung nào</p></div>',
                    'products' => array('search_count' => $totalProducts)
                );
            }

            echo json_encode($response);
        }
    }
    (new SearchCode())->WsShowCode(isset($_POST['page']) ? intval($_POST['page']) : 1, isset($_POST['tab']) ? $_POST['tab'] : 'code', isset($_POST['keywords']) ? $_POST['keywords'] : null);
}

// 2
if (isset($_POST['search_user'])) {
    usleep(random_int(200000, 400000));
    class SearchUser extends DatabaseConnection
    {
        public function WsShowUsers($page = 1, $keywords = null)
        {
            global $cut, $TD;
            $limit = ($page === 1) ? 9999 : 9999;
            $offset = ($page - 1) * $limit;
            $query = '';
            if ($keywords !== null && $keywords !== 'Tất Cả') {
                $query = "(users.username LIKE '%$keywords%' OR users.hovaten LIKE '%$keywords%' OR users.user_id LIKE '%$keywords%') AND";
            }
            $OoOo = self::ThanhDieuDB()->query("
                SELECT users.*, 
                    COALESCE(ws_verification.username, users.username) AS username, 
                    ws_verification.status,
                    ws_plans.tengoi AS plans
                FROM users
                LEFT JOIN ws_verification ON users.username = ws_verification.username
                LEFT JOIN ws_plans ON users.username = ws_plans.taikhoan
                WHERE $query users.banned != 1
                LIMIT $limit OFFSET $offset
            ");

            $totalUsersQuery = self::ThanhDieuDB()->query("
                SELECT COUNT(users.user_id) as total 
                FROM users 
                WHERE $query users.banned != 1
            ");
            $totalUsers = $totalUsersQuery->fetch_assoc()['total'];
            $WsNumRows = $OoOo->num_rows;
            $user = array();

            if ($WsNumRows > 0) {
                while ($user1 = $OoOo->fetch_assoc()) {
                    $hk_users = "<div class='author-minicard radius8 relative-h ajax-item'>
                            <ul class='list-inline relative'>
                                <li>
                                    <a href='/profile/@" . $user1['username'] . "'>
                                        <span class='avatar-img'>
                                            <img alt='Avatar của " . THANHDIEU($user1['hovaten']) . " - {$TD->Setting('name-site')}' 
                                                src='/" . __IMG__ . '/users/' . $user1['avatar'] . "' 
                                                data-src='/" . __IMG__ . '/users/' . $user1['avatar'] . "' 
                                                class='avatar avatar-id-{$user1['user_id']} lazyload'>
                                                " . (new PlansIcon())->icon($user1['username']) . "
                                            " . ShowPlans::TD($user1['username']) . "
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <dl>
                                        <dt class='flex ac'>
                                            <name class='flex ac flex1'>
                                                <a class='display-name text-ellipsis' href='/profile/@" . $user1['username'] . "'>
                                                    <b>" . THANHDIEU($user1['hovaten']) . "</b>
                                                </a>
                                                " . WSInfoProfileShow::TD($user1) . "
                                            </name>
                                        </dt>
                                        <dd class='mt6 em09 muted-color text-ellipsis'>" . $user1['tieusu'] . "</dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>";
                    $user[] = $hk_users;
                }
            }
            $totalUsers = intval($totalUsers);
            $hasMore = $offset + $WsNumRows < $totalUsers;
            $loadMore = '';
            if ($hasMore) {
                $loadMore = "
                        <div class='next-page ajax-next'>
                            <a href='#'>
                                <i class='fa fa-angle-right'></i>Tải Thêm
                            </a>
                    </div>";
            }
            if ($WsNumRows > 0) {
                $response = array(
                    'success' => $WsNumRows > 0,
                    'user' => $user,
                    'totalUsers' => $totalUsers,
                    'loadMore' => $loadMore
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => '<div class="f-not-found"><img src="/' . __IMG__ . '/icon/no-found.png"><p class="mt20 em09 muted-3-color separator">Không còn nội dung nào</p></div>',
                );
            }
            echo json_encode($response);

        }
    }

    (new SearchUser())->WsShowUsers(isset($_POST['page']) ? $_POST['page'] : 1, isset($_POST['keywords']) ? $_POST['keywords'] : null);
    exit;
}
// Profile tab
if (isset($_POST['profile_products'])) {
    usleep(random_int(170000, 200000));
    class ProfileCode extends DatabaseConnection
    {
        public function WsShowCode($current_page = 1, $type = 'date', $xetduyet = '1', $author = null)
        {
            global $cut, $TD, $taikhoan, $ip;
            $limit = 6;
            $offset = ($current_page - 1) * $limit;

            switch ($type) {
                case 'date':
                    $orderBy = 'p.ngaydang DESC';
                    break;
                case 'modified':
                    $orderBy = 'p.ngaycapnhat DESC';
                    break;
                case 'views':
                    $orderBy = 'p.luotxem DESC';
                    break;
                case 'like':
                    $orderBy = 'p.luotlike DESC';
                    break;
                case 'comment_count':
                    $orderBy = 'luotcmt DESC';
                    break;
                case 'buy_count':
                    $orderBy = 'p.luotmua DESC';
                    break;
                default:
                    $orderBy = 'p.ngaydang DESC';
                    break;
            }
            $OoOo = self::ThanhDieuDB()->query("SELECT p.*, IFNULL(c.luotcmt, 0) AS luotcmt 
            FROM ws_products p
            LEFT JOIN (
                SELECT product_id, COUNT(comment_id) AS luotcmt
                FROM ws_comments
                GROUP BY product_id
            ) c ON p.id = c.product_id
            WHERE p.taikhoan = '$author' AND p.xetduyet = '$xetduyet'
            ORDER BY $orderBy
            LIMIT $limit OFFSET $offset");

            $totalProductsResult = self::ThanhDieuDB()->query("
                SELECT COUNT(ws_products.id) AS total 
                FROM ws_products 
                WHERE ws_products.taikhoan = '$author' AND ws_products.xetduyet = '$xetduyet'
            ");

            $totalProducts = $totalProductsResult->fetch_assoc()['total'];

            $products = array();
            while ($td = $OoOo->fetch_assoc()) {
                (new GlobalViews($td['id'], $taikhoan, $ip, $td['slug']))->LuotXem();
                $mau = array('manguon-website' => 'c-blue', 'manguon-phanmem' => 'c-yellow', 'manguon-khac' => 'c-pink');
                $icon = array('manguon-website' => 'ri-code-s-slash-line', 'manguon-phanmem' => 'ri-tools-line', 'manguon-khac' => 'ri-openai-fill');
                $HK_PRODUCT = '<posts class="posts-item list ajax-item no_margin flex">
                <div class="post-graphic">
                    <div class="item-thumbnail">
                        <a target="_blank" href="/view-code/' . $td['slug'] . '">
                            <img src="/' . __IMG__ . '/loading.gif"
                                data-src="' . '/' . __IMG__ . '/uploads/' . $td['hinhthunho'] . '" alt="' . THANHDIEU($td['tieude']) . '"
                                class="fit-cover radius8 lazyload">
                        </a>
                    </div>
                </div>
                <div class="item-body flex xx flex1 jsb">
                    <h2 class="item-heading">
                        <a target="_blank"
                            href="/view-code/' . $td['slug'] . '">' . THANHDIEU($td['tieude']) . '
                            <!-- <span class="focus-color">' . THANHDIEU($td['tieude']) . '</span> -->
                        </a>
                    </h2>
                    <div class="item-excerpt muted-color text-ellipsis mb6">' . $cut->characters(strip_tags($td['noidung']), 80) . '
                    </div>
                    <div>
                        <div class="item-tags scroll-x no-scrollbar mb6">
                        <a class="meta-pay but ' . ((empty($td['giatien']) || $td['giatien'] == 0) ? 'c-green' : ColorGiaBan($td['giatien'])) . '">
                        ' . ((empty($td['giatien']) || $td['giatien'] == 0) ? 'Miễn Phí' : FormatNumber::TD($td['giatien'], 2) . 'đ') . '
                    </a>
                    <a class="but ' . $mau[$td['phanloai']] . '">
                        <i class="' . $icon[$td['phanloai']] . '" aria-hidden="true"></i>&nbsp;' . PhanLoai($td['phanloai']) . '
                    </a>
                        </div>
                        <div class="item-meta muted-2-color flex jsb ac">
                            <item data-timeago="' . $td['ngaydang'] . '"
                                class="icon-circle mln3 time-ago">' . $td['ngaydang'] . '
                            </item>
                            <div class="meta-right text-nowrap">
                            <item class="meta-view">
                                <i class="icon ri-eye-line"></i> ' . CountFormatter::WS($td['luotxem']) . '
                            </item>
                            <item class="meta-like">
                                <i class="icon ri-thumb-up-line"></i> ' . CountFormatter::WS($td['luotlike']) . '
                            </item>
                            <item class="meta-comm">
                                <i class="icon ri-message-2-line"></i> ' . CountFormatter::WS($td['luotcmt']) . '
                            </item>
                        </div>
                        </div>
                    </div>
                </div>
            </posts>';
                $products[] = $HK_PRODUCT;
            }

            $totalProducts = intval($totalProducts);
            $pagination = '';
            if ($totalProducts > $limit) {
                $totalPages = ceil($totalProducts / $limit);
                $pagination .= '<div class="pagenav ajax-pag">';
                if ($current_page > 1) {
                    $pagination .= '<a class="prev page-numbers" href="?page=' . ($current_page - 1) . '">';
                    $pagination .= '<i class="fa fa-angle-left em12"></i>';
                    $pagination .= '<span class="hide-sm ml6">Trang trước</span>';
                    $pagination .= '</a>';
                }

                $showDots = true;
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i === $current_page) {
                        $pagination .= '<a class="page-numbers current" href="?page=' . $i . '">' . $i . '</a>';
                        $showDots = true;
                    } else {
                        if (
                            $i === 1 || $i === $totalPages ||
                            ($i >= $current_page - 1 && $i <= $current_page + 1) ||
                            ($i <= 2 || $i >= $totalPages - 2)
                        ) {
                            $pagination .= '<a class="page-numbers" href="?page=' . $i . '">' . $i . '</a>';
                            $showDots = true;
                        } elseif ($showDots) {
                            $pagination .= '<span class="page-numbers dots">…</span>';
                            $showDots = false;
                        }
                    }
                }

                if ($current_page < $totalPages) {
                    $pagination .= '<a class="next page-numbers" href="?page=' . ($current_page + 1) . '">';
                    $pagination .= '<span class="hide-sm mr6">Trang tiếp theo</span>';
                    $pagination .= '<i class="fa fa-angle-right em12"></i>';
                    $pagination .= '</a>';
                }

                $pagination .= '</div>';
            } else {
                $pagination = '<div class="text-center mb20 padding-h10 muted-2-color no-more separator">Đã hiển thị tất cả dữ liệu</div>';
            }

            if ($OoOo->num_rows > 0) {
                $response = array(
                    'success' => true,
                    'products' => $products,
                    'pagination' => $pagination
                );
            } else {
                $response = array(
                    'success' => false,
                    'products' => array('search_count' => $totalProducts),
                    'message' => '<div class="f-not-found"><img src="/' . __IMG__ . '/icon/no-found.png"><p class="mt20 em09 muted-3-color separator">Không tìm thấy nội dung nào</p></div>'
                );
            }

            echo json_encode($response);
        }
    }

    (new ProfileCode())->WsShowCode(
        isset($_POST['page']) ? intval($_POST['page']) : 1,
        isset($_POST['type']) ? $_POST['type'] : 'date',
        isset($_POST['xetduyet']) ? $_POST['xetduyet'] : '',
        isset($_POST['author']) ? $_POST['author'] : ''
    );
}

// Follow Tab
if (isset($_POST['profile_follower'])) {
    usleep(random_int(170000, 200000));
    class ProfileFollow extends DatabaseConnection
    {
        public function WsShowFollow($author = null)
        {
            $OoOo = self::ThanhDieuDB()->query("
                SELECT users.*, 
                       COALESCE(ws_verification.username, users.username) AS username, 
                       ws_verification.status, 
                       ws_plans.tengoi AS plans
                FROM ws_follower
                INNER JOIN users ON ws_follower.follower_username = users.username
                LEFT JOIN ws_verification ON users.username = ws_verification.username
                LEFT JOIN ws_plans ON users.username = ws_plans.taikhoan
                WHERE ws_follower.followed_username = '$author' 
                  AND users.banned = 0 
                ORDER BY ws_follower.created_at DESC
                LIMIT 999
            ");

            global $cut, $TD, $taikhoan, $user, $totalFollowing;
            $totalFollows = self::ThanhDieuDB()->query("
                SELECT COUNT(users.user_id) as total 
                FROM users 
                WHERE users.username = '$author' 
                  AND users.banned = 0
            ")->fetch_assoc()['total'];
            $following = array();
            
            $HK_TOTAL__FOLLOWER="
            <ul class='ajax-item list-inline splitters relative mb10 mt10'>
                <li><a rel='nofollow' ajax-replace='true' class='ajax-next focus-color'>Người theo dõi " . UserTotalFollowing::TD($author) . "</a></li>
                <li>
                    <a rel='nofollow' ajax-replace='true' class='ajax-next muted-color'>Đang theo dõi 0</a>
                </li>
            </ul>
            ";
            while ($fl = $OoOo->fetch_assoc()) {
                $is_user = isset($_COOKIE['taikhoan']) && $taikhoan === decrypt($_COOKIE['taikhoan'], $TD->Setting('key-aes'));
                $class_follow = ($fl['username'] === $taikhoan) ? ($is_user ? 'you' : 'signin-loader') : ($is_user ? 'user-follow-author' : 'signin-loader');
                $follow_text = ($fl['username'] === $taikhoan) ? '<i class="ri-user-follow-line"></i> Bạn' : ((FollowChecker::TD($taikhoan, $fl['username'])) ? '<i class="ri-user-follow-line"></i> Đang theo dõi' : '<i class="ri-user-add-line"></i> Theo dõi');
                $following[] = "
                <div class='author-minicard radius8 relative-h ajax-item'>
                    <ul class='list-inline relative'>
                        <li>
                            <a href='/profile/@{$fl['username']}'>
                                <span class='avatar-img'>
                                    <img alt='Ảnh đại diện của {$fl['hovaten']}-{$TD->Setting('name-site')}'
                                        src='/" . __IMG__ . "/users/{$fl['avatar']}'
                                        data-src='/" . __IMG__ . "/users/{$fl['avatar']}'
                                        class='avatar avatar-id-{$fl['user_id']} lazyload'>
                                        " . (new PlansIcon())->icon($fl['username']) . "
                                        " . ShowPlans::TD($fl['username']) . "
                                </span>
                            </a>
                        </li>
                        <li>
                            <dl>
                                <dt class='flex ac'>
                                    <name class='flex ac flex1'>
                                        <a class='display-name text-ellipsis' href='/profile/@{$fl['username']}'>
                                            {$fl['hovaten']}
                                        </a>
                                        " . WSInfoProfileShow::TD($fl) . "
                                    </name>
                                    <a href='javascript:;' class='focus-color px12 ml10 follow " . ((isset($taikhoan) || isset($taikhoan)) ? '' : 'signin-loader') . " flex0 $class_follow' data-pid='{$fl['user_id']}' data-puser='{$fl['username']}'>
                                        <count>$follow_text</count>
                                    </a>
                                </dt>
                                <dd class='mt6 em09 muted-color text-ellipsis'>{$fl['tieusu']}</dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                ";
            }
            $totalFollows = intval($totalFollows);
            if ($OoOo->num_rows > 0) {
                $response = array(
                    'success' => true,
                    'fl' => $following,
                    'total_fl' => $HK_TOTAL__FOLLOWER
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => '<div class="text-center ajax-item no-events-img"><img style="width:280px;opacity:.7" src="/' . __IMG__ . '/svg/null-love.svg"><p class="em09 muted-3-color separator">Chưa có người theo dõi nào</p></div>'
                );
            }
            echo json_encode($response);
        }
    }

    (new ProfileFollow())->WsShowFollow(isset($_POST['author']) ? $_POST['author'] : '');
}

if (isset($_POST['main_forums'])) {
    usleep(random_int(170000, 200000));

    class MainForums extends DatabaseConnection
    {
        public function WsShowForums()
        {
            global $TD, $cut, $taikhoan, $user;
            $OoOo = self::ThanhDieuDB()->query("
                SELECT ws_forums.*, users.hovaten, users.avatar, users.user_id, users.banned, COALESCE(ws_views.views, 0) AS views, COALESCE(ws_like.likes, 0) AS likes, COUNT(ws_comments.comment_id) as comments
                FROM ws_forums 
                INNER JOIN users ON ws_forums.nguoidang = users.username
                LEFT JOIN ws_verification ON users.username = ws_verification.username
                LEFT JOIN ws_plans ON users.username = ws_plans.taikhoan
                LEFT JOIN (
                    SELECT post_id, COUNT(*) as views
                    FROM ws_views
                    GROUP BY post_id
                ) ws_views ON ws_forums.forum_id = ws_views.post_id
                LEFT JOIN (
                    SELECT post_id, COUNT(*) as likes
                    FROM ws_like
                    GROUP BY post_id
                ) ws_like ON ws_forums.forum_id = ws_like.post_id
                LEFT JOIN ws_comments ON ws_forums.forum_id = ws_comments.post_id
                WHERE users.banned = 0
                GROUP BY ws_forums.forum_id
                ORDER BY ws_forums.ngaytao DESC LIMIT 8
            ");
            $totalForum = self::ThanhDieuDB()->query("SELECT COUNT(*) as total FROM ws_forums INNER JOIN users ON ws_forums.nguoidang = users.username WHERE users.banned = 0")->fetch_assoc()['total'];

            $forums = array();
            while ($forum = $OoOo->fetch_assoc()) {
                $is_user = isset($_COOKIE['taikhoan']) && $taikhoan === decrypt($_COOKIE['taikhoan'], $TD->Setting('key-aes'));
                $class_follow = ($forum['nguoidang'] === $taikhoan) ? 'you' : ($is_user ? 'user-follow-author' : 'signin-loader');
                $follow_text = ($forum['nguoidang'] === $taikhoan) ? '<i class="ri-user-follow-line"></i> Bạn' :
                    ((FollowChecker::TD($taikhoan, $forum['nguoidang'])) ? '<i class="ri-user-follow-line"></i> Đang theo dõi' : '<i class="ri-user-add-line"></i> Theo dõi');
                $images_html = '';
                if (!empty($forum['anhbaiviet'])) {
                    $images = explode('|', $forum['anhbaiviet']);
                    $image_count = min(count($images), 4);
                    $image_class = 'count-' . $image_count;

                    foreach ($images as $index => $image) {
                        if ($index >= 4)
                            break;
                        $images_html .= "
                            <span>
                                <img data-fancybox src='/" . __IMG__ . "/uploads/$image' class='fit-cover radius8 cursor-zoom-in' alt=''>
                            </span>
                        ";
                    }

                    $extra_images_count = count($images) - 4;
                    $extra_images_html = $extra_images_count > 0 ? "
                        <div class='abs-center right-top'>
                            <badge class='b-black mr6 mt6 em09'>
                                <i class='fa fa-image mr3' aria-hidden='true'></i>+{$extra_images_count}
                            </badge>
                        </div>
                    " : "";

                    $images_html = "
                        <div class='hk-container-img'>
                            <div class='imgbox-container lists-imgs mt6 $image_class'>
                                $images_html
                            </div>
                        </div>
                        $extra_images_html
                    ";
                }
                $forums[] = "
                    <posts class='forum-posts detail alone ajax-item'>
                        <div class='user-info flex ac mb10'>
                            <a href='/profile/@{$forum['nguoidang']}'>
                                <span class='avatar-img'>
                                    <img alt='' src='/" . __IMG__ . "/users/{$forum['avatar']}' class='avatar avatar-id- lazyload'>
                                </span>
                            </a>
                            <div class='user-right flex flex1 ac jsb ml10'>
                                <div class='flex1'>
                                    <name class='flex ac flex1'>
                                        <a class='display-name text-ellipsis' href='/profile/@{$forum['nguoidang']}'>{$forum['hovaten']}</a>
                                    </name>
                                    <div class='px12-sm muted-2-color text-ellipsis'>Đã đăng
                                        <span class='time-ago' data-timeago='{$forum['ngaytao']}' data-toggle='tooltip' data-placement='bottom' data-original-title='{$forum['ngaytao']}'></span>
                                        <span class='icon-spot'>{$forum['views']} lượt xem</span>
                                    </div>
                                </div>
                                <div class='flex0 user-action'>
                                    <a href='javascript:;' data-action='follow_user' class='px12-sm ml10 {$class_follow} but c-red' data-pid='{$forum['user_id']}'>
                                        <count>{$follow_text}</count>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class='forum-title flex ac'>
                                <a class='hk-forum-title' target='_blank' href='/dien-dan/{$forum['slug']}'>{$forum['tieude']}</a>
                            </h2>
                        </div>
                        $images_html
                        <div class='flex ac jsb mt10'>
                            <a class='but but-plate text-ellipsis' href='/dien-dan/{$forum['slug']}'>
                             Bài viết đầy đủ <i class='fa fa-angle-right ml6'></i>
                            </a>
                            <div class='action-meta flex0 flex jsb'>
                                <div class='score-btns'>
                                    <a href='javascript:;' ajax-action='score_extra' class='btn-score extra' data-id='{$forum['forum_id']}'>
                                        <i class='ri-thumb-up-line'></i>
                                    </a>
                                    <text>{$forum['likes']}</text>
                                </div>
                                <a rel='nofollow' href='/dien-dan/{$forum['slug']}#comments' class='item'>
                                    <i class='ri-chat-1-line'></i>
                                    <text>{$forum['comments']}</text>
                                </a>
                                <a class='btn-share item' data-toggle='modal' data-target='#modal-share' href='javascript:;'>
                                    <i class='ri-share-forward-line'></i>
                                    <text>Chia sẽ</text>
                                </a>
                            </div>
                        </div>
                    </posts>
                ";
            }

            $totalForum = intval($totalForum);
            if ($OoOo->num_rows > 0) {
                $response = array(
                    'success' => true,
                    'forums' => $forums,
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => '<div class="text-center ajax-item no-events-img"><img style="width:280px;opacity:.7" src="/' . __IMG__ . '/svg/null-love.svg"><p class="em09 muted-3-color separator">Chưa có người bài viết nào</p></div>'
                );
            }
            echo json_encode($response);
        }
    }

    (new MainForums())->WsShowForums();
}
