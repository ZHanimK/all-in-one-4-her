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

        .slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
            table,tr,th,td

            {
                border: 2px solid blue;
                font-size: 28px;
            }
        </style>
    </head>
    <body>
        <h1>Custom Range Slider</h1>
<p>Drag the slider to display the current value.</p>

<div class="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  <p>Value: <span id="demo"></span></p>
</div>

        <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
        output.innerHTML = this.value;
        }
        </script>

        <form action="sor1.php" method="post">
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
