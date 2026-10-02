<?php include 'partials/head.php'; ?>
<?php include 'partials/nav.php'; ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Danh Sách Thành Viên</h3>
                            <div class="nk-block-des text-soft">
                                <p>Hiện có tổng cộng <?=$totals->Users()?> thành viên (bao gồm các tài khoản bị đình chỉ)
                                </p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a data-bs-toggle="modal" href="#addUser" class="btn btn-icon btn-primary d-md-none">
                                <em class="icon ni ni-plus"></em>
                            </a>
                            <a data-bs-toggle="modal" href="#addUser" class="btn btn-primary d-none d-md-inline-flex">
                                <em class="icon ni ni-plus"></em>
                                <span>Tạo Thành Viên</span>
                            </a>
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
                                /**
                                * @author Vương Thanh Diệu
                                */
                                class DanhSachThanhVien extends DatabaseConnection 
                                 {
                                    public function ShowUsers() {
                                        $oOo = mysqli_query(self::ThanhDieuDB(),"SELECT users.*, ws_plans.tengoi AS plans
                                        FROM users
                                        LEFT JOIN ws_plans ON users.username = ws_plans.taikhoan 
                                        ORDER BY ngaythamgia DESC");
                                        if ($oOo) {?>
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head text-nowrap">
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">STT</span>
                                                </th>
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">Người Dùng</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-mb sorting">
                                                    <span class="sub-text">Số Dư</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Ruby</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Xác Minh</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Ngày Tham Gia</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Quyền Hạn</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Trạng Thái</span>
                                                </th>
                                                <th class="nk-tb-col text-end sorting">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($td = mysqli_fetch_assoc($oOo)) { ?>
                                            <tr class="nk-tb-item odd">
                                                <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <?=$td['user_id']?></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                           <img class="ws-avatar-1"
                                                                    src="/<?= __IMG__.'/users'.'/'. $td['avatar']; ?>"
                                                                    alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <span
                                                                class="tb-lead"><?= THANHDIEU($td['hovaten']) ?></span>
                                                            <span>@<?= $td['username'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"><?=FormatNumber::TD($td['sodu'])?> <span
                                                            class="currency">VNĐ</span>
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span><b><?=$td['ruby']?></b> điểm</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <ul class="list-status">
                                                        <li>
                                                            <?php if(valid_email($td['email'])):?>
                                                            <em class="icon text-success ni ni-check-circle"></em>
                                                            <span>Email</span>
                                                            <?php else: ?>
                                                            <em class="icon text-danger ni ni-cross-circle"></em>
                                                            <span>Email</span>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <?php $plan=strtolower($td['plans']);?>
                                                            <?php if($plan =='free'):?>
                                                            <em class="icon ni ni-check-circle"></em>
                                                            <span>Free</span>
                                                            <?php elseif($plan=='legacy'):?>
                                                            <em class="icon text-warning ni ni-check-circle"></em>
                                                            <span>Legacy</span>
                                                            <?php elseif($plan=='premium'):?>
                                                            <em class="icon text-success ni ni-check-circle-fill"></em>
                                                            <span>Premium</span>
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <span><?=FormatTime::TD($td["ngaythamgia"])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md text-nowrap">
                                                    <?php if($td['rank']==='admin'):?>
                                                    <span class="badge badge-dim bg-info">Quản Trị Viên</span>
                                                    <?php elseif($td['rank']==='partner'): ?>
                                                    <span class="badge badge-dim bg-primary">Đối Tác</span>
                                                    <?php else: ?>
                                                    <span class="badge badge-dim bg-secondary">Thành Viên</span>
                                                    <?php endif;?>
                                                </td>
                                                <td class="nk-tb-col tb-col-md text-nowrap">
                                                    <?php if($td['banned']==0):?>
                                                    <span class="badge badge-dim bg-success tb-status" style="font-size:.675rem!important;">Hoạt
                                                        Động</span>
                                                    <?php else: ?>
                                                    <span class="badge badge-dim bg-danger tb-status" style="font-size:.675rem!important;">Đình
                                                        Chỉ</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown">
                                                                    <em class="icon ni ni-more-h"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a href="edit/<?=$td['user_id'];?>">
                                                                                <em class="icon ni ni-edit"></em>
                                                                                <span>Sửa Tài Khoản</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <a id="banned-users"
                                                                                data-id="<?=$td['user_id'];?>">
                                                                                <em class="icon ni ni-na"></em>
                                                                                <?php if($td['banned']==0):?>
                                                                                <span>Khoá Tài Khoản</span>
                                                                                <?php else: ?>
                                                                                <span>Mở Khoá Tài Khoản</span>
                                                                                <?php endif; ?>
                                                                            </a>
                                                                        </li>
                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <a id="delete-account"
                                                                                data-username="<?=$td['username'];?>"><em style="margin-top:-5px;" class="icon ni ni-trash-alt"></em>
                                                                               Xoá Tài Khoản
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <?php } else { ?>
                                        <tr>
                                            <td colspan="8">Chưa có dữ liệu.</td>
                                        </tr>
                                        <?php }
                                         }
                                        }
                                        (new DanhSachThanhVien())->ShowUsers();
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
<div class="modal fade" tabindex="-1" role="dialog" id="addUser">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal">
                <em class="icon ni ni-cross-sm"></em>
            </a>
            <div class="modal-body modal-body-md">
                <div class="alert alert-primary alert-icon"><em class="icon ni ni-alert-circle"></em> <strong>Lưu
                        Ý:</strong> Những dòng có đánh dấu (<b class="fw-bold text-danger">*</b>) là bắt buộc phải nhập,
                    tên tài khoản chỉ là duy nhất, và không thể sửa đổi sau này<br /><br />
                    Phần quyền hạn, đối tác sẽ không có đủ quyền can thiệp vào các phần quan trọng của trang admin, ví
                    dụ cài đặt, sửa thành viên v.v.v</div>
                <h5 class="modal-title"><span class="text-success"><em class="icon ni ni-user-add"></em></span>&ensp;Tạo
                    Thành Viên Mới</h5>
                <form id="TaoThanhVien" method="post" class="mt-4 is-alter form-validate">
                    <input type="hidden" name="TaoThanhVien" value="true">
                    <div class="row g-gs">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="hovaten">Họ Và Tên (<b
                                        class="fw-bold text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" data-msg="Không được bỏ trống họ và tên"
                                        name="hovaten" placeholder="Họ Và Tên" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="username">Tài Khoản (<b
                                        class="fw-bold text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" data-msg="Không được bỏ trống tài khoản"
                                        name="username" placeholder="Tên tài khoản" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="password">Mật Khẩu (<b
                                        class="fw-bold text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="password" class="form-control" data-msg="Không được bỏ trống mật khẩu"
                                        name="password" placeholder="Mật khẩu" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Quyền Hạn (<b class="fw-bold text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="quyenhan"
                                        data-msg="Không được bỏ trống quyền hạn"
                                        data-placeholder="--- CHỌN QUYỀN HẠN ---" required="">
                                        <option value="">--- CHỌN QUYỀN HẠN ---</option>
                                        <option value="members">Thành Viên</option>
                                        <option value="partner">Đối Tác</option>
                                        <option value="admin">Quản Trị Viên</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <button type="submit" class="btn btn-primary"><em
                                            class="icon ni ni-check-circle"></em>&ensp;Tạo Ngay</button>
                                </li>
                                <li>
                                    <a href="#" data-bs-dismiss="modal" class="link link-light"
                                        data-bs-dismiss="modal">Huỷ Bỏ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/foot.php'; ?>