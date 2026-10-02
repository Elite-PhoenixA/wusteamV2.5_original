<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="u_sign" role="dialog" data-center="true">
  <div class="modal-dialog">
      <div class="sign-content">
        <div class="sign-img absolute hide-sm">
          <img class="fit-cover radius8 lazyload" src="/<?=__IMG__?>/loading.gif" alt="WsTeam Banner">
        </div>
        <div class="sign zib-widget relative">
          <button class="close" data-dismiss="modal">
            <svg class="ic-close" viewBox="0 0 1024 1024">
              <path d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z"></path>
            </svg>
          </button>
          <div class="text-center">
            <div class="sign-logo box-body hk-bg-animate">
              <img src="<?=$TD->Setting('navbar-logo')?>" data-src="<?=$TD->Setting('navbar-logo')?>" alt="Logo WusTeam" class="lazyload">
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane" id="tab-sign-in">
              <div class="box-body">
                <div class="title-h-left fa-2x">Đăng Nhập</div>
                <a class="muted-color px12" href="#tab-sign-up" data-toggle="tab">Không có tài khoản? Đăng ký ngay <i class="em12 ml3 fa fa-angle-right"></i>
                </a>
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
              <p class="social-separator separator muted-3-color em09">Đăng Nhập Bằng Tài Khoản Xã Hội</p>
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
      <div class="flex jc loading-mask absolute main-bg radius8">
        <div class="em2x opacity5">
          <i class="loading"></i>
        </div>
      </div>
    </div>
    </div>
