<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield Sir Angel Naguit 101152749
 * Date: 2018-10-10
 * Time: 6:30 PM
 */
function tableFunc(){
//read
    $handle = fopen("government_of_ontario_art_collection.csv","r");
//TABLE
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
    $table.= "</table>";
    fclose($handle);

    return $table;
}

function add(){
// this ID Gen
    $handleID =  fopen("government_of_ontario_art_collection.csv","r");
    $arrayID = array();

    $line = fgetcsv($handleID);
    $x = 0;
    while ($line = fgetcsv($handleID)){
        $arrayID[$x] = $line[0];
        $x++;
    }
    $max = max($arrayID);
    $newID = ++$max; //new ID has been created $newID
    fclose($handleID);




    if(isset($_POST['ac#']) && isset($_POST['artist']) && isset($_POST['title']) && isset($_POST['date']) && isset($_POST['medium']) && isset($_POST['dimension']) && isset($_POST['category']) ){

        $handle = fopen("government_of_ontario_art_collection.csv","a+");

        $stringArr = [
            $newID,
            $_POST['ac#'],
            $_POST['artist'],
            $_POST['title'],
            $_POST['date'],
            $_POST['medium'],
            $_POST['dimension'],
            $_POST['category']

        ];

        $stringArrNew = join(',',$stringArr);

        fputcsv($handle,explode(',',$stringArrNew)); //exploded to array


        fclose($handle);

        echo "<script type='text/javascript'>alert('Added Successfully!')</script>";

    }else{


        $stringArr = array("0", "1", "2", "3", "4", "5", "6","7");

    }


}

function searchP(){

    if(isset($_GET['searchBar'])){
        if( $_GET['searchBar'] === ''){

            $word = " ";
        }else{
            $word = $_GET['searchBar'];
        }

    }else{
        $word = " ";
    }


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
        if(stripos(implode(' ',$line),$word) !== false){
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


}

function delete(){

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
}

function edit(){//wasn't used as a real function

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
    }

    if( isset($_POST['ac#']) && isset($_POST['artist']) && isset($_POST['title']) && isset($_POST['date']) && isset($_POST['medium']) && isset($_POST['dimension']) && isset($_POST['category']) ) {

        $ID = $_POST['ID'];

        $handle = fopen("government_of_ontario_art_collection.csv","r+");
        $clone = fopen('Clone.csv','w+');



        while ($line = fgetcsv($handle)){

            if($ID !== $line[0]){

                fputcsv($clone,$line);
            }


        }
        fclose($handle);
        fclose($clone);


        $handle = fopen("government_of_ontario_art_collection.csv","w+");
        $clone = fopen('Clone.csv','r+');


        while ($line = fgetcsv($clone)){


            fputcsv($handle,$line);



        }
        fclose($handle);
        fclose($clone);


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


}


function export1(){
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=exportNewFile.csv');

    $handle = fopen("government_of_ontario_art_collection.csv","r+");
    //$exportedFile = fopen('exportNewFile.csv','w+');


    $exportedFile = fopen('php://output','w');







    while ($line = fgetcsv($handle)){
        fputcsv($exportedFile,$line);
    }


    fclose($handle);
    //fclose($exportedFile);




    echo "<script type='text/javascript'>alert('Export Successful! Check file inside directory.')</script>";

}


function import(){
    if(isset($_POST['import'])) {

        if($_POST['importFile'] != ''){



            $handle = fopen("government_of_ontario_art_collection.csv","a+");
            $import = fopen($_POST['importFile'],'r+');


            while ($line = fgetcsv($import)){
                rewind($handle);
                $mybool = true;

                if(count($line) !== 7){//if the csv file that is being uploaded has different numbers of colunmns
                    echo "<script type='text/javascript'>alert('Invalid csv Format (columns must be exactly 7)')</script>";
                    $mybool = false;
                    break;

                }


                if($mybool){

                    $arrayID = array();
                    $x = 0;
                    while ($lineOrig = fgetcsv($handle)){
                        $arrayID[$x] = $lineOrig[0];
                        $x++;
                    }



                    $maxManualCode = 1;
                    for($y = 1;$y<count($arrayID);$y++){
                        if($arrayID[$y]>$arrayID[$y-1]){
                            $maxManualCode = $arrayID[$y];
                        }
                    }



                    $newID = ++$maxManualCode;

                    $arrayInput = [
                        $newID,
                        $line[0],
                        $line[1],
                        $line[2],
                        $line[3],
                        $line[4],
                        $line[5],
                        $line[6]
                    ];
                    fputcsv($handle,$arrayInput);
                }
            }

            fclose($handle);
            fclose($import);

            if($mybool){
                echo "<script type='text/javascript'>alert('Import Successful')</script>";
            }


        }else{
            echo "<script type='text/javascript'>alert('Please select a csv file')</script>";

        }

    }

}