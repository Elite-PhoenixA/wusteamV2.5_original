<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Cấu Hình Nạp Tiền</h3>
                            <div class="nk-block-des text-soft">
                                <p>Bạn có thể sửa đổi cài đặt nạp tiền ở đây.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a data-bs-toggle="modal" href="#addTransfer" class="btn btn-icon btn-primary d-md-none">
                                <em class="icon ni ni-plus"></em>
                            </a>
                            <a data-bs-toggle="modal" href="#addTransfer"
                                class="btn btn-primary d-none d-md-inline-flex">
                                <i class="ri-add-line fs-15px"></i>&nbsp;
                                <span>Thêm Mới</span>
                            </a>&nbsp;
                            <a class="btn btn-icon btn-danger d-md-none truncate-transfer">
                            <em class="icon ni ni-trash-alt"></em>
                            </a>
                            <a
                                class="btn btn-danger d-none d-md-inline-flex truncate-transfer">
                                <i class="ri-delete-bin-2-line"></i>&ensp;
                                <span>Xoá All</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner table-responsive dt-bootstrap4">
                            <table class="table table-tranx datatable-init text-nowrap">
                                <?php
                                class Payments extends DatabaseConnection 
                                {
                                 public function Payments() {
                                $oOo = mysqli_query(self::ThanhDieuDB(),"SELECT * FROM ws_transfer");
                                if ($oOo) {?>
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">STT</th>
                                        <th scope="col">Số Tài Khoản</th>
                                        <th scope="col">Chủ Tài Khoản</th>
                                        <th scope="col">Ngân Hàng</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">QR-Code</th>
                                        <th scope="col">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($transfer = mysqli_fetch_assoc($oOo)) { ?>
                                    <tr>
                                        <th scope="row">#<?=$transfer['transfer_id']?></th>
                                        <td><span class="badge bg-gray"><?=$transfer['stk']?></span></td>
                                        <td><span class="badge bg-primary"><?=$transfer['chutaikhoan']?></span></td>
                                        <td><span class="badge bg-success"><?=$transfer['nganhang']?></span></td>
                                        <td><span class="badge bg-secondary">
                                                <?=mb_strlen($transfer['logo']) > 30 ? mb_substr($transfer['logo'], 0, 30) . '...' : $transfer['logo']?>
                                            </span></td>
                                            <td><span class="badge bg-secondary">
                                                <?=mb_strlen($transfer['qr-code']) > 30 ? mb_substr($transfer['qr-code'], 0, 30) . '...' : $transfer['qr-code']?>
                                            </span></td>
                                        <td><a class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                href="#editTransfer-<?=$transfer['transfer_id']?>"><em
                                                    class="icon ni ni-edit"></em>&ensp;Edit</a></td>
                                    </tr>
                                    <div class="modal fade" tabindex="-1" role="dialog"
                                        id="editTransfer-<?=$transfer['transfer_id']?>">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-bs-dismiss="modal">
                                                    <em class="icon ni ni-cross-sm"></em>
                                                </a>
                                                <div class="modal-body modal-body-md">
                                                    <h5 class="modal-title"><span class="text-success"><em
                                                    class="icon ni ni-edit"></em></span>&ensp;Chỉnh Sửa Ngân Hàng</h5>
                                                    <form class="mt-4 edit-transfer-bank">
                                                        <div class="row g-gs">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="ten-ngan-hang">Tên
                                                                        Ngân Hàng (<b class="text-danger">*</b>)</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            name="ten-ngan-hang"
                                                                            value="<?=$transfer['nganhang']?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="logo-ngan-hang">Logo
                                                                        Ngân Hàng (<b class="text-danger">*</b>)</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="url" class="form-control"
                                                                            name="logo-ngan-hang" value="<?=$transfer['logo']?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="chu-tai-khoan">Chủ
                                                                        Tài Khoản (<b class="text-danger">*</b>)</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            name="chu-tai-khoan" value="<?=$transfer['chutaikhoan']?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="stk">Số Tài Khoản (<b
                                                                            class="text-danger">*</b>)</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control"
                                                                            name="stk" value="<?=$transfer['stk']?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="qrcode">Url Ảnh QR-Code (<b
                                                                            class="text-danger">*</b>)</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="url" class="form-control"
                                                                            name="qrcode" value="<?=$transfer['qr-code']??null?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <ul
                                                                    class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                    <li>
                                                                        <input type="hidden" name="edit-transfer-bank"
                                                                            value="action">
                                                                            <input type="hidden" name="transfer-id"
                                                                            value="<?=$transfer['transfer_id']?>">
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="ri-checkbox-circle-line fs-15px"></i>&nbsp;Cập Nhật</button>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" data-bs-dismiss="modal"
                                                                            class="link link-light"
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
                                    <?php }?>
                                </tbody>
                                <?php }
                                      }
                                }
                             (new Payments())->Payments();?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addTransfer">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal">
                <em class="icon ni ni-cross-sm"></em>
            </a>
            <div class="modal-body modal-body-md">
                <div class="alert alert-primary alert-icon"><em class="icon ni ni-alert-circle"></em> <strong>Lưu
                        Ý:</strong> Trang web upload ảnh lấy link nhanh <a href="//img.thanhdieu.com/"
                        target="_blank">https://img.thanhdieu.com/</a>.<br /><br />
                    Logo
                    ngân hàng phải là ảnh đã xoá phông nền tức là ảnh dạng transparent, và chỉ cho
                    phép thêm tối đa 2 ngân hàng!</div>
                <h5 class="modal-title"><span class="text-success"><i class="ri-bank-card-line"></i></span>&ensp;Thêm
                    Ngân Hàng</h5>
                <form class="mt-4 is-alter form-validate add-transfer-bank">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="ten-ngan-hang">Tên Ngân Hàng (<b
                                        class="text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="ten-ngan-hang"
                                        placeholder="Vui lòng nhập tên ngân hàng" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="logo-ngan-hang">Logo Ngân Hàng (<b
                                        class="text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="logo-ngan-hang"
                                        placeholder="Vui lòng url logo ngân hàng" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="chu-tai-khoan">Chủ Tài Khoản (<b
                                        class="text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="chu-tai-khoan"
                                        placeholder="Vui lòng tên chủ tài khoản" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="stk">Số Tài Khoản (<b class="text-danger">*</b>)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="stk"
                                        placeholder="Vui lòng nhập số tài khoản" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <input type="hidden" name="add-transfer-bank" value="action">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="ri-add-circle-line fs-15px"></i>&nbsp;Thêm Mới</button>
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
<?php require_once('partials/foot.php'); ?>