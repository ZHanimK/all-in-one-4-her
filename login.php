<?php
include "connection_her.php";

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$email = $_POST['email'];
$all_password = $_POST['all_password'];

$sql = "SELECT email, all_password, who FROM `her` WHERE `email` = :email AND `all_password` = :all_password";

try {
    $statement = $db->prepare($sql);
    $statement->execute(array('email' => $email, 'all_password' => $all_password));
    $row = $statement->fetch();
        if ($row['email'] == $email && $row['all_password'] == $all_password){
            if ($row['who'] == "1") {
                header("location:her_home.php");
            }elseif ($row['who'] == "2") {
                header("location:employer_home.php");
            }
            elseif ($row['who'] == "3") {
                header("location:mentor_home.php");
            }
            elseif ($row['who'] == "4") {
                header("location:government_home.php");
            }
        }else{
                echo "<p align='center'><font color=red  size='4pt'></br></br></br>Email or Password is invalid</font></p>";
            }
}
catch(PDOException $e) {
    echo "Something went wrong: ".$e->getMessage();
}
?>