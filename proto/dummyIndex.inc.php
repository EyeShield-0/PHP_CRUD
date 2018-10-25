<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield
 * Date: 2018-10-09
 * Time: 3:44 PM
 */
//read
$handle = fopen("myCSV.csv","r");

//TABLE
$line = fgetcsv($handle);

$table = "<table class=\"table table-striped table-dark\">";
$table.= "<tr><th>".$line[0]."</th>";
$table.= "<th>".$line[1]."</th>";
$table.= "<th>".$line[2]."</th>";
$table.= "<th>".$line[3]."</th></tr>";

$counter = 0;

while ($line = fgetcsv($handle)){


    $table.= "<tr>
              <td>".$line[0]."</td>
              <td>".$line[1]."</td>
              <td>".$line[2]."</td>
              <td>".$line[3]."</td></tr>";

}
$table.= "</table>";
//END TABLE
fclose($handle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">CRUD</h1>
        <p class="lead">Php Assigenment</p>
    </div>
</div>
<div class="mainTable">
    <?php echo $table?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
