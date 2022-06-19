        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <?= date("Y", time()) ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">قم بلصق النص المراد ادخاله</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><textarea style="width: 100%;" id="paste_text" name="paste_text" rows="10"></textarea></div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                        <button class="btn btn-primary" id="paste_btn">موافق</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من القيام بهذا ؟</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">قم بالضغط على موافق اذا كنت تريد القيام بهذا الاجراء .</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                        <a class="btn btn-primary" data-action="url" href="?app=logout">موافق</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
        <!-- Page level plugins -->
        <!--         <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> 
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/cr-1.5.5/fh-3.2.0/r-2.2.9/rr-1.2.8/datatables.min.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
        <!-- Page level custom scripts -->
        <!--    <script src="js/demo/datatables-demo.js"></script>   -->
        <script src="js/jquery.toaster.js"></script>
        <script src="https://cdn.tiny.cloud/1/areb1qcs0zpkp5fwovyspzh7npcdstci7dpz5mixf7c2s8f6/tinymce/5/tinymce.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $('[data-toggle="fullscreen"]').on("click", function(e) {
                e.preventDefault(),
                    $("body").toggleClass("fullscreen-enable"),
                    document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ?
                    document.cancelFullScreen ?
                    document.cancelFullScreen() :
                    document.mozCancelFullScreen ?
                    document.mozCancelFullScreen() :
                    document.webkitCancelFullScreen && document.webkitCancelFullScreen() :
                    document.documentElement.requestFullscreen ?
                    document.documentElement.requestFullscreen() :
                    document.documentElement.mozRequestFullScreen ?
                    document.documentElement.mozRequestFullScreen() :
                    document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            });
            //$(document).ready(function() {
            var ar = ["description_arabic", "description"];
            for (var i = 0; i < ar.length; i++) {
                if ($('textarea[name=' + ar[i] + ']').data() && $('textarea[name=' + ar[i] + ']').data().hasOwnProperty("noeditor"))
                    continue;
                tinymce.init({
                    selector: 'textarea[name=' + ar[i] + ']',
                    height: 500,
                    menubar: false,
                    directionality: (ar[i] == "description_arabic" ? "rtl" : "ltr"),
                    images_upload_url: 'ajax.php?action=upload',
                    images_upload_base_path: '../images',
                    images_upload_credentials: false,
                    contextmenu: "copy paste link",
                    setup: function(ed) {
                        ed.ui.registry.addButton('basicDateButton', {
                            //text: 'Paste Text',
                            icon: 'paste-text',
                            tooltip: 'Paste Text',
                            onAction: function(_) {
                                $("#myModal").modal();
                                // ed.insertContent('Hello!!');
                            }
                        });
                    },
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'textcolor',
                        "table",
                        "paste",
                        "directionality",
                        'insertdatetime media table paste code help wordcount'
                    ],
                    entity_encoding: 'raw',
                    force_br_newlines: true,
                    force_p_newlines: false,
                    forced_root_block: false,
                    //menubar: "table",
                    //menubar: "edit",
                    toolbar: 'basicDateButton | undo redo | formatselect | bold italic backcolor forecolor | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent | removeformat | fontsizeselect link image media | table | help | preview fullscreen',
                    content_css: [
                        //'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                        //'https://fonts.googleapis.com/earlyaccess/notonaskharabic.css',
                        'css/mystyle.css'
                    ]
                });
            }
            ///});
            $("a[href*='del=']").on("click", function() {
                var modal = $("#logoutModal");
                modal.find("[data-action]").attr("href", $(this).attr("href"));
                modal.modal("show");
                return false;
            });
            $("#paste_btn").on("click", function() {
                var past_txt = $("#paste_text").val();
                tinymce.activeEditor.insertContent(past_txt);
                $("#paste_text").val("");
                $("#myModal").modal("hide");
            });
        </script>
        <!-- Page level custom scripts -->
        <!--  <script src="js/demo/chart-area-demo.js"></script> -->
        <script type="text/javascript">
            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
            var formatDateComponent = function(dateComponent) {
                return (dateComponent < 10 ? '0' : '') + dateComponent;
            };
            var formatDate = function(date) {
                return date.getFullYear() + '-' + formatDateComponent(date.getMonth() + 1) + '-' + formatDateComponent(date.getDate());
            };

            function getDate(today) {
                var now = new Date();
                var firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
                var lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
                if (today)
                    lastDay = new Date();
                return [formatDate(firstDay), formatDate(lastDay)];
            }
            <?php
            $arry = array();
            $day_this_month  = date("d");
            $data = $core->getorder(array());
            //echo count($data);
            $arry = array();
            for ($i = 0; $i < $day_this_month; $i++) {
                $user = 0;
                $day = (($i + 1) < 10 ? "0" . ($i + 1) : ($i + 1));
                for ($y = 0; $y < count($data); $y++) {
                    if (date("Y-m-d", $data[$y]["date"]) == date("Y-m-" . $day)) {
                        $user += 1;
                    }
                }
                array_push($arry, $user);
            }
            ?>

            function getData() {
                var now = new Date();
                var day = formatDateComponent(now.getDate());
                var data = [];
                for (var i = 0; i < day; i++) {
                    data.push(i + Math.floor((Math.random() * 100) + 1));
                }
                return data;
            }
            var ctx = document.getElementById("myAreaChart");
            //console.log(getDate(true));
            if (ctx)
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [{
                            //data: [12, 19, 3, 5, 2, 3, 32, 15,50,100,60],
                            data: <?php echo json_encode($arry); ?>,
                            label: "Orders",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{
                                type: 'time',
                                time: {
                                    parser: 'YYYY-MM-DD HH:mm:ss',
                                    //parser: 'YYYY-MM-DD',
                                    unit: 'day',
                                    displayFormats: {
                                        day: 'YYYY-MM-DD'
                                    },
                                    min: getDate()[0] + ' 12:00:00',
                                    max: getDate(true)[1] + ' 12:00:00'
                                },
                                ticks: {
                                    source: 'data'
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        animation: {
                            duration: 0,
                        },
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10,
                            callbacks: {
                                label: function(tooltipItem, chart) {
                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                }
                            }
                        },
                        hover: {
                            animationDuration: 0,
                        },
                        responsiveAnimationDuration: 0
                    },
                    plugins: [{
                        beforeInit: function(chart) {
                            var time = chart.options.scales.xAxes[0].time, // 'time' object reference
                                timeDiff = moment(time.max).diff(moment(time.min), 'd'); // difference (in days) between min and max date
                            for (i = 0; i <= timeDiff; i++) {
                                var _label = moment(time.min).add(i, 'd').format('YYYY-MM-DD');
                                chart.data.labels.push(_label);
                            }
                        }
                    }]
                });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').each(function() {
                    // $(this).find("thead tr").prepend("<td></td>");
                    //  $(this).find("tbody tr").prepend("<td></td>");
                    $(this).DataTable({
                        fixedHeader: true,
                        //dom: '<"row d-flex justify-content-between align-items-center m-1"<"col-lg-6 d-flex align-items-center"l><"col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0"f<"invoice_status ms-sm-2"><"dt-action-buttons text-xl-end text-lg-start text-lg-end text-start m2s-2 "B>>>t<"d-flex justify-content-between mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        // dom: '<"row d-flex justify-content-between align-items-center m-1"<"col-lg-6 d-flex align-items-center p-0"lf><"col-lg-6 d-flex align-items-center justify-content-lg-end justify-content-center flex-lg-nowrap flex-wrap pe-lg-1 p-0"<"invoice_status ms-sm-2"><"dt-action-buttons text-xl-end text-lg-start text-lg-end flex-column flex-lg-row text-start d-flex align-items-center m2s-2 " <"user_role mt-2 mt-lg-0 width-200 me-lg-1 me-0">B>>>t<"d-flex justify-content-between mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        //dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',

                        "iDisplayLength": 10,
                        "pageLength": 25,
                        "language": {
                            "lengthMenu": "عرض _MENU_  من النتائج",
                            "zeroRecords": "عذرا لم يتم العثور على نتائج",
                            "info": "الصفحه رقم  _PAGE_ من _PAGES_",
                            "infoEmpty": "عذرا لم يتم العثور على نتائج",
                            "search": "البحث :",
                            "paginate": {
                                "first": "الاول",
                                "last": "الاخير",
                                "next": "التالى",
                                "previous": "السابق"
                            },
                            "infoFiltered": "(filtered from _MAX_ total records)"
                        },
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function(row) {
                                        var data = row.data();
                                        // _log(data);
                                        return "تفاصيل" + " #" + data[0];
                                    },
                                    dialog: {
                                        dialogClass: "modal-dialog-centered"
                                    }
                                }),
                                type: 'column',
                                renderer: function(api, rowIdx, columns) {
                                    var data = $.map(columns, function(col, i) {
                                        //col.data = $(col.data).doFeather();
                                        //  console.log(col.data);


                                        return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                            ?
                                            '<tr data-dt-row="' + col.rowIdx + '" data-dt-column="' + col.columnIndex + '">' + '<td>' + col.title + ':' + '</td> ' + '<td>' + col.data + '</td>' + '</tr>' : '';
                                    }).join('');
                                    return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
                                }
                            }
                        },
                    });
                });
            });
            //jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches
            /*$(".newClear").click(function(){
            $(this).closest('fieldset').find("input[type=text],input[type=number], textarea").val("");
            });*/
            $(".next,.newClear").click(function() {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                if (current_fs.index() == 2) {
                    location.replace("?app=services");
                    return false;
                }
                var newClear = $(this);
                $.ajax({
                    type: "post",
                    url: "ajax.php?action=<?= $app ?>&id=" + current_fs.index(),
                    data: new FormData($('form')[0]),
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        //console.log(data.st);
                        if (current_fs.index() == 1)
                            $("input[name=mydata]").val(data.id);
                        if (current_fs.index() == 2) {
                            $("input[name=specialized_type]").val(data.id);
                        }
                        if (current_fs.index() == 3) {
                            $("input[name=specialized_select]").val(data.specialized_select);
                        }
                        if (newClear.hasClass("newClear")) {
                            newClear.closest('fieldset').find("input[type=text],input[type=hidden],input[type=number], textarea").val("");
                            newClear.closest('fieldset').find("select[name=name],select[name=nameanswer]").remove();
                            newClear.closest('fieldset').find("input[name=name1],input[name=nameanswer1]").attr("type", "text");
                            newClear.closest('fieldset').find("input[name=nameanswer1]").attr("name", "nameanswer1");
                            newClear.closest('fieldset').find("input[name=name1]").attr("name", "name");
                            animating = false;
                            return false;
                        }
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now, mx) {
                                //as the opacity of current_fs reduces to 0 - stored in "now"
                                //1. scale current_fs down to 80%
                                scale = 1 - (1 - now) * 0.2;
                                //2. bring next_fs from the right(50%)
                                left = (now * 50) + "%";
                                //3. increase opacity of next_fs to 1 as it moves in
                                opacity = 1 - now;
                                current_fs.css({
                                    'transform': 'scale(' + scale + ')',
                                    'position': 'absolute'
                                });
                                next_fs.css({
                                    'left': left,
                                    'opacity': opacity
                                });
                            },
                            duration: 800,
                            complete: function() {
                                //$(".citybox").html(data);
                                current_fs.hide();
                                animating = false;
                                //}
                            },
                            //this comes from the custom easing plugin
                            easing: 'easeInOutBack'
                        });
                    }
                });
            });
            $(".previous").click(function() {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1 - now) * 50) + "%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'left': left
                        });
                        previous_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
            $(".submit").click(function() {
                return false;
            });
            $("form").on("submit", function() {
                var el = this;
                var id = $(el).attr("id");
                var red = $(el).data("red");
                var values = $(this).serialize();
                if ($("textarea[name=description]").length > 0 && tinyMCE && tinyMCE.activeEditor) {
                    values = $(el).serializeArray();
                    values.find(input => input.name == 'description').value = tinyMCE.get("extra2").getContent();
                    values.find(input => input.name == 'description_arabic').value = tinyMCE.get("extra").getContent();
                    values = jQuery.param(values);
                }
                console.log(values);
                // return false;  
                if (!id)
                    id = '<?= $app ?>';
                $.ajax({
                    type: "post",
                    url: "ajax.php?action=" + id,
                    data: values,
                    dataType: "json",
                    // cache: false,
                    // contentType: false,
                    //processData: false,
                    success: function(data) {
                        if (data.st == "ok") {
                            $.toaster({
                                message: data.msg,
                                title: '',
                                priority: 'success'
                            });
                            setTimeout(function() {
                                location.replace("?app=<?= $app ?>" + (data.red ? data.red : (red ? red : "")));
                            }, 1000); //will call the function after 2 secs.
                        } else {
                            $.toaster({
                                message: data.msg,
                                title: '',
                                priority: 'danger'
                            });
                        }
                    }
                });
                return false;
            });

            function selectChange(el) {
                return false;
            }

            function readURL(input, isFile) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var $data = new FormData();
                        $data.append('file', input.files[0]);
                        $.ajax({
                            url: "ajax.php?action=upload",
                            type: "POST",
                            data: $data,
                            dataType: "json",
                            xhr: function() {
                                var myXhr = $.ajaxSettings.xhr();
                                if (myXhr.upload) {
                                    $(".progressbar").show();
                                    $(".image-upload").hide();
                                    myXhr.upload.addEventListener('progress', progress, false);
                                }
                                return myXhr;
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                if (data.st == "ok") {
                                    $.toaster({
                                        message: data.msg,
                                        title: '',
                                        priority: 'success'
                                    });
                                    if (!isFile) {
                                        $("input[name=logo]").val(data.file);
                                        $("input[name=image]").val(data.file);
                                        $('#blah').attr('src', e.target.result);
                                    } else {
                                        $("input[name=file]").val(data.file);
                                    }
                                    //location.replace("?app=<?= $app ?>&worker=<?= $iswoker ?>"+(data.red?data.red:""));
                                } else {
                                    $.toaster({
                                        message: data.msg,
                                        title: '',
                                        priority: 'danger'
                                    });
                                }
                            }
                        });
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function progress(e) {
                if (e.lengthComputable) {
                    var max = e.total;
                    var current = e.loaded;
                    var Percentage = Math.ceil((current * 100) / max);
                    console.log(Percentage);
                    $(".progressbar .float-left").text(Percentage + "%");
                    $(".progress-bar").css("width", Percentage + "%");
                    // $.toaster({ message : "جارى رفع الملف : "+Percentage+"%", title : '', priority : 'info' });
                    if (Percentage >= 100) {
                        $(".progressbar").hide();
                        $(".image-upload").show();
                        // process completed
                    }
                }
            }
            $(".uploadFile").on("click", function() {
                $("input[name=fileToUpload2]").trigger("click");
            });
            $(".multipleFile").on("click", function() {
                $("input[name=multipleUpload]").trigger("click");
                return false;
            });
            $("input[name=fileToUpload2]").on("change", function() {
                readURL(this, true);
            });
            $("input[name=multipleUpload]").on("change", function() {
                var files = $(this)[0].files;
                var error = '';
                var form_data = new FormData();
                for (var count = 0; count < files.length; count++) {
                    var name = files[count].name;
                    var extension = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        error += "Invalid " + count + " Image File"
                    } else {
                        form_data.append("files[]", files[count]);
                    }
                }
                if (error == '') {
                    $.ajax({
                        url: "ajax.php?action=upload&multiple=<?= $core->isv('blog') ?>",
                        dataType: "json",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            //$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
                            $.toaster({
                                message: "جارى رفع الملفات",
                                title: '',
                                priority: 'info'
                            });
                        },
                        success: function(data) {
                            console.log(data);
                            $.toaster({
                                message: data.msg,
                                title: '',
                                priority: 'success'
                            });
                            location.reload();
                        }
                    });
                } else {
                    $.toaster({
                        message: error,
                        title: '',
                        priority: 'danger'
                    });
                }
            });
            $("#imgInp").change(function() {
                readURL(this, false);
            });
            <?php if ($add) { ?>
                selectChange();
            <? } ?>
        </script>
        <script type="text/javascript">
            function getRelated(el, ex, ny) {
                var level = ex;
                var myorder = ny;
                if (el) {
                    level = $(el).val();
                }
                $("#related").load("ajax.php?action=related&level=" + level + "&myorder=" + myorder);
            }
        </script>
        </body>

        </html>