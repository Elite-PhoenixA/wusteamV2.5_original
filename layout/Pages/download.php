<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/global/downloadModel.php');?>
<?php $options_header = ['title' => "Trang Tải Xuống | " . $TD->Setting('name-site'), 'description' => 'Trung tâm tải xuống mã nguồn',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<style>
.mb10 {
    display: none;
}

.but-download>.but,
.but-download>span {
    min-width: 200px;
    padding: .5em;
    margin-top: 10px;
}

.pay-extra-hide {
    background: var(--muted-border-color);
    display: block;
    margin: 10px;
    padding: 20px;
    color: var(--muted-color);
    border-radius: 4px;
}

/*Download Style*/
.but-download {
    display: table-cell;
}

.download-article {
    margin-bottom: 40px !important;
    padding: 0 10px;
    width: 100%;
    margin: 0 auto;
}

.download-demo {
    margin: 10px 0;
}

.download-hk {
    padding: 0 0 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.download-sty {
    text-align: center;
    height: 260px;
    border-radius: 8px;
    position: relative;
}

@media (max-width:530px) {
    .but-download {
        display: block;
    }

    .but-download>.but,
    .but-download>span {}
}

@media (max-width:700px) {
    .download-sty {
        height: 100%;
        /* display: none; */
    }

    .download-right {
        padding: 10px !important;
        height: 100% !important;
        width: 100%;
    }

    .download-theme-box {
        margin-top: 24px;
    }
}

@media (min-width:700px) {
    .display {
        display: none;
    }
}

@media (min-width: 1100px) {
    .download-article {
        width: 900px;
    }
}

@media (max-width: 950px) {
    .download-notice {
        display: flex;
    }

    .head h2 {
        font-size: 22px !important;
    }
}

.download-sty img {
    border-radius: 12px;
    position: relative;
}

.download-theme-box {
    margin: 10px 0 20px 0;
    text-align: center;
}

.download-right {
    margin-left: 6px;
    border: 1px solid #f04494;
    padding: 24px;
    border-radius: 8px;
    position: relative;
}

.download-file-name {
    font-size: 20px;
}

.but-download>.but,
.but-download>span {
    min-width: 130px;
    padding: .5em;
    margin-top: 10px;
}

.pay-extra-hide {
    background: var(--muted-border-color);
    display: block;
    margin: 10px;
    padding: 20px;
    color: var(--muted-color);
    border-radius: 4px;
}

.panel {
    margin-bottom: 10px;
    background-color: #fff;
    border: 1px solid var(--theme-color);
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}

.panel-heading {
    padding: 10px 15px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    color: #fff;
    background-color: var(--focus-color);
}

/*Border color*/
.panel-heading h3 {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 14px;
    color: #0000FF;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
}

.panel-body .shengming {
    line-height: 25px;
    font-size: 14px;
    color: #C33;
}

.head {
    height: 80px;
    letter-spacing: 8px;
    color: #fff;
    background: url('/<?=__IMG__?>/main/dl_head.png') center no-repeat;
    text-align: center;
    border-radius: 10px 10px 0 0;
    position: relative;
    top: -20px;
    margin: -10px;
    margin-bottom: 20px;
}

.head h2 {
    line-height: 90px;
    font-size: 30px;
    font-family: 'Rowdies' !important;
}

.download-notice {
    padding: 24px;
    border: 1px solid #e5e5e5;
    background-color: #f7f7f7;
    position: relative;
    margin: 0px -10px;
    border-radius: 0 0 8px 8px;
}

.download-notice-title {
    width: 190px;
    height: 100px;
    margin-right: 18px;
    margin-top: 4px;
    padding-top: 32px;
    border-right: 1px solid #ccc;
    text-align: center;
    font-size: 28px;
    color: #999;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 700;
}

.download-notice-ico {
    width: 36px;
    height: 29px;
    background-position: 0 -372px;
}
.fl {
    float: left;
    display: inline;
}

.red1 {
    color: #eb0064;
    font-size: 14px;
}

.mb5 {
    margin-right: 5px;
    margin-bottom: 5px;
}

.vertical-middle {
    vertical-align: middle;
}

.download-notice-detail p {
    font: 13px/1.25 Arial, Helvetica, sans-serif;
}

.popTipBox {
    padding: 5px 10px;
    border: 1px solid #ffd8c0;
    background-color: #fff9f3;
    font-size: 13px;
    color: #e10074;
    line-height: 22px;
}

.but-download a {
    margin-left: 10px;
    margin-right: 4px;
}
.help {
  color: black;
}
</style>
<main class="container">
    <div class="content-wrap">
        <div class="content-layout">
            <div class="zib-widget article download-article">
                <div class="head">
                    <h2 class="" id="hk-rainbow">TRANG TẢI XUỐNG</h2>
                </div>
                <div class="download-demo">
                    <div class="download-hk">
                        <div class="download-right">
                            <div class="download-sty item-thumbnail">
                                <badge class="img-badge left jb-red"
                                    style="z-index: 2;font-size: 12px;padding: 2px 10px;line-height: 1.4;" img-badge=""
                                    left="">
                                    <i class="fa fa-check mr6" aria-hidden="true"></i>Đã Mua
                                </badge>
                                <img data-fancybox src="/<?=__IMG__.'/uploads/'.$productData['hinhthunho']?>">
                            </div>
                            <div class="article-header download-theme-box">
                                <div class="article-title" style="margin-top: 0;">
                                    <span class="download-file-name"></span>
                                    <a href="/view-code/<?=$productData['slug']?>"><?=$productData['tieude']?></a>
                                </div>
                            </div>
                            <div></div>
                            <div class="muted-2-color em09"></div>
                            <div>
                                <div style="/*margin-bottom:3em;*/">
                                        <div class="mb10"
                                            style="padding: 10px 20px;background:var(--muted-border-color);border-radius:4px;">
                                            <div class="mb6"><b>Ngày Mua:
                                                </b><?=FormatTime::TD($productData['ngaymua'])?></div>
                                            <div class="mb6"><b>Ngày Cập Nhật:
                                                </b><?=FormatTime::TD($productData['ngaycapnhat'])?></div>
                                            <div class="mb6"><b>Giá Đã Mua:
                                                </b><?=FormatNumber::TD($productData['giamua'],2)?>đ</div>
                                            <div class="mb6"><b>Giá Hiện Tại:
                                                </b><?=FormatNumber::TD($productData['giatien'],2)?>đ</div>
                                            <div class="mb6"><b>Phân Loại: </b><?=$productData['phanloai']?></div>
                                        </div>
                                    <div>
                                        <div class="flex ac hh">
                                            <div class="but-download flex ac">
                                                <a target="_blank"
                                                    href="/goto?url=<?=Base64_Enc($productData['download_url'])?>"
                                                    class="mr10 but b-cyan">
                                                    <i class="ri-download-cloud-2-line"></i>&ensp;Tải Xuống</a>
                                                <span onclick="location.href=document.referrer;return false;"
                                                    class="badg"><i class="ri-arrow-left-s-line"></i> Trở lại</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--start-->
                <div class="panel">
          <div class="panel-heading">
            <h3>
            <i class="ri-question-line"></i>&ensp;Hướng dẫn
            </h3>
          </div>
          <div class="panel-body">
            <ul class="help">
            <li>1. Thông thường, mật khẩu giải nén cho các gói file zip do <?=$TD->Setting('name-site')?> cung cấp là <em>www.wusteam.com</em>.
            <li>2. Nếu tệp tải xuống ở định dạng file nén (zip), vui lòng cài đặt phần mềm 7z, winrar hoặc phần mềm nén khác để giải nén.</li>
            <li>3. Mã nguồn có thể bị đồng bộ hoặc sai link tải xuống. Nếu gặp vấn đề này, vui lòng vào trang sản phẩm đó để đóng góp ý kiến ​​để <?=$TD->Setting('name-site')?> được cập nhật kịp thời.</li>
            <li>4. Đối với các vấn đề tải xuống khác, vui lòng tự tìm kiếm hướng dẫn. Tôi sẽ không giải thích từng vấn đề một ở đây.</li>
            </ul>
          </div>
          </di>
                <!--end-->
            </div>
        </div>
    </div>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>