<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/global/productModel.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/app/function/viewer.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/global/searchModel.php');?>
<main role="main" class="container td-reload-form">
    <div class="content-wrap">
        <div class="content-layout">
            <div class="zib-widget widget_media_image">
                <a>
                    <img height="70" src="https://i.imgur.com/uhcAbe8.gif"
                        class="image theme-image- attachment-full size-full" alt="" decoding="async" loading="lazy" />
                </a>
            </div>
            <ul class="breadcrumb">
                <li>
                    <a href="<?=$website_domain?>">
                        <i class="ri-home-2-line"></i>
                        Trang Chủ
                    </a>
                </li>
                <li>
                    <a href="/kho-code/<?=$td['phanloai']?>">
                        <?=PhanLoai($td['phanloai'])?>
                    </a>
                </li>
            </ul>
            <article class="article main-bg theme-box box-body radius8 main-shadow">
                <div class="article-header theme-box clearfix relative">
                    <!-- <div class="post-WusTeamGPT">
                        <div class="WusTeamGPT-title">
                            <i class="WusTeamGPT-title-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="48px" height="48px" viewBox="0 0 48 48">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path
                                            d="M34.717885,5.03561087 C36.12744,5.27055371 37.079755,6.60373651 36.84481,8.0132786 L35.7944,14.3153359 L38.375,14.3153359 C43.138415,14.3153359 47,18.1768855 47,22.9402569 L47,34.4401516 C47,39.203523 43.138415,43.0650727 38.375,43.0650727 L9.625,43.0650727 C4.861585,43.0650727 1,39.203523 1,34.4401516 L1,22.9402569 C1,18.1768855 4.861585,14.3153359 9.625,14.3153359 L12.2056,14.3153359 L11.15519,8.0132786 C10.920245,6.60373651 11.87256,5.27055371 13.282115,5.03561087 C14.69167,4.80066802 16.024865,5.7529743 16.25981,7.16251639 L17.40981,14.0624532 C17.423955,14.1470924 17.43373,14.2315017 17.43948,14.3153359 L30.56052,14.3153359 C30.56627,14.2313867 30.576045,14.1470924 30.59019,14.0624532 L31.74019,7.16251639 C31.975135,5.7529743 33.30833,4.80066802 34.717885,5.03561087 Z M38.375,19.4902885 L9.625,19.4902885 C7.719565,19.4902885 6.175,21.0348394 6.175,22.9402569 L6.175,34.4401516 C6.175,36.3455692 7.719565,37.89012 9.625,37.89012 L38.375,37.89012 C40.280435,37.89012 41.825,36.3455692 41.825,34.4401516 L41.825,22.9402569 C41.825,21.0348394 40.280435,19.4902885 38.375,19.4902885 Z M14.8575,23.802749 C16.28649,23.802749 17.445,24.9612484 17.445,26.3902253 L17.445,28.6902043 C17.445,30.1191812 16.28649,31.2776806 14.8575,31.2776806 C13.42851,31.2776806 12.27,30.1191812 12.27,28.6902043 L12.27,26.3902253 C12.27,24.9612484 13.42851,23.802749 14.8575,23.802749 Z M33.1425,23.802749 C34.57149,23.802749 35.73,24.9612484 35.73,26.3902253 L35.73,28.6902043 C35.73,30.1191812 34.57149,31.2776806 33.1425,31.2776806 C31.71351,31.2776806 30.555,30.1191812 30.555,28.6902043 L30.555,26.3902253 C30.555,24.9612484 31.71351,23.802749 33.1425,23.802749 Z"
                                            fill="#444444" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </i>
                            <div class="WusTeamGPT-title-text"></div>
                            <div class="WusTeamGPT-tag" id="WusTeamGPT-tag"></div>
                        </div>
                        <div class="WusTeamGPT-explanation"></div>
                    </div> -->
                    <div data-time-update="<?=$td['ngaycapnhat']?>"></div>
                    <h1 class="article-title">
                        <?=THANHDIEU($td['tieude'])?>
                    </h1>
                    <div class="article-avatar">
                        <div class="user-info flex ac article-avatar">
                            <a href="/profile/@<?=$td['username']?>">
                                <span class="avatar-img">
                                    <img alt="<?=$td['hovaten']?>" src="/<?=__IMG__?>/users/avatar-default.jpg"
                                        data-src="/<?=__IMG__?>/users/<?=$td['avatar']?>"
                                        class="lazyload avatar avatar-id-<?=$td['user_id']?>">
                                    <?=(new PlansIcon())->icon($td['username']);?>
                                    <?=ShowPlans::TD($td['username']);?>
                                </span>
                            </a>
                            <div class="user-right flex flex1 ac jsb ml10">
                                <div class="flex1">
                                    <name class="flex ac flex1">
                                        <a class="display-name text-ellipsis"
                                            href="/profile/@<?=$td['username']?>"><?=$td['hovaten']?></a>
                                        <?=WSInfoProfileShow::TD($td);?>
                                    </name>
                                    <div class="px12-sm muted-2-color text-ellipsis">
                                        đăng lúc <span data-timeago="<?=$td['ngaydang'] ?>" class="time-ago"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Đã đăng lúc: <?=date('H:i d-m-Y', strtotime($td['ngaydang']))?>"><?=$td['ngaydang']?></span>
                                    </div>
                                </div>
                                <div class="flex0 user-action hide-sm">
                                    <?php if ($td['username'] === $taikhoan) {?>
                                    <a href="/user/" class="but c-blue ml10 pw-1em radius">
                                        <i class="ri-user-line"></i> Trang cá nhân của tôi
                                    </a>
                                    <?php } else {?>
                                    <a href="javascript:;" data-action="follow_user"
                                        class="but jb-pink ml10 pw-1em <?=$class_follow?>"
                                        data-pid="<?=$td['user_id']?>" data-puser="<?=$td['username']?>">
                                        <count>
                                            <?= $is_following ? '<i class="ri-user-follow-line"></i> Đang theo dõi' : '<i class="ri-user-add-line"></i> Theo dõi' ?>
                                        </count>
                                    </a>
                                    <a data-class="full-sm" class="but jb-blue ml10 pw-1em <?=$class_chat?>"
                                        href="javascript:;">
                                        <i class="ri-chat-1-line mr3"></i>Nhắn tin
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <i class="line-form-line"></i>
                            <div class="flex ac single-metabox abs-right">
                                <div class="post-metas">
                                    <item class="meta-view">
                                        <i class="ri-eye-line"></i> <?=CountFormatter::WS($td['luotxem'])?>
                                    </item>
                                    <item class="meta-like">
                                        <i class="ri-thumb-up-line"></i> <?=CountFormatter::WS($td['luotlike'])?>
                                    </item>
                                    <item class="meta-comm">
                                        <a rel="nofollow" data-toggle="tooltip" title="Đi tới bình luận"
                                            href="javascript:(scrollTo('#comments',-50));">
                                            <i class="ri-message-3-line"></i>
                                            <?=CommentCounter::TotalComments($td['id'])?>
                                        </a>
                                    </item>
                                </div>
                                <div class="clearfix ml6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="article-content">
                    <div class="theme-box theme-posts-content <?php if (!count(AnhSanPham) >= 3) { echo 'limit-height';}?>">
                        <?php if ($td['privacy'] === 'all') {
                         include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Client/default/content-product.php');
                        } elseif ($td['privacy'] === 'like' && (new ProductChecker($taikhoan))->Liked($td['id'])) {
                        include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Client/default/content-product.php');
                        } elseif ($td['privacy'] === 'cmt' && (new ProductChecker($taikhoan))->Commented($td['id'])) {
                         include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Client/default/content-product.php');
                        } elseif ($td['privacy'] === 'level' && (new ProductChecker($taikhoan))->Level(3)) {
                        include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Client/default/content-product.php');
                        } else {?>
                        <h2 class="theme-block-zibll block-td title-theme">Tải Xuống</h2>
                        <div data-type="reply" class="theme-block-zibll block-hide-content">
                            <span>
                                <div class="hidden-box" reply-show="true" reload-hash="#hidden-box-comment">
                                    <?php if ($td['privacy'] === 'cmt') { ?>
                                    <a class="hidden-text" href="javascript:(scrollTo('#comment-form',-150));">
                                    <i class="ri-spam-fill"></i>&ensp;Tác giả đã bật tính năng riêng tư, yêu cầu bình luận mới có thể tải xuống.
                                    </a>
                                    <?php } else if ($td['privacy'] === 'like') { ?>
                                    <a class="hidden-text" href="javascript:(scrollTo('#like-form',-400));">
                                    <i class="ri-spam-fill"></i>&ensp;Tác giả đã bật tính năng riêng tư, yêu cầu thích bài viết và tải lại
                                        trang mới có thể
                                       tải xuống.
                                    </a>
                                    <?php } else if ($td['privacy'] === 'level') { ?>
                                    <a class="hidden-text" href="javascript:(window.open('/user/level','_blank'));"> <i class="ri-spam-fill"></i>&ensp;Tác giả đã bật tính năng riêng tư, yêu cầu tài khoản của bạn đạt tối thiểu level 3 mới có thể tải xuống.</a>
                                    <?php } ?>
                                </div>
                            </span>
                        </div>
                        <?php 
                        }
                         ?>
                        <hr>
                        <!-- --~~~~~~- -->
                        <h2 class="theme-block-heading">Mô Tả</h2>
                        <p><?=UrlsGoto(nl2br($td['noidung']))?></p>
                        <h2 class="theme-block-heading">Ảnh Demo</h2>
                        <p>
                            <?php if (count(AnhSanPham) === 1) :?>
                            <a class="border-img theme-block-image" href="javascript:;">
                                <img decoding="async" loading="lazy"
                                    class="alignleft size-medium is-resized td-img-post-<?=$td['id']?>"
                                    data-fancybox="gallery" src="/<?=__IMG__?>/loading.gif"
                                    data-src="/<?=__IMG__.'/uploads/'.AnhSanPham[0]?>"
                                    alt="<?=THANHDIEU($td['tieude'])?>" width="500" />
                            </a>
                            <?php else : ?>
                        <figure
                            class="theme-block-gallery has-nested-images columns-default is-cropped theme-block-gallery-1 is-layout-flex">
                            <?php foreach (AnhSanPham as $index => $image) :?>
                            <figure class="theme-block-image size-large">
                                <a class="border-img" href="javascript:;">
                                    <img data-fancybox="gallery" decoding="async" src="/<?=__IMG__?>/loading.gif"
                                        data-src="/<?=__IMG__.'/uploads/'.$image?>" alt="<?=THANHDIEU($td['tieude'])?>"
                                        class="lazyload" imgbox-index="<?=$index?>">
                                </a>
                            </figure>
                            <?php endforeach; ?>
                        </figure>
                        <?php endif; ?>
                        </p>
                    </div>
                    <div class="text-center theme-box muted-3-color box-body separator em09">HẾT RỒI</div>
                    <div class="theme-box article-tags">
                        <?php
                        $mau = array('manguon-website' => 'c-blue','manguon-phanmem' => 'c-yellow','manguon-khac' => 'c-pink', );
                        $icon = array('manguon-website' => 'ri-code-s-slash-line','manguon-phanmem' => 'ri-tools-line','manguon-khac' => 'ri-openai-fill', );?>
                        <a class="but ml6 radius <?=$mau[$td['phanloai']]?>">
                            <i class="<?=$icon[$td['phanloai']]?>" aria-hidden="true"></i>&ensp;<?=PhanLoai($td['phanloai'])?>
                        </a>
                    </div>
                    <div class="sys-item-99 hide-sm"><span>Để sử dụng cho mục đích học tập, nghiên cứu vui lòng xóa tệp trong vòng 24h sau khi tải về.</span></div>
                    <div class="sys-item-88 hide-sm"><span>Bạn có thể liên hệ với tác giả để xác nhận thông tin mã nguồn trước khi mua để tránh xung đột giao dịch.</span> </div>
                    <div class="em09 muted-3-color">
                        <div class="posts-copyright mt6">
                            <div class="posts-copyright">
                                <div class="posts-copyright">
                                    <div class="box">
                                        <b class="td-content-copyright">
                                            <p>1: Mã nguồn chính chủ, được kiểm định trước khi đăng và không bao giờ có
                                                keylog, backdoor, luôn hỗ trợ update/fix nếu mã nguồn gặp lỗi hoặc cần
                                                được nâng cấp, giao toàn bộ mã nguồn đúng code đúng giá, để chỉnh sửa
                                                riêng, hỗ trợ setup code nếu cần.
                                            </p>
                                            <p>
                                            </p>2: Bạn sẽ nhận được các ưu đãi và đặc quyền miễn phí, sẽ tự động được
                                            trao
                                            cho bạn sau khi bạn đăng ký, Chúng tôi luôn quan tâm đến khách hàng của mình
                                            và phân bổ nhiều quyền lợi nhất có thể cho họ.
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center muted-3-color box-body em09">Nếu bạn thích bài viết này hãy làm điều sau
                </div>
                <div class="text-center post-actions" id="like-form">
                    <a href="javascript:;" data-action-post="like"
                        class="action <?=$isLogin->TD($taikhoan, $user) ? 'action-like' : 'signin-loader' ?> <?= isLiked ? ' actived' : '' ?>" data-post-id="<?=$td['id']?>">
                        <i class="icon ri-thumb-up-line"></i>
                        <small><br />
                            <count>Thích <?=CountFormatter::WS($td['luotlike'])?></count>
                        </small>
                    </a>
                    <!-- <a data-toggle="modal" data-target="#rewards-modal-1" class="rewards action action-rewards">
                        <i class="icon ri-hand-coin-line"></i>
                        <small><br />
                            <count>Ủng Hộ Tôi</count>
                        </small>
                    </a> -->
                    <a class="rewards action action-dohot" data-username="<?=$td['username']?>" id="dohot">
                        <i class="icon ri-fire-line"></i>
                        <small>
                            <br />
                            <count>Thả Độ Hot</count>
                        </small>
                    </a>
                    <a data-class="modal-mini" mobile-bottom="true" data-toggle="modal" data-target="#modal-share"
                        data-post-id="<?=$td['id']?>" class="action action-share" href="javascript:;">
                        <i class="icon ri-share-forward-line"></i>
                        <small><br />
                            <count>Chia sẽ <?=CountFormatter::WS($td['luotshare'])?></count>
                        </small>
                    </a>
                </div>
            </article>
            <div class="user-card zib-widget author">
                <div class="card-content mt10 relative">
                    <div class="user-content">
                        <div class="user-avatar">
                            <a href="/profile/@<?=$td['username']?>">
                                <span class="avatar-img avatar-lg">
                                    <img alt="<?=$td['hovaten']?>" src="/<?=__IMG__?>/users/avatar-default.jpg"
                                        data-src="/<?=__IMG__?>/users/<?=$td['avatar']?>"
                                        class="lazyload avatar avatar-id-<?=$td['user_id']?>">
                                    <?=(new PlansIcon())->icon($td['username']);?>
                                    <?=ShowPlans::TD($td['username']);?>
                                </span>
                            </a>
                        </div>
                        <div class="user-info mt20 mb10">
                            <div class="user-name flex jc">
                                <name class="flex1 flex ac">
                                    <a class="display-name text-ellipsis "
                                        href="/profile/@<?=$td['username']?>"><?=$td['hovaten']?></a>
                                    <?=WSInfoProfileShow::TD($td);?>
                                </name>
                            </div>
                            <div class="author-tag mt10 mini-scrollbar">
                                <a class="but c-blue tag-posts" data-toggle="tooltip"
                                    title="Tổng cộng có <?=$UserStats->Post(THANHDIEU($td['username']))?> bài viết"
                                    href="/profile/@<?=THANHDIEU($td['username'])?>">
                                    <i class="ri-edit-line"></i>
                                    <?=$UserStats->Post(THANHDIEU($td['username']))?>
                                </a>
                                <a class="but c-green tag-comment" data-toggle="tooltip"
                                    title="Tổng cộng có <?=$UserStats->Comment(THANHDIEU($td['username']))?> bình luận">
                                    <i class="ri-chat-1-line"></i>
                                    <?=$UserStats->Comment(THANHDIEU($td['username']))?>
                                </a>
                                <a class="but c-yellow tag-follow" data-toggle="tooltip"
                                    title="Tổng cộng có <?=UserTotalFollowing::TD($td['username'])?> người đang theo dõi"
                                    href="/profile/@<?=THANHDIEU($td['username'])?>?ws_tab=follow">
                                    <i class="ri-user-follow-line"></i>
                                    <?=UserTotalFollowing::TD($td['username'])?>
                                </a>
                                <span class="badg c-red tag-hot" data-toggle="tooltip" title="Điểm độ hot">
                                    <i class="ri-fire-line"></i>
                                    <?=CountFormatter::WS($td['dohot'])?>
                                </span>
                            </div>
                            <div class="user-desc mt10 muted-2-color em09"><?=$td['tieusu']?></div>
                        </div>
                    </div>
                    <div class="swiper-container more-posts swiper-scroll">
                        <div class="swiper-wrapper">
                            <?php $viet69 = $thanhdieudb->query("SELECT * FROM ws_products ORDER BY ngaydang DESC") ?: false; if ($viet69) { while ($swiper = $viet69->fetch_assoc()) {(new GlobalViews($swiper['id'],$taikhoan,$ip,$swiper['slug']))->LuotXem();?>
                            <div class="swiper-slide mr10">
                                <a href="<?=$swiper['slug']?>">
                                    <div class="graphic hover-zoom-img em09 style-3"
                                        style="padding-bottom: 70%!important;">
                                        <img class="fit-cover lazyload"
                                            data-src="/<?=__IMG__?>/uploads/<?=$swiper['hinhthunho']?>"
                                            src="/<?=__IMG__?>/thumbnail-sm.png"
                                            alt="<?=THANHDIEU($swiper['tieude'])?>">
                                        <div class="abs-center left-bottom graphic-text text-ellipsis">
                                            <?=THANHDIEU($swiper['tieude'])?></div>
                                        <div class="abs-center left-bottom graphic-text">
                                            <div class="em09 opacity8"><?=$cut->characters(strip_tags($swiper['noidung']),80)?></div>
                                            <div class="px12 opacity8 mt6">
                                                <item class="time-ago" data-timeago="<?=$swiper['ngaydang']?>"></item>
                                                <item class="pull-right"><i class="ri-eye-line"></i>
                                                    <?=CountFormatter::WS($swiper['luotxem'])?></item>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } }?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <div class="theme-box relates relates-thumb">
                <div class="box-body notop">
                    <div class="title-theme">Mã Nguồn Khác</div>
                </div>
                <div class="zib-widget">
                    <div class="swiper-container swiper-scroll">
                        <div class="swiper-wrapper">
                            <?php $oOo = $thanhdieudb->query("SELECT * FROM ws_products ORDER BY RAND()");
                            if ($oOo->num_rows > 0) {
                            while ($wus = $oOo->fetch_assoc()) {(new GlobalViews($wus['id'],$taikhoan,$ip,$wus['slug']))->LuotXem();?>
                            <div class="swiper-slide mr10">
                                <a href="<?=$wus['slug']?>">
                                    <div class="graphic hover-zoom-img mb10 style-3"
                                        style="padding-bottom:70%!important;">
                                        <img class="fit-cover lazyload"
                                            data-src="/<?=__IMG__?>/uploads/<?=$wus['hinhthunho']?>"
                                            src="/<?=__IMG__?>/uploads/<?=$wus['hinhthunho']?>" alt=" <?=THANHDIEU($wus['tieude'])?> - <?=$TD->Setting('name-site')?>">
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
            <?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/Client/comments/Main.php');?>
        </div>
    </div>
</main>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="modal-order" tabindex="-1" role="dialog">
    <div class="modal-mini modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg jb-blue">
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
                            <i class="fa fa-cart-plus"></i>
                        </div>
                        <div class="mt10 em12 padding-w10">Xác Nhận Mua Hàng
                        </div>
                    </div>
                </div>
                <div class="mb10 muted-box order-type-2">
                    <span><?=THANHDIEU($td['tieude'])?></span>
                    <div class="flex jsb ab mt6">
                        <span class="muted-2-color">Giá
                        </span>
                        <div>
                            <div class="inline-block mr10">
                                <span>
                                    <span class="em14"><?=FormatNumber::TD($td['giatien']*(1 - $discount),1)?><span
                                            class="pay-mark px12">đ</span></span>
                                </span>
                            </div>
                            <span class="original-price"><span><?=FormatNumber::TD($td['giatien'],1)?></span>
                                <span class="pay-mark px12">đ</span>
                            </span>
                        </div>
                    </div>
                </div>
                <form class="order-product">
                    <div class="dependency-box">
                        <div class="muted-2-color em09 mb6">Vui lòng chọn phương thức thanh toán
                        </div>
                        <div class="flex mb10">
                            <div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer"
                                data-for="payment_method" data-value="balance">
                                <img src="/<?=__IMG__?>/svg/pay-balance-logo.svg" alt="logo cân bằng">
                                <div>Số Dư Tài Khoản
                                </div>
                            </div>
                        </div>
                        <div class="mb10 muted-box padding-h10 sodu" data-controller="payment_method"
                            data-condition="==" data-value="balance" style="display:none;">
                            <div class="flex jsb ac">
                                <span class="muted-2-color">
                                    <svg class="em12 mr3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                        xml:space="preserve" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <circle style="fill:#FFDC64;" cx="256" cy="256" r="256"></circle>
                                            <circle style="fill:#FFC850;" cx="256" cy="256" r="220.69"></circle>
                                            <circle style="fill:#FFF082;" cx="256" cy="256" r="194.207"></circle>
                                            <path style="fill:#E7B452;"
                                                d="M291.31,253.95v-93.357c18.276,6.737,30.897,18.294,30.897,30.856c0,7.31,5.931,13.241,13.241,13.241 s13.241-5.931,13.241-13.241c0-26.968-23.418-49.479-57.379-58.808v-9.054c0-7.31-5.931-13.241-13.241-13.241 c-7.31,0-13.241,5.931-13.241,13.241v4.71c-2.905-0.18-5.843-0.296-8.828-0.296s-5.922,0.116-8.828,0.296v-4.71 c0-7.31-5.931-13.241-13.241-13.241s-13.241,5.931-13.241,13.241v9.054c-33.961,9.33-57.379,31.839-57.379,58.808 c0,35.75,24.744,53.774,57.379,66.601v93.357c-18.276-6.737-30.897-18.294-30.897-30.856c0-7.31-5.931-13.241-13.241-13.241 s-13.241,5.931-13.241,13.241c0,26.968,23.418,49.479,57.379,58.808v9.055c0,7.31,5.931,13.241,13.241,13.241 s13.241-5.931,13.241-13.241v-4.71c2.905,0.18,5.843,0.296,8.828,0.296s5.922-0.116,8.828-0.296v4.71 c0,7.31,5.931,13.241,13.241,13.241c7.31,0,13.241-5.931,13.241-13.241v-9.054c33.961-9.33,57.379-31.839,57.379-58.808 C348.69,284.801,323.946,266.776,291.31,253.95z M256,154.483c2.985,0,5.921,0.167,8.828,0.405v89.97 c-1.668-0.514-3.327-1.033-5.009-1.539c-4.502-1.355-8.652-2.679-12.647-3.994v-84.437C250.079,154.649,253.015,154.483,256,154.483 z M189.793,191.448c0-12.562,12.62-24.118,30.897-30.856v68.591C198.004,218.632,189.793,207.616,189.793,191.448z M256,357.517 c-2.985,0-5.921-0.167-8.828-0.405v-89.97c1.668,0.514,3.327,1.033,5.009,1.539c4.502,1.355,8.652,2.679,12.647,3.994v84.437 C261.921,357.351,258.985,357.517,256,357.517z M291.31,351.407v-68.591c22.686,10.552,30.897,21.568,30.897,37.736 C322.207,333.113,309.587,344.67,291.31,351.407z">
                                            </path>
                                        </g>
                                    </svg>
                                    Số dư khả dụng
                                </span>
                                <div>
                                    <span class="c-blue-2">
                                        <span class="mr3 px12">
                                            <span class="em14"><?=FormatNumber::TD($user['sodu']);?>đ</span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <?php if ($td['giatien'] * (1 - $discount) > $user['sodu']):?>
                            <a data-class="modal-mini full-sm" class="balance-charge-link but c-red block mt6"
                                href="javascript:;">Số dư không đủ, vui lòng nạp tiền trước
                                <i class="ml6 fa fa-angle-right em12"></i>
                            </a>
                            <?php endif;?>
                        </div>
                        <input type="hidden" name="action" value="order-product">
                        <input type="hidden" name="product_id" value="<?=THANHDIEU($td['id'])?>">
                        <input type="hidden" name="phan_loai" value="<?=PhanLoai($td['phanloai'])?>">
                        <input type="hidden" name="order_name" value="<?=THANHDIEU($td['tieude'])?>">
                        <button type="submit" class="mt6 but jb-red initiate-pay btn-block radius">Thanh Toán Ngay
                            <!-- <span class="pay-price-text"><?=FormatNumber::TD($td['giatien']*(1 -$discount),2)?> đ</span> -->
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="order-notification" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg c-green">
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
                            <i class="ri-store-2-line"></i>
                        </div>
                        <div class="mt10 em12 padding-w10">Thanh Toán Thành Công</div>
                    </div>
                </div>
                <div class="c-green box-body mb10"><span class="badg c-red btn-block">Nếu bạn có thắc mắc hoặc cần sự
                        giúp đỡ, đừng ngần ngại liên hệ cho chúng tôi.</span>
                </div>
                <div class="mb10 muted-box padding-10 em09">
                    <div class="mb6 name-client"></div>
                    <div class="mb6 giamua"></div>
                    <div class="mb6 ngaymua"></div>
                </div>
                <div class="but-download flex ac">
                    <a class="mr10 but jb-yellow dl-product"> <i class="ri-download-line"></i> Tải Xuống </a>
                </div>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>