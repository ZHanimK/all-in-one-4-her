<?php
  session_start();
  $_SESSION['firstname'] = $_POST['firstname'];
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        include "connection_her.php";

        $insert = $db -> prepare("INSERT INTO employer (`firstname`, `lastname`, `position`, `company`, `sector`, `employees`, `email`, `all_password`, `who`) " . "VALUES(:firstname,:lastname,:position,:company,:sector,:employees,:email,:all_password,2)");
    
        if ($_POST['all_password'] === $_POST['confirmpassword']) {
        
        $insert->bindValue(':firstname', $_POST['firstname']);
        $insert->bindValue(':lastname', $_POST['lastname']);
        $insert->bindValue(':position', $_POST['position']);
        $insert->bindValue(':company', $_POST['company']);
        $insert->bindValue(':sector', $_POST['sector']);
        $insert->bindValue(':employees', $_POST['employees']);
        $insert->bindValue(':email', $_POST['email']);
        $insert->bindValue(':all_password', $_POST['all_password']);

    
            if ($insert->execute()) {
                
                $email = $_POST['email'];
                $lastname = $_POST['lastname'];
                $Lastname = ucfirst($lastname);
                $all_password = $_POST['all_password'];

                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
            
                $to = "$email";
                $subject = "Registration completed to All-in-one4HER platform & project";
                $message = "
                Dear Mr/Ms " . $Lastname . ",
    
                Thank you for registering to All-in-one4HER project and platform. Your password is: " . $all_password . ".
                
                We are only at the beginning phase of our project and just started to develop our platform aiming to facilitate your integration to the labour market in Flanders, Belgium. The other pages in our online platform will be activated later.
                
                You will receive automatic updates about our platform and be informed about our project activities, opportunities (career coaching, mentoring, etc.) by e-mail. You can also follow us on social media to get timely updates.
                
                If you have any questions, please don’t hesitate to contact us either by replying to this e-mail or by phone.
                
                Kind regards,
                
                All-in-one4HER Team 
                
            __________________________________________
    
                Geachte heer / mevrouw " . $Lastname . ",
                
                Bedankt voor uw aanmelding voor het All-in-one4HER-project en -platform. Je wachtwoord is: " . $all_password . ".
    
                We zijn nog maar in de beginfase van ons project en zijn net begonnen ons platform te ontwikkelen om uw integratie op de arbeidsmarkt in Vlaanderen, België, te vergemakkelijken. De andere pagina's op ons online platform worden later geactiveerd.
                
                U zal automatische updates over ons platform ontvangen en per e-mail op de hoogte gehouden worden van onze projectactiviteiten en kansen (loopbaancoaching, mentoring, enz.). U kunt ons ook volgen op sociale media om tijdig updates te ontvangen.
                
                Als u vragen heeft, aarzel niet a.u.b. om ons te contacteren door e-mail/telefoon.
                
                Met vriendelijke groeten,
                
                All-in-one4HER Team
                
                @: info@all-in-one4her.eu
                www.all-in-one4her.eu
                Phone: +32 (0) 2 801 13 58
                Address: Beyond the Horizon ISSG 
                Da Vincilaan 1, 1932 Zaventem Belgium
                https://www.linkedin.com/groups/8765305/ 
                https://www.facebook.com/Allinone4HER/ 
                ";
                $headers = "From: All-in-one4HER <info@all-in-one4her.eu>" . "\r\n";
            
                header("location:welcome.php");
                mail($to,$subject,$message,$headers);
    
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $position = $_POST['position'];
                $company = $_POST['company'];
                $sector = $_POST['sector'];
                $employees = $_POST['employees'];
                $email = $_POST['email'];
    
                $to_2 = "info@all-in-one4her.eu";
                $from_2 = "All-in-one4HER <info@all-in-one4her.eu>";
                $subject_2 = "A new EMPLOYER is registered";
                $message_2 = " 
                
                first name: " . $firstname . "
    
                last name: " . $lastname . "
    
                position: " . $position . "
    
                name of company: " . $company . "
    
                sector: " . $sector . "
    
                number of employees: " . $employees . "
    
                email: " . $email . "
    
                ";
                $headers_2 = 'From: ' . $from_2 . "\r\n";
                mail($to_2, $subject_2, $message_2, $headers_2);
            }
            else {
                echo "<p align='left'><font color=red  size='4pt'>*This Email is already in use!</font></p>";
                #print_r($insert->errorInfo());
            }
    }else {
        echo "<p align='left'><font color=red  size='4pt'>*Passwords do not match!</font></p>";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign-up as a Employer</title>
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
        html,
        body {
            height: 100%;
        }
        
        @media (max-width: 740px) {
            html,
            body {
                height: 100vh;
            }
        }
        
        #navbar1 {
            font-size: 15px;
        }
        
        #navbar2 {
            font-size: 15px;
        }
        
        h1 {
            letter-spacing: 8px;
        }
        
        h5 {
            letter-spacing: 3px;
        }
        
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header {
                height: 100vh;
            }
        }
        
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #929FBA !important;
            }
        }
        
        .md-avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
        }
        
        .md-avatar.size-1 {
            width: 40px;
            height: 40px;
        }
        
        .md-avatar.size-2 {
            width: 70px;
            height: 70px;
        }
        
        .md-avatar.size-3 {
            width: 90px;
            height: 90px;
        }
        
        .md-avatar.size-4 {
            width: 110px;
            height: 110px;
        }
        
        .rounded-circle {
            border-color: white;
            border-style: solid;
            border-width: thick;
        }
        
        .listim {
            font-size: 13px;
        }
        
        .fa-check {
            font-size: 12px;
        }
        
        .btn-rounded {
            border-radius: 10em;
        }
        .md-form.md-outline{
            margin-top: 0px;
        }

        
        .md-form.md-outline label {
            color: #8172F1;
        }
        
        .md-form.md-outline input[type=text]:focus:not([readonly])+label {
            color: #8172F1;
        }
        .md-form.md-outline input[type=number]:focus:not([readonly])+label {
            color: #8172F1;
            border-color: #8172F1;
        }
        .md-form.md-outline input[type=number]:focus([readonly])+label {
            color: #8172F1;
            border-color: #8172F1;
        }
        .md-form.md-outline input[type=number]:focus:not([readonly]) {
            border-color: #8172F1;
            box-shadow: inset 0 0 0 1px #8172F1;
        }
        
        .md-form.md-outline input[type=text]:focus:not([readonly]) {
            border-color: #8172F1;
            box-shadow: inset 0 0 0 1px #8172F1;
        }
        
        .custom-select{
            color:#8172F1 ;
            font-weight: 300;
        }
        .custom-select:focus {
        border-color: #8172F1;
        outline: 0;
        box-shadow: 0 0 0 0.01rem rgb(129, 114, 241);
        }
        
        .md-form.md-outline input[type=email]:focus:not([readonly])+label {
            color: #8172F1;
            border-color: #8172F1;
        }
        .md-form.md-outline input[type=email]:focus:not([readonly]){
            color: #8172F1;
            border-color: #8172F1;
            box-shadow: inset 0 0 0 1px #8172F1;
            
        }
        .md-form.md-outline input[type=password]:focus:not([readonly])+label {
            color: #8172F1;
            border-color: #8172F1;
        }
        .md-form.md-outline input[type=password]:focus:not([readonly]){
            color: #8172F1;
            border-color: #8172F1;
            box-shadow: inset 0 0 0 1px #8172F1;
            
        }
       
            
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

                <!-- Right -->
                <div class="navbar-nav">

                    <div class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#modalLoginForm">Login</a>
                    </div>

                    <div class="ml-2" style="margin-right: -100px;">
                        <a href="./under_construction.html"><img src="./images/nd.png"></a>
                    </div>
                </div>

            </div>

            </div>

        </nav>
        <!-- NAVBAR ENDS-->

    </header>
    <main>
        <!-- Purple Header -->
        <div class="edge-header purple-gradient"></div>

        <!-- Main Container -->
        <div class="container free-bird">
            <div class="row">
                <div class="col-md-8 col-lg-10 mx-auto float-none white z-depth-1 py-2 px-2 mb-4">

                    <!--Title of the page -->
                    <div class="card-body">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="h2-responsive"><strong>Sign-up as a Employer</strong></h2>
                            </div>
                            <img class="d-flex mr-3" src="./images/icons/employer.png" alt="Her Icon">
                        </div>

                        <form action="empsignup.php" method="POST">

                            <div class="form-row">
                                <div class="col">
                                    <!-- First name -->
                                    <div class="md-form md-outline">
                                        <input type="text" id="firstname" name="firstname" class="form-control" required>
                                        <label for="firstname">First Name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Last name -->
                                    <div class="md-form md-outline">
                                        <input type="text" id="lastname" name="lastname" class="form-control" required>
                                        <label for="lastname">Last Name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                    <div class="col">
                                        <!-- First name -->
                                        <div class="md-form md-outline">
                                            <input type="text" id="position" name="position" class="form-control" required>
                                            <label for="position">Position</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- Last name -->
                                        <div class="md-form md-outline">
                                            <input type="text" id="company" name="company" class="form-control" required>
                                            <label for="company">Name of the Company</label>
                                        </div>
                                    </div>
    
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                            <!-- First name -->
                                            <div class="md-form md-outline">
                                                <input type="text" id="sector" name="sector" class="form-control" required>
                                                <label for="sector">Sector</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- Last name -->
                                            <div class="md-form md-outline">
                                                <input type="number" id="employees" name="employees" class="form-control" required>
                                                <label for="employees">Number of Employees</label>
                                            </div>
                                        </div>
        
                                    </div>
                            


                            <div class="form-row">
                                <div class="col">
                                    <div class="md-form md-outline">

                                        <input type="email" id="email" name="email" required class="form-control validate">
                                        <label for="email" data-error="wrong" data-success="right">Your email</label>
                                    </div>
                                </div>

                                <div class="col">

                                    <div class="md-form md-outline">
                                        <input type="password" minlength="6" id="all_password" name="all_password" required class="form-control">
                                        <label for="all_password">Create a Password (min 6 characters)</label>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="md-form md-outline">
                                        <input type="password" id="confirmpassword" name="confirmpassword" required class="form-control">
                                        <label for="confirmpassword">Confirm your Password</label>
                                    </div>
                                </div>

                            </div>

                            <div>
                                <input style="zoom:1.5;" type="checkbox" name="terms_of_use" value="" class="termsofuse" required> I agree with <a href="terms_of_use.html">the terms and conditions, privacy and GDPR policies.</a> “Your personal information will not be shared with any third party”

                            </div>

                            <div class="text-xs-left">
                                <input class="btn btn-secondary" type="submit" name="submit" value="Submit">

                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <!--Naked Form-->

        </div>
        
        <!-- /.Main Container -->

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