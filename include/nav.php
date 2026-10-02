<header class="header header-layout-1 show-slide">
    <!-- <div class="rabbit-doll"></div> -->
    <a style="font-family: 'Concert One'; color:rgb(27 0 255);"><span id="fps">60.0</span> FPS </a>
    <nav class="navbar navbar-top center">
        <div class="container-fluid container-header">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a class="navbar-logo hk-bg-animate">
                        <img src="<?=$TD->Setting('navbar-logo')?>" alt="Logo">
                    </a>
                </div>
                <button type="button" data-toggle-class="mobile-navbar-show" data-target="body" class="navbar-toggle">
                    <i class="em12 css-icon i-menu">
                        <i></i>
                    </i>
                </button>
                <a class="main-search-btn navbar-toggle" href="javascript:;">
                    <i class="ri-search-2-line"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"><?php include($_SERVER['DOCUMENT_ROOT'].'/layout/Client/user/menu.php');?>
                </ul>
                <div class="navbar-form navbar-right hide show-nav-but" style="margin-right:-10px;">
                    <a data-toggle-class="" data-target=".nav.navbar-nav" href="javascript:;" class="but">
                        <i class="ri-menu-2-line"></i>
                    </a>
                </div>
                <div class="navbar-form navbar-right navbar-but">
                    <ul class="list-inline splitters relative">
                        <li>
                            <a class="main-search-btn btn nav-search-btn" href="javascript:;">
                                <i class="ri-search-2-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="toggle-theme toggle-radius"><i
                                    class="fa fa-toggle-theme"></i></a>
                        </li>
                        <?php if ($isLogin->TD($taikhoan,$user)) { ?>
                        <li>
                            <a href="javascript:;" class="btn">
                                <i class="ri-user-3-line"></i>
                            </a>
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/layout/Client/user/box.php');?>
                        </li>
                        <?php } else {?>
                        <li>
                            <a href="javascript:;" class="btn signin-loader">
                                <span class="newadd-btns hover-show but nowave jb-blue radius">
                                    <i class="ri-user-3-line"></i> Đăng Nhập
                                </span>
                            </a>
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/layout/Client/user/menu-login.php');?>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="mobile-header">
    <nav mini-touch="mobile-nav" touch-direction="left"
        class="mobile-navbar visible-xs-block scroll-y mini-scrollbar left">
        <a href="javascript:;" class="toggle-theme toggle-radius">
            <i class="fa fa-toggle-theme"></i>
        </a>
        <ul class="mobile-menus theme-box"><?php include($_SERVER['DOCUMENT_ROOT'].'/layout/Client/user/menu.php');?>
        </ul>
        <!-- <div class="posts-nav-box" data-title="Thư mục bài viết"></div> -->
        <div class="sub-user-box">
            <?php if ($isLogin->TD($taikhoan,$user)): ?>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/layout/Client/user/box.php');?>
            <?php else:?>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/layout/Client/user/menu-login.php');?>
            <?php endif;?>
        </div>
        <div class="mobile-nav-widget"></div>
    </nav>
    <div class="fixed-body" data-toggle-class="mobile-navbar-show" data-target="body"></div>
</div>
<div mini-touch="nav_search" touch-direction="top"
    class="main-search fixed-body main-bg box-body navbar-search nopw-sm">
    <div class="container">
        <div class="mb20">
            <button class="close" data-target="navbar-search">
                <svg class="ic-close" viewBox="0 0 1024 1024">
                    <path
                        d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                    </path>
                </svg>
            </button>
        </div>
        <div load-click="" no-scroll="true">
            <div class="search-input">
                <?php include($_SERVER['DOCUMENT_ROOT'].'/app/insert/search.php');?>
                <div class="padding-10 relates relates-thumb">
                    <p class="muted-color">Sản Phẩm Đề Xuất</p>
                    <div class="swiper-container swiper-scroll">
                        <div class="swiper-wrapper">
                            <?php $oOo = $thanhdieudb->query("SELECT * FROM ws_products ORDER BY RAND()");
                            if ($oOo->num_rows > 0) {
                            while ($wus = $oOo->fetch_assoc()) {?>
                            <div class="swiper-slide mr10" style="width:170px;">
                                <a href="/view-code/<?=$wus['slug']?>">
                                    <div class="graphic hover-zoom-img mb10 style-3"
                                        style="padding-bottom:70%!important;">
                                        <img class="fit-cover lazyload"
                                            data-src="/<?=__IMG__?>/uploads/<?=$wus['hinhthunho']?>"
                                            src="/<?=__IMG__?>/uploads/<?=$wus['hinhthunho']?>"
                                            alt=" <?=THANHDIEU($wus['tieude'])?> - <?=$TD->Setting('name-site')?>">
                                        <div class="abs-center left-bottom graphic-text text-ellipsis">
                                            <?=THANHDIEU($wus['tieude'])?></div>
                                        <div class="abs-center left-bottom graphic-text">
                                            <div class="em09 opacity8"><?=THANHDIEU($wus['tieude'])?></div>
                                            <div class="px12 opacity8 mt6">
                                                <item class="time-ago" data-timeago="<?= $wus['ngaydang'] ?>"></item>
                                                <item class="pull-right"><i class="ri-eye-line">
                                                    </i><?=CountFormatter::WS($wus['luotxem'])?></item>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                         }
                        }
                        ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($TD->Setting('footer-lite') ==1) {?>
<div class="footwaveline hide-sm">
    <i style="background-image: url(https://i.imgur.com/QPRMXuf.png);display: inline-block;width: 100px;height: 100px;position: fixed;bottom: 0;z-index: 9999;background-size: 100%;"></i>
    <div class="footwavewave swal-bath" style="animation: 20s linear 0s normal none infinite waves-r2l;"></div>
    <div id="shi" style="position: fixed;bottom: 0;margin-left: 200px;z-index: 9999;">
        <a href="#">
            <h4 class="my-face" style="font-size:13px;margin:0 5px 2px 5px;color:#797979;margin-bottom: 10px;">
                Dù nắng hay mưa, luôn có <?=$TD->Setting('name-site');?> đang chờ bạn</h4>
        </a>
    </div>
    <div
        style="width: 100%;height: 40px;position: fixed;bottom: 0;z-index: 9998;box-shadow: 0 -2px 10px rgb(0 0 0 / 10%);background:#fff;">
        <nav class="wz-color" style="float:right;margin-right:50px;">
            <div id="foot_remake" class="wz">
                <ul>
                    <li><a class="item-foot"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-lianjie"></use></svg><span id="wz"> Đặt ra mục tiêu cho mình và chinh phục chúng</span></a></li>
                    <li><a class="item-foot"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-lianjie"></use></svg><span id="wz"> Đừng lo lắng vì những điều nhỏ nhặt.</span></a></li>
                    <li><a class="item-foot"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-lianjie"></use></svg><span id="wz"> Ăn ngon, ngủ tốt, hít thở sâu, tận hưởng cuộc sống.</span></a></li>
                   <li><a class="item-foot"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-lianjie"></use></svg><span id="wz"> Có công mài sắt có ngày nên kim.</span></a></li>
                   <li><a class="item-foot"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-lianjie"></use></svg><span id="wz"> Luôn luôn đi tìm lý do để mỉm cười.</span></a></li>
                </ul>
            </div>
            <span class="wz-span">Châm Ngôn</span>
            <a style="margin-left:20px;line-height: 45px;display: inline-block;width: 64px;"
                href="javascript:(scrollTo());" id="percentage" data-toggle="tooltip" data-original-title="Trở lại đầu trang">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-dingwei"></use>
                </svg> 0%
            </a>
        </nav>
    </div>
</div>
<?php }?>