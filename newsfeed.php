<html>
    <head>
        <title>
            Aikaa!
        </title>
    </head>
    <body background="wall.jpg">
    <center>
        <marquee><h1><font face="Verdana" color="Blue">Aikaa Newsfeed</font></h1></marquee>
        <hr>
        <a href="profile.php"> My Profile </a><br><br>
        <a href="domainppl.php">People on Domain</a>
        <form method='POST' enctype="multipart/form-data">
            <p>Write something here!</p><br>
            <textarea name='body' rows='5' columns='160'></textarea>
            <p>Select image to upload:</p><br>
            <input type="file" name="uploadedimage"/><br>
            <input type="submit" name="submit" value="Post"/>

        </form>
        
        <?php
        session_start();
       
        if(isset($_POST["submit"])){
            $x1=$_SESSION['username'];
            $body=$_POST["body"];
            
                $con=mysql_connect("127.0.0.1", "root", "");
                if(!$con) die("Unable to access server!");

                mysql_select_db("aikaa");
                function GetImageExtension($imagetype)
                {
                  if(empty($imagetype)) return false;
                  switch($imagetype)
                  {
                      case 'image/bmp': return '.bmp';
                      case 'image/gif': return '.gif';
                      case 'image/jpeg': return '.jpg';
                      case 'image/png': return '.png';
                      default: return false;
                  }
                }
      
      
                if (!empty($_FILES["uploadedimage"]["name"])) {

                    $file_name=$_FILES["uploadedimage"]["name"];
                    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
                    $imgtype=$_FILES["uploadedimage"]["type"];
                    $ext= GetImageExtension($imgtype);
                    $imagename=date("d-m-Y")."-".time().$ext;
                    $target_path = "images/".$imagename;

                if(move_uploaded_file($temp_name, $target_path)) {

                    $query_upload="INSERT into feed (username,body,images_path,submission_date) VALUES
                ('$x1', '$body','$target_path','".date("Y-m-d")."')";
                    mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error()); 

                }
                else{
                   exit("Error While uploading image on the server");
                }
                }
        }
    
        ?>
        <p><strong>Posts from people on your domain</strong></p>
        <?php
            $con=mysql_connect("127.0.0.1", "root", "","aikaa");
            if(!$con) die("Unable to access server!");
            mysql_select_db('aikaa',$con) or die ('SELECT FAIL'.E_USER_ERROR);

            //Get image data from database
            $result = mysql_query("SELECT * FROM feed ORDER BY images_id DESC");
            $rows=mysql_num_rows($result);
            for($j=0;$j<$rows;$j++){
                $row=mysql_fetch_row($result);
                echo '<strong>@'.$row[1].'</strong><br>';
                echo $row[2].'<br>';
                echo 'Posted on: '.$row[4].'<br>';
                echo'<img src="'.$row[3].' "width=300 height=300 alt="" /><br>';
            }
            

//         
        ?>

    </center>
    </body>
</html>