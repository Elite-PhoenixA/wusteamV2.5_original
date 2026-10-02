<?php include 'partials/head.php'; ?>
<?php include 'partials/nav.php'; ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Tác Vụ Cron Jobs</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs flex-row-reverse">
                        <div class="col-xxl-7">
                            <div class="card card-bordered card-stretch">
                                <div class="card">
                                    <div class="card-inner-group">
                                        <div class="dt-bootstrap4 no-footer">
                                            <div class="datatable-wrap p-4">
                                                <table class="datatable-init nk-tb-list nk-tb-ulist no-footer">
                            <?php
                                 class CronJob extends DatabaseConnection 
                                                             {
                                    public function CronJob() {
                                        global $cut;
                                        $oOo = mysqli_query(self::ThanhDieuDB(), "SELECT * FROM  ws_cronjobs ORDER BY created_at DESC");                                                                                     
                                        if ($oOo) {?>
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head text-nowrap">
                                                            <th class="nk-tb-col sorting">
                                                                <span class="sub-text">ID</span>
                                                            </th>
                                                            <th class="nk-tb-col sorting">
                                                                <span class="sub-text">Tên Nhiệm Vụ</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md sorting">
                                                                <span class="sub-text">Nội Dung</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg sorting">
                                                                <span class="sub-text">Url Công Việc </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md sorting">
                                                                <span class="sub-text">Thời Gian Tác Vụ</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md sorting">
                                                                <span class="sub-text">Điếm Ngược Cron</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md sorting">
                                                                <span class="sub-text">Trạng Thái</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                            while ($cron = mysqli_fetch_assoc($oOo)) { ?>
                                                        <tr class="nk-tb-item odd">
                                                            <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                                <div
                                                                    class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <?=$cron['cron_id']?></label>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <span class="badge badge-dim"></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span class="badge badge-dim"></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg text-nowrap">
                                                                <span class="fs-12px badge badge-dim bg-info"></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg text-nowrap">
                                                                <span class="fs-12px badge bg-secondary"></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg text-nowrap">
                                                                <span class="fs-12px badge bg-secondary"></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg text-nowrap">
                                                                <span class="fs-12px badge bg-secondary"></span>
                                                            </td>
                                                            <?php }?>
                                                    </tbody>
                                                    <?php }  else { ?>
                                                    <tr>
                                                        <td colspan="8">Chưa có dữ liệu.</td>
                                                    </tr>
                                                    <?php }
                                         }
                                        }
                                        (new CronJob())->CronJob();
                                     ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <form class="create-cron-job">
                                        <div class="row g-3 align-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Tên Nhiệm Vụ</label>
                                                    <span class="form-note">Tên nhiệm vụ của cron-job này.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Tên nhiệm vụ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center mt-0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="url">URL Mục Tiêu</label>
                                                    <span class="form-note">Liên kết cần thực thi cron-jobs.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="url"
                                                            placeholder="Liên kết cần cron job">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center mt-0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="time-job">Thời Gian</label>
                                                    <span class="form-note">Khoảng thời gian nhiệm vụ cron-job.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap ">
                                                        <div class="form-control-select">
                                                            <select class="form-control" name="time-job">
                                                                <option value="30">30 Giây</option>
                                                                <option value="120">2 Phút</option>
                                                                <option value="300">5 Phút</option>
                                                                <option value="600">10 Phút</option>
                                                                <option value="900">15 Phút</option>
                                                                <option value="1800">30 Phút</option>
                                                                <option value="3600">1 Tiếng</option>
                                                                <option value="7200">2 Tiếng</option>
                                                                <option value="86400">1 Ngày</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center mt-0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Mô Tả</label>
                                                    <span class="form-note">Mô tả công việc cronjob.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control form-control-sm no-resize"
                                                        name="description"
                                                        placeholder="Mô tả công việc cronjob."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-md btn-primary"><em
                                                            class="icon ni ni-plus me-1"></em>Tạo Cron
                                                        jobs</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/foot.php'; ?>