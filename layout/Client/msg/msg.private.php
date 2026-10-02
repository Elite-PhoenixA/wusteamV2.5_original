<div class="ajaxpager tab-pane fade in active" id="msg-tab-private">
  <div class="ajax-item">
    <div class="row ajax-item msg-private">
      <div class="col-sm-4 scroll-y mini-scrollbar ajaxpager" id="user_chat_lists">
        <div class="padding-h10 border-bottom chat-lists ">
          <a href="javascript:;" data-toggle-class="toggle" data-target=".msg-private">
            <div class="flex relative msg-list">
              <div class="avatar-img shrink0 mr10">
                <img alt="Hình đại diện của quản trị viên (hệ thống)" src="https://i.imgur.com/AGeUneN.png" data-src="https://i.imgur.com/AGeUneN.png" class="avatar avatar-id-admin lazyload">
              </div>
              <div class="flex1">
                <span class="pull-right px12 muted-3-color ngay-dang" data-ngaydang="<?=$TD->Setting('publication-date')?>" title="<?=$TD->Setting('publication-date')?>" data-toggle="tooltip" data-placement="bottom"><?=$TD->Setting('publication-date')?></span>
                <dt class="text-ellipsis muted-color">Hệ Thống</dt>
                <dd class="em09 muted-2-color text-ellipsis">Chào mừng bạn đã sử dụng dịch vụ của <?=$TD->Setting('name-site')?></dd>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-sm-8 ajaxpager" id="user_private_window">
        <div class="private-window post_ajax_loader">
        <!-- <a href="javascript:;" class="muted-color d-none d-lg-inline" data-toggle-class="toggle" data-target=".msg-private"><i class="fa fa-angle-left"></i> Quay về</a> -->
          <div class="private-window-header mb10 text-center">
            <i class="loading mr10"></i>Connecting...
          </div>
          <div class="placeholder mb10 placeholder" style="height:400px;"></div>
          <div class="private-window-footer">
            <form class="from-private">
              <p>
                <textarea class="form-control" rows="2" disabled="disabled"></textarea>
              </p>
              <div class="pull-right">
                <button class="but c-blue pw-1em" disabled="disabled">
                  <i class="fa fa-send-o"></i> Gửi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="ajax-pag hide">
      <div class="next-page ajax-next">
        <a href="#"></a>
      </div>
    </div>
  </div>
  <div class="ajax-pag hide">
    <div class="next-page ajax-next">
      <a href="#"></a>
    </div>
  </div>
</div>