<?php require_once('partials/head.php'); ?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <?php if(($current_url)==='/admin/settings/'||$current_url==='/admin/settings'):?>
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h5 class="title fw-medium">Trung Tâm Cài Đặt</h5>
                                            <span>Các cài đặt này giúp bạn sửa đổi cài đặt trang web.</span>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside">
                                                <em class="icon ni ni-menu-alt-r"></em>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <form class="ws-settings form-settings gy-3 form-validate is-alter">
                                        <input type="hidden" name="ws-settings" value="true">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Tên Thương Hiệu (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Chỉ định tên trang web của bạn.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-name"
                                                            value="<?=$TD->Setting('name-site')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-author">Người Vận Hành (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Chỉ định tên chủ sở hữu cho trang web của
                                                        bạn.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-author"
                                                            value="<?=$TD->Setting('author')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-geetest">Captcha Geetest V4 (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Cấu hình ID captcha Geetest -
                                                        <a target="_blank"
                                                            href="//auth.geetest.com">auth.geetest.com</a>.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-geetest"
                                                            value="<?=$TD->Setting('key-geetest')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-geetest">Callback Cron-Jobs (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Liên kết cron-jobs chính của hệ thống.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            value="<?=$website_domain?>/cron-jobs/global">
                                                        <div class="input-group-append">
                                                            <a data-copy="<?=$website_domain?>/cron-jobs/global"
                                                                class="btn btn-outline-primary btn-dim td-copy"><em
                                                                    class="icon ni ni-copy"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Thông Báo Trang Chủ</label>
                                                    <span class="form-note">Kích hoạt hoặc vô hiệu hoá modal thông báo ở
                                                        trang chủ.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="is-modal"
                                                        name="is-modal" value="1"
                                                        <?=SaveModal($TD->Setting('is-modal'))['checked']?>>
                                                    <label
                                                        class="custom-control-label fw-bold text-<?=SaveModal($TD->Setting('is-modal'))['color']?>"
                                                        for="is-modal">
                                                        <?=SaveModal($TD->Setting('is-modal'))['text']?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Màn Hình Tải</label>
                                                    <span class="form-note">Kích hoạt hoặc vô hiệu hoá màn hình tải
                                                        (loader screen).</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select js-select2" data-search="on"
                                                            name="site-loader" data-ui="clean">
                                                            <option value="0"
                                                                <?=($TD->Setting('loader')==0)?'selected':'';?>>Vô
                                                                Hiệu Hoá</option>
                                                            <option value="1"
                                                                <?=($TD->Setting('loader')==1)?'selected':'';?>>Kích
                                                                hoạt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Kiểu Landing <span class="badge badge-dim bg-danger">Thử Nghiệm</span></label>
                                                    <span class="form-note">Chọn kiểu langding page cho trang chủ website.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select js-select2" name="site-landing" data-ui="clean">
                                                        <option value="1" <?=($TD->Setting('landing')==1)?'selected':'';?>>Landing Search</option>
                                                        <option value="2" <?=($TD->Setting('landing')==2)?'selected':'';?>>Landing Banner</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Hiện Footer Lite</label>
                                                    <span class="form-note">Kích hoạt hoặc vô hiệu hoá chân trang
                                                        lite.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="custom-control custom-control-sm custom-radio">
                                                    <input type="radio" id="footer-lite-2" name="footer-lite"
                                                        class="custom-control-input" value="0"
                                                        <?=$TD->Setting('footer-lite') == '0' ? 'checked' : ''?>>
                                                    <label class="custom-control-label" for="footer-lite-2">Vô Hiệu
                                                        Hoá</label>
                                                </div>&ensp;|&ensp;
                                                <div class="custom-control custom-control-sm custom-radio">
                                                    <input type="radio" id="footer-lite-1" name="footer-lite"
                                                        class="custom-control-input" value="1"
                                                        <?=$TD->Setting('footer-lite') == '1' ? 'checked' : ''?>>
                                                    <label class="custom-control-label" for="footer-lite-1">Kích
                                                        Hoạt</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-footer">Chân trang (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Thông tin chân trang của trang web.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-footer"
                                                            value="<?=$TD->Setting('footer')?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-blacklist">Danh Sách Đen</label>
                                                    <span class="form-note">Chặn và cấm ip truy cập vào trang
                                                        web.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" name="site-blacklist" rows="3"
                                                            placeholder="Nhập IP cần cấm, mõi ip phân tách bằng dấu |
eg. 103.258.185.90|104.225.751.665
                                                            "><?=$TD->Setting('black-ip')?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-7 offset-lg-3 text-center">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-md btn-primary me-2"><em
                                                            class="icon ni ni-check-circle-cut"></em>&ensp;Cập
                                                        Nhật</button>
                                                    <button data-cache="<?=$TD->Setting('cache')?>" type="button"
                                                        class="clear-cache btn btn-md btn-danger"><i
                                                            class="spinner fs-15px ri-refresh-line"></i>&ensp;Clear
                                                        Cache</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php elseif($current_url==='/admin/settings/info'):?>
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h5 class="title fw-medium">Cài Đặt Thông Tin</h5>
                                            <span>Những cài đặt này giúp bạn sửa đổi thông tin trang web.</span>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside">
                                                <em class="icon ni ni-menu-alt-r"></em>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <form class="form-settings gy-3 ws-setting-info form-validate is-alter">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-title">Tiêu Đề Trang (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Tiêu đề ngắn của trang web</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-title"
                                                            value="<?=$TD->Setting('title')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-desc">Mô Tả Trang (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Chỉ định mô tả về trang web này.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-desc"
                                                            value="<?=$TD->Setting('description')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-keywords">Từ Khoá (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Chỉ định từ khoá, keywords cho trang
                                                        web.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-keywords"
                                                            value="<?=$TD->Setting('keywords')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-logo">Logo (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Đường dẫn hoặc url logo của trang
                                                        web.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-logo"
                                                            value="<?=$TD->Setting('logo')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                              <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-navbar-logo">NavBar Logo (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Đường dẫn hoặc url nav bar logo của trang
                                                        web.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-navbar-logo"
                                                            value="<?=$TD->Setting('navbar-logo')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-images">Hình Thu Nhỏ</label>
                                                    <span class="form-note">Đường dẫn hoặc url hình thu nhỏ của trang
                                                        web, nếu không cần thì bỏ qua.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="site-images"
                                                            value="<?=$TD->Setting('og:image')===''?'/'. __IMG__.'/banner.png':$TD->Setting('og:image')?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Màu Giao Diện</label>
                                                    <span class="form-note">Chỉ định màu của trang web <b
                                                            class="text-primary">Auto</b> / <b
                                                            class="text-black">Dark</b> / <b>Light</b>.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select js-select2" data-search="on"
                                                            name="site-skin" data-ui="clean">
                                                            <option value="auto-theme"
                                                                <?=($TD->Setting('skin-theme')==='auto-theme')?'selected':'';?>>
                                                                Chủ Đề Tự Động</option>
                                                            <option value="dark-theme"
                                                                <?=($TD->Setting('skin-theme')==='dark-theme')?'selected':'';?>>
                                                                Chủ Đề Tối</option>
                                                            <option value="white-theme"
                                                                <?=($TD->Setting('skin-theme')==='white-theme')?'selected':'';?>>
                                                                Chủ Đề Sáng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-facebook">Link Facebook -
                                                        Fanpage (<b class="text-danger">*</b>)</label>
                                                    <span class="form-note">Khách hàng sẽ liên hệ bạn thông qua link
                                                        này.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="url" class="form-control" name="site-facebook"
                                                            value="<?=$TD->Setting('facebook')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-zalo">Link Zalo (<b
                                                            class="text-danger">*</b>)</label>
                                                    <span class="form-note">Khách hàng sẽ liên hệ bạn thông qua link
                                                        này.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="url" class="form-control" name="site-zalo"
                                                            value="<?=$TD->Setting('zalo')?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-telegram">Link Telegram</label>
                                                    <span class="form-note">Link telegram của bạn, nếu không cần thì bỏ
                                                        qua.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="url" class="form-control" name="site-telegram"
                                                            value="<?=$TD->Setting('telegram')?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-boxchat">Link Box Chat</label>
                                                    <span class="form-note">Link nhóm chat của bạn, nếu không cần thì bỏ
                                                        qua.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="url" class="form-control" name="site-boxchat"
                                                            value="<?=$TD->Setting('boxchat')?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-ads">AdSense - Script</label>
                                                    <span class="form-note">Thêm script ads nếu có vào mục goto chuyển hướng/download.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" name="site-ads" rows="3"
                                                            placeholder="eg. <script src='https://....'></script>
                                                            "><?=$TD->Setting('ads')?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-7 offset-lg-3 text-center">
                                                <div class="form-group mt-2">
                                                    <input type="hidden" name="ws-setting-info" value="action">
                                                    <button type="submit" class="btn btn-md btn-primary"><em
                                                            class="icon ni ni-check-circle-cut"></em>&ensp;Lưu Cập
                                                        Nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php elseif($current_url==='/admin/settings/security'):?>
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h5 class="title fw-medium">Cài Đặt Bảo Mật</h5>
                                            <span>Những cài đặt này giúp bạn giữ an toàn cho website của mình.</span>
                                            <span class="text-success">
                                                <em class="icon ni ni-shield-check"></em>
                                            </span>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside">
                                                <em class="icon ni ni-menu-alt-r"></em>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block" id="ws-settings-security">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Hệ Thống Bảo Vệ</h6>
                                                        <p>Hệ thống sẽ tự động cấm tạm thời khi khách hàng yêu cầu quá
                                                            nhanh hoặc quá nhiều lần
                                                            trong một khoảng thời gian nhất định.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <ul class="align-center gx-3">
                                                            <li class="order-md-last">
                                                                <div class="custom-control custom-switch me-n2 checked">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="sensitivity-anti-spam"
                                                                        <?=($TD->Setting('anti-spam')==1)?'checked':'';?>>
                                                                    <label class="custom-control-label"
                                                                        for="sensitivity-anti-spam"></label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Đăng Nhập Quản Trị</h6>
                                                        <p>Khi bật chức năng này trang đăng nhập quản trị sẽ bị ẩn,
                                                            trang đăng nhập quản trị sẽ hiện cho tất cả người dùng nếu
                                                            bạn tắt.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <ul class="align-center gx-3">
                                                            <li class="order-md-last">
                                                                <div class="custom-control custom-switch me-n2 checked">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="admin-page"
                                                                        <?=($TD->Setting('admin-page')==1)?'checked':'';?>>
                                                                    <label class="custom-control-label"
                                                                        for="admin-page"></label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Làm Mới Phiên (AES)</h6>
                                                        <p>Chức năng này lưu trữ chìa khoá bí mật (key này có tác dụng chống hacker khai thác quyền từ các thành viên khác như tài khoản, mật khẩu v.v), tất cả thành viên sẽ bị <b class="text-danger">đăng xuất khỏi website kể cả bạn</b> nếu như bạn nhấn Reset Now.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <a href="javascript:;"
                                                            class="text-nowrap reset-key-aes btn btn-dark">
                                                            <div class="spinner-border spinner-border-sm" role="status">
                                                            </div>&ensp;Reset Now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Giao Thức HTTPS và SSL Tự Động</h6>
                                                        <p>Để đảm bảo an toàn cho trang web của bạn, bạn cần một URL an
                                                            toàn. Nếu khách truy cập trang web của bạn cung cấp thông
                                                            tin cá nhân, bạn cần sử dụng HTTPS, chứ không phải HTTP, vì
                                                            vậy đây là bắt buộc cần thiết.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <button id="status-https"
                                                            class="btn <?=$TD->Setting('https')==1?'btn-primary':'btn-danger'?> text-nowrap"
                                                            data-status="<?=$TD->Setting('https')?>">
                                                            <?=$TD->Setting('https')==1?'Đang Bật':'Đang Tắt'?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                               <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Fuck Devtools</h6>
                                                        <p>Vô hiệu hoá khi mở devveloper tools (công cụ dành cho nhà phát triển) chặn tạm thời f12.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <button id="fuck-devtools"
                                                            class="btn <?=$TD->Setting('fuck-devtools')==1?'btn-primary':'btn-danger'?> text-nowrap"
                                                            data-status="<?=$TD->Setting('fuck-devtools')?>">
                                                            <?=$TD->Setting('fuck-devtools')==1?'Đang Bật':'Đang Tắt'?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text ws-baotri">
                                                        <h6>Chế Độ Bảo Trì &nbsp;
                                                            <span
                                                                class="badge <?= $TD->Setting('bao-tri')==1?'bg-success':'bg-danger'?> ms-0">
                                                                <?=$TD->Setting('bao-tri')==1?'Đang Bảo Trì':'Đã Tắt Bảo Trì'?>
                                                            </span>
                                                        </h6>
                                                        <p>Đưa trang web của bạn vào trạng thái bảo trì ngoại trừ trang
                                                            quản trị.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <button id="status-maintenance"
                                                            class="btn <?=$TD->Setting('bao-tri')==1?'btn-primary':'btn-danger'?> text-nowrap"
                                                            data-status="<?=$TD->Setting('bao-tri')?>">
                                                            <?=$TD->Setting('bao-tri')==1?'Đang Bật':'Đang Tắt'?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="form-group">
                                                    <h6>Tinh Chỉnh Lượt Xem <span
                                                            data-slider-count="<?=$TD->Setting('view-limit')?>"
                                                            class="badge rounded-pill bg-outline-light"></span></h6>
                                                    <p>Chỉ định 1 tài khoản/ip có thể xem bài viết được bao nhiêu lần,
                                                        nếu bạn set là 1, sản phẩm/bài viết đó chỉ sẽ tính 1 lượt xem
                                                        trên mõi tài khoản/ip (view thực tế), nếu bạn vẫn muốn view thật
                                                        và view ảo hãy tăng mức này lên.</p>
                                                    <div class="form-control-wrap my-4">
                                                        <div class="form-control-slider noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"
                                                            data-tooltip="true" data-min="1" data-max="10"
                                                            data-start="<?=$TD->Setting('view-limit')?>"
                                                            id="limit-view">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php elseif($current_url==='/admin/settings/transfer'):?>
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h5 class="title fw-medium">Cấu Hình Nạp Tiền</h5>
                                            <span>Các cài đặt này giúp bạn sửa đổi cài đặt trang web.</span>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside">
                                                <em class="icon ni ni-menu-alt-r"></em>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="alert alert-primary mt-2"><em
                                            class="fs-17px icon ni ni-alert-circle"></em>&nbsp;
                                        <strong>Mẹo:</strong> Trang web upload ảnh lấy link nhanh <a
                                            href="//img.thanhdieu.com/"
                                            target="_blank">https://img.thanhdieu.com/</a><br />
                                        <em class="fs-17px icon ni ni-alert-c"></em>&nbsp; <strong>Lưu Ý:</strong> Logo
                                        ngân hàng phải là ảnh đã xoá phông nền tức là ảnh dạng transparent, và chỉ cho
                                        phép thêm tối đa 2 ngân hàng!
                                    </div>
                                </div>
                                <form class="add-transfer-bank form-validate">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="ten-ngan-hang">Tên Ngân Hàng (<b
                                                        class="text-danger">*</b>)</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="ten-ngan-hang"
                                                        placeholder="Vui lòng nhập tên ngân hàng" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="logo-ngan-hang">Logo Ngân Hàng (<b
                                                        class="text-danger">*</b>)</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="logo-ngan-hang"
                                                        placeholder="Vui lòng url logo ngân hàng" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="chu-tai-khoan">Chủ Tài Khoản (<b
                                                        class="text-danger">*</b>)</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="chu-tai-khoan"
                                                        placeholder="Vui lòng tên chủ tài khoản" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="stk">Số Tài Khoản (<b
                                                        class="text-danger">*</b>)</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="stk"
                                                        placeholder="Vui lòng nhập số tài khoản" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 offset-lg-3 text-center">
                                            <div class="form-group mt-2">
                                                <input type="hidden" name="add-transfer-bank" value="action">
                                                <button type="submit" class="btn btn-md btn-primary"><i
                                                        class="ri-add-circle-line fs-15px"></i>&ensp;Thêm
                                                    Mới</button>&ensp;
                                                <button type="button" class="btn btn-md btn-danger truncate-transfer"><i
                                                        class="ri-delete-bin-2-line fs-15px"></i>&ensp;Xoá All</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <hr>
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h5 class="title fw-medium">Cấu Hình Callback</h5>
                                        <span>Tinh chỉnh nạp thẻ cào, callback và hơn thế nữa.</span>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                            data-target="userAside">
                                            <em class="icon ni ni-menu-alt-r"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form class="ws-setting-callback form-settings gy-3 form-validate is-alter">
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="thanhdieu1">Link Callback - Thẻ Cào (<b
                                                        class="text-danger">*</b>)</label>
                                                <span class="form-note">Đây là url callback nạp thẻ cào từ site
                                                    card5s.vn.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        value="<?=$website_domain?>/call-back/card5s">
                                                    <div class="input-group-append">
                                                        <a data-copy="<?=$website_domain?>/call-back/card5s"
                                                            class="btn btn-outline-primary btn-dim td-copy"><em
                                                                class="icon ni ni-copy"></em></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="cu-phap">Nội Dung Nạp Tiền (<b
                                                        class="text-danger">*</b>)</label>
                                                <span class="form-note">Chỉ định cú pháp nạp tiền ví dụ NAPTIEN.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="cu-phap"
                                                        value="<?=$TD->Setting('cuphap-transfer')?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="min-nap">Nạp Tối Thiểu (<b
                                                        class="text-danger">*</b>)</label>
                                                <span class="form-note">Chỉ định số tiền tối thiểu khách hàng phải nạp
                                                    (min nạp).</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control ws-sotien" name="min-nap"
                                                        value="<?=$TD->Setting('min-transfer')?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="partner-id">Partner ID</label>
                                                <span class="form-note">Cấu hình Partner ID nếu có.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" name="partner-id"
                                                        value="<?=$TD->Setting('partner-id')?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="partner-key">Partner Key</label>
                                                <span class="form-note">Cấu hình Partner Key nếu có.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="partner-key"
                                                        value="<?=$TD->Setting('partner-key')?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-3 text-center">
                                            <div class="form-group mt-2">
                                                <input type="hidden" name="ws-setting-callback" value="action">
                                                <button type="submit" class="btn btn-md btn-primary"><em
                                                        class="icon ni ni-check-circle-cut"></em>&ensp;Cập Nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php else:exit('<meta http-equiv="refresh"content="0;url=/admin/settings/">');endif;?>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                            data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                            data-toggle-overlay="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <h3 class="nk-block-title page-title">Cài Đặt Trang Web</h3>
                                    <div class="nk-block-des text-soft">
                                        <p>Tại đây bạn có thể thay đổi nhu cầu của mình.</p>
                                    </div>
                                </div>
                                <div class="card-inner p-0">
                                    <ul class="link-list-menu">
                                        <li class="<?=TDSideBarSetting('settings')?>">
                                            <a href="<?=(new AdminURL())->Path()?>/settings/">
                                                <em class="icon ni ni-user-fill-c"></em>
                                                <span>Cài Đặt Chung</span>
                                            </a>
                                        </li>
                                        <li class="<?=TDSideBarSetting('info')?>">
                                            <a href="<?=(new AdminURL())->Path()?>/settings/info">
                                                <em class="icon ni ni-info-fill"></em>
                                                <span>Cài Đặt Thông Tin</span>
                                            </a>
                                        </li>
                                        <li class="<?=TDSideBarSetting('security')?>">
                                            <a href="<?=(new AdminURL())->Path()?>/settings/security">
                                                <em class="icon ni ni-shield-star-fill"></em>
                                                <span>Cài Đặt Bảo Mật</span>
                                            </a>
                                        </li>
                                        <li class="<?=TDSideBarSetting('transfer')?>">
                                            <a href="<?=(new AdminURL())->Path()?>/settings/transfer">
                                                <i class="ri-bank-fill fs-15px me-3"></i>
                                                <span>Cấu Hình Nạp Tiền</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require_once('partials/foot.php');?>