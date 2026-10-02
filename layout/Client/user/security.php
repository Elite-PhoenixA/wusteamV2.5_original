<div class="ajax-item">
  <div class="zib-widget account-set nopw-sm">
    <div class="box-body">
      <div class="title-h-left">
        <b>Liên Kết E-mail
        </b>
      </div>
      <div class="muted-2-color mb20">Liên kết tài khoản email của bạn để bảo mật tài khoản, và thông tin quan trọng khác một cách kịp thời
      </div>
      <div class="oauth-bind-box">
        <div class="thanhdieu-none">
          <div class="flex ac jsb muted-box">
            <div class="flex ac type-logo">
              <span class="b-blue circular mr6 em14">
                <i class="fa fa-envelope"></i>
              </span>
              <span class="thanhdieu-none">
                E-mail
              </span>
            </div>
            <div class="overflow-hidden">
              <div class="text-ellipsis muted-2-color">
              <?=THANHDIEU($td['email'] ? $td['email'] : 'Chưa xác thực email' );?>
              </div>
            </div>
            <div class="shrink0">
              <a data-class="modal-mini" class="modal-change-email but c-yellow-2 p2-10 but hollow" href="javascript:;">
               Thay đổi
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-body">
      <div class="title-h-left">
        <b>Mật Khẩu
        </b>
      </div>
      <div class="muted-2-color mb20">Thay đổi mật khẩu thường xuyên sẽ giúp bảo mật tài khoản của bạn
      </div>
      <div>
        <div class="oauth-bind-box">
          <div class="thanhdieu-none">
            <div class="flex ac jsb muted-box">
              <div class="flex ac type-logo">
                <span class="b-purple circular mr6 em14">
                  <i class="fa fa-unlock-alt"></i>
                </span>
                <span class="thanhdieu-none">Mật Khẩu
                </span>
              </div>
              <div class="thanhdieu-none"><a data-class="modal-mini" class="modal-change-password but c-blue-2 hollow" href="javascript:;">Đổi mật khẩu</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>