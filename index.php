<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Welcome to aikaa!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body background="wall2.png">
    <center>
        <h1><font face="Verdana" color="white">aikaa!</font></h1>
        <p><font color="white">aikaa helps you to connect to various people in your domain.</font></p>
        <hr>
        <form method = "post">
            <input type = "text" name = "username" placeholder = "username = admin" required autofocus></br>
            <input type = "password" name = "password" placeholder = "password = 1234" required><br>
            <input type = "submit" name = "login" value="Login">
        </form>
 
            <?php
                if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                    $x1=$_POST['username'];
                    $x2=$_POST['password']; 
                    $con=mysqli_connect("127.0.0.1", "root", "", "aikaa");
                    if (mysqli_connect_errno($con))
                    {
                        echo "MySql Error: " . mysqli_connect_error();
                    }

                    $query=mysqli_query($con,"SELECT * FROM login WHERE username='$x1' && password='$x2'");
                    $count=mysqli_num_rows($query);
                    $row=mysqli_fetch_array($query);

                    if ($count==1)
                    {
                        session_start();
                        $_SESSION['username'] = $x1;
                        //$_SESSION['password'] = $x2;
                        header("location: newsfeed.php");
                        }
                    else
                    {
                        echo "Invalid username or password";
                    }   

                    mysqli_close($con);
                }
            ?>
           
        <a href="register.php">Register Now</a>
            
    </center>
    </body>
</html>