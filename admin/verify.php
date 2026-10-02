<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Duyệt Phiếu Xác Minh</h3>
                            <div class="nk-block-des text-soft">
                                <p>Bạn có thể xác minh tài khoản của tất cả người dùng tại đây.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner-group">
                            <div class="dt-bootstrap4 no-footer">
                                <div class="datatable-wrap p-4">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist no-footer">
                                        <?php
                                class Verify extends DatabaseConnection 
                                {
                                    public function Verify() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(), "
                                        SELECT 
                                        v.*, 
                                        u.avatar,
                                        u.hovaten
                                    FROM 
                                        ws_verification v
                                    JOIN 
                                        users u ON v.username = u.username;                                  
                                    ");
                                    
                                        if ($oOo) {?>
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head text-nowrap">
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">STT</span>
                                                </th>
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">Người Dùng</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Lý Do Xác Minh</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Thời Gian Yêu Cầu</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Thời Gian Chấp Nhận</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Trạng Thái</span>
                                                </th>
                                                <th class="nk-tb-col text-end sorting">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($verify = mysqli_fetch_assoc($oOo)) { ?>
                                            <tr class="nk-tb-item odd">
                                                <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <?=$verify['verify_id']?></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                            <img class="ws-avatar-1"
                                                                src="/<?= __IMG__.'/users'.'/'.$verify['avatar'];?>"
                                                                alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$verify['username']?>" target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($verify['hovaten']) ?></a>
                                                            <span class="tb-col-md">@<?= $verify['username'] ?></span>

                                                            <?php if($verify['status']==='approved'):?>
                                                            <span
                                                                class="badge badge-dim rounded-pill bg-outline-success d-md-none">Đã
                                                                Chấp Nhận</span>
                                                            <?php elseif($verify['status']==='rejected'): ?>
                                                            <span
                                                                class="badge badge-dim rounded-pill bg-outline-danger d-md-none">Đã
                                                                Từ
                                                                Chối</span>
                                                            <?php else:?>
                                                            <span
                                                                class="badge badge-dim rounded-pill bg-outline-warning d-md-none">Chờ
                                                                Xử
                                                                Lý</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"><?=$verify['reason_desc']?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span
                                                        class="fs-12px"><?=FormatTime::TD($verify["created_at"])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span
                                                        class="fs-12px"><?= (strtotime($verify["time_approved"]) === false || $verify["time_approved"] == "0000-00-00 00:00:00") ? "xx:xx xx:xx:xxxx" : FormatTime::TD($verify["time_approved"])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md text-nowrap">
                                                    <?php if($verify['status']=='approved'):?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-success">Đã
                                                        Chấp Nhận</span>
                                                    <?php elseif($verify['status']=='rejected'): ?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-danger">Đã Từ
                                                        Chối</span>
                                                    <?php else:?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-warning">Chờ Xử
                                                        Lý</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools text-nowrap">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <a href="javascript:;" data-id="<?=$verify['verify_id']?>"
                                                                data-action="accept" data-bs-toggle="tooltip"
                                                                title="Chấp nhận xác minh" class="verify-action btn-icon btn-sm btn btn-dim btn-round btn-outline-primary
                                                            <?= $verify['status'] == 'approved' || $verify['status'] == 'rejected' ? 'disabled' : '' ?>">
                                                                <em class="icon ni ni-check-circle-fill"></em>
                                                            </a>
                                                            &nbsp;
                                                            <a href="javascript:;" data-id="<?=$verify['verify_id']?>"
                                                                data-action="reject" data-bs-toggle="tooltip"
                                                                title="Từ chối xác minh" class="verify-action btn-icon btn-sm btn btn-dim btn-round btn-outline-danger
                                                      <?= $verify['status'] == 'approved' || $verify['status'] == 'rejected' ? 'disabled' : '' ?>">
                                                                <em class="icon ni ni-cross-circle"></em>
                                                            </a>
                                                            &nbsp;
                                                            <a href="javascript:;" data-id="<?=$verify['verify_id']?>"
                                                                data-action="delete" data-bs-toggle="tooltip"
                                                                title="Xoá yêu cầu xác minh"
                                                                class="verify-action btn-icon btn-sm btn btn-dim btn-round btn-outline-warning">
                                                                <em class="icon ni ni-trash"></em>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>

                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <?php } else { ?>
                                        <tr>
                                            <td colspan="8">Chưa có dữ liệu.</td>
                                        </tr>
                                        <?php }
                                         }
                                        }
                                        (new Verify())->Verify();
                                     ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('partials/foot.php'); ?>