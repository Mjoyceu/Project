<?php
$dbname="bigblog";
$dbhost="localhost";
$dbuser="root";
$dbpass="";

$connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if($connection){
    echo "<script> alert('Sucessfully connected')";
}else{
    echo "<script> alert('not Sucessful')";
}
?>