
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php
if (UserSession::CheckAdmin($user)) {
    setcookie('admin', encrypt($user['username'], $TD->Setting('key-aes')), time() + (14 * 24 * 60 * 60), "/", "", true, true);
    header('Location: /admin/dashboard');
    exit;
}
// if ($TD->Setting('admin-page')==1) {exit(include_once($_SERVER['DOCUMENT_ROOT'].'/app/insert/error/403.php'));}
if ($TD->Setting('admin-page')==1){exit(header('Location: /404'));}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/" sizes="32x32" href="/admin/assets/img/favicon.png">
    <title>Đăng Nhập Quản Trị &mdash; <?=$TD->Setting('name-site')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="/admin/assets/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/<?=__LIBRARY__?>/dialog/toast@1.0.1/fuiToast.min.css">
</head>
<style>*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb,-webkit-user-select:none;-ms-user-select:none;user-select:none}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*,::before,::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x:;--tw-pan-y:;--tw-pinch-zoom:;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position:;--tw-gradient-via-position:;--tw-gradient-to-position:;--tw-ordinal:;--tw-slashed-zero:;--tw-numeric-figure:;--tw-numeric-spacing:;--tw-numeric-fraction:;--tw-ring-inset:;--tw-ring-offset-width:0;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / .5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur:;--tw-brightness:;--tw-contrast:;--tw-grayscale:;--tw-hue-rotate:;--tw-invert:;--tw-saturate:;--tw-sepia:;--tw-drop-shadow:;--tw-backdrop-blur:;--tw-backdrop-brightness:;--tw-backdrop-contrast:;--tw-backdrop-grayscale:;--tw-backdrop-hue-rotate:;--tw-backdrop-invert:;--tw-backdrop-opacity:;--tw-backdrop-saturate:;--tw-backdrop-sepia:}::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x:;--tw-pan-y:;--tw-pinch-zoom:;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position:;--tw-gradient-via-position:;--tw-gradient-to-position:;--tw-ordinal:;--tw-slashed-zero:;--tw-numeric-figure:;--tw-numeric-spacing:;--tw-numeric-fraction:;--tw-ring-inset:;--tw-ring-offset-width:0;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / .5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur:;--tw-brightness:;--tw-contrast:;--tw-grayscale:;--tw-hue-rotate:;--tw-invert:;--tw-saturate:;--tw-sepia:;--tw-drop-shadow:;--tw-backdrop-blur:;--tw-backdrop-brightness:;--tw-backdrop-contrast:;--tw-backdrop-grayscale:;--tw-backdrop-hue-rotate:;--tw-backdrop-invert:;--tw-backdrop-opacity:;--tw-backdrop-saturate:;--tw-backdrop-sepia:}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.inset-0{inset:0}.left-0{left:0}.right-0{right:0}.right-2{right:.5rem}.right-2\.5{right:.625rem}.top-0{top:0}.top-3{top:.75rem}.z-50{z-index:50}.z-40{z-index:40}.mx-auto{margin-left:auto;margin-right:auto}.mb-2{margin-bottom:.5rem}.mb-4{margin-bottom:1rem}.ml-2{margin-left:.5rem}.ml-auto{margin-left:auto}.mt-2{margin-top:.5rem}.mt-3{margin-top:.75rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.block{display:block}.flex{display:flex}.inline-flex{display:inline-flex}.hidden{display:none}.h-4{height:1rem}.h-5{height:1.25rem}.h-full{height:100%}.h-screen{height:100vh}.w-4{width:1rem}.w-5{width:1.25rem}.w-full{width:100%}.max-w-md{max-width:28rem}.max-w-xl{max-width:36rem}.flex-1{flex:1 1 0%}.transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.items-center{align-items:center}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.overflow-y-auto{overflow-y:auto}.overflow-x-hidden{overflow-x:hidden}.rounded{border-radius:.25rem}.rounded-lg{border-radius:.5rem}.rounded-md{border-radius:.375rem}.border{border-width:1px}.border-gray-200{--tw-border-opacity:1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-gray-300{--tw-border-opacity:1;border-color:rgb(209 213 219 / var(--tw-border-opacity))}.bg-\[\#8B78EA\]{--tw-bg-opacity:1;background-color:rgb(139 120 234 / var(--tw-bg-opacity))}.bg-blue-700{--tw-bg-opacity:1;background-color:rgb(29 78 216 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgb(249 250 251 / var(--tw-bg-opacity))}.bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.bg-transparent{background-color:transparent}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-opacity-40{--tw-bg-opacity:.4}.bg-opacity-50{--tw-bg-opacity:.5}.bg-cover{background-size:cover}.p-1{padding:.25rem}.p-1\.5{padding:.375rem}.p-2{padding:.5rem}.p-2\.5{padding:.625rem}.p-4{padding:1rem}.p-6{padding:1.5rem}.px-4{padding-left:1rem;padding-right:1rem}.px-5{padding-left:1.25rem;padding-right:1.25rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.py-2\.5{padding-top:.625rem;padding-bottom:.625rem}.py-6{padding-top:1.5rem;padding-bottom:1.5rem}.text-center{text-align:center}.text-4xl{font-size:2.25rem;line-height:2.5rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.tracking-wide{letter-spacing:.025em}.text-blue-500{--tw-text-opacity:1;color:rgb(59 130 246 / var(--tw-text-opacity))}.text-blue-600{--tw-text-opacity:1;color:rgb(37 99 235 / var(--tw-text-opacity))}.text-gray-100{--tw-text-opacity:1;color:rgb(243 244 246 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.placeholder-gray-400::placeholder{--tw-placeholder-opacity:1;color:rgb(156 163 175 / var(--tw-placeholder-opacity))}.shadow{--tw-shadow:0 1px 3px 0 rgb(0 0 0 / .1),0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored:0 1px 3px 0 var(--tw-shadow-color),0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.transition-colors{transition-property:color,background-color,border-color,fill,stroke,-webkit-text-decoration-color;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,-webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4,0,0.2,1);transition-duration:150ms}.duration-200{transition-duration:200ms}.duration-500{transition-duration:500ms}.hover\:bg-blue-400:hover{--tw-bg-opacity:1;background-color:rgb(96 165 250 / var(--tw-bg-opacity))}.hover\:bg-blue-800:hover{--tw-bg-opacity:1;background-color:rgb(30 64 175 / var(--tw-bg-opacity))}.hover\:bg-gray-200:hover{--tw-bg-opacity:1;background-color:rgb(229 231 235 / var(--tw-bg-opacity))}.hover\:text-blue-500:hover{--tw-text-opacity:1;color:rgb(59 130 246 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}.focus\:border-blue-400:focus{--tw-border-opacity:1;border-color:rgb(96 165 250 / var(--tw-border-opacity))}.focus\:border-blue-500:focus{--tw-border-opacity:1;border-color:rgb(59 130 246 / var(--tw-border-opacity))}.focus\:bg-blue-400:focus{--tw-bg-opacity:1;background-color:rgb(96 165 250 / var(--tw-bg-opacity))}.focus\:text-blue-500:focus{--tw-text-opacity:1;color:rgb(59 130 246 / var(--tw-text-opacity))}.focus\:underline:focus{-webkit-text-decoration-line:underline;text-decoration-line:underline}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus\:ring:focus{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.focus\:ring-2:focus{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.focus\:ring-4:focus{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.focus\:ring-blue-300:focus{--tw-ring-opacity:1;--tw-ring-color:rgb(147 197 253 / var(--tw-ring-opacity))}.focus\:ring-blue-400:focus{--tw-ring-opacity:1;--tw-ring-color:rgb(96 165 250 / var(--tw-ring-opacity))}.focus\:ring-blue-500:focus{--tw-ring-opacity:1;--tw-ring-color:rgb(59 130 246 / var(--tw-ring-opacity))}.focus\:ring-opacity-40:focus{--tw-ring-opacity:.4}.focus\:ring-opacity-50:focus{--tw-ring-opacity:.5}:is(.dark .dark\:border-gray-500){--tw-border-opacity:1;border-color:rgb(107 114 128 / var(--tw-border-opacity))}:is(.dark .dark\:border-gray-600){--tw-border-opacity:1;border-color:rgb(75 85 99 / var(--tw-border-opacity))}:is(.dark .dark\:border-gray-700){--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}:is(.dark .dark\:bg-blue-600){--tw-bg-opacity:1;background-color:rgb(37 99 235 / var(--tw-bg-opacity))}:is(.dark .dark\:bg-gray-600){--tw-bg-opacity:1;background-color:rgb(75 85 99 / var(--tw-bg-opacity))}:is(.dark .dark\:bg-gray-700){--tw-bg-opacity:1;background-color:rgb(55 65 81 / var(--tw-bg-opacity))}:is(.dark .dark\:bg-gray-900){--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}:is(.dark .dark\:bg-opacity-80){--tw-bg-opacity:.8}:is(.dark .dark\:text-gray-200){--tw-text-opacity:1;color:rgb(229 231 235 / var(--tw-text-opacity))}:is(.dark .dark\:text-gray-300){--tw-text-opacity:1;color:rgb(209 213 219 / var(--tw-text-opacity))}:is(.dark .dark\:text-white){--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}:is(.dark .dark\:placeholder-gray-400)::placeholder{--tw-placeholder-opacity:1;color:rgb(156 163 175 / var(--tw-placeholder-opacity))}:is(.dark .dark\:placeholder-gray-600)::placeholder{--tw-placeholder-opacity:1;color:rgb(75 85 99 / var(--tw-placeholder-opacity))}:is(.dark .dark\:ring-offset-gray-800){--tw-ring-offset-color:#1f2937}:is(.dark .dark\:hover\:bg-blue-700:hover){--tw-bg-opacity:1;background-color:rgb(29 78 216 / var(--tw-bg-opacity))}:is(.dark .dark\:hover\:bg-gray-800:hover){--tw-bg-opacity:1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}:is(.dark .dark\:hover\:text-white:hover){--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}:is(.dark .dark\:focus\:border-blue-400:focus){--tw-border-opacity:1;border-color:rgb(96 165 250 / var(--tw-border-opacity))}:is(.dark .dark\:focus\:ring-blue-600:focus){--tw-ring-opacity:1;--tw-ring-color:rgb(37 99 235 / var(--tw-ring-opacity))}:is(.dark .dark\:focus\:ring-blue-800:focus){--tw-ring-opacity:1;--tw-ring-color:rgb(30 64 175 / var(--tw-ring-opacity))}@media(min-width:768px){.md\:inset-0{inset:0}.md\:h-auto{height:auto}.md\:h-full{height:100%}}@media(min-width:1024px){.lg\:block{display:block}.lg\:w-1\/2{width:50%}.lg\:w-2\/6{width:33.333333%}.lg\:px-8{padding-left:2rem;padding-right:2rem}img{pointer-events:none!important;}}#key-geetest{display:none;}</style>
<body class="cqrjt c2wc5 cxs0p cb0rx c8fn4">
<div id="fui-toast"></div>
    <div class="snowflakes" aria-hidden="true">
        <div class="snowflake"> ❅ </div>
        <div class="snowflake"> ❆ </div>
        <div class="snowflake"> ❅ </div>
        <div class="snowflake"> ❆ </div>
        <div class="snowflake"> ❅ </div>
        <div class="snowflake"> ❆ </div>
        <div class="snowflake"> ❅ </div>
        <div class="snowflake"> ❆ </div>
        <div class="snowflake"> ❅ </div>
        <div class="snowflake"> ❆ </div>
        <div class="snowflake"> ❅ </div>
        <div class="snowflake"> ❆ </div>
    </div>
    <!-- Page wrapper -->
    <div class="cqkfc ctkta c1yb0 cx3hx">
        <main class="cmm3x">
            <section class="c910c">
                <!-- Illustration -->
                <div class="cd3pv c22q0 c05st ck1c9 cuawg clm9l cf1fs cynpp cbati" aria-hidden="true">
                    <img src="/admin/assets/img/auth-illustration.svg" class="cl1mx" width="1440"
                        height="450" alt="Page Illustration">
                </div>
                <div class="ckx8h c910c csj8y c82l3 cl9xt">
                    <div class="c6ftu cbp8b ch0mu clflm">
                        <!-- Page header -->
                        <div class="cst88 cxe5f c82l3 ch0mu">
                            <!-- Logo -->
                            <div class="c0o0c">
                                <a class="cex2t">
                                    <div
                                        class="cxli6 cxnq1 ctlwn cpd3b c85im c3tia c16i7 c7n90 ckodt cgqg9 c910c cgdfq cx3hx cgoq9 cct6l">
                                        <img class="c910c" src="/admin/assets/img/logo.png" width="42"
                                            height="42" alt="Stellar">
                                    </div>
                                </a>
                            </div>
                            <!-- Page title -->
                            <h1 class="c1wf5 cyvm0 ctvzo c3btc cj15g cnu2b c7ehl">Administrator</h1>
                        </div>
                        <!-- Form -->
                        <div class="c2vxn c82l3">
                            <form class="auth-admin-lg">
                                <div class="c5wx5">
                                    <div>
                                        <label class="cvgqz c1xbd crcb7 c84xd cnc21" for="username">Tài
                                            khoản/Username</label>
                                        <input class="cmdqe c0l3r" type="text" required name="username"
                                            placeholder="Tài khoản" autofocus="">
                                    </div>
                                    <div>
                                        <div class="cajqb cx3hx">
                                            <label class="cvgqz c1xbd crcb7 c84xd cnc21" for="password">Mật
                                                khẩu/Password</label>
                                            <a class="c8q9c ckvr2 cl1vv c1xbd cl17h cqlg5 crcb7 cmk82"
                                                data-modal-toggle="resetpw-modal">Quên mật
                                                khẩu?</a>
                                        </div>
                                        <input class="cmdqe c0l3r" type="password" required name="password" autocomplete="off" placeholder="Mật khẩu">
                                    </div>
                                </div>
                                <div>
                                <div style="margin-top:14px" id="captcha_login"></div>
                                </div>
                                <div class="cvgrh">
                                    <input type="hidden" name="action" value="auth-admin-lg">
                                    <button type="submit" data-res="3"
                                        class="cpyov cytct cqoeq cwsfh crcb7 c0l3r car0u ccr9i">Đăng Nhập
                                        <span class="cbzrl ceydo c52y9 citxd cl1vv cl17h cqbh5">-&gt;</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    </div>
    </div>
    </section>  
    <div id="key-geetest"><?=$TD->Setting('key-geetest')?></div>
    <!-- jQuery -->
    <script src="/<?= __LIBRARY__ ?>/jquery.min.js"></script>
    <!-- Toast -->
    <script src="/<?= __LIBRARY__ ?>/dialog/toast@1.0.1/fuiToast.min.js"></script>
    <!-- Captcha -->
    <script src="/<?=__JS__?>/gt4.js"></script>
    <!-- Custom JavaScript -->
    <script src="/admin/assets/js/custom.js?v=<?=random_int(2,2222)?>"></script>
</body>
</html>