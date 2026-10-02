<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Lịch Sử Nạp Thẻ Cào</h3>
                            <div class="nk-block-des text-soft">
                                <p>Bạn có tổng cộng <?=$totals->Card()?> hoá đơn nạp thẻ cào.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner table-responsive dt-bootstrap4">
                            <table class="table table-tranx datatable-init text-nowrap">
                                <?php
                                class LichSuNapTheCao extends DatabaseConnection 
                                {
                                    public function HistoryCard() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(),"SELECT ws_history_card.*, users.hovaten
                                        FROM ws_history_card
                                        LEFT JOIN users ON ws_history_card.username = users.username 
                                        ORDER BY thoigian DESC");
                                    if ($oOo) {?>
                                 <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tài Khoản</th>
                                        <th scope="col">Loại Thẻ</th>
                                        <th scope="col">Seri</th>
                                        <th scope="col">Mã Thẻ</th>
                                        <th scope="col">Mệnh Giá</th>
                                        <th scope="col">Thời Gian</th>
                                        <th scope="col">Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($card = mysqli_fetch_assoc($oOo)) { ?>
                                    <tr class="odd">
                                        <th scope="row">#<?=$card['card_id']?></th>
                                        <td class="fw-bold"><?=THANHDIEU($card['hovaten'])?></td>
                                        <td><span class="badge bg-gray"><?=THANHDIEU($card['loaithe'])?></span></td>
                                        <td><span class="badge bg-secondary"><?=$card['seri']?>&nbsp;<a class="td-copy"
                                                    data-copy="<?=$card['seri']?>"><i
                                                        class="ri-file-copy-line"></i></a></span></td>
                                        <td><span class="badge bg-secondary"><?=$card['mathe']?>&nbsp;<a class="td-copy"
                                                    data-copy="<?=$card['mathe']?>"><i
                                                        class="ri-file-copy-line"></i></a></span></td>
                                        <td><span
                                                class="badge bg-primary"><?=FormatNumber::TD($card['menhgia'])?>đ</span>
                                        </td>
                                        <td><span class="badge bg-info"><?=FormatTime::TD($card['thoigian'])?></span>
                                        </td>
                                        <td>
                                            <?php if ($card['trangthai']==='xuly') {?>
                                            <span class="tb-odr-status">
                                                <span class="badge badge-dot bg-warning">Chờ Xử Lý</span>
                                            </span>
                                            <?php } elseif ($card['trangthai']==='thatbai') {?>
                                            <span class="tb-odr-status">
                                                <span class="badge badge-dot bg-danger">Thất Bại</span>
                                            </span>
                                            <?php } else {?>
                                            <span class="tb-odr-status">
                                                <span class="badge badge-dot bg-success">Thành Công</span>
                                            </span>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <?php }
                                      }
                                }
                                (new LichSuNapTheCao())->HistoryCard();?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('partials/foot.php'); ?>