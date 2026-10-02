<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Tổng Quan Thống Kê <span class="badge bg-danger">Tạm đóng</span></h3>
              <div class="nk-block-des text-soft">
                <p>Chào mừng bạn đến với Bảng điều khiển phân tích.</p>
              </div>
            </div>
            <div class="nk-block-head-content">
              <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
                  <em class="icon ni ni-more-v"></em>
                </a>
                <div class="toggle-expand-content" data-content="pageMenu">
                  <ul class="nk-block-tools g-3">
                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown">
                          <em class="d-none d-sm-inline icon ni ni-calender-date"></em>
                          <span>30 Ngày Trước</span>
                          <em class="dd-indc icon ni ni-chevron-right"></em>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <ul class="link-list-opt no-bdr">
                            <li>
                              <a href="#">
                                <span>30 Ngày Trước</span>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <span>6 Tháng Trước</span>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <span>1 Năm Trước</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="nk-block-tools-opt">
                      <a href="#" class="btn btn-primary">
                        <em class="icon ni ni-reports"></em>
                        <span>Báo Cáo</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="nk-block">
          <div class="row g-gs">
            <div class="col-12">
              <ul class="row g-gs preview-icon-svg">
                <li class="col-lg-3 col-sm-6 col-12">
                  <div class="preview-icon-box card card-bordered">
                    <div class="preview-icon-wrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                        <rect x="5" y="5" width="53.97" height="69.95" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                        <path d="M51.66,15H22.4A7.22,7.22,0,0,0,15,22V78a7.21,7.21,0,0,0,7.41,7H61.56A7.2,7.2,0,0,0,69,78V30.5Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <polyline points="68.96 30.98 51.97 30.91 51.97 15.99" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                        <line x1="23" y1="34" x2="44" y2="34" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="23" y1="42" x2="57" y2="42" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="23" y1="50" x2="57" y2="50" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="23" y1="58" x2="32" y2="58" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <ellipse cx="61.1" cy="61.11" rx="23.9" ry="23.89" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></ellipse>
                        <polygon points="69.56 74.43 47.7 52.84 52.46 48.15 74.32 69.74 69.56 74.43" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon>
                        <line x1="54.98" y1="51.16" x2="54.22" y2="51.91" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="57.62" y1="53.77" x2="55.59" y2="55.78" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="71.22" y1="67.2" x2="70.46" y2="67.95" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="68.87" y1="64.88" x2="66.84" y2="66.89" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <path d="M69.55,48.21l5,4.89L55.42,72H51V67.6Z" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <line x1="65.67" y1="52.24" x2="70.35" y2="56.86" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                      </svg>
                    </div>
                    <div>
                      <span class="title fw-bold fs-17px">Sản Phẩm</span>
                      <span class="fw-medium"><?=$totals->Products();?></span>
                    </div>
                    <a class="fw-medium" href="<?=(new AdminURL())->Path()?>/create/product">Thêm Sản Phẩm</a>
                  </div>
                </li>
                <li class="col-lg-3 col-sm-6 col-12">
                  <div class="preview-icon-box card card-bordered">
                    <div class="preview-icon-wrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                        <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                        <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                        <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                        <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2"></line>
                        <circle cx="53" cy="23" r="2" fill="#c4cefe"></circle>
                        <circle cx="60" cy="23" r="2" fill="#c4cefe"></circle>
                        <circle cx="67" cy="23" r="2" fill="#c4cefe"></circle>
                        <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                        <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                        <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                      </svg>
                    </div>
                    <div>
                      <span class="title fw-bold fs-17px">Diễn Đàn</span>
                      <span class="fw-medium">12</span>
                    </div>
                    <a class="fw-medium" href="<?=(new AdminURL())->Path()?>/forums/post-list">Xem Bài Viết</a>
                  </div>
                </li>
                <li class="col-lg-3 col-sm-6 col-12">
                  <div class="preview-icon-box card card-bordered">
                    <div class="preview-icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><path d="M62.92,87H10.08A4.08,4.08,0,0,1,6,82.92V7.08A4.08,4.08,0,0,1,10.08,3H47.82L67,21.23V82.92A4.08,4.08,0,0,1,62.92,87ZM47,3V16.92A4,4,0,0,0,50.88,21H66" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"></path><line x1="14" y1="14" x2="28" y2="14" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="19" x2="36" y2="19" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="37" x2="28" y2="37" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="42" x2="45" y2="42" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="49" x2="40" y2="49" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="56" x2="32" y2="56" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="63" x2="38" y2="63" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><line x1="14" y1="70" x2="30" y2="70" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line><path d="M67,40h9a9.59,9.59,0,0,0,8,8.32s.89,19-17,27.68C49.12,67.28,50,48.32,50,48.32A9.59,9.59,0,0,0,58,40Z" fill="#6576ff"></path><path d="M67,72.51C52.12,65.35,52.86,49.82,52.86,49.82A7.94,7.94,0,0,0,59.52,43H67Z" fill="#fff"></path><path d="M62,61.77a11.05,11.05,0,0,1,12,0V65H62Z" fill="#fff"></path><circle cx="68.5" cy="54.5" r="3.5" fill="#fff"></circle><path d="M68.47,58.13a4,4,0,1,1,4-4,4,4,0,0,1-4,4Zm0-6.92a3,3,0,1,0,3,3,3,3,0,0,0-3-3Zm0,0" fill="#6576ff"></path><path d="M74.5,66h-13a.51.51,0,0,1-.5-.5V62.1a1.46,1.46,0,0,1,.69-1.25,12.32,12.32,0,0,1,12.66,0A1.46,1.46,0,0,1,75,62.1v3.41a.49.49,0,0,1-.5.49ZM62,65H74V62.09a.47.47,0,0,0-.22-.41,11.28,11.28,0,0,0-11.56,0,.47.47,0,0,0-.22.41Zm.53,0" fill="#6576ff"></path></svg>
                    </div>
                    <div>
                      <span class="title fw-bold fs-17px">Đình Chỉ</span>
                      <span class="fw-medium"><?=$totals->BannedUsers();?></span>
                    </div>
                    <a class="fw-medium" href="<?=(new AdminURL())->Path()?>/users/banned">Xem Tài Khoản Bị Cấm</a>
                  </div>
                </li>
                <li class="col-lg-3 col-sm-6 col-12">
                  <div class="preview-icon-box card card-bordered">
                    <div class="preview-icon-wrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                        <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff"></path>
                        <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff"></rect>
                        <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                        <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                        <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                        <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                        <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                        <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff"></path>
                        <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff"></path>
                        <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2"></path>
                        <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                        <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                        <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                        <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                        <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                        <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                        <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                      </svg>
                    </div>
                    <div>
                      <span class="title fw-bold fs-17px">Bình Luận</span>
                      <span class="fw-medium"><?=$totals->Comments();?></span>
                    </div>
                    <a class="fw-medium" href="<?=(new AdminURL())->Path()?>/comments">Xem Bình Luận</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-lg-7 col-xxl-6">
              <div class="card card-bordered h-100">
                <div class="card-inner">
                  <div class="card-title-group pb-3 g-2">
                    <div class="card-title card-title-sm">
                      <h6 class="title">Tổng quan về khách hàng</h6>
                      <p>Người dùng, lượt yêu cầu, số liệu tỷ lệ thoát của bạn có xu hướng như thế nào.</p>
                    </div>
                    <div class="card-tools shrink-0 d-none d-sm-block">
                      <ul class="nav nav-switch-s2 nav-tabs bg-white">
                        <li class="nav-item">
                          <a href="#" class="nav-link">7 Ngày</a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link active">1 Tháng</a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">3 Tháng</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="analytic-ov">
                    <div class="analytic-data-group analytic-ov-group g-3">
                      <div class="analytic-data analytic-ov-data">
                        <div class="title">Người Dùng</div>
                        <div class="amount">2.57K</div>
                        <div class="change up">
                          <em class="icon ni ni-arrow-long-up"></em>12.37%
                        </div>
                      </div>
                      <div class="analytic-data analytic-ov-data">
                        <div class="title">Lượt Yêu Cầu</div>
                        <div class="amount">3.98K</div>
                        <div class="change up">
                          <em class="icon ni ni-arrow-long-up"></em>47.74%
                        </div>
                      </div>
                      <div class="analytic-data analytic-ov-data">
                        <div class="title">Xxx</div>
                        <div class="amount">28.49%</div>
                        <div class="change down">
                          <em class="icon ni ni-arrow-long-down"></em>12.37%
                        </div>
                      </div>
                      <div class="analytic-data analytic-ov-data">
                        <div class="title">Xxx</div>
                        <div class="amount">7m 28s</div>
                        <div class="change down">
                          <em class="icon ni ni-arrow-long-down"></em>0.35%
                        </div>
                      </div>
                    </div>
                    <div class="analytic-ov-ck">
                      <canvas class="analytics-line-large" id="analyticOvData" style="display: block; box-sizing: border-box; height: 175px; width: 468px;" width="468" height="175"></canvas>
                    </div>
                    <div class="chart-label-group ms-5">
                      <div class="chart-label">01 Jan, 2020</div>
                      <div class="chart-label d-none d-sm-block">15 Jan, 2020</div>
                      <div class="chart-label">30 Jan, 2020</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xxl-3">
              <div class="card card-bordered h-100">
                <div class="card-inner">
                  <div class="card-title-group">
                    <div class="card-title card-title-sm">
                      <h6 class="title">Traffic Channel</h6>
                    </div>
                    <div class="card-tools">
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-bs-toggle="dropdown">30 Days</a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                          <ul class="link-list-opt no-bdr">
                            <li>
                              <a href="#">
                                <span>7 Days</span>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <span>15 Days</span>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <span>30 Days</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="traffic-channel">
                    <div class="traffic-channel-doughnut-ck">
                      <canvas class="analytics-doughnut" id="TrafficChannelDoughnutData" style="display: block; box-sizing: border-box; height: 160px; width: 312px;" width="312" height="160"></canvas>
                    </div>
                    <div class="traffic-channel-group g-2">
                      <div class="traffic-channel-data">
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#9cabff" style="background: rgb(156, 171, 255);"></span>
                          <span>Organic Search</span>
                        </div>
                        <div class="amount">4,305 <small>58.63%</small>
                        </div>
                      </div>
                      <div class="traffic-channel-data">
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#b8acff" style="background: rgb(184, 172, 255);"></span>
                          <span>Social Media</span>
                        </div>
                        <div class="amount">859 <small>23.94%</small>
                        </div>
                      </div>
                      <div class="traffic-channel-data">
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#ffa9ce" style="background: rgb(255, 169, 206);"></span>
                          <span>Referrals</span>
                        </div>
                        <div class="amount">482 <small>12.94%</small>
                        </div>
                      </div>
                      <div class="traffic-channel-data">
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#f9db7b" style="background: rgb(249, 219, 123);"></span>
                          <span>Others</span>
                        </div>
                        <div class="amount">138 <small>4.49%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card card-bordered h-100">
                <div class="card-inner">
                  <div class="card-title-group align-start pb-3 g-2">
                    <div class="card-title card-title-sm">
                      <h6 class="title">Website Performance</h6>
                      <p>How has performend this month.</p>
                    </div>
                    <div class="card-tools">
                      <em class="card-hint icon ni ni-help" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Performance of this month" data-bs-original-title="Performance of this month"></em>
                    </div>
                  </div>
                  <div class="analytic-wp">
                    <div class="analytic-wp-group g-3">
                      <div class="analytic-data analytic-wp-data">
                        <div class="analytic-wp-graph">
                          <div class="title">Bounce Rate <span>(avg)</span>
                          </div>
                          <div class="analytic-wp-ck">
                            <canvas class="analytics-line-small" id="BounceRateData" style="display: block; box-sizing: border-box; height: 36px; width: 150px;" width="150" height="36"></canvas>
                          </div>
                        </div>
                        <div class="analytic-wp-text">
                          <div class="amount amount-sm">23.59%</div>
                          <div class="change up">
                            <em class="icon ni ni-arrow-long-up"></em>4.5%
                          </div>
                          <div class="subtitle">vs. last month</div>
                        </div>
                      </div>
                      <div class="analytic-data analytic-wp-data">
                        <div class="analytic-wp-graph">
                          <div class="title">Pageviews <span>(avg)</span>
                          </div>
                          <div class="analytic-wp-ck">
                            <canvas class="analytics-line-small" id="PageviewsData" style="display: block; box-sizing: border-box; height: 36px; width: 150px;" width="150" height="36"></canvas>
                          </div>
                        </div>
                        <div class="analytic-wp-text">
                          <div class="amount amount-sm">5.48</div>
                          <div class="change down">
                            <em class="icon ni ni-arrow-long-down"></em>-1.48%
                          </div>
                          <div class="subtitle">vs. last month</div>
                        </div>
                      </div>
                      <div class="analytic-data analytic-wp-data">
                        <div class="analytic-wp-graph">
                          <div class="title">New Users <span>(avg)</span>
                          </div>
                          <div class="analytic-wp-ck">
                            <canvas class="analytics-line-small" id="NewUsersData" style="display: block; box-sizing: border-box; height: 36px; width: 150px;" width="150" height="36"></canvas>
                          </div>
                        </div>
                        <div class="analytic-wp-text">
                          <div class="amount amount-sm">549</div>
                          <div class="change up">
                            <em class="icon ni ni-arrow-long-up"></em>6.8%
                          </div>
                          <div class="subtitle">vs. last month</div>
                        </div>
                      </div>
                      <div class="analytic-data analytic-wp-data">
                        <div class="analytic-wp-graph">
                          <div class="title">Time on Site <span>(avg)</span>
                          </div>
                          <div class="analytic-wp-ck">
                            <canvas class="analytics-line-small" id="TimeOnSiteData" style="display: block; box-sizing: border-box; height: 36px; width: 150px;" width="150" height="36"></canvas>
                          </div>
                        </div>
                        <div class="analytic-wp-text">
                          <div class="amount amount-sm">3m 35s</div>
                          <div class="change up">
                            <em class="icon ni ni-arrow-long-up"></em>1.4%
                          </div>
                          <div class="subtitle">vs. last month</div>
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
    </div>
  </div>
</div>
<?php require_once('partials/foot.php');?>