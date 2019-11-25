<?php
  
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
        <h2>Sign Up Form for HERs</h2>

        <div class="formContainer">
            <form action="hersignup.php" method="POST">
                <div class="box1">
                    <div class="label">
                        <label for="firstname">First Name</label>
                    </div>
                    <input type="text" id="firstname" name="firstname" required>
                    <div class="label">
                        <label for="lastname">Last Name</label></div>
                    <input type="text" id="lastname" name="lastname" required>
                    <div class="label">
                        <label for="age">Age</label></div>
                    <input type="number" id="age" name="age" min="20" max="80" required />
                    <div class="label">
                        <label for="gender">Gender</label></div>
                    <select id="gender" name="gender" required>
                        <option name="" value="" selected disabled="disabled">...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <option value="no-comment">I do not want to mention</option>
                    </select>
                    <div class="label">
                        <label for="country">Country of Origin</label></div>
                    <select id="country" name="country" required>
                        <option name="" value="" selected disabled="disabled">...</option>
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
                    <div class="label">
                        <label for="status">Legal Status</label></div>
                    <select id="status" name="legalStatus" required>
                        <option name="" value="" selected disabled="disabled">...</option>
                        <option value="recognized-refugee">Recognised refugee</option>
                        <option value="subsidary-protection">Subsidiary protection</option>
                        <option value="asylum-seeker">Asylum seeker</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="label">
                        <label for="education">Level of Education</label></div>
                    <select id="education" name="education" required>
                        <option name="" value="" selected disabled="disabled">...</option>
                        <option value="Bachelor">Bachelor</option>
                        <option value="Master">Master</option>
                        <option value="PhD">PhD</option>
                    </select>
                </div>
                <div class="box2">
                    
                    <div class="label">
                        <label for="title">Field of Study</label></div>
                    <select id="title" name="title" required>
                        <option name="" value="" selected disabled="disabled">...</option>
                        <option value="Adult Education">Adult Education</option>
                        <option value="African Languages and Cultures">African Languages and Cultures</option>
                        <option value="Agro- and Biotechnology">Agro- and Biotechnology </option>
                        <option value="Arabic and Islamic Studies">Arabic and Islamic Studies</option>
                        <option value="Archaeology">Archaeology </option>
                        <option value="Architectural Engineering">Architectural Engineering</option>
                        <option value="Architecture ">Architecture </option>
                        <option value="Art History">Art History</option>
                        <option value="Art History, Musicology and Theatre Studies">Art History, Musicology and Theatre Studies</option>
                        <option value="Art Studies and Archaeology">Art Studies and Archaeology</option>
                        <option value="Audiovisual Arts">Audiovisual Arts</option>
                        <option value="Audiovisual Techniques: Film, Television and Video">Audiovisual Techniques: Film, Television and Video</option>
                        <option value="Audiovisual Techniques: Photography">Audiovisual Techniques: Photography </option>
                        <option value="Autism Spectrum Disorders: an Orthopedagogical Perspective">Autism Spectrum Disorders: an Orthopedagogical Perspective</option>
                        <option value="Automotive Technology ">Automotive Technology </option>
                        <option value="Aviation Technology">Aviation Technology</option>
                        <option value="Bio-engineering Sciences">Bio-engineering Sciences</option>
                        <option value="Bio-pharmaceutical Sciences">Bio-pharmaceutical Sciences</option>
                        <option value="Biochemical Engineering Technology">Biochemical Engineering Technology</option>
                        <option value="Biochemistry and Biotechnology">Biochemistry and Biotechnology </option>
                        <option value="Bioengineering Technology">Bioengineering Technology</option>
                        <option value="Bioindustrial Sciences">Bioindustrial Sciences</option>
                        <option value="Bioinformatics">Bioinformatics </option>
                        <option value="Biology">Biology </option>
                        <option value="Biomedical Laboratory Technology">Biomedical Laboratory Technology</option> 
                        <option value="Biomedical Sciences">Biomedical Sciences</option>
                        <option value="Bioscience Engineering">Bioscience Engineering</option>
                        <option value="Bioscience Engineering Technology">Bioscience Engineering Technology</option>
                        <option value="Biotechnology">Biotechnology</option>
                        <option value="Business Administration">Business Administration</option> 
                        <option value="Business and Information Systems Engineering">Business and Information Systems Engineering </option>
                        <option value="Business Economics">Business Economics</option>
                        <option value="Business Engineering">Business Engineering </option>
                        <option value="Business Law">Business Law</option>
                        <option value="Business Management">Business Management </option>
                        <option value="Care Management">Care Management </option>
                        <option value="Care Technology">Care Technology</option>
                        <option value="Chemical Engineering and Materials Science">Chemical Engineering and Materials Science</option>
                        <option value="Chemical Engineering Technology">Chemical Engineering Technology </option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Child and Youth Studies">Child and Youth Studies</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Civil Engineering Technology">Civil Engineering Technology</option>
                        <option value="Communication Management">Communication Management </option>
                        <option value="Communication Science">Communication Science </option>
                        <option value="Communication Studies">Communication Studies </option>
                        <option value="Computer Science ">Computer Science </option>
                        <option value="Computer Science Engineering">Computer Science Engineering</option>
                        <option value="Computer networks and Distributed Systems">Computer networks and Distributed Systems</option>
                        <option value="Conservation-Restoration">Conservation-Restoration</option>
                        <option value="Construction">Construction </option>
                        <option value="Creative Therapy">Creative Therapy </option>
                        <option value="Criminology">Criminology </option>
                        <option value="Cultural Heritage and Records Management">Cultural Heritage and Records Management</option>
                        <option value="Dance">Dance</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Dental Hygiene">Dental Hygiene </option>
                        <option value="Dentistry">Dentistry </option>
                        <option value="Design and Production Technology">Design and Production Technology </option>
                        <option value="Digital Arts and Entertainment">Digital Arts and Entertainment </option>
                        <option value="Digital Design & Development">Digital Design & Development</option>
                        <option value="Drama">Drama </option>
                        <option value="Early Childhood Education">Early Childhood Education</option> 
                        <option value="East European Languages and Cultures">East European Languages and Cultures</option>
                        <option value="Economic Policy">Economic Policy</option>
                        <option value="Economic Sciences/Business Economics/Business Engineering">Economic Sciences/Business Economics/Business Engineering</option>
                        <option value="Economics">Economics </option>
                        <option value="Economics and Business Economics">Economics and Business Economics</option>
                        <option value="Ecotechnology">Ecotechnology</option>
                        <option value="Educational Sciences">Educational Sciences </option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Electromechanical Engineering">Electromechanical Engineering</option>
                        <option value="Electromechanical Engineering Technology">Electromechanical Engineering Technology</option> 
                        <option value="Electromechanics">Electromechanics </option>
                        <option value="Electronics and ICT Engineering Technology">Electronics and ICT Engineering Technology</option> 
                        <option value="Electronics-ICT">Electronics-ICT </option>
                        <option value="Energy Management">Energy Management </option>
                        <option value="Energy Technology">Energy Technology </option>
                        <option value="Engineering">Engineering </option>
                        <option value="Engineering Physics">Engineering Physics</option>
                        <option value="Engineering Technology">Engineering Technology </option>
                        <option value="Engineering: Architecture">Engineering: Architecture </option>
                        <option value="Environment, Health and Safety Management">Environment, Health and Safety Management</option>
                        <option value="Environmental Care">Environmental Care</option>
                        <option value="Environmental Engineering Technology">Environmental Engineering Technology</option>
                        <option value="Epidemiology">Epidemiology</option>
                        <option value="Facility Management">Facility Management</option>
                        <option value="Family studies">Family studies</option>
                        <option value="Fashion Technology">Fashion Technology</option>
                        <option value="Film Studies">Film Studies</option>
                        <option value="Finance">Finance</option>
                        <option value="Financial and Applied Mathematics">Financial and Applied Mathematics</option>
                        <option value="Geography">Geography </option>
                        <option value="Geography and Geomatics">Geography and Geomatics</option>
                        <option value="Geology">Geology </option>
                        <option value="Geriatric Nursing ">Geriatric Nursing </option>
                        <option value="Global Supply Chain Management">Global Supply Chain Management</option>
                        <option value="Graphical and Digital Media">Graphical and Digital Media </option>
                        <option value="Health Sciences">Health Sciences</option>
                        <option value="History">History</option>
                        <option value="Hotel Management">Hotel Management </option>
                        <option value="Idea and Innovation Management">Idea and Innovation Management</option>
                        <option value="Industrial Design Engineering Technology">Industrial Design Engineering Technology</option>
                        <option value="Industrial Product Design">Industrial Product Design</option>
                        <option value="Informatics">Informatics </option>
                        <option value="Information Technology ">Information Technology </option>
                        <option value="Instructional Sciences">Instructional Sciences</option>
                        <option value="Integral Safety">Integral Safety</option>
                        <option value="Intensive and Emergency Care">Intensive and Emergency Care </option>
                        <option value="Interdisciplinary Elderly Care">Interdisciplinary Elderly Care</option>
                        <option value="Interior Architecture">Interior Architecture </option>
                        <option value="Interior Design">Interior Design </option>
                        <option value="International Business Management">International Business Management</option>
                        <option value="International Communication and Media">International Communication and Media</option>
                        <option value="International Cooperation for North-South Relations">International Cooperation for North-South Relations </option>
                        <option value="International Journalism">International Journalism</option>
                        <option value="International Office Management">International Office Management</option>
                        <option value="International Relations">International Relations</option>
                        <option value="International Relations and Diplomacy">International Relations and Diplomacy</option>
                        <option value="IT Management and Multimedia">IT Management and Multimedia </option>
                        <option value="Japanology">Japanology</option>
                        <option value="Journalism">Journalism </option>
                        <option value="Laboratory Medicine">Laboratory Medicine</option>
                        <option value="Landscape and Garden Architecture">Landscape and Garden Architecture </option>
                        <option value="Language and Area Studies: Arabic and Islamic Studies">Language and Area Studies: Arabic and Islamic Studies</option>
                        <option value="Language and Area Studies: Japanology">Language and Area Studies: Japanology</option>
                        <option value="Language and Area Studies: Sinology">Language and Area Studies: Sinology</option>
                        <option value="Language and Area Studies: Slavic and East European Studies">Language and Area Studies: Slavic and East European Studies</option>
                        <option value="Language Studies">Language Studies</option>
                        <option value="Law">Law</option>
                        <option value="Linguistics">Linguistics</option>
                        <option value="Linguistics and Literary Studies">Linguistics and Literary Studies</option>
                        <option value="Linguistics and Literature">Linguistics and Literature </option>
                        <option value="Literary Studies">Literary Studies</option>
                        <option value="Logistics">Logistics</option>
                        <option value="Management Information Systems">Management Information Systems</option>
                        <option value="Marine Engineering">Marine Engineering </option>
                        <option value="Maritime and Air Transport Management">Maritime and Air Transport Management</option>
                        <option value="Maritime and Logistics Management">Maritime and Logistics Management</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Mathematics">Mathematics </option>
                        <option value="Media and Entertainment Business">Media and Entertainment Business </option>
                        <option value="Medical Imaging">Medical Imaging</option>
                        <option value="Medicine">Medicine </option>
                        <option value="Mental Health Care">Mental Health Care </option>
                        <option value="Midwifery">Midwifery </option>
                        <option value="Molecular Biology">Molecular Biology</option>
                        <option value="Moral Sciences">Moral Sciences</option>
                        <option value="Multilingual Education">Multilingual Education</option>
                        <option value="Multimedia and Communication Technology">Multimedia and Communication Technology </option>
                        <option value="Music">Music </option>
                        <option value="Music and Performing Arts">Music and Performing Arts</option>
                        <option value="Musical">Musical</option>
                        <option value="Musicology">Musicology</option>
                        <option value="Nautical Sciences">Nautical Sciences </option>
                        <option value="Network Economy">Network Economy </option>
                        <option value="Nursing">Nursing </option>
                        <option value="Nursing and Midwifery">Nursing and Midwifery</option>
                        <option value="Nutrition and Dietetics">Nutrition and Dietetics </option>
                        <option value="Occupational Therapy">Occupational Therapy </option>
                        <option value="Office Management">Office Management </option>
                        <option value="Operating Room Nursing">Operating Room Nursing </option>
                        <option value="Optics and Optometry">Optics and Optometry</option>
                        <option value="Organisation and Management">Organisation and Management</option>
                        <option value="Oriental Languages and Cultures">Oriental Languages and Cultures</option>
                        <option value="Orthopaedics">Orthopaedics</option>
                        <option value="Palliative Care">Palliative Care</option>
                        <option value="Pediatrics and Neonatal Care">Pediatrics and Neonatal Care </option>
                        <option value="Pharmaceutical Care">Pharmaceutical Care</option>
                        <option value="Pharmaceutical Sciences">Pharmaceutical Sciences </option>
                        <option value="Pharmacist">Pharmacist</option>
                        <option value="Philosophy">Philosophy </option>
                        <option value="Philosophy and Moral Sciences">Philosophy and Moral Sciences</option>
                        <option value="Physical Education and Movement Sciences">Physical Education and Movement Sciences </option>
                        <option value="Physics">Physics </option>
                        <option value="Physics and Astronomy">Physics and Astronomy </option>
                        <option value="Podiatry">Podiatry</option>
                        <option value="Political Communication">Political Communication</option>
                        <option value="Political Science">Political Science </option>
                        <option value="Political Science and Sociology">Political Science and Sociology </option>
                        <option value="Pop and Rock Music">Pop and Rock Music</option>
                        <option value="Primary Care">Primary Care</option>
                        <option value="Product Design">Product Design</option>
                        <option value="Product Development">Product Development</option>
                        <option value="Protestant Theology">Protestant Theology</option>
                        <option value="Psychology">Psychology </option>
                        <option value="Psychosocial Gerontology">Psychosocial Gerontology</option>
                        <option value="Public Administration and Management">Public Administration and Management</option>
                        <option value="Public Health Care">Public Health Care</option>
                        <option value="Public Safety">Public Safety</option>
                        <option value="Real Estate">Real Estate </option>
                        <option value="Rehabilitation and Physiotherapy">Rehabilitation and Physiotherapy </option>
                        <option value="Retail Management">Retail Management</option>
                        <option value="School Development">School Development </option>
                        <option value="Senior Citizen Coaching">Senior Citizen Coaching</option>
                        <option value="Sinology">Sinology</option>
                        <option value="Slavic and East European Studies">Slavic and East European Studies</option>
                        <option value="Social and Economic Sciences">Social and Economic Sciences</option>
                        <option value="Social Educational Care Work">Social Educational Care Work </option>
                        <option value="Social Educational Care Work Management">Social Educational Care Work Management</option>
                        <option value="Social Sciences">Social Sciences</option>
                        <option value="Social Work">Social Work </option>
                        <option value="Social Work and Welfare Studies">Social Work and Welfare Studies</option>
                        <option value="Sociology">Sociology</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Special Education Needs">Special Education Needs </option>
                        <option value="Special educational needs and Remedial Teaching">Special educational needs and Remedial Teaching </option>
                        <option value="Speech Language and Hearing Sciences">Speech Language and Hearing Sciences</option>
                        <option value="Speech-Language Pathology and Audiology Sciences">Speech-Language Pathology and Audiology Sciences</option>
                        <option value="Speech-Language Therapy and Audiology ">Speech-Language Therapy and Audiology </option>
                        <option value="Sports and Leisure ">Sports and Leisure </option>
                        <option value="Tax Law">Tax Law</option>
                        <option value="Teacher: Pre-Primary Education">Teacher: Pre-Primary Education </option>
                        <option value="Teacher: Primary Education">Teacher: Primary Education </option>
                        <option value="Teacher: Secondary Education">Teacher: Secondary Education </option>
                        <option value="Technology for Integrated Water Management">Technology for Integrated Water Management</option>
                        <option value="Textile Technology">Textile Technology</option>
                        <option value="Theatre and Film Studies">Theatre and Film Studies</option>
                        <option value="Theology and Religious Studies">Theology and Religious Studies </option>
                        <option value="Tourism and Leisure Management">Tourism and Leisure Management </option>
                        <option value="Transportation Sciences">Transportation Sciences</option>
                        <option value="Urban Logistics">Urban Logistics</option>
                        <option value="Urbanism and Spatial Planning">Urbanism and Spatial Planning</option>
                        <option value="Veterinary Medicine">Veterinary Medicine </option>
                        <option value="Visual Arts">Visual Arts </option>
                        <option value="Visual Design">Visual Design</option>
                        <option value="Wellbeing and Vitality Management">Wellbeing and Vitality Management</option>
                        <option value="Wood Technology">Wood Technology</option>
                        <option value="">OTHER (Please write it down)</option>
                 
                    </select>
                   
                    <input type="text" id="title" name="title">

                    <div class="label">
                        <label for="degreeCountry">Country of Highest Degree</label></div>
                    <select id="degreeCountry" name="degreeCountry" required>
                        <option name="" value="" selected disabled="disabled">...</option>
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

                    <div class="label">
                        <label for="experience">Working Experience</label></div>
                    <input type="number" min="0" id="experience" name="experience" required>

                    <div class="label">
                        <label for="subject">E-mail</label></div>
                    <input type="email" id="email" name="email" required>

                    <div class="label">
                        <label for="all_password"> Create a Password (min 6 characters)</label>
                    </div>
                    <input type="password" minlength="6" id="all_password" name="all_password" required>

                    <div class="label">
                        <label for="confirmpassword"> Confirm your Password</label>
                    </div>
                    <input type="password" id="confirmpassword" name="confirmpassword" required>

                    <div class="label">
                    <input style="zoom:1.5;" type="checkbox" name="terms_of_use" value="" class="termsofuse" required> I agree with <a href="terms_of_use.html">the terms and conditions, privacy and GDPR policies.</a>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“Your personal information will not be shared with any third party”
                    </div>
                        <input type="submit" name="submit" value="Submit">
                    </div>
    


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

