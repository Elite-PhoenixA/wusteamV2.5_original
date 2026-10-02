<?php 
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')){header('location: /');}
class WsDownload extends DatabaseConnection 
{
    private $current_url;

    public function __construct($current_url) {
        $this->current_url = $current_url;
    }

    public function MaGiaoDich() {
        return preg_replace('/[^0-9a-zA-Z\-]/', '', strtok(basename($this->current_url), '?'));
    }
    public function ProductData($magiaodich, $taikhoan) {
        $vtd = self::ThanhDieuDB()->prepare("SELECT 
        ws_products.*, 
        IF(ws_history_products.product_id IS NOT NULL, 1, 0) AS is_purchased,
        ws_history_products.giamua, 
        ws_history_products.ngaymua,
        ws_history_products.phanloai 
    FROM 
        ws_products
    INNER JOIN 
        ws_history_products ON ws_products.id = ws_history_products.product_id
    WHERE 
        ws_history_products.magiaodich = ? AND
        ws_history_products.taikhoan = ?");
    $vtd->bind_param("ss", $magiaodich, $taikhoan);
        $vtd->execute();
        $result = $vtd->get_result();
        if ($result && $result->num_rows > 0) {
            $productData = $result->fetch_assoc();
            if ($productData['is_purchased']) {
                return $productData;
            } else {
                header("Location: /");
                exit;
            }
        } else {
            header("Location: /");
            exit;
        }
    }    
}
$download = new WsDownload($current_url);
$magiaodich = $download->MaGiaoDich();
$productData = $download->ProductData($magiaodich,$taikhoan);
$options_header = ['title' => 'Trang Tải Xuống - '.$TD->Setting('name-site')];