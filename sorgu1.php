<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>

<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: arial;
font-size: 20px;
text-align: left;
text-shadow: 2;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>


</head>
<body>
<table>

<tr>
<th>Id</th>
<th>Username</th>
<th>Lastname</th>
<th>Age</th>
<th>Gender</th>
<th>Country</th>
<th>Education</th>
<th>Experience</th>
</tr>

<?php
$datenbank = "db/datenbank.sqt";
    try
    {
        $conn = new PDO('sqlite:' . $datenbank);
    }
    catch(Exception $e)
    {
        die('Error : ' . $e->getMessage());
        echo "Can not access Database";
    }
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $result = $conn->query("SELECT her_id, firstname, lastname, age, gender, country, education, experience FROM her");
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
   echo "<tr>
   <td>"
  . $row["her_id"]. "</td><td>"
  . $row["firstname"] . "</td><td>"
  . $row["lastname"]. "</td><td>"
  . $row["age"]."</td><td>"
  . $row["gender"]."</td><td>"
  . $row["country"]."</td><td>"
  . $row["education"]."</td><td>"
  . $row["experience"]."</td>
  </tr>";
  }
?>

</table>
</body>
</html>
