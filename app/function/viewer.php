<?php
/**
 * @author Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')){header('location: /');}
class ProductView extends DatabaseConnection 
 {
    private $ip;
    private $taikhoan;
    private $time;
    private $TD;
    function __construct($ip, $taikhoan, $time,$TD) {
        $this->ip=$ip;
        $this->taikhoan=empty($taikhoan) ? 'Tài Khoản Khách' : $taikhoan;
        $this->time=$time;
        $this->TD=$TD;
    }
    function AddViews($slug, $product_id,$TD) {
        $checkviews=self::ThanhDieuDB()->query("SELECT COUNT(*) AS count FROM ws_views WHERE (taikhoan='$this->taikhoan' OR ip='$this->ip') AND product_id='$product_id'");
        if ($checkviews) {
            $f=$checkviews->fetch_assoc();
            if ($f['count'] < $TD->Setting('view-limit')) { 
                if (self::ThanhDieuDB()->query("INSERT INTO ws_views (product_id, taikhoan, ip, slug, thoigian) VALUES ('$product_id','$this->taikhoan', '$this->ip', '$slug', '$this->time')") === TRUE) {
                    self::ThanhDieuDB()->query("UPDATE ws_products SET luotxem=luotxem + 1 WHERE id='$product_id'");
                } else {
                    echo self::ThanhDieuDB()->error;
                }
            }
        } else {
            echo self::ThanhDieuDB()->error;
        }
    }
    function ActualViews($product_id) {
        $viewCount = self::ThanhDieuDB()->query("SELECT COUNT(*) AS count FROM ws_views WHERE product_id='$product_id'");
        if ($viewCount) {
            $result = $viewCount->fetch_assoc();
            $count = $result['count'];
            self::ThanhDieuDB()->query("UPDATE ws_products SET luotxem='$count' WHERE id='$product_id'");
        } else {
        echo self::ThanhDieuDB()->error;
        }
    }
}
$productView = new ProductView($ip, $taikhoan, $time, $TD);
$productView->AddViews($slug, $td['id'],$TD);
$productView->ActualViews($td['id']);
