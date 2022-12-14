<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/veterinario.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/maicons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="../assets/css/theme.css">
    <!-- CSS only -->



    <title>La Parcela </title>

    <style>
        .banner-image {
            background-image: url('img/fon.jpg');
            background-size: cover;
        }
    </style>

</head>
</head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/laparcela/vistas/login.html" ?>
    <header class="header">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
            <div class="container">
                <img src="img/veterinario.png" width="45" height="45" alt="">
                <a class="navbar-brand" href="nosotros.php"> <SPAn class="h4" style="color: #2874A6;"> La </SPAn> Parcela</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="nosotros.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo $url; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                </svg></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    </header>

    <section>
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center ">
                <h1 class="text-center text-white">¡Bienvenido a<span style="color: #2874A6;"> La</span>-Parcela!</h1>
                <p class="text-white">Nos alegra que estés aquí, En nuestra veterinaria<span style="color: #2874A6;">La</span> -Parcela!. <br> Nos importa la salud de tus consentidos. ¡Te puedes comunicar con nosotros! </p>
            </div>
        </div>
    </section>
    <div class="container">
        <br />
    </div>



    <!-- nuestros doctores -->

    <div class="">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="index.html"><strong>Nuestros Veterinarios</strong> </a></li>

                    </ol>
                </nav>

            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="row">

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Stein Albert</p>
                                    <span class="text-sm text-grey">Cardiology</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_2.jpg" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Alexa Melvin</p>
                                    <span class="text-sm text-grey">Dental</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                                    <span class="text-sm text-grey">General Health</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Stein Albert</p>
                                    <span class="text-sm text-grey">Cardiology</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_2.jpg" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Alexa Melvin</p>
                                    <span class="text-sm text-grey">Dental</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                                    <span class="text-sm text-grey">General Health</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->


    <!-- fin de nuestros doctores -->




    <section>
        <article class="mt-5">

            <div class="container">

                <h2 class="text-center">¡Escríbenos, será un <span style="color: #2874A6;">placer hablar contigo!</span></h2>
                <div class="row mt-5">
                    <div class="col-md-8 d-flex align-self-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5573.86997709871!2d-75.44216963008986!3d8.94251506416937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e59622cee2aae05%3A0x63902ee6e4b81322!2sconsultorio%20veterinario%20la%20parcela!5e0!3m2!1ses!2sco!4v1670606562661!5m2!1ses!2sco" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                    <div class="col-md-4">
                        <form class="vg-contact-form">
                            <div class="form-row">
                                <div class="col-12 mt-3 wow fadeInUp">
                                    <input class="form-control" type="text" name="Name" placeholder="Nombre">
                                </div>

                                <div class="row wow mt-3 fadeInUp">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Correo Electrónico">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Asunto">
                                    </div>

                                </div>
                                <div class="col-12 mt-3 wow fadeInUp">
                                    <textarea class="form-control" name="Message" rows="6" placeholder="Escriba aquí el mensaje.."></textarea>
                                </div>
                                <button type="submit" style="background-color:#2874A6 ;" class="btn  btn-dark mt-3 wow fadeInUp ml-1">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </article>
    </section>

    <footer class="container-fluid mt-5">
        <div class="row p-5 pb-2 bg-dark text-light">

            <div class="col-xs-12 col-md-6 col-lg-3 pt-5 mt-5">
                <img src="img/veterinario.png" width="45" height="45" alt="">
                <a class="navbar-brand text-light href=" index.html"> <SPAn class="h4" style="color: #2874A6;">La </SPAn>Parcela</a>


            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <p class="h5">PRODUCTOS</p>
                <div class="mb-2">
                    <a class="text-secondary text-decoration-none" href="#">lorem1</a>
                </div>
                <div class="mb-2">
                    <a class="text-secondary text-decoration-none" href="#">lorem2</a>
                </div>
                <div class="mb-2">
                    <a class="text-secondary text-decoration-none" href="#">lorem3</a>
                </div>
                <div class="mb-2">
                    <a class="text-secondary text-decoration-none" href="#">lorem4</a>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <p class="h5">LINKS</p>
                <div class="mb-2">
                    <a class="text-secondary text-decoration-none" href="#">Terminos y Condiciones</a>
                </div>
                <div class="mb-2">
                    <a class="text-secondary text-decoration-none" href="#">Privacy policy</a>
                </div>

            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <p class="h5">CONTACTO</p>
                <div class="mb-2">
                    <img src="img/instagram.png" width="30" height="30" alt="">
                    <a class="text-secondary text-decoration-none" href="#">Instagram</a>
                </div>
                <div class="mb-2">
                    <img src="img/facebook.png" width="30" height="30" alt="">
                    <a class="text-secondary text-decoration-none" href="#">Facebook</a>
                </div>
                <div class="mb-2">
                    <img src="img/youtube.png" width="30" height="30" alt="">
                    <a class="text-secondary text-decoration-none" href="#">Youtube</a>
                </div>
                <div class="mb-2">
                    <img src="img/twitter.png" width="30" height="30" alt="">
                    <a class="text-secondary text-decoration-none" href="#">Twitter</a>
                </div>
            </div>

            <div class="col-xs-12 pt-5">
                <p class="text-light text-center pt-5">Copyright - All rights reserved © 2022 </p>

            </div>

        </div>

    </footer>




    <!-- solo script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>
    <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
        });
    </script>
    <!-- fin de script -->



</body>


</html>