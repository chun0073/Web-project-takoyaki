<?php

    //connecting to dbh.php database
    include_once 'dbh.php';

    ini_set('display_errors',1);
    ini_set('display_startup_error',1);
    error_reporting(E_ALL);

?>

<!--
    start of html file
    -->
<!doctype html>
<html>
<head>
    <title>Takoyaki Go</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style_order.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="searchBar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<!--
    html seciton for navigation bar
    -->
    <section id="top-nav">
        <div class="topnav">
            <a class="active" href="index.html">Takoyaki Go</a>

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
    
    <section id="empty">
    </section>

    <!--html section to display menu-->
    <h3 id="pick-order" style="text-align:center;">Pick your Order!</h3>
    <section id="seafood">
        
        <?php

        //php file to get data from PRODUCT table
            $sql = "SELECT * FROM PRODUCT;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);


            //if statement to check if table contains data
            //and get all datas from PRODUCT table
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<div class="container">';
                    echo '<div class="sub-container">';
                    echo '<div class="item-top">';
                    echo '<a href="'.$row['p_Link'].'"><img  class="item" src="'.$row['p_Image'].'"></a>';
                    echo '<h4 class="title"><a href="'.$row['p_Link'].'">'.$row['p_Name'].'</a></h4>';
                    echo '<p class="caption">Main ingredients: '.$row['p_Ingredient'].'</p>';
                    echo '<p class="caption">Price: '.$row['p_Price'].'</p>';
                    echo '<p class="caption"">Rating: '.$row['p_Rating'].'</p>';
                // echo '<input type="submit" value="Add to order">
                    echo'</div><br></div>';
                }
            }

    ?>
    </section>

    <!--HTML section for footer of page
        -->
    <section id="link">
        <div class="link">
            <br />
            <br />
            <h3>Follow us!</h3>
            <div class="row contact">
                <div class="icon">
                    <i class="fa fa-link" aria-hidden="true"></i>
                    <a href="https://www.instagram.com/takoyakitogo/"><img src="img\insta.jpg" id="insta" /></a>
                </div>
            </div>
        </div>
    </section>
 
</body>
</html>