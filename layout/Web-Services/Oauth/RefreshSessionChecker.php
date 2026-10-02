<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');
function RefreshSession($thanhdieudb, $taikhoan) {
    $result = $thanhdieudb->query("SELECT session_id, username, create_at, expire_time FROM ws_refresh_session WHERE username = '$taikhoan'");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $session_id = $row['session_id'];
        $username = $row['username'];
        $create_at = $row['create_at'];
        $expire_time = $row['expire_time'];
        if ($expire_time < $create_at) {
            session_destroy();
            unset($_SESSION['taikhoan']);
            $thanhdieudb->query("DELETE FROM ws_refresh_session WHERE session_id = '$session_id'");
            echo json_encode(['success' => true]);
        } else {
            session_start();
            $_SESSION['taikhoan'] = $username;
            echo json_encode(['success' => true, 'message'=>'Running RefreshSession']);
        }
    } else {
    echo json_encode(['success' => false, 'message' => 'Failed']);
    }
}
RefreshSession($thanhdieudb, $taikhoan);
/**Made -> ThanhDieu.Com */