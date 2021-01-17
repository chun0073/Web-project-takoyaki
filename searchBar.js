// javascript
/**
 * This function goSearch() is used for the search bar placed in navigate bar section.
 * This function will add arguments to the url which directs to the search page.
 * */
function goSearch() {
    var argument = document.getElementById("searchText").value;
    var link = "search.html?search=" + argument + "";
    location.href = link;
}
/**
 * This function goSearch() is used for the search bar placed in the search page.
 * This function will add arguments to the url which is used by refreshing the page.
 * */
function goSearch2() {
    var argument = document.getElementById("searchBar2").value;
    var link = "search.html?search=" + argument + "";
    location.href = link;
}
/**
 * This function goProduct() is used for the buttons in the promotion page.
 * This function will add an argument to the url which directs to the product page.
 * */
function goProduct(name) {
    var arg = "" + name;
    var link = "product.html?" + arg + "";
    location.href = link;
}