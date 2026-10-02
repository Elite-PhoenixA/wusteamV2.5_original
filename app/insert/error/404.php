<?php 
$options_header = [
    'title' => "Trang Không Tìm Thấy | 404 Not Found",
    'description' => 'Chúng tôi rất xin lỗi vì sự bất tiện. Có vẻ như bạn đang cố truy cập một trang đã bị xóa hoặc chưa từng tồn tại.'
];
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<?php
class ProductService extends DatabaseConnection 
{
    public function AllProducts() {
        $products = array();
        if ($result = self::ThanhDieuDB()->query("
            SELECT 
                *
            FROM 
                ws_products
            ORDER BY 
                luotxem DESC LIMIT 6
        ")) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            $result->free();
        } else {
            echo self::ThanhDieuDB()->error;
        }
        
        return $products;
    }    
}
$products = (new ProductService())->AllProducts();
?><main class="main-min-height">
<div class="f404">
    <img src="/<?=__IMG__?>/svg/404.svg">
</div>
<div class="theme-box box-body main-search">
    <div class="search-input">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/app/insert/search.php');?>
        <div class="padding-10 relates relates-thumb">
            <?php if (!empty($products)): ?>
            <p class="muted-color">Sản Phẩm Phổ Biến</p>
            <div class="swiper-container swiper-scroll swiper-scroll-eq-0 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode"
                swiper-scroll-index="0">
                <div class="swiper-wrapper">
                    <?php foreach($products as $product): ?>
                    <div class="swiper-slide em09 mr10 swiper-slide-active" style="width:160px;" role="group">
                        <a href="/view-code/<?=$product['slug']?>">
                            <div class="graphic hover-zoom-img style-3" style="padding-bottom:70%!important;">
                                <img class="fit-cover lazyload"
                                    data-src="/<?=__IMG__?>/uploads/<?=$product['hinhthunho']?>"
                                    src="/<?=__IMG__?>/thumbnail-sm.png"
                                    alt="<?=$product['tieude']?>-<?=$TD->Setting('name-site')?>">
                                <div class="abs-center left-bottom graphic-text text-ellipsis">
                                    <?=$product['tieude']?>
                                </div>
                                <div class="abs-center left-bottom graphic-text">
                                    <div class="em09 opacity8"><?=$cut->characters(strip_tags($product['noidung']),100)?></div>
                                    <div class="px12 opacity8 mt6">
                                        <item class="ngay-dang"
                                            data-ngaydang="<?=$product['ngaydang']?>"></item>
                                        <item class="pull-right">
                                            <i class="ri-eye-line"></i>
                                            <?=CountFormatter::WS($product['luotxem'])?>
                                        </item>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>