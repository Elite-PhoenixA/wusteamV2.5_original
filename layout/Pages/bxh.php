<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/global/bxhModel.php');?>
<?php $options_header = ['title' => "Bảng Xếp Hạng | " . $TD->Setting('name-site'), 'description' => 'TOP 10 Người Dẫn Đầu Bảng Xếp Hạng',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<style>.vd_content>b,a.top-icon{font-weight:600;text-align:center}.info,.vtd-ranklist{color:var(--main-color)}.info,.vd_content>b,a.top-icon{text-align:center}.syphimg img,img.class-pic{border-radius:8px}a.bottom-link,a.top-icon{position:absolute;color:#fff;left:50%;transform:translateX(-50%)}@media (max-width:768px){.ranking-item{width:100%!important;background:var(--main-bg-color)}}.vd_content>b{margin:0;font-size:22px;line-height:32px;padding:20px 0}.ws-null-topbxh{height:140px}.vtd-ranklist{width:100%;padding:0;margin:0}.sidebar .ranking-item{width:100%;padding:0 10px 0 0;background:var(--main-bg-color)}.syphimg{width:90px;height:60px;margin-right:5px}.list.clearfix{display:flex;justify-content:space-between;flex-wrap:wrap}.ranking-item{margin:0 auto 20px;position:relative;width:calc(100% / 3 - 10px);background:var(--main-bg-color);box-shadow:0 0 10px var(--main-shadow);border-radius:var(--main-radius)}a.top-icon{display:block;width:206px;height:68px;line-height:25px;top:-10px;font-size:17px}.num-icon{width:40px;height:22px;margin:0 12px 0 15px}.class-box{margin-top:80px;margin-bottom:60px}.name,.price{margin-bottom:2px}.info{width:100%;font-size:20px}a.class-item.js-rank{display:block;width:100%;height:80px;display:flex;align-items:center;margin-bottom:20px}img.class-pic{width:90px;margin-right:5px}.class-info{width:190px;font-size:12px}.name{line-height:20px;font-weight:400;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;overflow:hidden;-webkit-box-orient:vertical}.price{color:#f01414;font-weight:600}.study-num{color:#9199a1;font-weight:400}a.bottom-link{width:40%;height:24px;display:flex;justify-content:center;align-items:center;font-size:12px;line-height:12px;font-weight:500;background-image:linear-gradient(270deg,#ff4f39 0,#fd6400 100%);border-radius:12px;bottom:20px}</style>
<main class="container">
    <div class="content-wrap">
        <div class="content-layout">
            <div class="page-cover theme-box radius8 main-shadow">
                <img class="fit-cover no-scale lazyload no-events-img" src="https://i.imgur.com/Okwe7wl.png"
                    data-src="/<?=__IMG__?>/main/bg-bxh.png">
                <div class="absolute xy-mask"></div>
                <div class="list-inline box-body abs-center text-center">
                    <div class="title-h-center">
                        <span class="vd_content">
                            <b>
                                TOP <font size="7" color="red"> 10</font> Bảng Xếp Hạng
                            </b>
                            <li class="active">[ Danh Sách Tài Khoản Dẫn Đầu Bảng Xếp Hạng ]</li>
                        </span>
                    </div>
                </div>
            </div>
            <div class="container fluid-widget">
                <div class="vtd-ranklist list clearfix">
                    <div class="ranking-item">
                        <a class="top-icon"
                            style="background: url(/<?=__IMG__?>/icon/bxh-follow.png) no-repeat center/100%;pointer-events:none">BẢNG XẾP
                            HẠNG
                            <br>(FOLLOW) </a>
                        <div class="class-box">
                            <?php if (!empty($topFollow)) {
                            foreach ($topFollow as $index => $top) { 
                            $rank = $index + 1;
                            $TOP = "/".__IMG__."/icon/top{$rank}.png";?>
                            <hr>
                            <div class="user-ranking-item relative mt20">
                                <div class="user-info flex ac">
                                    <div class="num-icon"
                                        style="background: url(<?=$TOP?>) no-repeat center/100%;background-size: contain;">
                                    </div>
                                    <a href="/profile/@<?=$top['user_username']?>">
                                        <span class="avatar-img">
                                            <img alt="<?=THANHDIEU($top['hovaten'])?>-<?=$TD->Setting('name-site')?>"
                                                src="/<?=__IMG__?>/users/avatar-default.jpg"
                                                data-src="/<?=__IMG__.'/users/'.$top['avatar']?>"
                                                class="lazyload avatar avatar-id-<?=$top['user_id']?>">
                                            <?=(new PlansIcon())->icon($top['user_username']);?>
                                            <?=ShowPlans::TD($top['user_username']);?>
                                        </span>
                                    </a>
                                    <div class="user-right flex flex1 ac jsb ml10">
                                        <div class="flex1">
                                            <div class="font-bold">
                                                <name class="flex ac flex1">
                                                    <a class="display-name text-ellipsis"
                                                        href="/profile/@<?=$top['user_username']?>"><?=THANHDIEU($top['hovaten'])?>
                                                    </a>
                                                    <?=WSInfoProfileShow::TD($top);?>
                                                </name>
                                            </div>
                                            <div class="mt3 em09 muted-color text-ellipsis">
                                                <span><?=THANHDIEU($top['tieusu'])?></span>
                                            </div>
                                        </div>
                                        <div class="ml10 flex0">
                                            <span class="badg c-green" data-toggle="tooltip" title=""
                                                data-original-title="Hiện có <?=FormatNumber::TD(UserTotalFollowing::TD($top['user_username']))?> người theo dõi">
                                                <i class="ri-user-follow-line"></i>
                                                <span
                                                    class="ml1"><?=FormatNumber::TD(UserTotalFollowing::TD($top['user_username']))?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } else {?>
                            <div class="text-center ajax-item ws-null-topbxh">
                                <img src="/<?=__IMG__?>/icon/no-found.png">
                            </div>
                            <?php } ?>
                        </div>
                        <a class="bottom-link">
                        <span>Yêu Cầu: 10 Follow</span>
                            <i class="imv2-chevrons-right"></i>
                        </a>
                    </div>
                    <div class="ranking-item">
                        <a class="top-icon"
                            style="background: url(/<?=__IMG__?>/icon/bxh-level.png) no-repeat center/100%;pointer-events:none">BẢNG XẾP
                            HẠNG
                            <br>(LEVEL) </a>
                        <div class="class-box">
                            <?php if (!empty($topLevel)) {
                            foreach ($topLevel as $index => $top) { 
                            $rank = $index + 1;
                            $TOP = "/".__IMG__."/icon/top{$rank}.png";?>
                            <hr>
                            <div class="user-ranking-item relative mt20">
                                <div class="user-info flex ac">
                                    <div class="num-icon"
                                        style="background: url(<?=$TOP?>) no-repeat center/100%;background-size: contain;">
                                    </div>
                                    <a href="/profile/@<?=$top['user_username']?>">
                                        <span class="avatar-img">
                                            <img alt="<?=THANHDIEU($top['hovaten'])?>-<?=$TD->Setting('name-site')?>"
                                                src="/<?=__IMG__?>/users/avatar-default.jpg"
                                                data-src="/<?=__IMG__.'/users/'.$top['avatar']?>"
                                                class="lazyload avatar avatar-id-<?=$top['user_id']?>">
                                            <?=(new PlansIcon())->icon($top['user_username']);?>
                                            <?=ShowPlans::TD($top['user_username']);?>
                                        </span>
                                    </a>
                                    <div class="user-right flex flex1 ac jsb ml10">
                                        <div class="flex1">
                                            <div class="font-bold">
                                                <name class="flex ac flex1">
                                                    <a class="display-name text-ellipsis"
                                                        href="/profile/@<?=$top['user_username']?>"><?=THANHDIEU($top['hovaten'])?>
                                                    </a>
                                                    <?=WSInfoProfileShow::TD($top);?>
                                                </name>
                                            </div>
                                            <div class="mt3 em09 muted-color text-ellipsis">
                                                <span><?=THANHDIEU($top['tieusu'])?></span>
                                            </div>
                                        </div>
                                        <!-- <div class="ml10 flex0">
                                            <span class="badg" data-toggle="tooltip" title=""
                                                data-original-title="Hiện có <?=FormatNumber::TD(UserTotalFollowing::TD($top['user_username']))?> người theo dõi">
                                                <i class="ri-user-follow-line"></i>
                                                <span class="ml1"><?=FormatNumber::TD(UserTotalFollowing::TD($top['user_username']))?>
                                                </span>
                                            </span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <?php } } else {?>
                            <div class="text-center ajax-item ws-null-topbxh">
                                <img src="/<?=__IMG__?>/icon/no-found.png">
                            </div>
                            <?php } ?>
                        </div>
                        <a class="bottom-link">
                        <span>Yêu Cầu: Level 7</span>
                            <i class="imv2-chevrons-right"></i>
                        </a>
                    </div>
                    <div class="ranking-item">
                        <a class="top-icon"
                            style="background: url(/<?=__IMG__?>/icon/bxh-dohot.png) no-repeat center/100%;pointer-events:none">BẢNG XẾP
                            HẠNG
                            <br>(VIRAL) </a>
                        <div class="class-box">
                            <?php if (!empty($topViral)) {
                            foreach ($topViral as $index => $top) { 
                            $rank = $index + 1;
                            $TOP = "/".__IMG__."/icon/top{$rank}.png";?>
                            <hr>
                            <div class="user-ranking-item relative mt20">
                                <div class="user-info flex ac">
                                    <div class="num-icon"
                                        style="background: url(<?=$TOP?>) no-repeat center/100%;background-size: contain;">
                                    </div>
                                    <a href="/profile/@<?=$top['user_username']?>">
                                        <span class="avatar-img">
                                            <img alt="<?=THANHDIEU($top['hovaten'])?>-<?=$TD->Setting('name-site')?>"
                                                src="/<?=__IMG__?>/users/avatar-default.jpg"
                                                data-src="/<?=__IMG__.'/users/'.$top['avatar']?>"
                                                class="lazyload avatar avatar-id-<?=$top['user_id']?>">
                                            <?=(new PlansIcon())->icon($top['user_username']);?>
                                            <?=ShowPlans::TD($top['user_username']);?>
                                        </span>
                                    </a>
                                    <div class="user-right flex flex1 ac jsb ml10">
                                        <div class="flex1">
                                            <div class="font-bold">
                                                <name class="flex ac flex1">
                                                    <a class="display-name text-ellipsis"
                                                        href="/profile/@<?=$top['user_username']?>"><?=THANHDIEU($top['hovaten'])?>
                                                    </a>
                                                    <?=WSInfoProfileShow::TD($top);?>
                                                </name>
                                            </div>
                                            <div class="mt3 em09 muted-color text-ellipsis">
                                                <span><?=THANHDIEU($top['tieusu'])?></span>
                                            </div>
                                        </div>
                                        <div class="ml10 flex0">
                                            <span class="badg c-red" data-toggle="tooltip" title=""
                                                data-original-title="Hiện có <?=$top['dohot']?> độ hot">
                                                <i class="ri-fire-line"></i>
                                                <span
                                                    class="ml1"><?=CountFormatter::WS($top['dohot'])?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                             } } else {
                                 ?>
                            <div class="text-center ajax-item ws-null-topbxh">
                                <img src="/<?=__IMG__?>/icon/no-found.png">
                            </div>
                            <?php } ?>
                        </div>
                        <a class="bottom-link">
                            <span>Yêu Cầu: 30.000 Viral</span>
                            <i class="imv2-chevrons-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>