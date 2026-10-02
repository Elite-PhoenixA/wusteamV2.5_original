<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');
include_once($_SERVER['DOCUMENT_ROOT'].'/app/function/fuck-devtools.php');
////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//   Copyright (C) 2021  WusTeam Development Team                             //
//   http://www.thanhdieu.com                                                 //
//                                                                            //
//   This program is free software. You can redistribute it and/or modify     //
//   it under the terms of either the current WusTeam License (viewable at    //
//   WusTeam.Com) or the WusTeam License that was distributed with this file  //
//                                                                            //
//   This program is distributed in the hope that it will be useful,          //
//   but WITHOUT ANY WARRANTY, without even the implied warranty of           //
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                     //
//                                                                            //
//   You should have received a copy of the WusTeam License                   //
//   along with this program.                                                 //
//                                                                            //
////////////////////////////////////////////////////////////////////////////////

/** LANGUAGE [ VI-VN || FUNCTION [ EN-UK ] **/
class DatabaseConnection {
    protected static $db;

    public static function SetDatabase($db) {
        self::$db = $db;
        self::$db->query("SET NAMES 'utf8mb4'");
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }

    public static function ThanhDieuDB() {
        return self::$db;
    }
    public static function CurrentTime() {
        return date("Y-m-d H:i:s");
    }
}
    class THANHDIEUSTART extends DatabaseConnection {
        private $https;
    
        public function __construct($https) {
            $this->https = $https;
            $this->setTimeZone();
        }
    
        public function setTimeZone() {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
        }
    
        public function setDatabaseCharset() {
            self::ThanhDieuDB()->query("SET NAMES 'utf8mb4'");
        }
    
        public function getUserAgent() {
            return $_SERVER["HTTP_USER_AGENT"];
        }
    
        public function setSessionRequestTime() {
            $_SESSION["session_request"] = time();
        }
    
        public function getIPClient() {
            return $_SERVER["REMOTE_ADDR"];
        }
    
        public function getCurrentTime() {
            return date("Y-m-d H:i:s");
        }
    
        public function getFormatCurrentTime() {
            return date("H:i:s d-m-Y");
        }
    
        public function getWebsiteDomain() {
            return $this->https . $_SERVER["HTTP_HOST"];
        }
    
        public function getCurrentURL() {
            return $_SERVER["REQUEST_URI"];
        }
    
        public function getDomain() {
            return $_SERVER["HTTP_HOST"];
        }
    
        public function getFullURL() {
            return $this->https . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
    }    
DatabaseConnection::SetDatabase($thanhdieudb);
$databaseWs = new THANHDIEUSTART($https ?? 'https://');
$databaseWs->setDatabaseCharset();
$databaseWs->setSessionRequestTime();
$userAgent = $databaseWs->getUserAgent();
$time = $databaseWs->getCurrentTime();
$timeft = $databaseWs->getFormatCurrentTime();
$website_domain = $databaseWs->getWebsiteDomain();
$current_url = $databaseWs->getCurrentURL();
$domain = $databaseWs->getDomain();
$actual_link = $databaseWs->getFullURL();
$mysqlversion = DatabaseConnection::ThanhDieuDB()->get_server_info();
$ip = $databaseWs->getIPClient();
class Settings extends DatabaseConnection {
    private $TD;

    public function __construct() {
        $this->TD = self::ThanhDieuDB()->query("SELECT * FROM `ws_settings`")->fetch_assoc();
    }

    public function Setting($data) {
        if ($data === 'ads' || $data === 'modal-content') {
            return $this->TD[$data] ?? null;
        }
        return isset($this->TD[$data]) ? THANHDIEU($this->TD[$data]) : null;
    }
}

$TD = new Settings();
class WebsResource
{
    public function CSSResources()
    {
        return "public/src/vtd/css";
    }

    public function JSResources()
    {
        return "public/src/vtd/js";
    }

    public function IMGResources()
    {
        return "public/src/vtd/img";
    }

    public function LibraryResources()
    {
        return "public/src/vtd/libs";
    }
    public function PluginsResources()
    {
        return "public/src/vtd/plugins";
    }
    public function UserInfo($thanhdieudb)
    {
        global $TD;
        if (isset($_COOKIE["taikhoan"])) {
            $username = decrypt($_COOKIE["taikhoan"], $TD->Setting('key-aes'));
            $OoO = $thanhdieudb->prepare("SELECT * FROM `users` WHERE `username`=?");
            $OoO->bind_param("s", $username);
            if (!$OoO->execute()) {
                exit(
                    "Không thể truy vấn từ cơ sở dữ liệu, vui lòng kiểm tra lại!<br>" .
                        "<font color='red'>Lỗi: " . $OoO->error . "</font>"
                );
            }
            $result = $OoO->get_result();
            return $result->num_rows > 0 ? $result->fetch_assoc() : [];
        }
        return [];
    }   
}
function encrypt($data, $key)
{
    $method = 'aes-256-cbc';
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
    $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
    $encrypted = base64_encode($iv . $encrypted);
    return $encrypted;
}

function decrypt($data, $key)
{
    $method = 'aes-256-cbc';
    $data = base64_decode($data);
    $iv_length = openssl_cipher_iv_length($method);
    $iv = substr($data, 0, $iv_length);
    $encrypted = substr($data, $iv_length);
    $decrypted = openssl_decrypt($encrypted, $method, $key, 0, $iv);
    return $decrypted;
}
$taikhoan = isset($_COOKIE['taikhoan']) ? decrypt($_COOKIE['taikhoan'], $TD->Setting('key-aes')) : null;
$admin = isset($_COOKIE['admin']) ? decrypt($_COOKIE['admin'], $TD->Setting('key-aes')) : null;
$webs = new WebsResource();
if ($taikhoan !== null) {
    $user = $webs->UserInfo($thanhdieudb);
} else {
    $user = null;
}
if (!isset($user['username']) || !isset($user['hovaten'])) {
    setcookie('taikhoan', '', time() - 3600, "/", "", true, true);
    setcookie('admin', '', time() - 3600, "/", "", true, true);
}
$prefix ??= "";
define("__CSS__", $webs->CSSResources());
define("__JS__", $webs->JSResources());
define("__IMG__", $webs->IMGResources());
define("__LIBRARY__", $webs->LibraryResources());
define("__PLUGINS__", $webs->PluginsResources());
function THANHDIEU($value)
{
    if (is_array($value)) {
        return array_map("THANHDIEU", $value);
    } else {
        return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
    }
}
class UserSession
{
    public static function CheckAdmin($user)
    {
        global $TD;
        if (
            isset($user["rank"]) &&
            (strtolower($user["rank"]) === "admin" || strtolower($user["rank"]) === "partner")
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function GetUsername($user)
    {
        return isset($user["username"]) ? $user["username"] : null;
    }
}
// UserSession::CheckAdmin($user);
// $taikhoan = $user["username"] ?? null;
class CheckSessionLogin
{
    private $encryption_key;

    public function __construct()
    {
        global $TD;
        $this->encryption_key = $TD->Setting('key-aes');
    }

    public function TD($taikhoan, $user)
    {
        if (
            isset($_COOKIE["taikhoan"]) &&
            !empty($taikhoan) &&
            isset($user) &&
            (!isset($user["banned"]) || $user["banned"] != 1)
        ) {
            return decrypt($_COOKIE["taikhoan"], $this->encryption_key) === $taikhoan;
        } else {
            return false;
        }
    }
}

$isLogin = new CheckSessionLogin();
class WSUserVerify
{
    public static function TD()
    {
        return '<img class="lazyload img-icon" src="/' .
            __IMG__ .
            '/icon/verify.png" alt="Tích xanh người của công chúng">';
    }
}
class FollowChecker extends DatabaseConnection 
{
    public static function TD($taikhoan, $authorUsername)
    {
        $OoO = self::ThanhDieuDB()->prepare(
            "SELECT COUNT(*) AS count FROM ws_follower WHERE follower_username=? AND followed_username=?"
        );
        $OoO->bind_param("ss", $taikhoan, $authorUsername);
        $OoO->execute();
        return $OoO->get_result()->fetch_assoc()["count"] > 0;
    }
}
class SessionExpiredChecker
{
    private $encryption_key;

    public function __construct()
    {
        global $TD;
        $this->encryption_key = $TD->Setting('key-aes');
    }

    public function check($taikhoan, $user)
    {
        if ($taikhoan === null || (isset($user["banned"]) && $user["banned"] == 1)) {
            $this->logout();
            return true; 
        }
        return false; 
    }

    private function logout()
    {
        $taikhoan = null;
        setcookie('taikhoan', '', time() - 3600, "/");
        setcookie('admin', '', time() - 3600, "/");
    }
}

class CheckRank
{
    public static function rank($user)
    {
        if (!isset($user["rank"]) || $user["rank"] !== "admin") {
            return true;
        }
        return false;
    }
}
class CheckRankAndSession
{
    public static function TD($user, $taikhoan)
    {
        $sessionExpired = (new SessionExpiredChecker())->check($taikhoan, $user);
        if ($sessionExpired) {
            exit(
                json_encode([
                    "success" => false,
                    "message" => "Phiên đã hết hạn vui lòng đăng nhập lại!",
                ])
            );
        }
        if (!self::checkAdmin($user)) {
            exit(
                json_encode([
                    "success" => false,
                    "message" => "Chức năng này cần quyền hạn cao hơn!",
                ])
            );
        }

    }
    private static function checkAdmin($user)
    {
        return isset($user["rank"]) && $user["rank"] === "admin";
    }
}


class TDSpamChecker
{
    public static function TD($identifier,$TD)
    {
        global $TD;
        $timeWindow = 5;
        $blockTime = 30;
        $maxRequests = self::MaxRequests($TD->Setting('anti-spam'));
        $requestKey = "request_count_" . $identifier;
        $expiryKey = "request_expiry_" . $identifier;
        $blockUntilKey = "block_until_" . $identifier;
        $currentTime = time();
        if (!isset($_SESSION[$requestKey])) {
            $_SESSION[$requestKey] = 0;
        }
        if (!isset($_SESSION[$expiryKey])) {
            $_SESSION[$expiryKey] = $currentTime + $timeWindow;
        }
        if (!isset($_SESSION[$blockUntilKey])) {
            $_SESSION[$blockUntilKey] = 0;
        }

        if ($currentTime < $_SESSION[$blockUntilKey]) {
            return false;
        }

        if ($currentTime > $_SESSION[$expiryKey]) {
            $_SESSION[$requestKey] = 0;
            $_SESSION[$expiryKey] = $currentTime + $timeWindow;
        }

        $_SESSION[$requestKey]++;

        if ($_SESSION[$requestKey] > $maxRequests) {
            $_SESSION[$blockUntilKey] = $currentTime + $blockTime;
            return false;
        }   
        return true;
    }
    private static function MaxRequests($sensitivity)
    {
        return $sensitivity == 0 ? random_int(3,5) : random_int(2,3);
    }
}
function valid_url($url)
{
    return filter_var($url, FILTER_VALIDATE_URL) !== false;

}
function valid_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
class TDRedirectPage
{
    public static function user($website_domain)
    {
        return "/?session_data=" .
            WsRandomString::TD(rand(50, 99)) .
            "&status=guest_account" .
            "&out=true" .
            "&url=" .
            $website_domain;
    }

    public static function error404($website_domain)
    {
        return "/data?=" .
            WsRandomString::TD(rand(50, 99)) .
            "&status=404" .
            "&out=false" .
            "&time=" .
            $website_domain;
    }
}
if ($TD->Setting("backupdb") == 1) {
    function BACKUP_DATABASE($thanhdieudb)
    {
        $folder = realpath(__DIR__ . "/../common/backup/");
        $latest_backup_file = glob($folder . "/backup-*.sql");
        if (!empty($latest_backup_file)) {
            $latest_backup_file = end($latest_backup_file);
            $last_backup_date = date("Y-m-d", filemtime($latest_backup_file));
        } else {
            $last_backup_date = null;
        }
        if ($last_backup_date !== date("Y-m-d")) {
            $backup_file_name = "backup-" . substr(uniqid(), -16) . ".sql";
            $backup_file_path = $folder . "/" . $backup_file_name;
            $return = "";
            $alltables = [];
            $result = mysqli_query($thanhdieudb, "SHOW TABLES");
            while ($row = mysqli_fetch_row($result)) {
                $alltables[] = $row[0];
            }

            foreach ($alltables as $table) {
                $result = mysqli_query($thanhdieudb, "SELECT * FROM " . $table);
                $num_fields = mysqli_num_fields($result);
                $return .= "DROP TABLE IF EXISTS " . $table . ";";
                $row2 = mysqli_fetch_row(
                    mysqli_query($thanhdieudb, "SHOW CREATE TABLE " . $table)
                );
                $return .= "\n\n" . $row2[1] . ";\n\n";

                for ($i = 0; $i < $num_fields; $i++) {
                    while ($row = mysqli_fetch_row($result)) {
                        $return .= "INSERT INTO " . $table . " VALUES(";
                        for ($j = 0; $j < $num_fields; $j++) {
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = str_replace("\n", "\\n", $row[$j]);
                            if (isset($row[$j])) {
                                $return .= '"' . $row[$j] . '"';
                            } else {
                                $return .= '""';
                            }
                            if ($j < $num_fields - 1) {
                                $return .= ",";
                            }
                        }
                        $return .= ");\n";
                    }
                }
                $return .= "\n\n";
            }

            $handle = fopen($backup_file_path, "w+");
            fwrite($handle, $return);
            fclose($handle);
        } else {
            $backup_file_created = false;
        }
    }
    BACKUP_DATABASE($thanhdieudb);
}
class WsCheckIMG
{
    public static function WsCheckImg($vlxx)
    {
        return in_array($vlxx, ["png", "jpg", "jpeg", "webp", "gif"]);
    }
    public static function SizeImgLimit($fileSize, $limit = 15)
    {
        if ($fileSize <= $limit * 1024 * 1024) {
            return true;
        } else {
            return "Kích thước của ảnh không được vượt quá giới hạn cho phép (15MB).";
        }
    }
}
class LevelPoints
{
    private $td_level = [
        "1" => 0,
        "2" => 50,
        "3" => 100,
        "4" => 200,
        "5" => 300,
        "6" => 500,
        "7" => 700,
        "8" => 900,
        "9" => 1200,
        "10" => 1500,
        "svip1" => 2000,
        "svip2" => 3000,
        "svip3" => 4000,
        "svip4" => 5000,
        "svip5" => 6000,
        "svip6" => 7000,
        "svip7" => 8000,
        "svip8" => 9000,
        "svip9" => 10000,
        "svip10" => 15000,
    ];

    public function TDTV($level, $taikhoan, $td)
    {
        if (isset($this->td_level[$level])) {
            $keys = array_keys($this->td_level);
            $nextLevelIndex = array_search($level, $keys) + 1;

            if ($nextLevelIndex < count($keys)) {
                $nextLevel = $keys[$nextLevelIndex];
                $nextLevelPoints = $this->td_level[$nextLevel];

                if ($td["ruby"] >= $nextLevelPoints) {
                    $this->UpdateLevel($taikhoan, $nextLevel);
                    return $nextLevelPoints;
                } else {
                    return max(0, $nextLevelPoints);
                }
            }
        }
        return null;
    }

    private function UpdateLevel($username, $newLevel)
    {
        global $thanhdieudb;
        $tdtv = $thanhdieudb->prepare("UPDATE users SET level=? WHERE username=?");
        if (is_numeric($newLevel)) {
            $tdtv->bind_param("is", $newLevel, $username);
        } else {
            $tdtv->bind_param("ss", $newLevel, $username);
        }
        $tdtv->execute();
    }

    public function TDLevels()
    {
        return $this->td_level;
    }

    public function Pillars($points, $level, $taikhoan, $user)
    {
        $maxPoints = $this->TDTV($level, $taikhoan, $user);
        $maxHeight = 100;
        if ($points > $maxPoints) {
            return $maxHeight;
        } else {
            $pillarHeight = ($points / $maxPoints) * $maxHeight;
            return $pillarHeight;
        }
    }

    public function Downgrade($username, $currentLevel, $currentPoints)
    {
        $levels = array_keys($this->td_level);
        $currentIndex = array_search($currentLevel, $levels);

        if ($currentPoints >= $this->td_level[$currentLevel]) {
            return $currentLevel;
        }
        for ($i = $currentIndex - 1; $i >= 0; $i--) {
            $previousLevel = $levels[$i];
            if ($currentPoints >= $this->td_level[$previousLevel]) {
                $this->UpdateLevel($username, $previousLevel);
                return $previousLevel;
            }
        }

        return $currentLevel;
    }

    public function LevelChecker($taikhoan, $user)
    {
        if ($taikhoan !== null && isset($user['level'])) {
            $this->TDTV($user['level'], $taikhoan, $user);
            $this->Downgrade($taikhoan, $user['level'], $user['ruby']);
        } else {
            throw new Exception('Required variables are not set.');
        }
    }
}

$LevelPoints = new LevelPoints();
try {
    if ($taikhoan !== null) {
        $LevelPoints->LevelChecker($taikhoan, $user);
    }
} catch (Exception $e) {
    // Muốn chống bug dohot thì sài code ở đây
}

class UserLevel
{
    public function TD($Level)
    {
        if (!empty($Level)) {
            if ($Level >= 1 && $Level <= 10) {
                return "level-" . $Level . ".svg";
            }
            if (strpos($Level, "svip") !== false) {
                $svipLevel = intval(substr($Level, 4));
                if ($svipLevel >= 1 && $svipLevel <= 10) {
                    return "svip-" . $svipLevel . ".gif";
                }
            }
        }
        return "level-1.svg";
    }
}
class UserDanhHieu
{
    public static function TD($DanhHieu, $Info = "")
    {
        $data = [
            "nonnot" => ["name" => "Non Nớt (Newbie)", "icon" => "nonnot.svg"],
            "cuuthanhvien" => [
                "name" => "Cựu Thành Viên",
                "icon" => "cuuthanhvien.svg",
            ],
            "bacthayuytin" => [
                "name" => "Bậc Thầy Uy Tín",
                "icon" => "bacthayuytin.svg",
            ],
            "ngoisaodanglen" => [
                "name" => "Ngôi Sao Đang Lên",
                "icon" => "ngoisaodanglen.svg",
            ],
            "daisunoitieng" => [
                "name" => "Đại Sứ Nổi Tiếng",
                "icon" => "daisunoitieng.svg",
            ],
            "chuyengiabinhluan" => [
                "name" => "Chuyên Gia Bình Luận",
                "icon" => "chuyengiabinhluan.svg",
            ],
            "kecaiquanbaiviet" => [
                "name" => "Kẻ Cai Quản Bài Viết",
                "icon" => "kecaiquanbaiviet.svg",
            ],
            "daigiatienti" => [
                "name" => "Đại Gia Tiền Tỉ",
                "icon" => "daigiatienti.svg",
            ],
            "thanhniennaplandau" => [
                "name" => "Thanh Niên Nạp Lần Đầu",
                "icon" => "thanhniennaplandau.svg",
            ],
        ];
        if (!isset($data[$DanhHieu])) {
            return "";
        }
        if ($Info == "icon") {
            return $data[$DanhHieu]["icon"];
        } else {
            return $data[$DanhHieu]["name"];
        }
    }
}
class UserVerify
{
    public static function TD($XacMinh, $Info = "")
    {
        $data = [
            "admin" => ["name" => "Quản Trị Viên", "icon" => "admin.gif"],
            "partner" => [
                "name" => "Đối Tác Của Chúng Tôi",
                "icon" => "partner.gif",
            ],
            "developer" => [
                "name" => "Thuần Thục Full-stack Developer",
                "icon" => "developer.gif",
            ],
            "support" => [
                "name" => "Đội Ngũ Chuyên Gia Hỗ Trợ",
                "icon" => "support.gif",
            ],
        ];
        if (!isset($data[$XacMinh])) {
            return "";
        }
        if ($Info == "icon") {
            return $data[$XacMinh]["icon"];
        } else {
            return $data[$XacMinh]["name"];
        }
    }
}

$userLevelShow = new UserLevel();
class AccountVerifier extends DatabaseConnection 
{
    private $taikhoan;
    private $encryption_key;

    public function __construct($taikhoan)
    {
        global $TD;
        $this->taikhoan = $taikhoan;
        $this->encryption_key = $TD->Setting('key-aes');
    }

    public function VerificationStatus()
    {
        $encrypted_taikhoan = decrypt($_COOKIE["taikhoan"], $this->encryption_key);

        $query = self::ThanhDieuDB()->prepare(
            "SELECT status, created_at FROM ws_verification WHERE username=?"
        );
        $query->bind_param("s", $encrypted_taikhoan);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            $w = $result->fetch_assoc();
            $verification_status = $w["status"];
            $created_at = strtotime($w["created_at"]);
            if (
                $verification_status == "rejected" &&
                time() - $created_at >= 3 * 24 * 60 * 60
            ) {
                $delete_query = self::ThanhDieuDB()->prepare(
                    "DELETE FROM ws_verification WHERE username=? AND status='rejected'"
                );
                $delete_query->bind_param("s", $encrypted_taikhoan);
                $delete_query->execute();
                self::ThanhDieuDB()->query("SET @num := 0");
                self::ThanhDieuDB()->query(
                    "UPDATE ws_verification SET verify_id=@num := @num + 1"
                );
                self::ThanhDieuDB()->query(
                    "ALTER TABLE ws_verification AUTO_INCREMENT=1"
                );
            }
            return $w;
        } else {
            return null;
        }
    }

    public function TD()
    {
        $encrypted_taikhoan = decrypt($_COOKIE["taikhoan"], $this->encryption_key);

        $verification_info = $this->VerificationStatus();
        if ($verification_info) {
            $verification_status = $verification_info["status"];
            if ($verification_status == "approved") {
                echo '<button mobile-bottom="true" class="but jb-green padding-lg btn-block mt20" disabled>';
                echo '<i class="ri-verified-badge-fill"></i> Tài khoản đã được xác minh';
                echo "</button>";
            } elseif ($verification_status == "pending") {
                echo '<button mobile-bottom="true" class="but jb-yellow padding-lg btn-block mt20" disabled>';
                echo '<i class="ri-verified-badge-line"></i> Yêu cầu của bạn đang chờ phê duyệt';
                echo "</button>";
            } elseif ($verification_status == "rejected") {
                echo '<button mobile-bottom="true" class="but jb-red padding-lg btn-block mt20" disabled>';
                echo '<i class="ri-time-line"></i> Yêu cầu lại vào: ' .
                    date(
                        "H:i d-m-Y",
                        strtotime($verification_info["created_at"]) +
                            3 * 24 * 60 * 60
                    ) .
                    "";
                echo "</button>";
            }
        } else {
            $class_login = isset($_COOKIE["taikhoan"])
                ? "user-verify-apply"
                : "signin-loader";
            echo '<button type="submit" mobile-bottom="true" class="' .
                $class_login .
                ' but jb-blue padding-lg btn-block mt20">';
            echo '<i class="ri-checkbox-circle-line"></i> Tôi muốn xác minh danh tính';
            echo "</button>";
        }
    }
}
$AccountVerifier = new AccountVerifier($taikhoan);
/////////////---Vươ4ng Tha2nh Diệ1u---/////////////
function ColorGiaBan($price)
{
    if ($price >= 1 && $price <= 50000) {
        return "jb-red";
    } elseif ($price > 50000 && $price <= 200000) {
        return "jb-cyan";
    } elseif ($price > 200000 && $price <= 1000000000) {
        return "jb-vip1";
    }
}
class ShowPlans extends DatabaseConnection
{
    public static function TD($username, $type = 1)
    {
        $current_time = self::CurrentTime();
        $vtd = self::ThanhDieuDB()->prepare("SELECT tengoi FROM ws_plans WHERE taikhoan = ? AND (ngayhethan >= ? AND trangthai = 1)");
        $vtd->bind_param("ss", $username, $current_time);
        $vtd->execute();
        $OoO = $vtd->get_result();
        if ($OoO && $OoO->num_rows > 0) {
            $plan = $OoO->fetch_assoc()['tengoi'];
            if ($type == 1) {
                if (strtolower($plan) === "premium") {
                    return '<img class="premium-crown" src="/' . __IMG__ . '/icon/khung/premium.webp">';
                } elseif (strtolower($plan) === "legacy") {
                    return '<img class="legacy-crown" src="/' . __IMG__ . '/icon/khung/legacy.webp">';
                }
            } elseif ($type == 2) {
                if (strtolower($plan) === "premium") {
                    return '<span data-toggle="tooltip" class="badg badg-sm jb-vip1 moderator-bagd mr6" data-original-title="Sở hữu gói thành viên vip"><i class="ri-vip-diamond-line"></i> Gói Premium</span>';
                } elseif (strtolower($plan) === "legacy") {
                    return '<span data-toggle="tooltip" class="badg badg-sm jb-vip2 moderator-bagd mr6" data-original-title="Sở hữu gói thành viên vip"><i class="ri-vip-crown-2-line"></i> Gói Legacy</span>';
                }
            }
        }
        return null;
    }

}
class WSInfoProfileShow
{ 
    public static function TD($data)
    {
        global $TD, $plans, $userLevelShow, $isVerify;

        ob_start();
        ?>
        <?php if ($isVerify->TD($data['username'] ?? $data['user_username'] ?? null)) { ?>
            <icon data-toggle="tooltip"
                  title="Tài khoản này đã xác minh là thành viên chính thức của <?= $TD->Setting('name-site') ?>"
                  class="user-auth-icon ml3">
                <?= WSUserVerify::TD(); ?>
            </icon>
        <?php } ?>
        <?php
        $username = $data['username'] ?? $data['user_username'] ?? null;
        if ($username && isset($plans)) {
            $planType = $plans->TD('tengoi', $username);
            if ($planType === 'legacy') { ?>
                <img class="img-icon ml3 lazyload" src="/<?= __IMG__ ?>/icon/legacy.gif" data-src="/<?= __IMG__ ?>/icon/legacy.gif" data-toggle="tooltip" alt="Thành viên vàng" data-original-title="Thành viên legacy">
            <?php } elseif ($planType === 'premium') { ?>
                <img class="img-icon ml3 lazyload" src="/<?= __IMG__ ?>/icon/premium.gif" data-src="/<?= __IMG__ ?>/icon/premium.gif" data-toggle="tooltip" alt="Thành viên kim cương" data-original-title="Thành viên premium">
            <?php }
        } ?>
        <?php if (isset($userLevelShow, $data['level'])) { ?>
            <img class="lazyload img-icon ml3" src="/<?= __IMG__ . '/level/' . $userLevelShow->TD($data['level'])?>"
                 data-src="/<?= __IMG__ . '/level/' . $userLevelShow->TD($data['level'])?>"
                 data-toggle="tooltip"
                 title="<?= strtoupper(strpos($data['level'], 'svip') === 0 ? $data['level'] : 'LV' . $data['level']) ?>"
                 alt="User Level">
        <?php } ?>
        <?php
        return ob_get_clean();
    }
}


class isVerify extends DatabaseConnection 
{
    public function TD($username) {
        $vtd = self::ThanhDieuDB()->query("SELECT status FROM ws_verification WHERE username = '{$username}'");
        
        if ($vtd && $vtd->num_rows > 0) {
            $verification = $vtd->fetch_assoc();
            
            if ($verification['status'] === 'approved') {
                return '<button data-class="modal-mini" mobile-bottom="true" class="td user-auth-info but" href="javascript:;">
                            <icon data-toggle="tooltip" class="user-auth-icon" data-original-title="Đã xác minh tài khoản">
                                <img style="height:18px;margin-top:-2px;" src="/'.__IMG__.'/icon/verify.png" alt="User Verify">
                            </icon>Đã xác minh
                            <i class="fa fa-angle-right" style="margin: 0 0 0 .3em;"></i>
                        </button>';
            }
        }
        return ''; 
    }
    
}
$isVerify = new isVerify();
class CheckPlanStatus extends DatabaseConnection 
{
    public function TD($taikhoan) {
        $VTD = self::ThanhDieuDB()->prepare("SELECT * FROM ws_plans WHERE taikhoan = ? AND ngayhethan > NOW() AND trangthai = 1");
        $VTD->bind_param("s", $taikhoan);
        $VTD->execute();
        $OoO = $VTD->get_result();
        if ($OoO->num_rows > 0) {
            return $OoO->fetch_assoc(); 
        } else {
            return null; 
        }
    }
}
$planChecker = new CheckPlanStatus();
$planInfo = $planChecker->TD($taikhoan);
class PlanExpiredChecker extends DatabaseConnection
{
    public static function TD() {
        $vtd = self::ThanhDieuDB()->query("SELECT plans_id FROM ws_plans WHERE ngayhethan <= NOW() AND trangthai != 0");
        if ($vtd && $vtd->num_rows > 0) {
            while ($row = $vtd->fetch_assoc()) {
                self::ThanhDieuDB()->query("UPDATE ws_plans SET trangthai = 0 WHERE plans_id = '{$row['plans_id']}'");
            }
        }
    }
}
PlanExpiredChecker::TD();
class Plans extends DatabaseConnection
{
    public function TD($column, $account = null)
    {
        $current_time = self::CurrentTime();
        $vtd = self::ThanhDieuDB()->prepare("SELECT $column FROM ws_plans WHERE taikhoan = ? AND ngayhethan >= ? AND trangthai = 1");
        $vtd->bind_param("ss", $account, $current_time);
        $vtd->execute();
        $OoO = $vtd->get_result();
        if ($OoO && $OoO->num_rows > 0) {
            $row = $OoO->fetch_assoc();
            if (isset($row[$column])) {
                return $row[$column];
            }
        }
        return null;
    }
}

$plans = new Plans();
list($images_plans, $title_plans, $level_plans) = ($legacy = (new Plans())->TD('tengoi', isset($user['username']) ? $user['username'] : '')) === 'legacy' ? [__IMG__.'/icon/legacy.png', 'Thành Viên Legacy', '1'] : [__IMG__.'/icon/premium.png', 'Thành Viên Premium', '2'];

class PlansIcon extends DatabaseConnection
{
    public function icon($username) {
        $plan = $this->Plan($username);
        switch ($plan) {
            case 'premium':
                return '<img class="avatar-badge lazyload" src="/' . __IMG__ . '/icon/premium.gif" data-src="/' . __IMG__. '/icon/premium.gif" data-toggle="tooltip" data-original-title="Gói Premium" alt="ThanhDieu Plan Premium">';
            case 'legacy':
                return '<img class="avatar-badge lazyload" src="/'.__IMG__.'/icon/legacy.gif" data-src="/' . __IMG__. '/icon/legacy.gif" data-toggle="tooltip" data-original-title="Gói Legacy" alt="ThanhDieu Plan Legacy">';
            default:
                return '';
        }
    }
    private function Plan($username) {
        $vtd = self::ThanhDieuDB()->prepare("SELECT tengoi FROM ws_plans WHERE taikhoan = ? AND ngayhethan > NOW() AND trangthai = 1 ORDER BY ngaymua DESC LIMIT 1");
        $vtd->bind_param("s", $username);
        $vtd->execute();
        $result = $vtd->get_result();
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['tengoi'];
        } else {
            return null;
        }
    }
}
class UserTotalFollowing extends DatabaseConnection
{
    public static function TD($username)
    {
        $totalFollowing = 0;
        $vtd = self::ThanhDieuDB()->prepare("SELECT COUNT(DISTINCT ws_follower.follower_username) AS total_following FROM ws_follower 
        JOIN users ON ws_follower.follower_username = users.username 
        WHERE ws_follower.followed_username = ? AND users.banned = 0");
        $vtd->bind_param("s", $username);
        $vtd->execute();
        $result = $vtd->get_result();
        if ($result && $row = $result->fetch_assoc()) {
            $totalFollowing = $row['total_following'];
        }
        $vtd->close();
        return $totalFollowing;
    }
}

function TDSlug($str)
{
    $characters = [
        "á" => "a",
        "à" => "a",
        "ả" => "a",
        "ã" => "a",
        "ạ" => "a",
        "ă" => "a",
        "ắ" => "a",
        "ằ" => "a",
        "ẳ" => "a",
        "ẵ" => "a",
        "ặ" => "a",
        "â" => "a",
        "ấ" => "a",
        "ầ" => "a",
        "ẩ" => "a",
        "ẫ" => "a",
        "ậ" => "a",
        "đ" => "d",
        "é" => "e",
        "è" => "e",
        "ẻ" => "e",
        "ẽ" => "e",
        "ẹ" => "e",
        "ê" => "e",
        "ế" => "e",
        "ề" => "e",
        "ể" => "e",
        "ễ" => "e",
        "ệ" => "e",
        "í" => "i",
        "ì" => "i",
        "ỉ" => "i",
        "ĩ" => "i",
        "ị" => "i",
        "ó" => "o",
        "ò" => "o",
        "ỏ" => "o",
        "õ" => "o",
        "ọ" => "o",
        "ô" => "o",
        "ố" => "o",
        "ồ" => "o",
        "ổ" => "o",
        "ỗ" => "o",
        "ộ" => "o",
        "ơ" => "o",
        "ớ" => "o",
        "ờ" => "o",
        "ở" => "o",
        "ỡ" => "o",
        "ợ" => "o",
        "ú" => "u",
        "ù" => "u",
        "ủ" => "u",
        "ũ" => "u",
        "ụ" => "u",
        "ư" => "u",
        "ứ" => "u",
        "ừ" => "u",
        "ử" => "u",
        "ữ" => "u",
        "ự" => "u",
        "ý" => "y",
        "ỳ" => "y",
        "ỷ" => "y",
        "ỹ" => "y",
        "ỵ" => "y",
        "Á" => "A",
        "À" => "A",
        "Ả" => "A",
        "Ã" => "A",
        "Ạ" => "A",
        "Ă" => "A",
        "Ắ" => "A",
        "Ằ" => "A",
        "Ẳ" => "A",
        "Ẵ" => "A",
        "Ặ" => "A",
        "Â" => "A",
        "Ấ" => "A",
        "Ầ" => "A",
        "Ẩ" => "A",
        "Ẫ" => "A",
        "Ậ" => "A",
        "Đ" => "D",
        "É" => "E",
        "È" => "E",
        "Ẻ" => "E",
        "Ẽ" => "E",
        "Ẹ" => "E",
        "Ê" => "E",
        "Ế" => "E",
        "Ề" => "E",
        "Ể" => "E",
        "Ễ" => "E",
        "Ệ" => "E",
        "Í" => "I",
        "Ì" => "I",
        "Ỉ" => "I",
        "Ĩ" => "I",
        "Ị" => "I",
        "Ó" => "O",
        "Ò" => "O",
        "Ỏ" => "O",
        "Õ" => "O",
        "Ọ" => "O",
        "Ô" => "O",
        "Ố" => "O",
        "Ồ" => "O",
        "Ổ" => "O",
        "Ỗ" => "O",
        "Ộ" => "O",
        "Ơ" => "O",
        "Ớ" => "O",
        "Ờ" => "O",
        "Ở" => "O",
        "Ỡ" => "O",
        "Ợ" => "O",
        "Ú" => "U",
        "Ù" => "U",
        "Ủ" => "U",
        "Ũ" => "U",
        "Ụ" => "U",
        "Ư" => "U",
        "Ứ" => "U",
        "Ừ" => "U",
        "Ử" => "U",
        "Ữ" => "U",
        "Ự" => "U",
        "Ý" => "Y",
        "Ỳ" => "Y",
        "Ỷ" => "Y",
        "Ỹ" => "Y",
        "Ỵ" => "Y",
        " " => "-",
    ];
    $str = trim(
        preg_replace(
            "/-+/",
            "-",
            preg_replace(
                "/\s+/",
                "-",
                preg_replace(
                    "/[^a-z0-9-\s]/",
                    "",
                    strtolower(strtr($str, $characters))
                )
            )
        ),
        "-"
    );
    return $str;
}
class SecurityUtils
{
    public static function DetectSQLInjection($sql)
    {
        if (
            preg_match(
                "/\b(union|select|insert|update|delete|drop|alter|truncate|exec|xp_cmdshell|or|order\s*by|from|where|and|group\s*by|having|char|nchar|varchar|nvarchar|cast|convert|declare|script|' OR '1'='1' -- -|' OR '1'='1' #|' OR 1=1 --|' OR 'x'='x' --|' OR 1=1 LIMIT 1 -- -|' OR 1=1; --|' OR '1'='1' --|' OR '1'='1'; --|' OR '1'='1'; DROP TABLE users -- -|' OR 1=CONVERT\(int, \(SELECT @@version\)\) --|' OR 1=\(SELECT COUNT\(\*\) FROM information_schema\.tables\) --|' OR 'x'='x' AND 'y'='y' --|' OR 'x'='x' AND 'y'='z' --|' UNION SELECT null, username, password FROM users --)\b/i",
                $sql
            ) &&
            !preg_match(
                "/' UNION SELECT null, username, password FROM users --/i",
                $sql
            )
        ) {
            return true;
        }
        return false;
    }
}
class CommentCounter extends DatabaseConnection 
{
    public static function TotalComments($product_id)
    {

        $OoO = mysqli_query(self::ThanhDieuDB(), "SELECT SUM(total_comments) AS total_comments FROM (
            SELECT COUNT(*) AS total_comments 
            FROM ws_comments 
            WHERE product_id='{$product_id}'
            UNION ALL
            SELECT COUNT(*) AS total_comments 
            FROM ws_comments_reply 
            JOIN ws_comments ON ws_comments_reply.parent_comment_id = ws_comments.comment_id 
            WHERE ws_comments.product_id='{$product_id}'
        ) AS combined_comments");

        $total_comments = 0;
        if ($OoO && mysqli_num_rows($OoO) > 0) {
            $td = mysqli_fetch_assoc($OoO);
            $total_comments = $td["total_comments"];
        }
        return $total_comments;
    }
}

class CountFormatter
{
    public static function WS($td)
    {
        $td = $td ?? 0;
        if ($td >= 1000 && $td < 1000000) {
            return round($td / 1000, 1) . "K";
        } elseif ($td >= 1000000 && $td < 1000000000) {
            return round($td / 1000000, 1) . "M";
        } elseif ($td >= 1000000000) {
            return round($td / 1000000000, 1) . "B";
        } else {
            return $td;
        }
    }
}
class FormatNumber
{
    public static function TD($coin, $type = 1)
    {
        if ($type == 1) {
            return number_format($coin, 0, ",", ".");
        } elseif ($type == 2) {
            return number_format($coin, 0, ",", ",");
        } else {
            return number_format($coin, 0, ",", ".");
        }
    }
}
class FormatTime
{
    public static function TD($time, $type = 2)
    {
        if ($type == 1) {
            return date('H:i:s d-m-Y', strtotime($time));
        } else {
            return date('H:i d-m-Y', strtotime($time));
        }
    }
}
class WsRandomString
{
    public static function TD($length = 10)
    {
        $characters =
            "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $oOo = "";
        for ($i = 0; $i < $length; $i++) {
            $oOo .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $oOo;
    }
}
class TextCutter {
    public function characters($string, $length) {
        if (mb_strlen($string, 'UTF-8') > $length) {
            return mb_substr($string, 0, $length, 'UTF-8').'...';
        }
        return $string;
    }
}
$cut = new TextCutter();
/** ----------------------------------------------------------------------------- */
/**
 * Giải Thích Update
 * $update->wusteam('update','tenbang', array('username' => 'taikhoan'), "id = 1")
 * trong đó tenbang là tên bảng cần update | id= 1 tức cột cụ thể cần update
 * tương tự into chỉ cần thay update thành into, into khong cần sài cột cụ thể
 * eg. $into->wusteam('insert', 'tenbang',array('username' => 'taikhoan','message' => 'Đây là thông báo')))
 */
class WussunSQL extends DatabaseConnection 
{

    public function wusteam($action, $table, $data, $condition = null) {
        if ($action == 'insert') {
            $this->insert($table, $data);
        } else {
            die(json_encode(array("success" => false, "message" => "Hành động không hợp lệ: $action")));
        }
    }
    private function insert($table, $data) {
        $columns = array_keys($data);
        $values = array_values($data);
        $stmt = self::ThanhDieuDB()->prepare("INSERT INTO $table (" . implode(', ', $columns) . ") VALUES (" . rtrim(str_repeat('?, ', count($columns)), ', ') . ")");
        $stmt->bind_param(str_repeat('s', count($columns)), ...$values);
        $stmt->execute();
        $stmt->close();
    }    
    // private function update1($table, $data, $condition) {
    //     if ($condition === null) {
    //         die("Điều kiện cập nhật không được cung cấp!");
    //     }
    //     $setExpressions = array();
    //     foreach ($data as $column => $value) {
    //         $setExpressions[] = "$column = ?";
    //     }
    //     $stmt = self::ThanhDieuDB()->prepare("UPDATE $table SET ".implode(",", $setExpressions)." WHERE $condition");
    //     $stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));
    //     $stmt->execute();
    // }
    public function update($sql) {
        if (empty($sql)) {
            die("Câu lệnh SQL không được cung cấp!");
        }
        $stmt = self::ThanhDieuDB()->prepare($sql);
        if (!$stmt) {
            die("Lỗi trong quá trình chuẩn bị câu lệnh SQL!");
        }
        $stmt->execute();
        if ($stmt->errno) {
            die($stmt->error);
        }
    }
}
$update = new WussunSQL();
$into = new WussunSQL();
/** ----------------------------------------------------------------------------- */
function Base64_Enc($value) {
    $encoded = base64_encode($value);
    $ws = rtrim($encoded, '=');
    return $ws;
}

function Base64_Dec($value) {
    $padding = strlen($value) % 4;
    if ($padding) {
        $value .= str_repeat('=', 4 - $padding); 
    }
    return base64_decode($value);
}

function isMobile()
{
    return preg_match(
        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|ipad|ipod|pie|tablet|up\.browser|up\.link|webos|wos)/i",
        $_SERVER["HTTP_USER_AGENT"]
    );
}
function UrlsGoto($content) {
    $pattern = '/<a\s+([^>]*?\s+)?href=("|\')((http|https):\/\/[^\s]+)\2([^>]*)>/i';
    $callback = function ($matches) {
        return '<a ' . $matches[1] . 'href="/goto?url=' . Base64_Enc($matches[3]) . '"' . $matches[5] . '>';
    };
    return preg_replace_callback($pattern, $callback, $content);
}

// function UrlsGotoComments($comment_text) {
//     return preg_replace_callback(
//         '#(https?://[^\s]+)#i', 
//         function($matches) {
//             return '<a style="color:var(--theme--preset--color--vivid-cyan-blue);" href="' . '/goto?url=' . Base64_Enc($matches[1]) . '" target="_blank">' . $matches[1] . '</a>';
//         }, 
//         $comment_text
//     );
// }
function CheckStrongPassword($password)
{
    $hasLetter = false;
    $hasDigit = false;
    $hasSpecial = false;
    $specialCharacters = "!@#$%^&*()_+";

    if (strlen($password) < 6) {
        return false;
    }
    for ($i = 0; $i < strlen($password); $i++) {
        if (ctype_alpha($password[$i])) {
            $hasLetter = true;
        } elseif (ctype_digit($password[$i])) {
            $hasDigit = true;
        } elseif (strpos($specialCharacters, $password[$i]) !== false) {
            $hasSpecial = true;
        }
    }
    return ($hasLetter && $hasDigit) ||
        ($hasDigit && $hasSpecial) ||
        ($hasLetter && $hasSpecial);
}

function CheckPassword($password)
{
    if (preg_match('/^[a-zA-Z0-9~!@#$%^&*()_+]+$/', $password)) {
        return true;
    } else {
        return false;
    }
}
function CheckFullName($hovaten)
{
    if (preg_match('/[^\p{L}\p{N}\s]|[!@#$%^&*()_+={}\[\]:;"\'<>?,.\/\\`~|\\\\]/u', $hovaten)) {
        return false;
    } else {
        return true;
    }
}
function VerifyOldPassword($username, $password, $db)
{
    $tdtv = $db->prepare("SELECT password FROM users WHERE username=?");
    $tdtv->bind_param("s", $username);
    $tdtv->execute();
    $result = $tdtv->get_result();
    if ($result->num_rows === 1) {
        $w = $result->fetch_assoc();
        $hashed_pass = $w["password"];
        return password_verify($password, $hashed_pass);
    }
    return false;
}
function TaoMatKhauManh(
    $length = 13,
    $add_dashes = false,
    $available_sets = "hack"
) {
    $sets = [];
    if (strpos($available_sets, "h") !== false) {
        $sets[] = "abcdefghjkmnpqrstuvwxyz";
    }
    if (strpos($available_sets, "a") !== false) {
        $sets[] = "ABCDEFGHJKMNPQRSTUVWXYZ";
    }
    if (strpos($available_sets, "c") !== false) {
        $sets[] = "0123456789";
    }
    if (strpos($available_sets, "k") !== false) {
        $sets[] = '.!@#$*~-';
    }

    $all = null;
    $password = null;
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }

    $all = str_split($all);
    for ($i = 0; $i < $length - count($sets); $i++) {
        $password .= $all[array_rand($all)];
    }

    $password = str_shuffle($password);

    if (!$add_dashes) {
        return $password;
    }

    $dash_len = floor(sqrt($length));
    $dash_str = null;
    while (strlen($password) > $dash_len) {
        $dash_str .= substr($password, 0, $dash_len) . "-";
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}
function CheckDuplicateComment($username, $comment_text, $thanhdieudb) {
    $vtd = $thanhdieudb->prepare("SELECT COUNT(*) FROM ws_comments WHERE user_username = ? AND comment_text = ? AND created_at > NOW() - INTERVAL 10 SECOND");
    $count = null;
    $vtd->bind_param("ss", $username, $comment_text);
    $vtd->execute();
    $vtd->bind_result($count);
    $vtd->fetch();
    $vtd->close();
    return $count > 0;
}

function CalculateRuby($sotien, $TD) {
    if ($sotien >= $TD->Setting('min-transfer')) {
        return floor($sotien / $TD->Setting('min-transfer')) * random_int(10, 30);
    }
    elseif ($sotien >= 500000) {
        return floor($sotien/$TD->Setting('min-transfer')) * random_int(30, 50);
    }
    elseif ($sotien >= 1000000) {
        return floor($sotien/$TD->Setting('min-transfer')) * random_int(50, 100);
    }
    return 0;
}
class RequestPageCount extends DatabaseConnection 
{
    public function TD($page) {
        $vtd = self::ThanhDieuDB()->prepare("UPDATE ws_requestpages SET count_request = count_request + 1 WHERE pages = ?");
        $vtd->bind_param('s', $page);
        $vtd->execute();
        if ($vtd->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
$RequestUpdater = new RequestPageCount();
class TotalGolbal extends DatabaseConnection {
    private $taikhoan;

    public function __construct($taikhoan) {
        $this->taikhoan = $taikhoan;
    }

    public function Users() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `users`");
    }

    public function BannedUsers() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `users` WHERE `banned` > 0");
    }

    public function Traffic() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_traffic`");
    }

    public function Money() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `users` WHERE `tongnap` > 0");
    }

    public function Products() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_products`");
    }

    public function Logs() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_logs`");
    }

    public function Bank() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_history_bank`");
    }

    public function Card() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_history_card`");
    }

    public function NotifySystem() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_notify_system` WHERE username='{$this->taikhoan}' AND isread=0");
    }

    public function HistoryProducts() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_history_products`");
    }

    public function HistoryOrderUsers() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_history_products` hp JOIN `ws_products` p ON hp.product_id = p.id WHERE hp.taikhoan='{$this->taikhoan}'");
    }

    public function ReportPending() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_reports` WHERE status='pending'");
    }

    public function VerifyPending() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_verification` WHERE status='pending'");
    }

    public function Comments() {
        return $this->TD("SELECT COUNT(*) AS COUNT FROM `ws_comments`");
    }

    public function checkBlackIP() {
        $oOo = self::ThanhDieuDB()->query("SELECT blackip FROM ws_settings");
        if ($oOo) {
            $data = $oOo->fetch_assoc();
            return $data ? $data["blackip"] : null;
        }
        return null;
    }

    private function TD($OWO) {
        $oOo = self::ThanhDieuDB()->query($OWO);
        if ($oOo) {
            $data = $oOo->fetch_assoc();
            return $data ? $data["COUNT"] : 0;
        }
        return 0;
    }
}
$totals = new TotalGolbal($taikhoan);
class Transfer extends DatabaseConnection 
{
    public function TD($column, $record) {
        $offset = $record - 1; 
        $vtd = self::ThanhDieuDB()->prepare("SELECT `$column` FROM ws_transfer LIMIT ?, 1");
        $vtd->bind_param("i", $offset);
        $vtd->execute();
        $result = $vtd->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row[$column]; 
        } else {
            return 'Chưa cấu hình transfer';
        }
    }
}

