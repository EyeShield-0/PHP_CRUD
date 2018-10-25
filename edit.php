<?php

if(isset($_POST['searchEdit'])){
    if( !filter_var($_POST['searchEdit'],FILTER_VALIDATE_INT)){
        echo "<script type='text/javascript'>alert('Please Enter a Valid ID')</script>";
        $ac = " ";
        $artist = " ";
        $title = " ";
        $date = " ";
        $medium = " ";
        $dimension = " ";
        $category = " ";
        $ID = " ";


    }else{

        $ID = $_POST['searchEdit'];
        $verifier = false;
        $handle = fopen("government_of_ontario_art_collection.csv","r+");

        while ($line = fgetcsv($handle)){
            if($ID == $line[0]){
                $verifier = true;
            }
        }

        rewind($handle);


        if($verifier){

            while ($line = fgetcsv($handle)){
                if ($ID == $line[0] ){
                    //take the value to the fields
                    $ID = $line[0];
                    $ac = $line[1];
                    $artist = $line[2];
                    $title = $line[3];
                    $date = $line[4];
                    $medium = $line[5];
                    $dimension = $line[6];
                    $category = $line[7];
                    //SHOWS VALUES IN THE TEXT FIELD
                    break;
                }
            }

        }else{

            echo "<script type='text/javascript'>alert('ID Does not Exists!')</script>";
            $ac = " ";
            $artist = " ";
            $title = " ";
            $date = " ";
            $medium = " ";
            $dimension = " ";
            $category = " ";
            $ID = " ";
        }


        fclose($handle);
    }
}else{
    $ac = " ";
    $artist = " ";
    $title = " ";
    $date = " ";
    $medium = " ";
    $dimension = " ";
    $category = " ";
    $ID = " ";
}

if( isset($_POST['ac#']) && isset($_POST['artist']) && isset($_POST['title']) && isset($_POST['date']) && isset($_POST['medium']) && isset($_POST['dimension']) && isset($_POST['category']) ) {

    $ID = $_POST['ID'];

    $handle = fopen("government_of_ontario_art_collection.csv","r+");
    $clone = fopen('Clone.csv','w+');



    while ($line = fgetcsv($handle)){

        if($ID !== $line[0]){
            $stringArr = [
                $line[0],
                $line[1],
                $line[2],
                $line[3],
                $line[4],
                $line[5],
                $line[6],
                $line[7]
            ];
            $stringArrNew = join(',',$stringArr);
            fputcsv($clone,$line);
        }


    }
    fclose($handle);
    fclose($clone);

    /////////
    /////take clone's datasets back to origin csv
    $handle = fopen("government_of_ontario_art_collection.csv","w+");
    $clone = fopen('Clone.csv','r+');


    while ($line = fgetcsv($clone)){

        $stringArr = [
            $line[0],
            $line[1],
            $line[2],
            $line[3],
            $line[4],
            $line[5],
            $line[6],
            $line[7]
        ];
        $stringArrNew = join(',',$stringArr);
        fputcsv($handle,$line);



    }
    fclose($handle);
    fclose($clone);

// append edited

    $handle = fopen("government_of_ontario_art_collection.csv","a+");

    $stringArr = [
        $_POST['ID'],
        $_POST['ac#'],
        $_POST['artist'],
        $_POST['title'],
        $_POST['date'],
        $_POST['medium'],
        $_POST['dimension'],
        $_POST['category']

    ];

    $stringArrNew = join(',',$stringArr);

    fputcsv($handle,explode(',',$stringArrNew));


    fclose($handle);


    echo "<script type='text/javascript'>alert('Edit Successful!')</script>";

}


?>

<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 2018-10-10
 * Time: 2:34 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'inc/head.inc.php' ?>
</head>
<body>
<?php include 'inc/header.inc.php'?>
<?php include 'inc/editForm.inc.php'; ?>
<?php include 'inc/searchBar.inc.php' ?>;


<?php include 'inc/myfooter.inc.php' ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
