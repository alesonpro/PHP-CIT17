<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demo</title>
</head>
<body>
    <?php
        // $dbhost = 'localhost';
        // $dbuser = 'root';
        // $dbpass = '';
        // $mysqli = new mysqli($dbhost, $dbuser, $dbpass);

        // if($mysqli->connect_errno ) {
        // printf("Connect failed: %s<br />", $mysqli->connect_error);
        // exit();
        // }
        // printf('Connected successfully.<br />');
        // $retval = mysqli_select_db( $mysqli, 'centralbank' );

        // if(! $retval ) {
        // die('Could not select database: ' . mysqli_error($mysqli));
        // }
        // echo "Database CentralBank selected successfully\n";
        // $mysqli->close();


        // $dbhost = 'localhost';
        // $dbuser = 'root';
        // $dbpass = '';
        // $dbname = 'centralbank';
        // $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        // if($mysqli->connect_errno ) {
        // printf("Connect failed: %s<br />", $mysqli->connect_error);
        // exit();
        // }
        // printf('Connected successfully.<br />');
        // $sql = "CREATE TABLE user( ".
        // "id INT NOT NULL AUTO_INCREMENT, ".
        // "user_name VARCHAR(100) NOT NULL, ".
        // "user_age INT NOT NULL, ".
        // "birthdate DATE, ".
        // "PRIMARY KEY (id))";
        // if ($mysqli->query($sql)) {
        // printf("Table users created successfully.<br />");
        // } else {
        // printf("Could not create table: %s<br />", $mysqli->error);
        // }
        // $mysqli->close();


        if(isset($_POST['add'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            if(! get_magic_quotes_gpc() ) {
               $tutorial_title = addslashes ($_POST['tutorial_title']);
               $tutorial_author = addslashes ($_POST['tutorial_author']);
            } else {
               $tutorial_title = $_POST['tutorial_title'];
               $tutorial_author = $_POST['tutorial_author'];
            }
            $submission_date = $_POST['submission_date'];
            $sql = "INSERT INTO tutorials_tbl ".
               "(tutorial_title,tutorial_author, submission_date) "."VALUES ".
               "('$tutorial_title','$tutorial_author','$submission_date')";
            mysqli_select_db( $conn, 'TUTORIALS' );
            $retval = mysqli_query( $conn, $sql );
         
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
            echo "Entered data successfully\n";
            mysqli_close($conn);
         } else {
      ?>  
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Tutorial Title</td>
               <td><input name = "tutorial_title" type = "text" id = "tutorial_title"></td>
            </tr>         
            <tr>
               <td width = "250">Tutorial Author</td>
               <td><input name = "tutorial_author" type = "text" id = "tutorial_author"></td>
            </tr>         
            <tr>
               <td width = "250">Submission Date [   yyyy-mm-dd ]</td>
               <td><input name = "submission_date" type = "text" id = "submission_date"></td>
            </tr>      
            <tr>
               <td width = "250"> </td>
               <td></td>
            </tr>         
            <tr>
               <td width = "250"> </td>
               <td><input name = "add" type = "submit" id = "add"  value = "Add Tutorial"></td>
            </tr>
         </table>
      </form>
   <?php
      }

        $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
     }
     echo 'Connected successfully<br />';
     
     mysqli_select_db( $conn, 'centralbank' );
     $sql = "SELECT tutorial_id, tutorial_title, tutorial_author, submission_date FROM tutorials_tbl";
     $retval = mysqli_query( $conn, $sql );
     if(! $retval ) {
        die('Could not get data: ' . mysqli_error($conn));
     }
     
     while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
        echo "Tutorial ID :{$row['tutorial_id']}  ".
           "Title: {$row['tutorial_title']} ".
           "Author: {$row['tutorial_author']} ".
           "Submission Date : {$row['submission_date']} ".
           "--------------------------------";
     } 
     echo "Fetched data successfully\n";
     mysqli_close($conn);
   ?>
    
</body>
</html>