<div class="ajax-item">
    <form class="zib-widget td-change-account" method="post">
        <div class="mb15">
            <div class="author-set-left">
                <span class="avatar-img avatar-lg td-load-avatar2">
                    <img data-fancybox alt="Ảnh của <?=THANHDIEU($td['hovaten'])?>" src="/<?=__IMG__?>/users/avatar-default.jpg"
                        data-src="/<?=__IMG__.'/users/'.$td['avatar']?>"
                        class="lazyload avatar avatar-id-<?=$td['user_id']?>">
                </span>
            </div>
            <div class="author-set-right mt10">
                <div class="flex ac">
                    <b class="em12">
                        <?=$td['username']?>
                    </b>
                    <a mobile-bottom="true" class="avatar-set-link but c-blue p2-10 em09 ml6 hollow shrink0"
                        href="javascript:;">
                        Thay ảnh đại diện
                    </a>
                </div>
                <div class="muted-2-color mt6">Thời Gian Đăng Ký: <?=$td['ngaythamgia']?>
                </div>
                <div class="muted-2-color mt6">Thiết Bị:
                    <?php if(isset($_COOKIE['win11'])){echo'Window 11 Pro';}else{echo $device_name;}?><?=' - '.$browser_name?>
                </div>
            </div>
        </div>
        <div class="mb15">
            <div class="author-set-left">Họ Và Tên
            </div>
            <div class="author-set-right">
                <input type="text" class="form-control" name="hovaten" value="<?=THANHDIEU($td['hovaten'])?>"
                    placeholder="Vui lòng nhập họ và tên">
            </div>
        </div>
        <div class="mb15">
            <div class="author-set-left">Tiểu Sử
            </div>
            <div class="author-set-right">
                <input type="text" class="form-control" name="tieusu" value="<?=THANHDIEU($td['tieusu'])?>"
                    placeholder="Hãy giới thiệu ngắn gọn về bản thân bạn">
            </div>
        </div>
        <div class="mb15">
            <div class="author-set-left">E-mail
            </div>
            <div class="author-set-right">
                <input type="email" class="form-control" disabled
                    value="<?=(valid_email($td['email']))?$td['email']:'Chưa xác minh'?>">
            </div>
        </div>
        <div class="mb15">
            <div class="author-set-left">Giới Tính
            </div>
            <div class="author-set-right form-select">
                <select class="form-control" name="gender">
                    <option value="Bảo Mật" <?= $td['gender'] == 'Bảo Mật' ? 'selected' : '' ?>>Bảo mật</option>
                    <option value="Nam Giới" <?= $td['gender'] == 'Nam Giới' ? 'selected' : '' ?>>Nam giới</option>
                    <option value="Nữ Giới" <?= $td['gender'] == 'Nữ Giới' ? 'selected' : '' ?>>Nữ giới</option>
                    <option value="Đồng Tính" <?= $td['gender'] == 'Đồng Tính' ? 'selected' : '' ?>>Đồng Tính</option>
                </select>
            </div>
        </div>
        <div class="mb15">
            <div class="author-set-left">Cấp Bậc
            </div>
            <div class="author-set-right">
                <input type="text" class="form-control" disabled
                    value="<?php switch ($td['rank']) {case 'admin': echo 'Quản Trị Viên';break;case 'partner':echo 'Cộng Sự';break;default:echo 'Thành Viên'; break;}?>">
            </div>
        </div>
        <div class="mb15">
            <div class="author-set-left"></div>
            <div class="author-set-right">
                <input type="hidden" name="action" value="user_edit_account">
                <button type="submit" td_ajax="submit" class="but jb-blue padding-lg">
                    <i class="fa fa-check mr10"></i>Lưu Thay Đổi
                </button>
            </div>
        </div>
    </form>
</div>