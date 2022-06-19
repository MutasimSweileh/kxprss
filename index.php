<?php
$pagg = 1;
include "inc.php";
/*
$lang : get form  inc.php  = arabic || english;
$plang : get form  inc.php for  php file name  = arabic || "";
$clang : get form  inc.php for column name  =  _arabic || "" ;
*/
?>
<section class="brands-section">
    <div class="container">
        <div class="title1"><?= getTitle("companies") ?></div>
        <div class="owl-carousel brands-carousel cuctom-nav">
            <? $variable = $core->getData('companies', 'where active=1');
            foreach ($variable as $k => $v) { ?>
                <div class="item">
                    <a href="<?= $core->getPageUrl("products", "?company=" . $v["id"]) ?>" title="<?= $v["name" . $clang] ?>">
                        <div class="img-he">
                            <img alt="mecool" class="img-responsive desaturate " src="images/<?= $v["image"] ?>" />
                        </div>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="title1"><?= getTitle("best") ?></div>
            <div class="owl-carousel owl-carousel-normal cuctom-nav">
                <?php
                $data = $core->getData("products", "where active=1 and best=1");
                if ($data)
                    for ($i = 0; $i < count($data); $i++) {
                        $expiry_date = expiry_date($data[$i], "stock", true);
                ?>
                    <div class="item">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-card product-<?= ($data[$i]["discount"] ? "sale" : ($data[$i]["new"] ? "new" : "")) ?>"><?= $data[$i]["discount"] ? getValue("sale" . $plang) : ($data[$i]["new"] ? getValue("new" . $plang) : "") ?></div>
                                <figure class="product-media">
                                    <a title="<?= $data[$i]["name" . $clang] ?>" href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>" class="product-view"><img src="images/<?= $data[$i]["image"] ?>" alt="<?= $data[$i]["name" . $clang] ?>" class="img-responsive"></a>
                                    <div class="product-links">
                                        <a href="#" class="add_to_wishlist wishlist <?= iswish($data[$i]["id"]) ?>" onclick="addToWishList(this,'<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><i class="fas fa-heart"></i></a>
                                    </div>
                                </figure>
                                <div class="product-divider"></div>
                                <div class="product-caption">
                                    <div class="product-name"><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>"><?= $data[$i]["name" . $clang] ?>
                                        </a></div>
                                    <div class="product-prices clearfix">
                                        <?php $price = $data[$i]["price"];
                                        if ($data[$i]["discount"] &&  !$expiry_date[0]) { ?>
                                            <div class="product-price-old"> <?= plang("جنية", "L.E") ?> <?= $price ?> </div>
                                        <?php $price = $data[$i]["discount"];
                                        } ?>
                                        <div class="product-price"> <?= plang("جنية", "L.E") ?> <?= $price ?></div>
                                    </div>
                                    <div class="product-add-to-cart"><a href="#" class="add_to_wishlist wishlist <?= expiry_date($data[$i]) ?> <?= $data[$i]["stock"] ? "" : "stock" ?> addtocart<?= $data[$i]["id"] ?>" onclick="addtocart('<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><?= plang('اضافة للسلة', 'Add to
                                            Cart') ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? }
                $ads = $core->getData("ads", "where active=1 and selection =1 "); ?>
            </div>
            <div class="banner banner1"><a href="<?= $ads[0]["link"] ?>"><img src="images/<?= $ads[0]["image"] ?>" alt="" class="img-responsive"></a></div>
            <div class="title1"><?= plang('المنتجات الاكثر مبيعا', 'Top Selling Products') ?></div>
            <div class="owl-carousel owl-carousel-normal cuctom-nav">
                <?php
                $data = $core->getData("products", "where active=1 and special=1");
                if ($data)
                    for ($i = 0; $i < count($data); $i++) {
                        $expiry_date = expiry_date($data[$i], "stock", true);
                ?>
                    <div class="item">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-card product-<?= ($data[$i]["discount"] ? "sale" : ($data[$i]["new"] ? "new" : "")) ?>"><?= $data[$i]["discount"] ? getValue("sale" . $plang) : ($data[$i]["new"] ? getValue("new" . $plang) : "") ?></div>
                                <figure class="product-media">
                                    <a title="<?= $data[$i]["name" . $clang] ?>" href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>" class="product-view"><img src="images/<?= $data[$i]["image"] ?>" alt="<?= $data[$i]["name" . $clang] ?>" class="img-responsive"></a>
                                    <div class="product-links">
                                        <a href="#" class="add_to_wishlist wishlist <?= iswish($data[$i]["id"]) ?>" onclick="addToWishList(this,'<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><i class="fas fa-heart"></i></a>
                                    </div>
                                </figure>
                                <div class="product-divider"></div>
                                <div class="product-caption">
                                    <div class="product-name"><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>"><?= $data[$i]["name" . $clang] ?>
                                        </a></div>
                                    <div class="product-prices clearfix">
                                        <?php $price = $data[$i]["price"];
                                        if ($data[$i]["discount"] &&  !$expiry_date[0]) { ?>
                                            <div class="product-price-old"> <?= plang("جنية", "L.E") ?> <?= $price ?> </div>
                                        <?php $price = $data[$i]["discount"];
                                        } ?>
                                        <div class="product-price"> <?= plang("جنية", "L.E") ?> <?= $price ?></div>
                                    </div>
                                    <div class="product-add-to-cart"><a href="#" class="add_to_wishlist wishlist <?= expiry_date($data[$i]) ?> <?= $data[$i]["stock"] ? "" : "stock" ?> addtocart<?= $data[$i]["id"] ?>" onclick="addtocart('<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><?= plang('اضافة للسلة', 'Add to
                                            Cart') ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="banner banner1"><a href="<?= $ads[1]["link"] ?>"><img src="images/<?= $ads[1]["image"] ?>" alt="" class="img-responsive"></a></div>
            <div class="title1"><?= plang('منتجات مخفضة', 'Onsale Products') ?></div>
            <div class="owl-carousel owl-carousel-normal cuctom-nav">
                <?php
                $data = $core->getData("products", "where active=1 and discount !='' ");
                if ($data)
                    for ($i = 0; $i < count($data); $i++) {
                        $expiry_date = expiry_date($data[$i], "stock", true);
                ?>
                    <div class="item">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-card product-<?= ($data[$i]["discount"] ? "sale" : ($data[$i]["new"] ? "new" : "")) ?>"><?= $data[$i]["discount"] ? getValue("sale" . $plang) : ($data[$i]["new"] ? getValue("new" . $plang) : "") ?></div>
                                <figure class="product-media">
                                    <a title="<?= $data[$i]["name" . $clang] ?>" href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>" class="product-view"><img src="images/<?= $data[$i]["image"] ?>" alt="<?= $data[$i]["name" . $clang] ?>" class="img-responsive"></a>
                                    <div class="product-links">
                                        <a href="#" class="add_to_wishlist wishlist <?= iswish($data[$i]["id"]) ?>" onclick="addToWishList(this,'<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><i class="fas fa-heart"></i></a>
                                    </div>
                                </figure>
                                <div class="product-divider"></div>
                                <div class="product-caption">
                                    <div class="product-name"><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>"><?= $data[$i]["name" . $clang] ?>
                                        </a></div>
                                    <div class="product-prices clearfix">
                                        <?php $price = $data[$i]["price"];
                                        if ($data[$i]["discount"] &&  !$expiry_date[0]) { ?>
                                            <div class="product-price-old"> <?= plang("جنية", "L.E") ?> <?= $price ?> </div>
                                        <?php $price = $data[$i]["discount"];
                                        } ?>
                                        <div class="product-price"> <?= plang("جنية", "L.E") ?> <?= $price ?></div>
                                    </div>
                                    <div class="product-add-to-cart"><a href="#" class="add_to_wishlist wishlist <?= expiry_date($data[$i]) ?> <?= $data[$i]["stock"] ? "" : "stock" ?> addtocart<?= $data[$i]["id"] ?>" onclick="addtocart('<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><?= plang('اضافة للسلة', 'Add to
                                            Cart') ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <?
        $data = $core->getData("products", "where active=1 and deal =1 ");
        $data2 = [];
        if ($data)
            for ($i = 0; $i < count($data); $i++) {
                $expiry_date = expiry_date($data[$i], "stock", true);
                if ($expiry_date[0])
                    continue;
                $data2[] =    $data[$i];
            }
        $data = $data2;
        ?>
        <div class="col-sm-3">

            <? if ($data) { ?>
                <div class="title1"><?= plang('عروض الاسبوع', 'Deals Of The Week') ?></div>
                <div class="owl-carousel owl-carousel-thin">
                    <?php

                    if ($data)
                        for ($i = 0; $i < count($data); $i++) {
                    ?>
                        <div class="item">
                            <div class="product product-thin">
                                <div class="product-inner">
                                    <div class="product-thin-hot"></div>
                                    <figure class="product-media">
                                        <a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>" class="product-view"><img src="images/<?= $data[$i]["image"] ?>" alt="<?= $data[$i]["name" . $clang] ?>" class="img-responsive"></a>
                                        <div class="product-links">
                                            <a class="add_to_wishlist wishlist <?= iswish($data[$i]["id"]) ?>" onclick="addToWishList(this,'<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </figure>
                                    <div class="product-divider"></div>
                                    <div class="product-caption">
                                        <div class="product-name"><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>"><?= $data[$i]["name" . $clang] ?></a></div>
                                        <div class="product-prices clearfix">
                                            <?php $price = $data[$i]["price"];
                                            if ($data[$i]["discount"]) { ?>
                                                <div class="product-price-old"> <?= plang("جنية", "L.E") ?> <?= $price ?> </div>
                                            <?php $price = $data[$i]["discount"];
                                            } ?>
                                            <div class="product-price"> <?= plang("جنية", "L.E") ?> <?= $price ?></div>
                                        </div>
                                        <div class="product-offer"><?= plang('عجلوا! ينتهي العرض في:', 'Hurry Up! Offer ends in:') ?>
                                        </div>
                                        <?

                                        $datetime1 = date_create();
                                        $datetime2 = date_create($data[$i]["expiry_date"]);
                                        $date = date_diff($datetime1, $datetime2);
                                        if ($datetime1 > $datetime2)
                                            $date = date_diff(date_create(), date_create());
                                        ?>
                                        <div class="product-offer-table clearfix">
                                            <div class="product-offer-col">
                                                <div class="product-offer-txt">
                                                    <span><?= $date->format("%d") ?></span><?= plang('ايام', 'Days') ?>
                                                </div>
                                            </div>
                                            <div class="product-offer-col">
                                                <div class="product-offer-txt">
                                                    <span><?= $date->format("%h") ?></span><?= plang('ساعات', 'Hours') ?>
                                                </div>
                                            </div>
                                            <div class="product-offer-col">
                                                <div class="product-offer-txt"><span><?= $date->format("%i") ?></span><?= plang('دقائق', 'Mins') ?>
                                                </div>
                                            </div>
                                            <div class="product-offer-col">
                                                <div class="product-offer-txt"><span><?= $date->format("%s") ?></span><?= plang('ثوانى', 'Secs') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-add-to-cart"><a href="#" class="add_to_wishlist wishlist <?= expiry_date($data[$i]) ?> <?= $data[$i]["stock"] ? "" : "stock" ?> addtocart<?= $data[$i]["id"] ?>" onclick="addtocart('<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>">
                                                <?= plang('اضافة للسلة', 'Add to
                                            Cart') ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            <? } ?>
            <div class="title1"><?= plang('جديد المنتجات', 'New Arrivals') ?></div>
            <div class="product-vertical-list">
                <?php
                $data = $core->getData("products", "where active=1 and new =1 ");
                if ($data)
                    for ($i = 0; $i < count($data); $i++) {
                        $expiry_date = expiry_date($data[$i], "stock", true);
                ?>
                    <div class="product">
                        <div class="product-inner">
                            <figure class="product-media">
                                <a href="#" class="product-view"><img src="images/<?= $data[$i]["image"] ?>" alt="" class="img-responsive"></a>
                                <div class="product-links">
                                    <a href="#" class="add_to_wishlist wishlist <?= iswish($data[$i]["id"]) ?>" onclick="addToWishList(this,'<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>"><i class="fas fa-heart"></i></a>
                                </div>
                            </figure>
                            <div class="product-divider"></div>
                            <div class="product-caption">
                                <div class="product-name"><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>"><?= $data[$i]["name" . $clang] ?></a></div>
                                <div class="product-prices clearfix">
                                    <?php $price = $data[$i]["price"];
                                    if ($data[$i]["discount"] &&  !$expiry_date[0]) { ?>
                                        <div class="product-price-old"> <?= plang("جنية", "L.E") ?> <?= $price ?> </div>
                                    <?php $price = $data[$i]["discount"];
                                    } ?>
                                    <div class="product-price"> <?= plang("جنية", "L.E") ?> <?= $price ?></div>
                                </div>
                                <div class="product-add-to-cart"><a href="#" class="add_to_wishlist wishlist <?= expiry_date($data[$i]) ?> <?= $data[$i]["stock"] ? "" : "stock" ?> addtocart<?= $data[$i]["id"] ?>" onclick="addtocart('<?= $data[$i]["id"] ?>'); return false;" data-id="<?= $data[$i]["id"] ?>">
                                        <?= plang('اضافة للسلة', 'Add to
                                            Cart') ?></a></div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="services-wrapper">
                <div class="services-list clearfix">
                    <?php
                    $data = $core->getData("services", "where active=1");
                    if ($data)
                        for ($i = 0; $i < count($data); $i++) {
                    ?>
                        <div class="service1 clearfix">
                            <figure><img src="images/<?= $data[$i]["image"] ?>" alt="" class="img-responsive"></figure>
                            <div class="caption">
                                <div class="txt1"><?= $data[$i]["name" . $clang] ?></div>
                                <div class="txt2"><?= $data[$i]["txt" . $clang] ?></div>
                            </div>
                        </div>

                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "inc/footer.php";
?>