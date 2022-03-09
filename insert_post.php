<?php
session_start();
//database connection file
include("inc/config.php");

//take user to login if they are not logged in 
if(!(isset($_SESSION['userid']))){
    echo "<script>location='login.php'</script>";

}

$dbname="bigblog";
$dbhost="localhost";
$dbuser="root";
$dbpass="";

$connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$error=array();
$success="";


if(isset($_POST['submit'])){
    $test= mysqli_real_escape_string($connection, $_POST['title']);
    $seo= mysqli_real_escape_string($connection, $_POST['seo']);
    $content= mysqli_real_escape_string($connection, $_POST['content']);
    $category= mysqli_real_escape_string($connection, $_POST['category']);
    $pre= mysqli_real_escape_string($connection, $_POST['preview']);
    
    $pics = rand(1000, 1000) ."-". $_FILES['file']['name'];

    //allowed files
    $allowed = array("jpg", "jpeg", "gif", "png");

    //extension
    $extension = pathinfo($pics, PATHINFO_EXTENSION);
    #temporary name to store file
    $tname = $_FILES['file']['tmp_name'];
    #upload size
    $filesize = $_FILES['file']['size'];

    if(empty($test)){
        array_push($error, "Title Must be filled");
    }
    if(empty($seo)){
        array_push($error, "Seo Must be filled");
    }
    if(empty($category)){
        array_push($error, "Category Must be filled");
    }
    if(empty($content)){
        array_push($error, "Content Must be filled");
    }
    if(empty($pre)){
        array_push($error, "Preview Must be filled");
    }

    if($filesize > 30000000){
        array_push($error, "image size is too large, image should be less than 1mb");
    }  



    if(count($error) == 0){
        move_uploaded_file($tname, "uploads/".$pics);

        $query= "INSERT INTO posts(title, seo_title, content, author, preview, photo) VALUES ('$test', '$seo', '$content', '$category', '$pre', '$pics')";
        mysqli_query($connection, $query);
        
    
        $query= "SELECT id FROM posts WHERE seo_title='$seo'";
        $result=mysqli_query($connection, $query);
    
        $row=mysqli_fetch_array($result);
    
        echo"ID is" . $row[0];
        $post_id=$row[0];
        $category_array= explode(" ", $category);
    
        foreach($category_array as $el){
            $query="INSERT INTO has_category(posts, category) VALUES('$post_id','$el')";
            mysqli_query($connection, $query);
        }
        if(mysqli_query($connection, $query)){
            $success = "<div class='text-success text-center'> post was added successfully</div>";
        }else{
            $success = "<span class='text-danger'>failed".mysqli_error($connection)."</span>";
    
        } 
    }

}

if($connection){
    //echo "connected";
}else{
    echo "failed" . mysqli_connect_error();
}
?> 
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Festive&family=Indie+Flower&family=Kristi&family=Marck+Script&family=Patrick+Hand&family=Quintessential&family=Shizuru&family=Waterfall&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Font awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="">
    <?php include("inc/nav.php");?>
    <main class="content container py-2">
        <div class="row justify-content-center">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="reg_form" autocomplete="off" enctype="multipart/form-data">
            <h3 class="text-center">Upload Content</h3>
            <?php echo $success; ?>
            <?php
                foreach($error as $errors){
                    echo "<p class='text-danger text-center'>" . 
                    $errors . "<br>  </p>";

                }
            ?> 


                <input type="hidden" name="author" class="form-control" value="1">
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Title </label>
                    <input type="text" name="title" class="form-control" value="">
                </div>
                <div class="form-group row">
                    <label for="seo_title" class="col-sm-2 col-form-label">Seo_title </label>
                    <input type="text" name="seo" class="form-control" value="">
                </div>
                 <div class="form-group row">
                    <label for="Category" class="col-sm-2 col-form-label">Category </label>
                    <input type="text" name="category" class="form-control" value="">
                </div>
                <div class="form-group row">
                    <label for="Content" class="col-sm-2 col-form-label">Preview</label>
                    <input type="text" name="preview" class="form-control" >
                </div>   
                <div class="form-group row">
                    <label for="Content" class="col-sm-2 col-form-label">Content</label>
                    <input type="text" name="content" class="form-control" >
                </div>                
                <div class="form-group row">
                    <label for="passport">Photo: </label>
                    <input type="file"  name="file"
                    class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <input type="submit" name="submit" class="btn" style="   background: rgb(78, 72, 72); color:rgb(253, 214, 221);">
                </div>
            </form>
        </div>
    
    </main>
    <div class="bookmark">
        <button><a href="index.php">top</a></button>
      </div>
      <footer>
          <div class="bd-footer py-5 mt-5">
            <header class="text-center">By Joyce
              <i class="fa-duotone fa-trademark"></i>
              </header>
              <div class="container-fluid py-5">
                <div class="row" id="left">
                  <button> <a class="nav-link " id="on" href="index.php">HOME</a></button>
                  <button> <a class="nav-link " id="it" href="real.php">REALNESS</a></button>
                  <button> <a class="nav-link " id="of" href="life.html">LIFE</a></button>
                  <button> <a class="nav-link " id="or" href="logout.php">LOG OUT</a></button>
                </div>
  
              </div>
  
          </div>
      </footer>
    <!--Link to External javascript-->
    <script src="../public/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>