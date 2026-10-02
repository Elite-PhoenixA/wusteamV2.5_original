<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<?php
/**
 * @author Vương Thanh Diệu
 */
class WsViewReports extends DatabaseConnection
 {
    private $current_url;

    public function __construct($current_url) {
        $this->current_url = $current_url;
    }
    public function ReportID() {
        return preg_replace('/[^0-9a-zA-Z\-]/','',strtok(basename($this->current_url),'?'));
    }
    public function TDGetReport($reportID) {
        $vtd = self::ThanhDieuDB()->prepare("SELECT ws_reports.*, users.*, ws_reports.username AS username_reporter
        FROM ws_reports
        JOIN users ON users.username = ws_reports.victim
        WHERE MD5(ws_reports.id_report) = ?
        ");
        $vtd->bind_param("s", $reportID);
        $vtd->execute();
        $wusTeam = $vtd->get_result();
        if ($wusTeam && $wusTeam->num_rows > 0) {
            $reportData = $wusTeam->fetch_assoc();
            return $reportData;
        } else {
            exit('<meta http-equiv="refresh" content="0; url=/admin/handle/report">'); 
        }
    }
}
$Report = new WsViewReports($current_url);
$reportID = $Report->ReportID();
$reportData = $Report->TDGetReport($reportID);
?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">User / <strong
                                    class="text-primary small"><?=THANHDIEU($reportData['hovaten'])?></strong>
                            </h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>Victim ID: <span class="text-base"><?=$reportData['id_report']?></span>
                                    </li>
                                    <li>Submited At: <span
                                            class="text-base"><?=date('\N\g\à\y j \T\h\á\n\g n \Nă\m Y',strtotime($reportData['created_at']))?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="#" onclick="window.history.go(-1);return false;"
                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Quay lại</span>
                            </a>
                            <a href="#" onclick="location.href=document.referrer;return false;"
                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning alert-dismissible">
                    <em class="icon ni ni-alert-circle"></em>&ensp;Chỉ chấp nhận các đơn tố cáo đúng sự thật, nếu đơn tố
                    cáo không đủ bằng chứng hoặc thuyết phục, vui lòng từ chối đơn tố cáo hoặc không cần làm gì cả!
                </div>
                <div class="nk-block thanhdieu-refresh">
                    <div class="row gy-5">
                        <div class="col-lg-5">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Thông Tin Tố Cáo</h5>
                                    <p>Lý do vi phạm, hình ảnh bằng chứng, trạng thái, v.v.</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Lý Do Vi Phạm</div>
                                            <div class="data-value"><?=THANHDIEU($reportData['reason'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Lý Do Khác</div>
                                            <div class="data-value">
                                                <?=($reportData['reason_other']==null?'Không có':THANHDIEU($reportData['reason_other']))?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Url Vi Phạm</div>
                                            <div class="data-value"><a href="<?=THANHDIEU($reportData['url_report'])?>"
                                                    target="_blank"
                                                    rel="noopener noreferrer"><?=$cut->characters($reportData['url_report'],35)?></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Mô Tả</div>
                                            <div class="data-value"><?=THANHDIEU($reportData['desc_content'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Bằng Chứng</div>
                                            <div class="data-value">
                                                <div class="user-card sq">
                                                    <?php foreach (explode(',',$reportData['images']) as $image):?>
                                                    <img data-fancybox="gallery"
                                                        data-caption="<?=THANHDIEU($reportData['reason'])?>"
                                                        style="border-radius:6px!important;"
                                                        src="/<?= __IMG__ ?>/uploads/bang-chung/<?=$image?>"
                                                        alt="Bằng chứng vi phạm">&ensp;
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Thời Gian</div>
                                            <div class="data-value"><?=FormatTime::TD($reportData["created_at"])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Trạng Thái</div>
                                            <div class="data-value">
                                                <?php if($reportData['status']=='accept'):?>
                                                <span class="badge badge-dot badge-dot-xs bg-success">Đã Chấp
                                                    Nhận</span>
                                                <?php elseif($reportData['status']=='reject'): ?>
                                                <span class="badge badge-dot badge-dot-xs bg-danger">Đã Từ Chối</span>
                                                <?php else:?>
                                                <span class="badge badge-dot badge-dot-xs bg-warning">Chờ Xử Lý</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Thao Tác</div>
                                            <div class="data-value">
                                                <?php if ($reportData['status'] == 'pending'): ?>
                                                <a class="btn btn-sm btn-success btn-dim ws-handle-report ws-accept-report"
                                                    data-bs-toggle="tooltip"
                                                    data-id-report="<?=$reportData['id_report']?>"
                                                    data-username-reporter="<?=$reportData['username_reporter']?>"
                                                    data-username-victim="<?=$reportData['victim']?>"
                                                    data-bs-original-title="Nhấn để chấp nhận đơn tố cáo này là đúng sự thật.">
                                                    <i class="ri-checkbox-circle-line"></i>&ensp;Chấp Nhận
                                                </a>
                                                <?php endif; ?>&nbsp;

                                                <?php if ($reportData['status'] == 'accept'): ?>
                                                <a class="btn btn-sm btn-primary btn-dim" disabled><i
                                                        class="ri-checkbox-circle-line"></i>&ensp;Đã Chấp Nhận</a>
                                                <?php elseif ($reportData['status'] == 'reject'): ?>
                                                <a class="btn btn-sm btn-danger btn-dim" disabled><i
                                                        class="ri-prohibited-line"></i>&ensp;Đã Từ Chối</a>
                                                <?php else: ?>
                                                <a class="btn btn-sm btn-danger btn-dim ws-handle-report ws-reject-report"
                                                    data-id-report="<?=$reportData['id_report']?>"
                                                    data-username-reporter="<?=$reportData['username_reporter']?>"
                                                    data-username-victim="<?=$reportData['victim']?>"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="Nhấn để từ chối đơn tố cáo này là sai sự thật.">
                                                    <i class="ri-prohibited-line"></i>&ensp;Từ Chối
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Thông Tin Lý Lịch</h5>
                                    <p>Thông tin cơ bản, như tên, email, ip, tiểu sử.</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Họ Và Tên</div>
                                            <div class="data-value"><?=THANHDIEU($reportData['hovaten'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Tài Khoản</div>
                                            <div class="data-value">@<?=THANHDIEU($reportData['victim'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Địa Chỉ Email</div>
                                            <div class="data-value">
                                                <?=(valid_email($reportData['email']))?$reportData['email']:'Chưa xác minh'?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Tiểu Sử</div>
                                            <div class="data-value"><?=THANHDIEU($reportData['tieusu'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">IP</div>
                                            <div class="data-value"><?=THANHDIEU($reportData['ip'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Ngày Đăng Ký</div>
                                            <div class="data-value">
                                                <?=THANHDIEU(FormatTime::TD($reportData['ngaythamgia']))?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Giới Tính</div>
                                            <div class="data-value"><?=THANHDIEU($reportData['gender'])?></div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Số Dư</div>
                                            <div class="data-value">
                                                <?=THANHDIEU(FormatNumber::TD($reportData['sodu']))?>đ</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Tổng Tiêu</div>
                                            <div class="data-value">
                                                <?=THANHDIEU(FormatNumber::TD($reportData['tongtieu']))?>đ</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Tổng Nạp</div>
                                            <div class="data-value">
                                                <?=THANHDIEU(FormatNumber::TD($reportData['tongnap']))?>đ</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label fw-bold">Hoa Hồng</div>
                                            <div class="data-value">
                                                <?=THANHDIEU(FormatNumber::TD($reportData['hoahong']))?>đ</div>
                                        </div>
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
<?php require_once('partials/foot.php'); ?>