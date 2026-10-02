<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php $url_site=$_SERVER['HTTP_HOST'];$url_format=str_replace(['http://', 'https://', '/'], '', $url_site);?>
<?php
 if (isset($_GET['url'])) {
$target_url=Base64_Dec($_GET['url']);
if (filter_var($target_url, FILTER_VALIDATE_URL)) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?=$TD->Setting('name-site')?> | Cảnh Báo Chuyển Hướng...</title>
    <!-- <script src="//thanhdieu.com/files/ads-blocked.js?v=2.1" defer></script> -->
    <!-- <script src="https://alwingulla.com/88/tag.min.js" data-zone="45471" async data-cfasync="false"></script> -->
    <link rel="icon" type="image/png" sizes="16x16" href="//i.imgur.com/mhZ7DIO.png">
    <style>.flex,.flex-end{display:flex}body{user-select:none;margin:0;padding:0 height: 100%}#loading{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;display:-webkit-box;display:-ms-flexbox;display:flex;position:fixed;top:0;left:0;width:100%;height:100%;background:#e8eaec}.io-black-mode #loading{background:#1b1d1f}.loading-content{position:absolute;top:10%;padding:0 10px;max-width:580px;z-index:10000000}.flex-center{align-items:center}.flex-end{justify-content:flex-end}.flex-fill{-ms-flex:1 1 auto!important;flex:1 1 auto!important}.logo-img{text-align:center}.logo-img img{width:90px;height:auto;margin-bottom:-4px}.loading-info{padding:20px;background:#fff;border-radius:10px;box-shadow:0 15px 20px rgba(18,19,20,.2)}.loading-tip{background:rgba(255,158,77,.1);border-radius:6px;padding:5px}.loading-text{font-family:Sarabun;color:#b22e12;font-weight:700}.loading-topic{padding:20px 0;font-family:Merriweather Sans;border-bottom:1px solid rgba(136,136,136,.2);margin-bottom:20px;font-size:12px;word-break:break-all}a{text-decoration:none}.loading-btn,.loading-btn:active,.loading-btn:visited{font-family:Lalezar;color:#fc5531;border-radius:5px;border:1px solid #fc5531;padding:5px 20px;transition:.3s}.loading-btn:hover{color:#fff;background:#fc5531;box-shadow:0 15px 15px -10px rgba(184,56,25,.8)}.loading-url{color:#fc5531}.taxt-auto{font-family:Sarabun;color:#787a7d;font-size:14px}.auto-second{font-family:Mitr;color:#fc5531;font-size:14.2px;margin-right:5px;font-weight:700}.warning-ico{width:30px;height:26px;margin-right:5px;background-image:url("data:image/svg+xml,%3Csvg class='icon' viewBox='0 0 1024 1024'xmlns='http://www.w3.org/2000/svg'width='32'height='32'%3E%3Cpath d='M872.7 582.6L635.2 177c-53.5-91.3-186.6-88.1-235.6 5.7L187.7 588.3c-46.8 89.7 18.2 197 119.4 197h449.4c104 0 168.8-112.9 116.2-202.7zM496.6 295.2c0-20.5 11.7-31.5 35.1-32.9 22 1.5 33.7 12.5 35.1 32.9V315l-26.4 267.9h-13.2L496.6 315v-19.8zm35.2 406.3c-22-1.5-34.4-13.2-37.3-35.1 1.4-19 13.2-29.3 35.1-30.7 23.4 1.5 36.6 11.7 39.5 30.7-1.5 21.9-13.9 33.6-37.3 35.1z'fill='%23f55d49'/%3E%3C/svg%3E")}.io-black-mode .loading-info{color:#eee;background:#2b2d2f}.io-black-mode .loading-text{color:#ff8369}@media (min-width:768px){.loading-content{min-width:450px}}</style>
    <style>@import url('https://fonts.googleapis.com/css?family=Sarabun|Geologica|Merriweather Sans|Lexend Deca|Reem Kufi Fun&display=swap');@import url('https://fonts.googleapis.com/css?family=Readex Pro|Mitr|Lalezar&display=swap');.loader{width:130px;height:170px;position:relative;margin-top:9rem}.loader::after,.loader::before{content:"";width:0;height:0;position:absolute;bottom:30px;left:15px;z-index:1;border-left:50px solid transparent;border-right:50px solid transparent;border-bottom:20px solid rgba(107,122,131,.15);transform:scale(0);transition:.2s}.loader::after{border-right:15px solid transparent;border-bottom:20px solid rgba(102,114,121,.2)}.loader .getting-there{width:120%;text-align:center;position:absolute;bottom:0;left:-7%;font-family:Mitr;font-size:12px;letter-spacing:2px;color:#555}.loader .binary{width:100%;height:140px;display:block;color:#555;position:absolute;top:0;left:15px;z-index:2;overflow:hidden}.loader .binary::after,.loader .binary::before{font-family:Lato;font-size:24px;position:absolute;top:0;left:0;opacity:0}.loader .binary:first-child::before{content:"0";-webkit-animation:1.1s linear infinite a;animation:1.1s linear infinite a}.loader .binary:first-child::after{content:"0";-webkit-animation:1.3s linear infinite b;animation:1.3s linear infinite b}.loader .binary:nth-child(2)::before{content:"1";-webkit-animation:.9s linear infinite c;animation:.9s linear infinite c}.loader .binary:nth-child(2)::after{content:"1";-webkit-animation:.7s linear infinite d;animation:.7s linear infinite d}.loader.JS_on::after,.loader.JS_on::before{transform:scale(1)}@-webkit-keyframes a{0%{transform:translate(30px,0) rotate(30deg);opacity:0}100%{transform:translate(30px,150px) rotate(-50deg);opacity:1}}@keyframes a{0%{transform:translate(30px,0) rotate(30deg);opacity:0}100%{transform:translate(30px,150px) rotate(-50deg);opacity:1}}@-webkit-keyframes b{0%{transform:translate(50px,0) rotate(-40deg);opacity:0}100%{transform:translate(40px,150px) rotate(80deg);opacity:1}}@keyframes b{0%{transform:translate(50px,0) rotate(-40deg);opacity:0}100%{transform:translate(40px,150px) rotate(80deg);opacity:1}}@-webkit-keyframes c{0%{transform:translate(70px,0) rotate(10deg);opacity:0}100%{transform:translate(60px,150px) rotate(70deg);opacity:1}}@keyframes c{0%{transform:translate(70px,0) rotate(10deg);opacity:0}100%{transform:translate(60px,150px) rotate(70deg);opacity:1}}@-webkit-keyframes d{0%{transform:translate(30px,0) rotate(-50deg);opacity:0}100%{transform:translate(45px,150px) rotate(30deg);opacity:1}}@keyframes d{0%{transform:translate(30px,0) rotate(-50deg);opacity:0}100%{transform:translate(45px,150px) rotate(30deg);opacity:1}}.io-black-mode .loader .binary,.io-black-mode .loader .getting-there{color:#bbb}</style>
    <style>body,html{background:#f3f4f5;font-family:PingFang SC,Hiragino Sans GB,Arial,Microsoft YaHei,Verdana,Roboto,Noto,Helvetica Neue,sans-serif;padding:0;margin:0}a{text-decoration:none}.urlArea{padding-top:50px;width:450px;margin:auto;word-break:break-all}.urlArea .logo img{display:block;margin:auto auto 0;max-width:150px}.urlArea .main{background:#fff;padding:24px;border-radius:12px;border:1px solid #e1e1e1}.urlArea .flex{display:flex;align-items:center}.urlArea .btn{display:flex;justify-content:flex-end;align-items:center}.urlArea .tip{background:#e8eefa;padding:12px;margin-bottom:16px;border-radius:4px}.urlArea .urlColor{color:red}.urlArea .urlBox{font-size:14px;color:#222226;line-height:24px;margin-bottom:24px}.urlArea .ico{width:24px;height:24px}.urlArea .goBtn{white-space:nowrap;font-size:14px;background-color:#408ffa;color:#fff;border:1px solid #408ffa;display:inline-block;box-sizing:border-box;padding:6px 18px;border-radius:18px;margin-top:-25px}.urlArea .icoTxt{font-size:16px;font-weight:600;color:#222226;line-height:22px;margin-left:12px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}@media (max-width:600px){.urlArea{padding-top:90px;width:94%}}</style>
</head>
<body>
    <div class="urlArea">
        <div class="logo">
            <img src="//i.imgur.com/mhZ7DIO.png" alt="anime">
        </div>
        <div class="main">
            <div class="flex tip">
                <img class="ico"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAADWUlEQVRoQ+2YvWsUQRiH33fmOMQiRQor7RQSweB9KAQEg1iYKFaZnJJ/wcTOMhLs7Ez8FwLebikasTGCoJDcHSoYQbHRyiKFhajczCu3SS73sbfzsXNJDnLV3s4y83vm3X12dhAG/IcDnh+OAHpVkITISvg2DYyQjwyVcXGt3o9q960CdZELAWC6ERoRn/CgentgAGimOCVJPmsNzJFfx2DjuW8I7xWg+xMZ9enXRwIaaQ2LgJ/Z2aFzvm8l7wBypjBPpB7FzTQiu8uDypLPKngFIDE+rODPFwIYjgUA2GJw7AyGb7d8QXgFkCK/TEB3ksIh4GMeVucOHQCV8qNKwQcCymgA6ozBGJarmz4gvFWgLvKrAHTNLBS+yITVSbNrk6/yAhCnTV04X1pNDdBLmzoAX1pNDZCkTS2EB62mAtBpUwvgQaupAEy0qYdIp1VnAFNtGgCk0qozgJ02tRjOWnUCoFJxUiqZuLJEgB+AbCWKTmqWAE4mYXDGp7C8sapD7Wy3BjDVJke8iUH1aZS/lL8hFUXHvX6uWrUGMNUmByxiWK1sAxTyUqnoOBHCQatWADbadAJw0KoVgJwpLBEpo5WkC0CjOohsmQeVeV21dtuNAWy16QwAaKVVYwBbbboCbM+s+WrVCMBEm50lTwcAYKpVLYCpNrsALDXa7XezTQAtgKk2Y14wVi+yuIfWZBMgEcBGm6bWsLkODbSaCGCjTZtgNtfqtNoTwFabMffwb0DYWQvBLAEdtwm+5/lkrfYEsNVmazgElIzxcSyvr0dLiVu5opL4joC4C0SSVmMBXLTZBoDwnge1863npMjVCKDtnA1ML612Abhqs70C8JPB6VMYhv+iCgiRVfD1OwGcsAndPim4yUaHxjr3VrsAZCk3RwpS718i4gpjdK8RQil8SESzruGbzwODeV6uLXdM1t7fg9amDjBOq20VOAza1EJ0rFabAGm1qRvYVzt2rFabAHWRa3zjetmv9BU2oZ/VTFibarRHACQuXJZQX9uHgb0NwZFdwaDyKgKQorBAoBa99b4PHSHCAx7UFnYqULikUL0mArYPY6ceInrTA05gWHmz9xCL4kWF6ioAZFOP0NcO8C8jerm746H9HuhrFg+dHwF4mMRUXQx8Bf4DeBHHQHvQneAAAAAASUVORK5CYII=">
                <div class="icoTxt">Cảnh Báo Chuyển Hướng</div>
            </div>
            <div class="urlBox">
                <span>
                    <div style="font-weight:bold;padding-bottom:8px;">Bạn sắp được chuyển hướng đến liên kết!
                    </div>Mục tiêu: <a
                        class="urlColor"><?=(isMobile()?$cut->characters($target_url,40):$target_url)?></a>
                </span>
            </div>
            <div class="flex flex-center">
                <div class="taxt-auto">
                    Tự động chuyển hướng: <span id="time"
                        class="auto-second"><?php if(!$planInfo) {?>61<?php } else {?>10<?php }?></span>giây
                </div>
                </div>
                <div class="btn">
                    <a id="goBtn" class="goBtn" href="#" onclick="CheckNow(event);">Tiếp
                        Tục</a>

                </div>
            </div>
        </div>
 <script>
DelayURL();
function DelayURL() {var delay=document.getElementById("time").innerHTML;var t=setTimeout("DelayURL()", 1000);if (delay>0) {delay--;document.getElementById("time").innerHTML=delay;} else {clearTimeout(t);var target_url=<?php echo json_encode($target_url); ?>; window.location.href=target_url;}}</script>
<script>function CheckNow(n){n.preventDefault(),setTimeout(function(){window.location.href="<?= $target_url ?>"},100)}</script>
</body>
</html>
<?php } else{ exit(header('location: /'));} }?>