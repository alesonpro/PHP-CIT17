<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demo</title>
</head>
<body>
    <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass);

        if($mysqli->connect_errno ) {
        printf("Connect failed: %s<br />", $mysqli->connect_error);
        exit();
        }
        printf('Connected successfully.<br />');
        $retval = mysqli_select_db( $mysqli, 'centralbank' );

        if(! $retval ) {
        die('Could not select database: ' . mysqli_error($mysqli));
        }
        echo "Database CentralBank selected successfully\n";
        $mysqli->close();
    ?>
</body>
</html>