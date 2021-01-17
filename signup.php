<?php
    // Pre-set the error displaying.
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    // Import the database connection.
	include_once 'dbh.php';

    // Test the connection.
    if(!$conn){
        die("Connection failed! " . mysqli_connect_error());
    }
    
    // The query is testing whether inputed user id is unique or not.
    $sql0 = 'SELECT * FROM USER WHERE id = "'.$_POST['id'].'"';
    $result = mysqli_query($conn,$sql0);

    // If the user id has been created before, then the error message will be showed up and re-loading the page again.
    if($row = mysqli_fetch_assoc($result)) {
        echo "<script> alert('ID occupied')</script>";
        echo '<script> location.href= "signup.html" </script>';
    }
    else {
        // If the user id is unique, then the user data will be stored and the new account will be created.
        $sql = 'Insert into USER (firstName, lastName, email, country, address, postal, id, password) values 
        ("'.$_POST['firstName'].'","'.$_POST['lastName'].'","'.$_POST['Email'].'","'.$_POST['Country'].'","'.$_POST['Address'].'","'.$_POST['postalcode'].'","'.$_POST['id'].'","'.$_POST['passwd'].'")';
        
        // If conductiong the sql query successed or not, the user will get the messages.
        if(mysqli_query($conn, $sql)){
        // This $last_id indicates the last created id.
            $last_id = mysqli_insert_id($conn);
            echo "<script> alert('New account created successfully " . $last_id. "')</script>";
            echo '<script> location.href = "login.html" </script>';
        } else {
            echo "<script> alert('Invalid User inputs')</script>";
            echo '<script> location.href= "signup.html" </script>';
        }
    }
    mysqli_close($conn);
?>