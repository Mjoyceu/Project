<?php
$dbname="bigblog";
$dbhost="localhost";
$dbuser="root";
$dbpass="";





    $error=array();
    $success="";
    $connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


    if(isset($_POST['submit'])){
        $text= mysqli_real_escape_string($connection, $_POST['title']);
        $seo= mysqli_real_escape_string($connection, $_POST['comment']);

        if(empty($text)){
            array_push($error, "Input Your Name");
        }
        if(empty($seo)){
            array_push($error, "Input Your Comment");
        }

        if(count($error) == 0){
            $query= "INSERT INTO comments(name, comment) VALUES ('$text', '$seo')";
            $result = mysqli_query($connection, $query);

            if($result){
                $success = "<div class='text-success text-center'> Comment was added successfully</div>";
            }else{
                $success = "<span class='text-danger'>failed". mysqli_error($connection)."</span>";
    
            }
        }
    }
    ?>

