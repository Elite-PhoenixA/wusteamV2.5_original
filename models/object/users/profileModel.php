<?php 
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')){header('location: /');}
class WsGolbalProfile extends DatabaseConnection 
{
        public $title;

    public function KiemTra($slug) {
        $Owo = self::ThanhDieuDB()->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $Owo->bind_param("s", $slug);
        $Owo->execute();
        $td = $Owo->get_result();
        $count = $td->fetch_row();
        return $count[0] > 0;
    }
    public function WsDataUsers($slug) {
        $Owo = self::ThanhDieuDB()->prepare("
            SELECT users.*, ws_verification.*, ws_plans.tengoi AS plans
            FROM users
            LEFT JOIN ws_verification ON users.username = ws_verification.username
            LEFT JOIN ws_plans ON users.username = ws_plans.taikhoan
            WHERE users.username = ?
        ");
        $Owo->bind_param("s", $slug);
        $Owo->execute();
        $td = $Owo->get_result();
        $vtd = $td->fetch_assoc();
        $vtd['username'] = $slug;
        return $vtd;
    }    
}
$oOo = new WsGolbalProfile();
$slug = preg_replace('/^@|[^\p{L}\p{N}\-.]/u', '', strtok(basename($current_url), '?'));
$author = $oOo->WsDataUsers($slug);
if (!$oOo->KiemTra($slug) || $author['banned'] == 1) {
    exit(include($_SERVER['DOCUMENT_ROOT'] . '/app/insert/error/404.php'));
}
$is_user = isset($taikhoan) && $taikhoan === $author['username'];
$class_follow = ($author['username'] === $taikhoan) ? ($taikhoan !== null ? 'user-follow-author' : 'signin-loader') : ($taikhoan !== null ? 'user-follow-author' : 'signin-loader');
$class_chat = ($author['username'] === $taikhoan) ? ($taikhoan !== null ? 'user-chat-message' : 'signin-loader') : ($taikhoan !== null ? 'user-chat-message' : 'signin-loader');
$is_following = FollowChecker::TD($taikhoan, $author['username']);
$ReportStatus = (($OOO = $thanhdieudb->query("SELECT status FROM ws_reports WHERE username = '$taikhoan' AND victim = '{$author['username']}' ORDER BY created_at DESC LIMIT 1")) && $OOO->num_rows > 0 && ($row = $OOO->fetch_assoc()) && $row['status'] === 'pending') ? 'report_notice' : 'report_modal';
$options_header = [
    'title' => $author['hovaten']. " | " . $TD->Setting('name-site'),
    'og:image' => '/'.__IMG__.'/user/'.$author['avatar'],
    'description' => $author['hovaten'].' đang ở trên '.$TD->Setting('name-site').'. Tham gia '.$TD->Setting('name-site').' để kết nối với '.$author['hovaten'].' và những người khác mà có thể bạn biết.',
    'keywords' => $author['hovaten'].','.$author['username'].','.$TD->Setting('name-site'),
];
// $RequestUpdater->TD(trim(explode('/',parse_url($current_url,PHP_URL_PATH))[1]??'','/').'/');