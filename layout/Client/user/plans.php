<div class="ajax-item">
    <?php if ($plans->TD('tengoi',$user['username'])):?>
    <div class="row gutters-5 mb20">
        <div class="col-sm-8">
            <div class="vip-card level-<?=$level_plans?> vip-theme<?=$level_plans?> no-events-img" vip-level="<?=$level_plans?>">
                <div class="abs-center vip-baicon">
                    <img class="img-icon lazyload" src="/<?=$images_plans?>"
                        data-src="/<?=$images_plans?>" title="<?=$title_plans?>" alt="<?=$title_plans?>">

                </div>
                <div class="vip-img abs-right">
                    <img class="img-icon lazyload" src="/<?=$images_plans?>"
                        data-src="/<?=$images_plans?>" title="<?=$title_plans?>"
                        alt="<?=$title_plans?>">
                </div>
                <div class="flex ac mb10 mt15">
                    <div class="avatar-img mr10">
                        <img alt="Avatar của <?=THANHDIEU($user['hovaten'])?> - <?=$TD->Setting('name-site')?>"
                            src="/<?=__IMG__.'/users/'.$user['avatar']?>"
                            data-src="/<?=__IMG__.'/users/'.$user['avatar']?>"
                            class="avatar avatar-id-<?=$user['user_id']?> lazyload">
                            <!-- <?=ShowPlans::TD($td['username']);?> -->
                    </div>
                    <div>
                        <div class="font-bold">
                            <img class="img-icon lazyload" src="/<?=$images_plans?>"
                                data-src="/<?=$images_plans ?>"
                                title="<?=$title_plans ?>" alt="<?=$title_plans?>">
                            Thành Viên <?=ucfirst($plans->TD('tengoi',$user['username']))?>
                        </div>
                        <div class="px12">
                        <i class="ri-time-line mr6"></i>
                            Hết hạn: <?=(date('Y', strtotime($plans->TD('ngayhethan', $user['username']))) > 2100) ? 'Vĩnh viễn' : date('\n\g\à\y j \t\h\á\n\g n \nă\m Y', strtotime($plans->TD('ngayhethan', $user['username'])))?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="row gutters-7">
        <div class="col-sm-6">
            <div class="vip-card pointer plans-buyer vip-theme1 pay-vip" vip-level="1">
                <div class="abs-center vip-baicon">
                    <img class="lazyload img-icon" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                        data-src="/<?=__IMG__.'/icon/legacy.png'?>" alt="Thành viên legacy">
                </div>
                <div class="vip-img abs-right">
                    <img class="lazyload img-icon" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                        data-src="/<?=__IMG__.'/icon/legacy.png'?>" alt="Thành viên legacy">
                </div>
                <div class="relative">
                    <div class="vip-name mb10">
                        <span class="mr6">
                            <img class="lazyload img-icon" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                                data-src="/<?=__IMG__.'/icon/legacy.png'?>" alt="Thành viên legacy">
                        </span>
                        Mua gói thành viên Legacy
                    </div>
                    <ul class="mb10 relative">
                        <li>Giảm giá 5% khi mua sản phẩm</li>
                        <li>Miễn phí đọc một số nội dung</li>
                        <li>Luôn nhận hỗ trợ từ quản trị viên</li>
                        <li>Xoá quảng cáo trên trang</li>
                        <li>Tăng điểm ruby và danh hiệu</li>
                        <li>Khung avatar hoạt ảnh riêng biệt</li>
                    </ul>
                    <?php if($td['plans'] === 'legacy'): ?>
                    <span class="but jb-blue radius payvip-button">Hết hạn: <?= (date('Y', strtotime($plans->TD('ngayhethan', $user['username']))) > 2100) ? 'Vĩnh viễn' : date('\n\g\à\y j \t\h\á\n\g n \nă\m Y', strtotime($plans->TD('ngayhethan', $user['username']))) ?></span>
                    <?php else: ?>
                    <a class="but jb-blue radius payvip-button" href="javascript:;">Nâng Cấp Ngay</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="vip-card pointer plans-buyer vip-theme2 pay-vip" vip-level="2">
                <div class="abs-center vip-baicon">
                    <img class="lazyload img-icon" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                        data-src="/<?=__IMG__.'/icon/premium.png'?>" alt="Thành viên premium">
                </div>
                <div class="vip-img abs-right">
                    <img class="lazyload img-icon" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                        data-src="/<?=__IMG__.'/icon/premium.png'?>" alt="Thành viên premium">
                </div>
                <div class="relative">
                    <div class="vip-name mb10">
                        <span class="mr6">
                            <img class="lazyload img-icon" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                                data-src="/<?=__IMG__.'/icon/premium.png'?>" alt="Thành viên premium">
                        </span>
                        Mua gói thành viên Premium
                    </div>
                    <ul class="mb10 relative">
                        <li>Giảm giá 10% khi mua sản phẩm</li>
                        <li>Miễn phí đọc một số nội dung</li>
                        <li>Luôn nhận hỗ trợ từ quản trị viên</li>
                        <li>Xoá quảng cáo trên trang</li>
                        <li>Tăng điểm ruby và dấu xác nhận vip</li>
                        <li>Khung avatar hoạt ảnh riêng biệt</li>
                    </ul>
                    <?php if($td['plans'] === "premium"): ?>
                    <span class="but jb-blue radius payvip-button">Hết hạn: <?= (date('Y', strtotime($plans->TD('ngayhethan', $user['username']))) > 2100) ? 'Vĩnh viễn' : date('\n\g\à\y j \t\h\á\n\g n \nă\m Y', strtotime($plans->TD('ngayhethan', $user['username']))) ?></span>
                    <?php else: ?>
                    <a class="but jb-blue radius payvip-button" href="javascript:;">Nâng Cấp Ngay</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>