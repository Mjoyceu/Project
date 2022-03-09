<?php include("insert_comment.php");?>
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
<body>
  <marquee behavior="" direction="left" class="big">You have arrived why not stay👧💕💕</marquee>
    <header class="text-center">By Joyce
    <i class="fa-duotone fa-trademark"></i>
    </header>
    <ul class="nav justify-content-center my-3 ">
        <li class="nav-item">
          <a class="nav-link " href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="real.php">REALNESS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="life.html">LIFE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="talk.html">TALK TO US</a>
        </li>
    </ul>
    <section class="">
        <div class="container-fluid my-5 mx-1" id="first">
            <div class=" my-3" style="text-align:center;" >
                <?php 
                  require_once("./php/getp.php");
                  getMainPost();
                ?>
            </div>
        </div>
      


                
          </div>
      </div>
    </section>
    
    <main class="content container py-2">
        <div class="row justify-content-center">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="reg_form" autocomplete="off" enctype="multipart/form-data">
            <h3 class="text-center">Upload Comment</h3>

            <?php echo $success; ?>
            <?php
                foreach($error as $errors){
                    echo "<p class='text-danger text-center'>" . 
                    $errors . "<br>  </p>";

                }
            ?> 
                <input type="hidden" name="author" class="form-control" value="1">
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Name </label>
                    <input type="text" name="title" class="form-control" value="">
                </div>
                <div class="form-group row">
                    <label for="seo_title" class="col-sm-2 col-form-label">Comment </label>
                    <input type="text" name="comment" class="form-control" value="">
                </div>

                <div class="form-group text-center">
                    <input type="submit" name="submit" class="btn" style="   background: rgb(78, 72, 72); color:rgb(253, 214, 221);">
                </div>
            </form>
        </div>
    
    </main>
    <div class ="Container-fluid pl-5 mx-4" id="first">
        <h3 class="text-center text-secondary my-2">Comments</h3>
        <?php
        $sql= "SELECT * FROM comments";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                ?>
            <div >
                <div class="row">
                <label for="Name">Name:</label>
                <p class="mx-2" style="font-family: 'Bree+Serif', cursive; font-size:15px;   color: rgb(46, 15, 15);"><?php echo $row['name']; ?></p>
                </div>

                <div class="row">
                <label for="Comment" class="">Comment:</label>
                <p class="mx-2"><?php echo $row['comment']; ?></p>
                </div>

            </div>
        <?php
            }
        }
        ?>


    </div>
    <div class="bookmark">
      <button><a href="../public/life.html">top</a></button>
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
                <button> <a class="nav-link " id="or" href="talk.html">Talk to us</a></button>
                
              </div>

            </div>

        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>