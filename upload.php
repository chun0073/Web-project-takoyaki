<?php

    //connecting to dbh.php database
     include_once 'dbh.php';

    ini_set('display_errors',1);
    ini_set('display_startup_error',1);
    error_reporting(E_ALL);


    //if statement to check if a submit to upload is being attempted
    if(isset($_POST['submit'])){

        //if statement to check is copying image to an image is successful
        //i return true execute insert to database query.
        if(move_uploaded_file($_FILES['image']['tmp_name'], 'menu-img/' . $_FILES['image']['name'])){
            
            $name = $_POST['menu-name'];
            $type = $_POST['menu-type'];
            $ing = $_POST['menu-ingredient'];
            $price = $_POST['menu-price'];
            $rating = $_POST['menu-rating'];
            $img = $_FILES['image']['name'];
    
            $insert1 = "INSERT INTO PRODUCT (p_Name, p_Type, p_Ingredient, p_Price, p_Rating, p_Image, p_Link) VALUES ('$name', '$type', '$ing', ' $price', '$rating', 'menu-img/$img', 'product.php?name=$name');";
            
            mysqli_query($conn, $insert1);
            echo "<script>alert('Upload complete!')</script>";
    
        }else{
            echo "Bad!";
        }
    }

?>

<!doctype html>
<html>
<head>
    <title>Takoyaki Go</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style_upload.css" />
    <link rel="stylesheet" href="style_search.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="searchBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <section id="top-nav">
        <div class="topnav">
            <a class="active" href="index1.html#home">Takoyaki Go</a>
            <a href="index1.html#about">About</a>
            <a href="order.php">Menu</a>
            <a href="index1.html#promotion">Promotion</a>
            <a href="login.html">Login</a>
            <a href="cart.html">Cart</a>
            <div class="search-container">
                <form action="search.html">
                    <input type="text" placeholder="Search.." name="search" id="searchText">
                    <button type="button" onClick="goSearch()" id="searching"><img class="" src=""></button>
                </form>
            </div>
        </div>
    </section>
    
    <!--HMTL div area for user to upload new menu-->
    <div class="div-upload">
        <form class="form-upload" method = "POST" enctype="multipart/form-data"> 
            <label>Add new menu!</label>
            <br>
            <br>
            <input type="text" name="menu-name" placeholder="Menu name"></input>
            <input type="text" name="menu-type" placeholder="Menu type"></input>
            <input type="text" name="menu-ingredient" placeholder="Ingredient"></input>
            <input type="text" name="menu-price" placeholder="Price"></input>
            <input type="text" name="menu-rating" placeholder="Rating"></input>
            <br>
            <input type="file" id="new-menu" name="image"></input>
            <br>
            <br>
            <input type="submit" name="submit">    
        </form>
    </div>

    <section id="searchResult">
    
        <?php

            //select query to get data from PRODUCT table
            //and will display the new uploaded menu after the upload is successful
            $sql = "SELECT * FROM PRODUCT;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            echo '<div class="result">';
            

            //if statement to check if table contains data
            //and get all datas from PRODUCT table
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {


                    echo '<li class="food">';
                    echo '<h2 ><a href="'.$row['p_Link'].'">'.$row['p_Name'].'</a></h2>';
                    echo '<p id="ing">Main ingredients: '.$row['p_Ingredient'].'</p>';
                    echo '<p id="price">Price: '.$row['p_Price'].'</p>';
                    echo '<p id="rating">Rating: '.$row['p_Rating'].'</p>';
                    echo '<a href="'.$row['p_Link'].'"><img  id="search-img" src="'.$row['p_Image'].'"></img></a></li>';

                    echo "<br>";
                }
            }
            
            echo '</div>';

            ?>
    </section>

        
</body>
</html>