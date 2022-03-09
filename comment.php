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