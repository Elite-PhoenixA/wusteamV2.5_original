<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-inner" data-simplebar>
        <ul class="nk-menu nk-menu-md">
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">Dashboard</h6>
            </li>
            <li class="nk-menu-item home">
                <a href="<?=(new AdminURL())->Path()?>/dashboard" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-home"></em>
                    </span>
                    <span class="nk-menu-text">Trang Chủ</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="<?=(new AdminURL())->Path()?>/analytics" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-speed"></em>
                    </span>
                    <span class="nk-menu-text">Thống Kê</span>
                </a>
            </li>
            <li class="nk-menu-item has-sub products">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-property-add"></em>
                    </span>
                    <span class="nk-menu-text">Quản Lý Sản Phẩm</span>
                </a>
                <ul class="nk-menu-sub td-products">
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/create/product" class="nk-menu-link">
                            <span class="nk-menu-text"><em class="icon ni ni-plus-circle"></em> Tạo Sản Phẩm Mới</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/products/list" class="nk-menu-link">
                            <span class="nk-menu-text"><em class="icon ni ni-list-thumb"></em> Danh Sách Sản Phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/history/product" class="nk-menu-link">
                            <span class="nk-menu-text"><em class="icon ni ni-list-thumb"></em> Sản Phẩm Đã Bán</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nk-menu-item user-list">
                <a href="<?=(new AdminURL())->Path()?>/comments" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-comments"></em>
                    </span>
                    <span class="nk-menu-text">Bình Luận</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="<?=(new AdminURL())->Path()?>/activity/log" class="nk-menu-link">
                    <span class="nk-menu-icon">
                    <em class="icon ni ni-activity-round-fill"></em>
                    </span>
                    <span class="nk-menu-text">Nhật Ký Hoạt Động</span>
                </a>
            </li>
            <li class="nk-menu-item has-sub users">
                <a href="<?=(new AdminURL())->Path()?>/users/list" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-account-setting-alt"></em>
                    </span>
                    <span class="nk-menu-text">Quản Lý Thành Viên</span>
                </a>
                <ul class="nk-menu-sub td-users">
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/users/list" class="nk-menu-link">
                            <span class="nk-menu-text"><em class="icon ni ni-list-thumb"></em>
                                Danh Sách Thành Viên</span>
                        </a>
                    </li>
                    <!-- <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/users/banned" class="nk-menu-link">
                            <span class="nk-menu-text"><em class="icon ni ni-na"></em>
                            Thành Viên Bị Cấm</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="nk-menu-item report">
                <a href="<?=(new AdminURL())->Path()?>/handle/report" class="nk-menu-link">
                    <span class="nk-menu-icon">
                    <em class="icon ni ni-report"></em>
                    </span>
                    <span class="nk-menu-text">Duyệt Đơn Tố Cáo <span data-bs-toggle="tooltip" title="Hiện có <?=$totals->ReportPending()?> đơn tố cáo đang chờ cần xử lý." class="badge badge-dim rounded-pill bg-<?=($totals->ReportPending()==0?'success':'warning')?>"><?=$totals->ReportPending()?></span></span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="<?=(new AdminURL())->Path()?>/verify" class="nk-menu-link">
                    <span class="nk-menu-icon">
                    <em class="icon ni ni-check-circle fs-18px"></em>
                    </span>
                    <span class="nk-menu-text">Duyệt Đơn Xác Minh <span data-bs-toggle="tooltip" title="Hiện có <?=$totals->VerifyPending()?> đơn tố cáo đang chờ cần xử lý." class="badge badge-dim rounded-pill bg-<?=($totals->VerifyPending()==0?'success':'warning')?>"><?=$totals->VerifyPending()?></span></span>
                </a>
            </li>
            <li class="nk-menu-item has-sub bank">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon">
                    <i class="ri-bank-line fs-16px"></i>
                    </span>
                    <span class="nk-menu-text">Quản Lý Nạp Tiền</span>
                </a>
                <ul class="nk-menu-sub td-bank">
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/history/card" class="nk-menu-link">
                            <span class="nk-menu-text"><i class="ri-bank-card-line"></i> Lịch Sử Nạp Thẻ Cào</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/history/bank" class="nk-menu-link">
                            <span class="nk-menu-text"><i class="ri-bank-fill"></i> Lịch Sử Nạp Ngân Hàng</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="<?=(new AdminURL())->Path()?>/manager/payment" class="nk-menu-link">
                            <span class="nk-menu-text"><i class="ri-tools-line"></i> Cài Đặt Nạp Tiền</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nk-menu-item">
                <a href="<?=(new AdminURL())->Path()?>/manager/plan" class="nk-menu-link">
                    <span class="nk-menu-icon">
                    <i class="ri-vip-crown-2-line fs-16px"></i>
                    </span>
                    <span class="nk-menu-text">Gói Thành Viên</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="<?=(new AdminURL())->Path()?>/cron-jobs" class="nk-menu-link">
                    <span class="nk-menu-icon">
                    <i class="ri-calendar-schedule-line fs-16px"></i>
                    </span>
                    <span class="nk-menu-text">Cron Jobs</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="<?=(new AdminURL())->Path()?>/settings/" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-setting-alt"></em>
                    </span>
                    <span class="nk-menu-text">Cài Đặt</span>
                </a>
            </li>
        </ul>
    </div>
</div>