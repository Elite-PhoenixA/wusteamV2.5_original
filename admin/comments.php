<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Quản Lý Bình Luận</h3>
                            <div class="nk-block-des text-soft">
                                <p>
                                    + Bạn có thể quản lý tất cả các bình luận từ khách hàng ở đây.<br>
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
                                class Comments extends DatabaseConnection 
                                {
                                    public function Comments() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(), "
                                        SELECT c.*, p.tieude AS product_title, p.slug AS product_slug, u.hovaten, u.avatar, u.username
                                        FROM ws_comments c
                                        INNER JOIN ws_products p ON c.product_id = p.id
                                        INNER JOIN users u ON c.user_username = u.username
                                        ORDER BY c.created_at DESC
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
                                                    <span class="sub-text">Nội Dung</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Bài Viết</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Thời Gian</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Cập Nhật</span>
                                                </th>
                                                <th class="nk-tb-col text-end sorting ">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $stt = mysqli_num_rows($oOo);
                                            while ($comment = mysqli_fetch_assoc($oOo)) { ?>
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
                                                                    src="/<?= __IMG__.'/users'.'/'.$comment['avatar'];?>"
                                                                    alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$comment['username']?>"
                                                                target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($comment['hovaten']) ?></a>
                                                            <span class="tb-col-md">@<?= $comment['username'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"><?=$comment['comment_text']?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px"><a href="/view-code/<?=THANHDIEU($comment["product_slug"])?>" target="_blank" rel="noopener noreferrer"><?=THANHDIEU($comment["product_title"])?></a></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px time-ago badge bg-secondary"
                                                        data-timeago="<?=$comment['created_at'];?>"><?=FormatTime::TD($comment["created_at"])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px time-ago badge bg-secondary"
                                                        data-timeago="<?=$comment['updated_at'];?>"><?=FormatTime::TD($comment["updated_at"])?></span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                            <a data-comment-id="<?=$comment['comment_id']?>" href="javascript:;" class="delete-comment btn btn-dim btn-outline-primary btn-sm"><em class="icon ni ni-trash me-1"></em>Xoá</a>
                                                            </div>
                                                        </li>
                                                    </ul>
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
                                        (new Comments())->Comments();
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