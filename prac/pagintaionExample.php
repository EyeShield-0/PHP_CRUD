<?php
$handle = fopen("food.csv","r")or die("file dont exist");
$output = '  ';
$numPerPage = 5;
$page = $_GET['page'];
$count = 0;
$start = $page * $numPerPage;
$end = ($page + 1) * $numPerPage;
while (!feof($handle )){
    $data = fgetcsv($handle, 4096, ",");
    if($data[0] ==100 && $count < $end && $count >= $start){
        $output .= sprintf( "<b>Fruit Name: %s.   </b><br>",  $data[1]);
        $output .= sprintf( "Quantity Avaliable:  %d  Kgs @ %d USD each.   <br>",  $data[2], $data[3]);
        $output .= sprintf( "Item code:  %d (Stock:  %s) <br><hr><br>", $data[4],$data[0]);

        if($count == $numPerPage) {
            if($page != 0) {
                $output .= '<a href="?page="' . ($page - 1) . '">BACK</a> ';
            }
            if(!feof($handle)) {
                $output .= ' <a href="?page="' . ($page + 1) . '">NEXT</a>';
            }
        }

        $count++;
        }
}
echo $output;
fclose($handle);
?>