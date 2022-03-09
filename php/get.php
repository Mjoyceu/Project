<?php
function getMain(){
    $dbname="bigblog";
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $query="SELECT * FROM posts ORDER BY date DESC LIMIT 4";
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
        <main class="col-md-3 col-xl-3 py-md-5 pl-md-5 bd-content my-3">
        <Img src="uploads/'.$row['photo'].'" style="max-width: 200px;"  id="path"></Img></main>


        ';
    }

} 
?> 