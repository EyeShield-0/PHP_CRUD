<form class="form-inline" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only" >Search</label>
        <input type="text" class="form-control" name="searchBar" placeholder="Search" autocomplete="off" >
    </div>
    <button type="submit" class="btn btn-light mb-2">Submit</button>
    <button type="button" class="btn btn-light mb-2" onclick="location.href='index.php'">Back to main menu</button>

</form>

<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield
 * Date: 2018-10-23
 * Time: 1:46 PM
 */





/////////////////////////////////////////////////////////////////////
///
///

if(isset($_GET['searchBar'])){
    if( $_GET['searchBar'] === ''){
       //echo "<script type='text/javascript'>alert('Please Enter Item to Search!')</script>";
        $word = " ";
    }else{
        $word = $_GET['searchBar'];
    }

}else{
    $word = " ";
}

    //strpos
    $handle = fopen("government_of_ontario_art_collection.csv","r");
$line = fgetcsv($handle);
$table = "<table class=\"table table-striped table-dark\">";
$table.= "<tr><th>".$line[0]."</th>";
$table.= "<th>".$line[1]."</th>";
$table.= "<th>".$line[2]."</th>";
$table.= "<th>".$line[3]."</th>";
$table.= "<th>".$line[4]."</th>";
$table.= "<th>".$line[5]."</th>";
$table.= "<th>".$line[6]."</th>";
$table.= "<th>".$line[7]."</th></tr>";


while ($line = fgetcsv($handle)){
    if(strpos(implode(' ',$line),$word) !== false){
        $table.= "<tr>
              <th>".$line[0]."</th>
              <th>".$line[1]."</th>
              <th>".$line[2]."</th>
              <th>".$line[3]."</th>
              <th>".$line[4]."</th>
              <th>".$line[5]."</th>
              <th>".$line[6]."</th>
              <th>".$line[7]."</th>
              </tr>";
    }
}
$table.= "</table>";

    fclose($handle);

    echo $table;



    ?>