$transfer = new Transfer();
class BlacklistChecker extends DatabaseConnection 
{
    public function CheckBlacklist($ip, $TD)
    {
        $checkbanip = self::ThanhDieuDB()->query(
            "SELECT `black-ip` FROM ws_settings"
        );
        if ($checkbanip->num_rows > 0) {
            while ($row = $checkbanip->fetch_assoc()) {
                $blacklistIPs = explode("|", $row["black-ip"]);
                if (in_array($ip, $blacklistIPs)) {
                    $message = '<span>Your IP has been blacklisted, if you need support, contact us <a href="' .
                               $TD->Setting("zalo") .
                               '" target="_blank">here</a></span>.';
                    http_response_code(403);
                    header("HTTP/1.1 403 Forbidden");
                    die($message);
                }
            }
        }
    }
}
(new BlacklistChecker($thanhdieudb))->CheckBlacklist($ip,$TD);
class UserStats extends DatabaseConnection 
{
    public function Post($taikhoan, $xetduyet = 1)
    {
        $OoO = self::ThanhDieuDB()->prepare(
            "SELECT COUNT(*) AS post_count FROM ws_products WHERE taikhoan=? AND xetduyet = ?"
        );
        $OoO->bind_param("si", $taikhoan, $xetduyet);
        $OoO->execute();
        return $OoO->get_result()->fetch_assoc()["post_count"];
    }

