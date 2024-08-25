<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <meta content="WinArtCode" name="Develop by Erwin, S.Kom" />

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/logo.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/img/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/logo.png" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>public/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/login.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/custom.css">

    <!-- <style>
        
    </style> -->

</head>

<body class="hold-transition login-page">
    <div class="login-container">

        <div class="login-form-container">
            <div class="login-form">
                <img src="<?= base_url() ?>assets/img/logo.png" alt="" style="width: 18%;">
                <div class="mb-5">
                    <p class="lead">Login to e-Schedule</p>
                </div>
                <form id="loginForm">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Email / username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group remember-me-container">
                        <button type="submit" class="btn btn-primaryku btn-block" id="btnLogin">
                            <span id="btnLoader" style="display: none;">
                                <i class="fa fa-spinner fa-spin"></i>
                            </span>
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="svg-container">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="svg1">
                <path fill="#4887c5" fill-opacity="0.15" d="M43.2,-70.9C53.7,-60.6,58.2,-44.6,62,-30.1C65.9,-15.6,69.2,-2.6,69.8,11.7C70.3,26,68.2,41.7,60.2,53.6C52.1,65.4,38,73.6,22.7,78.9C7.3,84.3,-9.5,86.7,-25.3,83.4C-41.1,80,-56,70.7,-67.2,58.1C-78.3,45.4,-85.7,29.4,-86.9,13.2C-88.1,-3,-83.2,-19.4,-74.1,-31.5C-65,-43.7,-51.7,-51.7,-38.6,-60.9C-25.6,-70.1,-12.8,-80.5,1.8,-83.4C16.4,-86.2,32.8,-81.3,43.2,-70.9Z" transform="translate(100 100)" />
            </svg>
            <!-- <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg2">
                <path fill="#4887c5" fill-opacity="0.15" d="M18.7,-22.8C23.9,-18,27.4,-11.7,28.6,-5.1C29.7,1.6,28.5,8.7,25.7,16C22.9,23.4,18.5,31.1,11.3,35.7C4.2,40.4,-5.8,41.9,-14.7,39.2C-23.5,36.4,-31.2,29.4,-35.8,20.9C-40.4,12.4,-41.9,2.4,-39.9,-6.7C-37.9,-15.7,-32.3,-23.7,-25,-28.2C-17.8,-32.6,-8.9,-33.4,-1,-32.1C6.8,-30.9,13.6,-27.6,18.7,-22.8Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
            </svg> -->
            <!-- <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg3">
                <polygon points="50,15 90,85 10,85" fill="#4887c5" fill-opacity="0.15" />
            </svg> -->
            <!-- <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg4">
                <rect x="25" y="25" width="50" height="50" fill="#4887c5" fill-opacity="0.15" transform="rotate(45 50 50)" />
            </svg> -->
            <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg5">
                <path fill="#4887c5" fill-opacity="0.15" d="M18.7,-22.8C23.9,-18,27.4,-11.7,28.6,-5.1C29.7,1.6,28.5,8.7,25.7,16C22.9,23.4,18.5,31.1,11.3,35.7C4.2,40.4,-5.8,41.9,-14.7,39.2C-23.5,36.4,-31.2,29.4,-35.8,20.9C-40.4,12.4,-41.9,2.4,-39.9,-6.7C-37.9,-15.7,-32.3,-23.7,-25,-28.2C-17.8,-32.6,-8.9,-33.4,-1,-32.1C6.8,-30.9,13.6,-27.6,18.7,-22.8Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="svg6">
                <path fill="#4887c5" fill-opacity="0.15" d="M43.2,-70.9C53.7,-60.6,58.2,-44.6,62,-30.1C65.9,-15.6,69.2,-2.6,69.8,11.7C70.3,26,68.2,41.7,60.2,53.6C52.1,65.4,38,73.6,22.7,78.9C7.3,84.3,-9.5,86.7,-25.3,83.4C-41.1,80,-56,70.7,-67.2,58.1C-78.3,45.4,-85.7,29.4,-86.9,13.2C-88.1,-3,-83.2,-19.4,-74.1,-31.5C-65,-43.7,-51.7,-51.7,-38.6,-60.9C-25.6,-70.1,-12.8,-80.5,1.8,-83.4C16.4,-86.2,32.8,-81.3,43.2,-70.9Z" transform="translate(100 100)" />
            </svg>
            <!-- <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="svg7">
                <polygon points="30,20 80,75 10,85" fill="#4887c5" fill-opacity="0.15" />
            </svg> -->
            <svg fill="#4887c5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 612.00 612.00" xml:space="preserve" stroke="#000000" stroke-width="0.0061200000000000004" class="svg4">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier" fill-opacity="0.15">
                    <g>
                        <g>
                            <path d="M497.25,319.402c-10.763-2.482-21.951-3.84-33.469-3.84c-3.218,0-6.397,0.139-9.562,0.34 c-71.829,4.58-129.725,60.291-137.69,131.145c-0.617,5.494-0.966,11.073-0.966,16.734c0,10.662,1.152,21.052,3.289,31.078 C333.139,561.792,392.584,612,463.781,612C545.641,612,612,545.641,612,463.781C612,393.439,562.982,334.582,497.25,319.402z M463.781,561.797c-54.133,0-98.016-43.883-98.016-98.016s43.883-98.016,98.016-98.016s98.016,43.883,98.016,98.016 S517.914,561.797,463.781,561.797z" />
                            <polygon points="504.45,405.316 467.262,442.505 430.073,405.316 406.406,428.983 443.595,466.172 406.406,503.36 430.073,527.027 467.262,489.839 504.45,527.027 528.118,503.36 490.93,466.172 528.118,428.983 " />
                            <path d="M109.969,0c-9.228,0-16.734,7.507-16.734,16.734v38.25v40.641c0,9.228,7.506,16.734,16.734,16.734h14.344 c9.228,0,16.734-7.507,16.734-16.734V54.984v-38.25C141.047,7.507,133.541,0,124.312,0H109.969z" />
                            <path d="M372.938,112.359h14.344c9.228,0,16.734-7.507,16.734-16.734V54.984v-38.25C404.016,7.507,396.509,0,387.281,0h-14.344 c-9.228,0-16.734,7.507-16.734,16.734v38.25v40.641C356.203,104.853,363.71,112.359,372.938,112.359z" />
                            <path d="M38.25,494.859h231.891c-2.333-11.6-3.572-23.586-3.572-35.859c0-4.021,0.177-7.999,0.435-11.953H71.719 c-15.845,0-28.688-12.843-28.688-28.688v-229.5h411.188v88.707c3.165-0.163,6.354-0.253,9.562-0.253 c11.437,0,22.61,1.109,33.469,3.141V93.234c0-21.124-17.126-38.25-38.25-38.25h-31.078v40.641c0,22.41-18.23,40.641-40.641,40.641 h-14.344c-22.41,0-40.641-18.231-40.641-40.641V54.984H164.953v40.641c0,22.41-18.231,40.641-40.641,40.641h-14.344 c-22.41,0-40.641-18.231-40.641-40.641V54.984H38.25C17.126,54.984,0,72.111,0,93.234v363.375 C0,477.733,17.126,494.859,38.25,494.859z" />
                            <circle cx="134.774" cy="260.578" r="37.954" />
                            <circle cx="248.625" cy="260.578" r="37.954" />
                            <circle cx="362.477" cy="260.578" r="37.954" />
                            <circle cx="248.625" cy="375.328" r="37.953" />
                            <circle cx="134.774" cy="375.328" r="37.953" />
                        </g>
                    </g>
                </g>
            </svg>

            <svg fill="#4887c5" height="100" width="100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 259.277 259.277" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 259.277 259.277" class="svg3">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier" fill-opacity="0.15">
                    <g>
                        <path d="m191.337,66.272c-0.251-3.305-3.142-5.777-6.438-5.527-3.304,0.252-5.778,3.134-5.526,6.438l.166,2.177-168.2,57.566c-1.071-2.08-3.315-3.426-5.793-3.24-3.304,0.252-5.778,3.135-5.526,6.438l1.956,25.674c0.239,3.149 2.869,5.545 5.976,5.545 0.153,0 0.308-0.006 0.463-0.018 2.451-0.187 4.442-1.823 5.206-4.003l17.723,3.385c0.782,20.01 17.296,36.05 37.494,36.05 14.85,0 28.351-8.886 34.319-22.336l85.633,16.354 .17,2.229c0.239,3.149 2.869,5.545 5.976,5.545 0.153,0 0.308-0.006 0.463-0.018 3.304-0.252 5.778-3.134 5.526-6.438l-9.588-125.821zm-122.502,118.486c-12.78,0-23.395-9.439-25.244-21.711l47.293,9.032c-4.522,7.722-12.906,12.679-22.049,12.679zm-55.648-39.734l-.449-5.894 167.742-57.409 7.363,96.658-174.656-33.355z" />
                        <path d="m224.6,133.031l29.134-2.219c3.304-0.251 5.778-3.134 5.526-6.438-0.251-3.305-3.139-5.784-6.438-5.527l-29.134,2.219c-3.304,0.251-5.778,3.134-5.526,6.438 0.239,3.149 2.869,5.545 5.976,5.545 0.152,0 0.306-0.006 0.462-0.018z" />
                        <path d="m224.917,95.431l23.208-17.031c2.672-1.96 3.248-5.716 1.287-8.387-1.959-2.671-5.716-3.247-8.387-1.288l-23.208,17.031c-2.672,1.96-3.248,5.716-1.287,8.387 1.175,1.602 2.996,2.451 4.842,2.451 1.233,0 2.476-0.379 3.545-1.163z" />
                        <path d="m255.218,171.504l-25.521-13.318c-2.938-1.532-6.563-0.394-8.096,2.543s-0.395,6.562 2.543,8.095l25.521,13.318c0.887,0.462 1.836,0.682 2.771,0.682 2.164,0 4.254-1.174 5.324-3.226 1.534-2.936 0.395-6.561-2.542-8.094z" />
                    </g>
                </g>
            </svg>

            <svg fill="#4887c5" height="100" width="100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 231.087 231.087" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 231.087 231.087" class="svg2">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier" fill-opacity="0.15">
                    <g>
                        <path d="m230.042,142.627c-1.871-2.744-5.612-3.452-8.355-1.581l-65.513,44.667-14.55-19.473c-1.526-2.036-4.241-2.977-6.788-2.129-3.185,1.06-4.908,4.501-3.848,7.686l11.908,35.785c0.45,1.33 1.184,2.645 2.18,3.757 3.94,4.401 10.702,4.776 15.104,0.836l.777-.695 68.129-60.985c2.216-1.981 2.676-5.346 0.956-7.868z" />
                        <path d="m120.211,190.676h-108.211v-162.49h158.43v124.823c0,3.313 2.687,6 6,6s6-2.687 6-6v-130.823c0-3.313-2.687-6-6-6h-170.43c-3.313,0-6,2.687-6,6v174.49c0,3.313 2.687,6 6,6h114.211c3.313,0 6-2.687 6-6 0-3.314-2.687-6-6-6z" />
                        <path d="m139.694,53.855h-96.959c-3.313,0-6,2.687-6,6s2.687,6 6,6h96.959c3.313,0 6-2.687 6-6s-2.686-6-6-6z" />
                        <path d="m139.694,79.79h-96.959c-3.313,0-6,2.687-6,6s2.687,6 6,6h96.959c3.313,0 6-2.687 6-6s-2.686-6-6-6z" />
                        <path d="m139.694,105.725h-96.959c-3.313,0-6,2.687-6,6s2.687,6 6,6h96.959c3.313,0 6-2.687 6-6s-2.686-6-6-6z" />
                        <path d="m145.694,137.659c0-3.313-2.687-6-6-6h-96.959c-3.313,0-6,2.687-6,6s2.687,6 6,6h96.959c3.314,0 6-2.686 6-6z" />
                        <path d="M42.735,156.329c-3.313,0-6,2.687-6,6s2.687,6,6,6h48.479c3.313,0,6-2.687,6-6s-2.687-6-6-6H42.735z" />
                    </g>
                </g>
            </svg>

            <svg fill="#4887c5" height="100" width="100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 259.277 259.277" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 259.277 259.277" class="svg7">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier" fill-opacity="0.15">
                    <g>
                        <path d="m191.337,66.272c-0.251-3.305-3.142-5.777-6.438-5.527-3.304,0.252-5.778,3.134-5.526,6.438l.166,2.177-168.2,57.566c-1.071-2.08-3.315-3.426-5.793-3.24-3.304,0.252-5.778,3.135-5.526,6.438l1.956,25.674c0.239,3.149 2.869,5.545 5.976,5.545 0.153,0 0.308-0.006 0.463-0.018 2.451-0.187 4.442-1.823 5.206-4.003l17.723,3.385c0.782,20.01 17.296,36.05 37.494,36.05 14.85,0 28.351-8.886 34.319-22.336l85.633,16.354 .17,2.229c0.239,3.149 2.869,5.545 5.976,5.545 0.153,0 0.308-0.006 0.463-0.018 3.304-0.252 5.778-3.134 5.526-6.438l-9.588-125.821zm-122.502,118.486c-12.78,0-23.395-9.439-25.244-21.711l47.293,9.032c-4.522,7.722-12.906,12.679-22.049,12.679zm-55.648-39.734l-.449-5.894 167.742-57.409 7.363,96.658-174.656-33.355z" />
                        <path d="m224.6,133.031l29.134-2.219c3.304-0.251 5.778-3.134 5.526-6.438-0.251-3.305-3.139-5.784-6.438-5.527l-29.134,2.219c-3.304,0.251-5.778,3.134-5.526,6.438 0.239,3.149 2.869,5.545 5.976,5.545 0.152,0 0.306-0.006 0.462-0.018z" />
                        <path d="m224.917,95.431l23.208-17.031c2.672-1.96 3.248-5.716 1.287-8.387-1.959-2.671-5.716-3.247-8.387-1.288l-23.208,17.031c-2.672,1.96-3.248,5.716-1.287,8.387 1.175,1.602 2.996,2.451 4.842,2.451 1.233,0 2.476-0.379 3.545-1.163z" />
                        <path d="m255.218,171.504l-25.521-13.318c-2.938-1.532-6.563-0.394-8.096,2.543s-0.395,6.562 2.543,8.095l25.521,13.318c0.887,0.462 1.836,0.682 2.771,0.682 2.164,0 4.254-1.174 5.324-3.226 1.534-2.936 0.395-6.561-2.542-8.094z" />
                    </g>
                </g>
            </svg>
        </div>



    </div>
</body>


<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.js"></script>

<script src="<?= base_url() ?>public/css/login.js"></script>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</html>