<?php
function getMainPost(){
    $dbname="bigblog";
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $query="SELECT * FROM posts ORDER BY date DESC LIMIT 9";
    $result=mysqli_query($connection, $query);

    while($row= mysqli_fetch_array($result)){
        $query="SELECT title FROM category 
                INNER JOIN has_category ON category.id = has_category.category
        
        WHERE has_category.category = " . $row['id'];
        $cat_result=mysqli_query($connection, $query);
        $categories="";
        while($category=mysqli_fetch_array($cat_result)){
            $categories .='<p><span class="badge badge-dark">'.$category['title'].'</span></p>';
        }
        echo'
        <div class="mx-4">
        <h5 class="card-title"><p id="font">'.$row['title'].'</p></h5>
        <img src="uploads/'.$row['photo'].'" class="card-img-top" alt="'.$row['title'].'" style="max-width: 200px; justify-content:center;">
        <p class="card-text" style="text-align:center;">'.$row['content'].'</p>
        </div>


        ';
    }

} 
?>