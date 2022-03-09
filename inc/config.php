<?php
//database connection
$dbname="Bigblog";
$dbhost="localhost";
$dbuser="root";
$dbpass="";

$connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($connection){
    //echo "connected";
}else{
    echo "failed" . mysqli_connect_error();
}
?>