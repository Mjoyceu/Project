<?php
session_start();
//database connection file
include("inc/config.php");

//take user to login if they are not logged in 
if(!(isset($_SESSION['userid']))){
    echo "<script>location='ad.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require("inc/nav.php"); ?>
    <div class="row p-5">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Admins</h5>
                    <p class="card-text">
                        <?php
                        $sql= mysqli_query($connection, "SELECT * FROM Admin");
                        echo mysqli_num_rows($sql);
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="view" >
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number of Posts</h5>
                    <div class="card-text">
                    <?php
                        $sql= mysqli_query($connection, "SELECT * FROM posts ");
                        echo mysqli_num_rows($sql);
                        ?>
                    </div>
            </div>
        </div>

        
        </div>
        </div>
        


    </div>

    <div class="row p-5">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">All Admins Requests</h5>
                    <table class=" table table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname </th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql ="SELECT * FROM Admin WHERE status ='pending'";
                                $re= mysqli_query($connection, $sql);
                                while($row = mysqli_fetch_assoc($re)){
                                    ?>
                                    <tr>
                                    <th><?php echo $row['id']?></th>
                                    <th><?php echo $row['name']?></th>
                                    <th><?php echo $row['phone']?></th>
                                    <th><?php echo $row['email']?></th>
                                    <th><?php echo $row['status']?></th>
                                    <th>
                                        <form action="dash.php" method="post">
                                            <input type="hidden" name="id" class="form-control" value=<?php echo $row['id']?>>
                                            <input type="submit" name="approve" class="form-control" value="Approve" >
                                            <input type="submit" name="deny" class="form-control" value="Deny" >
                                        </form>
                                    </th>
 
                                </tr>
                                <?php
                                 }


                                 ?>
                        </tbody>

                        <?php

                            if(isset($_POST['approve'])){
                                $id= $_POST['id'];
                                $ap="approved!";
                                $sel="UPDATE admin SET status = '$ap' WHERE id='$id' ";
                                $result= mysqli_query($connection, $sel);

                                echo "approved!";
                            }

                            if(isset($_POST['deny'])){
                                $id= $_POST['id'];
                                $sec="DELETE FROM admin WHERE id='$id'";
                                $result= mysqli_query($connection, $sec);

                                echo "denied!";
                            }
                        ?>
                    </table>
                </div>
            </div>

        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>