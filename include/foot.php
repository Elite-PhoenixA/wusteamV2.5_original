<div class="no-event-img" style="position: relative;text-align: center;"><img src="/<?= __IMG__ ?>/main/footer-end.png"
        data-src="/<?= __IMG__ ?>/main/footer-end.png" class="lazyload">
    <!-- <p style="position: absolute;top: 30%;left: 50%;margin-left: -40px;font-size: 13px;">Bạn đã đến tận cùng thế giới </p> -->
</div>
<div class="usercm" style="left: 199px; top: 5px; display: none;">
    <ul>
        <li><a href="javascript:void(0);" onclick="HkCopy();"><i class="fa fa-copy fa-fw"></i><span>Sao chép</span></a>
        </li>
        <li><a
                href="javascript:window.location.reload();"><i class="fa fa-refresh fa-fw"></i><span>Tải lại trang</span></a>
        </li>
        <li><a href="/"><i class="fa fa-home fa-fw"></i><span>Trang chủ</span></a></li>
        <li><a href="javascript:history.go(1);"><i class="fa fa-arrow-right fa-fw"></i><span>Trang kế</span></a></li>
        <li><a href="javascript:history.go(-1);"><i class="fa fa-arrow-left fa-fw"></i><span>Trang sau</span></a></li>
        <li style="border-bottom:1px solid gray"><a href="javascript:void(0);"
                onclick="HkSearch();"><i class="fa fa-search fa-fw"></i><span>Tìm kiếm</span></a></li>
        <?php if($taikhoan==null):?>
        <li><a target="_blank" href="/user-auth"><i class="ri-user-shared-line"></i><span>Đăng nhập</span></a></li>
        <?php endif;?>
        <li><a href="/dieu-khoan"><i class="ri-contacts-book-3-line"></i><span>Điều khoản</span></a></li>
        <li><a href="/ve-chung-toi"><i class="fa fa-copyright"></i><span>Về chúng tôi</span></a></li>
    </ul>
</div>
<footer class="footer">
    <div class="container-fluid container-footer">
        <ul class="list-inline">
            <li class="hidden-xs" style="max-width: 300px;">
                <p>
                    <a class="footer-logo" href="<?= $website_domain ?>">
                        <img src="<?= $TD->Setting('logo') ?>" data-src="<?= $TD->Setting('logo')?>"
                            alt="<?= $TD->Setting('name-site') ?>" class="lazyload" style="height:40px;">
                    </a>
                </p>
                <div class="footer-muted em09">
                    <?= $TD->Setting('description') ?>
                </div>
            </li>
            <li style="max-width: 550px;">
                <p class="fcode-links">
                    <a href="#">Chính Sách - Bảo Mật</a>
                    <a href="#">Điều Khoản</a>
                    <a href="#">Về Chúng Tôi</a>
                </p>
                <div class="footer-muted em09">
                    <?= $TD->Setting('footer') ?><br /><b class="c-yellow">Phát triển dựa
                        trên nền tảng Zibi Plugins</b>
                </div>
                <div class="mt6 github-badge">
                    <span class="badge-subject">Ngày Hoạt Động</span>
                    <a style="color:#fff" href="#" rel="external nofollow" target="_blank">
                        <span class="badge-value" style="background-color:#ed1f1f">
                            <span id="span_dt_dt" data-footer-time="<?=$TD->Setting('deploy-date')?>" style="color: #b5c4c3">Đang lấy thời gian</span>
                        </span>
                    </a>
                </div>
            </li>
            <li class="hidden-xs">
                <div class="footer-miniimg" data-toggle="tooltip" title="QR-Code <?=$transfer->TD('nganhang',1)?>">
                    <p>
                        <img class="lazyload" src="/<?= __IMG__ ?>/no-thumbnail.png"
                            data-src="<?=$transfer->TD('qr-code',1) ?? '/'.__IMG__.'/no-thumbnail.png'?>" alt="Qr-code">
                    </p>
                    <span class="opacity8 em09">QR-<?=$transfer->TD('nganhang',1)?></span>
                </div>
                <div class="footer-miniimg text-nowrap" data-toggle="tooltip"
                    title="QR-Code <?=$transfer->TD('nganhang',2)?>">
                    <p>
                        <img class="lazyload" src="/<?= __IMG__ ?>/no-thumbnail.png"
                            data-src="<?=$transfer->TD('qr-code',2) ?? '/'.__IMG__.'/no-thumbnail.png'?>" alt="Qr-code">
                    </p>
                    <span class="opacity8 em09">QR-<?=$transfer->TD('nganhang',2)?></span>
                </div>
            </li>
        </ul>
    </div>
    <!-- <div class="footer-colors"></div> -->
