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
                  require_once("./php/getr.php");
                  getPost();
                ?>
            </div>
        </div>
      


                
          </div>
      </div>
    </section>
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
                <button> <a class="nav-link " id="or" href="logout.php">LOG OUT</a></button>
              </div>

            </div>

        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>