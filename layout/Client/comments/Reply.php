
<?php 
/**
 * @author Vương Thanh Diệu
 */
function TDReply($tdcmt)
 {
    global $thanhdieudb,$TD,$td,$userLevelShow,$actual_link,$taikhoan,$user,$isLogin,$ReportStatus,$cut;
    $oOo2 = mysqli_query($thanhdieudb,"SELECT r.*, 
    u.username AS user_username, 
    u.hovaten, 
    u.avatar, 
    u.verify, 
    u.level, 
    u.user_id,
    ws_verification.status,
    ws_plans.tengoi AS plans FROM ws_comments_reply r
    JOIN users u ON r.user_username = u.username
    LEFT JOIN ws_plans ON u.username = ws_plans.taikhoan AND ws_plans.ngayhethan > NOW() AND ws_plans.trangthai = 1
    LEFT JOIN ws_verification ON u.username = ws_verification.username
    WHERE r.parent_comment_id = {$tdcmt['comment_id']} AND u.banned != 1");                                            
    if (mysqli_num_rows($oOo2) > 0) {?>
    <ul class="children">
    <?php while ($td_reply = mysqli_fetch_assoc($oOo2)) {?>
    <li class="comment byuser comment-author-<?=$td_reply['user_username'];?> reply-id-<?=$td_reply['reply_id'];?> odd alt depth-2">
        <ul class="list-inline">
            <li class="comt-main" id="user-comment-<?=$td_reply['reply_id'];?>">
                <div class="comment-header mb10">
                    <div class="author-box flex ac">
                        <a
                            href="<?=($td_reply['user_username']===$taikhoan)?'/user/':'/profile/@'.$td_reply['user_username'];?>">
                            <span class="avatar-img comt-avatar">
                                <img alt="Avatar" src="/<?=__IMG__?>/users/avatar-default.jpg"
                                    data-src="/<?=__IMG__?>/users/<?=$td_reply['avatar'];?>"
                                    class="lazyload avatar avatar-id-<?=$td_reply['user_id'];?>">
                                    <?=(new PlansIcon())->icon($td_reply['user_username']);?>
                                <?=ShowPlans::TD($td_reply['user_username']);?>
                            </span>
                        </a>
                        <name class="flex ac flex1">
                            <b class="text-limit"><?=(isMobile()?$cut->characters(THANHDIEU($td_reply['hovaten']),20):THANHDIEU($td_reply['hovaten']))?></b>
                            <?=WSInfoProfileShow::TD($td_reply);?>
                            <?=($td_reply['user_username']===$td['username'])?'<span class="badg c-green badg-sm flex0 ml3">Tác giả</span>':''?>
                        </name>
                        <a href="javascript:;" data-action="comment_like"
                            class="action action-comment-like muted-2-color flex0 ml10"
                            data-pid="<?=$td_reply['parent_comment_id']; ?>">
                            <i class="ri-thumb-up-line"></i>
                            <text></text>
                            <count>0</count>
                        </a>
                    </div>
                </div>
                <div class="comment-footer wsreplys">
                    <div class="mb10 comment-content ws-cmt-mt"
                        id="comment-content-<?=$td_reply['parent_comment_id']; ?>">
                        <?=nl2br(CommentsConverter::TD($td_reply['reply_text']));?>
                    </div>
                    <div class="comt-meta muted-2-color">
                        <span class="comt-author time-ago" data-timeago="<?=$td_reply['created_at']; ?>"
                            title="<?=$td_reply['created_at']; ?>"></span>
                        <span class="badg badg-sm">
                            @<a rel="nofollow" class="url"
                                href="javascript:(scrollTo('#comment-10',-70));"><?= $td_reply['reply_username']; ?></a>
                        </span>
                        <span class="dropdown drop-fixed-sm padding-6">
                            <a href="javascript:;" class="muted-color padding-6" data-toggle="dropdown">
                                <i class="ri-more-fill"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($td_reply['user_username'] === $taikhoan) {?>
                                <li>
                                    <a class="comment-delete-link" data-is-comments="1"
                                        data-commentid="<?=$td_reply['parent_comment_id'];?>"
                                        data-replyid="<?=$td_reply['reply_id'];?>" href="javascript:;">
                                        <i class="ri-delete-bin-2-line mr6 "></i>Xoá bình
                                        luận</a>
                                </li>
                                <?php } else {?>
                                <li>
                                    <a mobile-bottom="true"
                                        <?=$isLogin->TD($taikhoan,$user)?'data-toggle="'.$ReportStatus.'"':'class="signin-loader"'?>
                                        data-report-url="<?=$actual_link?>#user-comment-reply-<?=$td_reply['reply_id'];?>"
                                        data-report-username="/profile/@<?=$td_reply['user_username'];?>"
                                        data-report-hovaten="<?=$td_reply['hovaten'];?>"
                                        data-report-avatar="/<?=__IMG__?>/users/<?=$td_reply['avatar'];?>">
                                        <i class="fa fa-exclamation-triangle mr6 fa-fw c-red"></i>
                                        Báo Cáo</a>
                                </li>
                                <?php }?>
                            </ul>
                        </span>
                    </div>
                </div>
            </li>
        </ul>
    </li>
    <?php } ?>
</ul>
<?php }  } ?>