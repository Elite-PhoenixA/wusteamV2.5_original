<div class="header-slider-container relative mb20 card-4 filter-blur">
    <div class="relative zib-slider">
        <div class="new-swiper slide-index slide-header swiper-container-initialized"
            style="--m-height :280px;--pc-height :400px;">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                    <span>
                        <video autoplay="" loop="" muted="" playsinline="" class="fit-cover radius8 lazyload"
                            data-src="https://files.catbox.moe/lts45y.mp4" src="https://files.catbox.moe/k3h9il.webp" poster="https://files.catbox.moe/k3h9il.webp"></video>
                        <div class="absolute"></div>
                    </span>
                </div>
            <div class="swiper-slide">
                    <span>
                        <video autoplay="" loop="" muted="" playsinline="" class="fit-cover radius8 lazyload"
                            data-src="//thanhdieu.com/files/Glowing-Star-Girl-4096x2160-1.mp4"  poster="https://files.catbox.moe/k3h9il.webp" src="https://files.catbox.moe/k3h9il.webp"></video>
                        <div class="absolute"></div>
                    </span>
                </div>
                <div class="swiper-slide">
                    <span>
                        <video autoplay="" loop="" muted="" playsinline="" class="fit-cover radius8 lazyload"
                            data-src="//thanhdieu.com/files/Home-Page.mp4" src="//thanhdieu.com/files/Home-Page.mp4"
                            poster="https://files.catbox.moe/k3h9il.web"></video>
                        <div class="absolute"></div>
                    </span>
                </div>
                <div class="swiper-slide">
                    <span>
                        <video autoplay="" loop="" muted="" playsinline="" class="fit-cover radius8 lazyload"
                            data-src="/<?=__IMG__?>/bg.webm" src="/<?=__IMG__?>/bg.webm"
                            poster="https://files.catbox.moe/k3h9il.webp"></video>
                        <div class="absolute"></div>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="header-slider-search abs-center">
        <div class="header-slider-search-more text-center before">
            <div class="em16 font-bold mb10"><?=$TD->Setting('name-site')?> - Mã Nguồn - Diễn Dàn</div>
            <div>Nơi đây không phải thiên đình ~~ <br>Mong quý khách đừng cho mình là thượng đế.</div>
        </div>
        <div class="search-input">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/app/insert/search.php');?>
        </div>
    </div>
    <div class="header-slider-card container">
        <div class="">
            <div class="flex jse flex-row gutters-5 flex-col-sm-2">
                <div class="flex1">
                    <a class="main-color" href="/user/verify">
                        <div class="icon-cover-card flex ac zib-widget">
                            <div class="icon-cover-icon badg cir c-blue" style="font-size: 25px;">
                                <i class="ri-verified-badge-fill"></i>
                            </div>
                            <div class="icon-cover-desc ml10 flex1 px12-sm">
                                <div class="em12 text-ellipsis font-bold"> Xác minh</div>
                                <div class="muted-color mt6 text-ellipsis"> Xác minh danh tính</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="flex1">
                    <a class="main-color" href="/user/account">
                        <div class="icon-cover-card flex ac zib-widget">
                            <div class="icon-cover-icon badg cir c-blue-2" style="font-size: 25px;">
                                <i class="ri-shield-user-line"></i>
                            </div>
                            <div class="icon-cover-desc ml10 flex1 px12-sm">
                                <div class="em12 text-ellipsis font-bold"> Bảo mật tài khoản</div>
                                <div class="muted-color mt6 text-ellipsis"> Xác minh email và thay đổi mật khẩu
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="flex1">
                    <a class="main-color" href="/message/">
                        <div class="icon-cover-card flex ac zib-widget">
                            <div class="icon-cover-icon badg cir c-yellow" style="font-size: 25px;">
                                <i class="ri-notification-line"></i>
                            </div>
                            <div class="icon-cover-desc ml10 flex1 px12-sm">
                                <div class="em12 text-ellipsis font-bold"> Thông báo <badge class="ml6 jb-yellow">
                                        NEW
                                    </badge>
                                </div>
                                <div class="muted-color mt6 text-ellipsis"> Tin nhắn riêng, thông báo hệ
                                    thống</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="flex1">
                    <a class="main-color" target="_blank" href="<?=$TD->Setting('boxchat')?>">
                        <div class="icon-cover-card flex ac zib-widget">
                            <div class="icon-cover-icon badg cir c-cyan" style="font-size: 25px;">
                            <i class="ri-group-line"></i>
                            </div>
                            <div class="icon-cover-desc ml10 flex1 px12-sm">
                                <div class="em12 text-ellipsis font-bold">Cộng đồng
                                    <badge class="ml6 jb-green">Nhóm chat
                                        <span class="fa fa-angle-right em12"></span>
                                    </badge>
                                </div>
                                <div class="muted-color mt6 text-ellipsis">Hãy tham gia nhóm để cập nhật thông báo mới nhất
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>