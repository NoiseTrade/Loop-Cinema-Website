<?php 
#connect to my SQL database
$link = mysqli_connect('localhost','HNDSOFTSA6','XcV3krs75C','HNDSOFTSA6');
if(!$link){
    die('Could not connect to MYSQL:' .mysqli_error());
}

?>