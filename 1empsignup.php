<?php
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        include "connection_her.php";

        $insert = $db -> prepare("INSERT INTO her(`firstname`, `lastname`, `position`, `company`, `sector`, `employees`, `email`, `all_password`, `who`) " . "VALUES(:firstname,:lastname,:position,:company,:sector,:employees,:email,:all_password,1)");

    
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Ömer Sıddık ACAR">
    <meta name="keywords"
        content="All in one 4 HER - Fast-track Integration of Highly Educated Refugees (HER) into Labour Market">
    <title>All-in-one-4-HER</title>
    <link rel="stylesheet" href="aboutus-style.css">
    <link rel="stylesheet" href="aboutus-style-mobile.css">
    <link rel="stylesheet" href="sign-up-form-page-her-style.css">
    <script src="https://kit.fontawesome.com/8a6fceae64.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">

</head>

<body>

    <button onclick="topFunction()" id="top" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <div class="container">
        <div class="navbar">
            <a href="index.html" id="logoA"><img src="image/logo1.png" alt="All-in-one4Her-logo" class="logo"></a>
        </div>
        <h2>Sign Up Form for Employers</h2>

        <div class="formContainer">
            <form action="empsignup.php" method="POST">
                <div class="box1">
                    <div class="label">
                        <label for="firstname">First Name</label>
                    </div>
                    <input type="text" id="firstname" name="firstname" required>
                    <div class="label">
                        <label for="lastname">Last Name</label></div>
                    <input type="text" id="lastname" name="lastname" required>
                    <div class="label">
                        <label for="position">Position</label></div>
                    <input type="text" id="position" name="position" required>
                    <div class="label">
                        <label for="company">Name of the Company</label></div>
                    <input type="text" id="company" name="company" required>
                    <div class="label">
                        <label for="sector">Sector</label></div>
                    <input type="text" id="sector" name="sector" required>
                </div>
                <div class="box2">
                    <div class="label">
                        <label for="employees">Number of Employees</label></div>
                    <input type="number" id="employees" name="employees" min="1" required />
                    <div class="label">
                        <label for="subject">E-mail</label></div>
                    <input type="email" id="email" name="email" required>
                    <div class="label">
                        <label for="all_password"> Create a Password</label>
                    </div>
                    <input type="password" id="all_password" name="all_password" required>
                    <div class="label">
                        <label for="confirmpassword"> Confirm your Password</label>
                    </div>
                    <input type="password" id="confirmpassword" name="confirmpassword" required>
                    <div class="label">
                    <input style="zoom:1.5;" type="checkbox" name="terms_of_use" value="" class="termsofuse" required> I agree with <a href="terms_of_use.html">the terms and conditions, privacy and GDPR policies.</a>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“Your personal information will not be shared with any third party”
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div id="footer">
        <h2>Contact</h2>
        <div class="contactcontent">
            <a href="https://www.linkedin.com/groups/8765305/" target="_blank" rel="" title="linkedin"><i
                    class="fab fa-linkedin"></i></a>
            <a href="https://www.facebook.com/Allinone4HER/" target="_blank" rel="facebook" title="facebook"><i
                    class="fab fa-facebook-square"></i></a>
            <p>Email: <span class="info"><a class="mailto"
                        href="mailto:info@all-in-one4her.eu">info@all-in-one4her.eu</a></span></p>
            <p>Address: <span class="info"> Beyond the Horizon ISSG <br>
                    <span id="vinci"> Da Vincilaan 1, 1932 Zaventem Belgium</span></span>
            </p>
            <p>Phone: <span class="info"> +32 (0) 2 801 13 57</span></p>
        </div>
    </div>
    <div class="footerPartner">
        <a href="http://www.behorizon.org" target="_blank" rel=""><img src="image/beyond.png"
                alt="All-in-one4Her-partners"></a>
        <a href="http://www.ucll.be" target="_blank" rel=""><img src="image/ucll.png"
                alt="All-in-one4Her-partnersv"></a>
        <img src="image/papilio.png" alt="All-in-one4Her-partners">
        <a href="https://hiva.kuleuven.be/en" target="_blank" rel=""><img src="image/ku-d.png"
                alt="All-in-one4Her-partners"></a>
        <a href="http://www.economischhuis.be/nl" target="_blank" rel=""><img src="image/eco.png"
                alt="All-in-one4Her-partners"></a>
        <a href="http://www.lamk.fi/fi" target="_blank" rel=""><img src="image/lamk.png"
                alt="All-in-one4Her-partners"></a>
        <a href="http://www.tuas.fi/en/" target="_blank" rel=""><img src="image/turku.png"
                alt="All-in-one4Her-partners"></a>
    </div>
    <div id="footer-banner">
        <img src="image/footer-banner.png" alt="All-in-one4Her-cooperation">
    </div>



    <script>
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("top").style.display = "block";
            } else {
                document.getElementById("top").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</body>


</html>