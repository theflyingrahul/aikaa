<html>
    <head>
        <title>
            My Profile
        </title>
    </head>
    <body background="wall2.png">
    <center>
        <?php
            session_start();
            
            $con=mysqli_connect("127.0.0.1", "root", "", "aikaa");
            if (mysqli_connect_errno($con))
            {
                echo "MySql Error: " . mysqli_connect_error();
            }
            $x1=$_SESSION['username'];
            $query=mysqli_query($con,"SELECT * FROM userdata WHERE username='$x1'");
            if (mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) {
                    echo '<h1>Welcome '.$row["name"]."</h1>to aikaa!";
                    echo '<h4>@'.$row["username"]."</h4>";
                    echo '<p>'.$row["email"]."</p>";
                    echo $row["age"]."<br>";

                    

                    
                }
            } 
        ?>
        
    </center>
    </body>
</html>