    public function Comment($taikhoan)
    {
        $OoO = self::ThanhDieuDB()->prepare(
            "SELECT 
                (SELECT COUNT(*) FROM ws_comments WHERE user_username=?) +
                (SELECT COUNT(*) FROM ws_comments_reply WHERE user_username=?) AS comment_count"
        );
        $OoO->bind_param("ss", $taikhoan, $taikhoan);
        $OoO->execute();
        return $OoO->get_result()->fetch_assoc()["comment_count"];
    }
}

$UserStats = new UserStats();

function FilterTags($text)
{
    $blacklist = ["<script", "</script", "<?php", "?>", "<iframe", "</iframe>"];
    foreach ($blacklist as $word) {
        $text = str_ireplace($word, Chars($word), $text);
    }
    return $text;
}
function Chars($text)
{
    return implode("/", str_split($text));
}
class BrowserInfo
{
    public $name;
    public $icon;

    public function __construct($userAgent)
    {
        $this->name = "Google Chrome";
        $this->icon = "chrome";

        if (strpos($userAgent, "Firefox") !== false) {
            $this->name = "Firefox";
            $this->icon = "firefox";
        } elseif (strpos($userAgent, "Chrome") !== false) {
            $this->name = "Google Chrome";
            $this->icon = "chrome";
        } elseif (strpos($userAgent, "Safari") !== false) {
            $this->name = "Safari";
            $this->icon = "safari";
        } elseif (strpos($userAgent, "Edge") !== false) {
            $this->name = "Microsoft Edge";
            $this->icon = "edge";
        } elseif (
            strpos($userAgent, "MSIE") !== false ||
            strpos($userAgent, "Trident") !== false
        ) {
            $this->name = "Internet Explorer";
            $this->icon = "ie";
        } elseif (strpos($userAgent, "Opera") || strpos($userAgent, "OPR")) {
            $this->name = "Opera";
            $this->icon = "opera";
        }
    }
}
class DeviceInfo
{
    public $name;
    public $icon;

