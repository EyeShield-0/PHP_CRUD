<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield
 * Date: 2018-10-23
 * Time: 1:17 PM
 */

$handleID =  fopen("government_of_ontario_art_collection.csv","r");
$arrayID = array();

$line = fgetcsv($handleID);
$x = 0;

while ($line = fgetcsv($handleID)){
    $arrayID[$x] = $line[0];
    $x++;
}

$max = max($arrayID);

echo $max;
fclose($handleID);

$newID = ++$max;
echo "<br>";
echo $newID;


?>