// javascript
/**
 * arg will hold arguments separated from the url.
 * */
const arg = "" + document.location.href.split("=")[1];
/**
 * arg1 holds arguments in an array.
 * */
const arg1 = arg.split("+");
/**
 * foods is a section which will take final results.
 * */
const foods = document.getElementById('foods');
/**
 * sorted is a flag which default value is a blank.
 * */
var sorted = null;
/**
 * priceFiltered holds 99 before assigning
 * */
var priceFiltered = 99;
/**
 * ratingFiltered holds 5 before assigning
 * */
var ratingFiltered = 5;

/**
 * searchData contains ajax codes to call xmlhttpRequest to deliver data from html to php and retrive results in the innerHTML.
 * */
function searchData() {
    /**
     * form appends SENDING flag, sort, filter values and arguments that should be searched from the database.
     * */
    var form = new FormData();
    form.append('SENDING', true);
    for (i = 0; i < arg1.length; i++) {
        form.append(i,arg1[i]);
    }
    form.append('sort', sorted);
    form.append('filter', priceFiltered);
    form.append('filter1', ratingFiltered);

    /**making new request object to send data and store results */
    var sending = new XMLHttpRequest();
    sending.open('POST', 'search1.php');
    sending.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            foods.innerHTML = this.responseText;
        }
    };
    sending.send(form);
}
/**
 * filterPrice takes a value from the html range bar and store the value by using sessionStorage to send the value to the ajax code block.
 * */
function filterPrice(value) {
    var p = "" + value;
    sessionStorage.setItem("fPrice", p);
    priceFiltered = sessionStorage.getItem("fPrice");
    main();
}
/**
 * filterRating takes a value from the html range bar and store the value by using sessionStorage to send the value to the ajax code block.
 * */
function filterRating(value) {
    var p = "" + value;
    sessionStorage.setItem("fRating", p);
    ratingFiltered = sessionStorage.getItem("fRating");
    main();
}
/**
 * sort function belongs to the sort button.
 * */
function sort() {
    document.getElementById("myDropdown").classList.toggle("show");
}
/**
 * sortFlag will store which option was selected in a sessionStorage, and evoke main() again.
 * */
function sortFlag(sortOption) {
    var f = "" + sortOption;
    sessionStorage.setItem("sortOption", f);
    sorted = sessionStorage.getItem("sortOption");
    main();
}
/**
 * main method conducts the searchData method.
 * */
function main() {
    searchData();
}

main();