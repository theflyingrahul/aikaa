<html>
    <head>
        <title>People</title>
    </head>
    <body background="wall2.png">
    <center>
        <h1>People on your domain</h1><hr>
        <?php
            $con=mysql_connect("127.0.0.1", "root", "","aikaa");
            if(!$con) die("Unable to access server!");
            mysql_select_db('aikaa',$con) or die ('SELECT FAIL'.E_USER_ERROR);
            $result = mysql_query("SELECT name FROM userdata");
            $rows=mysql_num_rows($result);
            for($j=0;$j<$rows;$j++){
                $row=mysql_fetch_row($result);
                echo '<h4>'.$row[0].'</h4>';
            }
        ?>
    </center>
    </body>
</html>