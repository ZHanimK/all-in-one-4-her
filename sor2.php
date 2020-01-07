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

if(isset($_POST['getir']))
{
    $level = $_POST['level'];
    $result = $conn->query("SELECT * FROM her WHERE education = '$level'");
}
 else {
    $result = $conn->query("SELECT * FROM her");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP HTML TABLE DATA SEARCH</title>
    <style>
        body {
            padding: 50px;
            font-family: arial;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid blue;
            font-size: 14px;
            padding: 5px;
            border-collapse: collapse;
        }

        th {
            color: darkblue;
            background-color: lightgray;
        }

        .level {
            float: left;
            margin-right: 30px;
        }

        table {}
    </style>
</head>
<body>
    <div class="level">
        <form action="sor2.php" method="post">
            <div class="col">
                <select name="level" required style="width:150px; height:50px;">
                    <option name="" value="" selected disabled="disabled">Level of study</option>
                    <option value="Bachelor">Bachelor</option>
                    <option value="Master">Master</option>
                    <option value="PhD">PhD</option>
                   <!-- <option value="All">All</option> -->
                </select>
            </div><br>
            <input type="submit" name="getir" value="Filter" style="width:150px; height:50px;"><br><br>
    </div>
    <table>
        <tr>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Age </th>
            <th>gender </th>
            <th>country </th>
            <th>legalStatus </th>
            <th>education </th>
            <th>title </th>
            <th>degreeCountry </th>
            <th>experience </th>
            <th>email </th>
        </tr>
        <!-- populate table from mysql database -->
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?php echo $row['firstname'];?></td>
            <td><?php echo $row['lastname'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['country'];?></td>
            <td><?php echo $row['legalStatus'];?></td>
            <td><?php echo $row['education'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['degreeCountry'];?></td>
            <td><?php echo $row['experience'];?></td>
            <td><?php echo $row['email'];?></td>
        </tr>
        <?php endwhile;?>
    </table>
    </form>
</body>
</html>