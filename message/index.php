<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<main class="main-min-height">
    <div class="container">
        <div class="msg-center row gutters-10">
            <div class="col-sm-3">
                <div class="msg-center-nav lists-nav zib-widget">
                    <ul class="list-inline scroll-x mini-scrollbar tab-nav-theme td-tab-message thanhdieu-refresh">
                        <li>
                            <a href="system">
                                <img class="fit-cover lazyload" src="/<?=__IMG__?>/svg/msg-system.svg"
                                    data-src="/<?=__IMG__?>/svg/msg-system.svg" alt="Tin nhắn chưa đọc"> Thông
                                Báo Hệ Thống <badge class="top" msg-cat="all">
                                    <?=$totals->NotifySystem()?>
                                </badge>
                            </a>
                        </li>
                        <li>
                            <a href="chat">
                                <img class="fit-cover lazyload" src="/<?=__IMG__?>/svg/msg-private.svg"
                                    data-src="/<?=__IMG__?>/svg/msg-private.svg" alt="Tin nhắn chưa đọc"> Tin
                                Nhắn Riêng </a>
                        </li>
                        <span class="hide">
                            <a class="muted-2-color but hollow" data-toggle="tab" href="#user_msg_content"
                                data-ajax="1">
                                <i class="fa fa-bell fa-fw" aria-hidden="true"></i>
                            </a>
                        </span>
                    </ul>
                </div>
            </div>
            <div class="msg-center-content col-sm-9">
                <div class="zib-widget">
                    <?php if ($isLogin->TD($taikhoan, $user)) {?>
                    <div class="tab-content main-tab-content">
                        <?php
                  function TDShowLayOut_MSG($current_url) {
                    $Vuong = [
                        '/system' => '/layout/Client/msg/notice.system.php',
                        '/chat' => '/layout/Client/msg/msg.private.php',
                    ];
                    foreach ($Vuong as $Thanh => $Dieu) {
                        if (strpos($current_url, $Thanh)!==false) {
                            return $Dieu;
                        }
                    }
                    return '/layout/Client/msg/notice.system.php';
                }
                $Dieu = TDShowLayOut_MSG($current_url);
                include_once ($_SERVER['DOCUMENT_ROOT'].$Dieu);?>
                        <?php } else { ?>
                        <div style="min-height:360px;" class="flex jc">
                            <div class="text-center box-body">
                                <p class="muted-color box-body em12">Hãy đăng nhập hoặc đăng ký để sử dụng dịch vụ từ <a class="td-home"><?=$TD->Setting('name-site')?></a></p>
                                    <a href="javascript:;" class="signin-loader but jb-blue padding-lg">
                                        <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i>Đăng Nhập </a>
                                    <a href="javascript:;" class="signup-loader ml10 but jb-yellow padding-lg">
                                    <i class="ri-user-add-line"></i> Đăng Ký </a>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>