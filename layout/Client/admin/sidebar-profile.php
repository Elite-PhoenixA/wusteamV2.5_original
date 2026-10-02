<div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
    <a href="#" class="toggle" data-target="profileDD">
        <div class="user-avatar">
            <img class="ws-avatar-1" src="/<?=__IMG__?>/users/<?=THANHDIEU($user['avatar']);?>" alt="<?=THANHDIEU($user['hovaten']);?>">
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown" data-content="profileDD">
        <div class="dropdown-inner user-card-wrap d-none d-md-block">
            <div class="user-card">
                <div class="user-avatar">
                    <img class="ws-avatar-1" src="/<?=__IMG__?>/users/<?=THANHDIEU($user['avatar']);?>"
                        alt="<?=THANHDIEU($user['hovaten']);?>">
                </div>
                <div class="user-info">
                    <span class="lead-text"><?=THANHDIEU($user['hovaten']);?></span>
                    <span class="sub-text text-soft"><?=THANHDIEU($user['email']??'Chưa xác minh');?></span>
                </div>
            </div>
        </div>
        <div class="dropdown-inner">
            <ul class="link-list">
                <li>
                    <a href="/user/account">
                        <em class="icon ni ni-setting-alt"></em>
                        <span>Cài Đặt Tài Khoản</span>
                    </a>
                </li>
                <li>
                    <a href="<?=(new AdminURL())->Path()?>/profile/logs">
                        <em class="icon ni ni-activity-alt"></em>
                        <span>Nhật Ký Hoạt Động</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dropdown-inner">
            <ul class="link-list">
                <li>
                    <a class="user-logout" href="javascript:;">
                        <em class="icon ni ni-signout"></em>
                        <span>Đăng Xuất</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>