<?php
  session_start();
  $_SESSION['firstname'] = $_POST['firstname'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        include "connection_her.php";

        $insert = $db -> prepare("INSERT INTO her(`firstname`, `lastname`, `age`, `gender`, `country`, `legalStatus`, `education`, `title`, `degreeCountry`, `experience`, `email`, `all_password`, `who`) " . "VALUES(:firstname,:lastname,:age,:gender,:country,:legalStatus,:education,:title,:degreeCountry,:experience,:email,:all_password,1)");
    
        if ($_POST['all_password'] === $_POST['confirmpassword'] ) {
    
            $insert->bindValue(':firstname', $_POST['firstname']);
            $insert->bindValue(':lastname', $_POST['lastname']);
            $insert->bindValue(':age', $_POST['age']);
            $insert->bindValue(':gender', $_POST['gender']);
            $insert->bindValue(':country', $_POST['country']);
            $insert->bindValue(':legalStatus', $_POST['legalStatus']);
            $insert->bindValue(':education', $_POST['education']);
            $insert->bindValue(':title', $_POST['title']);
            $insert->bindValue(':degreeCountry', $_POST['degreeCountry']);
            $insert->bindValue(':experience', $_POST['experience']);
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
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $legalStatus = $_POST['legalStatus'];
            $country = $_POST['country'];
            $education = $_POST['education'];
            $title = $_POST['title'];
            $degreeCountry = $_POST['degreeCountry'];
            $experience = $_POST['experience'];
            $email = $_POST['email'];

            $to_2 = "info@all-in-one4her.eu";
            $from_2 = "All-in-one4HER <info@all-in-one4her.eu>";
            $subject_2 = "A new HER is registered";
            $message_2 = " 
            
            first name: " . $firstname . "

            last name: " . $lastname . "

            age: " . $age . "

            gender: " . $gender . "

            legal status: " . $legalStatus . "

            country of origin: " . $country . "

            level of education: " . $education . "

            field of study: " . $title . "

            Country of highest degree: " . $degreeCountry . "

            working experience: " . $experience . "

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
    <title>Sign-up as a HER</title>
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
            color: #EB6160;
        }
        
        .md-form.md-outline input[type=text]:focus:not([readonly])+label {
            color: #EB6160;
        }
        .md-form.md-outline input[type=number]:focus:not([readonly])+label {
            color: #EB6160;
            border-color: #EB6160;
        }
        .md-form.md-outline input[type=number]:focus([readonly])+label {
            color: #EB6160;
            border-color: #EB6160;
        }
        .md-form.md-outline input[type=number]:focus:not([readonly]) {
            border-color: #EB6160;
            box-shadow: inset 0 0 0 1px #EB6160;
        }
        
        .md-form.md-outline input[type=text]:focus:not([readonly]) {
            border-color: #EB6160;
            box-shadow: inset 0 0 0 1px #EB6160;
        }
        
        .custom-select{
            color:#EB6160 ;
            font-weight: 300;
        }
        .custom-select:focus {
        border-color: #EB6160;
        outline: 0;
        box-shadow: 0 0 0 0.01rem rgb(237, 121, 99);
        }
        
        .md-form.md-outline input[type=email]:focus:not([readonly])+label {
            color: #EB6160;
            border-color: #EB6160;
        }
        .md-form.md-outline input[type=email]:focus:not([readonly]){
            color: #EB6160;
            border-color: #EB6160;
            box-shadow: inset 0 0 0 1px #EB6160;
            
        }
        .md-form.md-outline input[type=password]:focus:not([readonly])+label {
            color: #EB6160;
            border-color: #EB6160;
        }
        .md-form.md-outline input[type=password]:focus:not([readonly]){
            color: #EB6160;
            border-color: #EB6160;
            box-shadow: inset 0 0 0 1px #EB6160;
            
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
        <div class="edge-header peach-gradient"></div>

        <!-- Main Container -->
        <div class="container free-bird">
            <div class="row">
                <div class="col-md-8 col-lg-10 mx-auto float-none white z-depth-1 py-2 px-2 mb-4">

                    <!--Title of the page -->
                    <div class="card-body">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="h2-responsive"><strong>Sign-up as a HER</strong></h2>
                            </div>
                            <img class="d-flex mr-3" src="./images/icons/HER.png" alt="Her Icon">
                        </div>

                        <form action="hersignup.php" method="POST">

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
                                <div class="col">
                                    <select class="browser-default custom-select" id="status" name="status" required>
                                        <option name="" value="" selected disabled="disabled">Status</option>
                                        <option value="fulltime">Working (Fulltime)</option>
                                        <option value="parttime">Working (Parttime)</option>
                                        <option value="unemployed">Unemployed</option>
                                        <option value="selfemployed">Selfemployed</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-row mb-4">

                                <div class="col">
                                    <!-- age -->
                                    <select class="browser-default custom-select" id="birth" name="birth" required>
                                        <option name="" value="" selected disabled="disabled">Year of birth</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="browser-default custom-select" id="gender" name="gender" required>
                                        <option name="" value="" selected disabled="disabled">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                        <option value="no-comment">I do not want to mention</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="browser-default custom-select" id="country" name="country" required>
                                        <option name="" value="" selected disabled="disabled">Country of Origin</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of
                                        </option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                                        </option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Yugoslavia">Yugoslavia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="browser-default custom-select" id="legalStatus" name="legalStatus" required>
                                        <option name="" value="" selected disabled="disabled">Legal Status</option>
                                        <option value="recognized-refugee">Recognised refugee</option>
                                        <option value="subsidary-protection">Subsidiary protection</option>
                                        <option value="asylum-seeker">Asylum seeker</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row mb-4">

                                <div class="col">
                                    <select class="browser-default custom-select" id="degreeCountry" name="degreeCountry" required>
                                        <option name="" value="" selected disabled="disabled">Country of Highest Degree</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of
                                        </option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                                        </option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Yugoslavia">Yugoslavia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="browser-default custom-select" id="town" name="town" required>
                                        <option name="" value="" selected disabled="disabled">Town/ City</option>
                                        <option value="Anderlecht">Anderlecht</option>
                                        <option value="Oudergem">Oudergem</option>
                                        <option value="Sint-Agatha-Berchem">Sint-Agatha-Berchem</option>
                                        <option value="Stad Brussel">Stad Brussel</option>
                                        <option value="Etterbeek">Etterbeek</option>
                                        <option value="Evere">Evere</option>
                                        <option value="Vorst">Vorst</option>
                                        <option value="Ganshoren">Ganshoren</option>
                                        <option value="Elsene">Elsene</option>
                                        <option value="Jette">Jette</option>
                                        <option value="Koekelberg">Koekelberg</option>
                                        <option value="Sint-Jans-Molenbeek">Sint-Jans-Molenbeek</option>
                                        <option value="Sint-Gillis">Sint-Gillis</option>
                                        <option value="Sint-Joost-ten-Node">Sint-Joost-ten-Node</option>
                                        <option value="Schaarbeek">Schaarbeek</option>
                                        <option value="Ukkel">Ukkel</option>
                                        <option value="Watermaal-Bosvoorde">Watermaal-Bosvoorde</option>
                                        <option value="Sint-Lambrechts-Woluwe">Sint-Lambrechts-Woluwe</option>
                                        <option value="Sint-Pieters-Woluwe">Sint-Pieters-Woluwe</option>
                                        <option value="Aalst">Aalst</option>
                                        <option value="Aarschot">Aarschot</option>
                                        <option value="Antwerp">Antwerp</option>
                                        <option value="Beringen">Beringen</option>
                                        <option value="Bilzen">Bilzen</option>
                                        <option value="Blankenberge">Blankenberge</option>
                                        <option value="Borgloon">Borgloon</option>
                                        <option value="Bree">Bree</option>
                                        <option value="Bruges">Bruges</option>
                                        <option value="Damme">Damme</option>
                                        <option value="Deinze">Deinze</option>
                                        <option value="Dendermonde">Dendermonde</option>
                                        <option value="Diest">Diest</option>
                                        <option value="Diksmuide">Diksmuide</option>
                                        <option value="Dilsen-Stokkem">Dilsen-Stokkem</option>
                                        <option value="Eeklo">Eeklo</option>
                                        <option value="Geel">Geel</option>
                                        <option value="Genk">Genk</option>
                                        <option value="Ghent">Ghent</option>
                                        <option value="Geraardsbergen">Geraardsbergen</option>
                                        <option value="Gistel">Gistel</option>
                                        <option value="Halen">Halen</option>
                                        <option value="Halle">Halle</option>
                                        <option value="Hamont-Achel">Hamont-Achel</option>
                                        <option value="Harelbeke">Harelbeke</option>
                                        <option value="Hasselt">Hasselt</option>
                                        <option value="Herentals">Herentals</option>
                                        <option value="Herk-de-Stad">Herk-de-Stad</option>
                                        <option value="Hoogstraten">Hoogstraten</option>
                                        <option value="Ypres">Ypres</option>
                                        <option value="Izegem">Izegem</option>
                                        <option value="Kortrijk">Kortrijk</option>
                                        <option value="Landen">Landen</option>
                                        <option value="Leuven">Leuven</option>
                                        <option value="Lier">Lier</option>
                                        <option value="Lo-Reninge">Lo-Reninge</option>
                                        <option value="Lokeren">Lokeren</option>
                                        <option value="Lommel">Lommel</option>
                                        <option value="Maaseik">Maaseik</option>
                                        <option value="Mechelen">Mechelen</option>
                                        <option value="Menen">Menen</option>
                                        <option value="Mesen">Mesen</option>
                                        <option value="Mortsel">Mortsel</option>
                                        <option value="Nieuwpoort">Nieuwpoort</option>
                                        <option value="Ninove">Ninove</option>
                                        <option value="Ostend">Ostend</option>
                                        <option value="Oudenaarde">Oudenaarde</option>
                                        <option value="Oudenburg">Oudenburg</option>
                                        <option value="Peer">Peer</option>
                                        <option value="Poperinge">Poperinge</option>
                                        <option value="Roeselare">Roeselare</option>
                                        <option value="Ronse">Ronse</option>
                                        <option value="Scherpenheuvel-Zichem">Scherpenheuvel-Zichem</option>
                                        <option value="Sint-Niklaas">Sint-Niklaas</option>
                                        <option value="Sint-Truiden">Sint-Truiden</option>
                                        <option value="Tielt">Tielt</option>
                                        <option value="Tienen">Tienen</option>
                                        <option value="Tongeren">Tongeren</option>
                                        <option value="Torhout">Torhout</option>
                                        <option value="Turnhout">Turnhout</option>
                                        <option value="Veurne">Veurne</option>
                                        <option value="Vilvoorde">Vilvoorde</option>
                                        <option value="Waregem">Waregem</option>
                                        <option value="Wervik">Wervik</option>
                                        <option value="Zottegem">Zottegem</option>
                                        <option value="Zoutleeuw">Zoutleeuw</option>
                                    </select>
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
                                <input class="btn btn-warning" type="submit" name="submit" value="Submit">

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