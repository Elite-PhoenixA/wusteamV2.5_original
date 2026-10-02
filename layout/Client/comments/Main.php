<?php
/**
 * @author Vương Thanh Diệu
 */
?>
<div class="theme-box" id="comments">
    <div class="box-body notop">
        <div class="title-theme">Tổng Bình Luận
            <small class="td-total-cmt">(<?=CommentCounter::TotalComments($td['id'])?>)</small>
        </div> 
    </div>
    <div class="no_webshot main-bg theme-box box-body radius8 main-shadow" id="comment-form">
        <?php if (!$isLogin->TD($taikhoan,$user)) {?>
        <div class="comment-signarea text-center box-body radius8">
            <h3 class="text-muted em12 theme-box muted-3-color">Vui lòng đăng nhập để viết bình luận</h3>
            <p>
                <a href="javascript:;" class="signin-loader but c-blue padding-lg">
                    <i class="fa fa-fw fa-sign-in mr10" aria-hidden="true"></i>Đăng nhập </a>
                <a href="javascript:;" class="signup-loader ml10 but c-yellow padding-lg">
                    <i class="ri-user-add-line"></i> Đăng ký </a>
            </p>
        </div>
        <?php } else { ?>
        <div class="flex ac jsb virtual-input respond-mobiles">
            <div class="flex flex1 ac">
                <img alt="<?=$user['hovaten']?>" src="/<?=__IMG__?>/users/avatar-default.jpg"
                    data-src="/<?=__IMG__?>/users/<?=$user['avatar']?>" class="lazyload avatar avatar-id-<?=$user['user_id']?>">
                <div class="text-ellipsis simulation mr10">&ensp;Hãy nói gì đó đi 🐕</div>
            </div>
            <span class="but c-blue">Bình Luận</span>
        </div>
        <!-- Khu Vực Bình Luận -->
        <div id="respond" class="mobile-fixed">
            <div class="fixed-body"></div>
            <form id="commentform">
                <div class="flex ac">
                    <div class="comt-title text-center flex0 mr10">
                        <div class="comt-tips">
                            <input type='hidden' name='WsComments' value='true' />
                            <input type='hidden' name='product_id' value='<?=$td['id']?>' />
                            <input type="hidden" id="is_reply" name="is_reply" value="0">
                            <input type="hidden" name="parent_comment_id" id="parent_comment_id" value="0">
                            <input type="hidden" name="usernamereply" id="usernamereply" value="0">
                        </div>
                        <div class="comt-avatar mb10">
                            <img alt="<?=$user['hovaten']?>" src="/<?=__IMG__?>/users/avatar-default.jpg"
                                data-src="/<?=__IMG__?>/users/<?=$user['avatar']?>" class="lazyload avatar avatar-id-<?=$user['user_id']?>">
                        </div>
                        <p class="text-ellipsis muted-2-color"><?=$user['hovaten']?></p>
                    </div>
                    <div class="comt-box grow1">
                        <div class="action-text mb10 em09 muted-2-color"></div>
                        <textarea placeholder="Bạn đang nghĩ gì..?
Ⓞ═╦╗
_/﹋\_
(҂`_´) -Pèng
<,︻╦╤─ ҉ – –
_/﹋\_?" autoheight="true" maxheight="188" class="form-control grin" name="comment" id="comment" cols="100%"
                            rows="4"></textarea>
                        <div class="comt-ctrl relative">
                            <div class="comt-tips-right pull-right">
                                <a class="but c-red" id="cancel-comment-reply-link" href="javascript:;">Hủy
                                    bỏ</a>
                                <button class="but c-blue pw-1em" type="submit">Bình Luận</button>
                            </div>
                            <div class="comt-tips-left">
                                <?php include($_SERVER['DOCUMENT_ROOT'].'/app/insert/emoji.php');?>
                                <span class="dropup relative image">
                                    <a class="but btn-input-expand input-image mr6" href="javascript:;">
                                        <i class="fa fa-fw fa-image"></i>
                                        <span class="hide-sm">Gửi Ảnh</span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active dropdown-image"
                                                id="image-tab-comment-1">
                                                <p>Vui lòng nhập link hình ảnh:</p>
                                                <p>
                                                    <textarea rows="2" tabindex="1" class="form-control input-textarea"
                                                        style="height:95px;" placeholder="https://..."></textarea>
                                                </p>
                                                <div class="text-right">
                                                    <a id="confirm-image" class="but c-blue pw-1em"
                                                        href="javascript:;">Xác Nhận</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php }?>
        <!-- Khu Vực Hiển Thị Bình Luận -->
        <div id="postcomments">
            <ol class="commentlist list-unstyled">
                <div class="comment-filter tab-nav-theme flex ac jsb">
                    <?php if(CommentCounter::TotalComments($td['id'])) {?>
                    <ul class="list-inline comment-order-box" id="ws-cmt-order">
                        <li class="active">
                            <a rel="nofollow" class="comment-orderby" href="?ws=binhluan-moinhat">Mới
                                Nhất</a>
                        </li>
                        <li>
                            <a rel="nofollow" class="comment-orderby" href="?ws=binhluan-cunhat">Cũ Nhất</a>
                        </li>
                    </ul>
                    <?php }?>
                </div>
                <?php include(__DIR__.'/Reply.php');?>
                <?php include(__DIR__.'/Comment.php');?>
            </ol>
        </div>
    </div>
</div>