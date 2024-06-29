<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title><?= $title; ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/logo.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/img/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/logo.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/src/plugins/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/depan/vendors/styles/style.css" />


    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/js/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/js/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/js/animate.min.css">

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

<body class="login-page">

    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="<?= base_url() ?>assets/img/load1.svg" alt="" width="170px" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Mohon Tunggu...</div>
        </div>
    </div>

    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= base_url('login') ?>">
                    <img src="<?= base_url() ?>assets/img/logo.png" alt="" width="50px" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="<?= base_url('login') ?>">Login e-Schedule</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7" id="animation container">
                    <!-- <img src="<?= base_url() ?>assets/depan/vendors/images/login-page-img.png" alt="" /> -->
                    <!-- <img src="<?= base_url() ?>assets/img/wel2.png" alt="" /> -->

                    <dotlottie-player src="https://lottie.host/9567cecf-7a08-4060-b18e-6b5f4402fa1f/F7I4JgvDEh.json" background="transparent" speed="1" style="width: 100%; height: 550px;" loop autoplay></dotlottie-player>
                </div>

                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login e-Schedule</h2>
                        </div>
                        <form action="<?= base_url('login/act-login') ?>" method="post">

                            <div class="input-group custom">
                                <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="**********" required />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">

                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <!-- <div class="col-6">
                                    <div class="forgot-password">
                                        <a href="forgot-password.html">Forgot Password</a>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">

                                        <button class="btn btn-login btn-primary btn-lg btn-block" type="submit">Login</button>
                                        <!-- <button type="button" class="btn btn-danger btn-lg btn-block" id="btn-hapus">Coba</button> -->
                                    </div>
                                    <!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- js -->
    <script src="<?= base_url() ?>assets/depan/vendors/scripts/core.js"></script>
    <script src="<?= base_url() ?>assets/depan/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url() ?>assets/depan/vendors/scripts/process.js"></script>
    <script src="<?= base_url() ?>assets/depan/vendors/scripts/layout-settings.js"></script>

    <!-- add sweet alert js & css in footer -->
    <script src="<?= base_url() ?>assets/depan/src/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="<?= base_url() ?>assets/depan/src/plugins/sweetalert2/sweet-alert.init.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Sweetalert -->
    <script src="<?= base_url() ?>assets/lib/js/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/js/myscript.js"></script>
    <!-- <script src="<?= base_url() ?>assets/lib/js/jquery.min.js"></script> -->

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script> -->
    <!-- <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> -->
    <!-- login -->
    <!-- <script src="<?= base_url() ?>assets/load/js/login.js"></script> -->

    <!-- <script>
        var animation = bodymovin.loadAnimation({
            containter: document.getElementById("animation container"),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'assets/lottie/lottiejson_learn2.json',
        })
    </script> -->




    <script>
        var flash = $('#flash').data('flash');
        if (flash) {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: flash
            })
        }
        $(document).on('click', '#btn-hapus', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff00ff	',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })
    </script>

</body>

</html>