<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Sep 2020 03:23:13 GMT -->

<head>
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/template/assets/images/favicon.ico">

    <!-- third party css -->
    <link href="<?= base_url() ?>assets/template/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="<?= base_url() ?>assets/template/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/template/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?= base_url() ?>assets/template/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- toast -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/toast/demos/css/jquery.toast.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/js/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/js/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/js/animate.min.css">


    <!-- Datatables css -->
    <link href="<?= base_url() ?>assets/template/assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/template/assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

    <!-- loading page -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/load/css/load.css" type="text/css"> -->

    <style type="text/css">
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("<?= base_url() ?>assets/img/loading2.gif") 50% 50% no-repeat rgb(255, 255, 255);
            opacity: 0.9;
            transition: opacity 0.80s, visibility 0.80s;
        }

        .loader--hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader::after {
            content: "";
            width: 100%;
            height: 100%;
            animation: loading 10.00s ease infinite;
        }
    </style>

</head>

<!-- <div class="loader">
</div> -->


<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>