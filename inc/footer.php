</div>
</div>
<div class="bot2_wrapper">
        <div class="container">
                <div class="bot2 clearfix">
                        <div class="row">
                                <div class="col-sm-3">
                                        <div class="logo2">
                                                <a href="<?= $core->getPageUrl("index") ?>">
                                                        <img src="images/logo.png" alt="" class="img-responsive">
                                                </a>
                                                <p class="small text-muted"><?= getValue("footer_txt", $lang) ?></p>
                                        </div>
                                </div>
                                <div class="col-sm-2">
                                        <div class="bot2-title"><?= plang('معلومات', 'Information') ?></div>
                                        <ul class="ul0">
                                                <?php
                                                $data = $core->getPages(array());
                                                if ($data)
                                                        for ($i = 0; $i < count($data); $i++) {
                                                ?>
                                                        <li><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name"]), "page") ?>"><?= $data[$i]["name" . $clang] ?></a></li>
                                                <? } ?>
                                                <li><a href="<?= $core->getPageUrl("contact") ?>"><?= $core->pageTitle ?></a></li>
                                        </ul>
                                </div>
                                <div class="col-sm-3">
                                        <div class="bot2-title"><?= getLang("products") ?></div>
                                        <ul class="ul0">
                                                <?php
                                                $data = $core->getData("products", "where active=1 order by rand() limit 4");
                                                if ($data)
                                                        for ($i = 0; $i < count($data); $i++) {
                                                ?>
                                                        <li><a href="<?= $core->getBlogUrl(array($data[$i]["id"], $data[$i]["name" . $clang]), "products") ?>"><?= $data[$i]["name" . $clang] ?></a></li>
                                                <? } ?>
                                                <li><a href="<?= $core->getPageUrl("companies") ?>"><?= $core->pageTitle ?></a></li>
                                        </ul>
                                </div>
                                <div class="col-sm-4">
                                        <div class="bot2-title"><?= plang('القائمة البريدية', 'newsletter') ?></div>
                                        <p><?= plang('الاشتراك للحصول على آخر الأخبار', 'Subscribe to receive the latest news') ?></p>
                                        <div class="newsletter-form-wrapper clearfix">
                                                <form class="clearfix" method="post">
                                                        <input type="text" class="form-control" name="email" placeholder="" value="<?= plang("بريدك الالكترونى", "Your email address") ?>" onBlur="if(this.value=='') this.value='<?= plang("بريدك الالكترونى", "Your email address") ?>'" onFocus="if(this.value =='<?= plang("بريدك الالكترونى", "Your email address") ?>' ) this.value=''">
                                                        <input type="hidden" name="subscribe" value="subscribe">
                                                        <a href="#" onclick="$(this).closest('form').submit();"><?= plang('اشتراك', 'Subscribe!') ?></a>
                                                </form>
                                        </div>
                                        <div class="cards">
                                                <div class="card  bottom"><a href="#"><img src="images/payment01.png" alt="" class="img-responsive"></a></div>
                                                <div class="card"><a href="#"><img src="images/payment02.png" alt="" class="img-responsive"></a></div>
                                                <div class="card"><a href="#"><img src="images/payment03.png" alt="" class="img-responsive"></a></div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<div class="bot3_wrapper">
        <div class="container">
                <div class="bot3 clearfix">
                        <div class="row">
                                <div class="col-sm-12">
                                        <div class="copyrights">Erasoft Copyright &copy; all rights
                                                reserved</div>
                                </div>
                        </div>
                </div>
        </div>