    public function __construct($userAgent)
    {
        $this->name = "Không Xác Định";
        $this->icon = "android";

        if (strpos($userAgent, "Android") !== false) {
            $this->name = "Android";
            $this->icon = "android";
        } elseif (
            preg_match(
                "/iPhone(?:\s+OS)?\s([0-9_]+)?\s*.*\s*like\s*Mac OS X/",
                $userAgent,
                $matches
            )
        ) {
            $this->name = "iOS";
            $iphone_version = !empty($matches[1])
                ? str_replace("_", ".", $matches[1])
                : "";
            $this->name = $iphone_version ? "iPhone $iphone_version" : "iPhone";
            $this->icon = "apple";
        } elseif (strpos($userAgent, "iPad") !== false) {
            $this->name = "iPad";
            $this->icon = "apple";
        } elseif (strpos($userAgent, "Windows Phone") !== false) {
            $this->name = "Windows Phone";
            $this->icon = "win1";
        } elseif (strpos($userAgent, "Macintosh") !== false) {
            $this->name = "macOS";
            $this->icon = "mac";
        } elseif (strpos($userAgent, "Linux") !== false) {
            $this->name = "Linux";
            $this->icon = "linux";
        } elseif (strpos($userAgent, "Windows") !== false) {
            if (
                preg_match(
                    "/Windows\s(?:NT\s)?(\d+\.\d+)/",
                    $userAgent,
                    $windows_matches
                )
            ) {
                $windows_version = $windows_matches[1];
                $this->name = "Windows $windows_version";
            } elseif (
                preg_match(
                    "/Windows\s(?:NT\s)?(\d+)/",
                    $userAgent,
                    $windows_matches
                )
            ) {
                $windows_version = $windows_matches[1];
                $this->name = "Windows $windows_version";
            } else {
                $this->name = "Windows";
            }
            $this->icon = "win1";
        }
    }
}

