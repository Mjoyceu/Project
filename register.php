<?php
//database connection file
include("inc/config.php");

$fullname = "";
$email = "";
$phone = "";
$success = "";
$error = array();

//if file is submitted
if(isset($_POST['submit'])){
    //sanitize user input
    $fullname= mysqli_real_escape_string($connection, $_POST['fullname']);
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $phone= mysqli_real_escape_string($connection, $_POST['phone']);
    $pass= mysqli_real_escape_string($connection, $_POST['password']);
    $confirmpassword= mysqli_real_escape_string($connection, $_POST['confirmpassword']);

    $sql="SELECT * FROM Admin where email='$email'";

    $query= mysqli_query($connection, $sql);

    
    //let's check for errors in the file
    if(empty($fullname)){
        array_push($error, "fullname cannot be empty");
    }
    if(empty($email)){
        array_push($error, "email cannot be empty");
    }
    if(empty($phone)){
        array_push($error, "phone number cannot be empty");
    }
    if(($pass != $confirmpassword)){
        array_push($error, "Two passwords donot match");
    }
    if(mysqli_num_rows($query)>0){
        array_push($error, "Email have been taken");
    }


    //if there are no errors in the form then continue
    if(count($error)==0){
        //encrypt password
        $password = md5($pass);

            //insert into database

        $insert = "INSERT INTO Admin(name, email, phone, password, status) VALUES('$fullname', '$email', '$phone' , '$password', 'pending')";

        if(mysqli_query($connection, $insert)){
        $success = "<span class = 'text-dark'> Registered successfully. Request pending.</span>";
        }else{
        $success= "<span class = 'text-danger'>failed</span>";
        }
    }


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
    <div class="row justify-content-center my-3">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="reg_form px-5 " autocomplete="off" style="background:rgb(253, 214, 221);">
        <h1 class="text-center">Register</h1>
        <?php echo $success;?>
        <?php
            foreach($error as $errors){
                echo "<p class='text-danger text-center'>". $errors . "<br> </p>";

            }
        ?>

        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" class="form-control" value="<?php
            echo $fullname?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="phone" name="phone" class="form-control" value="<?php echo $phone?>">
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="confirmpassword">confirm password</label>
            <input type="password" name="confirmpassword" class="form-control">    
        </div>
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn" style="background: rgb(78, 72, 72); color:rgb(253, 214, 221);">
        </div>
        <div class="text-center">
            <a href="login.php"style="color:rgb(78, 72, 72)">Already have an account, Login</a>
        </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>