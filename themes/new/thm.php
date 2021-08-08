<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $base; ?>/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?= $base; ?>/assets/img/favicon.png">
        <title>Kalkulatorcetak.com</title>
        <meta name="robots" content="index, follow">
        <meta name="geo.country" content="id" />
        <meta name="geo.placename" content="Indonesia" />
        <meta name="author" content="Munajat Ibnu">
        <meta name="robots" content="all,index,follow">
        <meta http-equiv="Content-Language" content="id-ID">
        <meta name="Distribution" content="Global">
        <meta name="Rating" content="General">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="<?= $base; ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <link href="<?= $base; ?>/assets/css/font-awesome.css" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="<?= $base; ?>/assets/css/argon-design-system.css?v=1.2.0" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/css/custom.css?v=1.0" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/css/hint.css" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/css/sidenav.css" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/dist/css/splide.min.css" rel="stylesheet" />
        <link href="<?= $base; ?>/assets/css/w3.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?= $base; ?>/assets/sweetalert2/dist/sweetalert2.css">
        <!--   Core JS Files   -->
        <script src="<?= $base; ?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?= $base; ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="<?= $base; ?>/assets/sweetalert2/dist/sweetalert2.js" type="text/javascript"></script>
        <script src="<?= $base; ?>/assets/dist/js/splide.min.js" type="text/javascript"></script>
        <script src="<?= $base; ?>/assets/js/jquery.jscroll.min.js" type="text/javascript"></script>
        <script>var SITE_API = "<?=$config['SITE_API'];?>"</script>
        <style>
            .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/loader-64x/Preloader_3.gif) center no-repeat #333;
            }
        </style>
    </head>
    <body class="index-page">
        <!-- Navbar -->
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom ">
            <div class="container">
                <a class="navbar-brand mr-lg-5" href="/">
                    <img src="<?= $base; ?>/assets/img/brand/white.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="/">
                                    <img src="<?= $base; ?>/assets/img/brand/blue.png">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="https://www.facebook.com/kalkulatorcetak/" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                                <i class="fa fa-facebook-square"></i>
                                <span class="nav-link-inner--text d-lg-none">Facebook</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="https://www.instagram.com/kalkulatorcetak" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                                <i class="fa fa-instagram"></i>
                                <span class="nav-link-inner--text d-lg-none">Instagram</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="https://twitter.com/kalkulator_cetak" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                                <i class="fa fa-twitter-square"></i>
                                <span class="nav-link-inner--text d-lg-none">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="wrapper">
            <div class="section section-hero section-shaped">
                <div class="shape shape-style-1 shape-primary">
                    <span class="span-200"></span>
                    <span class="span-50"></span>
                    <span class="span-50"></span>
                    <span class="span-75"></span>
                    <span class="span-100"></span>
                    <span class="span-75"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                </div>
                <div class="page-header">
                    <div class="container shape-container d-flex align-items-center py-lg">
                        <div class="col px-0">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="<?= $base; ?>/assets/img/brand/white.png" style="width: 200px;" class="img-fluid">
                                    <p class="lead text-white">Hitung cepat dengan kalkulatorcetak.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
            <div class="section section-components pb-0" id="section-components">
                <div class="container text-center list_content">
                    <div class="row"></div>
                    <nav aria-label="Page navigation example" class="mb-4">
                        <a class="btn btn-lmore" href="<?=$_URL;?>">Hitungan Lainnya</a>
                    </nav>
                    <hr>
                </div>
            </div>
            <!--end-->
            
            <div class="modal fade text-xs-left" id="myModalProd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                
                <div class="modal-dialog modal-dialog-centered" role="document" id="modal-lgs">
                    <div class="modal-content">
                        <div class="fetched-data"></div>
                        <!--Footer-->
                        <div class="modal-footer bg-success text-white justify-content-center">
                            <span class="mr-4" id="title-mod">Hitung</span>
                            <a target="_blank" href="https://www.facebook.com/kalkulatorcetak" rel="nofollow" type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
                            <!--Twitter-->
                            <a target="_blank" href="https://twitter.com/kalkulatorcetak" rel="nofollow" type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
                            <!--Instagram-->
                            <a target="_blank" href="https://instagram.com/kalkulator_cetak" rel="nofollow" type="button" class="btn-floating btn-sm btn-ig"><i class="fab fa-instagram"></i></a>
                            <a href="https://youtube.com/channel/UCex9iLaKPyuQDhHCC4GEJhw" target="_blank" type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-youtube"></i></a>
                            <!--Google +-->
                            <button type="button" class="btn btn-warning btn-rounded btn-sm ml-4" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal fade" id="VideoDemo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="fetched-video"></div>
                    </div>
                </div>
            </div>
            <div class="se-pre-con"></div>
            <div class="go-top"><p class="go-top-text"></p></div>
            <footer class="footer">
                <div class="container">
                    <div class="row row-grid align-items-center mb-2">
                        <div class="col-lg-6">
                            <h3 class="text-primary font-weight-light mb-2">Terima kasih telah berkunjung</h3>
                            <h4 class="mb-0 font-weight-light">Mari terhubung dengan salah satu platform berikut.</h4>
                        </div>
                        <div class="col-lg-6 text-lg-center btn-wrapper">
                            <button target="_blank" href="https://twitter.com/kalkulatorcetak" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
                                <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
                            </button>
                            <button target="_blank" href="https://www.facebook.com/kalkulatorcetak" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
                                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                            </button>
                            <button target="_blank" href="https://www.instagram.com/kalkulator_cetak" rel="nofollow" class="btn-icon-only rounded-circle btn btn-instagram" data-toggle="tooltip" data-original-title="Like us">
                                <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
                            </button>
                            <button target="_blank" href="https://youtube.com/channel/UCex9iLaKPyuQDhHCC4GEJhw" rel="nofollow" class="btn btn-icon-only btn-youtube rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
                                <span class="btn-inner--icon"><i class="fa fa-youtube-play"></i></span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-md-between">
                        <div class="col-md-12">
                            <div class="copyright">
                                <strong><a href="#" target="_blank">kalkulatorcetak.com</a></strong>
                                <?php $copyYear = 2014;
                                    $curYear = date('Y');
                                echo '&#169;&#160;' . $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : ''); ?> all rights reserved
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="<?= $base; ?>/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= $base; ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="<?= $base; ?>/assets/js/plugins/bootstrap-switch.js"></script>
        <script src="<?= $base; ?>/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
        <script src="<?= $base; ?>/assets/js/plugins/moment.min.js"></script>
        <script src="<?= $base; ?>/assets/js/antrian_ajax.js"></script>
        <script src="<?= $base; ?>/assets/js/app.js"></script>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-JHSNYN90L8"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'G-JHSNYN90L8');
            $('.list_content').jscroll({
                autoTrigger: true,
                loadingHtml: '<div class="loader"><img alt="" src="/images/ajax-loader.gif" /></div>',
                nextSelector: 'a.btn-lmore:last',
            });
            
            
        </script>
    </body>
    
</html>