<?php if (strpos($current_url,'view-code/')!==false||strpos($current_url,'t/')!==false||strpos($current_url,'post/')!==false||strpos($current_url,'dien-dan')!==false) {?>
<!-- Modal Donate -->
<!-- <div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="rewards-modal-1" role="dialog">
    <div class="modal-dialog modal-mini rewards-popover" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg jb-blue">
                <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <div class="colorful-make"></div>
                    <div class="text-center">
                        <div class="em2x">
                            <i class="ri-hand-coin-line"></i>
                        </div>
                        <div class="mt10 em12 padding-w10">Xin hãy ủng hộ tôi cốc cafe
                        </div>
                    </div>
                </div>
                <ul class="flex jse mb10 text-center rewards-box">
                    <li>
                        <p class="muted-2-color">QR-Code Donate
                        <div class="rewards-img">
                            <img class="fit-cover" src="/<?=__IMG__?>/donate.png">
                        </div>
                    </li>
                    <li>
                        <p class="muted-2-color">QR-Code Nhóm
                        </p>
                        <div class="rewards-img">
                            <img class="fit-cover" src="/<?=__IMG__?>/qr-nhom.png">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="modal-share" role="dialog">
    <div class="modal-mini modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg jb-vip1">
                <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <div class="colorful-make"></div>
                    <div class="text-center">
                        <div class="em2x">
                            <i class="em14 ri-share-line"></i>
                        </div>
                        <div class="mt10 em12 padding-w10">
                            <span class="em09">Chia Sẽ Bài Viết</span>
                        </div>
                    </div>
                </div>
                <div class="horizontal">
                    <a rel="nofollow" class="share-btn" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=<?=$website_domain.$current_url?>">
                        <icon>
                            <svg class="icon" viewBox="0 0 100 100" version="1.1" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css">.st106,.st109,.st126,.st132,.st99{clip-rule:evenodd}.st0{fill:#FFFFFF}.st1{fill:#F5BB41}.st2{fill:#2167D1}.st3{fill:#3D84F3}.st4{fill:#4CA853}.st5{fill:#398039}.st6{fill:#D74F3F}.st7{fill:#D43C89}.st8{fill:#B2005F}.st10,.st9{fill:none;stroke:#000000;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st10,.st11,.st12,.st121,.st125,.st13{fill-rule:evenodd;clip-rule:evenodd}.st11{fill:none;stroke:#040404;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}.st13,.st59{fill:#040404}.st14{fill:url(#SVGID_1_)}.st15{fill:url(#SVGID_2_)}.st16{fill:url(#SVGID_3_)}.st17{fill:url(#SVGID_4_)}.st18{fill:url(#SVGID_5_)}.st19{fill:url(#SVGID_6_)}.st20{fill:url(#SVGID_7_)}.st21{fill:url(#SVGID_8_)}.st22{fill:url(#SVGID_9_)}.st23{fill:url(#SVGID_10_)}.st24{fill:url(#SVGID_11_)}.st25{fill:url(#SVGID_12_)}.st26{fill:url(#SVGID_13_)}.st27{fill:url(#SVGID_14_)}.st28{fill:url(#SVGID_15_)}.st29{fill:url(#SVGID_16_)}.st30{fill:url(#SVGID_17_)}.st31{fill:url(#SVGID_18_)}.st32{fill:url(#SVGID_19_)}.st33{fill:url(#SVGID_20_)}.st34{fill:url(#SVGID_21_)}.st35{fill:url(#SVGID_22_)}.st36{fill:url(#SVGID_23_)}.st37{fill:url(#SVGID_24_)}.st38{fill:url(#SVGID_25_)}.st39{fill:url(#SVGID_26_)}.st40{fill:url(#SVGID_27_)}.st41{fill:url(#SVGID_28_)}.st42{fill:url(#SVGID_29_)}.st43{fill:url(#SVGID_30_)}.st44{fill:url(#SVGID_31_)}.st45{fill:url(#SVGID_32_)}.st46{fill:url(#SVGID_33_)}.st47{fill:url(#SVGID_34_)}.st48{fill:url(#SVGID_35_)}.st49{fill:url(#SVGID_36_)}.st50{fill:url(#SVGID_37_)}.st51{fill:url(#SVGID_38_)}.st52{fill:url(#SVGID_39_)}.st53{fill:url(#SVGID_40_)}.st54{fill:url(#SVGID_41_)}.st55{fill:url(#SVGID_42_)}.st56{fill:url(#SVGID_43_)}.st57{fill:url(#SVGID_44_)}.st58{fill:url(#SVGID_45_)}.st60{fill:url(#SVGID_46_)}.st61{fill:url(#SVGID_47_)}.st62{fill:url(#SVGID_48_)}.st63{fill:url(#SVGID_49_)}.st64{fill:url(#SVGID_50_)}.st65{fill:url(#SVGID_51_)}.st66{fill:url(#SVGID_52_)}.st67{fill:url(#SVGID_53_)}.st68{fill:url(#SVGID_54_)}.st69{fill:url(#SVGID_55_)}.st70{fill:url(#SVGID_56_)}.st71{fill:url(#SVGID_57_)}.st72{fill:url(#SVGID_58_)}.st73{fill:url(#SVGID_59_)}.st74{fill:url(#SVGID_60_)}.st75{fill:url(#SVGID_61_)}.st76{fill:url(#SVGID_62_)}.st77{fill:none;stroke:#000000;stroke-width:3;stroke-miterlimit:10}.st78{fill:none;stroke:#FFFFFF;stroke-miterlimit:10}.st79{fill:#4BC9FF}.st80{fill:#5500DD}.st81{fill:#FF3A00}.st82{fill:#E6162D}.st125,.st83{fill:#F1F1F1}.st84{fill:#FF9933}.st85{fill:#B92B27}.st86{fill:#00ACED}.st87{fill:#BD2125}.st88{fill:#1877F2}.st89{fill:#6665D2}.st90{fill:#CE3056}.st91{fill:#5BB381}.st92{fill:#61C3EC}.st93{fill:#E4B34B}.st94{fill:#181EF2}.st95{fill:#FF0000}.st96{fill:#FE466C}.st97{fill:#FA4778}.st98{fill:#FF7700}.st99{fill-rule:evenodd;fill:#1F6BF6}.st100{fill:#520094}.st101{fill:#4477E8}.st102{fill:#3D1D1C}.st103{fill:#FFE812}.st104{fill:#344356}.st105{fill:#00CC76}.st106{fill-rule:evenodd;fill:#345E90}.st107{fill:#1F65D8}.st108{fill:#EB3587}.st109{fill-rule:evenodd;fill:#603A88}.st110{fill:#E3CE99}.st111{fill:#783AF9}.st112{fill:#FF515E}.st113{fill:#FF4906}.st114{fill:#503227}.st115{fill:#4C7BD9}.st116{fill:#69C9D0}.st117{fill:#1B92D1}.st118{fill:#EB4F4A}.st119{fill:#513728}.st120{fill:#FF6600}.st121{fill:#B61438}.st122{fill:#FFFC00}.st123{fill:#141414}.st124{fill:#94D137}.st126{fill-rule:evenodd;fill:#66E066}.st127{fill:#2D8CFF}.st128{fill:#F1A300}.st129{fill:#4BA2F2}.st130{fill:#1A5099}.st131{fill:#EE6060}.st132{fill-rule:evenodd;fill:#F48120}.st133{fill:#222222}.st134{fill:url(#SVGID_63_)}.st135{fill:#0077B5}.st136{fill:#FFCC00}.st137{fill:#EB3352}.st138{fill:#F9D265}.st139{fill:#F5B955}.st140{fill:#DD2A7B}.st141{fill:#66E066}.st142{fill:#EB4E00}.st143{fill:#FFC794}.st144{fill:#B5332A}.st145{fill:#4E85EB}.st146{fill:#58A45C}.st147{fill:#F2BC42}.st148{fill:#D85040}.st149{fill:#464EB8}.st150{fill:#7B83EB}</style>
                                    <g id="Layer_1"></g>
                                    <g id="Layer_2">
                                        <g>
                                            <path class="st88"
                                                d="M50,2.5c-58.892,1.725-64.898,84.363-7.46,95l0,0h0H50h7.46l0,0C114.911,86.853,108.879,4.219,50,2.5z">
                                            </path>
                                            <path class="st83"
                                                d="M57.46,64.104h11.125l2.117-13.814H57.46v-8.965c0-3.779,1.85-7.463,7.781-7.463h6.021 c0,0,0-11.761,0-11.761c-12.894-2.323-28.385-1.616-28.722,17.66V50.29H30.417v13.814H42.54c0,0,0,33.395,0,33.396H50h7.46l0,0h0 V64.104z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </icon>
                        <text>
                            Facebook</text>
                    </a>
                    <a rel="nofollow" class="share-btn" target="_blank"
                        href="https://t.me/share/url?url=<?=$website_domain.$current_url?>">
                        <icon>
                            <svg class="icon" viewBox="0 0 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path
                                            d="M128,0 C57.307,0 0,57.307 0,128 L0,128 C0,198.693 57.307,256 128,256 L128,256 C198.693,256 256,198.693 256,128 L256,128 C256,57.307 198.693,0 128,0 L128,0 Z"
                                            fill="#40B3E0"> </path>
                                        <path
                                            d="M190.2826,73.6308 L167.4206,188.8978 C167.4206,188.8978 164.2236,196.8918 155.4306,193.0548 L102.6726,152.6068 L83.4886,143.3348 L51.1946,132.4628 C51.1946,132.4628 46.2386,130.7048 45.7586,126.8678 C45.2796,123.0308 51.3546,120.9528 51.3546,120.9528 L179.7306,70.5928 C179.7306,70.5928 190.2826,65.9568 190.2826,73.6308"
                                            fill="#FFFFFF"> </path>
                                        <path
                                            d="M98.6178,187.6035 C98.6178,187.6035 97.0778,187.4595 95.1588,181.3835 C93.2408,175.3085 83.4888,143.3345 83.4888,143.3345 L161.0258,94.0945 C161.0258,94.0945 165.5028,91.3765 165.3428,94.0945 C165.3428,94.0945 166.1418,94.5735 163.7438,96.8115 C161.3458,99.0505 102.8328,151.6475 102.8328,151.6475"
                                            fill="#D2E5F1"> </path>
                                        <path
                                            d="M122.9015,168.1154 L102.0335,187.1414 C102.0335,187.1414 100.4025,188.3794 98.6175,187.6034 L102.6135,152.2624"
                                            fill="#B5CFE4"> </path>
                                    </g>
                                </g>
                            </svg>
                        </icon>
                        <text>Telegram</text>
                    </a>
                    <a rel="nofollow" class="share-btn" target="_blank" href="https://instagram.com">
                        <icon>
                            <svg class="icon" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint0_radial_87_7153)">
                                    </rect>
                                    <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint1_radial_87_7153)">
                                    </rect>
                                    <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint2_radial_87_7153)">
                                    </rect>
                                    <path
                                        d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z"
                                        fill="white"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z"
                                        fill="white"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z"
                                        fill="white"></path>
                                    <defs>
                                        <radialGradient id="paint0_radial_87_7153" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                                            <stop stop-color="#B13589"></stop>
                                            <stop offset="0.79309" stop-color="#C62F94"></stop>
                                            <stop offset="1" stop-color="#8A3AC8"></stop>
                                        </radialGradient>
                                        <radialGradient id="paint1_radial_87_7153" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                                            <stop stop-color="#E0E8B7"></stop>
                                            <stop offset="0.444662" stop-color="#FB8A2E"></stop>
                                            <stop offset="0.71474" stop-color="#E2425C"></stop>
                                            <stop offset="1" stop-color="#E2425C" stop-opacity="0"></stop>
                                        </radialGradient>
                                        <radialGradient id="paint2_radial_87_7153" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                                            <stop offset="0.156701" stop-color="#406ADC"></stop>
                                            <stop offset="0.467799" stop-color="#6A45BE"></stop>
                                            <stop offset="1" stop-color="#6A45BE" stop-opacity="0"></stop>
                                        </radialGradient>
                                    </defs>
                                </g>
                            </svg>
                        </icon>
                        <text>
                            Instagram
                        </text>
                    </a>
                    <a rel="nofollow" class="share-btn" target="_blank" href="https://twitter.com">
                        <icon>
                            <svg class="icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="24" cy="24" r="20" fill="#1DA1F2"></circle>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M36 16.3086C35.1177 16.7006 34.1681 16.9646 33.1722 17.0838C34.1889 16.4742 34.9697 15.5095 35.3368 14.36C34.3865 14.9247 33.3314 15.3335 32.2107 15.5551C31.3123 14.5984 30.0316 14 28.6165 14C25.8975 14 23.6928 16.2047 23.6928 18.9237C23.6928 19.3092 23.7368 19.6852 23.8208 20.046C19.7283 19.8412 16.1005 17.8805 13.6719 14.9015C13.2479 15.6287 13.0055 16.4742 13.0055 17.3766C13.0055 19.0845 13.8735 20.5916 15.1958 21.4747C14.3878 21.4491 13.6295 21.2275 12.9647 20.8587V20.9203C12.9647 23.3066 14.663 25.296 16.9141 25.7496C16.5013 25.8616 16.0661 25.9224 15.6174 25.9224C15.2998 25.9224 14.991 25.8912 14.6902 25.8336C15.3166 27.7895 17.1357 29.2134 19.2899 29.2534C17.6052 30.5733 15.4822 31.3612 13.1751 31.3612C12.7767 31.3612 12.3848 31.338 12 31.2916C14.1791 32.6884 16.7669 33.5043 19.5475 33.5043C28.6037 33.5043 33.5562 26.0016 33.5562 19.4956C33.5562 19.282 33.5522 19.0693 33.5418 18.8589C34.5049 18.1629 35.34 17.2958 36 16.3086Z"
                                        fill="white"></path>
                                </g>
                            </svg>
                        </icon>
                        <text>
                            Twitter
                        </text>
                    </a>
                    <a rel="nofollow" class="share-btn ws-copy" data-copy-text="<?=$website_domain.$current_url?>"
                        href="javascript:;">
                        <icon>
                            <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                                fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path style="fill:#424EDE;"
                                            d="M118.903,197.244l-78.329,78.331c-0.002,0.004-0.006,0.006-0.009,0.007 C14.407,301.741,0,336.52,0,373.511s14.407,71.77,40.564,97.928c27,26.996,62.462,40.496,97.926,40.496 c35.462,0,70.927-13.5,97.923-40.498c0-0.002,0-0.002,0.002-0.002l0.002-0.002l78.338-78.34c10.817-10.817,10.817-28.353,0-39.17 c-10.815-10.817-28.353-10.817-39.17,0l-78.338,78.34c0,0.002,0,0.002-0.002,0.002l-0.002,0.002 c-32.397,32.397-85.11,32.397-117.51,0c-15.692-15.694-24.337-36.561-24.337-58.756c0-22.197,8.644-43.061,24.339-58.754 c0.004-0.004,0.006-0.007,0.007-0.011l78.331-78.331c10.817-10.817,10.817-28.353,0-39.17 C147.256,186.428,129.718,186.428,118.903,197.244z">
                                        </path>
                                        <path style="fill:#424EDE;"
                                            d="M432.26,197.254l-78.331,78.331c-10.817,10.817-10.817,28.353,0,39.17 c5.408,5.408,12.497,8.114,19.584,8.114c7.089,0,14.178-2.705,19.584-8.114l78.329-78.331c0.002-0.004,0.006-0.006,0.009-0.007 C497.593,210.259,512,175.48,512,138.488s-14.407-71.77-40.564-97.928c-54-53.992-141.857-53.996-195.849,0.002 c0,0.002,0,0.002-0.002,0.002c0,0-0.002,0-0.002,0.002l-78.342,78.34c-10.817,10.815-10.817,28.351,0,39.17 c5.408,5.41,12.497,8.112,19.584,8.112c7.087,0,14.178-2.705,19.584-8.112l78.342-78.34c0-0.002,0-0.002,0.002-0.002 c0,0,0.002,0,0.002-0.002c32.397-32.397,85.11-32.397,117.51,0c15.694,15.695,24.339,36.563,24.339,58.756 c0,22.197-8.644,43.061-24.339,58.754C432.264,197.246,432.262,197.25,432.26,197.254z">
                                        </path>
                                        <path style="fill:#424EDE;"
                                            d="M158.075,353.925c5.408,5.408,12.497,8.114,19.584,8.114c7.089,0,14.178-2.705,19.584-8.114 l156.681-156.679c10.817-10.815,10.817-28.353,0-39.17c-10.815-10.817-28.353-10.817-39.17,0L158.075,314.757 C147.258,325.57,147.258,343.108,158.075,353.925z">
                                        </path>
                                    </g>
                                    <g>
                                        <path style="fill:#6E76E5;"
                                            d="M138.491,511.935c35.462,0,70.927-13.5,97.923-40.498c0-0.002,0-0.002,0.002-0.002l0.002-0.002 l78.338-78.34c10.817-10.817,10.817-28.353,0-39.17c-10.815-10.817-28.353-10.817-39.17,0l-78.338,78.34 c0,0.002,0,0.002-0.002,0.002l-0.002,0.002c-32.397,32.397-85.11,32.397-117.51,0c-0.321-0.321-0.622-0.659-0.938-0.986 l-39.17,39.17c0.319,0.325,0.617,0.665,0.94,0.986C67.564,498.437,103.026,511.935,138.491,511.935z">
                                        </path>
                                        <path style="fill:#6E76E5;"
                                            d="M456.605,138.488c0,22.197-8.644,43.061-24.339,58.754c-0.004,0.004-0.006,0.007-0.007,0.011 l-78.331,78.331c-10.817,10.817-10.817,28.353,0,39.17c5.408,5.408,12.497,8.114,19.584,8.114c7.089,0,14.178-2.705,19.586-8.114 l78.329-78.331c0.002-0.004,0.006-0.006,0.009-0.007C497.593,210.259,512,175.48,512,138.488s-14.407-71.77-40.564-97.928 c-0.321-0.321-0.659-0.617-0.984-0.934l-39.17,39.17c0.327,0.316,0.663,0.615,0.984,0.936 C447.961,95.428,456.605,116.293,456.605,138.488z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </icon>
                        <text>
                            Sao Chép
                        </text>
                    </a>
                </div>
            </div>
        </div>
        <div class="touch-close"></div>
    </div>
