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
    <body background="wall.jpg">
    <center>
        <a href="index.php"> <h1><font face="Verdana" color="red">aikaa!</font></h1> </a>
        <p><font color="blue">Register now!</font></p>
        <hr>
        <form method = "post">
            <input type = "text" name = "name" placeholder = "Enter your name here" required autofocus></br>
            <input type = "text" name = "email" placeholder = "Enter your email ID" required autofocus></br>
            <input type = "text" name = "username" placeholder = "Select Username" required autofocus></br>
            <input type = "password" name = "password" placeholder = "Choose your password" required><br>
            <input type = "date" name = "dob" placeholder = "Enter Date of Birth" required autofocus></br>
            <input type = "submit" name = "register" value="Register">
             <?php
                if (isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['password'])&& !empty($_POST['email'])&& !empty($_POST['name'])&& !empty($_POST['dob'])) {
                    $con=mysqli_connect('localhost','root','','aikaa');
                    $x1=$_POST['username'];
                    $x2=$_POST['name'];
                    $x3=$_POST['email'];
                    $x4=$_POST['dob'];
                    $x5=$_POST['password'];

                    
                    $result = mysqli_query($con,"insert into userdata (username, name, email, age) values('$x1','$x2','$x3','$x4')");
                    $result2 = mysqli_query($con,"insert into login values('$x1','$x5')");
                    if($result>0&&$result2>0)
                         echo '<br>Account Created Successfully';
                    else
                         echo '<br>Account not created, please try again later!';
                    mysqli_close($con);

                } 
            ?>
        </form>            
    </center>
    </body>
    
</html>
