<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Lịch Sử Nạp Ngân Hàng</h3>
                            <div class="nk-block-des text-soft">
                            <p>Bạn có tổng cộng <?=$totals->Bank()?> hoá đơn nạp ngân hàng.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner datatable-wrap table-responsive">
                            <table class="table table-tranx datatable-init text-nowrap">
                                <?php
                                class LichSuNapNganHang extends DatabaseConnection
                                 {
                                    public function HistoryBank() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(),"SELECT ws_history_bank.*, users.hovaten
                                        FROM ws_history_bank
                                        LEFT JOIN users ON ws_history_bank.username = users.username 
                                        ORDER BY thoigian DESC");
                                if ($oOo) {?>
                                <thead>
                                    <tr>
                                        <th scope="col">Mã Giao Dịch</th>
                                        <th scope="col">Tài Khoản</th>
                                        <th scope="col">Loại</th>
                                        <th scope="col">Số Tiền</th>
                                        <th scope="col">Nội Dung</th>
                                        <th scope="col">Thời Gian</th>
                                        <th scope="col">Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($bank = mysqli_fetch_assoc($oOo)) { ?>
                                    <tr>
                                        <th scope="row">#<?=$bank['magiaodich']?></th>
                                        <td class="fw-bold"><?=THANHDIEU($bank['hovaten'])?></td>
                                        <td><span class="badge bg-gray"><?=THANHDIEU($bank['loai'])?></span></td>
                                        <td><span class="badge bg-primary"><?=FormatNumber::TD($bank['sotien'])?>đ</span></td>
                                        <td><span class="badge bg-secondary"><?=THANHDIEU($bank['noidung'])?></span></td>
                                        <td><span class="badge bg-success"><?=FormatTime::TD($bank['thoigian'])?></span></td>
                                        <td>
                                            <?php if ($bank['trangthai']==='thanhcong') {?>
                                            <span class="tb-odr-status">
                                                <span class="badge badge-dot bg-success">Thành Công</span>
                                            </span>
                                            <?php } else {?>
                                                <span class="tb-odr-status">
                                                <span class="badge badge-dot bg-danger">Thất Bại</span>
                                            </span>
                                            <?php }?>
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
                                        (new LichSuNapNganHang())->HistoryBank();
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