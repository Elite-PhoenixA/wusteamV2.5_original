<?php require_once($_SERVER['DOCUMENT_ROOT'].'/models/object/global/searchModel.php');?>
<form method="get" class="padding-10 search-form search-content" action="/search/">
    <div class="line-form">
        <div class="option-dropdown splitters-this-r search-drop">
            <div class="dropdown">
                <a href="javascript:;" class="padding-h10" data-toggle="dropdown">
                    <span class="default-search"><?=isset($typeList[$type]) ? $typeList[$type] : 'Mã Nguồn'?></span>
                    <i class="fa ml6 fa-sort opacity5" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo ($type == 'code') ? 'active' : ''; ?>">
                        <a class="text-ellipsis" href="javascript:;" data-for="type" data-value="code">Mã Nguồn</a>
                    </li>
                    <li class="<?php echo ($type == 'user') ? 'active' : ''; ?>">
                        <a class="text-ellipsis" href="javascript:;" data-for="type" data-value="user">Người Dùng</a>
                    </li>
                    <li class="<?php echo ($type == 'forum') ? 'active' : ''; ?>">
                        <a class="text-ellipsis" href="javascript:;" data-for="type" data-value="forum">Diễn Đàn</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="search-input-text">
            <input type="text" name="q" class="td-search line-form-input" tabindex="1" value="<?= THANHDIEU($_GET['q'] ?? null) ?>">
            <i class="line-form-line"></i>
            <div class="scale-placeholder" default="Có không giữ mất thì tìm">Có không giữ mất thì
                tìm </div>
            <div class="abs-right muted-color">
                <button type="submit" tabindex="2" class="null">
                    <i class="ri-search-2-line"></i>
                </button>
            </div>
        </div>
    </div>
    <input type="hidden" name="type" value="code">
</form>
<?php if (!empty(PopularKeywords($file_path))): ?>
<div class="search-keywords">
    <p class="muted-color">Tìm kiếm phổ biến</p>
    <div>
        <?php foreach (PopularKeywords($file_path) as $key): ?>
        <?php list($keyword, $type) = explode('|', $key); ?>
        <a class="search_keywords muted-2-color but em09 mr6 mb6"
            href="/search/?q=<?=THANHDIEU($keyword)?>&type=<?=THANHDIEU($type)?>"><?=THANHDIEU($keyword)?></a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
<div class="search-keywords history-search">
    <p class="muted-color">
        <span>Lịch sử tìm kiếm</span>
        <a class="pull-right trash-history-search muted-3-color" href="javascript:;">
            <i class="fa fa-trash-o em12" aria-hidden="true"></i>
        </a>
    </p>
    <div class="search-history-list"></div>
</div>