<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/users/mainModel.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<main class="main-min-height">
    <div class="container">
        <div class="author-header mb20 radius8 main-shadow main-bg full-widget-sm">
            <div class="page-cover td-load-anhbia">
                <img data-fancybox class="lazyload fit-cover user-cover user-cover-id-<?=$td['user_id']?>"
                    src="/<?=__IMG__?>/users/anh-bia/<?= isset($td['anhbia']) ? $td['anhbia'] : 'cover-default.png?user_id='.$td['user_id'] ?>"
                    data-src="/<?=__IMG__?>/users/anh-bia/<?= isset($td['anhbia']) ? $td['anhbia'] : 'cover-default.png?user_id='.$td['user_id'] ?>"
                    alt="<?=THANHDIEU($td['hovaten'])?>">
                <div class="absolute linear-mask"></div>
                <div class="abs-center right-bottom box-body cover-btns">
                    <span class="dropup pull-right">
                        <a href="javascript:;" class="item mr3 toggle-radius" data-toggle="dropdown">
                            <i class="icon ri-more-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a mobile-bottom="true" class="anhbia-set-link" href="javascript:;">
                                    <i class="fa fa-camera mr3" aria-hidden="true"></i>
                                    Chỉnh sửa ảnh bìa
                                </a>
                            </li>
                            <li>
                                <a href="/profile/@<?=$td['username']?>">
                                    <i class="ri-eye-line mr3"></i>
                                    Chế độ xem trang
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
            <div class="header-content">
                <div class="flex header-info relative hh">
                    <div class="flex0 header-avatar">
                        <div class="hover-show relative">
                            <span class="avatar-img td-load-avatar">
                                <img alt="<?=THANHDIEU($td['hovaten'])?>-<?=$TD->Setting('name-site')?>"
                                    src="/<?=__IMG__.'/users/'.$td['avatar']?>"
                                    data-src="/<?=__IMG__.'/users/'.$td['avatar']?>"
                                    class="lazyload avatar avatar-id-<?=$td['user_id']?>">
                                    <?=ShowPlans::TD($td['username'],1);?>
                            </span>
                            <a mobile-bottom="true" class="avatar-set-link absolute hover-show-con flex jc xx"
                                href="javascript:;">
                                <i class="fa fa-camera mb6" aria-hidden="true"></i>
                                Thay ảnh
                            </a>
                        </div>
                    </div>
                    <div class="flex1">
                        <div class="em12 name">
                            <name class="flex ac flex1">
                                <div class="display-name text-ellipsis"><?=THANHDIEU($td['hovaten'])?></div>
                                <?=WSInfoProfileShow::TD($td);?>
                            </name>
                            </span>
                        </div>
                        <div class="user-identity flex ac hh">
                            <?php if ($td['status'] ==='approved') {?>
                            <button data-class="modal-mini" mobile-bottom="true" class="td user-auth-info but"
                                href="javascript:;">
                                <icon data-toggle="tooltip" class="user-auth-icon"
                                    data-original-title="Đã xác minh tài khoản">
                                    <img style="height:18px;margin-top:-2px;" src="/<?=__IMG__.'/icon/verify.png'?>"
                                        alt="User Verify">
                                </icon>Đã xác minh
                                <i class="fa fa-angle-right" style="margin: 0 0 0 .3em;"></i>
                            </button>
                            <?php } ?>
                            <?php if (strtolower($td['rank']) === 'admin') { ?>
                            <span class="badg c-green" data-toggle="tooltip"
                                data-original-title="Người có quyền lực cao nhất cũng là ban quản lý tại <?=$TD->Setting('name-site')?>"><i
                                    class="ri-admin-line"></i> Quản Trị Viên</span>
                            <?php } elseif (strtolower($td['rank']) === 'partner') { ?>
                            <span class="badg c-cyan" data-toggle="tooltip"
                                data-original-title="Đối tác chính thức của <?=$TD->Setting('name-site')?>"><i
                                    class="ri-shield-user-line"></i> Đối Tác</span>
                            <?php } elseif (strtolower($td['rank']) === 'support') { ?>
                            <span class="badg c-purple" data-toggle="tooltip"
                                data-original-title="Chuyên gia hỗ trợ cho <?=$TD->Setting('name-site')?>"><i
                                    class="ri-user-heart-line"></i> Hỗ Trợ Viên</span>
                            <?php }?>
                            <?=ShowPlans::TD($td['username'],2);?>
                        </div>
                        <div class="mt6 desc muted-2-color"><?=THANHDIEU($td['tieusu'])?></div>
                    </div>
                    <div class="header-btns flex0 flex ac td-load">
                    <?php if (mysqli_num_rows(mysqli_query($thanhdieudb, "SELECT * FROM ws_diemdanh WHERE taikhoan='$taikhoan' AND DATE(thoigian) = '" . date('Y-m-d') . "'")) > 0) {?> <a class="but c-blue ml10 pw-1em radius">
                <i class="fa fa-calendar-check-o"></i> Đã Điểm Danh
                    </a>
                <?php } else {?>
                 <a class="but c-blue ml10 pw-1em radius diem-danh" data="diemdanh" href="javascript:;">
                <i class="fa fa-calendar-check-o"></i> Điểm Danh
              </a>
              <?php }?>
                </div>
                </div>
            </div>
        </div>
        <div class="fluid-widget"></div>
        <div class="user-center row gutters-10">
            <div class="col-sm-3">
                <div class="sidebar-user"></div>
                <div class="mb10-sm mb20 flex ac jsa zib-widget padding-10 text-center">
                    <a class="user-statistics-item" href="/profile/@<?=$user['username']?>?ws_tab=post">
                        <div class="em14"><?=$UserStats->Post(THANHDIEU($user['username']))?></div>
                        <div class="em09 opacity5 mt6">Sản Phẩm</div>
                    </a>
                    <a class="user-statistics-item" href="/profile/@<?=$user['username']?>">
                        <div class="em14"><?=$UserStats->Comment(THANHDIEU($user['username']))?></div>
                        <div class="em09 opacity5 mt6">Bình Luận</div>
                    </a>
                    <a class="user-statistics-item" href="/profile/@<?=$user['username']?>?ws_tab=follow">
                        <div class="em14"><?=UserTotalFollowing::TD($user['username'])?></div>
                        <div class="em09 opacity5 mt6">Theo Dõi</div>
                    </a>
                </div>
                <div class="mb20 mb10-sm payvip-icon btn-block badg pointer" style="padding:14px 10px;"
                    href="javascript:;" onclick="window.location.replace('plans');">
                    <?php if ($plans->TD('tengoi',$user['username'])):?>
                    <img class="img-icon em12 mr6 lazyload" src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                        data-src="/<?=$images_plans?>" title="thành viên vàng" alt="<?=$title_plans?>">
                    <span><?=$title_plans?>
                    </span>
                    <span
                        class="ml10 badg <?=($plans->TD('tengoi',$user['username']) === 'legacy') ? 'jb-yellow' : 'b-blue-2'?> vip-expdate-tag">
                        <i
                            class="ri-time-line mr3"></i><?=(date('Y', strtotime($plans->TD('ngayhethan', $user['username']))) > 2100) ? 'Vô hạn thời gian' : date('\n\g\à\y j \t\h\á\n\g n \nă\m Y', strtotime($plans->TD('ngayhethan', $user['username'])))?>
                    </span>
                    <i class="fa fa-chevron-circle-right abs-right"></i>
                    <?php else: ?>
                    <i class="em12 mr6 ri-vip-crown-2-line"></i>
                    Nâng cấp lên thành viên vip<i class="fa fa-chevron-circle-right abs-right"></i>
                    <?php endif;?>
                </div>
                <div class="flex ab jsb col-ml6 pointer" href="javascript:;"
                    onclick="window.location.replace('balance');">
                    <div class="mb10-sm zib-widget padding-10 flex1">
                        <div class="muted-color em09 mb6">
                            Số Dư<i class="ml6 fa fa-angle-right em12"></i>
                        </div>
                        <div class="flex jsb">
                            <span class="font-bold c-blue-2 em12"><?=FormatNumber::TD($td['sodu']);?>đ</span>
                            <svg class="em14" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round"></g>
                                <g>
                                    <g fill="none">
                                        <circle fill="#3E73C4" cx="16" cy="16" r="16"></circle>
                                        <g fill="#FFF">
                                            <path
                                                d="M20.022 18.124c0-2.124-1.28-2.852-3.84-3.156-1.828-.243-2.193-.728-2.193-1.578 0-.85.61-1.396 1.828-1.396 1.097 0 1.707.364 2.011 1.275a.458.458 0 00.427.303h.975a.416.416 0 00.427-.425v-.06a3.04 3.04 0 00-2.743-2.489V9.142c0-.243-.183-.425-.487-.486h-.915c-.243 0-.426.182-.487.486v1.396c-1.829.242-2.986 1.456-2.986 2.974 0 2.002 1.218 2.791 3.778 3.095 1.707.303 2.255.668 2.255 1.639 0 .97-.853 1.638-2.011 1.638-1.585 0-2.133-.667-2.316-1.578-.06-.242-.244-.364-.427-.364h-1.036a.416.416 0 00-.426.425v.06c.243 1.518 1.219 2.61 3.23 2.914v1.457c0 .242.183.425.487.485h.915c.243 0 .426-.182.487-.485V21.34c1.829-.303 3.047-1.578 3.047-3.217z">
                                            </path>
                                            <path
                                                d="M12.892 24.497c-4.754-1.7-7.192-6.98-5.424-11.653.914-2.55 2.925-4.491 5.424-5.402.244-.121.365-.303.365-.607v-.85c0-.242-.121-.424-.365-.485-.061 0-.183 0-.244.06a10.895 10.895 0 00-7.13 13.717c1.096 3.4 3.717 6.01 7.13 7.102.244.121.488 0 .548-.243.061-.06.061-.122.061-.243v-.85c0-.182-.182-.424-.365-.546zm6.46-18.936c-.244-.122-.488 0-.548.242-.061.061-.061.122-.061.243v.85c0 .243.182.485.365.607 4.754 1.7 7.192 6.98 5.424 11.653-.914 2.55-2.925 4.491-5.424 5.402-.244.121-.365.303-.365.607v.85c0 .242.121.424.365.485.061 0 .183 0 .244-.06a10.895 10.895 0 007.13-13.717c-1.096-3.46-3.778-6.07-7.13-7.162z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="mb10-sm zib-widget padding-10 flex1">
                        <div class="muted-color em09 mb6">
                            Điểm Ruby<i class="ml6 fa fa-angle-right em12"></i>
                        </div>
                        <div class="flex jsb">
                            <span class="font-bold c-yellow em12"><?=FormatNumber::TD($td['ruby']);?></span>
                            <svg class="em14" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001"
                                xml:space="preserve" fill="#000000">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round"></g>
                                <g>
                                    <path style="fill:#EE8700;"
                                        d="M383.988,193.495v-65.488c0-31.295-21.941-59.5-61.78-79.419 c-35.139-17.57-81.383-27.245-130.214-27.245c-48.834,0-95.081,9.676-130.217,27.245C21.94,68.507,0,96.712,0,128.007v85.329v85.329 v85.329c0,31.298,21.94,59.502,61.777,79.422c35.137,17.569,81.383,27.244,130.217,27.244c37.202,0,72.668-5.55,103.306-16.076 c20.247,10.275,43.135,16.076,67.353,16.076c82.35,0,149.348-66.999,149.348-149.348C512,266.205,456.268,203.88,383.988,193.495z">
                                    </path>
                                    <g>
                                        <path style="fill:#FFB655;"
                                            d="M363.147,234.647c-0.166,0.004-0.327,0.026-0.495,0.026c-0.166,0-0.327-0.021-0.495-0.026 c-58.593,0.269-106.179,48.009-106.179,106.666c0,58.822,47.852,106.677,106.674,106.677s106.677-47.855,106.677-106.677 C469.329,282.656,421.741,234.916,363.147,234.647z M373.667,321.325c5.285,0,9.75,4.537,9.75,9.91c0,5.377-4.374,9.749-9.75,9.749 h-20.715v3.623h20.715c5.285,0,9.75,4.536,9.75,9.908c0,5.375-4.374,9.75-9.75,9.75h-20.715v1.967 c0,11.733,5.448,17.435,16.654,17.435c4.913,0,16.34-1.317,16.34-13.528c0-0.112,0.003-0.223,0.01-0.334 c0.253-4.273,3.242-9.262,10.836-9.262c6.79,0,10.846,4.055,10.846,10.845c0,19.542-15.768,33.189-38.344,33.189 c-23.813,0-38.031-14.335-38.031-38.345v-1.967h-3.998c-5.47,0-9.594-4.19-9.594-9.75c0-5.556,4.214-9.908,9.594-9.908h3.998 v-3.623h-3.998c-5.47,0-9.594-4.192-9.594-9.749s4.214-9.91,9.594-9.91h3.998v-4.308c0-24.768,13.862-38.973,38.031-38.973 c22.576,0,38.344,13.456,38.344,32.72c0,6.792-4.055,10.847-10.846,10.847c-7.493,0-10.845-4.741-10.845-9.442 c0-11.926-11.538-13.215-16.499-13.215c-11.407,0-16.497,5.57-16.497,18.061v4.308h20.717V321.325z">
                                        </path>
                                        <path style="fill:#FFB655;"
                                            d="M191.993,405.33c-48.834,0-95.081-9.675-130.217-27.244c-6.92-3.461-13.288-7.176-19.107-11.109 v17.019c0,30.208,63.858,63.995,149.322,63.995c20.876,0,41.463-2.075,60.477-5.968c-10.37-11.336-19.014-24.271-25.521-38.388 C215.468,404.753,203.773,405.33,191.993,405.33z">
                                        </path>
                                        <path style="fill:#FFB655;"
                                            d="M191.993,234.671c-48.834,0-95.079-9.676-130.217-27.244c-6.92-3.462-13.288-7.176-19.107-11.11 v17.019c0,30.208,63.858,63.993,149.322,63.993c12.467,0,24.787-0.717,36.769-2.126c9.321-18.804,22.483-35.376,38.461-48.683 C243.774,231.846,218.268,234.671,191.993,234.671z">
                                        </path>
                                        <path style="fill:#FFB655;"
                                            d="M191.993,192c85.464,0,149.322-33.785,149.322-63.993c0-30.207-63.858-63.993-149.322-63.993 S42.671,97.8,42.671,128.007C42.671,158.215,106.531,192,191.993,192z">
                                        </path>
                                        <path style="fill:#FFB655;"
                                            d="M191.993,362.659c7.641,0,15.235-0.27,22.732-0.804c-0.929-6.719-1.42-13.574-1.42-20.542 c0-7.49,0.562-14.849,1.629-22.045c-7.584,0.479-15.242,0.734-22.943,0.734c-48.834,0-95.079-9.676-130.217-27.245 c-6.92-3.459-13.288-7.174-19.107-11.107v17.019C42.671,328.874,106.531,362.659,191.993,362.659z">
                                        </path>
                                    </g>
                                    <path style="fill:#EE8700;"
                                        d="M369.447,298.956c4.96,0,16.499,1.289,16.499,13.215c0,4.701,3.353,9.442,10.845,9.442 c6.79,0,10.846-4.055,10.846-10.847c0-19.264-15.768-32.72-38.344-32.72c-24.169,0-38.031,14.204-38.031,38.973v4.308h-3.998 c-5.379,0-9.594,4.351-9.594,9.91c0,5.557,4.123,9.749,9.594,9.749h3.998v3.623h-3.998c-5.379,0-9.594,4.352-9.594,9.908 c0,5.559,4.123,9.75,9.594,9.75h3.998v1.967c0,24.011,14.218,38.345,38.031,38.345c22.576,0,38.344-13.648,38.344-33.189 c0-6.79-4.055-10.845-10.846-10.845c-7.594,0-10.582,4.99-10.836,9.262c-0.007,0.111-0.01,0.222-0.01,0.334 c0,12.211-11.427,13.528-16.34,13.528c-11.207,0-16.654-5.702-16.654-17.435v-1.967h20.715c5.377,0,9.75-4.374,9.75-9.75 c0-5.371-4.466-9.908-9.75-9.908h-20.715v-3.623h20.715c5.377,0,9.75-4.372,9.75-9.749c0-5.371-4.466-9.91-9.75-9.91h-20.715v-4.308 C352.952,304.526,358.039,298.956,369.447,298.956z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="zib-widget padding-6 mb10-sm">
                    <div class="padding-6 ml3">Dịch vụ của bạn</div>
                    <div class="flex ac hh text-center icon-but-box user-icon-but-box">
                        <item class="icon-but-order" href="javascript:;"
                            onclick="window.location.replace('history-order');">
                            <div class="em16">
                                <i class="icon ri-store-2-line c-red"></i>
                            </div>
                            <div class="px12 muted-color mt3">Lịch sử mua hàng</div>
                        </item>
                        <item class="icon-but-level" href="javascript:;" onclick="window.location.replace('level');">
                            <div class="em16">
                                <i class="icon ri-medal-line c-green"></i>
                            </div>
                            <div class="px12 muted-color mt3">Level của bạn</div>
                        </item>
                        <item class="icon-but-auth" href="javascript:;" onclick="window.location.replace('verify');">
                            <div class="em16">
                                <i class="icon ri-verified-badge-line c-blue"></i>
                            </div>
                            <div class="px12 muted-color mt3">Huy hiệu xác minh</div>
                        </item>
                    </div>
                </div>
                <div class="zib-widget padding-6">
                    <div class="padding-6 ml3">Cài đặt thông tin</div>
                    <div class="flex ac hh text-center icon-but-box user-icon-but-box">
                        <item class="icon-but-data" href="javascript:;" onclick="window.location.replace('account');">
                            <div class="em16">
                                <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30" xml:space="preserve"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <style type="text/css">.st0,.st1,.st2{fill:none}.st0{stroke:#6C3DB7;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st1{stroke:#1F992A;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st2{stroke:#6A83BA;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st3{fill:#8A8AFF;stroke:#8A8AFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st4{fill:#6C3DB7;stroke:#6C3DB7;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st5{fill:#A576FF;stroke:#A576FF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st6{fill:#F2BB41;stroke:#F2BB41;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st7{fill:#E08838;stroke:#E08838;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st8{fill:#1F992A;stroke:#1F992A;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st9{fill:#5EC11E;stroke:#5EC11E;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st10{fill:#E3FAFF;stroke:#E3FAFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st11{fill:#FF5093;stroke:#FF5093;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st12{fill:#B7257F;stroke:#B7257F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st13{fill:#5189E5;stroke:#5189E5;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st14{fill:#6EBAFF;stroke:#6EBAFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st15{fill:#EDD977;stroke:#EDD977;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st16{fill:#8C43FF;stroke:#8C43FF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st17{fill:#5252BA;stroke:#5252BA;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st18{fill:none;stroke:#E3FAFF;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st19{fill:#354C75;stroke:#354C75;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}</style>
                                        <path class="st4"
                                            d="M24,28H6c-1.1,0-2-0.9-2-2v0c0-3.9,3.1-7,7-7h8c3.9,0,7,3.1,7,7v0C26,27.1,25.1,28,24,28z">
                                        </path>
                                        <circle class="st14" cx="15" cy="9" r="6"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="px12 muted-color mt3">Thông tin cá nhân</div>
                        </item>
                        <item class="icon-but-rewards" href="javascript:;"
                            onclick="window.location.replace('rewards');">
                            <div class="em16">
                                <svg class="icon" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M884.4 389v101.6c0 16-13 29-29 29H570.2V360h285.1c16.1 0 29.1 13 29.1 29z"
                                            fill="#FE97AC"></path>
                                        <path
                                            d="M793.6 731.9l-9 8.7 2.2 12.2-11-5.9-11 5.9 2.2-12.2-9-8.7 12.4-1.8 5.4-11.1 5.5 11.1z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M578.2 756.8l15.1 14.7-3.6 20.8 18.7-9.8 18.7 9.8-3.5-20.8 15.1-14.7-20.9-3-9.4-18.9-9.3 18.9-20.9 3z m151.5 130l-3.6-20.8 15.1-14.7-20.9-3-9.3-18.9-9.4 18.9-20.9 3 15.1 14.7-3.5 20.8 18.7-9.9 18.7 9.9z m26.7-345.9l-9.3 18.9-20.9 3 15.1 14.7-3.6 20.8 18.7-9.9 18.7 9.9-3.5-20.8 15.1-14.7-20.9-3-9.4-18.9zM806 727.8l-20.9-3-9.3-18.9-9.3 18.9-20.9 3 15.1 14.7-3.6 20.8 18.7-9.8 18.7 9.8-3.6-20.8 15.1-14.7zM570.2 531.3h260v345.5c0 16-13 29-29 29h-231V531.3z m110.9 136.8l15.2-14.7-20.9-3-9.4-18.9-9.3 18.9-20.9 3 15.1 14.7-3.6 20.8L666 679l18.7 9.9-3.6-20.8z"
                                            fill="#DC0C55"></path>
                                        <path
                                            d="M683 194.9c42.3 0 76.8 34.5 76.8 76.8 0 42.4-34.5 76.8-76.8 76.8H525.1l51.9-78.6c37.6-51.9 61.9-75 106-75z"
                                            fill="#FAF7A6"></path>
                                        <path
                                            d="M806 727.8l-15.1 14.7 3.6 20.8-18.7-9.8-18.7 9.8 3.6-20.8-15.1-14.7 20.9-3 9.3-18.9 9.3 18.9 20.9 3z m-21.4 12.8l8.9-8.7-12.3-1.7-5.5-11.1-5.5 11.1-12.3 1.7 8.9 8.7-2.2 12.2 11-5.8 11 5.8-2-12.2z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M751 565.1l5.4-11 5.6 11 12.2 1.9-8.8 8.5 2.1 12.2-11.1-5.7-10.9 5.7 2.1-12.2-8.9-8.5z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M771.6 577.6l3.5 20.8-18.7-9.9-18.7 9.9 3.6-20.8-15.1-14.7 20.9-3 9.3-18.9 9.4 18.9 20.9 3-15.1 14.7z m-15.2-23.5l-5.5 11-12.3 1.9 8.9 8.6-2.1 12.2 10.9-5.7 11 5.7-2.1-12.2 8.8-8.6-12.2-1.9-5.4-11z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M719.8 863.9l2.1 12.2-10.9-5.7-11 5.7 2.1-12.2-8.9-8.6 12.2-1.9 5.6-11.1 5.5 11.1 12.3 1.9z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M726.1 866l3.6 20.8-18.7-9.9-18.7 9.9 3.5-20.8-15.1-14.7 20.9-3 9.4-18.9 9.3 18.9 20.9 3-15.1 14.7z m-4.2 10.1l-2.1-12.2 8.9-8.6-12.3-1.9-5.5-11.1-5.6 11.1-12.2 1.9 8.8 8.6-2.1 12.2 11-5.7 11.1 5.7z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M674.9 666l2.1 12.3-11-5.8-11 5.8 2.1-12.3-8.9-8.6 12.3-1.8 5.5-11.1 5.4 11.1 12.3 1.8z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M666 631.4l9.4 18.9 20.9 3-15.2 14.7 3.6 20.8L666 679l-18.7 9.9 3.6-20.8-15.1-14.7 20.9-3 9.3-19z m11 46.9l-2.1-12.3 8.8-8.6-12.3-1.9-5.5-11-5.5 11-12.3 1.9 8.9 8.6-2.1 12.3 10.9-5.8 11.2 5.8z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M613.9 759.1l12.2 1.8-8.8 8.7 2.1 12.2-11-5.8-11 5.8 2.1-12.2-8.9-8.7 12.3-1.8 5.5-11.1z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M613.9 759.1l-5.6-11.1-5.5 11.1-12.3 1.7 8.9 8.7-2.1 12.2 10.9-5.8 11 5.8-2.1-12.2 8.8-8.7-12-1.7z m9.7 12.5l3.5 20.8-18.7-9.8-18.7 9.8 3.6-20.8-15.1-14.7 20.9-3 9.3-18.9 9.4 18.9 20.9 3-15.1 14.7z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M570.3 143.4c21.9 38.1 18.5 76.5-11.4 128.3l-45.8 67.7-77.7-115.3c-10.1-17.4-12.5-39.4-6.7-60.2 5.7-20.8 19.2-38.4 36.7-48.7 11.8-6.7 25-10.3 38.2-10.3 6.7 0 13.5 0.9 20.1 2.7 19.7 5.4 36.4 18.1 46.6 35.8zM558.5 591.3v314.5h-91.9V360H513l0.1 0.1 0.2-0.1h45.2V531.3zM451.4 269.6l52.1 78.8H345.6c-42.4 0-76.8-34.4-76.8-76.8 0-42.3 34.4-76.8 76.8-76.8 44 0.1 68.2 23.2 105.8 74.8z"
                                            fill="#FAF7A6"></path>
                                        <path d="M455 360v159.7H173.1c-16 0-29-13-29-29V389c0-16 13-29 29-29H455z"
                                            fill="#FE97AC"></path>
                                        <path
                                            d="M418 760.9l-8.8 8.7 2.1 12.2-11-5.8-11 5.8 2.1-12.2-8.9-8.7 12.3-1.8 5.5-11.1 5.5 11.1z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M409.7 753.8l20.9 3-15.1 14.7 3.5 20.8-18.7-9.8-18.7 9.8 3.6-20.8-15.1-14.7 20.9-3 9.3-18.9 9.4 18.9z m-0.5 15.8l8.8-8.7-12.2-1.7-5.6-11.1-5.5 11.1-12.3 1.7 8.9 8.7-2.1 12.2 10.9-5.8 11 5.8-1.9-12.2z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M351.6 666l2.1 12.3-10.9-5.8-11.1 5.8 2.1-12.3-8.8-8.6 12.2-1.8 5.6-11.1 5.4 11.1 12.2 1.8z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M352.1 650.3l20.9 3-15.1 14.7 3.5 20.8-18.6-9.9-18.7 9.9 3.5-20.8-15.1-14.7 20.9-3 9.4-18.9 9.3 18.9z m1.6 28l-2.1-12.3 8.8-8.6-12.2-1.9-5.5-11-5.6 11-12.2 1.9 8.8 8.6-2.1 12.3 11-5.8 11.1 5.8z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M315.5 855.3l-9 8.6 2.3 12.2-11.1-5.7-11 5.7 2.2-12.2-8.9-8.6 12.3-1.9 5.4-11.1 5.5 11.1z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M297.7 829.3l9.3 18.9 20.9 3-15.1 14.8 3.6 20.8-18.7-9.9-18.7 9.9 3.6-20.8-15.1-14.7 20.9-3 9.3-19z m5.5 24.1l-5.5-11.1-5.5 11.1-12.3 1.9 8.9 8.6-2.2 12.2 11-5.7 11 5.7-2.2-12.2 8.9-8.6-12.1-1.9z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M234.4 567l12.3-1.9 5.5-11 5.6 11L270 567l-8.9 8.5 2.1 12.2-11-5.7-10.9 5.7 2.1-12.2z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M246.7 565.1l-12.3 1.9 8.9 8.6-2.1 12.2 10.9-5.7 11 5.7-2.1-12.2 8.8-8.6-12.2-1.9-5.6-11-5.3 11z m-9.6 12.5L222 562.9l20.9-3 9.3-18.9 9.4 18.9 20.9 3-15.1 14.7 3.5 20.8-18.7-9.9-18.7 9.9 3.6-20.8z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M232.9 746.9l-11 5.9 2.1-12.2-8.8-8.7 12.2-1.8 5.5-11.1 5.5 11.1 12.3 1.8-8.9 8.7 2 12.2z"
                                            fill="#EBBE3E"></path>
                                        <path
                                            d="M316.4 886.8l-3.6-20.8 15.1-14.7-20.9-3-9.3-18.9-9.3 18.9-20.9 3 15.1 14.7-3.6 20.8 18.7-9.9 18.7 9.9z m7.7-197.9l18.7-9.9 18.6 9.9-3.5-20.8 15.1-14.7-20.9-3-9.3-18.9-9.4 18.9-20.9 3 15.1 14.7-3.5 20.8z m106.5 67.9l-20.9-3-9.4-18.9-9.3 18.9-20.9 3 15.1 14.7-3.6 20.8 18.7-9.8 18.7 9.8-3.5-20.8 15.1-14.7z m-232.3 120V531.3H455v374.5H227.4c-16.1 0-29.1-13-29.1-29z m15.9-113.5l18.7-9.8 18.7 9.8-3.6-20.8 15.1-14.7-20.9-3-9.3-18.9-9.4 18.9-20.9 3 15.1 14.7-3.5 20.8z m19.3-164.9l18.7-9.9 18.7 9.9-3.5-20.8 15.1-14.7-20.9-3-9.4-18.9-9.3 18.9-20.9 3 15.1 14.7-3.6 20.8z"
                                            fill="#DC0C55"></path>
                                        <path
                                            d="M238.4 730.1l-5.5-11.1-5.6 11.1-12.2 1.7 8.8 8.7-2.1 12.2 11-5.8 10.9 5.8-2.1-12.2 8.9-8.7-12.1-1.7z m-14.9-5.3l9.4-18.9 9.3 18.9 20.9 3-15.1 14.7 3.6 20.8-18.7-9.8-18.7 9.8 3.5-20.8-15.1-14.7 20.9-3z"
                                            fill="#EF4668"></path>
                                        <path
                                            d="M345.6 348.4h157.9l-52.1-78.8c-37.5-51.6-61.8-74.7-105.8-74.7-42.4 0-76.8 34.5-76.8 76.8s34.4 76.7 76.8 76.7z m213.3-76.6c29.8-51.8 33.3-90.2 11.4-128.3-10.2-17.8-26.8-30.4-46.6-35.8-6.6-1.7-13.4-2.7-20.1-2.7-13.2 0-26.4 3.6-38.2 10.3-17.5 10.2-31 27.9-36.7 48.7-5.8 20.8-3.4 42.7 6.7 60.2l77.7 115.3 45.8-67.7z m-0.4 259.5V360h-45.2l-0.1 0.1-0.2-0.1h-46.4v545.8h92V531.3zM198.3 876.8c0 16 13 29 29 29H455V531.3H198.3v345.5z m-25.2-357.1H455V360H173.1c-16 0-29 13-29 29v101.6c0 16.1 13 29.1 29 29.1zM683 348.4c42.3 0 76.8-34.4 76.8-76.8 0-42.3-34.5-76.8-76.8-76.8-44.1 0-68.4 23.1-106 74.9l-51.9 78.6H683z m118.1 557.4c16 0 29-13 29-29V531.3h-260v374.5h231z m40.7-374.5v345.5c0 22.4-18.2 40.6-40.6 40.6H227.4c-22.4 0-40.6-18.2-40.6-40.6V531.3h-13.6c-22.4 0-40.6-18.2-40.6-40.6V389c0-22.4 18.2-40.6 40.6-40.6H302c-26.7-15.2-44.7-43.9-44.7-76.8 0-48.7 39.6-88.4 88.4-88.4 29.7 0 51.1 9.1 72.1 28.5-4.8-16.1-4.9-33.9-0.2-50.9 6.6-23.7 21.9-43.9 42.2-55.5 20.4-11.8 44.2-15 67-8.8 22.9 6 41.9 20.7 53.7 41.1 17.7 30.5 20.3 62 7.9 98.5 29.7-36.3 54.6-52.8 94.9-52.8 48.7 0 88.4 39.7 88.4 88.4 0 32.9-18.1 61.5-44.8 76.8h128.8c22.4 0 40.6 18.2 40.6 40.6v101.6c0 22.4-18.2 40.6-40.6 40.6h-13.9z m13.6-11.6c16 0 29-13 29-29V389c0-16-13-29-29-29H570.2v159.7h285.2z"
                                            fill="#EF4668"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="px12 muted-color mt3">Phần thưởng</div>
                        </item>
                        <item class="icon-but-account" href="javascript:;"
                            onclick="window.location.replace('security');">
                            <div class="em16">
                                <svg class="icon" version="1.1" baseProfile="tiny" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 24 24" overflow="visible" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g transform="translate(4.000000, 1.000000)">
                                                <path fill="#85A4E6"
                                                    d="M8,0l-9,4v6c0,5.6,3.8,10.7,9,12c5.2-1.3,9-6.4,9-12V4L8,0z M8,11h7c-0.5,4.1-3.3,7.8-7,8.9V11l-7,0V5.3 l7-3.1V11z">
                                                </path>
                                                <path fill="#5C85DE"
                                                    d="M8,0v22c5.2-1.3,9-6.4,9-12V4L8,0z M15,11c-0.5,4.1-3.3,7.8-7,8.9V11L15,11z">
                                                </path>
                                                <path fill-rule="evenodd" fill="#3367D6"
                                                    d="M17,11h-2c0,0,0,0.3-0.1,0.6L17,11z"></path>
                                                <polygon fill-rule="evenodd" fill="#3367D6" points="-1,11 1,11 1,10.4 ">
                                                </polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="px12 muted-color mt3">Cào đặt bảo mật</div>
                        </item>
                        <item class="icon-but-msg" data-target='#user-tab-msg' href="javascript:void(0)"
                            onclick="window.location.replace('/message/');">
                            <div class="em16">
                                <svg class="icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58 58" xml:space="preserve"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path style="fill:#26B99A;"
                                                d="M53,3.293H5c-2.722,0-5,2.278-5,5v33c0,2.722,2.278,5,5,5h27.681l-4.439-5.161 c-0.36-0.418-0.313-1.05,0.106-1.41c0.419-0.36,1.051-0.312,1.411,0.106l4.998,5.811L43,54.707v-8.414h2h6h2c2.722,0,5-2.278,5-5 v-33C58,5.571,55.722,3.293,53,3.293z">
                                            </path>
                                            <circle style="fill:#FFFFFF;" cx="15" cy="24.799" r="3"></circle>
                                            <circle style="fill:#FFFFFF;" cx="29" cy="24.799" r="3"></circle>
                                            <circle style="fill:#FFFFFF;" cx="43" cy="24.799" r="3"></circle>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="px12 muted-color mt3">Tin nhắn riêng</div>
                        </item>
                    </div>
                </div>
                <div class="sidebar-user"></div>
            </div>
            <?php
            $parsed_url = parse_url($current_url);
            $class??="";
            if (isMobile()) {
                if (
                    !isset($parsed_url["path"]) ||
                    (isset($parsed_url["path"]) &&
                        strpos($parsed_url["path"], "/user/") === false)
                ) {
                    $class = "hide";
                } else {
                    $path_elements = explode("/", $parsed_url["path"]);
                    $last_element_index = count($path_elements) - 1;
                    $last_element = $path_elements[$last_element_index];
                    if (!empty($last_element)) {$class = "show";} else {$class = "hide";}
                }
            } else {
                $class = "show";
            }
            ?>
            <div class="user-center-content col-sm-9 drawer-sm right <?=$class?>" on-start="<?=$on_start;?>">
                <div class="tab-content main-tab-content">
                    <?php function TDShowLayOut_User($current_url) {
                 $VUONG = [
                 '/balance' => '/layout/Client/user/balance.php',
                 '/account' => '/layout/Client/user/account.php',
                 '/history-order' => '/layout/Client/user/history-order.php',
                 '/level' => '/layout/Client/user/level.php',
                 '/plans' => '/layout/Client/user/plans.php',
                 '/security' => '/layout/Client/user/security.php',
                 '/verify' => '/layout/Client/user/verify.php',
                 ];
                foreach ($VUONG as $THANH => $DIEU) {
                if (strpos($current_url, $THANH) !== false) {
                return  $DIEU;
            }
        }
        return isMobile() ? 'index.php' : '/layout/Client/user/plans.php';
    }
     $DIEU = TDShowLayOut_User($current_url); /** Author -> WWW.ThanhDieu.Com */
     include_once $_SERVER['DOCUMENT_ROOT'].$DIEU;?>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<?php
$Slug = false;
foreach (['/balance', '/account', '/history-order','/level','/plans','/security','/verify'] as $slugs) {
    if (strpos($current_url, '/user' . $slugs) !== false) {
        $Slug = true;
        break;
    }
}
if (isMobile() && $Slug):?>
<div class="drawer-header flex ac">
    <div class="drawer-close">
        <i class="fa fa-angle-left em12"></i>
    </div>
    <div class="drawer-title">
        <?php
    $drawer = [
    '/user/balance' => 'Số Dư Tài Khoản',
    '/user/account' => 'Thông Tin Cá Nhân',
    '/user/history-order' => 'Lịch Sử Mua Hàng',
    '/user/level' => 'Cấp Độ Tài Khoản',
    '/user/plans' => 'Các Gói Đăng Ký',
    '/user/security' => 'Bảo Mật Tài Khoản',
    '/user/verify' => 'Chứng Nhận Xác Minh',
    ];
    foreach ($drawer as $slug => $title) {
    if (strpos($current_url,$slug)!==false) {
        echo $title;
        break;
        }
    }
    ?>
    </div>
</div>
<?php endif; ?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>