<?php
    // This login system has vulnerables in sql injection attacks.
    // Pre-set the error displaying
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    // Import the database connection.
	include_once 'dbh.php';

    // Test the connection.
    if(!$conn){
        die("Connection failed! " . mysqli_connect_error());
    }
    // This is the query that tests user id and password has been created before.
    $sql = 'SELECT * FROM USER WHERE id = "'.$_POST['ID'].'" AND password = "'.$_POST['PW'].'"';

    // Take results to use the user name in the alert message.
    $result = mysqli_query($conn, $sql);
    // If there is no results then sending alert message "Login failed" or there is any value from the database except admin account then shows WELCOME sign.
    // Admin account will be sent to the special link that has the upload option.
    if($row = mysqli_fetch_assoc($result)){
        if($row['id'] == 'admin') {
            echo "<script> alert('You are the admin!. Upload page activated')</script>";
            echo '<script> location.href= "index1.html" </script>';
        }
        echo "<script> alert('WELCOME AGAIN! " . $row['firstName']. "')</script>";
        echo '<script> location.href= "index.html" </script>';
    }
    // When the login failed, message will be sent to the user.
    else {
        echo "<script> alert('Error: Login failed!')</script>";
        echo '<script> location.href= "login.html" </script>';
    }
    
    mysqli_close($conn);
?>

<!--This version is secured from the sql injections-->

<!--
    $conn = mysqli_connect($server, $username, $password, $dbname);
    
    if(mysqli_connect_error()){
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
    }
    
    $sql = "SELECT * FROM USER WHERE id = '?' AND password = '?'";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $_POST['ID'], $_POST['PW']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $result);

        if($result){
            echo "<script> alert('LOGIN SUCCESS!')</script>";
            echo '<script> location.href= "index.html" </script>';    
        }
        else {
            echo "<script> alert('Error: Login failed!')</script>";
            echo '<script> location.href= "login.html" </script>';
        }
    }
-->
