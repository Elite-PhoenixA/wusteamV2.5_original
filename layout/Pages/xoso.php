<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php $options_header = ['title' => "Vòng Quay May Mắn | " . $TD->Setting('name-site'), 'description' => 'Trang thử độ may mắn thông qua vòng quay xổ số',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<main class="container">
    <div class="content-wrap">
        <div class="content-layout xy-article">
            <div class="row gutters-10 userjf">
                <div class="zib-widget relative" style="padding-left: 24px;">
                    <div class="flex jsb po-re">
                        <div class="mb6">
                            <svg class="mr6 em12" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#FFDC64;"
                                        d="M317.793,61.793v-35.31c0-4.875-3.953-8.828-8.828-8.828H44.138c-4.875,0-8.828,3.953-8.828,8.828 v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828C3.953,70.621,0,74.573,0,79.448v35.31c0,4.875,3.953,8.828,8.828,8.828h17.655 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828h35.31c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h17.655c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h35.31 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h264.828c4.875,0,8.828-3.953,8.828-8.828V238.345 c0-4.875-3.953-8.828-8.828-8.828h-35.31c4.875,0,8.828-3.953,8.828-8.828v-35.31c0-4.875-3.953-8.828-8.828-8.828h17.655 c4.875,0,8.828-3.953,8.828-8.828v-35.31c0-4.875-3.953-8.828-8.828-8.828h-17.655c4.875,0,8.828-3.953,8.828-8.828v-35.31 c0-4.875-3.953-8.828-8.828-8.828h35.31C313.841,70.621,317.793,66.668,317.793,61.793z">
                                    </path>
                                    <path style="fill:#FFC850;"
                                        d="M308.966,229.517h-35.31c4.875,0,8.828-3.953,8.828-8.828v-10.007 c-47.63,29.588-79.448,82.225-79.448,142.421c0,59.384,30.946,111.437,77.506,141.241h28.425c4.875,0,8.828-3.953,8.828-8.828 V238.345C317.793,233.47,313.841,229.517,308.966,229.517z">
                                    </path>
                                    <g>
                                        <path style="fill:#FFF082;"
                                            d="M264.828,176.552h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C273.655,172.599,269.703,176.552,264.828,176.552z">
                                        </path>
                                        <path style="fill:#FFF082;"
                                            d="M247.172,123.586h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C256,119.634,252.047,123.586,247.172,123.586z">
                                        </path>
                                        <path style="fill:#FFF082;"
                                            d="M247.172,229.517h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C256,225.565,252.047,229.517,247.172,229.517z">
                                        </path>
                                    </g>
                                    <circle style="fill:#FFDC64;" cx="370.759" cy="353.103" r="141.241"></circle>
                                    <circle style="fill:#FFC850;" cx="370.759" cy="353.103" r="123.586"></circle>
                                    <circle style="fill:#FFF082;" cx="370.759" cy="353.103" r="105.931"></circle>
                                    <path style="fill:#E1A546;"
                                        d="M379.586,346.661v-36.728c10.489,2.207,17.655,8.015,17.655,13.377c0,4.879,3.948,8.828,8.828,8.828 c4.879,0,8.828-3.948,8.828-8.828c0-15.741-14.931-28.483-35.31-31.373v-0.627c0-4.879-3.948-8.828-8.828-8.828 c-4.879,0-8.828,3.948-8.828,8.828v0.627c-20.378,2.891-35.31,15.633-35.31,31.373c0,22.251,19.388,30.948,35.31,36.235v36.727 c-10.49-2.207-17.655-8.015-17.655-13.376c0-4.879-3.948-8.828-8.828-8.828s-8.828,3.948-8.828,8.828 c0,15.741,14.932,28.483,35.31,31.373v0.627c0,4.879,3.948,8.828,8.828,8.828c4.879,0,8.828-3.948,8.828-8.828v-0.627 c20.38-2.891,35.31-15.633,35.31-31.373C414.897,360.646,395.509,351.948,379.586,346.661z M344.276,323.31 c0-5.361,7.165-11.169,17.655-13.376v30.751C348.78,335.538,344.276,330.831,344.276,323.31z M379.586,396.274v-30.752 c13.151,5.148,17.655,9.854,17.655,17.375C397.241,388.258,390.076,394.066,379.586,396.274z">
                                    </path>
                                    <path style="fill:#FFC850;"
                                        d="M123.586,70.621h35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 H44.138c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828C3.953,70.621,0,74.573,0,79.448v35.31 c0,4.875,3.953,8.828,8.828,8.828h17.655c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h35.31c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h17.655 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828h35.31c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h114.759 c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h-35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31 c0-4.875,3.953-8.828,8.828-8.828h17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h-17.655 c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31 c0-4.875,3.953-8.828,8.828-8.828h-35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h17.655 c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31 C114.759,74.573,118.711,70.621,123.586,70.621z">
                                    </path>
                                    <path style="fill:#FFF082;"
                                        d="M282.483,70.621h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C291.31,66.668,287.358,70.621,282.483,70.621z">
                                    </path>
                                </g>
                            </svg>
                            Điểm Hiện Tại
                        </div>
                        <a data-class="modal-mini" class="muted-color px12 renwu-link" href="/user/">Trang cá nhân <i class="fa fa-angle-right em12 ml3"></i>
                        </a>
                    </div>
                    <div class="flex jsb ac po-re">
                        <div class="mb6 xy-black">
                            <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#FFDC64;"
                                        d="M317.793,61.793v-35.31c0-4.875-3.953-8.828-8.828-8.828H44.138c-4.875,0-8.828,3.953-8.828,8.828 v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828C3.953,70.621,0,74.573,0,79.448v35.31c0,4.875,3.953,8.828,8.828,8.828h17.655 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828h35.31c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h17.655c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h35.31 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h264.828c4.875,0,8.828-3.953,8.828-8.828V238.345 c0-4.875-3.953-8.828-8.828-8.828h-35.31c4.875,0,8.828-3.953,8.828-8.828v-35.31c0-4.875-3.953-8.828-8.828-8.828h17.655 c4.875,0,8.828-3.953,8.828-8.828v-35.31c0-4.875-3.953-8.828-8.828-8.828h-17.655c4.875,0,8.828-3.953,8.828-8.828v-35.31 c0-4.875-3.953-8.828-8.828-8.828h35.31C313.841,70.621,317.793,66.668,317.793,61.793z">
                                    </path>
                                    <path style="fill:#FFC850;"
                                        d="M308.966,229.517h-35.31c4.875,0,8.828-3.953,8.828-8.828v-10.007 c-47.63,29.588-79.448,82.225-79.448,142.421c0,59.384,30.946,111.437,77.506,141.241h28.425c4.875,0,8.828-3.953,8.828-8.828 V238.345C317.793,233.47,313.841,229.517,308.966,229.517z">
                                    </path>
                                    <g>
                                        <path style="fill:#FFF082;"
                                            d="M264.828,176.552h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C273.655,172.599,269.703,176.552,264.828,176.552z">
                                        </path>
                                        <path style="fill:#FFF082;"
                                            d="M247.172,123.586h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C256,119.634,252.047,123.586,247.172,123.586z">
                                        </path>
                                        <path style="fill:#FFF082;"
                                            d="M247.172,229.517h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C256,225.565,252.047,229.517,247.172,229.517z">
                                        </path>
                                    </g>
                                    <circle style="fill:#FFDC64;" cx="370.759" cy="353.103" r="141.241"></circle>
                                    <circle style="fill:#FFC850;" cx="370.759" cy="353.103" r="123.586"></circle>
                                    <circle style="fill:#FFF082;" cx="370.759" cy="353.103" r="105.931"></circle>
                                    <path style="fill:#E1A546;"
                                        d="M379.586,346.661v-36.728c10.489,2.207,17.655,8.015,17.655,13.377c0,4.879,3.948,8.828,8.828,8.828 c4.879,0,8.828-3.948,8.828-8.828c0-15.741-14.931-28.483-35.31-31.373v-0.627c0-4.879-3.948-8.828-8.828-8.828 c-4.879,0-8.828,3.948-8.828,8.828v0.627c-20.378,2.891-35.31,15.633-35.31,31.373c0,22.251,19.388,30.948,35.31,36.235v36.727 c-10.49-2.207-17.655-8.015-17.655-13.376c0-4.879-3.948-8.828-8.828-8.828s-8.828,3.948-8.828,8.828 c0,15.741,14.932,28.483,35.31,31.373v0.627c0,4.879,3.948,8.828,8.828,8.828c4.879,0,8.828-3.948,8.828-8.828v-0.627 c20.38-2.891,35.31-15.633,35.31-31.373C414.897,360.646,395.509,351.948,379.586,346.661z M344.276,323.31 c0-5.361,7.165-11.169,17.655-13.376v30.751C348.78,335.538,344.276,330.831,344.276,323.31z M379.586,396.274v-30.752 c13.151,5.148,17.655,9.854,17.655,17.375C397.241,388.258,390.076,394.066,379.586,396.274z">
                                    </path>
                                    <path style="fill:#FFC850;"
                                        d="M123.586,70.621h35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 H44.138c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828C3.953,70.621,0,74.573,0,79.448v35.31 c0,4.875,3.953,8.828,8.828,8.828h17.655c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h35.31c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h17.655 c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828H8.828c-4.875,0-8.828,3.953-8.828,8.828v35.31 c0,4.875,3.953,8.828,8.828,8.828h35.31c-4.875,0-8.828,3.953-8.828,8.828v35.31c0,4.875,3.953,8.828,8.828,8.828h114.759 c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h-35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31 c0-4.875,3.953-8.828,8.828-8.828h17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h-17.655 c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31 c0-4.875,3.953-8.828,8.828-8.828h-35.31c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h17.655 c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31 C114.759,74.573,118.711,70.621,123.586,70.621z">
                                    </path>
                                    <path style="fill:#FFF082;"
                                        d="M282.483,70.621h-17.655c-4.875,0-8.828-3.953-8.828-8.828v-35.31c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828v35.31C291.31,66.668,287.358,70.621,282.483,70.621z">
                                    </path>
                                </g>
                            </svg>
                            <span class="em3x font-bold ml6 user_jf"><?=$user['ruby'] ?? '0'?></span> Ruby
                        </div>
                        <div class="flex0">
                            <a class="mr5 but b-blue-2 buy-frequency" href="javascript:;">Mua Điểm</a>
                            <a class="points_exchange_link but b-red" href="javascript:;">Đổi Điểm</a>
                        </div>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="/<?=__CSS__?>/pule/animate.min.css">
            <link rel="stylesheet" href="/<?=__CSS__?>/pule/index.css">
            <link rel="stylesheet" href="/<?=__CSS__?>/pule/new-index.css">
            <div class="page_index gutters-10 zib-widget relative" style="margin-bottom: 10px;">
                <div class="text-center mt10 em12 usercs">
                    <badge class="img-badge left jb-red" style="cursor: pointer;font-size: 12px;">Còn lại: <span class="cjcs">0</span> lượt</badge>
                    <badge class="img-badge px12 follow-info" id="xoso" style="cursor: pointer;">
                        <i class="fa fa-refresh fa-spin mr3"></i> Reset 
                    </badge>
                    <span style="display: block;">Quay Tay Vận May Sẽ Đến</span>
                    <a class="but jb-blue px12 mt10 xoso-gailv-link" href="javascript:;">Xác suất chiến thắng</a>
                </div>
                <div class="mt20 mb10">
                    <div class="lottery_box">
                        <div class="list_box">
                            <div class="list list-0">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">Vĩnh Viễn</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/ws-ceo-vip.png">
                                        <div class="name" style="color:#e74435">VIP</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-1">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">30 Ngày</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/legacy.png">
                                        <div class="name" style="color:#e74435">Legacy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-2">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">Pro Max</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/ip15.png">
                                        <div class="name" style="color:#e74435">iPhone 15</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-3">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">Vĩnh Viễn</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/premium.png">
                                        <div class="name" style="color:#e74435">Premium</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-4">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">7 Ngày</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/legacy.png">
                                        <div class="name" style="color:#e74435">Legacy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-5">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">1 Ngày</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/premium.png">
                                        <div class="name" style="color:#e74435">Premium</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-6">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">3 Ngày</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/legacy.png">
                                        <div class="name" style="color:#e74435">Legacy</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list list-7">
                                <span class="xs_num jb-yellow" style="-this-bg:var(--theme-color)">Vĩnh Viễn</span>
                                <div class="list_ev">
                                    <div>
                                        <img src="/<?=__IMG__?>/icon/legacy.png">
                                        <div class="name" style="color:#e74435">Legacy</div>
                                    </div>
                                </div>
                            </div>
                            <button id="tupBtn" class="turnplatw_btn">
                                <b class="cj_btn_points" style="color:#f5ae0d;" data-toggle="tooltip"
                                    data-original-title="Cần 500 Ruby/ 1 lần quay">Quay</b>
                                <img src="/<?=__IMG__?>/icon/go.png" alt="Buttons of the turntable" class="img_wid">
                                <!--Nút xổ số-->
                            </button>
                        </div>
                        <img src="/<?=__IMG__?>/main/turntable.gif
                        " alt="turntable" class="img_wid">
                        <!--Vòng quay xổ số-->
                    </div>
                    <div class="fr right-box">
                        <div class="btns-box">
                            <a class="lott-record xy_btn"
                                href="javascript:;">Reward</a>
                            <a  class="lott-mygift xy_btn" href="javascript:;">History</a>
                        </div>
                        <div class="lott-rule">
                            <div class="tle-box">Luật chơi
                                <span class="design design-question">
                                    <div class="ques-drop">
                                        <b class="ques-b ml30">Quy tắc:</b>
                                        <div class="rules">
                                            <p>1. Giờ mở cửa: <?=FormatTime::TD($TD->Setting('deploy-date'))?> - tới nay
                                                丨 Thời gian: 8h - 24h</p>
                                            <p>2 Trong thời gian khai trương, mỗi người sử dụng <span
                                                    style="color:var(--theme-color)" data-toggle="tooltip"
                                                    data-origin-title="Thành viên được giảm giá"> 500 </span> Điểm có
                                                thể được sử dụng để xổ số. Điểm có thể nhận được thông qua điểm danh
                                                hàng ngày, nạp tiền v.v. </p>
                                            <p>3. Sau khi quay xổ số, bạn sẽ không được hoàn lại tiền; tất cả
                                                phần thưởng sẽ được gửi đến <a href="/message/system" target="_blank"
                                                    style="color:var (--theme-color)"> Thông báo hệ
                                                    thống.</a> Nếu bạn có bất kỳ câu hỏi nào, vui
                                                lòng liên hệ cho CSKH. </p>
                                            <p>4. Giải thưởng đều là vật phẩm ảo. Nếu có lỗi và không thể nhận phần
                                                thưởng một cách chính xác, bạn có thể mang ảnh chụp màn hình đến quản
                                                trị trang web (trừ trường hợp sửa đổi dữ liệu không đúng cách). </p>
                                            <p>5. Hãy nhớ tham gia nhóm để trao đổi và nhận thông báo mới nhất! </p>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="lott-else">
                                <div class="lotte-tle">Danh Sách Trúng Thưởng</div>
                                <div class="elseListbox">
                                    <ul class="else-list" style="margin-top:-19px;">
                                         <?php for ($i = 1; $i <= random_int(10,50); $i++): ?>
                                        <li class="else-item">
                                            <span class="fl user-box" style="font-weight:600;">
                                                <span class="img-box avatar-img comt-avatar">
                                                    <img alt="avatar"
                                                        src="https://i.imgur.com/318cdsd.png"
                                                        class="avatar avatar-50 avatar-id-<?=$i?>" height="50" width="50">
                                                </span>
                                                <span class="xxvip-name0">
                                                    <a class="display-name text-ellipsis"
                                                        href="#">Hệ Thống</a>
                                                </span>
                                            </span>
                                            <span class="tc gift-name c-cyan">iPhone 15 Pro Max</span>
                                            <span class="fr else-list-time"><?=date('H:i')?></span>
                                        </li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gutters-10 zib-widget cjfoot mt3">
                <div style="padding:0 .6rem;">
                    <h3>Luật chơi</h3>
                    <div class="rules">
                        <p>1. Giờ mở cửa: <?=FormatTime::TD($TD->Setting('deploy-date'))?> - tới nay 丨 Thời gian: 8h -
                            24h</p>
                        <p>2 Trong thời gian khai trương, mỗi người sử dụng <span style="color:var(--theme-color)"
                                data-toggle="tooltip" data-origin-title="Thành viên được giảm giá"> 500 </span> Điểm có
                            thể được sử dụng để xổ số. Điểm có thể nhận được thông qua điểm danh hàng ngày, nạp tiền
                            v.v. </p>
                        <p>3. Sau khi quay xổ số, bạn sẽ không được hoàn lại tiền; tất cả
                            phần thưởng sẽ được gửi đến <a href="/message/system" target="_blank"
                                style="color:var (--theme-color)"> Thông báo hệ
                                thống.</a> Nếu bạn có bất kỳ câu hỏi nào, vui
                            lòng liên hệ cho CSKH. </p>
                        <p>4. Giải thưởng đều là vật phẩm ảo. Nếu có lỗi và không thể nhận phần
                            thưởng một cách chính xác, bạn có thể mang ảnh chụp màn hình đến quản
                            trị trang web (trừ trường hợp sửa đổi dữ liệu không đúng cách). </p>
                        <p>5. Hãy nhớ tham gia nhóm để trao đổi và nhận thông báo mới nhất! </p>
                    </div>
                </div>
            </div>
            <!--Cửa sổ bật lên chiến thắng-->
            <div class="lottery-alert" style="display: none;align-items: center;">
                <div class="popup-image">
                    <!--Nội dung bật lên-->
                    <div class="popup-modal-mini" role="document">
                        <div class="popup-modal-content">
                            <div class="popup-modal-body">
                                <div class="mb20">
                                    <div
                                        style="width: 120px;height: 120px;margin: 0 auto;position: absolute;left: 0;right: 0;top: 110px;border-radius: 150px;border: 1px solid #ebf2ff;background: #fff;">
                                        <img src="/<?=__IMG__?>/icon/mail.png"
                                            id="jp_pic"
                                            style="width: 100px;display: inherit;margin: 15px auto;margin-bottom: 6px;">
                                    </div>
                                    <div
                                        style="text-align: center;font-size: 22px;background-image: linear-gradient(to right, rgba(244, 255, 250, 1.00), rgba(230, 238, 255, 0.78),rgba(255, 227, 234, 1.00));height: 150px;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                        <div style="color: #4e5358;position: relative;">
                                            <p style="padding-top: 25px;font-size: 25px;">Thông tin trúng thưởng</p>
                                            <p style="font-size: 14px;">
                                                <span id="xxhg_name">Chúc mừng bạn đã trúng xổ số</span>
                                                <span id="jp_name" style="color: #f00;margin: 0 0 4px;">xxxxxxx</span>
                                            </p>
                                        </div>
                                        <span
                                            style="-webkit-text-stroke: 1px #ffffff85;color: #fff0;font-size: 128px;white-space: nowrap;overflow: hidden;width: 100%;display: block;margin-top: -74px;user-select:none;">LUCK</span>
                                    </div>
                                    <div style="text-align:center;margin-top: 95px;" class="mt25">
                                        <p style="color: #f00;margin: 0 0 4px;">【 <span id="jp_name_2">xxxx</span>】 </p>
                                        <button class="mt25 but radius"
                                            style="background-image: linear-gradient(to right, rgb(168 197 255 / 70%),rgb(248 163 184 / 40%));padding: 10px 0;width: 60%;color: #fff;"
                                            id="tc_close">Đồng ý</button>
                                        <p style="font-size: 12px;color: var(--muted-2-color);margin-top: 8px;">
                                       xxxxx</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex jc loading-mask card-loading-mask absolute main-bg" style="display: none;">
                        <div class="em2x opacity5">
                            <i class="loading"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box" style="display: none;"></div>
            <div class="gutters-10 zib-widget ranking">
                <div class="collapsed tc em12 cp" href="#dstrungthuong" data-toggle="collapse"
                    aria-controls="collapseExample" aria-expanded="false">
                    <strong class="biaoti ">Đã Trúng Thưởng <i class="fa fa-angle-down ml6 xy-more-btn"></i>
                    </strong>
                </div>
                <div class="collapse" id="dstrungthuong" aria-expanded="false">
                    <ul class="list-inline scroll-x mini-scrollbar tab-nav-theme font-bold">
                        <li class="active">
                            <a data-toggle="tab" href="#record_tab_history" aria-expanded="true">Đã Trúng Thưởng</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#record_tab_user" aria-expanded="false">Hồ sơ cá nhân</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab-user">
                        <div class="tab-pane fade tab-content active in" id="record_tab_history">
                            <div class="mt10 mb10">
                                <a class="but mr6" data-toggle="tab" href="#tab_points_record">Xổ số điểm</a>
                                <a class="but" data-toggle="tab" href="#tab_balance_record">Rút số dư</a>
                            </div>
                            <div class="tab-pane fade active in" id="tab_points_record">
                            <?php for ($i = 1; $i <= random_int(3,6); $i++): ?>
                                <div class="border-bottom padding-h10 flex jsb">
                                    <span class="avatar-img">
                                        <img alt="avatar"
                                            src="https://i.imgur.com/uVv0vLR.png"
                                            class="avatar avatar-50 avatar-id-<?=$i?>" height="50" width="50">
                                    </span>
                                    <div class="posts-mini-con em09 ml10 flex xx jsb">
                                        <span class="flex1 flex">
                                            <name class="mr6">
                                                <a class="display-name text-ellipsis "
                                                    href="#">Hệ Thống</a>
                                            </name>
                                        </span>
                                        <div class="mb6">
                                            <div class="em09"><?=date('H:i')?></div>
                                        </div>
                                    </div>
                                    <div class="flex jsb xx text-right flex0 ml10">
                                        <div class="felx0 flex xx jsb">
                                            <div class="c-green">
                                                <span class="em09">Chiến thắng</span>
                                            </div>
                                            <div class="text-right">
                                                <span class="em09 muted-2-color">iPhone 15 Pro Max</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endfor;?>

                            </div>
                            <div class="tab-pane fade" id="tab_balance_record">
                                <div class="text-center">
                                    <img style="width:280px;opacity: .7;"
                                        src="/<?=__IMG__?>/svg/null.svg">
                                        <p class="em09 muted-3-color separator">Chưa có giao dịch nào</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="record_tab_user">
                            <div class="text-center">
                            <img style="width:280px;opacity: .7;"
                                        src="/<?=__IMG__?>/svg/null.svg">
                                <p class="em09 muted-3-color separator">Chưa có giao dịch nào</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>

                