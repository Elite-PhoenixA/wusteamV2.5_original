<?php
if (!class_exists('DatabaseConnection')){header('location: /');}
class WsUserProfile extends DatabaseConnection {
    public function TDUser($taikhoan) {
        $oOo = self::ThanhDieuDB()->prepare("SELECT users.*, ws_verification.*, ws_plans.tengoi AS plans FROM users
        LEFT JOIN ws_verification ON users.username = ws_verification.username
        LEFT JOIN ws_plans ON users.username = ws_plans.taikhoan
        WHERE users.username = ?
        ");    
        $oOo->bind_param('s', $taikhoan);
        $oOo->execute();
        $td = $oOo->get_result();
        $vtd = $td->fetch_assoc();
        $vtd['username'] = $taikhoan;
        return $vtd;
    }    
}
$td=(new WsUserProfile())->TDUser($taikhoan);
if (!isset($td)){
    exit('<meta http-equiv="refresh" content="0; url=' . TDRedirectPage::user($website_domain) . '">');
} elseif (!isset($td['user_id'])) {
    exit('<meta http-equiv="refresh" content="0; url=' . TDRedirectPage::user($website_domain) . '">');
}
// define('Avatar', $td['avatar'] . "?user_id=" . $td['id'] . "&threads_hash=" .uniqid('ws.',true).'.c.'. WsRandomString::TD(random_int(30,50)));
// define('AnhBia', $td['anhbia'] . "?user_id=" . $td['id'] . "&threads_hash=" .uniqid('ws.',true).'.c.'. WsRandomString::TD(random_int(30,50)));
$is_mobile = isMobile();
$on_start = $is_mobile ? 'true' : 'false';
$options_header = [
    'title' => $td['hovaten'],
    'og:image' => '/'.__IMG__.'/user/'.$td['avatar'],
    'keywords' => $td['hovaten'].','.$td['username'].','.$TD->Setting('name-site'),
];