<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title><?= $title; ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/depan/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/depan/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/depan/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/src/plugins/switchery/switchery.min.css" />
    <!-- bootstrap-tagsinput css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="<?= base_url() ?>assets/img/load.svg" alt="" width="170px" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Mohon Tunggu...</div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>


        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow header-dark" data-toggle="right-sidebar">

                    </a>
                </div>
            </div>
            <div class="user-notification">
                <p class="text-white font-weight-bold">Selamat Datang, E-Schedule SMA Kristen</p>
            </div>

        </div>
    </div>