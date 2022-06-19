<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kxprss - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.css" /> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/cr-1.5.5/fh-3.2.0/r-2.2.9/rr-1.2.8/datatables.min.css" />-->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" rel="stylesheet">



    <!--    <link href="http://demo.sherktk.com/glisshipping_system/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <style type="text/css">
        table.dataTable.collapsed>tbody>tr>td:first-child {
            position: relative;
        }

        table.dataTable.collapsed>tbody>tr>td:first-child:before {
            top: 39%;
            right: 30px;
            height: 1em;
            width: 1em;
            margin-top: -9px;
            display: block;
            position: absolute;
            color: white;
            border: 0.15em solid white;
            border-radius: 1em;
            box-shadow: 0 0 0.2em #444;
            box-sizing: content-box;
            text-align: center;
            text-indent: 0 !important;
            font-family: "Courier New", Courier, monospace;
            line-height: 1em;
            content: "+";
            background-color: #0d6efd;
        }

        .btn-close {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: 0.25em 0.25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: 0.25 rem;
            opacity: .5;
        }

        @media screen and (max-width: 767px) {
            div#dataTable_length {
                text-align: center !important;
            }
        }

        @FONT-FACE {
            font-family: "open";
            src: url(css/Al-Jazeera-Arabic-Regular.ttf)
        }

        body {
            font-family: "open" !important;
        }

        .hide {
            display: none !important;
        }

        .center {
            text-align: center;
        }

        @import url(https://fonts.googleapis.com/css?family=Montserrat);

        /*basic reset*/
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
            /*Image only BG fallback*/
            /*background = gradient + image pattern combo*/
            background:
                linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));
        }

        body {
            font-family: montserrat, arial, verdana;
        }

        td img {
            border-radius: 0px !important;
        }

        /*form styles*/
        #msform {
            /*  width: 400px;  */
            margin: 50px auto;
            text-align: center;
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;
            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input,
        #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 13px;
        }

        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #4e73df;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        div#dataTable_wrapper {
            margin-top: 5px;
        }

        /*   div#dataTable_filter {
            float: left;
        }
 */
        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
        }

        div.dataTables_wrapper div.dataTables_filter input {

            width: 200px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #4e73df;
        }

        /*headings*/
        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        .modal-body {
            text-align: right;
        }

        .modal-header .close {
            padding: 0;
            margin: 0;
        }

        .modal-footer>:not(:last-child) {
            margin-right: .25rem;
            margin-left: .25rem;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: #3a3b45;
            text-transform: uppercase;
            font-size: 13px;
            width: 50%;
            float: right;
            position: relative;
        }

        .bo-img {
            position: relative;
            margin: 30px auto;
            text-align: center;
        }

        #blah {
            width: 200px;
            /*    height: 150px; */
            border: 1px solid #ccc;
            font-size: 12px;
            line-height: 80px;
            text-align: center;
            display: inline-block;
            /* border-radius: 50%; */
        }

        .fileUpload2 input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .fileUpload2 {
            position: absolute;
            overflow: hidden;
            float: left;
            left: 50%;
            width: 25px;
            margin-left: -11px;
            font-size: 22px !important;
            bottom: 4px;
            color: #b6b3b3f7;
        }

        footer.sticky-footer.bg-white {
            background: #0000 !important;
        }

        @media (min-width: 768px) {
            .sidebar.toggled .nav-item .collapse {
                position: absolute;
                right: calc(6.5rem + 1.5rem / 2);
                left: auto;
            }
        }

        .sidebar .nav-item .collapse .collapse-inner .collapse-item,
        .sidebar .nav-item .collapsing .collapse-inner .collapse-item,
        .sidebar .nav-item .collapse .collapse-inner .collapse-header,
        .sidebar .nav-item .collapsing .collapse-inner .collapse-header {
            text-align: right;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 50px;
            line-height: 32px;
            display: block;
            font-size: 11px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
            font-weight: bold;
            z-index: 25;
            position: inherit;
        }

        .sidebar-dark .sidebar-brand {
            background-image: linear-gradient(to top, #f0f0f0, #f4f4f4);
            background: linear-gradient(to right, #182848, #4b6cb7);
        }

        .bg-gradient-primary {
            background: linear-gradient(to right, #182848, #4b6cb7);
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            right: -50%;
            top: 15px;
            z-index: 1;
            /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #4e73df;
            color: white;
        }

        body {
            direction: rtl;
        }

        .table,
        .card-body,
        .card-header,
        .dropdown-item,
        .topbar .dropdown-list {
            text-align: right;
        }

        ul.navbar-nav.ml-auto {
            position: absolute;
            left: 0;
        }

        .dropdown-item i {
            position: absolute;
            right: 5px;
            margin-top: 5px;
        }

        .clear {
            clear: both;
        }

        .scroll-to-top {
            left: 1rem;
            right: auto;
        }

        @media (max-width: 750px) {
            ul.navbar-nav.ml-auto {
                position: initial;
                left: 0;
            }
        }

        @media (min-width: 576px) {
            .topbar .dropdown .dropdown-menu {
                right: auto;
                left: 0;
            }
        }

        .sidebar .sidebar-brand {
            height: 63px;
            padding: 28px;
        }

        .sidebar-dark .sidebar-brand {
            background-image: linear-gradient(to top, #f0f0f0, #f4f4f4);
        }

        .collapse-inner.rounded {
            background: #a3afcb !important;
            border: 0;
            border-radius: 0 !important;
            background: #ececf1db !important;
        }

        .sidebar .nav-item .collapse,
        .sidebar .nav-item .collapsing {
            margin: 0;
        }

        .sidebar-brand-icon img {

            filter: brightness(0) invert(1);
        }

        .sidebar-dark .sidebar-brand {
            background-image: unset;
        }

        .btn-circle {
            border-radius: 0%;
        }

        .btn {
            border-radius: 0;
        }

        .input-group>.input-group-append>.btn,
        .input-group>.input-group-append>.input-group-text,
        .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
        .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child),
        .input-group>.input-group-prepend:not(:first-child)>.btn,
        .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 4px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group>.custom-select:not(:last-child),
        .input-group>.form-control:not(:last-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        input.fileToUpload.photo.upload-field-1 {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .image-upload {
            position: relative;
        }

        .progressbar {
            display: none;
        }

        @media (min-width: 768px) {

            .sidebar .nav-item .nav-link {

                text-align: right;

            }

            .sidebar-brand-icon img {
                width: 100% !important;
            }

            .sidebar-brand-text.mx-3 {
                display: none !important;
            }

            .sidebar .nav-item .nav-link i {

                margin-left: .25rem;
                font-size: 20px;
                margin-right: 0;
            }

            .sidebar .nav-item .nav-link[data-toggle=collapse]::after {
                float: left;
            }
        }

        .topbar #sidebarToggleTop {
            color: #525f80;
        }

        .topbar {

            background: unset;
        }

        .card-header:first-child {
            background: #ececf1;
        }
    </style>
</head>

<body id="page-top" class="sidebar-toggled3">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php if ($core->isv("app") != "login") { ?>
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled3" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?app=home">
                    <div class="sidebar-brand-icon rotate-n-25">
                        <!-- <i class="fas fa-laugh-wink"></i>  -->
                        <img src="../images/logoarabic.png" style="width: 100px;" alt="" />
                    </div>
                    <div class="sidebar-brand-text mx-3">EgyWay <sup>CP</sup></div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?= $core->isactive("home", true) ?>">
                    <a class="nav-link" href="?app=home">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>الرئيسية</span></a>
                </li>
                <?
                if ($_lev != 3) { ?>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("categories") ?>">
                        <a class="nav-link" href="?app=categories">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>التصنيفات</span></a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("companies") ?>">
                        <a class="nav-link" href="?app=companies">
                            <i class="fas fa-fw fa-building"></i>
                            <span>العلامات التجارية</span></a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item <?= $core->isactive("products") ?> <?= $core->isactive("images") ?> <?= $core->isactive("reviews") ?>">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                            <i class="fas fa-fw fa-table"></i>
                            <span>المنتجات</span>
                        </a>
                        <div id="collapseUtilities2" class="collapse <?= $core->isactive("products", false, "show") ?> <?= $core->isactive("images", false, "show") ?> <?= $core->isactive("reviews", false, "show") ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?= $core->isactive("products") ?>" href="?app=products">العناصر</a>
                                <a class="collapse-item <?= $core->isactive("reviews") ?>" href="?app=reviews">المراجعات</a>
                                <a class="collapse-item <?= $core->isactive("deal") ?>" href="?app=products&deal=1">العروض الخاصة</a>
                                <a class="collapse-item <?= $core->isactive("images") ?>" href="?app=images">صور المنتجات</a>
                            </div>
                        </div>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("coupons") ?>">
                        <a class="nav-link" href="?app=coupons">
                            <i class="fas fa-fw fa-percent"></i>
                            <span>الكوبونات</span></a>
                    </li>
                    <!--
             <hr class="sidebar-divider">
              <li class="nav-item <?= $core->isactive("branches") ?>">
                <a class="nav-link" href="?app=pages&ptype=branches">
                    <i class="fas fa-fw fa-code-branch"></i>
                    <span>الفروع</span></a>
            </li>-->
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("cities") ?> <?= $core->isactive("regions") ?> <?= $core->isactive("zones") ?>">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-dolly-flatbed"></i>
                            <span>الشحن</span>
                        </a>
                        <div id="collapseUtilities" class="collapse <?= $core->isactive("cities", false, "show") ?> <?= $core->isactive("regions", false, "show") ?> <?= $core->isactive("zones", false, "show") ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?= $core->isactive("cities") ?>" href="?app=cities">المدن</a>
                                <a class="collapse-item <?= $core->isactive("regions") ?>" href="?app=regions">المناطق</a>
                            </div>
                        </div>
                    </li>
                <? }
                if ($glev || $_lev == 3) { ?>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("orders") ?>">
                        <a class="nav-link" href="?app=orders">
                            <i class="fas fa-fw fa-cart-arrow-down"></i>
                            <span>الطلبات</span></a>
                    </li>
                <? }
                if ($_lev != 3) { ?>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("slider") ?>">
                        <a class="nav-link" href="?app=slider">
                            <i class="fas fa-fw fa-table"></i>
                            <span>السلايدر</span></a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("pages") ?>">
                        <a class="nav-link" href="?app=pages">
                            <i class="fas fa-fw fa-pager"></i>
                            <span>الصفحات</span></a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("static") ?>">
                        <a class="nav-link" href="?app=static">
                            <i class="fas fa-fw fa-table"></i>
                            <span>الصفحات الثابتة</span></a>
                    </li>
                    <!-- Divider -->

                    <hr class="sidebar-divider">

                    <li class="nav-item <?= $core->isactive("ads") ?>">

                        <a class="nav-link" href="?app=ads">

                            <i class="fab fa-buysellads"></i>

                            <span>الاعلانات</span></a>

                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("visitors") ?>">
                        <a class="nav-link" href="?app=visitors">
                            <i class="fas fa-envelope-open-text"></i>
                            <span>القائمة البريديه</span></a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("info_media") ?>">
                        <a class="nav-link" href="?app=info_media">
                            <i class="fas fa-hashtag"></i>
                            <span>السوشيال ميديا</span></a>
                    </li>
                    <!-- Divider -->
                <?php }
                if ($glev) { ?>
                    <hr class="sidebar-divider">
                    <li class="nav-item <?= $core->isactive("users") ?>">
                        <a class="nav-link" href="?app=users">
                            <i class="fas fa-fw fa-user"></i>
                            <span>المستخدمين</span></a>
                    </li>
                <?php } ?>
                <!-- Divider -->
                <!-- <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div> -->
            </ul>
            <!-- End of Sidebar -->
        <?php } ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php if ($core->isv("app") != "login") { ?>
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white2 topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-0">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class=" nav-link waves-effect" href="#" id="fullscreen" role="button" data-toggle="fullscreen">
                                    <i class="fas fa-expand"></i>

                                </a>

                            </li>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" src="img/boss2.png">
                                    <span class="mr-2 d-none d-lg-inline text-center text-gray-600 small"><?= strtoupper($getLogin["name"]) ?>
                                        <span class="d-lg-block "> <span class="badge badge-info"><?= $core->getLev($_lev) ?></span> </span>
                                    </span>

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <!--<a class="dropdown-item" href="#">
                                    الاعدادات
                                     <i class="fas fa-cogs fa-sm fa-fw ml-2 text-gray-400"></i>
                                </a>-->
                                    <!-- <div class="dropdown-divider"></div>-->
                                    <a class="dropdown-item" href="?app=logout" data-toggle="modal" data-target="#logoutModal">
                                        تسجيل الخروج
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw ml-2 text-gray-400"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                <?php } ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">