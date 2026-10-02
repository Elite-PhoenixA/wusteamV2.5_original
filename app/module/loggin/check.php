<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');
header('Content-Type: application/json');
if ($taikhoan == null || (isset($user["banned"]) && $user["banned"] == 1)) {
    echo json_encode(["success" => true, "author" => "ThanhDieuTv"]);
} else {
    echo json_encode(["success" => false, "author" => "ThanhDieuTv"]);
}