</div>
<?php }?>
<?php if($isLogin->TD($taikhoan,$user)):?>
<?php if(strpos($current_url,'view-code/')!==false||strpos($current_url,'t/')!==false||strpos($current_url,'post/')!==false||strpos($current_url,'user/')!==false||strpos($current_url,'profile/')!==false) {?>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="naptien_modal" role="dialog">
    <div class="modal-mini full-sm modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb10 touch">
                    <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <b class="modal-title flex ac">
                        <span class="mr6 em14">
                            <i class="icon ri-bank-line c-cyan"></i>
                        </span>Nạp Tiền
                    </b>
                </div>
                <div class="balance-charge-form mini-scrollbar scroll-y max-vh7">
                    <div class="muted-box muted-2-color padding-10 mb10 em09">
                        <div>- Nạp sai cú pháp, sai số tài khoản, sai ngân hàng sẽ bị trừ 20% phí giao dịch và phải liên
                            hệ admin để cộng tay.
                        </div>
                        <div>- Min nạp <?=FormatNumber::TD($TD->Setting('min-transfer'))?> VNĐ cố tình nạp dưới mức nạp sẽ không hỗ trợ.
                        </div>
                    </div>
                    <div class="dependency-box">
                        <div class="muted-2-color em09 mb6">Vui lòng chọn phương thức thanh toán
                        </div>
                        <div class="flex mb10">
                            <div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer active"
                                data-for="payment_method" data-value="<?=$transfer->TD('transfer_id',1);?>">
                                <img src="<?=$transfer->TD('logo',1);?>" alt="logo <?=$transfer->TD('nganhang',1);?>">
                                <div><?=$transfer->TD('nganhang',1);?>
                                </div>
                            </div>
                            <div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer"
                                data-for="payment_method" data-value="<?=$transfer->TD('transfer_id',2);?>">
                                <img src="<?=$transfer->TD('logo',2);?>"
                                    alt="logo <?=$transfer->TD('nganhang',2);?>">
                                <div><?=$transfer->TD('nganhang',2);?>
                                </div>
                            </div>
                            <div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer"
                                data-for="payment_method" data-value="qr-code">
                                <img src="https://play-lh.googleusercontent.com/GcbopowINbIZ-mPFZQKxGk_KXiQdnwU24Qvfn7h8euNDs4Wq17tSb03Jw8-kudwdrEo=w600-h300-pc0xffffff-pd"
                                    alt="logo qr-code">
                                <div>QR-Code
                                </div>
                            </div>
                        </div>
                        <div class="muted-box muted-2-color padding-10 mb10 em09">
                            <div>Nếu sau 10-15p kể từ khi nạp tiền, mà tiền vẫn chưa được cộng vào tài khoản, vui lòng
                                liên hệ cho admin để cộng tay, sẽ không tính thêm phí.
                            </div>Vui lòng liên hệ nếu bạn cầu hỗ trợ<a target="_blank" href="<?=$TD->Setting('zalo')??$TD->Setting('telegram')?>">&nbsp;tại đây
                            </a>
                        </div>
                        <div class="mb10 padding-h10 padding-w6" data-controller="payment_method" data-condition="=="
                            data-value="<?=$transfer->TD('transfer_id',1);?>" is-on="true">
                            <div class="mb6" data-controller="payment_method" data-condition="==" data-value="<?=$transfer->TD('transfer_id',1);?>"
                                is-on="true">
                                <label class="muted-2-color em09">Chủ Tài Khoản</label>
                                <input type="text" readonly class="form-control payment-copy" value="<?=$transfer->TD('chutaikhoan',1);?>">
                            </div>
                            <div>
                                <label class="muted-2-color em09">Số Tài Khoản</label>
                                <input type="number" readonly class="form-control payment-copy" value="<?=$transfer->TD('stk',1);?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb10 padding-h10 padding-w6 payment-hided" data-controller="payment_method"
                        data-condition="==" data-value="<?=$transfer->TD('transfer_id',2);?>" is-on="true">
                        <div class="mb6">
                            <label class="muted-2-color em09">Chủ Tài Khoản</label>
                            <input type="text" readonly class="form-control payment-copy" value="<?=$transfer->TD('chutaikhoan',2);?>">
                        </div>
                        <div>
                            <label class="muted-2-color em09">Số Tài Khoản</label>
                            <input type="number" readonly class="form-control payment-copy" value="<?=$transfer->TD('stk',2);?>">
                        </div>
                    </div>
                    <div class="mb10 padding-h10 padding-w6 payment-hided" data-controller="payment_method"
                        data-condition="==" data-value="qr-code" is-on="true">
                        <div class="mb10 text-center">
                            <div class="pay-qrcode">
                                <a><img data-fancybox src="<?=$transfer->TD('qr-code',1) ?? '/'.__IMG__.'/no-thumbnail.png'?>"
                                        alt="<?=$transfer->TD('nganhang',1);?>">
                                    <span class="qr-label">QR-<?=$transfer->TD('nganhang',1);?></span>
                            </div>
                            <div class="pay-qrcode2">
                                <a><img data-fancybox src="<?=$transfer->TD('qr-code',2) ?? '/'.__IMG__.'/no-thumbnail.png'?>"
                                        alt="<?=$transfer->TD('nganhang',2);?>"></a>
                                <span class="qr-label">QR-<?=$transfer->TD('nganhang',2)?></span>
                            </div>
                        </div>
                        <div>
                            <div class="pay-notice">
                                <div class="notice">Vui lòng quét mã QR để thanh toán. Và nhớ ghi nội dung nạp tiền khi
                                    quét mã.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="but jb-cyan btn-block initiate-pay radius payment-copy"
                        value="<?=$TD->Setting('cuphap-transfer')?><?=$user['user_id'];?>">
                        <?=$TD->Setting('cuphap-transfer')?><?=$user['user_id'];?>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex jc loading-mask absolute main-bg radius8">
            <div class="em2x opacity5">
                <i class="loading"></i>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="report_modal" role="dialog">
    <div class="modal-dialog"134 role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb10 edit-header touch">
                    <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <b class="flex ac c-red">
                        <span class="toggle-radius mr10 c-red">
                            <i class="fa fa-exclamation-triangle"></i>
                        </span>Báo Cáo Người Dùng </b>
                </div>
                <form class="td-report-user">
                    <div class="scroll-y mini-scrollbar max-vh7">
                    <div class="em09 muted-2-color mb6">Người Vi Phạm</div>
                        <div class="mt10 mb20">
                            <div class="flex ac mb6">
                                <a class="report-profile-link">
                                    <span class="avatar-mini mr6">
                                        <img class="report-avatar avatar ls-is-cached lazyload">
                                    </span>
                                </a>
                                <name class="flex ac flex1">
                                    <a class="display-name text-ellipsis report-profile-link"></a>
                                </name>
                            </div>
                        </div>
                        <div class="form-radio mb20 form-but-radio">
                            <div class="em09 muted-2-color mb6">Lý Do Vi Phạm</div>
                            <input type="hidden" name="reason">
                            <span data-for="reason" data-value="Đăng tải nội dung khiêu dâm"
                                class="mr6 mb6 badg p2-10 pointer">Đăng tải nội dung khiêu dâm</span>
                            <span data-for="reason" data-value="Có hành vi lừa đảo"
                                class="mr6 mb6 badg p2-10 pointer">Có hành vi lừa đảo</span>
                                <span data-for="reason" data-value="Tài khoản giả mạo - clone"
                                class="mr6 mb6 badg p2-10 pointer">Tài khoản giả mạo - clone</span>
                            <span data-for="reason" data-value="Quấy rối hoặc lăng mạ"
                                class="mr6 mb6 badg p2-10 pointer">Quấy rối hoặc lăng mạ</span>
                            <span data-for="reason" data-value="Vi phạm bản quyền sở hữu trí tuệ"
                                class="mr6 mb6 badg p2-10 pointer">Vi phạm bản quyền sở hữu trí tuệ</span>
                            <span data-for="reason" data-value="Đăng tải các nội dung spam"
                                class="mr6 mb6 badg p2-10 pointer">Đăng tải các nội dung spam</span>
                        <span data-for="reason" data-other="other" data-value="Lý do khác" class="mr6 mb6 badg p2-10 pointer">Lý do
                                khác</span>
                            <div class="mb20" data-controller="reason" data-condition="==" data-value="other"
                                style="display:none;" is-on="false">
                                <textarea class="form-control" name="reason_other" tabindex="1"
                                    placeholder="Vui lòng nêu lý do vi phạm cụ thể" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="mb20">
                            <div class="em09 muted-2-color mb6">Liên Kết Báo Cáo</div>
                            <input type="text" class="form-control url-victim" name="url" tabindex="1"
                                placeholder="Vui lòng nhập liên kết vi phạm">
                        </div>
                        <div class="mb20">
                            <div class="em09 muted-2-color mb6">Mô Tả Ngắn | <span data-text-limit class="c-red"></span></div>
                            <textarea class="form-control" name="desc" tabindex="2"
                                placeholder="Vui lòng cung cấp các mô tả ngắn vi phạm cụ thể" rows="3"></textarea>
                        </div>
                        <div class="form-upload mb10">
                            <div class="em09 muted-2-color mb6">Hình Ảnh Bằng Chứng</div>
                            <div class="preview">
                                <div class="td-uploads-report add"></div>
                                <div class="preview-item hide">
                                <div class="preview-remove">
                              <div class="ic-close"></div>
                              </div>
                            </div>
                            <input class="hide" type="file" tdupload="image_upload_report" multiple="multiple"
                                accept="image/gif,image/jpeg,image/jpg,image/png,image/webp" name="image_upload_report"
                                action="image_upload">
                        </div>   </div>
                        <div class="em09 padding-h10 muted-box mb10">
                            <div>Lưu Ý:</div>
                            <li>Hãy đảm bảo nội dung bạn báo cáo là chính xác.</li>
                            <li>Chúng tôi sẽ xử lý báo cáo trong vòng 1-2 ngày làm việc kể từ khi nhận được.</li>
                            <li>Nếu báo cáo là chính xác, chúng tôi sẽ xử lý bằng cách đình chỉ tài khoản này theo quy định của <a class="c-purple" target="_blank" href="/tos/">chính sách</a>.</li>
                            <li>Nếu bạn có bất kỳ câu hỏi nào khác, vui lòng liên hệ với bộ phận chăm sóc khách hàng.</li>
                        </div>
                    </div>
                    <div class="but-average modal-buts">
                        <input type="hidden" name="action" value="report_user">
                        <input class="report-profile-link" type="hidden" name="victim">
                        <button type="button" data-dismiss="modal" class="but">Hủy Bỏ</button>
                        <button class="but c-blue" type="submit">
                            <i class="fa fa-check"></i>Xác Nhận </button>
                    </div>
                </form>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
        <div class="touch-close"></div>
    </div>
</div>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="report_notice" role="dialog">
  <div class="modal-dialog modal-mini" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-colorful-header colorful-bg c-yellow">
        <button class="close" data-dismiss="modal">
                            <svg class="ic-close" viewBox="0 0 1024 1024">
                                <path
                                    d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                                </path>
                            </svg>
                        </button>
          <div class="colorful-make"></div>
          <div class="text-center">
            <div class="em2x">
            <i class="ri-shield-check-line"></i>
            </div>
            <div class="mt10 em12 padding-w10">
            Cảm ơn bạn đã báo cáo
            </div>
          </div>
        </div>
        <div class="c-yellow box-body mb10 muted-box">
     Hệ thống đã nhận được thông tin báo cáo của bạn về tài khoản này và hiện đang chờ xử lý.<br><br>
     Nếu báo cáo là đúng sự thật chúng tôi sẽ gửi thông báo cho bạn, vì vậy hãy kiên nhẫn chờ đợi kết quả từ chúng tôi.<br><br>
      Cảm ơn phản hồi của bạn.
        </div>
        <button data-dismiss="modal" class="but jb-yellow padding-lg btn-block mt10"> Đã hiểu</button>
      </div>
      <div class="flex jc loading-mask absolute main-bg radius8">
        <div class="em2x opacity5">
          <i class="loading"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="modal_signout" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div style="padding: 1px;">
                    <div class="modal-colorful-header colorful-bg jb-yellow">
                        <button class="close" data-dismiss="modal">
                            <svg class="ic-close" viewBox="0 0 1024 1024">
                                <path
                                    d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                                </path>
                            </svg>
                        </button>
                        <div class="colorful-make"></div>
                        <div class="text-center">
                            <div class="em2x">
                                <i class="ri-logout-box-r-line"></i>
                            </div>
                            <div class="mt10 em12 padding-w10">Thông Báo Đăng Xuất</div>
                        </div>
                    </div>
                    <div>
                        <div class="ml10">
                            <h4>Xin chào! <?=THANHDIEU($user['hovaten'])?></h4>
                            <p class="c-red">Bạn có chắc chắn muốn đăng xuất khỏi thông tin đăng nhập hiện tại của mình
                                không?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-buts but-average">
                <a type="button" data-dismiss="modal" class="but" href="javascript:;">Hủy Bỏ</a>
                <a type="button" class="but c-red" id="Logout">Xác Nhận</a>
            </div>
        </div>
        <div class="flex jc loading-mask absolute main-bg radius8">
            <div class="em2x opacity5">
                <i class="loading"></i>
            </div>
        </div>
    </div>
</div>
<?php if(strpos($current_url,'user/')!==false){?>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="modal_pay_uservip" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="box-body payvip-modal">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <svg class="ic-close" viewBox="0 0 1024 1024">
                        <path
                            d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                        </path>
                    </svg>
                </button>
                <ul class="list-inline user-box">
                    <li>
                        <div class="avatar-img">
                            <img alt="<?=THANHDIEU($user['hovaten'])?>-<?=$TD->Setting('name-site')?>"
                                src="/<?=__IMG__?>/users/avatar-default.jpg"
                                data-src="/<?=__IMG__.'/users/'.$user['avatar']?>"
                                class="avatar avatar-id-<?=$user['user_id']?> ls-is-cached lazyload">
                        </div>
                    </li>
                    <b><?=THANHDIEU($user['hovaten'])?></b>
                    <div class="c-red em09 mt10">Trở thành thành viên VIP và tận hưởng ưu đãi dành riêng cho thành viên
                        và nhiều đặc quyền</div>
                </ul>
                <ul class="flex jsb mt10 mb20 vip-cardminis gutters-5">
                    <li class="td-1 relative">
                        <a data-toggle="tab" href="#tab-payvip-1" aria-expanded="false">
                            <div class="vip-card vip-cardmini level-1 vip-theme1">
                                <div class="abs-center vip-baicon">
                                    <img class="img-icon ls-is-cached lazyload"
                                        src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                                        data-src="/<?=__IMG__.'/icon/legacy.png'?>" alt="Thành viên legacy">
                                </div>
                                <div class="vip-icon">
                                    <img class="img-icon ls-is-cached lazyload"
                                        src="/<?=__IMG__.'/icon/legacy.png'?>"
                                        data-src="/<?=__IMG__.'/icon/legacy.png'?>" alt="Thành viên legacy">
                                </div>
                                <div class="vip-name">Gói Legacy</div>
                            </div>
                        </a>
                        <div class="abs-right active-icon">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="td-2 relative">
                        <a data-toggle="tab" href="#tab-payvip-2" aria-expanded="false">
                            <div class="vip-card vip-cardmini level-2 vip-theme2">
                                <div class="abs-center vip-baicon">
                                    <img class="img-icon ls-is-cached lazyload"
                                        src="/<?=__IMG__.'/svg/thumbnail-null.svg'?>"
                                        data-src="/<?=__IMG__.'/icon/premium.png'?>" alt="Thành viên premium">
                                </div>
                                <div class="vip-icon">
                                    <img class="img-icon ls-is-cached lazyload"
                                        src="/<?=__IMG__.'/icon/premium.png'?>"
                                        data-src="/<?=__IMG__.'/icon/premium.png'?>" alt="Thành viên premium">
                                </div>
                                <div class="vip-name">Gói Premium</div>
                            </div>
                        </a>
                        <div class="abs-right active-icon">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </div>
                    </li>
                </ul>
                <div class="tab-content mt10">
                    <div class="tab-pane fade active in" id="tab-payvip-1">
                        <form class="user-rent-plans-legacy">
                            <div class="row">
                                <div class="col-sm-5 text-center theme-box">
                                    <div class="icon mb10">
                                        <p class="em2x">
                                            <img class="img-icon ls-is-cached lazyload"
                                                src="/<?=__IMG__.'/icon/legacy.png'?>"
                                                data-src="/<?=__IMG__.'/icon/legacy.png'?>" alt="Thành viên legacy">
                                        </p>Gói Legacy
                                    </div>
                                    <ul class="equity mt10">
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Giảm Giá Sản Phẩm</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Ưu Tiên Hỗ Trợ</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Loại Bỏ Ads</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Ưu Đãi Điểm Ruby</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Khung Avatar Xịn Xò</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Và Còn Hơn Thế Nữa</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="mb10 charge-box">
                                        <label>
                                            <input class="hide vip-product-input" type="radio"
                                                name="vip_product_timeleft" value="1month" checked="checked">
                                            <div class="zib-widget vip-product relative text-center product-box">
                                                <div class="abs-right vip-tag badg jb-yellow">
                                                    <i class="fa fa-history fa-fw"></i> Theo Thời Gian
                                                </div>
                                                <div class="product-price c-red">
                                                    <span class="em09">
                                                        49.000<span class="pay-mark">vnđ</span>
                                                    </span>
                                                </div>
                                                <div class="original-price relative">
                                                    99.999<span class="pay-mark">vnđ</span>
                                                </div>
                                                <div class="muted-2-color c-blue">1 Tháng</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input class="hide vip-product-input" type="radio"
                                                name="vip_product_timeleft" value="forever">
                                            <div class="zib-widget vip-product relative text-center product-box">
                                                <div class="abs-right vip-tag badg jb-yellow">
                                                    <i class="fa fa-fw fa-bolt"></i> Được Đề Xuất
                                                </div>
                                                <div class="product-price c-red">
                                                    <span class="em09">
                                                        199.999<span class="pay-mark">vnđ</span>
                                                    </span>
                                                </div>
                                                <div class="original-price relative">
                                                    300.000<span class="pay-mark">vnđ</span>
                                                </div>
                                                <div class="muted-2-color c-blue">Vĩnh Viễn</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="muted-2-color mb10 em09 muted-box padding-10">
                                        <li>Không hỗ trợ hoàn tiền sau khi đã mua</li>
                                        <li>Lợi ích VIP chỉ áp dụng cho trang web này</li>
                                        <li>Cần hỗ trợ hãy liên hệ với quản trị trang web</li>
                                    </div>
                                    <div class="dependency-box">
                                        <div class="muted-2-color em09 mb6">Vui lòng chọn phương thức thanh toán</div>
                                        <div class="flex mb10">
                                            <div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer"
                                                data-for="payment_method" data-value="balance">
                                                <img src="/<?=__IMG__.'/svg/'?>pay-balance-logo.svg" alt="balance-logo">
                                                <div>Số Dư Tài Khoản</div>
                                            </div>
                                        </div>
                                        <div class="mb10 muted-box padding-h10" data-controller="payment_method"
                                            data-condition="==" data-value="balance" style="display:none;"
                                            is-on="false">
                                            <div class="flex jsb ac">
                                                <b class="muted-2-color">
                                                    <i class="ri-money-dollar-circle-line c-blue"></i> Số Dư Khả
                                                    Dụng:</b>
                                                <div>
                                                    <b class="c-blue-2">
                                                        <?=FormatNumber::TD($td['sodu']);?><span class="mr3 px12"> VNĐ
                                                        </span>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="payment_method" value="balance">
                                        <?php if($td['plans'] === "premium" || $td['plans'] === "legacy"): ?>
                                        <button class="mt6 but jb-red btn-block radius" disabled>Không Thể
                                            Mua</button>
                                        <?php else: ?>
                                        <button class="mt6 but jb-red initiate-pay btn-block radius" type="submit">Thanh
                                            Toán</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="plan_name" value="legacy">
                            <input type="hidden" name="action" value="user_rent_plans_legacy">
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab-payvip-2">
                        <form class="user-rent-plans-premium">
                            <div class="row">
                                <div class="col-sm-5 text-center theme-box">
                                    <div class="icon mb10">
                                        <p class="em2x">
                                            <img class="img-icon ls-is-cached lazyload"
                                                src="/<?=__IMG__.'/icon/premium.png'?>"
                                                data-src="/<?=__IMG__.'/icon/premium.png'?>" alt="Thành viên premium">
                                        </p>Gói Premium
                                    </div>
                                    <ul class="equity mt10">
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Giảm Giá Sản Phẩm</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Ưu Tiên Hỗ Trợ</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Loại Bỏ Ads</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Ưu Đãi Điểm Ruby</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Khung Avatar Xịn Xò</li>
                                        <li><i class="ri-checkbox-circle-line c-green"></i> Và Còn Hơn Thế Nữa</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="mb10 charge-box">
                                        <label>
                                            <input class="hide vip-product-input" type="radio"
                                                name="vip_product_timeleft" value="1month" checked="checked">
                                            <div class="zib-widget vip-product relative text-center product-box">
                                                <div class="abs-right vip-tag badg jb-yellow">
                                                    <i class="fa fa-history fa-fw"></i> Theo Thời Gian
                                                </div>
                                                <div class="product-price c-red">
                                                    <span class="em09">
                                                        159.999<span class="pay-mark">vnđ</span>
                                                    </span>
                                                </div>
                                                <div class="original-price relative">
                                                    200.000<span class="pay-mark">vnđ</span>
                                                </div>
                                                <div class="muted-2-color c-blue">1 Tháng</div>
                                            </div>
                                        </label>
                                        <label>
                                            <input class="hide vip-product-input" type="radio"
                                                name="vip_product_timeleft" value="forever">
                                            <div class="zib-widget vip-product relative text-center product-box">
                                                <div class="abs-right vip-tag badg jb-yellow">
                                                    <i class="fa fa-fw fa-bolt"></i> Được Đề Xuất
                                                </div>
                                                <div class="product-price c-red">
                                                    <span class="em09">
                                                        399.999<span class="pay-mark">vnđ</span>
                                                    </span>
                                                </div>
                                                <div class="original-price relative">
                                                    900.000<span class="pay-mark">vnđ</span>
                                                </div>
                                                <div class="muted-2-color c-blue">Vĩnh Viễn</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="muted-2-color mb10 em09 muted-box padding-10">
                                        <li>Không hỗ trợ hoàn tiền sau khi đã mua</li>
                                        <li>Lợi ích VIP chỉ áp dụng cho trang web này</li>
                                        <li>Cần hỗ trợ hãy liên hệ với quản trị trang web</li>
                                    </div>
                                    <div class="dependency-box">
                                        <div class="muted-2-color em09 mb6">Vui lòng chọn phương thức thanh toán</div>
                                        <div class="flex mb10">
                                            <div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer"
                                                data-for="payment_method" data-value="balance">
                                                <img src="/<?=__IMG__.'/svg/'?>pay-balance-logo.svg" alt="balance-logo">
                                                <div>Số Dư Tài Khoản</div>
                                            </div>
                                        </div>
                                        <div class="mb10 muted-box padding-h10" data-controller="payment_method"
                                            data-condition="==" data-value="balance" style="display:none;"
                                            is-on="false">
                                            <div class="flex jsb ac">
                                                <b class="muted-2-color">
                                                    <i class="ri-money-dollar-circle-line c-blue"></i> Số Dư Khả
                                                    Dụng:</b>
                                                <div>
                                                    <b class="c-blue-2">
                                                        <?=FormatNumber::TD($td['sodu']);?><span class="mr3 px12"> VNĐ
                                                        </span>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="payment_method" value="balance">
                                    <?php if($td['plans'] === "premium" || $td['plans'] === "legacy"): ?>
                                    <button class="mt6 but jb-red btn-block radius" disabled>Không Thể
                                        Mua</button>
                                    <?php else: ?>
                                    <button class="mt6 but jb-red initiate-pay btn-block radius" type="submit">Thanh
                                        Toán</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                    <input type="hidden" name="plan_name" value="premium">
                    <input type="hidden" name="action" value="user_rent_plans_premium">
                    </form>
                </div>
                </form>
            </div>
        </div>
        <div class="flex jc loading-mask absolute main-bg radius8">
            <div class="em2x opacity5">
                <i class="loading"></i>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Change Avatar -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="change_avatar_modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg jb-blue">
                    <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <div class="text-center">
                        <div class="em2x">
                            <i class="ri-shield-user-line"></i>
                        </div>
                        <div class="mt10 em12 padding-w10">Thay đổi hình đại diện
                        </div>
                    </div>
                </div>
                <form class="td-upload-avatar">
                    <div class="form-upload mb20">
                        <p class="muted-2-color">Chọn ảnh làm ảnh đại diện, hỗ trợ định dạng png, jpg, gif, tối đa 2MB,
                            kích thước khuyến nghị 150x150.
                        </p>
                        <label class="pointer flex ac">
                            <div class="preview upload-preview radius">
                                <img class="fit-cover" src="/<?=__IMG__?>/svg/upload-add.svg">
                            </div>
                            <input class="hide" type="file" tdupload="image_upload"
                                accept="image/gif,image/jpeg,image/jpg,image/png,image/webp" name="image_upload"
                                action="image_upload">
                        </label>
                    </div>
                    <div class="modal-buts but-average">
                        <button type="submit" class="but c-blue">
                            <i class="fa fa-check mr10"></i>Xác Nhận
                        </button>
                    </div>
                    <input type="hidden" name="action" value="user_upload_avatar">
                </form>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Change Password -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="change_password_modal"
    role="dialog">
    <div class="modal-mini modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab-content box-body nopw-sm">
                    <div class="modal-colorful-header colorful-bg jb-yellow">
                        <button class="close" data-dismiss="modal">
                            <svg class="ic-close" viewBox="0 0 1024 1024">
                                <path
                                    d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                                </path>
                            </svg>
                        </button>
                        <div class="text-center">
                            <div class="em2x">
                                <i class="ri-lock-2-line"></i>
                            </div>
                            <div class="mt10 em12 padding-w10">Thay đổi mật khẩu</div>
                            <span class="padding-6 px12">Mật khẩu sẽ được hash và thêm salted không ai có thể biết mật
                                khẩu của bạn kể cả chúng tôi.</span>
                        </div>
                    </div>
                    <form class="td-change-password" method="post">
                        <div class="mb20">
                            <div class="relative line-form mb10">
                                <input type="password" name="passwordold" class="line-form-input" tabindex="1"
                                    autocomplete required>
                                <div class="scale-placeholder">Vui lòng nhập mật khẩu cũ</div>
                                <div class="abs-right passw muted-2-color">
                                    <i class="fa-fw fa fa-eye"></i>
                                </div>
                                <i class="line-form-line"></i>
                            </div>
                            <div class="relative line-form mb10">
                                <input type="password" name="newpassword" class="line-form-input" tabindex="2"
                                    autocomplete autocomplete required>
                                <div class="scale-placeholder">Vui lòng nhập mật khẩu mới </div>
                                <div class="abs-right passw muted-2-color">
                                    <i class="fa-fw fa fa-eye"></i>
                                </div>
                                <i class="line-form-line"></i>
                            </div>
                            <div class="relative line-form mb10">
                                <input type="password" name="newpassword2" class="line-form-input" tabindex="3"
                                    autocomplete required>
                                <div class="scale-placeholder">Vui lòng nhập lại mật khẩu mới </div>
                                <div class="abs-right passw muted-2-color">
                                    <i class="fa-fw fa fa-eye"></i>
                                </div>
                                <i class="line-form-line"></i>
                            </div>
                            <input type="hidden" name="action" value="user_change_password">
                            <button type="submit" class="mt10 but jb-blue padding-lg btn-block signsubmit-loader">
                                <i class="fa fa-check"></i>Đổi Mật Khẩu </button>
                        </div>
                    </form>
                    <div class="text-center mt6">
                        <a data-toggle="tab" href="#tab-reset-password" class="em09 muted-2-color"
                            aria-expanded="true">Quên mật khẩu? Bấm để lấy lại mật khẩu</a>
                    </div>
                </div>
                <div class="flex jc loading-mask absolute main-bg radius8">
                    <div class="em2x opacity5">
                        <i class="loading"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php endif; ?>
<?php if(strpos($current_url,'user/')!==false||strpos($current_url,'profile/')!==false){?>
<!-- Modal Xác Minh Tích Xanh -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="apply_verify_modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg c-blue">
                    <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <div class="colorful-make"></div>
                    <div class="text-center">
                        <div class="em2x">
                            <img class="no-events-img" style="height:40px" src="/<?=__IMG__.'/icon/verify.png'?>"
                                alt="User Verify">
                        </div>
                        <div class="mt10 em12 padding-w10">Đăng ký xác minh danh tính
                        </div>
                    </div>
                </div>
                <form class="auth-verify-from">
                    <div class="mb20 mini-scrollbar scroll-y max-vh5">
                        <div class="muted-color mb20">
                            <div class="ml10 no-events-img">
                                <li>Yêu cầu tối thiếu tài khoản trên <img class="lazyload img-icon ml3"
                                        src="/<?=__IMG__.'/level/level-4.svg'?>"
                                        data-src="/<?=__IMG__.'/level/level-4.svg'?>" data-toggle="tooltip"
                                        title="LV 4" alt="User Level"> và đã tạo tài khoản được hơn 1 tuần.</li>
                          <li>Khi đăng ký danh tính, vui lòng đảm bảo rằng thông tin là đúng sự thật. Quá trình xử lý thường mất 2-3 ngày làm việc sau khi nộp đơn.</li>
                          <li>Sẽ có tin nhắn và email thông báo sau khi quá trình xử lý hoàn tất, vui lòng kiểm tra trong thông báo tài khoản.</li>
                            </div>
                        </div>
                        <div class="mb20">
                            <div class="em09 muted-2-color mb6">Xác thực danh tính <span class="c-red">(*)</span>
                            </div>
                            <input type="text" class="form-control" disabled name="hovaten" tabindex="1"
                                value="<?=$user['hovaten']?>" placeholder="Vui lòng nhập tên nhận dạng của bạn"
                                required>
                        </div>
                        <div class="mb20">
                            <div class="em09 muted-2-color mb6">Lý do xác minh <span class="c-red">(*)</span>
                            </div>
                            <textarea class="form-control" name="reason_desc" tabindex="2"
                                placeholder="Vui lòng nhập lý do tại sau bạn cần xác minh danh tính" rows="3"
                                required></textarea>
                        </div>
                    </div>
                    <div class="but-average modal-buts">
                        <button type="button" data-dismiss="modal" class="but"> Hủy bỏ
                        </button>
                        <button type="submit" class="but c-blue">
                            <i class="fa fa-check" aria-hidden="true"></i> Xác Nhận
                        </button>
                        <input type="hidden" name="action" value="user_verify_apply">
                    </div>
                </form>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Chứng Nhận Tích Xanh -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="chungnhan_verify_modal"
    role="dialog">
    <div class="modal-mini modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg c-blue">
                    <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <div class="colorful-make"></div>
                    <div class="text-center">
                        <div class="em2x">
                            <img class="no-events-img" style="height:40px" src="/<?=__IMG__.'/icon/verify.png'?>"
                                alt="User Verify">
                        </div>
                        <div class="mt10 em12 padding-w10">Chứng nhận xác minh
                        </div>
                    </div>
                </div>
                <div class="mb10">
                    <div><b><?=$author['hovaten']??$td['hovaten']?></b>
                      <img class="no-events-img" style="height:17px;margin-top:-3px;"
                            src="/<?=__IMG__.'/icon/verify.png'?>" alt="User Verify">
                    </div>
                    <div class="muted-2-color mt10">Các tài khoản có huy hiệu đã xác minh đều đã được xác thực và có thể là người đăng ký dịch vụ <?=$TD->Setting('name-site')?> đã xác minh hoặc cá nhân/thương hiệu nổi tiếng.
                    </div>
                    <div class="muted-2-color mt10">Thời gian xác minh:
                        <b><?=date('H:i d-m-Y',strtotime(strpos($current_url,'profile/')!== false?$author['time_approved']:$td['time_approved']));?></b>
                    </div>
                </div>
                <?=$AccountVerifier->TD();?>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Sửa Ảnh Bìa -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="change_anhbia_modal"
    role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-colorful-header colorful-bg jb-blue">
                    <button class="close" data-dismiss="modal">
                        <svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg>
                    </button>
                    <div class="text-center">
                        <div class="em2x">
                            <i class="ri-shield-user-line"></i>
                        </div>
                        <div class="mt10 em12 padding-w10">Sửa đổi trang bìa cá nhân
                        </div>
                    </div>
                </div>
                <form class="td-upload-anhbia">
                    <div class="form-upload mb20">
                        <p class="muted-2-color">Chọn một hình ảnh làm ảnh bìa trang cá nhân của bạn. Hỗ trợ các định
                            dạng jpg, png và gif. Kích thước tối đa là 2MB. Kích thước được đề xuất là 1000x500.
                        </p>
                        <label class="pointer" style="width:100%;">
                            <div class="cover-preview radius8 relative">
                                <div class="preview-container preview abs-center">
                                    <img class="fit-cover" src="/<?=__IMG__?>/svg/upload-add.svg">
                                </div>
                            </div>
                            <input class="hide" type="file" tdupload="image_upload"
                                accept="image/gif,image/jpeg,image/jpg,image/png,image/webp" name="image_upload"
                                action="image_upload">
                        </label>
                    </div>
                    <div class="modal-buts but-average">
                        <button type="submit" class="but c-blue">
                            <i class="fa fa-check mr10"></i>Xác Nhận
                        </button>
                        <input type="hidden" name="action" value="user_upload_anhbia">
                </form>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Xem Thông Tin Cá Nhân -->
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="user-details-link" role="dialog">
    <div class="modal-mini modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb10 border-bottom touch" style="padding-bottom: 12px;">
                    <button class="close" data-dismiss="modal"><svg class="ic-close" viewBox="0 0 1024 1024">
                            <path
                                d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                            </path>
                        </svg></button>
                    <div class="td-verify">
                        <div class="user-info flex ac">
                            <a href="/profile/@<?=$author['username'] ?? $td['username']?>">
                                <span class="avatar-img">
                                    <img alt="Avatar của <?=$author['hovaten'] ?? $td['hovaten']?>-<?=$TD->Setting('name-site')?>"
                                        src="/<?=__IMG__.'/users/avatar-default.jpg'?>"
                                        data-src="/<?=__IMG__.'/users/'.$author['avatar'] ?? $td['avatar']?>"
                                        class="avatar avatar-id-<?=$author['id'] ?? $td['id']?> ls-is-cached lazyload">
                                </span>
                            </a>
                            <div class="user-right flex flex1 ac jsb ml10">
                                <div class="flex1">
                                    <name class="flex ac flex1">
                                        <a class="display-name text-ellipsis"
                                            href="/profile/@<?=$author['username'] ?? $td['username']?>"><?=$author['hovaten'] ?? $td['hovaten']?></a>
                                        <?php if ((isset($author['status']) && $author['status'] === 'approved') || (isset($td['status']) && $td['status'] === 'approved')) { ?>
                                        <icon data-toggle="tooltip"
                                            title="Tài Khoản Này Đã Xác Minh Là Thành Viên Chính Thức Của <?= $TD->Setting('name-site') ?>"
                                            class="user-auth-info ml3">
                                            <?= WSUserVerify::TD(); ?>
                                        </icon>
                                        <?php } ?>
                                        <img class="lazyload img-icon ml3" src="/<?=__IMG__?>/thumbnail-null.png"
                                            data-src="/<?=__IMG__.'/level/'.$userLevelShow->TD($author['level'])?>"
                                            data-toggle="tooltip"
                                            title="<?=strtoupper(strpos($author['level'], 'svip') === 0 ? $author['level'] : 'LV'.$author['level'])?>"
                                            alt="User Level">
                                    </name>
                                    <div class="px12-sm muted-2-color text-ellipsis">
                                        <?=$author['tieusu'] ?? $td['tieusu']?></div>
                                </div>
                                <div class="flex0 user-action"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-scrollbar scroll-y max-vh5 flex hh">
                    <div class="mb10 flex">
                        <div class="author-set-left muted-2-color" style="min-width:150px;">WusTeam Verify:</div>
                        <div class="author-set-right mt6">
                            <?= (isset($author['status']) ? $author['status'] : (isset($td['status']) ? $td['status'] : null)) === 'approved' ? 'Đã Xác Minh' : 'Chưa xác minh'; ?>
                        </div>
                    </div>
                    <div class="mb10 flex">
                        <div class="author-set-left muted-2-color" style="min-width:98.7px;">Tiểu Sử:</div>
                        <div class="author-set-right mt6"><?=$author['tieusu'] ?? $td['tieusu']?></div>
                    </div>
                    <div class="mb10 flex">
                        <div class="author-set-left muted-2-color" style="min-width:141px;">Ngày Đăng Ký:</div>
                        <div class="author-set-right mt6"><?=$author['ngaythamgia'] ?? $td['ngaythamgia']?></div>
                    </div>
                    <div class="mb10 flex">
                        <div class="author-set-left muted-2-color" style="min-width: 91px;">E-mail:</div>
                        <div class="author-set-right mt6">
                            <?= isset($author['email']) ? $author['email'] : (isset($td['email']) ? $td['email'] : 'Không xác định'); ?>
                        </div>
                    </div>
                    <div class="mb10 flex">
                        <div class="author-set-left muted-2-color" style="min-width: 108.6px;">Giới Tính:</div>
                        <div class="author-set-right mt6">
                            <?=$author['gender'] ?? $td['gender']?>
                        </div>
                    </div>
                    <div class="mb10 flex">
                        <div class="author-set-left muted-2-color" style="min-width: 106px;">Theo Dõi:</div>
                        <div class="author-set-right mt6">Có <?=CountFormatter::WS(UserTotalFollowing::TD($author['username']))?> người theo dõi
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex jc loading-mask absolute main-bg radius8" style="display: none;">
                <div class="em2x opacity5">
                    <i class="loading"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<div class="modal fade <?php if(isMobile()):?>bottom<?php endif;?>" id="not-auth-modal" tabindex="-1" role="dialog">
  <div class="full-sm modal-dialog" role="document">
    <div class="modal-content" style="">
      <div class="modal-body" style="">
        <div class="mb20 edit-header touch">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <svg class="ic-close" viewBox="0 0 1024 1024">
                        <path
                            d="M573.44 512.128l237.888 237.696a43.328 43.328 0 0 1 0 59.712 43.392 43.392 0 0 1-59.712 0L513.728 571.84 265.856 819.712a44.672 44.672 0 0 1-61.568 0 44.672 44.672 0 0 1 0-61.568L452.16 510.272 214.208 272.448a43.328 43.328 0 0 1 0-59.648 43.392 43.392 0 0 1 59.712 0l237.952 237.76 246.272-246.272a44.672 44.672 0 0 1 61.568 0 44.672 44.672 0 0 1 0 61.568L573.44 512.128z">
                        </path>
                    </svg>
                </button>
        </div>
        <div class="touch">
          <div class="nocan-info">
            <div class="text-center " style="padding:20px 0;">
              <img style="height:220px;opacity:.7;" src="/<?=__IMG__?>/svg/null-cap.svg">
              <p style="margin-top:20px;" class="em09 muted-3-color separator">Xin lỗi! Không đủ quyền để bán mã nguồn</p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex jc loading-mask absolute main-bg radius8">
        <div class="em2x opacity5">
          <i class="loading"></i>
        </div>
      </div>
    </div>
  </div>
</div>