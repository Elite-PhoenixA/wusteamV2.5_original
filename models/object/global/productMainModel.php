<?php
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')){header('location: /');}

class ProductManager extends DatabaseConnection {
    private $cut;

    public function __construct($cut) {
        $this->cut = $cut;
    }

    public function WsShowProducts($current_page = 1, $limit = 2) {
        $_search_ = htmlentities(isset($_GET['search']) ? trim($_GET['search']) : '', ENT_QUOTES, 'UTF-8');
        $offset = ($current_page <= 0) ? 99999 : ($current_page - 1) * $limit;

        $ws_tab = "1";
        switch (isset($_GET['tab']) ? $_GET['tab'] : 'index-main') {
            case 'index-website':
                $ws_tab = "phanloai = 'manguon-website'";
                break;
            case 'index-software':
                $ws_tab = "phanloai = 'manguon-phanmem'";
                break;
            case 'index-other':
                $ws_tab = "phanloai = 'manguon-khac'";
                break;
            default:
                break;
        }

        if (isset($_search_)) {
            $ws_tab .= " AND (tieude LIKE '%$_search_%' OR slug LIKE '%$_search_%' OR phanloai LIKE '%$_search_%')";
        }

        $query = "SELECT ws_products.*, users.user_id, users.hovaten, users.username, users.avatar, users.rank, COUNT(ws_comments.comment_id) AS luotcmt, ws_plans.tengoi AS plans
                FROM ws_products
                INNER JOIN users ON ws_products.taikhoan = users.username
                INNER JOIN ws_comments ON ws_products.id = ws_comments.product_id
                INNER JOIN ws_plans ON users.username = ws_plans.taikhoan
                WHERE ws_products.xetduyet = 1 AND $ws_tab AND users.banned != 1
                GROUP BY ws_products.id
                ORDER BY ws_products.ngaydang DESC
                LIMIT $limit OFFSET $offset";

        $result = self::ThanhDieuDB()->query($query);
        $html = '';

        if ($result->num_rows > 0) {
            while ($td = $result->fetch_assoc()) {
                $html .= '<posts class="posts-item card ajax-item" role="group" aria-label="ThanhDieu / ' . $td['id'] . '">' .
                    '<div class="item-thumbnail">' .
                    '<a href="/view-code/' . $td['slug'] . '">' .
                    '<img src="/{__IMG__}/loading.gif" alt="' . htmlspecialchars(THANHDIEU($td['tieude'])) . '" data-src="/{__IMG__}/uploads/' . $td['hinhthunho'] . '" class="fit-cover radius8 lazyload">' .
                    '</a>' .
                    '</div>' .
                    '<div class="item-body">' .
                    '<h2 class="item-heading">' .
                    '<a href="/view-code/' . $td['slug'] . '">' . $td['tieude'] . '</a>' .
                    '</h2>';

                if (time() - strtotime($td['ngaydang']) <= 3 * 24 * 60 * 60) {
                    $html .= '<div class="new"><img src="/{__IMG__}/icon/news.png"></div>';
                }

                $html .= '<div class="item-tags scroll-x no-scrollbar mb6">' .
                    '<a class="meta-pay but ' . ($td['giatien'] === 0 ? 'c-green' : ColorGiaBan($td['giatien'])) . '">' .
                    ($td['giatien'] === 0 ? 'Miễn Phí' : FormatNumber::TD($td['giatien'], 2) . 'đ') .
                    '</a>';

                $mau = array('manguon-website' => 'c-blue', 'manguon-phanmem' => 'c-yellow', 'manguon-khac' => 'c-pink');
                $icon = array('manguon-website' => 'ri-code-s-slash-line', 'manguon-phanmem' => 'ri-tools-line', 'manguon-khac' => 'ri-openai-fill');
                $html .= '<a class="but ' . $mau[$td['phanloai']] . '">' .
                    '<i class="' . $icon[$td['phanloai']] . '" aria-hidden="true"></i>&nbsp;' . PhanLoai($td['phanloai']) .
                    '</a>' .
                    '</div>' .
                    '<a class="down" href="/view-code/' . $td['slug'] . '">Xem Ngay</a>' .
                    '</div>' .
                    '</posts>';
            }
        } else {
            $html .= '<p>Không có sản phẩm nào</p>';
        }

        return $html;
    }
}