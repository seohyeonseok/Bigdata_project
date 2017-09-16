<?php
echo "start";

$connect= mysqli_connect("localhost", "root", "toor","Bigwave");


$query = ' select * from child ';

echo $query;

$result = $connect->query($query);
if(!$result)
echo "notresult";
else
echo "okayresult";

$array = $result->fetch_array();

echo $array[0];

?>