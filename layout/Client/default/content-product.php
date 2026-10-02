<div class="ws-border-pay zib-widget pay-box order-type-2" id="posts-pay">
    <div class="flex pay-flexbox">
        <div class="flex0 relative mr20 hide-sm pay-thumb">
            <div class="graphic">
                <img data-fancybox src="/<?=__IMG__?>/loading.gif"
                    data-src="/<?=__IMG__.'/uploads/'.$td['hinhthunho']?>" alt="<?=THANHDIEU($td['tieude'])?>"
                    class="fit-cover lazyload" data-caption="<?=THANHDIEU($td['tieude'])?>">
                <!-- <div class="abs-center text-center left-bottom">Nhấn để xem ảnh</div> -->
            </div>
        </div>
        <div class="flex1 flex xx jsb">
            <dt class="text-ellipsis pay-title"><?=THANHDIEU($td['tieude'])?>
            </dt>
            <div class="mt6 em09 muted-2-color">
                <?= (empty($td['giatien']) || $td['giatien'] === 0) ? 'Đây là mã nguồn miễn phí, bạn phải luôn tuân thủ các chính sách sử dụng tại website!' : 'Mã nguồn này trả phí nên chúng tôi luôn ưu tiên & hỗ trợ setup code nếu cần.' ?>
                <!-- Nếu sản phẩm này có bất kỳ vi phạm nào, vui lòng liên hệ với quản trị viên. -->
            </div>
            <div class="price-box">
                <div class="c-red">
                    <?php if (empty($td['giatien']) || $td['giatien'] === 0): ?>
                    <b class="em3x"><span class="pay-mark"><i class="fa fa-dollar"></i></span>
                        0đ</b>
                    <?php else: ?>
                    <?php if ($planInfo)
                     { 
                    if ($planInfo['tengoi'] === 'premium') {
                     $discount = 0.1; 
                     $color_badge = 'b-purple';
                    } elseif ($planInfo['tengoi'] === 'legacy') {
                    $discount = 0.05;
                    $color_badge = 'b-blue-2';
                    } else {
                    $discount = 0.00; 
                    $color_badge = 'b-cyan';
                    }
                    } else {
                    $discount = 0.00; 
                    $color_badge = 'b-cyan';}?>
                    <b class="em3x">
                        <span class="pay-mark"><i class="fa fa-dollar"></i></span>
                        <?= number_format($td['giatien'] * (1 - $discount),0,',','.')?>đ
                    </b>
                    <div class="inline-block ml3 text-left">
                        <badge class="<?=$color_badge?>">
                            <i class="fa fa-fw fa-bolt"></i>Gói
                            <?= isset($planInfo['tengoi']) ? ucfirst($planInfo['tengoi']) : 'Free' ?>
                        </badge>
                        <br>
                        <span class="original-price">
                            <span class="pay-mark"><i class="fa fa-dollar"></i></span>
                            <?= number_format($td['giatien'],0,',','.') ?>đ
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="risktips report">
                <i class="ri-volume-up-line"></i>
                <span>
                    <a>Nếu bạn đang sở hữu các gói đăng ký, bạn sẽ sở hữu đặc quyền
                        giảm giá bán của sản phẩm.</a>
                </span>
            </div>
            <div>
                <span class="vip-price-buts but-average inline mt10">
                    <span href="javascript:;" class=" vip-price jb-vip1 pay-vip" vip-level="1" data-toggle="tooltip"
                        title="" data-original-title="Đặc quyền giảm 5% giá bán khi mua sản phẩm.">
                        <i class="c-yellow mr3 ri-vip-crown-2-line"></i>
                        </svg>Gói Legacy<span class="em12 ml3 vip-price-text">
                            <span class="px12">-5</span>% </span>
                    </span>&ensp;
                    <span href="javascript:;" class="but vip-price jb-vip1 pay-vip" vip-level="2" data-toggle="tooltip"
                        title="" data-original-title="Đặc quyền giảm 10% giá bán khi mua sản phẩm">
                        <i class="c-cyan mr3 ri-vip-diamond-fill"></i>
                        </svg>Gói Premium<span class="em12 ml3 vip-price-text">
                            <span class="px12">-10</span>%</span>
                    </span>
                </span>
            </div>
            <div class="text-right mt10">
                <?php if (!$isLogin->TD($taikhoan, $user)) { ?>
                <a href="javascript:;" class="but jb-blue signin-loader padding-lg">
                    <i class="fa fa-sign-in mr1" aria-hidden="true"></i> Đăng Nhập
                </a>
                <div class="badg c-yellow mt6">
                    <i class="ri-error-warning-line"></i> Bạn hiện chưa đăng nhập! Hãy đăng nhập
                    để mua hàng và bạn có thể lưu đơn hàng!
                </div>
                <?php } else { ?>
                <?php if ((new ProductChecker($taikhoan))->Purchased($td['id'])) { ?>
                <a href="/download/<?=DownloadCode($td['id'],$taikhoan);?>" class="but jb-cyan padding-lg">
                    <i class="ri-download-cloud-2-line mr6"></i>Tải Xuống
                </a>
                <?php } else { ?>
                <a href="javascript:;" class="but jb-cyan padding-lg modal-order">
                    <i class="ri-download-cloud-2-line mr6"></i>Mua Ngay
                </a>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="pay-attr mt10">
        <div class="flex jsb">
            <span class="attr-key flex0 mr20 opacity8">Cập Nhật Gần Đây:</span>
            <span class="attr-value"><?=FormatTime::TD($td['ngaycapnhat'] === '0000-00-00 00:00:00' ? $td['ngaydang'] : $td['ngaycapnhat'])?></span>
        </div>
    </div>
    <!-- <div class="<?= (empty($td['giatien']) || $td['giatien'] === 0) ? 'jb-cyan pay-tag' : 'pay-tag' ?> abs-center">
                                <i class="ri-hand-coin-line"></i>
                                <?= (empty($td['giatien']) || $td['giatien'] === 0) ? 'Sản Phẩm Miễn Phí' : 'Sản Phẩm Trả Phí' ?>
                            </div> -->
    <badge class="img-badge hot jb-blue px12">Đã Bán: <?=$td['luotmua']?></badge>
</div>