</div>
</div>
</div>
<div class="modal fade" id="modalNewsletter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                                <div class="modalNewsletter">
                                        <img src="images/logo.png">
                                        <div class="txt1"><?= plang('احصل على خطاب البريد الإلكتروني الخاص بك', 'Get Our Email Letter') ?></div>
                                        <div class="txt2"><?= plang('اشترك في القائمة البريدية لـ Kxprss لتلقي تحديثات عن الوافدين الجدد والعروض الخاصة ومعلومات الخصم الأخرى.', 'Subscribe to the Kxprss mailing list to receive
                                                updates on new arrivals, special offers and other discount
                                                information.') ?></div>
                                        <form id="popup-form2" method="POST" class="form-horizontal" action="">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                                <div class="form-group">
                                                                        <label><?= plang('البريد الالكترونى', 'Email') ?> <span>*</span></label>
                                                                        <input type="text" class="form-control" name="email" value="<?= plang("أدخل بريدك الإلكتروني ...", "Enter your email...") ?>" onBlur="if(this.value=='') this.value='<?= plang("أدخل بريدك الإلكتروني ...", "Enter your email...") ?>'" onFocus="if(this.value =='<?= plang("أدخل بريدك الإلكتروني ...", "Enter your email...") ?>' ) this.value=''">
                                                                        <button name="subscribe" type="submit" value="<?= plang("اشتراك", "Subscribe") ?>" class="btn-default btn-newsletter-submit"><?= plang("اشتراك", "Subscribe") ?></button>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="checkbox d-none">
                                                        <label>
                                                                <input type="checkbox"> <?= plang('لا تظهر هذه النافذة المنبثقة مرة أخرى', 'Do not show this popup again') ?>
                                                        </label>
                                                </div>
                                        </form>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <div class="modalNewsletterMan">
                                        <img src="images/newsletter2.png" alt="" class="img-responsive">
                                </div>
                        </div>
                </div>
        </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cloud-zoom.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script>
        function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                                c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                                return c.substring(name.length, c.length);
                        }
                }
                return "";
        }

        function addToWishList(el, id, q) {
                var wishlist = getCookie("wishlist");
                if (!wishlist)
                        wishlist = [];
                else
                        wishlist = wishlist.split(",");
                var done = false;
                for (var i = 0; i < wishlist.length; i++) {
                        if (wishlist[i] === id) {
                                wishlist.splice(i, 1);
                                done = true;
                        }
                }
                if (!done)
                        wishlist.push(id);
                setCookie("wishlist", wishlist.join(","), 5);
                $(el).toggleClass("iswish");
                if (!done)
                        alert("<?= plang("تم اضافة المنتج الى قائمة المفضلات", "The product has been added to the wishlist") ?>");
                else {
                        $("#p" + id).hide();
                        alert("<?= plang("تم حذف المنتج من قائمة المفضلات", "The product has been removed from the wishlist") ?>");
                }
        }

        function discountForm() {
                var coupon_code = $("#coupon_code").val();
                setCookie("coupon_code", coupon_code, 5);
        }

        function addtocart(id, qy) {
                if (id == -2) {
                        if (confirm("<?= plang('هل أنت متأكد من أنك تريد حذف جميع السلع من عربة التسوق؟', 'Are you sure you want to delete all items from the shopping cart?') ?>")) {
                                setCookie("cartlist", null, 5);
                                $("#cartlist").load("ajax.php?action=cart");
                                $("#inc_cart").load("ajax.php?action=inc_cart");
                        }
                        return false;
                }
                if ($(".addtocart" + id).hasClass("stock")) {
                        alert("<?= plang("عذرا المنتج غير متوفر", "Sorry, the product is not available") ?>");
                        return false;;
                }
                var q = 1;
                if (qy == -2 || qy == -3) {
                        q = parseInt($('#qty' + id).val());
                        if (qy == -2)
                                q--;
                        else
                                q++;
                }
                if (qy && qy != -2 && qy != -3 && qy != -1)
                        q = qy;
                var wishlist = getCookie("cartlist");
                var owishlist = {};
                if (!wishlist)
                        wishlist = [];
                else
                        wishlist = wishlist.split(",");
                var done = false;
                var inc = "q" + id + "-";
                for (var i = 0; i < wishlist.length; i++) {
                        if (wishlist[i] == id) {
                                if (qy == -1) wishlist.splice(i, 1);
                                done = true;
                        }
                }
                wishlist = wishlist.filter(item => !item.includes(inc));
                if (!done)
                        wishlist.push(id);
                owishlist.data = wishlist;
                if (q && qy != -1) {
                        var qt = "q" + id + "-" + q;
                        wishlist.push(qt);
                }
                owishlist = JSON.stringify(owishlist);
                setCookie("cartlist", wishlist.join(","), 5);
                setCookie("owishlist", owishlist, 5);
                $("#cartlist").load("inc/cart.php?action=1");
                $("#inc_cart").load("ajax.php?action=inc_cart");
                if (!done) {
                        if (qy != -2 && qy != -3)
                                alert("<?= plang("تم اضافة المنتج الى السلة", "Product has been added to cart") ?>");
                } else {
                        if (qy == -1) {
                                $("#pc" + id).hide();
                                $("#pc2" + id).hide();
                                alert("<?= plang("تم حذف المنتج من السلة", "Product removed from cart") ?>");
                        } else if (qy != -2 && qy != -3)
                                alert("<?= plang("المنتج موجود فى السلة بالفعل", "The product is already in the cart.") ?>");
                }
                if (q)
                        $('#qty' + id).val(q);
        }
        $(".search-form-wrapper a,.newsletter-form-wrapper a,[name=done]").on("click", function() {
                var form = $(this).closest("form");
                form.attr("method", "POST");
                form.get(0).submit();
        });
        $("#popup-form2 .checkbox input").on("change", function() {
                setCookie("popup", 1, 5);
        });
        $(function() {
                if (!getCookie("popup")) {
                        $('#modalNewsletter').modal("show");
                        setCookie("popup", 1, 5);
                }
        });
        $("select[name=city]").on("change", function() {
                var id = $(this).find(':selected').data('id')
                $("select[name=zone]").load("ajax.php?action=inc_zones&plang=<?= $plang ?>&id=" + id, function(responseTxt, statusTxt, xhr) {
                        $("select[name=zone]").trigger("change");
                });
        });
        $("select[name=zone]").on("change", function() {
                var val = $(this).val();
                var val = $(this).find(':selected').data('id')
                var wight_price = $(this).find(':selected').data("price");
                var price = $("input[name=shipping_price]").data("price");
                $("#Shipping_price").text(wight_price);
                var coupon_code = $("input[name=coupon_code]");
                var final_price = parseInt(parseInt(wight_price) + parseInt(price));
                $("#final_price").text(final_price);
                if (coupon_code.length > 0 && coupon_code.val()) {
                        $("#discount_price").text(final_price);
                        $("input[name=discount_price]").val(final_price);
                        if (coupon_code.data("type") == 1) {
                                wight_price -= parseInt(parseInt(parseInt(coupon_code.data("val")) * wight_price) / 100);
                                final_price = parseInt(parseInt(wight_price) + parseInt(price));
                                $("#final_price").text(final_price);
                        } else
                                final_price -= parseInt(parseInt(parseInt(coupon_code.data("val")) * final_price) / 100);
                        $("#final_price").text(final_price);
                }
                $("input[name=total]").val(final_price);
                $("input[name=shipping_price]").val(wight_price);
        });
        $("select[name=city]").trigger("change");
