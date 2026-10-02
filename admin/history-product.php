<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Sản Phẩm Đã Bán</h3>
                            <div class="nk-block-des text-soft">
                                <p>
                                    + Bạn có thể quản lý tất cả các sản phẩm đã mua từ khách hàng ở đây.<br>
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
                                class HistoryProducts extends DatabaseConnection 
                                {
                                    public function HistoryProducts() {
                                        global $cut;
                                        $oOo = mysqli_query(self::ThanhDieuDB(), "
                                        SELECT 
                                            h.*, 
                                            p.tieude AS product_title,
                                            p.slug AS product_slug,
                                            u.avatar, 
                                            u.hovaten, 
                                            u.username
                                        FROM 
                                            ws_history_products h
                                            INNER JOIN
                                            ws_products p ON h.product_id = p.id
                                        JOIN 
                                            users u ON h.taikhoan = u.username
                                        ORDER BY 
                                            h.ngaymua DESC
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
                                                    <span class="sub-text">Giá Tiền</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Mã Nguồn</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Phân Loại</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Ngày Mua</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $stt = mysqli_num_rows($oOo);
                                            while ($hs = mysqli_fetch_assoc($oOo)) { ?>
                                            <tr class="nk-tb-item odd">
                                                <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <?=$stt?></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                         <img class="ws-avatar-1"
                                                                    src="/<?= __IMG__.'/users'.'/'.$hs['avatar'];?>"
                                                                    alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$hs['username']?>"
                                                                target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($hs['hovaten']) ?></a>
                                                            <span class="tb-col-md">@<?= $hs['username'] ?></span>
                                                            <a href="/view-code/<?=THANHDIEU($hs["product_slug"])?>" target="_blank"><span class="mt-2 d-md-none"><?=$cut->characters($hs['product_title'],17)?></span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"><?=FormatNumber::TD($hs['giamua'],1)?>đ</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px"><a href="/view-code/<?=THANHDIEU($hs["product_slug"])?>" target="_blank" rel="noopener noreferrer"><?=$hs["product_title"]?? '<span class="badge badge-dim bg-danger">Đã Bị Xoá</span>'?></a></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px badge bg-primary"><?=$hs["phanloai"]?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px time-ago badge bg-secondary"
                                                        data-timeago="<?=$hs['ngaymua'];?>"><?=FormatTime::TD($hs["ngaymua"])?></span>
                                                </td>
                                            </tr>
                                            <?php $stt--;}?>
                                        </tbody>
                                        <?php }  else { ?>
                                        <tr>
                                            <td colspan="8">Chưa có dữ liệu.</td>
                                        </tr>
                                        <?php }
                                         }
                                        }
                                        (new HistoryProducts())->HistoryProducts();
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