</footer>
<div class="float-right round position-bottom">
    <a class="float-btn toggle-theme hover-show" data-toggle="tooltip" data-placement="left" title="Thay đổi giao diện"
        href="javascript:;">
        <i class="fa fa-toggle-theme"></i>
    </a>
    <span class="float-btn qrcode-btn hover-show">
        <i class="fa fa-qrcode"></i>
        <div class="hover-show-con dropdown-menu">
            <div class="qrcode" data-size="80x80"></div>
            <div class="mt6 px12 muted-color">Hãy sử dụng điện thoại để quét mã qr-code</div>
        </div>
    </span>
    <a class="crolltop float-btn ontop" data-toggle="tooltip" data-placement="left" title="Về đầu trang"
        href="javascript:(scrollTo());">
        <i class="fa fa-angle-up em12"></i>
    </a>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/app/insert/modal.php');?>
<?php if ($isLogin->TD($taikhoan,$user)) {?>
<div class="modal fade" id="canhbao-phienhethan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-mini" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div style="padding: 1px;">
                    <div class="modal-colorful-header colorful-bg jb-yellow">
                        <button class="close" data-dismiss="modal">
                            <svg class="ic-close" viewBox="0 0 1024 1024">
                                <path
                                    d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                                </path>
                            </svg>
                        </button>
                        <div class="colorful-make"></div>
                        <div class="text-center">
                            <div class="em2x">
                                <i class="ri-error-warning-line"></i>
                            </div>
                            <div class="mt10 em12 padding-w10">Phiên Đã Hết Hạn</div>
                        </div>
                    </div>
                    <div>
                        <div class="ml10">
                            <h4>Xin chào! Tài khoản khách</h4>
                            <p class="c-red">Phiên đăng nhập của bạn hiện đã hết hạn, vui lòng thực hiện việc đăng nhập
                                lại!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-buts but-average">
                <a type="button" data-dismiss="modal" class="but" href="javascript:;">Hủy Bỏ</a>
                <a type="button" class="but c-red" id="Logout">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
<?php }?>
<div id="wusteam-modal"></div>
<?php if ($TD->Setting('footer-lite')==1): ?>
<div class="sakana-box-l"></div>
<div class="sakana-box-r"></div>
<?php endif;?>
<div data-captcha="<?=$TD->Setting('key-geetest')?>"></div>
<script type="text/javascript">
    window._thanhdieu = {
    views: '',
    www: '',
    uri: '/public/src/vtd',
    ajax_user: '/ajax/users/global.users',
    ajax_admin: '/ajax/admin/global.admin',
    ver: '7.6',
    imgbox: '1',
    imgbox_type: 'group',
    imgbox_thumbs: '1',
    imgbox_zoom: '1',
    imgbox_full: '1',
    imgbox_play: '1',
    imgbox_down: '',
    sign_type: 'modal',
    signin_url: 'user-sign?tab=signin',
    signup_url: 'user-sign?tab=signup',
    ajaxpager: '',
    ajax_trigger: '<i class="fa fa-angle-right"></i>Tải Thêm',
    ajax_nomore: 'Không còn nội dung nữa',
    qj_loading: '',
    highlight_kg: '1',
    highlight_hh: '1',
    highlight_btn: '1',
    highlight_zt: 'enlighter',
    highlight_white_zt: 'enlighter',
    highlight_dark_zt: 'dracula',
    upload_img_size: '3',
    img_upload_multiple: '6',
    upload_video_size: '30',
    upload_file_size: '30',
    upload_ext: 'jpg|jpeg|jpe|gif|png|bmp|tiff|tif|webp|avif|ico|heic|asf|asx|wmv|wmx|wm|avi|divx|flv|mov|qt|mpeg|mpg|mpe|mp4|m4v|ogv|webm|mkv|3gp|3gpp|3g2|3gp2|txt|asc|c|cc|h|srt|csv|tsv|ics|rtx|css|vtt|dfxp|mp3|m4a|m4b|aac|ra|ram|wav|ogg|oga|flac|mid|midi|wma|wax|mka|rtf|pdf|class|tar|zip|gz|gzip|rar|7z|psd|xcf|doc|pot|pps|ppt|wri|xla|xls|xlt|xlw|mdb|mpp|docx|docm|dotx|dotm|xlsx|xlsm|xlsb|xltx|xltm|xlam|pptx|pptm|ppsx|ppsm|potx|potm|ppam|sldx|sldm|onetoc|onetoc2|onetmp|onepkg|oxps|xps|odt|odp|ods|odg|odc|odb|odf|wpd|key|numbers|pages',
    is_split_upload: '1',
    split_minimum_size: '20',
    comment_upload_img: ''
}
</script>
<script src="/<?= __LIBRARY__ ?>/jquery.min.js"></script>
<script src="/<?= __LIBRARY__ ?>/bootstrap.min.js" id="bootstrap-js"></script>
<script src="/<?= __LIBRARY__ ?>/fancybox/fancybox.umd.js"></script>
<script src="/<?= __LIBRARY__ ?>/swiper@11.1.1/swiper-bundle.min.js"></script>
<script src="/<?= __PLUGINS__ ?>/hk-mouse/hk-mouse.min.js"></script>
<script src="/<?= __JS__ ?>/gt4.js"></script>
<script src="/<?= __JS__ ?>/main.min.js?v=<?=$TD->Setting('cache')?>"></script>
<script src="/<?= __JS__ ?>/handle.min.js?v=<?=$TD->Setting('cache')?>"></script>
<script src="/<?= __JS__ ?>/service/callback.js?v=<?=$TD->Setting('cache')?>"></script>
<script src="/<?= __JS__ ?>/comment.min.js?v=<?=$TD->Setting('cache')?>"></script>
<script src="/<?= __JS__ ?>/mini-upload.min.js?v=<?=$TD->Setting('cache')?>"></script>
<script src="/<?= __JS__ ?>/log/td.log.js?v=<?=$TD->Setting('cache')?>"></script>
<script src="https://at.alicdn.com/t/font_2827587_k24if0ucns.js"></script>
<?php if ($TD->Setting('footer-lite')==1):?>
<script src="https://cdn.jsdelivr.net/npm/sakana"></script>
<script>
    Sakana.setMute(!1),Sakana.init({el:".sakana-box-l",scale:.5,character:"takina",canSwitchCharacter:!1,inertia:.001,decay:1}),Sakana.init({el:".sakana-box-r",scale:.5,character:"chisato",canSwitchCharacter:!1,inertia:.001,decay:1});