$browser_info = new BrowserInfo($userAgent);
$device_info = new DeviceInfo($userAgent);
$browser_name = $browser_info->name;
$browser_icon = "icon-" . strtolower(str_replace(" ", "", $browser_info->icon));
$device_name = $device_info->name;
$device_icon = "icon-" . strtolower(str_replace(" ", "", $device_info->icon));
class ProductHistory extends DatabaseConnection 
{
    public function TongMuaMaNguon($condition)
    {
        $oOo = self::ThanhDieuDB()->query(
            "SELECT COUNT(*) AS total FROM `ws_history_products` WHERE $condition"
        );
        if ($oOo !== false && $oOo->num_rows > 0) {
            $td = $oOo->fetch_assoc();
            return $td["total"];
        } else {
            return 0;
        }
    }

    public function TongMuaHomNay()
    {
        $HomNay = date("Y-m-d");
        return $this->TongMuaMaNguon("DATE(ngaymua)='$HomNay'");
    }

    public function TongMuaHomQua()
    {
        $HomQua = date("Y-m-d", strtotime("-1 day"));
        return $this->TongMuaMaNguon("DATE(ngaymua)='$HomQua'");
    }

    public function TongMuaTuanNay()
    {
        $DauTuanNay = date("Y-m-d", strtotime("last monday"));
        $TuanNay = date("Y-m-d", strtotime("next sunday"));
        return $this->TongMuaMaNguon(
            "DATE(ngaymua) BETWEEN '$DauTuanNay' AND '$TuanNay'"
        );
    }

