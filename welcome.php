<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome!</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./images/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="./images/favicon/favicon-16x16.png" sizes="16x16" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <style type="text/css">
       
    </style>
</head>

<body>

    <header>

        <!-- NAVBAR STARTS-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="box-shadow: none; font-weight: 600;">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="./home.html">
                    <img src="images/logos/logo.png" height="55" alt="all-in-one-4-her logo">
                </a>

               

            </div>

            </div>

        </nav>
        <!-- NAVBAR ENDS-->

    </header>
    <main>
            <div class="container my-5 py-5">

 
                    <!--Section: Content-->
                    <section class="px-md-5 mx-md-5 text-center white-text grey p-5 z-depth-1"
                      style="background-image: url(./images/gradient-register.jpg);">
                
                      <!--Grid row-->
                      <div class="row d-flex justify-content-center">
                
                        <!--Grid column-->
                        <div class="col-xl-8 col-md-10">
                
                            <i class="fas fa-gem fa-2x mb-4"></i>
                
                            <h3 class="font-weight-bold"><?php echo "You are done, " . $_SESSION['firstname'] ."!";?></h3>
                      
                            <p>You have completed your registration successfully!

                                    Welcome to All in one 4 HER PLatform.</p>
                      
                            <a href="./home.html" class="btn btn-outline-white btn-md waves-effect" role="button"> Go to Homepage to sign in</a>
                
                        </div>
                        <!--Grid column-->
                
                      </div>
                      <!--Grid row-->
                
                    </section>
                    <!--Section: Content-->
                
                
                  </div>

    </main>

    <!-- FOOTER STARTS-->
    <footer class="page-footer text-center font-small mt-1 wow fadeIn">

        <!-- LOGOS STARTS-->
        <div class="border-top border-info" style="background-color: white;">

            <!--Grid row-->
            <div class="row justify-content-center">

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/beyond-horizan.png" class="img-fluid" alt="">
                    <a href="http://www.behorizon.org/">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/oostande.png" class="img-fluid" alt="">
                    <a href="https://www.economischhuis.be/nl">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/ucll.png" class="img-fluid" alt="">
                    <a href="https://www.ucll.be/">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/papilia.png" class="img-fluid" alt="">
                    <a href="">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/turku.png" class="img-fluid" alt="">
                    <a href="http://www.tuas.fi/en/">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/lamk.png" class="img-fluid" alt="">
                    <a href="https://www.lamk.fi/fi">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

                <!--Image-->
                <div class="view overlay">
                    <img src="images/logos/hiva.png" class="img-fluid" alt="">
                    <a href="https://hiva.kuleuven.be/en">
                        <div class="mask rgba-blue-light"></div>
                    </a>
                </div>

            </div>
            <!--row ends-->

        </div>
        <!-- LOGOS ENDS-->

        <!-- FOOTER LINKS STARTS-->
        <div class="container text-center text-md-left mt-5 text-dark">

            <!-- Grid row -->
            <div class="row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-dark">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">All-in-one 4 HER</h6>
                    <hr class="primary-color accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Fast-track Integration of Highly Educated Refugees(HER) into Labour market</p>

                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Social</h6>
                    <hr class="primary-color accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <ul class="list-unstyled text-md-left">
                        <li class="list-item">
                            <a class="btn-floating btn-fb" href="https://www.facebook.com/Allinone4HER/">
                                <i class="fab fa-facebook-f fa-2x text-dark"> </i>
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="btn-floating btn-fb" href="https://www.linkedin.com/groups/8765305/">
                                <i class="fab fa-linkedin-in fa-2x text-dark"> </i>
                            </a>
                        </li>
                </div>
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="primary-color accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-1"></i> Beyond the Horizon ISSG
                        <br>Da Vincilaan 1, 1932 Zaventem Belgium</p>
                    <p><i class="fas fa-envelope mr-2"></i><a class="mailto text-dark" href="mailto:info@all-in-one4her.eu">info@all-in-one4her.eu</a></p>
                    <p><i class="fas fa-phone mr-1"></i>+32 (0) 2 801 13 58</p>

                </div>
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <div id="map-container-google-11" class="z-depth-1-half map-container-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2516.941608790304!2d4.457593515387565!3d50.88779106363689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3dd019b0d41db%3A0xd4d9a3ad89158c74!2sBeyond%20the%20Horizon%20ISSG!5e0!3m2!1sen!2sbe!4v1572369241682!5m2!1sen!2sbe" width="450" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                    </div>

                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                </div>

            </div>
            <!-- Grid row -->

        </div>
        <!-- FOOTER LINKS ENDS-->

        <!-- EST STARTS-->
        <div class="footer-copyright py-3 white">
            <img src="images/esf-web-banner.jpg" width="70%">
        </div>
        <!-- EST STARTS-->

    </footer>
    <!-- FOOTER ENDS-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
    </script>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

</body>

</html>