</script>
<?php endif;?>
<!-- <script src="/<?= __JS__ ?>/curzr-arrow-pointer.min.js?v=<?=$TD->Setting('cache')?>"></script> -->
<!-- <script src="/<?= __JS__ ?>/ws_gpt.js?v=<?=$TD->Setting('cache')?>"></script> -->
<?php if(strpos($current_url,'download/')!==false){?>
<script src="//thanhdieu.com/files/ads-blocked.js?v=<?=$TD->Setting('cache')?>" defer></script>
<?php if(!$planInfo) { echo $TD->Setting('ads'); }?>
<?php }?>
<?php if(strpos($current_url,'xo-so/')!==false){?>
<script src="/<?=__JS__?>/pule/new-index.js"></script>
<script src="/<?=__JS__?>/pule/htpublic.js"></script>
<?php } else { ?>
<?php if ($TD->Setting('loader')==1) {?>
<script src="/<?= __JS__ ?>/loader.js?v=<?=$TD->Setting('cache')?>"></script>
<?php }?>
<?php } ?>
<?php if ($TD->Setting('fuck-devtools')==1) {DeveloperTools::工程师();}?>
<script>
    let WusTeamGPT_postSelector = '.article-content';
let WusTeamGPT_key = 'b3b4074fcf4303136657';
var swiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 0,
    centeredSlides: false,
    autoplay: {
        delay: 15000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
})
</script>
</body>

</html>