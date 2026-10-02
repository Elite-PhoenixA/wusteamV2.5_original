<div class="ajax-item">
    <div class="user-pay">
        <div class="row gutters-10">
            <div class="col-sm-6">
                <div class="zib-widget" style="padding-left: 24px;">
                    <div>
                        <i class="em12 c-red ri-shopping-cart-2-line"></i> Tổng Sản Phẩm Đã Mua
                    </div>
                    <div class="mt10 c-red" style="line-height: 1.2;">
                        <span class="em3x font-bold"><?=$totals->HistoryOrderUsers()?></span>
                    </div>
                    <div class="abs-right em3x">
                        <svg class="em12" aria-hidden="true">
                            <use xlink:href="#icon-order-color"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="zib-widget" style="padding-left: 24px;">
                    <div>
                        <i class="em12 c-cyan ri-money-dollar-circle-line"></i> Tổng Tiền Đã Tiêu
                    </div>
                    <div class="mt10 c-cyan" style="line-height: 1.2;">
                        <span class="em3x font-bold"><?=FormatNumber::TD($td['tongtieu'],1);?></span> đ
                    </div>
                    <div class="abs-right em3x">
                        <svg class="em12" aria-hidden="true">
                            <use xlink:href="#icon-money-color"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body notop">
            <div class="title-theme">
                <b>Chi Tiết Mua Hàng
                </b>
            </div>
        </div>
        <div class="zib-widget">
            <div class="ajaxpager user-pay-statistical lazyload" lazyload-action="ias">
                <?php $oOo = mysqli_query($thanhdieudb, "SELECT h.*, p.download_url, p.tieude, p.slug, h.product_id
        FROM ws_history_products h 
        INNER JOIN ws_products p ON h.product_id = p.id 
        WHERE h.taikhoan = '$taikhoan' 
        ORDER BY h.ngaymua DESC");$thanhdieuthebest=mysqli_num_rows($oOo) > 0;?>
                <div class="ajax-item">
                    <?php if (!$thanhdieuthebest): ?>
                    <div class="text-center">
                        <img style="width:280px;opacity:.7;" src="/<?=__IMG__.'/svg/null-order.svg'?>">
                        <p class="em09 muted-3-color separator">Chưa có lịch sử mua hàng
                        </p>
                    </div>
                    <?php else: ?>
                    <?php while ($ws = mysqli_fetch_assoc($oOo)): ?>
                    <div class="border-bottom padding-h6 flex jsb">
                        <div class="muted-2-color">
                            <div class="mb6">
                                <a href="/view-code/<?=$ws['slug']?>"
                                    class="font-bold c-green mr6"><?=$ws['tieude']?></a>
                            </div>
                            <div class="meta-time em09 muted-2-color mb6">Mã GD: <?=$ws['magiaodich']?></div>
                            <div class="meta-time em09 muted-2-color">Ngày mua: <?=FormatTime::TD($ws['ngaymua'],2)?></div>
                    </div>
                        <div class="flex jsb xx text-right flex0 ml10">
                            <b class="em12 c-blue">-<?=FormatNumber::TD($ws['giamua'])?>đ</b>
                            <a style="border-radius:5px;" class="em09 muted-2-color mt3 but jb-purple"
                                href="/download/<?=$ws['magiaodich']?>" target="_blank">Tải Xuống Ngay</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="text-center mb20 padding-h10 muted-2-color no-more separator">Đã tải hết lịch sử
        </div>
    </div>
</div>