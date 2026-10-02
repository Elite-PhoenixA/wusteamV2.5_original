<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Nhật Ký Hoạt Động</h3>
                            <div class="nk-block-des text-soft">
                                <p>Hệ thống có tổng cộng <?=$totals->Logs()?> bản ghi nhật ký hoạt động.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a class="btn btn-icon btn-danger d-md-none truncate-logs">
                                <em class="icon ni ni-trash-alt"></em>
                            </a>
                            <a class="btn btn-danger d-none d-md-inline-flex truncate-logs">
                                <i class="ri-delete-bin-2-line"></i>&ensp; <span>Xoá All Log</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">Tất Cả Nhật Ký</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner datatable-wrap table-responsive">
                            <table class="table table-tranx datatable-init thanhdieu-refresh">
                                <?php
                                class WsLogs extends DatabaseConnection
                                 {
                                    public function Logs() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(),"SELECT ws_logs.*, users.hovaten
                                        FROM ws_logs
                                        LEFT JOIN users ON ws_logs.username = users.username 
                                        ORDER BY time DESC");
                                if ($oOo) {?>
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">STT</th>
                                        <th scope="col">Tài Khoản</th>
                                        <th scope="col">Nhật Ký</th>
                                        <th scope="col">Thời Gian</th>
                                        <th scope="col">Vai Trò</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($logs = mysqli_fetch_assoc($oOo)) { ?>
                                    <tr>
                                        <th scope="row"><?=$logs['log_id']?></th>
                                        <td class="fw-bold text-nowrap"><?=THANHDIEU($logs['hovaten'])?></td>
                                        <td><?=THANHDIEU($logs['content'])?></td>
                                        <td class="text-nowrap"><?=FormatTime::TD($logs['time'])?></td>
                                        <td><?=$logs['action']?></td>
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
                                        (new WsLogs())->Logs();
                                     ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('partials/foot.php'); ?>