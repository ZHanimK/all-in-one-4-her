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


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $result = $conn->query("SELECT * FROM her WHERE (her_id  LIKE '%".$valueToSearch."%') OR (firstname LIKE '%".$valueToSearch."%') OR (lastname  LIKE '%".$valueToSearch."%') OR (Age LIKE '%".$valueToSearch."%')");

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
            table,tr,th,td

            {
                border: 2px solid blue;
                font-size: 28px;
            }
        </style>
    </head>
    <body>
        <div class="slidecontainer">
          <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
        </div>
        
        <form action="sor.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>

            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><?php echo $row['her_id'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['age'];?></td>

                    <td><button type="button"><?php echo $row['firstname'];?>
                            <style>
                                {
                                    border: 2px solid red;
                                    font-size: 28px;
                                }
                            </style>
                            </button>
                    </td>

                </tr>

                <?php endwhile;?>

            </table>
        </form>

    </body>
</html>
