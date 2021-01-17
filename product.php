<?php
    // Set displaying errors.
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	// Import a database connection.
	include_once 'dbh.php';

    // Make a query that return a specific menu data.
    $sql = 'SELECT * FROM PRODUCT
			WHERE p_Name LIKE "%'.$_GET['name'].'%"
			';
    // get results from the database
    $result = mysqli_query($conn, $sql);
    
?>
<!doctype html>
<html>
<head>
    <title>Takoyaki Go</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style_product.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="searchBar.js"></script>
    
</head>

<body>
    <section id="top-nav">
        <div class="topnav">
            <a class="active" href="index.html">Takoyaki Go</a>
            <a href="index.html#about">About</a>
            <a href="order.php">Menu</a>
            <a href="index.html#promotion">Promotion</a>
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
        <div class="Name">

        </div>
    </section>

    <section onload="productMain()" id="product">
        <!--
        display a result below
        -->
        <?php
        // check the row is fetched successfully.
        if($row=mysqli_fetch_assoc($result)){
        echo '<div class="food">';
                            echo '<h2 >'.$row['p_Name'].'</h2>';
                            echo '<p id="ing">Main ingredients: '.$row['p_Ingredient'].'</p>';
				            echo '<p id="price">Price: '.$row['p_Price'].'</p>';
				            echo '<p id="rating">Rating: '.$row['p_Rating'].'</p>';
                            echo '<img  id="img-product" src="'.$row['p_Image'].'"></img></div>';
        }
        ?>
        <div class="product-container">
            <div class="option">

                <div class="option-top">
                    <form>
                        <br /><br />
                        <label for="Quantity">Quantity: &nbsp;</label>
                        <select id="Quantity" onchange="getQuantity()" name="Quantity">
                            <option>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select><br /><br />
                        <input type="radio" />
                        <label for="seaweed">Seaweed: &nbsp;</label><br /><br />

                        <input type="radio" />
                        <label for="Katsuobushi">Katsuobushi: &nbsp;</label><br /><br />

                        <input type="radio" />
                        <label for="Extra">Extra Sauce: &nbsp;</label><br /><br />

                        <button id="send">Place Order</button>

                        <p id="desc_text">
                            Dashi flavoured batter, octupos, beni shoga (stocked red ginger)
                            green onion, tenkatsu (tempura scraps), and cabbage<br>
                            Add a choice of spicy sause.<br><br>
                        </p>

                    </form>
                </div>
            </div>
        </div>
        
    </section>
    <section id="description">
        <div class="ingredient">

            <div class="ingred">
                <img id="ingre-img" src="img/batter.jpg" />
                <p>Dashi batter</p>
            </div>

            <div class="ingred">
                <img id="ingre-img" src="img/ingredient_octopus.jpg" />
                <p>Octopus</p>
            </div>

            <div class="ingred">
                <img id="ingre-img" src="img/cabbage.jpg" />
                <p>Minced cabbage</p>
            </div>
        </div>

        <p id="desc_text">
            Dashi flavoured batter, octupos, beni shoga (stocked red ginger)
            green onion, tenkatsu (tempura scraps), and cabbage<br>
            Add a choice of spicy sause.<br />

        </p>
    </section>
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