    public function TongMuaThangNay()
    {
        $DauThangNay = date("Y-m-01");
        $CuoiThangNay = date("Y-m-t");
        return $this->TongMuaMaNguon(
            "DATE(ngaymua) BETWEEN '$DauThangNay' AND '$CuoiThangNay'"
        );
    }
}
$product = new ProductHistory($thanhdieudb);
function PhanLoai($phanloai) {
    $array = [
        'manguon-website' => 'Mã Nguồn Website',
        'manguon-phanmem' => 'Mã Nguồn Phần Mềm',
        'manguon-khac' => 'Mã Nguồn Khác'
    ];
    return isset($array[$phanloai]) ? $array[$phanloai] : '';
}
class ThoiGianTrongTuan
{
    public static $td = [
        "Monday" => "Thứ Hai",
        "Tuesday" => "Thứ Ba",
        "Wednesday" => "Thứ Tư",
        "Thursday" => "Thứ Năm",
        "Friday" => "Thứ Sáu",
        "Saturday" => "Thứ Bảy",
        "Sunday" => "Chủ Nhật",
    ];
}

$now = date("H:i l d/m/Y", time());

foreach (ThoiGianTrongTuan::$td as $english => $vietnamese) {
    $now = str_replace($english, $vietnamese, $now);
}
function TDSideBarSetting($url) {
    global $current_url;
    return basename($current_url) === $url ? 'active' : '';
}
function SaveModal($f) 
{
    return [
        'text'=>$f?'Kích Hoạt':'Vô Hiệu Hoá',
        'color'=>$f?'primary':'danger',
        'checked'=>$f?'checked':''
    ];
}
if ($TD->Setting('https') == 1) 
{
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        $https = 'https://';
        $redirect = $https . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: ' . $redirect);
        exit();
    }
}
$ngaydiemdanh = array(
    array("day" => "Ngày 1", "ruby" => 30, "exp" => 40),
    array("day" => "Ngày 2", "ruby" => 40, "exp" => 60),
    array("day" => "Ngày 3", "ruby" => 60, "exp" => 90),
    array("day" => "Ngày 4", "ruby" => 80, "exp" => 120),
    array("day" => "Ngày 5", "ruby" => 100, "exp" => 150),
    array("day" => "Ngày 6", "ruby" => 120, "exp" => 180),
    array("day" => "Ngày 7", "ruby" => 140, "exp" => 210)
);
class GlobalViews extends DatabaseConnection
{
    private $product_id;
    private $taikhoan;
    private $ip;
    private $slug;

