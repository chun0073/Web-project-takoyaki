<?php
    // Set displaying errors.
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	// Import a database connection.
	include_once 'dbh.php';

	// Test a sending keyword that is sent from the ajax is true or not.
	// %_POST has keys such as SENDING(true), sort, filter, 0, 1, ...
	if(isset($_POST['SENDING'])){
		// The query that search for the first data (['0']) is set.
		$sql = '
				SELECT * FROM PRODUCT
				WHERE p_Name LIKE "%'.$_POST['0'].'%"
				AND p_Price < '.$_POST['filter'].' AND p_Rating <= '.$_POST['filter1'].'
				OR p_Type LIKE "%'.$_POST['0'].'%"
				AND p_Price < '.$_POST['filter'].' AND p_Rating <= '.$_POST['filter1'].'
				OR p_Ingredient LIKE "%'.$_POST['0'].'%"
				AND p_Price < '.$_POST['filter'].' AND p_Rating <= '.$_POST['filter1'].'
				';
		// Test the length of $_POST to check it has something more to search for.		
		$len = count($_POST);
		// If $_POST has more than 5 key&values, that means there are something more to search for.
		if($len > 5) {
			for ($i = 1; $i < $len-4; ++$i){
			// This query is for the additional keys.
			$sql .= 'OR p_Name LIKE "%'.$_POST[$i].'%"
				AND p_Price < '.$_POST['filter'].' AND p_Rating <= '.$_POST['filter1'].'
				OR p_Type LIKE "%'.$_POST[$i].'%"
				AND p_Price < '.$_POST['filter'].' AND p_Rating <= '.$_POST['filter1'].'
				OR p_Ingredient LIKE "%'.$_POST[$i].'%"
				AND p_Price < '.$_POST['filter'].' AND p_Rating <= '.$_POST['filter1'].'
			';
			}
		}
		// If the sort key has value rather than null, then below codes will activated with a value of the sort key.
		if($_POST['sort'] != 'null') {
			$sql .= ' ORDER BY '.$_POST['sort'];
		}
		
		// Return the result from the database using by the sql query.
        $result = mysqli_query($conn, $sql);
		
		// This while loop returns all the required products from the database.
		while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li class="food">';
                            echo '<h2 ><a href="'.$row['p_Link'].'">'.$row['p_Name'].'</a></h2>';
                            echo '<p id="ing">Main ingredients: '.$row['p_Ingredient'].'</p>';
				            echo '<p id="price">Price: '.$row['p_Price'].'</p>';
				            echo '<p id="rating">Rating: '.$row['p_Rating'].'</p>';
                            echo '<a href="'.$row['p_Link'].'"><img  id="search-img" src="'.$row['p_Image'].'"></img></a></li>';
		}
		
	}
	else{
		// It means that ajax has been failed.
		echo "Js searchData method doesn't work";	
	}
?>