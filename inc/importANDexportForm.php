


<form class="importExportForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<div class="importAndExportForm">
    <button type="button" class="btn btn-light" name="import" onclick="location.href='import.php'">Import</button>
    <input type="submit" name="export" value="Export" class="btn btn-light">

</div>
</form>

<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield
 * Date: 2018-10-25
 * Time: 3:30 PM
 */

function export(){
    ob_end_clean();

    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=exportNewFile.csv');

    $handle = fopen("government_of_ontario_art_collection.csv","r+");

    //$exportedFile = fopen('exportNewFile.csv','w+');


    $exportedFile = fopen('php://output','w');


    while ($line = fgetcsv($handle)){
        fputcsv($exportedFile,$line);

    }




    //fclose($exportedFile);





    fclose($handle);
    echo "<script type='text/javascript'>alert('Export Successful! Check file inside directory.')</script>";

}

if(array_key_exists('export',$_POST)){// confirm box does not work

    $confirm = "<script type='javascript'>confirm('Are you sure you want to export?')</script>";
    if(!$confirm == "" || $confirm == null){
        export();
    }else{
        "<script>window.reload();</script>";
    }

}



?>