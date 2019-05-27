<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sweet Salty</title>
		<link rel="icon" href="view/img/logo.png" type="image/x-icon">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="view/assets/css/iconfont.css">
        <link rel="stylesheet" href="view/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="view/assets/css/jquery.fancybox.css">
        <link rel="stylesheet" href="view/assets/css/bootstrap.css">
        <link rel="stylesheet" href="view/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="view/assets/css/plugins.css" />
        <link rel="stylesheet" href="view/assets/css/style.css">
        <link rel="stylesheet" href="view/assets/css/responsive.css" />
        <script src="view/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <div class="culmn">
            <header id="main_menu" class="header navbar-fixed-top">            
                <div class="main_menu_bg">
                    <div class="container">
                        <div class="row">
                            <div class="nave_menu">
                                <nav class="navbar navbar-default">
                                    <div class="container-fluid">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                    </div>
                                </nav>
                            </div>
                        </div>	
                    </div>
                </div>
            </header> <!--End of header -->
        </div>
        <!--home Section -->
        <section id="home" class="home">
            <div class="home_skew_border">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="main_home_slider text-center">
                                <div class="single_home_slider">
                                    <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                        <h1>SWEET SALTY</h1>
                                        <div class="separator"></div>
                                        <div class="home_btn">
                                            <button value="pt" class="btn btn-default btn-idioma">PORTUGUÊS</button>
                                            <button value="en" class="btn btn-default btn-idioma">ENGLISH</button>
                                        </div>
                                    </div>
                                </div>           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="view/assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="view/assets/js/vendor/bootstrap.min.js"></script>

        <script src="view/assets/js/jquery.magnific-popup.js"></script>
        <script src="view/assets/js/jquery.mixitup.min.js"></script>
        <script src="view/assets/js/jquery.easing.1.3.js"></script>
        <script src="view/assets/js/jquery.masonry.min.js"></script>

        <!--slick slide js -->
        <script src="view/assets/css/slick/slick.js"></script>
        <script src="view/assets/css/slick/slick.min.js"></script>


        <script src="view/assets/js/plugins.js"></script>
        <script src="view/assets/js/main.js"></script>
        <script>
            $(".btn-idioma").click(function() {
                let linguagem = $(this).val();

                $.ajax({
                    url : "controller/escolherIdiomaController.php",
                    method : "POST",
                    data : {
                        linguagem : linguagem
                    }
                }).done(function(n) {
                    window.location = "view/logar.php";
                });
            });
        </script>
    </body>
</html>
