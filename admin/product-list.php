<?php require_once('partials/head.php');?>
<?php require_once('partials/nav.php');?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Quản Lý Đơn Hàng</h3>
                            <div class="nk-block-des text-soft">
                                <p>
                                    + Bạn có thể quản lý tất cả các đơn hàng đã đăng ở đây.</p>
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
                                class ListProducts extends DatabaseConnection 
                                 {
                                    public function ListProducts() {
                                        global $user;
                                        if ($user['rank'] === 'partner') {
                                            $partner = "WHERE wp.taikhoan = '{$user['username']}' ";
                                        } else {
                                            $partner ='';
                                        }
                                        $oOo = mysqli_query(self::ThanhDieuDB(),"SELECT wp.*, u.avatar, u.hovaten, u.username 
                                        FROM ws_products wp 
                                        JOIN users u ON wp.taikhoan = u.username 
                                        $partner
                                        ORDER BY wp.ngaydang DESC;
                                        ");
                                        if ($oOo) {?>
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head text-nowrap">
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">STT</span>
                                                </th>
                                                <th class="nk-tb-col sorting">
                                                    <span class="sub-text">Người Đăng</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Tiêu Đề</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Giá Bán</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-lg sorting">
                                                    <span class="sub-text">Lượt Mua</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting" style="width:160px;">
                                                    <span class="sub-text">Hình Thu Nhỏ</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Thời Gian</span>
                                                </th>
                                                <th class="nk-tb-col tb-col-md sorting">
                                                    <span class="sub-text">Trạng Thái</span>
                                                </th>
                                                <th class="nk-tb-col text-end sorting ">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $stt = mysqli_num_rows($oOo);
                                            while ($product = mysqli_fetch_assoc($oOo)) { ?>
                                            <tr class="nk-tb-item odd">
                                                <td class="nk-tb-col nk-tb-col-check sorting_1">
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <?=$stt?></label>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-dim-primary d-sm-flex">
                                                            <img class="ws-avatar-1"
                                                                src="/<?= __IMG__.'/users'.'/'.$product['avatar'];?>"
                                                                alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <a href="/profile/@<?=$product['username']?>"
                                                                target="_blank"
                                                                class="tb-lead"><?= THANHDIEU($product['hovaten']) ?></a>
                                                            <span class="tb-col-md">@<?= $product['username'] ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount"><a href="/view-code/<?=$product['slug']?>"
                                                            target="_blank"
                                                            rel="noopener noreferrer"><?=$product['tieude']?></a></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span><?=FormatNumber::TD($product['giatien'])?>đ</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span><?=CountFormatter::WS($product['luotmua'])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg">
                                                    <div class="user-card" style="width:45px;">
                                                        <img data-fancybox=""
                                                            style="border-radius:5px!important;cursor:pointer;"
                                                            src="/<?= __IMG__ ?>/uploads/<?=$product['hinhthunho']?>"
                                                            alt="Bằng chứng vi phạm">&ensp;
                                                    </div>
                                                </td>
                                                </td>
                                                <td class="nk-tb-col tb-col-lg text-nowrap">
                                                    <span class="fs-12px time-ago"
                                                        data-timeago="<?=$product['ngaydang'];?>"><?=FormatTime::TD($product["ngaydang"])?></span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md text-nowrap">
                                                    <?php if($product['xetduyet']=='1'):?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-success">Đã
                                                        Duyệt</span>
                                                    <?php elseif($product['xetduyet']=='0'): ?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-danger">Đã Từ
                                                        Chối</span>
                                                    <?php else:?>
                                                    <span class="badge badge-dim rounded-pill bg-outline-warning">Chờ Xử
                                                        Lý</span>
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
                                                                            <a data-bs-toggle="modal"
                                                                                href="#editProducts-<?=$product['id']?>"
                                                                                href="javascript:;">
                                                                                <em class="icon ni ni-pen"></em>
                                                                                <span>Sửa Sản Phẩm</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <a class="delete-products"
                                                                                data-product-id="<?=$product['id']?>"
                                                                                href="javascript:;">
                                                                                <em class="icon ni ni-trash"></em>
                                                                                <span>Xoá Sản Phẩm</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <a class="pin-products"
                                                                                data-product-id="<?=$product['id']?>"
                                                                                href="javascript:;">
                                                                                <i
                                                                                    class="ri-pushpin-line fs-19px me-2"></i>
                                                                                <span><?= $product['is_pinned'] ? 'Gỡ Ghim Sản Phẩm' : 'Ghim Sản Phẩm' ?></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="editProducts-<?=$product['id']?>">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <a href="#" class="close" data-bs-dismiss="modal">
                                                            <em class="icon ni ni-cross-sm"></em>
                                                        </a>
                                                        <div class="modal-body modal-body-md">
                                                            <h5 class="modal-title">Sửa Lại Sản Phẩm
                                                                #<?=$product['id']?></h5>
                                                            <form class="re-edit-product form-validate is-alter mt-2">
                                                                <div class="row g-gs">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="hk-label">Tiêu Đề</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control"
                                                                                    name="tieu-de"
                                                                                    value="<?=THANHDIEU($product['tieude'])?>"
                                                                                    placeholder="Tiêu đề bài viết"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="hk-label">Giá
                                                                                Bán</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text"
                                                                                    class="form-control ws-sotien"
                                                                                    name="gia-ban"
                                                                                    value="<?=$product['giatien']?>"
                                                                                    placeholder="Giá sản phẩm" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Nội Dung Bài
                                                                                Viết</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea name="content"
                                                                                    class="summernote-basic"><?=$product['noidung']?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Phân Loại Mã
                                                                                Nguồn</label>
                                                                            <div class="form-control-wrap">
                                                                                <select
                                                                                    class="form-select js-select2 td-phanloai"
                                                                                    required
                                                                                    data-placeholder="--- PHÂN LOẠI DANH MỤC ---"
                                                                                    name="phanloai">
                                                                                    <option value="manguon-website"
                                                                                        <?= $product['phanloai'] == 'manguon-website' ? 'selected' : null ?>>
                                                                                        Mã Nguồn Website</option>
                                                                                    <option value="manguon-phanmem"
                                                                                        <?= $product['phanloai'] == 'manguon-phanmem' ? 'selected' : null ?>>
                                                                                        Mã Nguồn Phần Mềm</option>
                                                                                    <option value="manguon-khac"
                                                                                        <?= $product['phanloai'] == 'manguon-khac' ? 'selected' : null ?>>
                                                                                        Mã Nguồn Khác</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Ai Có Thể Tải
                                                                                Xuống (<b
                                                                                    class="text-danger">*</b>)</label>
                                                                            <div class="form-control-wrap">
                                                                                <select
                                                                                    class="form-select js-select2 td-privacy"
                                                                                    required
                                                                                    data-placeholder="Quyền riêng tư"
                                                                                    name="post_privacy">
                                                                                    <option <?= $product['privacy'] == 'all' ? 'selected' :null ?>value="all">Tất Cả Mọi Người
                                                                                    </option>
                                                                                    <option <?= $product['privacy'] == 'like' ? 'selected' :null?> value="like">Chỉ Những Ai Đã
                                                                                        Like</option>
                                                                                    <option <?= $product['privacy'] == 'cmt' ? 'selected' :null?> value="cmt">Chỉ Những Ai Đã
                                                                                        Bình Luận</option>
                                                                                    <option <?= $product['privacy'] == 'level' ? 'selected' :null ?> value="level">Tài Khoản
                                                                                        Level 3 Trở Lên</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="download-url">Liên Kết Tải
                                                                                Xuống</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-icon form-icon-right">
                                                                                    <em
                                                                                        class="icon ni ni-link-alt"></em>
                                                                                </div>
                                                                                <input type="url" class="form-control"
                                                                                    name="download-url"
                                                                                    value="<?=$product['download_url']?>"
                                                                                    placeholder="https://mediafire.com/xxxx"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="action"
                                                                        value="re-edit-product">
                                                                    <input type="hidden" name="product-id"
                                                                        value="<?=$product['id']?>">
                                                                    <div class="col-12">
                                                                        <ul
                                                                            class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                            <li>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"><em
                                                                                        class="icon ni ni-check-circle-cut"></em>&ensp;Cập
                                                                                    Nhật</button>
                                                                            </li>
                                                                            <li>
                                                                                <button type="button"
                                                                                    data-bs-dismiss="modal"
                                                                                    class="link link-light">Huỷ
                                                                                    bỏ</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $stt--;}?>
                                        </tbody>
                                        <?php } else { ?>
                                        <tr>
                                            <td colspan="8">Chưa có dữ liệu.</td>
                                        </tr>
                                        <?php }
                                         }
                                        }
                                        (new ListProducts())->ListProducts();
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

<?php require_once('partials/foot.php'); ?>