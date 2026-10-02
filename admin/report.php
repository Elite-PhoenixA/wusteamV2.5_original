<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Quản Lý Đơn Tố Cáo</h3>
                            <div class="nk-block-des text-soft">
                                <p>
                                    + Bạn có thể quản lý tất cả các đơn tố cáo từ khách hàng ở đây.<br>
                                    + Để xử lý đơn tố cáo hãy nhấn vào dấu 3 chấm phía cuối cùng và nhấp vào xem chi
                                    tiết.<br>
                                    + Tại trang xem chi tiết bạn có thể xem thông tin hồ sơ của người bị tố cáo, tại đó
                                    bạn có thể từ chối hoặc chấp nhận đơn tố cáo.</p>
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
                                class Reports extends DatabaseConnection 
                                {
                                    public function Reports() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(), "
                                        SELECT ws_reports.*, 
                                               reporter.hovaten AS reporter_hovaten, 
                                               reporter.username AS reporter_username, 
                                               reporter.avatar AS reporter_avatar,
                                               victim.hovaten AS victim_hovaten, 
                                               victim.username AS victim_username, 
                                               victim.avatar AS victim_avatar
                                        FROM ws_reports
                                        INNER JOIN users AS reporter ON ws_reports.username = reporter.username
                                        INNER JOIN users AS victim ON ws_reports.victim = victim.username
                                        ORDER BY ws_reports.created_at DESC
                                    ");
                                    
                                        if ($oOo) {?>
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head text-nowrap">
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">STT</span>
                                                </th>
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">Người Nộp Đơn</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-mb sorting">
                                                    <span class="sub-text">Người Bị Tố Cáo</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Lý Do Vi Phạm</span>
                                                </th>
                                                <!-- <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Lý Do Khác</span>
                                                </th> -->
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Url Tố Cáo</span>
                                                </th>
                                                <!-- <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Mô Tả</span>
                                                </th> -->
                                                <th class="nk-tb-col tb-col-md sorting" style="width:160px;">
                                                    <span class="sub-text">Bằng Chứng</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Thời Gian</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Trạng Thái</span>
                                                </th>
                                                <th class="nk-tb-col text-end sorting ">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($report = mysqli_fetch_assoc($oOo)) { ?>
                                            <tr class="nk-tb-item odd">
                                                <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <?=$report['id_report']?></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                         <img class="ws-avatar-1"
                                                                    src="/<?= __IMG__.'/users'.'/'.$report['reporter_avatar'];?>"
                                                                    alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$report['reporter_username']?>"
                                                                target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($report['reporter_hovaten']) ?></a>
                                                            <span class="tb-col-md">@<?= $report['reporter_username'] ?></span>

                                                            <?php if($report['status']=='accept'):?>
                                                            <span
                                                                class="badge badge-dim rounded-pill bg-outline-success d-md-none">Đã
                                                                Chấp Nhận</span>
                                                            <?php elseif($report['status']=='reject'): ?>
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
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                          <img class="ws-avatar-1"
                                                                    src="/<?= __IMG__.'/users'.'/'. $report['victim_avatar']; ?>"
                                                                    alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$report['victim_username']?>"
                                                                target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($report['victim_hovaten']) ?></a>
                                                            <span>@<?= $report['victim_username'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"><?=$report['reason']?></span>
                                                </td>
                                                <!-- <td class="nk-tb-col tb-col-md">
                                                    <span><?=($report['reason_other']==null?'null':$report['reason_other'])?></span>
                                                </td> -->
                                                <td class="nk-tb-col tb-col-md">
                                                    <span><a href="<?=$report['url_report']?>" target="_blank"
                                                            rel="noopener noreferrer"><?=$report['url_report']?></a></span>
                                                </td>
                                                <!-- <td class="nk-tb-col tb-col-md">
                                                    <span><?=$report['desc_content']?></span>
                                                </td> -->
                                                <td class="nk-tb-col tb-col-lg">
                                                    <div class="user-card sq">
                                                        <?php foreach (explode(',',$report['images']) as $image):?>
                                                        <img data-fancybox=""
                                                            style="border-radius:5px!important;cursor:pointer;"
                                                            src="/<?= __IMG__ ?>/uploads/bang-chung/<?=$image?>"
                                                            alt="Bằng chứng vi phạm">&ensp;
                                                        <?php endforeach; ?>
                                                    </div>
                                                </td>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px time-ago"
                                                        data-timeago="<?=$report['created_at'];?>"><?=FormatTime::TD($report["created_at"])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md text-nowrap">
                                                    <?php if($report['status']=='accept'):?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-success">Đã
                                                        Chấp Nhận</span>
                                                    <?php elseif($report['status']=='reject'): ?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-danger">Đã Từ
                                                        Chối</span>
                                                    <?php else:?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-warning">Chờ Xử
                                                        Lý</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown">
                                                                    <em class="icon ni ni-more-h"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a
                                                                                href="view-report/t/<?=md5($report['id_report'])?>">
                                                                                <em class="icon ni ni-eye"></em>
                                                                                <span>Xem Chi Tiết</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
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
                                        (new Reports())->Reports();
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