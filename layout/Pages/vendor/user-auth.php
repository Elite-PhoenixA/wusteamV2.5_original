<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php if($taikhoan!==null){exit(header('location: /'));}?>
<?php $options_header = ['title' => "Bắt Đầu Với Chúng Tôi | " . $TD->Setting('name-site'), 'description' => 'Chào mừng bạn đến với trang đăng nhập/đăng ký, bắt đầu đăng nhập/đăng ký để sử dụng dịch vụ của chúng tôi!',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<style>.page-template-user-sign,.sign-page{min-height:500px}.sign-col,.sign-row{height:100%}body{background:url('https://i.pinimg.com/originals/09/05/a7/0905a74092fa43fce6218aa48f6a26a4.jpg') center/cover no-repeat #66fcf1;animation:3s linear infinite animateBg}@keyframes animateBg{100%{filter:hue-rotate(360deg)}}.sign-page{padding-top:70px}.sign-page .sign{width:350px}.sign-col{display:flex;justify-content:center;align-items:center}.sign-col [data-dismiss=modal]{display:none}.oauth-data-box .avatar-img{--this-size:60px}</style>
<main role="main" class="container sign-page">
  <div class="row sign-row gutters-5">
    <div class="col-md-6 col-md-offset-6 sign-col">
      <div style="padding:20px 0 60px 0">
        <div class="sign zib-widget blur-bg relative">
          <div class="text-center">
            <div class="sign-logo box-body">
              <a href="https://<?=$domain?>">
                <img src="<?=$TD->Setting('navbar-logo')?>" data-src="" alt="Logo-<?=$TD->Setting('name-site')?>" class="lazyload">
              </a>
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="tab-sign-in">
              <div class="box-body">
                <div class="title-h-left fa-2x">Đăng Nhập</div>
                <a class="muted-color px12" href="#tab-sign-up" data-toggle="tab">Không có tài khoản? Đăng ký ngay <i class="em12 ml3 fa fa-angle-right"></i></a>
              </div>
              <div id="sign-in">
                <div class="tab-content">
                  <div class="tab-pane fade active in" id="tab-signin-pas">
                  <form class="auth-user-login">
                  <div class="relative line-form mb10">
                    <input type="text" name="username" class="line-form-input" tabindex="1" autocomplete autofocus required>
                    <i class="line-form-line"></i>
                    <div class="scale-placeholder">Tên tài khoản hoặc E-mail</div>
                  </div>
                  <div class="relative line-form mb10">
                    <input type="password" name="password" class="line-form-input" tabindex="1" autocomplete required>
                    <div class="scale-placeholder">Mật Khẩu</div>
                    <div class="abs-right passw muted-2-color">
                      <i class="fa-fw fa fa-eye"></i>
                    </div>
                    <i class="line-form-line"></i>
                  </div>
                  <div class="relative line-form mb10 em09">
                    <span class="muted-color form-checkbox">
                      <input type="checkbox" id="remember_me" checked="checked" tabindex="1" value="forever">
                      <label for="remember_me" class="ml3">Ghi nhớ tôi</label>
                    </span>
                    <span class="pull-right muted-2-color">
                      <a class="muted-2-color" data-toggle="tab" href="#tab-sign-pas">Quên mật khẩu?</a>
                    </span>
                  </div>
                  <div class="box-body">
                    <input type="hidden" name="action" value="auth-user-login">
                    <button type="submit" class="but radius jb-blue padding-lg signsubmit-loader btn-block" disabled>
                      <i class="fa fa-sign-in mr10"></i>Đăng Nhập </button>
                  </div>
                </form>
                  </div>
                </div>
                <p class="social-separator separator muted-3-color em09">Đăng Nhập Bằng Tài Khoản Xã Hội</p>
              </div>
            </div>
            <div class="tab-pane fade" id="tab-sign-up">
              <form class="auth-user-register">
                <div class="box-body">
                  <div class="title-h-left fa-2x">Đăng Ký</div>
                  <a class="muted-color px12" href="#tab-sign-in" data-toggle="tab">Đã có tài khoản? Đăng nhập ngay <i class="em12 ml3 fa fa-angle-right"></i>
                  </a>
                </div>
                <span class="muted-2-color px12">* Tài khoản của bạn sẽ bị xoá nếu thông tin sai lệch.</span>
                <div class="relative line-form mb10">
                  <input type="text" name="hovaten" class="line-form-input" placeholder="" tabindex="1" autofocus>
                  <i class="line-form-line"></i>
                  <div class="scale-placeholder">Họ Và Tên</div>
                </div>
                <div class="relative line-form mb10">
                  <input change-show=".change-show" type="text" name="username" class="line-form-input" tabindex="1" placeholder="" autocomplete>
                  <i class="line-form-line"></i>
                  <div class="scale-placeholder">Tên Tài Khoản</div>
                </div>
                <div class="relative line-form mb10">
                  <input type="password" name="password" class="line-form-input" tabindex="1" placeholder="" autocomplete>
                  <div class="scale-placeholder">Mật Khẩu</div>
                  <div class="abs-right passw muted-2-color">
                    <i class="fa-fw fa fa-eye"></i>
                  </div>
                  <i class="line-form-line"></i>
                </div>
                <!-- <div class="relative line-form mb10">
                  <input type="text" name="invite" class="line-form-input" tabindex="1" placeholder="" autocomplete>
                  <div class="scale-placeholder">Mã mời (nếu có)</div>
                  <div class="abs-right muted-2-color" data-toggle="tooltip" title="Nếu bạn được mời, bạn có thể điền mã mời. (Người sở hữu mã mời này sẽ nhận được các phần thưởng từ bạn) [Nếu bạn không được ai mời, vui lòng để trống]">
                    <i class="fa-fw fa fa-question-circle"></i>
                  </div>
                  <i class="line-form-line"></i>
                </div> -->
                <div class="box-body">
                <input type="hidden" name="action" value="auth-user-register">
                  <button type="submit" disabled class="but radius jb-green padding-lg signsubmit-loader btn-block">
                    <i class="ri-user-add-line"></i> Đăng Ký </button>
                </div>
                <div class="form-checkbox muted-color mt10 text-center px12 opacity8">
                  <input name="tos" id="agree" type="checkbox">
                  <label for="agree" class="px12 ml6" style="font-weight:normal;">Đã đọc và đồng ý <a class="focus-color" target="_blank" href="/dieu-khoan">Điều Khoản</a> & <a class="focus-color" target="_blank" href="/dieu-khoan">Chính Sách</a>
                  </label>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="tab-sign-pas">
              <form class="thanhdieu-resetpass">
                <div class="box-body">
                  <div class="title-h-left fa-2x">Quên Mật Khẩu</div>
                  <a class="muted-color px12" href="#tab-sign-up" data-toggle="tab">Không có tài khoản? Đăng ký ngay <i class="em12 ml3 fa fa-angle-right"></i>
                  </a>
                </div>
                <div class="relative line-form mb10">
                  <input change-show=".change-show" type="email" name="email" class="line-form-input" tabindex="1" placeholder="">
                  <i class="line-form-line"></i>
                  <div class="scale-placeholder">Nhập địa chỉ E-mail để khôi phục</div>
                </div>
                <div class="relative line-form mb10 vtd-rspass change-show">
                  <input type="text" name="code" class="line-form-input" autocomplete="off" tabindex="2" placeholder="">
                  <i class="line-form-line"></i>
                  <div class="scale-placeholder">Mã xác nhận </div>
                  <span class="abs-right">
                    <button type="button" form-action="send-code-verification" class="but c-blue verification-submit"> Gửi mã xác minh </button>
                  </span>
                  <div class="abs-right match-ok muted-color">
                    <i class="fa-fw fa fa-check-circle"></i>
                  </div>
                </div>
                <div class="box-body">
                  <button type="button" form-action="reset-submit" class="but radius jb-blue padding-lg rssubmit-loader btn-block" disabled>
                    <i class="ri-lock-unlock-line"></i> Xác Nhận </button>
                </div>
                <div class="muted-color mt10 text-center px12 opacity8">Bằng cách đăng nhập để sử dụng dịch vụ, bạn phải đồng ý với <a class="focus-color" target="_blank" href="/dieu-khoan">Chính sách</a> và <a class="focus-color" target="_blank" href="/dieu-khoan">Điều khoản </a> của chúng tôi. </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- <div class="text-center blur-bg fixed px12 opacity8" style="top:auto;height:auto;padding:10px;">Copyright ©&nbsp;<?=date('Y');?>&nbsp;·&nbsp; <a target="_blank" href="https://<?=$domain?>"><?=$TD->Setting('name-site')?></a>.</div> -->
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>