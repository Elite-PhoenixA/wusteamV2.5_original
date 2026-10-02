<?php
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')){header('location: /');}
class TDShowProduct extends DatabaseConnection 
{
    public function KiemTra($slug) {
        $query = self::ThanhDieuDB()->prepare("SELECT COUNT(*) FROM ws_products WHERE slug = ?");
        $query->bind_param("s", $slug);
        $query->execute();
        $result = $query->get_result();
        $count = $result->fetch_assoc();
        return $count['COUNT(*)'] > 0;
    }
    public function WsDataProduct($slug) {
        $OwO = self::ThanhDieuDB()->prepare("SELECT 
            ws_products.*, 
            users.*, 
            ws_verification.status, 
            ws_plans.tengoi AS plans,
            COALESCE(comment_counts.luotcmt,0) AS luotcmt,
            ws_history_products.magiaodich
        FROM 
            ws_products
        LEFT JOIN 
            users ON ws_products.taikhoan = users.username
        LEFT JOIN 
            ws_verification ON users.username = ws_verification.username
        LEFT JOIN
            ws_plans ON users.username = ws_plans.taikhoan
        LEFT JOIN 
            (
                SELECT 
                    product_id,
                    COUNT(comment_id) AS luotcmt
                FROM 
                    ws_comments
                GROUP BY 
                    product_id
            ) AS comment_counts ON ws_products.id = comment_counts.product_id
        LEFT JOIN
            ws_history_products ON ws_products.id = ws_history_products.product_id
        WHERE 
            ws_products.slug = ?
    ");
    
        $OwO->bind_param("s",$slug);
        $OwO->execute();
        $OooO = $OwO->get_result();
        $product = $OooO->fetch_assoc();
        return $product;
    }
}

    class ProductChecker extends DatabaseConnection {
        private $taikhoan;
        public function __construct($taikhoan) {
            $this->taikhoan = $taikhoan;
        }

        public function Liked($product_Id) {
            $result = self::ThanhDieuDB()->query("SELECT COUNT(*) AS count FROM ws_like WHERE username = '$this->taikhoan' AND product_id = $product_Id");
            return $result ? $result->fetch_assoc()['count'] > 0 : false;
        }

        public function Commented($product_Id) {
            $result = self::ThanhDieuDB()->query("SELECT COUNT(*) AS count FROM ws_comments WHERE user_username = '$this->taikhoan' AND product_id = $product_Id");
            return $result ? $result->fetch_assoc()['count'] > 0 : false;
        }

        public function Purchased($product_Id) {
            $result = self::ThanhDieuDB()->query("SELECT COUNT(*) AS count FROM ws_history_products WHERE taikhoan = '$this->taikhoan' AND product_id = $product_Id");
            return $result ? $result->fetch_assoc()['count'] > 0 : false;
        }
        public function Level($minLevel) {
            global $user;
            return strpos($user['level'], 'svip') === 0 || $user['level'] >= $minLevel;
        }
        
    }
$oOo = new TDShowProduct();
$slug = preg_replace('/[^\p{L}\p{N}\-.]/u', '', strtok(basename($current_url), '?'));
$td = $oOo->WsDataProduct($slug);
if (!$oOo->KiemTra($slug)||$td['xetduyet']==0){exit(include($_SERVER['DOCUMENT_ROOT'] . '/app/insert/error/404.php'));} 
define('AnhSanPham',explode('|', $td['anhsanpham']));
define('isLiked',($thanhdieudb->query("SELECT COUNT(*) AS count FROM ws_like WHERE username = '$taikhoan' AND product_id = " . $td['id'])->fetch_assoc()['count'] > 0));
$ReportStatus = (($OOO = $thanhdieudb->query("SELECT status FROM ws_reports WHERE username = '$taikhoan' AND victim = '{$td['username']}' ORDER BY created_at DESC LIMIT 1")) && $OOO->num_rows > 0 && ($row = $OOO->fetch_assoc()) && $row['status'] === 'pending') ? 'report_notice' : 'report_modal';
$class_follow=(isset($taikhoan) && $taikhoan !== null) ? 'user-follow-author' : 'signin-loader';
$class_chat=(isset($taikhoan) && $taikhoan !== null) ? 'user-chat-message' : 'signin-loader';
$is_following=FollowChecker::TD($taikhoan, $td['username']);
$options_header = [
    'title' => $td['tieude'] . ' - '.$TD->Setting('name-site'),
    'og:image' => 'https://'.$domain.'/'.__IMG__.'/uploads/'.$td['hinhthunho'],
    'description' => $cut->characters(strip_tags($td['noidung']),150),
];

function DownloadCode($product_id,$taikhoan) {
    global $thanhdieudb;
    $stmt = $thanhdieudb->prepare("
        SELECT magiaodich 
        FROM ws_history_products 
        WHERE product_id = ? AND taikhoan = ?
    ");
    $magiaodich = null;
    $stmt->bind_param("is", $product_id, $taikhoan);
    $stmt->execute();
    $stmt->bind_result($magiaodich);
    $stmt->fetch();
    return $magiaodich;
}
class CommentsConverter {
    public static function TD($text) {
        $img = '/\[img=([^\]]+)\]/';
        $emoji = '/\[icon=([^\]]+)\]/';
        $one = function($matches) {
            return '<img data-fancybox class="box-img lazyload" src="'.$matches[1].'" data-src="'.$matches[1].'" alt="" imgbox-index="0">';
        };
        $two = function($matches) {
            return '<img class="smilie-icon lazyload no-events-img" src="/'.__IMG__.'/icon/emoji/'.$matches[1].'.gif" data-src="/'.__IMG__.'/icon/emoji/'.$matches[1].'.gif" alt="[icon='.$matches[1].']">';
        };
        $text = preg_replace_callback($emoji, $two, THANHDIEU($text));
        return preg_replace_callback($img, $one, $text);
    }
}
$discount=null;