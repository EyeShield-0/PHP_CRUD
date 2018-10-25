<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield
 * Date: 2018-10-24
 * Time: 3:40 PM
 */


if(isset($_POST['deleteID'])){
    if( !filter_var($_POST['deleteID'],FILTER_VALIDATE_INT)){
        echo "<script type='text/javascript'>alert('Please Enter a Valid ID')</script>";
        $ID = " ";


    }else{
        $ID = $_POST['deleteID'];

        $handle = fopen("government_of_ontario_art_collection.csv","r+");
        $clone = fopen('Clone.csv','w+');

        $verifier = false;

        while ($line = fgetcsv($handle)){
            if($ID == $line[0]){
                $verifier = true;
            }
        }
        rewind($handle);

    // if ID EXISTS
        if($verifier){
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

            //take clone's datasets back to origin csv

            $handle = fopen("government_of_ontario_art_collection.csv","w+");
            $clone = fopen('Clone.csv','r+');


            while ($line = fgetcsv($clone)){


                fputcsv($handle,$line);



            }
            fclose($handle);
            fclose($clone);

            echo "<script type='text/javascript'>alert('Delete Successful!')</script>";
        }else{

            fclose($handle);
            fclose($clone);
            echo "<script type='text/javascript'>alert('ID Does not Exists!')</script>";


        }



    }
}
?>

<form class="deleteForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p>Enter item to be Deleted</p>
    <div class="form-group">
        <label for="ID">ID</label>
        <input type="text" class="form-control" name="deleteID" aria-describedby="deleteID" placeholder="Enter ID to Delete" required autocomplete="off">
    </div>




    <button type="submit" class="btn btn-primary">Delete</button>
</form>