
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only" >Search</label>
        <input type="text" class="form-control" name="searchEdit" placeholder="Enter ID to edit" autocomplete="off" >
    </div>
    <button type="submit" class="btn btn-light mb-2">Submit</button>

</form>
<form class="editForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p>Edit Mode</p>

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only" >ID</label>
        <input type="text" class="form-control" name="ID"  autocomplete="off" value="<?php echo isset($_POST['searchEdit']) ? $_POST['searchEdit'] : " " ;?>" readonly>
    </div>

    <div class="form-group">
        <label for="AC#">AC#</label>
        <input type="text" class="form-control" name="ac#" aria-describedby="ac#"  required autocomplete="off" value="<?php echo $ac ?>">
    </div>

    <div class="form-group">
        <label for="artist">Artist</label>
        <input type="text" class="form-control" name="artist" aria-describedby="artist"  autocomplete="off" value="<?php echo $artist ?>">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" aria-describedby="title" required autocomplete="off" value="<?php echo  $title ?>">
    </div>

    <div class="form-group">
        <label for="date">Year</label>
        <input type="text" class="form-control" name="date" aria-describedby="date" required  autocomplete="off" value="<?php echo $date ?>">
    </div>

    <div class="form-group">
        <label for="medium">Medium</label>
        <input type="text" class="form-control" name="medium" aria-describedby="medium"  autocomplete="off" value="<?php echo  $medium ?>">
    </div>

    <div class="form-group">
        <label for="dimension">Dimension</label>
        <input type="text" class="form-control" name="dimension" aria-describedby="dimension" autocomplete="off" value="<?php echo  $dimension?>">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" aria-describedby="category"  autocomplete="off" value="<?php  echo $category ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
</body>
</html>
