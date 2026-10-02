<ul class="sub-menu">
    <div class="padding-10">
        <div class="sub-user-box">
            <div class="user-info flex ac relative">
                <a href="/user/">
                    <span class="avatar-img">
                        <img alt="<?=THANHDIEU($user['hovaten'])?>"
                            src="/<?= __IMG__ . '/users/' . THANHDIEU($user['avatar'])?>"
                            class="avatar avatar-id-<?=$user['user_id']?> lazyload">
                        <?=ShowPlans::TD($user['username']);?>
                    </span>
                </a>
                <div class="user-right flex flex1 ac jsb ml10">
                    <div class="flex1" style="max-width: calc(100% - 40px);">
                        <b>
                            <name class="flex ac flex1">
                                <a class="display-name text-ellipsis "
                                    href="/user/"><?= THANHDIEU($user['username'])?></a>
                                <?=WSInfoProfileShow::TD($user);?>
                            </name>
                        </b>
                        <div class="px12 muted-2-color text-ellipsis"><?= THANHDIEU($user['tieusu'])?></div>
                    </div>
                </div>
                <a href="/message/" class="msg-news-icon abs-right">
                    <span class="toggle-radius msg-icon">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                    </span>
                    <badge class="top" msg-cat="all"><?=$totals->NotifySystem()?></badge>
                </a>
            </div>
            <div class="mt10 em09">
                <a class="pay-vip but radius4 payvip-icon btn-block" href="/user/plans?action=null">
                    <?php if (isset($user) && $plans->TD('tengoi', $user['username'])):?>
                    <img class="img-icon em12 mr3 lazyload" src="/<?=$images_plans?>" data-src="/<?=$images_plans?>"
                        title="thành viên vàng" alt="<?=$title_plans?>">
                    <span><?=$title_plans?>
                    </span>
                    <span
                        class="ml10 badg <?=($plans->TD('tengoi',$user['username']) === 'legacy') ? 'jb-yellow' : 'b-blue-2'?> vip-expdate-tag">
                        <i
                            class="ri-time-line mr3"></i><?= (date('Y', strtotime($plans->TD('ngayhethan', $user['username']))) > 2100) ? 'Vô hạn thời gian' : date('\N\g\à\y j \t\h\á\n\g n \nă\m Y', strtotime($plans->TD('ngayhethan', $user['username'])))?>
                    </span>
                    <?php else: ?>
                    <i class="em12 mr6 ri-vip-crown-2-line"></i>
                    Nâng cấp lên thành viên vip<i class="fa fa-chevron-circle-right abs-right"></i>
                    <?php endif;?>
                </a>
            </div>
            <div class="mt6 em09">
                <?php if (mysqli_num_rows(mysqli_query($thanhdieudb, "SELECT * FROM ws_diemdanh WHERE taikhoan='$taikhoan' AND DATE(thoigian) = '" . date('Y-m-d') . "'")) > 0) {?>
                <a class="but block c-yellow">
                    <i class="fa fa-calendar-check-o"></i> Đã điểm danh hôm nay
                </a>
                <?php } else {?>
                <a class="but block c-yellow diem-danh" data="diemdanh" href="javascript:;">
                    <i class="fa fa-calendar-check-o"></i> Nhấn để điểm danh hôm nay </a>
                <?php }?>
            </div>
            <div class="mt6">
                <div class="flex ab jsb col-ml6">
                    <a style="flex: 1;" class="muted-box padding-6 flex1" href="/user/?tab=balance">
                        <div class="muted-2-color px12">Số Dư <i class="ml6 fa fa-angle-right em12"></i>
                        </div>
                        <div class="flex jsb">
                            <span class="font-bold c-blue-2"><?=FormatNumber::TD(THANHDIEU($user['sodu']))?>đ</span>
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
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
                    </a>
                    <a class="muted-box padding-6 flex1" href="/user/?tab=balance">
                        <div class="muted-2-color px12">Điểm Ruby <i class="ml6 fa fa-angle-right em12"></i>
                        </div>
                        <div class="flex jsb">
                            <span class="font-bold c-yellow"><?= FormatNumber::TD(THANHDIEU($user['ruby']))?></span>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001"
                                xml:space="preserve" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
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
                    </a>
                </div>
            </div>
            <div class="em09 author-tag mb10 mt6 flex jc">
                <a class="but c-blue-2 tag-forum-post" data-toggle="tooltip" title=""
                    href="/profile/@<?=THANHDIEU($user['username'])?>?ws_tab=post"
                    data-original-title="Tổng cộng <?=$UserStats->Post(THANHDIEU($user['username']),1)?> bài viết">
                    <i class="ri-edit-line"></i> <?=$UserStats->Post(THANHDIEU($user['username']),1)?> </a>
                <a class="but c-green tag-comment" data-toggle="tooltip" title=""
                    href="/profile/@<?=THANHDIEU($user['username'])?>?ws_tab=comment"
                    data-original-title="Tổng cộng <?=$UserStats->Comment(THANHDIEU($user['username']))?> bình luận">
                    <i class="ri-message-3-line"></i> <?=$UserStats->Comment(THANHDIEU($user['username']))?> </a>
                <span class="badg c-red tag-view" data-toggle="tooltip" title=""
                    data-original-title="Điểm độ hot <?=CountFormatter::WS($user['dohot'])?>">
                    <i class="ri-fire-line"></i> <?=CountFormatter::WS($user['dohot'])?> </span>
            </div>
            <div class="relative opacity5">
                <i class="line-form-line"></i>
            </div>
            <div class="mt10 text-center">
                <div class="flex jsa header-user-href">
                    <a href="/user/">
                        <div class="badg mb6 toggle-radius c-blue">
                            <i class="ri-user-shared-line"></i>
                        </div>
                        <div class="c-blue">Trang Cá Nhân</div>
                    </a>
                    <?php if(UserSession::CheckAdmin($user)): ?>
                    <a class="newadd-btns start-page-admin btn-newadd" target="_blank" href="/admin/dashboard">
                        <div class="badg mb6 toggle-radius c-green"><i class="fa fa-fw fa-cogs"></i></div>
                        <div class="c-green">Trang Quản Trị</div>
                    </a>
                    <?php else: ?>
                    <a class="newadd-btns start-new-posts btn-newadd" href="#">
                        <div class="badg mb6 toggle-radius c-green"><i class="fa fa-fw fa-pencil-square-o"></i></div>
                        <div class="c-green">Đăng Sản Phẩm</div>
                    </a>
                    <?php endif; ?>
                    <a href="javascript:;" class="modal_signout">
                        <div class="badg mb6 toggle-radius c-red">
                            <i class="ri-logout-circle-r-line"></i>
                        </div>
                        <div class="c-red">Đăng Xuất</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</ul>