    public function __construct($product_id, $taikhoan, $ip, $slug)
    {
        $this->product_id = $product_id;
        $this->taikhoan = empty($taikhoan) ? 'Tài Khoản Khách' : $taikhoan;
        $this->ip = $ip;
        $this->slug = $slug;
    }

    public function LuotXem()
    {
        if ($this->uniqueViews()) {
            $this->insertViews();
            $this->updateViews();
        }
    }

    private function uniqueViews()
    {
        $checkView = $this->ThanhDieuDB()->prepare("
            SELECT COUNT(*) as count 
            FROM ws_views 
            WHERE product_id = ? AND (taikhoan = ? OR ip = ?)
        ");
        $checkView->bind_param('iss', $this->product_id, $this->taikhoan, $this->ip);
        $checkView->execute();
        $result = $checkView->get_result()->fetch_assoc();
        return $result['count'] == 0;
    }

    private function insertViews()
    {
        $insertView = $this->ThanhDieuDB()->prepare("
            INSERT INTO ws_views (product_id, taikhoan, ip, slug, thoigian) 
            VALUES (?, ?, ?, ?, NOW())
        ");
        $insertView->bind_param('isss', $this->product_id, $this->taikhoan, $this->ip, $this->slug);
        $insertView->execute();
    }

    private function updateViews()
    {
        $updateViews = $this->ThanhDieuDB()->prepare("
            UPDATE ws_products 
            SET luotxem = luotxem + 1 
            WHERE id = ?
        ");
        $updateViews->bind_param('i', $this->product_id);
        $updateViews->execute();
    }
}