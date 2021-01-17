// product script

//passing link to variale argProduct
const argProduct = document.location.href.split('?')[1];

//set default quantity value to 1
var quantity = 1;

//variables for each menu
var octupos = {
	id: "octupos", name: "Octupos", type: "takoyaki", ingredient: ["octupos", "egg", "flour", "dashi", "cream"], rating: 4, price: 10, image: "menu-img/takoyaki-octupos1.jpg", link: "index.html"
};
var squid = {
	id: "squid", name: "Squid", type: "takoyaki", ingredient: ["squid", "egg", "flour", "dashi", "cream"], rating: 5, price: 9, image: "menu-img/takoyaki-squid.jpg", link: "index.html"
};
var mix = {
	id: "seafood", name: "Seafood mix", type: "takoyaki", ingredient: ["squid", "crab", "flour", "shrimp"], rating: 3, price: 15, image: "menu-img/takoyaki-menu5.jpg", link: "index.html"
};
var shrimp = {
	id: "shrimp", name: "Shrimp", type: "takoyaki", ingredient: ["shrimp", "onion", "flour", "octopus", "cream"], rating: 4, price: 12, image: "menu-img/takoyaki-shrimp.jpg", link: "index.html"
};
var kimchi = {
	id: "kimchi", name: "Kimchi", type: "takoyaki", ingredient: ["kimchi", "onion", "flour", "cabbage"], rating: 5, price: 6, image: "menu-img/takoyaki-kimchi.jpg", link: "index.html"
};
var crab = {
	id: "crab", name: "Crab", type: "takoyaki", ingredient: ["crab", "onion", "flour", "cream", "green onion"], rating: 4, price: 13, image: "menu-img/takoyaki-crab.jpg", link: "index.html"
};
var cheese = {
	id: "cheese", name: "Cheese", type: "takoyaki", ingredient: ["cheese", "flour", "dashi", "cream"], rating: 5, price: 11, image: "menu-img/takoyaki-cheese.jpg", link: "index.html"
};
var vege = {
	id: "vege", name: "Vegetarian mix", type: "takoyaki", ingredient: ["kimchi", "cheese", "cabbage", "cream"], rating: 4, price: 15, image: "menu-img/takoyaki-menu8.jpg", link: "index.html"
};
var classic = {
	id: "classic", name: "Classic", type: "japadog, hotdog", ingredient: ["sausage", "nori", "mayo", "menegi"], rating: 4, price: 5, image: "img-japadog/japadog.jpg", link: "index.html",
};
var kani = {
	id: "kani", name: "Kani", type: "japadog, hotdog", ingredient: ["crab", "sausage", "mayo", "cream"], rating: 4, price: 13, image: "img-japadog/japadog-2.jpg", link: "index.html"
};
var spicyCheese = {
	id: "cheese-spicy", name: "Spicy Cheese", type: "japadog, hotdog", ingredient: ["spicy mayo", "cheese", "saussage"], rating: 5, price: 12, image: "img-japadog/japadog-4.jpg", link: "index.html"
};
var ebi = {
	id: "ebi", name: "Ebi dog", type: "japadog, hotdog", ingredient: ["ebi", "shrimp", "mayo", "cream"], rating: 5, price: 9, image: "img-japadog/japadog-1.jpg", link: "index.html"
};
var cheeseDog = {
	id: "cheeseDog", name: "Cheese dog", type: "japadog, hotdog", ingredient: ["bonito", "cheese", "green onion", "cream"], rating: 4, price: 8, image: "img-japadog/japadog-3.jpg", link: "index.html"
};

//food array holds above objects. It will go through for loops to be accessed.
var food = [shrimp, kimchi, crab, squid, mix, octupos, cheese, vege, classic, kani, spicyCheese, ebi, cheeseDog];

//variable object that get argument from search function
var obj = search(argProduct);

//function main that will get elements based from obj search result
function productMain() {
	
	var cont = obj[0].name;
	document.getElementById('pd-name').innerHTML = cont;

	var contPrice = obj[0].price * quantity;
	document.getElementById('price').innerHTML = "CND$ "+contPrice;
	
	var contDescription = obj[0].ingredient;
	document.getElementById('desc_text').innerHTML = "Ingredients: "+ contDescription;

	document.getElementById('img-product').src = obj[0].image;

	var contRate = obj[0].rating;
	var stringHTML = rating(contRate);
	document.getElementById('stars').innerHTML = stringHTML;
}

//function getQuantity that will get the quantity from HTML quantity selector
function getQuantity() {
	quantity = document.getElementById('Quantity').value;
	productMain();
}

/**function search that will loop through food array
then checks if link contains the food, if returns true 
returns food as result**/
function search(argu) {
	var result = [];
	for (i = 0; i < food.length; i++) {
		if (food[i].id.includes(argu)) {
			result.push(food[i]);
		}
	}
	return result;
}

//function rating to check if ratings is less 5
//then return number of stars based on number of ratings
function rating(rating)
{
   var stringHTML = "";
   for (i=0; i<rating; i++){
       stringHTML+= '<span class="fa fa-star checked"></span>'
   }
   return stringHTML;
}

//called productMain function 
productMain();