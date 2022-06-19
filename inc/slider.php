<div class="slider-one__wrapper">
        <div class="slider-one">
                <div class="slider-one__carousel thm__owl-dot-1 owl-carousel">
                        <?php
                        $data = $core->getslider(array());
                        if ($data)
                                for ($i = 0; $i < count($data); $i++) {
                        ?>
                                <div class="item slider-one__slide-1" style="background-image: url(images/<?= $data[$i]["image"] ?>);">
                                        <div class="container">
                                                <div class="slider-one__content text-center">
                                                        <h3 class="anim-elm"><?= $data[$i]["name" . $clang] ?></h3>
                                                        <p class="anim-elm"><?= $data[$i]["description" . $clang] ?></p>
                                                        <a href="<?= $data[$i]["link"] ?>" class="thm-btn anim-elm"><?= plang('اطلب الان', 'Order Now') ?></a>
                                                </div>
                                        </div>
                                </div>
                        <? } ?>
                </div>
        </div>
</div>