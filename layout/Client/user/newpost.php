<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<?php
if (UserSession::CheckAdmin($user) && $_SESSION['taikhoan'] === $_SESSION['admin']) {
    exit('<meta http-equiv="refresh" content="0; url=/admin/create/product">');
} else {
    exit('<meta http-equiv="refresh" content="0; url=/">');
}
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>