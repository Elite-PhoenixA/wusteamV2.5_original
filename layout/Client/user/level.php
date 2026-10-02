<div class="ajax-item">
    <div class="row gutters-10">
        <div class="col-sm-5">
            <div class="colorful-bg jb-vip1 zib-widget">
                <div class="colorful-make"></div>
                <div class="relative flex xx jsb" style="height:146px;">
                    <div class="flex ac">
                        <div class="avatar-mini mr6" style="margin-top:-4px;">
                            <img alt="<?=THANHDIEU($td['hovaten'])?>-<?=$TD->Setting('name-site')?>"
                                src="/<?=__IMG__?>/users/avatar-default.jpg"
                                data-src="/<?=__IMG__.'/users/'.$td['avatar']?>"
                                class="lazyload avatar avatar-id-<?=$td['user_id']?>">
                        </div>
                        <div class="font-bold">Level Hiện Tại</div>
                    </div>
                    <div class="flex ac em14 no-events-img">
                        <img class="img-icon em12 mr10 lazyload" src="/<?=__IMG__?>/thumbnail-null.png"
                            data-src="/<?=__IMG__.'/level/'.$userLevelShow->TD($td['level'])?>"
                            data-toggle="tooltip" title="LV <?= strtoupper($td['level'])?>" alt="User Level">
                            <!-- <b><?=strtoupper(strpos($td['level'],'svip')===0?$td['level']:'LV'.$td['level'])?></b> -->
                    </div>
                    <div>
                        <div class="flex jsb mb6 ab">
                            <div class="em12 font-bold">
                                <?=$td['ruby']?>/<?=(new LevelPoints())->TDTV($td['level'],$taikhoan,$td)?></div>
                            <div class="opacity8 em09">Còn <span
                                class="em14 font-bold"><?=max(0,(new LevelPoints())->TDTV($td['level'],$taikhoan,$td)-$td['ruby'])?></span>
                                điểm ruby nữa để lên cấp</div>
                        </div>
                        <div class="integral-progress progress">
                            <div class="progress-bar"
                                style="width: <?=(new LevelPoints())->TDTV($td['level'],$taikhoan,$td)?min(100,($td['ruby']/(new LevelPoints())->TDTV($td['level'],$taikhoan,$td))*100):100?>%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="colorful-bg c-gray zib-widget">
                <div class="colorful-make"></div>
                <div class="relative flex xx jsb" style="height: 146px;">
                    <div class="flex ac jsb">
                        <div>
                            <span class="mr6 font-bold">
                                <i class="icon em12 ri-medal-line c-green"></i>
                                Thang Level
                            </span>
                        </div>
                    </div>
                    <div class="swiper-container swiper-scroll pillar-box" scroll-nogroup="1">
                        <div class="swiper-wrapper">
                            <?php
                            $multiplier = 1;
                            $count = 0;
                            if ($td['level'] >= 7) {
                                $multiplier = 10;
                            }
                            $sorted_levels = [];    
                            foreach ((new LevelPoints())->TDLevels() as $level => $points) {
                            if ($count >= 7 * $multiplier) break;
                            $sorted_levels[$level] = $points;
                            $count++;
                            }
                            asort($sorted_levels);
                            $pillar_heights = [];
                            $active_levels = [];
                            $count = 0;
                            foreach ($sorted_levels as $level => $points) {
                                $pillar_height = (new LevelPoints()) -> Pillars($points, $level, $taikhoan, $td);
                            switch ($level) {
                     case 2:
                            $pillar_height -= 30;
                            break;
                            case 3:
                            $pillar_height -= 20;
                            break;
                            case 4:
                            $pillar_height -= 25;
                            break;
                            case 5:
                            case 6:
                            $pillar_height -= 10;
                            break;
                            default:
                            break;
                         }
                            $pillar_heights[$level] = $pillar_height;
                            $active_levels[$level] = $td['level'] == $level ? ' active' : '';
                            $count++;
                           }?>
                            <?php foreach ($sorted_levels as $level => $points): ?>
                            <div class="swiper-slide pillar-item<?= $active_levels[$level] ?>">
                                <div class="value"><?= $points ?></div>
                                <div class="pillar" style="height:<?= $pillar_heights[$level] ?>%;"></div>
                                <div class="level-name no-events-img">
                                    <?php if (strpos($level, 'svip') !== false): ?>
                                    <img class="lazyload img-icon em12" src="/<?=__IMG__ ?>/level/<?=preg_replace('/svip(\d+)/','svip-$1',strtolower($level))?>.gif"
                                        data-src="/<?=__IMG__ ?>/level/<?=preg_replace('/svip(\d+)/','svip-$1',strtolower($level))?>.gif"
                                        alt="Svip <?= substr($level, 4) ?>">
                                        <?php else: ?>
                                        <img class="lazyload img-icon em12" src="/<?=__IMG__ ?>/level/level-<?=strtolower($level)?>.svg"
                                            data-src="/<?=__IMG__ ?>/level/level-<?=strtolower($level)?>.svg"
                                            alt="Level <?=substr($level,4) ?>">
                                            <?php endif; ?>
                                        </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>