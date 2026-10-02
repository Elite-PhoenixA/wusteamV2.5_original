<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright display-name text-right">&copy; 2021 Developed by <a href="https://thanhdieu.com"
                    target="_blank">ThanhDieu 💗</a></div>
            <div class="nk-footer-links">
                <ul class="nav-sm">
                    <li class="nav-item dropup">
                        <a class="has-indicator nav-link">
                            Verison Code:&nbsp;<b><?=$TD->Setting('version-code')?></b>
                        </a>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="editPost">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Quick Edit</h5>
                    <form action="#" class="mt-4">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="editTitle">Title</label>
                                    <input type="text" class="form-control" id="editTitle" placeholder="Title"
                                        value="Hello World!">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="editSlug">Slug</label>
                                    <input type="text" class="form-control" id="editSlug" placeholder="Slug"
                                        value="hello-world">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Date</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar"></em>
                                        </div>
                                        <input type="text" class="form-control date-picker"
                                            data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Categories</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" multiple="multiple"
                                            data-placeholder="Categories">
                                            <option value="uncategorized">Uncategorized</option>
                                            <option value="covid">Covid</option>
                                            <option value="seo">SEO</option>
                                            <option value="website">Website</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="editTags">Tags</label>
                                    <input type="text" class="form-control" id="editTags" placeholder="Tags" value="—">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" data-placeholder="Status">
                                            <option value="published">Published</option>
                                            <option value="pending">Pending</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editComment">
                                    <label class="custom-control-label" for="editComment">Allow Comments</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="editPings">
                                    <label class="custom-control-label" for="editPings">Allow Pings</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" data-bs-dismiss="modal"
                                            class="btn btn-primary">Update</button>
                                    </li>
                                    <li>
                                        <a href="#" class="link link-light" data-bs-dismiss="modal">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <ul class="nk-sticky-toolbar">
        <li class="demo-settings ws-toggle-theme">
            <a class="toggle-theme tipinfo" href="#" title="Change Skin Theme">
                <em class="icon ni ni-moon"></em>
            </a>
        </li>
    </ul>
</div>
<div class="js-preloader"><div class="loading-animation duo-pulse"></div></div>
<script src="<?=(new AdminURL())->Path()?>/assets/js/bundle.js?ver=3.2.3"></script>
<script src="<?=(new AdminURL())->Path()?>/assets/js/scripts.js?ver=3.2.3"></script>
<script src="/<?= __LIBRARY__ ?>/fancybox/fancybox.umd.js"></script>
<?php if(strpos($current_url,'create/product')!==false||strpos($current_url,'products/list')!==false||strpos($current_url,'dashboard')!==false){?>
<script src="<?=(new AdminURL())->Path()?>/assets/js/libs/editors/quill.js?ver=3.2.3"></script>
<script src="<?=(new AdminURL())->Path()?>/assets/js/libs/editors/summernote.js?ver=3.2.3"></script>
<script src="<?=(new AdminURL())->Path()?>/assets/js/editors.js?ver=3.2.3"></script>
<?php } ?>
<script src="<?=(new AdminURL())->Path()?>/assets/js/libs/charts/chart-cms.js?ver=3.2.3"></script>
<script src="<?=(new AdminURL())->Path()?>/../<?= __LIBRARY__ ?>/dialog/toast@1.0.1/fuiToast.min.js"></script>
<script src="<?=(new AdminURL())->Path()?>/assets/js/custom.js?ver=<?=$TD->Setting('cache')?>"></script>
</body>
</html>