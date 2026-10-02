<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/global/searchModel.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<div class="back-to-top hide-sm"></div>
<?php if($TD->Setting('landing')==1):?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Main/landing-1.php');?>
<?php endif;?>
<div class="container fluid-widget">
    <?php if($TD->Setting('landing')==1):?>
    <div class="tdtv_led">
        <div id="tdtv_sx">
            <div id="tdtv_sx1">
                <p class="p">
                    <marquee direction="left" scrollamount="15">
                        <strong>
                            <a class="pay-vip">
                                <span class="led-icon" style="color:#8224e3;display:inline-block;margin-top:-25px;">
                                    👐
                                </span>
                                <span class="led-text" style="color:#8224e3;">Kính chào quý khách thật vui khi lại
                                    thấy bạn ghé!</span>
                            </a>
                            <a>
                                <span class="led-icon" style="color:#dd3333; display: inline-block; margin-right: 5px;">
                                    <i class="fa fa-volume-up"></i>
                                </span>
                                <span class="led-text" style="color:#dd3333;">Chào mừng bạn đến
                                    <?=$TD->Setting('name-site')?> dịch vụ đa nền tảng.</span>
                            </a>
                        </strong>
                    </marquee>
                </p>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Main/more-pd.php');?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Main/log.php');?>
<main role="main" class="container">
<?php if($TD->Setting('landing')==2) :?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Main/landing-2.php');?>
    <?php endif;?>
    <div class="content-wrap td-posts">
        <div class="content-layout">
            <div class="tab-content">
                <div class="posts-row ajaxpager tab-pane fade in active" id="index-tab-main">
                    <div class="box-body notop">
                        <div class="title-theme">Danh Sách Danh Mục</div>
                    </div>
                    <div class="index-tab mb10 affix-header-sm relative" offset-top="-9">
                        <ul class="scroll-x no-scrollbar">
                            <li class="active">
                                <a href="?tab=index-main">
                                    <img style="height:20px;" src="/<?=__IMG__?>/icon/dieu.gif"> Tất Cả
                                    Danh Mục
                                </a>
                            </li>
                            <li>
                                <a href="?tab=index-website" class="web-tab"><img style="height:17px;margin-top:-2px"
                                        src="/<?=__IMG__?>/icon/code.png">&ensp;Danh Mục Trang Web</a>
                            </li>
                            <li>
                                <a href="?tab=index-software" class="software-tab"><img
                                        style="height:17px;margin-top:-2px"
                                        src="/<?=__IMG__?>/icon/software.png">&ensp;Danh Mục Ứng Dụng</a>
                            </li>
                            <li>
                                <a href="?tab=index-other" class="other-tab"><img style="height:17px;margin-top:-2px"
                                        src="/<?=__IMG__?>/icon/bugcat.gif">&ensp;Danh Mục Khác</a>
                            </li>
                        </ul>
                        <div class="scroll-x-next" style="display: none;"></div>
                        <div class="scroll-x-prev" style="display: none;"></div>
                    </div>
                    <div class="ajax-option ajax-replace" thanhdieu-ajax-replace="filter">
                        <div class="flex ac">
                            <div class="option-dropdown splitters-this-r dropdown flex0 font-bold">Loại
                            </div>
                            <ul class="list-inline scroll-x mini-scrollbar option-items">
                                <a rel="nofollow" ajax-replace="true" class="td-ajax-type" data-type="update">Cập
                                    Nhật
                                </a>
                                <a rel="nofollow" ajax-replace="true" class="td-ajax-type" data-type="views">Xem
                                    Nhiều
                                </a>
                                <a rel="nofollow" ajax-replace="true" class="td-ajax-type" data-type="like">Lượt
                                    Thích
                                </a>
                                <a rel="nofollow" ajax-replace="true" class="td-ajax-type" data-type="comment">Bình
                                    Luận
                                </a>
                                <a rel="nofollow" ajax-replace="true" class="td-ajax-type" data-type="price">Giá Bán
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div id="product-list">
                        <div id="product-placeholder">
                        <?php for ($i = 0; $i < random_int(2000, 3000); $i++) echo str_repeat(' ', random_int(10, 1000)) . "<!-- @Author: ThanhDieu.Com -->\n";?>
                        <div class="post_ajax_loader hk-loader-main"><div class="theme-box box-body ajax-loading text-center"><span class="hk-loader-text c-yellow">Đang tải dữ liệu...</span><br/><h2 class="loading zts"></h2></div></div>
                        <noscript>
                            <div class="f-not-found"><img src="/<?=__IMG__?>/icon/no-found.png">
                                <p class="mt20 em09 muted-3-color separator">Không tìm th nội dung nào</p>
                            </div>
                        </noscript>
                    </div>
                    </div>
                    <div class="pagenav ajax-pag" style="display:none;"></div>
                    <!-- @ End Product -->
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
<?php if ($TD->Setting('is-modal')==1) {?><div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>"
    id="modal-system-notice" role="dialog">
    <div class="modal-dialog modal-mini" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div style="padding:1px">
                    <div class="modal-colorful-header colorful-bg jb-pink"><button class="close"
                            data-dismiss="modal"><svg class="ic-close" viewBox="0 0 1024 1024">
                                <path
                                    d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                                </path>
                            </svg></button>
                        <div class="colorful-make"></div>
                        <div class="text-center">
                            <div class="em2x"><i class="fa fa-heart" aria-hidden="true"></i></div>
                            <div class="mt10 em12 padding-w10">Thông Báo Hệ Thống</div>
                        </div>
                    </div>
                    <div class="vtd-modal-content"><?=nl2br($TD->Setting('modal-content'))?></div>
                </div>
            </div>
            <div class="modal-buts box-body notop text-right"><a type="button" class="but close-notice">Đóng trong 2
                    giờ</a><a target="_blank" class="but c-purple-2" href="<?=$TD->Setting('boxchat')?>">Tham gia
                    nhóm</a></div>
        </div>
    </div>
    </div>
</div><?php }?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>