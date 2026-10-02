<?php
function ExcludedDatabase() {
    $a = ['profile/', 'user/', 'view-code/', 'post/', 't/'];
    foreach ($a as $b) {
        if (!preg_match("~^/{$b}(/|$)~", $_SERVER["REQUEST_URI"])) {
            return true;
        }
    }
    return null;
}
if (ExcludedDatabase()) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');
}
if ($TD->Setting('bao-tri')==1){exit(require_once($_SERVER['DOCUMENT_ROOT'].'/app/insert/error/maintenance.php'));}
// if (!isset($_SESSION['captcha_session']) && !$_SESSION['captcha_session'] === 'success') {?>
<!DOCTYPE HTML>
<html lang="vi-VN">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=0.0, viewport-fit=cover">
    <meta name='robots' content='max-image-preview:large' />
    <meta property="og:url" content="<?=$databaseWs->getFullURL()?>" />
    <meta property="og:image" content="<?=$options_header['og:image'] ?? ($TD->Setting('og:image') === '' ? '/' . __IMG__ . '/banner.png' : $TD->Setting('og:image'))?>">
    <title><?=$options_header['title'] ?? $TD->Setting('title')?></title>
    <meta name="keywords" content="<?=$options_header['keywords'] ?? $TD->Setting('keywords')?>">
    <meta name="description" content="<?=$options_header['description'] ?? $TD->Setting('description')?>">
    <meta property="og:description" content="<?=$options_header['description'] ?? $TD->Setting('description')?>"/>
    <?php for($i=0;$i<random_int(1000,2000); $i++)echo str_repeat(' ',random_int(10,1000))."<!-- @Author: ThanhDieu.Com -->\n";?>
    <meta property="og:title" content="<?=$options_header['title'] ?? $TD->Setting('title')?>" />
    <link rel="canonical" href="https://<?=$domain?>"/>
    <meta property="og:locale" content="vi_VN" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.min.css" rel="stylesheet">
    <link rel='stylesheet' id='theme-block-library-css' href='/<?=__CSS__?>/dist/style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='_bootstrap-css' href='/<?=__CSS__?>/bootstrap.min.css?ver=7.6' type='text/css' media='all' />
    <link rel='stylesheet' id='_fontawesome-css' href='/<?=__CSS__?>/font-awesome.min.css?ver=7.6' type='text/css' media='all' />
    <link rel='stylesheet' id='_main-css' href='/<?=__CSS__?>/main.min.css?v=<?=$TD->Setting('cache')?>' type='text/css' media='all' />
    <link rel="stylesheet" href="/<?=__LIBRARY__?>/fancybox/fancybox.css">
    <link rel="stylesheet" href="/<?=__LIBRARY__?>/swiper@11.1.1/swiper.min.css">
    <link rel='shortcut icon' href='/<?=__IMG__?>/favicon.png'>
    <link rel='icon' href='/<?=__IMG__?>/favicon.png'>
    <link rel='apple-touch-icon-precomposed' href='<?=__IMG__?>/favicon.png'>
    <link rel="stylesheet" href="/<?=__CSS__?>/custom.css?v=<?=$TD->Setting('cache')?>">
    <link rel="stylesheet" href="/<?=__CSS__?>/ws_gpt.css?v=<?=$TD->Setting('cache')?>">
  </head>
  <body class="home blog nav-fixed <?=$TD->Setting('skin-theme')?> site-layout-1 <?=(isMobile()&&preg_match('/\/user\/(?!$)/',$current_url))?'drawer-show':'';?>">
  <style id='global-styles-inline-css' type='text/css'>
            body {
               --theme--preset--color--black: #000000;
               --theme--preset--color--cyan-bluish-gray: #abb8c3;
               --theme--preset--color--white: #ffffff;
               --theme--preset--color--pale-pink: #f78da7;
               --theme--preset--color--vivid-red: #cf2e2e;
               --theme--preset--color--luminous-vivid-orange: #ff6900;
               --theme--preset--color--luminous-vivid-amber: #fcb900;
               --theme--preset--color--light-green-cyan: #7bdcb5;
               --theme--preset--color--vivid-green-cyan: #00d084;
               --theme--preset--color--pale-cyan-blue: #8ed1fc;
               --theme--preset--color--vivid-cyan-blue: #0693e3;
               --theme--preset--color--vivid-purple: #9b51e0;
               --theme--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);
               --theme--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);
               --theme--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);
               --theme--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);
               --theme--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);
               --theme--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);
               --theme--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);
               --theme--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);
               --theme--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);
               --theme--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);
               --theme--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);
               --theme--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);
               --theme--preset--font-size--small: 13px;
               --theme--preset--font-size--medium: 20px;
               --theme--preset--font-size--large: 36px;
               --theme--preset--font-size--x-large: 42px;
               --theme--preset--spacing--20: 0.44rem;
               --theme--preset--spacing--30: 0.67rem;
               --theme--preset--spacing--40: 1rem;
               --theme--preset--spacing--50: 1.5rem;
               --theme--preset--spacing--60: 2.25rem;
               --theme--preset--spacing--70: 3.38rem;
               --theme--preset--spacing--80: 5.06rem;
               --theme--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
               --theme--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
               --theme--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
               --theme--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
               --theme--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
            }

            :where(.is-layout-flex) {
                gap: 0.5em;
            }

            body .is-layout-flow > .alignleft {
                float: left;
                margin-inline-start: 0;margin-inline-end: 2em;}

            body .is-layout-flow > .alignright {
                float: right;
                margin-inline-start: 2em;margin-inline-end: 0;}

            body .is-layout-flow > .aligncenter {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            body .is-layout-constrained > .alignleft {
                float: left;
                margin-inline-start: 0;margin-inline-end: 2em;}

            body .is-layout-constrained > .alignright {
                float: right;
                margin-inline-start: 2em;margin-inline-end: 0;}

            body .is-layout-constrained > .aligncenter {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
                max-width: var(--theme--style--global--content-size);
                margin-left: auto !important;
                margin-right: auto !important;
            }

            body .is-layout-constrained > .alignwide {
                max-width: var(--theme--style--global--wide-size);
            }

            body .is-layout-flex {
                display: flex;
            }

            body .is-layout-flex {
                flex-wrap: wrap;
                align-items: center;
            }

            body .is-layout-flex > * {
                margin: 0;
            }

            :where(.theme-block-columns.is-layout-flex) {
                gap: 2em;
            }

            .has-black-color {
                color: var(--theme--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-color {
                color: var(--theme--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-color {
                color: var(--theme--preset--color--white) !important;
            }

            .has-pale-pink-color {
                color: var(--theme--preset--color--pale-pink) !important;
            }

            .has-vivid-red-color {
                color: var(--theme--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-color {
                color: var(--theme--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-color {
                color: var(--theme--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-color {
                color: var(--theme--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-color {
                color: var(--theme--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-color {
                color: var(--theme--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-color {
                color: var(--theme--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-color {
                color: var(--theme--preset--color--vivid-purple) !important;
            }

            .has-black-background-color {
                background-color: var(--theme--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-background-color {
                background-color: var(--theme--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-background-color {
                background-color: var(--theme--preset--color--white) !important;
            }

            .has-pale-pink-background-color {
                background-color: var(--theme--preset--color--pale-pink) !important;
            }

            .has-vivid-red-background-color {
                background-color: var(--theme--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-background-color {
                background-color: var(--theme--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-background-color {
                background-color: var(--theme--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-background-color {
                background-color: var(--theme--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-background-color {
                background-color: var(--theme--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-background-color {
                background-color: var(--theme--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-background-color {
                background-color: var(--theme--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-background-color {
                background-color: var(--theme--preset--color--vivid-purple) !important;
            }

            .has-black-border-color {
                border-color: var(--theme--preset--color--black) !important;
            }

            .has-cyan-bluish-gray-border-color {
                border-color: var(--theme--preset--color--cyan-bluish-gray) !important;
            }

            .has-white-border-color {
                border-color: var(--theme--preset--color--white) !important;
            }

            .has-pale-pink-border-color {
                border-color: var(--theme--preset--color--pale-pink) !important;
            }

            .has-vivid-red-border-color {
                border-color: var(--theme--preset--color--vivid-red) !important;
            }

            .has-luminous-vivid-orange-border-color {
                border-color: var(--theme--preset--color--luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-amber-border-color {
                border-color: var(--theme--preset--color--luminous-vivid-amber) !important;
            }

            .has-light-green-cyan-border-color {
                border-color: var(--theme--preset--color--light-green-cyan) !important;
            }

            .has-vivid-green-cyan-border-color {
                border-color: var(--theme--preset--color--vivid-green-cyan) !important;
            }

            .has-pale-cyan-blue-border-color {
                border-color: var(--theme--preset--color--pale-cyan-blue) !important;
            }

            .has-vivid-cyan-blue-border-color {
                border-color: var(--theme--preset--color--vivid-cyan-blue) !important;
            }

            .has-vivid-purple-border-color {
                border-color: var(--theme--preset--color--vivid-purple) !important;
            }

            .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
                background: var(--theme--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
            }

            .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
                background: var(--theme--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
            }

            .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
                background: var(--theme--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
            }

            .has-luminous-vivid-orange-to-vivid-red-gradient-background {
                background: var(--theme--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
            }

            .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
                background: var(--theme--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
            }

            .has-cool-to-warm-spectrum-gradient-background {
                background: var(--theme--preset--gradient--cool-to-warm-spectrum) !important;
            }

            .has-blush-light-purple-gradient-background {
                background: var(--theme--preset--gradient--blush-light-purple) !important;
            }

            .has-blush-bordeaux-gradient-background {
                background: var(--theme--preset--gradient--blush-bordeaux) !important;
            }

            .has-luminous-dusk-gradient-background {
                background: var(--theme--preset--gradient--luminous-dusk) !important;
            }

            .has-pale-ocean-gradient-background {
                background: var(--theme--preset--gradient--pale-ocean) !important;
            }

            .has-electric-grass-gradient-background {
                background: var(--theme--preset--gradient--electric-grass) !important;
            }

            .has-midnight-gradient-background {
                background: var(--theme--preset--gradient--midnight) !important;
            }

            .has-small-font-size {
                font-size: var(--theme--preset--font-size--small) !important;
            }

            .has-medium-font-size {
                font-size: var(--theme--preset--font-size--medium) !important;
            }

            .has-large-font-size {
                font-size: var(--theme--preset--font-size--large) !important;
            }

            .has-x-large-font-size {
                font-size: var(--theme--preset--font-size--x-large) !important;
            }

            .theme-block-navigation a:where(:not(.theme-element-button)) {
                color: inherit;
            }

            :where(.theme-block-columns.is-layout-flex) {
                gap: 2em;
            }

            .theme-block-pullquote {
                font-size: 1.5em;
                line-height: 1.6;
            }
        </style>
         <?php
// } else {
//     include($_SERVER['DOCUMENT_ROOT'] . '/app/module/protects/__Verifybot.php');
//     exit;
// }
// ?>