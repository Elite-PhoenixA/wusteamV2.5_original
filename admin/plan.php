<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Gói Thành Viên VIP</h3>
                            <div class="nk-block-des text-soft">
                                <p>Đây là danh sách tất cả các thành viên hiện tại đã đăng ký gói.<br>
                            </div>
                        </div>
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
                                <em class="icon ni ni-more-v"></em>
                            </a>
                            <div class="toggle-expand-content" data-content="pageMenu" style="display: none;">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a data-bs-toggle="modal" href="#editBalancePlans" class="btn btn-primary">
                                        <em class="icon ni ni-edit"></em>
                                            <span>Tinh Chỉnh Giá Gói</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner-group">
                            <div class="dt-bootstrap4 no-footer">
                                <div class="datatable-wrap p-4">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist no-footer">
                                        <?php
                                class PlansList extends DatabaseConnection 
                                {
                                    public function Plans() {
                                        global $cut;
                                        $oOo = mysqli_query(self::ThanhDieuDB(), "
                                        SELECT 
                                            wp.*, 
                                            u.avatar, 
                                            u.hovaten, 
                                            u.username
                                        FROM 
                                            ws_plans wp
                                       JOIN 
                                            users u ON wp.taikhoan = u.username
                                        ORDER BY 
                                            wp.ngaymua DESC
                                    ");                                                                                     
                                        if ($oOo) {?>
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head text-nowrap">
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">ID</span>
                                                </th>
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">Người Dùng</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Tên Gói</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Giá Tiền </span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Ngày Mua</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Ngày Hết Hạn</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Trạng Thái</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($pl = mysqli_fetch_assoc($oOo)) { ?>
                                            <tr class="nk-tb-item odd">
                                                <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <?=$pl['plans_id']?></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                            <img class="ws-avatar-1"
                                                                src="/<?= __IMG__.'/users'.'/'.$pl['avatar'];?>" alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$pl['username']?>" target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($pl['hovaten']) ?></a>
                                                            <span class="tb-col-md">@<?= $pl['username'] ?></span>
                                                            <span
                                                                class="mt-2 d-md-none badge badge-dim <?= strtolower($pl['tengoi']) == 'premium' ? 'bg-success' : (strtolower($pl['tengoi']) == 'legacy' ? 'bg-secondary' : 'bg-primary') ?>"><?=ucfirst($pl['tengoi'])?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span
                                                        class="badge badge-dim <?= strtolower($pl['tengoi']) == 'premium' ? 'bg-success' : (strtolower($pl['tengoi']) == 'legacy' ? 'bg-secondary' : 'bg-primary') ?>"><?=ucfirst($pl['tengoi'])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span
                                                        class="fs-12px badge badge-dim bg-info"><?=FormatNumber::TD($pl["giatien"],2)?>đ</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span
                                                        class="fs-12px badge bg-secondary"><?=FormatTime::TD($pl["ngaymua"],1)?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span
                                                        class="fs-12px badge bg-secondary"><?=FormatTime::TD($pl["ngayhethan"],1)?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md text-nowrap">
                                                    <?php if($pl['trangthai']==1):?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-success">Hoạt
                                                        Động</span>
                                                    <?php else:?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-warning">Đã Hết
                                                        Hạn</span>
                                                    <?php endif; ?>
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
                                        (new PlansList())->Plans();
                                     ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="editBalancePlans" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-bs-dismiss="modal">
        <em class="icon ni ni-cross-sm"></em>
      </a>
      <div class="modal-body modal-body-md">
        <h5 class="modal-title">Cấu Hình Giá Gói</h5>
        <form action="#" class="mt-4">
          <div class="row g-gs">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="">Giá Gói Premium</label>
                <input type="text" class="form-control" id="" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="">Giá Gói Legacy</label>
                <input type="text" class="form-control" id="" placeholder="" value="">
              </div>
            </div>
            <div class="col-12">
              <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                <li>
                  <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Cập Nhật</button>
                </li>
                <li>
                  <a href="#" class="link link-light" data-bs-dismiss="modal">Đóng</a>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once('partials/foot.php'); ?>