</script>
<script>
        $('a img').click(function() {
                var href = $(this).closest("a").attr("href");
                window.location.replace("<?= $PUr ?>/" + href);
                console.log(href);
        });
        /*   For all pages except the index.html */
        $('.as-click').click(function() {
                $('.navbar-nav').toggle();
                $(this).toggleClass('active');
                return false;
        })
        $('.open-btn').click(function() {
                $('.navbar-nav').toggle();
                $(this).toggleClass('active');
                return false;
        })

        function msg(txt, er) {
                var el = $(".alert");
                el.removeClass("alert-danger");
                el.removeClass("alert-success");
                if (er)
                        el.addClass("alert-danger");
                else
                        el.addClass("alert-success");
                el.html(txt);
                el.fadeIn(200, "swing", function() {
                        el.delay(2000).fadeOut(600);
                });
        }
        $("form").on("submit", function() {
                var el = this;
                var id = $(el).data("id");
                var fmsg = $(el).data("msg");
                var data_ajax = $(el).data("ajax");
                var rd = $(el).data("rd");
                if (!id)
                        id = $(el).attr("id");
                if (id == "search_mini_form" || id == "contact_form")
                        return true;
                var values = $(this).serialize();
                if (!id)
                        id = '';
                $.ajax({
                        type: "post",
                        url: "ajax.php?action=" + id,
                        data: values,
                        dataType: "json",
                        xhrFields: {
                                withCredentials: true
                        },
                        crossDomain: true,
                        // cache: false,
                        // contentType: false,
                        //processData: false,
                        success: function(data) {
                                if (data.st == "ok") {
                                        if (fmsg)
                                                msg(fmsg);
                                        else
                                                msg(data.msg);
                                        if (rd)
                                                location.replace(rd);
                                        else if (data.rd == "ref")
                                                location.reload();
                                        else if (data.rd)
                                                location.replace(data.rd);
                                        if (data_ajax)
                                                $("#" + data_ajax).load("ajax.php?action=" + data_ajax);
                                } else {
                                        msg(data.msg, true);
                                }
                        }
                });
                return false;
        });
        $('.owl-carousel-normal2').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                smartSpeed: 1000,
                autoplayTimeout: 4000,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                        0: {
                                items: 2
                        },
                        480: {
                                items: 2
                        },
                        640: {
                                items: 3
                        },
                        768: {
                                items: 3
                        },
                        992: {
                                items: 3
                        },
                        1230: {
                                items: 3
                        }
                }
        });

        var __slice = [].slice;
        (function(e, t) {
                var n;
                n = function() {
                        function t(t, n) {
                                var r, i, s, o = this;
                                this.options = e.extend({}, this.defaults, n);
                                this.$el = t;
                                s = this.defaults;
                                for (r in s) {
                                        i = s[r];
                                        if (this.$el.data(r) != null) {
                                                this.options[r] = this.$el.data(r)
                                        }
                                }
                                this.createStars();
                                this.syncRating();
                                this.$el.on("mouseover.starrr", "span", function(e) {
                                        return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1)
                                });
                                this.$el.on("mouseout.starrr", function() {
                                        return o.syncRating()
                                });
                                this.$el.on("click.starrr", "span", function(e) {
                                        return o.setRating(o.$el.find("span").index(e.currentTarget) + 1)
                                });
                                this.$el.on("starrr:change", this.options.change)
                        }
                        t.prototype.defaults = {
                                rating: void 0,
                                numStars: 5,
                                change: function(e, t) {}
                        };
                        t.prototype.createStars = function() {
                                var e, t, n;
                                n = [];
                                for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) {
                                        n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))
                                }
                                return n
                        };
                        t.prototype.setRating = function(e) {
                                if (this.options.rating === e) {
                                        e = void 0
                                }
                                this.options.rating = e;
                                this.syncRating();
                                return this.$el.trigger("starrr:change", e)
                        };
                        t.prototype.syncRating = function(e) {
                                var t, n, r, i;
                                e || (e = this.options.rating);
                                if (e) {
                                        for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) {
                                                this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")
                                        }
                                }
                                if (e && e < 5) {
                                        for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) {
                                                this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")
                                        }
                                }
                                if (!e) {
                                        return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")
                                }
                        };
                        return t
                }();
                return e.fn.extend({
                        starrr: function() {
                                var t, r;
                                r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                                return this.each(function() {
                                        var i;
                                        i = e(this).data("star-rating");
                                        if (!i) {
                                                e(this).data("star-rating", i = new n(e(this), r))
                                        }
                                        if (typeof r === "string") {
                                                return i[r].apply(i, t)
                                        }
                                })
                        }
                })
        })(window.jQuery, window);
        $(function() {
                return $(".starrr").starrr()
        })

        var ratingsField = $('#ratings-hidden');
        $('.starrr').on('starrr:change', function(e, value) {
                ratingsField.val(value);
        });
</script>
<?php if ($cartClear) { ?>
        <script>
                setCookie("cartlist", null, 5);
                $("#cartlist").load("ajax.php?action=cart");
        </script>
<?php } ?>
</body>

</html>
