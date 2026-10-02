<div class="ajaxpager tab-pane" id="msg-tab-system"></div>
<div class="msg-list-container">
    <?php if (($VTD = $thanhdieudb->query("SELECT * FROM ws_notify_system WHERE username='$taikhoan' ORDER BY created_at DESC LIMIT 5")) && $VTD->num_rows > 0) { 
        while ($system = $VTD->fetch_assoc()) { ?>
    <div class="border-bottom box-body ajax-item nopw-sm">
        <ul class="list-inline relative msg-list">
            <li><span class="msg-img"><img class="fit-cover lazyload" src="/<?=__IMG__?>/svg/msg-system.svg"
                        data-src="/<?=__IMG__?>/svg/msg-system.svg" alt="">
                </span></li>
            <li>
                <dl>
                    <a class="tab-system" href="javascript:;" ajax-tab="#user_msg_content" data-id="<?=$system['id']?>">
                        <dt><?=(isMobile()?$cut->characters($system['title'],28):$system['title'])?></dt>
                    </a>
                    <dd class="mt6 em09 muted-2-color text-ellipsis">
                        <span class="time-ago" data-timeago="<?=$system['created_at']?>">
                            <i class="fa fa-clock-o mr3" aria-hidden="true"></i>
                        </span>
                        <i class="fa fa-bell-o mr3 ml10" aria-hidden="true"></i>Thông báo hệ thống
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
    <?php } ?>
    <?php } else { ?>
    <!-- <div class="text-center padding-h10 muted-2-color no-more td separator">Chưa có thông báo nào</div> -->
    <div class="text-center ajax-item" style="padding:60px 0;">
  <img style="width:280px;opacity:.7;" src="/<?=__IMG__?>/svg/null.svg">
  <p class="em09 muted-3-color separator">
  Chưa có thông báo nào
  </p>
</div>
    <?php } ?>
</div>
<!-- <div class="post_ajax_loader td_system">
    <?php for ($i = 0; $i < 5; $i++) { ?>
        <div class="border-bottom box-body nopw-sm">
            <ul class="list-inline relative msg-list">
                <li><a class="msg-img placeholder"></a></li>
                <li>
                    <dl>
                        <dt class="placeholder k2" style="width: 80%;"></dt>
                        <dd class="mt10"><i class="placeholder s1"></i><i class="placeholder s1 ml10"></i></dd>
                    </dl>
                </li>
            </ul>
        </div>
    <?php } ?>
</div> -->