<?php require_once($_SERVER['DOCUMENT_ROOT'].'/config/Database.php');?>
<?php $options_header = ['title' => "Khu Vực Tìm Kiếm | " . $TD->Setting('name-site'), 'description' => 'Có không giữ mất thì tìm',];?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/head.php');?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/nav.php');?>
<?php 
if (!(strpos($_SERVER['REQUEST_URI'], '/search/') === 0 && isset($_GET['q']) && $_GET['q'] !== '')) {
    exit(include($_SERVER['DOCUMENT_ROOT'].'/app/insert/error/404.php'));
}?>
<main class="container">
    <div class="content-wrap">
        <div class="content-layout">
            <div class="zib-widget" win-ajax-replace="search">
                <div class="search-input main-search">
                <?php include($_SERVER['DOCUMENT_ROOT'].'/app/insert/search.php');?>
                </div>
            </div>
            <div class="zib-widget ajaxpager type-post search-content">
                <div class="author-tab">
                    <ul win-ajax-replace="filter" class="em12 list-inline scroll-x mini-scrollbar tab-nav-theme"
                        style="margin:0 -8px 10px;">
                        <li class="active">
                            <a ajax-replace="true" class="td-ajax-search"
                                href="/search/?q=<?=THANHDIEU($_GET['q']??null)?>&amp;type=code" data-type="code">Mã
                                Nguồn</a>
                        </li>
                        <li>
                            <a ajax-replace="true" class="td-ajax-search"
                                href="/search/?q=<?=THANHDIEU($_GET['q']??null)?>&amp;type=user" data-type="user">Người
                                Dùng</a>
                        </li>
                        <li>
                            <a ajax-replace="true" class="td-ajax-search"
                                href="/search/?q=<?=THANHDIEU($_GET['q']??null)?>&amp;type=forum" data-type="forum">Diễn
                                Đàn</a>
                        </li>
                    </ul>
                </div>
                <div id="code-content" class="td-tab-content"><div class="theme-box box-body ajax-loading text-center"><span class="hk-loader-text c-yellow">Đang tải dữ liệu...</span><br/><h2 class="loading zts"></h2></div><noscript>
                        <div class="f-not-found"><img src="/<?=__IMG__?>/icon/no-found.png">
                            <p class="mt20 em09 muted-3-color separator">Không tìm thấy nội dung nào</p>
                        </div>
                    </noscript></div>
                <div class="pagenav ajax-pag-2" style="display:none;"></div>
                <div id="user-content" class="td-tab-content" style="display:none;"><div class="theme-box box-body ajax-loading text-center"><span class="hk-loader-text c-yellow">Đang tải dữ liệu...</span><br/><h2 class="loading zts"></h2></div><noscript>
                        <div class="f-not-found"><img src="/<?=__IMG__?>/icon/no-found.png">
                            <p class="mt20 em09 muted-3-color separator">Không tìm thấy nội dung nào</p>
                        </div>
                    </noscript></div>
                <div id="forum-content" class="td-tab-content" style="display:none;"><div class="theme-box box-body ajax-loading text-center"><span class="hk-loader-text c-yellow">Đang tải dữ liệu...</span><br/><h2 class="loading zts"></h2></div><noscript>
                        <div class="f-not-found"><img src="/<?=__IMG__?>/icon/no-found.png">
                            <p class="mt20 em09 muted-3-color separator">Không tìm thấy nội dung nào</p>
                        </div>
                    </noscript></div>
                <!-- <div id="code-search"></div>
                <div class="pagenav ajax-pag-2" style="display:none;"></div>
                <div id="user-search"></div>
                <div id="forum-search"></div> -->
                <!-- END -->
            </div>
        </div>
    </div>
</main> <?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/foot.php');?>