<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Nhật Ký Hoạt Động</h4>
                                            <div class="nk-block-des">
                                                <p>Đây là lịch sử 20 hoạt động gần đây nhất của bạn. <span
                                                        class="text-soft">
                                                        <em class="icon ni ni-info"></em>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside">
                                                <em class="icon ni ni-menu-alt-r"></em>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block card card-bordered">
                                    <table class="table table-ulogs">
                                        <thead class="table-light">
                                            <?php if(($VTD=$thanhdieudb->query("SELECT * FROM ws_logs WHERE username='{$user['username']}' ORDER BY time DESC LIMIT 20")) && $VTD->num_rows>0){$stt=$VTD->num_rows;?>
                                            <tr>
                                                <th class="tb-col-os">
                                                    <span class="overline-title">STT</span>
                                                </th>
                                                <th class="tb-col-ip">
                                                    <span class="overline-title">NỘI DUNG</span>
                                                </th>
                                                <th class="tb-col-time">
                                                    <span class="overline-title">THỜI GIAN</span>
                                                </th>
                                                <th class="tb-col-action d-none d-md-block">
                                                    <span class="overline-title">HOẠT ĐỘNG</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($logs=$VTD->fetch_assoc()){?>
                                            <tr>
                                                <td class="tb-col-os"><?=$stt--;?>
                                                </td>
                                                <td class="tb-col-ip">
                                                    <span class="sub-text"><?=($logs['content']);?></span>
                                                </td>
                                                <td class="tb-col-time">
                                                    <span class="sub-text"><?=THANHDIEU($logs['time']);?></span>
                                                </td>
                                                <td class="tb-col-action d-none d-md-block">
                                                    <?=THANHDIEU($logs['action']);?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <?php } else {?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center p-2" colspan="4">Chưa có dữ liệu</td>
                                            </tr>
                                        </tbody>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg"
                                data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                                data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <div class="card-inner">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-primary">
                                                                    <img class="ws-avatar-1" src="/<?=__IMG__?>/users/<?=THANHDIEU($user['avatar']);?>"
                                                                        alt="<?=THANHDIEU($user['hovaten']);?>">
                                                                </div>
                                                                <div class="user-info">
                                                                    <span
                                                                        class="lead-text"><?=THANHDIEU($user['hovaten']);?></span>
                                                                    <span
                                                                        class="sub-text"><?=THANHDIEU($user['email']??'Chưa xác minh');?></span>
                                                                </div>
                                                                <div class="user-action">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-icon btn-trigger me-n2"
                                                                            data-bs-toggle="dropdown" href="#">
                                                                            <em class="icon ni ni-more-v"></em>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a href="#" data-bs-toggle="modal"
                                                                                        data-bs-target="#change-avatar">
                                                                                        <em
                                                                                            class="icon ni ni-camera-fill"></em>
                                                                                        <span>Thay Avatar</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <em
                                                                                            class="icon ni ni-edit-fill"></em>
                                                                                        <span>Thay Thông Tin</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="user-account-info py-0">
                                                                <h6 class="overline-title-alt">SỐ DƯ KHẢ DỤNG</h6>
                                                                <div class="user-balance">
                                                                    <?=FormatNumber::TD($user['sodu'])?> <small
                                                                        class="currency currency-btc">VNĐ</small>
                                                                </div>
                                                                <div class="user-balance-sub">Ruby
                                                                    <span><?=FormatNumber::TD($user['ruby'])?>
                                                                        <span class="currency currency-btc">điểm</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-inner p-0">
                                                            <ul class="link-list-menu">
                                                                <li>
                                                                    <a class="active" href="logs">
                                                                        <em class="icon ni ni-activity-round-fill"></em>
                                                                        <span>Nhật Ký Hoạt Động</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width:auto;height:504px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility:hidden;">
                                        <div class="simplebar-scrollbar" style="width:0px;display:none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility:hidden;">
                                        <div class="simplebar-scrollbar" style="height:0px;display:none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="change-avatar" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="change-avatar" enctype="multipart/form-data">
                <div class="modal-body modal-body-md">
                    <div id="custom-dropzone" class="dropzone">
                        <div class="td-message"><small class="text-warning fw-bold">Chọn ảnh làm ảnh đại diện, hỗ trợ
                                định dạng png, jpg, gif, tối đa 2MB.</small><br><br>Kéo và thả ảnh hoặc click để tải ảnh
                            lên
                        </div>
                        <div id="image-preview"></div>
                        <input type="file" id="td-uploads" name="file[]"
                            accept="image/gif,image/jpeg,image/jpg,image/png,image/webp">
                        <input type="hidden" name="action" value="admin_change_avatar">
                        <button type="button" id="select-image" class="btn btn-primary mt-2"><em
                                class="icon ni ni-upload-cloud"></em>&nbsp;Chọn Ảnh</button>&ensp;
                        <button type="submit" class="btn btn-primary mt-2"><em
                                class="icon ni ni-check-circle-fill"></em>&nbsp;Xác Nhận</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php require_once('partials/foot.php'); ?>