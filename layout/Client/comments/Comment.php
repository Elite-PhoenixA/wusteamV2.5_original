<?php
/**
 * Author: Vương Thanh Diệu
 */
function TDComments($product_id)
{
    global $thanhdieudb, $userLevelShow, $TD, $td, $current_url, $actual_link, $taikhoan, $user, $isLogin, $ReportStatus, $cut;
    $order_by = "DESC";
    if (isset($_GET['ws']) && $_GET['ws'] === 'binhluan-cunhat') {
        $order_by = "ASC";
    }
    $page = isset($_GET['comment']) ? max(1, intval($_GET['comment'])) : 1;
    $limit = 15;
    $offset = ($page - 1) * $limit;
    $result = mysqli_query($thanhdieudb,"SELECT COUNT(*) AS total 
    FROM ws_comments c 
    JOIN users u ON c.user_username = u.username 
    LEFT JOIN ws_plans ON u.username = ws_plans.taikhoan 
        AND ws_plans.ngayhethan > NOW() AND ws_plans.trangthai = 1
    LEFT JOIN ws_verification ON u.username = ws_verification.username
    WHERE c.product_id = $product_id AND u.banned != 1");
    $total_count = mysqli_fetch_assoc($result)['total'];
    $vtd = mysqli_query($thanhdieudb, "SELECT c.*, u.username AS user_username, u.hovaten, u.avatar, u.level, u.verify, u.user_id, 
    ws_verification.status, ws_plans.tengoi AS plans
FROM ws_comments c 
JOIN users u ON c.user_username = u.username 
LEFT JOIN ws_plans ON u.username = ws_plans.taikhoan 
AND ws_plans.ngayhethan > NOW() AND ws_plans.trangthai = 1
LEFT JOIN ws_verification ON u.username = ws_verification.username
WHERE c.product_id = $product_id AND u.banned != 1 
ORDER BY c.created_at $order_by 
LIMIT $limit OFFSET $offset");
    if (mysqli_num_rows($vtd) > 0) {
        while ($tdcmt = mysqli_fetch_assoc($vtd)) {
?>
<li class="thanhdieu-comments-ajax comment byuser comment-author-<?=$tdcmt['user_username'];?> cmt-id-<?=$tdcmt['comment_id'];?> even thread-even depth-1">
    <ul class="list-inline">
        <li class="comt-main" id="user-comment-<?=$tdcmt['comment_id'];?>">
            <div class="comment-header mb10">
                <div class="author-box flex ac">
                    <span class="avatar-img comt-avatar">
                        <a
                            href="<?=($tdcmt['user_username'] === $taikhoan) ? '/user/' : '/profile/@'.$tdcmt['user_username'];?>">
                            <img alt="Avatar" src="/<?=__IMG__?>/users/avatar-default.jpg"
                                data-src="/<?=__IMG__?>/users/<?=$tdcmt['avatar'];?>" class="lazyload avatar">
                            <?=(new PlansIcon())->icon($tdcmt['user_username']);?>
                            <?=ShowPlans::TD($tdcmt['user_username']);?>
                        </a>
                    </span>
                    <name class="flex ac flex1">
                        <b
                            class="text-limit"><?=(isMobile() ? $cut->characters(THANHDIEU($tdcmt['hovaten']), 20) : THANHDIEU($tdcmt['hovaten']))?></b>
                        <?=WSInfoProfileShow::TD($tdcmt);?>
                        <?=($tdcmt['user_username'] === $taikhoan) ? '<span class="badg c-green badg-sm flex0 ml3">Tác giả</span>' : ''?>
                    </name>
                    <a href="javascript:;" data-action="comment_like"
                        class="action action-comment-like muted-2-color flex0 ml10"
                        data-pid="<?=$tdcmt['comment_id'];?>">
                        <i class="ri-thumb-up-line"></i>
                        <text></text>
                        <count>0</count>
                    </a>
                </div>
            </div>
            <div class="comment-footer">
                <div class="mb10 comment-content" id="comment-content-<?=$tdcmt['comment_id'];?>">
                    <?=nl2br(CommentsConverter::TD($tdcmt['comment_text']));?>
                </div>
                <div class="comt-meta muted-2-color">
                    <i class="ri-time-line"></i>
                    <span class="comt-author time-ago" data-timeago="<?=$tdcmt['created_at'];?>" data-toggle="tooltip"
                        title="<?=$tdcmt['created_at'];?>"></span>
                    <span class="badge-approve"></span>
                    <span class="reply-link">
                        <i class="ri-reply-line"></i>
                        <?php if ($isLogin->TD($taikhoan, $user)) {?>
                        <a rel="nofollow" class="comment-reply-link" data-commentid="<?=$tdcmt['comment_id'];?>"
                            data-usernamereply="<?=$tdcmt['user_username'];?>"
                            data-belowelement="user-comment-<?=$tdcmt['comment_id'];?>" data-respondelement="respond"
                            data-replyto="<?=($tdcmt['user_username'] === $taikhoan) ? 'Đang trả lời cho chính bạn' : 'Trả lời: '.$tdcmt['hovaten']?>"
                            data-toggle="tooltip"
                            title="Trả lời bình luận của <?=($tdcmt['user_username'] === $taikhoan) ? 'chính bạn' : $tdcmt['hovaten']?>">Trả
                            lời</a>
                        <?php } else {?>
                        <a class="signin-loader">Trả lời</a>
                        <?php } ?>
                        <div class="thanhdieu-dyn-item__ornament" data-comment-tag="ID <?=$tdcmt['comment_id'];?>">
                            <div class="thanhdieu-dyn-ornament">
                                <div class="thanhdieu-dyn-ornament__type--3">
                                    <img src="/<?=__IMG__?>/icon/uid/thanhdieu_uid_<?=mt_rand(1, 15)?>.webp"
                                        alt="ID <?=$tdcmt['comment_id'];?>">
                                    <span
                                        style="color: <?=["rgb(197, 184, 30)", "rgb(255, 0, 0)", "rgb(0, 255, 0)", "rgb(0, 0, 255)", "rgb(255, 165, 0)", "rgb(128, 0, 128)"][array_rand(["rgb(197, 184, 30)", "rgb(255, 0, 0)", "rgb(0, 255, 0)", "rgb(0, 0, 255)", "rgb(255, 165, 0)", "rgb(128, 0, 128)"])];?>;">ID:
                                        <?=$tdcmt['comment_id'];?></span>
                                </div>
                            </div>
                        </div>
                    </span>
                    <span class="dropdown drop-fixed-sm padding-6">
                        <a href="javascript:;" class="muted-color padding-6" data-toggle="dropdown">
                            <i class="ri-more-fill"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($tdcmt['user_username'] === $taikhoan) {?>
                            <li>
                                <a class="comment-delete-link" data-is-comments="0"
                                    data-commentid="<?=$tdcmt['comment_id'];?>" href="javascript:;">
                                    <i class="ri-delete-bin-2-line mr6"></i>Xoá bình luận
                                </a>
                            </li>
                            <?php } else {?>
                            <li>
                                <a mobile-bottom="true"
                                    <?=$isLogin->TD($taikhoan, $user) ? 'data-toggle="'.$ReportStatus.'"' : 'class="signin-loader"'?>
                                    data-report-url="<?=$actual_link?>#user-comment-<?=$tdcmt['comment_id'];?>"
                                    data-report-username="/profile/@<?=$tdcmt['user_username'];?>"
                                    data-report-hovaten="<?=$tdcmt['hovaten'];?>"
                                    data-report-avatar="/<?=__IMG__?>/users/<?=$tdcmt['avatar'];?>">
                                    <i class="fa fa-exclamation-triangle mr6 fa-fw c-red"></i>Báo Cáo
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </span>
                </div>
            </div>
        </li>
    </ul>
    <?php TDReply($tdcmt);?>
</li>
<?php 
        }
    } else { 
?>
<div class="text-center comment-null">
    <img style="width: 280px; opacity: 0.7;" src="/<?=__IMG__?>/svg/null.svg">
    <p class="em09 muted-3-color separator">Chưa có bình luận nào</p>
</div>
<?php 
    }
    $total_pages = ceil($total_count / $limit);
    if ($total_pages > 1) {
?>
<div class="pagenav">
    <?php if ($page > 1) {?>
    <a class="page-numbers" href="?comment=<?=($page - 1);?>"><i class="fa fa-angle-left em12"></i></a>
    <?php } ?>
    <?php for ($i = 1; $i <= $total_pages; $i++) {?>
    <a class="page-numbers <?=$i === $page ? 'current' : '';?>" href="?comment=<?=$i;?>"><?=$i;?></a>
    <?php } ?>
    <?php if ($page < $total_pages) {?>
    <a class="page-numbers" href="?comment=<?=($page + 1);?>"><i class="fa fa-angle-right em12"></i></a>
    <?php } ?>
</div>
<?php 
    }
}
TDComments($td['id']);
?>
<style>
/* Remake -> ThanhDieu.Com */
.pagenav, .pagenav .page-numbers, .pagenav a {border-radius: 50%;}
</style>
<!-- <div class="thanhdieu_ajax_loader">
    <ul class="list-inline flex">
        <div class="avatar-img placeholder radius"></div>
        <li class="flex1">
            <div class="placeholder s1 mb6"></div>
            <div class="placeholder k2 mb10"></div>
            <i class="placeholder s1 mb6"></i>
            <i class="placeholder s1 mb6 ml10"></i>
        </li>
    </ul>
</div> -->