<span class="dropup relative smilie">
    <a class="but btn-input-expand input-smilie mr6" href="javascript:;">
        <i class="fa fa-fw fa-smile-o"></i>
        <span class="hide-sm">Biểu Cảm</span>
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-smilie scroll-y mini-scrollbar">
            <?php for ($i = 1; $i <= 92; $i++): ?>
            <a class="smilie-icon select-none" href="javascript:;" data-smilie="thanhdieu<?=$i?>">
                <img class="lazyload" src="/<?= __IMG__ ?>/icon/emoji/thanhdieu<?=$i?>.gif"
                    data-src="/<?= __IMG__ ?>/icon/emoji/thanhdieu<?=$i?>.gif" alt="[thanhdieu<?=$i?>]" />
            </a>
            <?php endfor; ?>
        </div>
    </div>
</span>