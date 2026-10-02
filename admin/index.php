<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<style>.nk-top-products .item{display:flex;align-items:center;padding:.625rem 0;line-height:1.2}.nk-top-products .thumb{width:44px;margin-right:1rem}.nk-top-products .thumb img{border-radius:4px}.nk-top-products .total{margin-left:auto;text-align:right}.nk-top-products .amount,.nk-top-products .title{font-size:.9375rem;color:var(--bs-body-color);margin-bottom:.25rem}.nk-top-products .count,.nk-top-products .price{font-size:.8125rem;color:var(--bs-body-color);margin-bottom:1px}.nk-store-statistics .item{display:flex;align-items:center;justify-content:space-between;padding:.5rem 0}.nk-store-statistics .title{font-size:.8125rem;color:var(--bs-body-color)}.nk-store-statistics .count{font-size:1.25rem;color:var(--bs-body-color);font-weight:700}.nk-store-statistics .icon{display:flex;align-items:center;justify-content:center;font-size:1.5rem;height:44px;width:44px;border-radius:6px}</style>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-12">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title mb-4">
                                        <h3 class="title">Chào Mừng Đến Dashboard!</h3>
                                    </div>
                                    <div class="row g-gs">
                                        <div class="col-xxl-3">
                                            <div class="fake-class">
                                                <h5 class="title">Bắt Đầu</h5>
                                                <div class="nk-block-des text-soft">
                                                    <p>Bạn có thể tùy chỉnh trang web của mình từ đây.</p>
                                                </div>
                                                <a href="./settings" class="btn btn-primary btn-lg mt-4">Đến Cài Đặt
                                                    Trang&ensp;👉</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xxl-3">
                                            <div class="fake-class">
                                                <h5 class="title">Phím Tắt</h5>
                                                <ul class="link-list is-compact pb-0">
                                                    <li>
                                                        <a href="create/product">
                                                            <em class="icon ni ni-property-add"></em>
                                                            <span>Đăng Bán Sản Phẩm</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="create/forum">
                                                            <em class="icon ni ni-file-text"></em>
                                                            <span>Đăng Bài Viết Diễn Đàn</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/#/view-home-page/">
                                                            <em class="icon ni ni-laptop"></em>
                                                            <span>Xem Website Của Bạn</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xxl-3">
                                            <div class="fake-class">
                                                <h5 class="title">Dữ Liệu Nhanh</h5>
                                                <ul class="link-list is-compact pb-0">
                                                    <li>
                                                        <a href="products/list">
                                                            <em class="icon ni ni-edit-fill"></em>
                                                            <span><?=$totals->Products();?> Mã Nguồn Đã Đăng</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="forum/list">
                                                            <em class="icon ni ni-notes-alt"></em>
                                                            <span>21 Bài Viết Trên Diễn Đàn</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="comments">
                                                            <em class="icon ni ni-comments"></em>
                                                            <span><?=$totals->Comments();?> Bình Luận</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xxl-3">
                                            <div class="fake-class">
                                                <h5 class="title">Hành Động Thêm</h5>
                                                <ul class="link-list is-compact pb-0">
                                                    <li>
                                                        <a href="<?=(new AdminURL())->Path()?>/settings/security">
                                                            <em class="icon ni ni-shield-half"></em>
                                                            <span>Chức Năng Bảo Vệ</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?=(new AdminURL())->Path()?>/settings/security">
                                                            <em class="icon ni ni-cc-secure"></em>
                                                            <span>Chức Năng Back-Up SQL</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <em class="icon ni ni-more-h"></em>
                                                            <span>Xem Thêm Chức Năng</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group g-2">
                                        <div class="card-title card-title-sm">
                                            <h6 class="title">Thông Báo Trang Chủ</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <form class="modal-popup form-validate is-alter">
                                        <div class="row g-gs align-center">
                                            <div class="col-12">
                                                <div class="form-control-wrap">
                                                    <label class="form-label" for="content">Nội Dung</label>
                                                    <textarea
                                                        class="form-control form-control-sm no-resize summernote-basic"
                                                        name="content" placeholder="Bạn đang nghĩ gì vậy?!"
                                                        required><?=$TD->Setting('modal-content')?></textarea>
                                                </div>
                                                <input type="hidden" name="action" value="vtd-modal-system">
                                                <div class="form-group mt-4">
                                                    <button type="submit" class="btn btn-primary"><em
                                                            class="ni ni-check-circle-fill"></em>&nbsp;Lưu Lại</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <div class="card-title-group mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Thống Kê Dữ Liệu</h6>
                                        </div>
                                    </div>
                                    <ul class="nk-store-statistics">
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Mã Nguồn Đã Bán</div>
                                                <div class="count"><?=FormatNumber::TD($totals->HistoryProducts(),2)?></div>
                                            </div>
                                            <em class="icon bg-primary-dim ni ni-scissor"></em>
                                        </li>
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Tổng Thành Viên</div>
                                                <div class="count"><?=FormatNumber::TD($totals->Users(),2)?></div>
                                            </div>
                                            <em class="icon bg-info-dim ni ni-users"></em>
                                        </li>
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Tổng Sản Phẩm</div>
                                                <div class="count"><?=FormatNumber::TD($totals->Products(),2)?></div>
                                            </div>
                                            <em class="icon bg-pink-dim ni ni-code"></em>
                                        </li>
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Tổng Bài Viết</div>
                                                <div class="count">0</div>
                                            </div>
                                            <em class="icon bg-purple-dim ni ni-notes-alt"></em>
                                        </li>
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Tổng Thành Viên Bị Cấm</div>
                                                <div class="count"><?=FormatNumber::TD($totals->BannedUsers(),2)?></div>
                                            </div>
                                            <em class="icon bg-purple-dim ni ni-na"></em>
                                        </li>
                                        <li class="item">
                                            <div class="info">
                                                <div class="title">Tổng Bình Luận</div>
                                                <div class="count"><?=FormatNumber::TD($totals->Comments(),2)?></div>
                                            </div>
                                            <em class="icon bg-purple-dim ni ni-comments"></em>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3 thanhdieu-refresh">
                            <div class="card card-bordered h-100">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group g-2">
                                        <div class="card-title card-title-sm">
                                            <h6 class="title text-nowrap">Hoạt Động Gần Đây<span
                                                    class="badge rounded-pill badge-dim bg-outline-success"><?=$totals->Logs()?></span>
                                            </h6>
                                        </div>
                                        <div class="card-tools">
                                            <a data-bs-toggle="tooltip" title="Nhấn để xoá tất cả"
                                                class="text-nowrap btn btn-sm btn-outline-light btn-white truncate-logs"><em
                                                    class="icon ni ni-trash-alt fs-13px"></em>&nbsp;Xoá All</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-activity">
                                    <?php 
                               if (($VTD = $thanhdieudb->query("SELECT ws_logs.*, users.* FROM ws_logs INNER JOIN users ON ws_logs.username = users.username ORDER BY ws_logs.time DESC LIMIT 5")) && $VTD->num_rows > 0) { 
                                while ($log = $VTD->fetch_assoc()) { ?>
                                    <li class="nk-activity-item">
                                        <div class="nk-activity-media user-avatar">
                                            <img class="ws-avatar-1" src="/<?=__IMG__?>/users/<?=$log['avatar'];?>"
                                                alt="<?=$log['hovaten'];?>">
                                        </div>
                                        <div class="nk-activity-data">
                                            <div class="label"><b><?=$log['hovaten'];?></b> <?=$log['content'];?></div>
                                            <span class="time time-ago"
                                                data-timeago="<?=$log['time'];?>"><?=$log['time'];?></span>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } else { ?>
                                <div class="nk-activity-item">
                                    <span class="tb-sub">Chưa có có dữ liệu</span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('partials/foot.php'); ?>