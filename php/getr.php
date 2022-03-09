<?php
function getPost(){
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
        <div class="col-md-4" >
        <div class="card mb-3 ml-3" style="max-width: 540px; text-align: justify;" id="bg">
            <img src="uploads/'.$row['photo'].'" class="card-img-top mx-5 my-4" id="image" alt="'.$row['title'].'" style="max-width: 300px; border: 2px solid #fff;">
            <div class="card-body">
              <h5 class="card-title" ><a href="./re.php?pid='.$row['id'].'" id="font">'.$row['title'].'</a></h5>
              <p class="card-text">'.$row['preview'].'</p>
              <p class="card-text"><small class="text-muted">'.$row['date'].'</small></p>

            </div>
          </div>
    </div>
        ';
    }

} 
?> 