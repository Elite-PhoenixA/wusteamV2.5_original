<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');
setcookie('taikhoan', '', time() - 3600, "/", "", true, true);
setcookie('admin', '', time() - 3600, "/", "", true, true);
if (UserSession::CheckAdmin($user)) {
    setcookie('admin', encrypt($user['username'], $TD->Setting('key-aes')), time() + (7 * 24 * 60 * 60), "/", "", true, true);
    header('Location: /admin/dashboard');
    exit;
} else {
    header('Location: /admin/');
}