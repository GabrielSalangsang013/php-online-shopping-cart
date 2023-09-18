function pass(num) {
    /* FOR PRODUCT NAME */
    var _textProductName = document.getElementsByClassName("text-product-name");
    var _givenProductName = document.getElementsByClassName("givenProductName");
    _textProductName[num].value = _givenProductName[num].innerHTML;

    /* FOR PRODUCT IMAGE */
    var _textProductImage = document.getElementsByClassName("text-product-image");
    _textProductImage.value = "sample";

    /* FOR PRODUCT PRICE */
    var _textProductPrice = document.getElementsByClassName("text-product-price");
    var _givenProductPrice = document.getElementsByClassName("givenProductPrice");
    _textProductPrice[num].value = _givenProductPrice[num].innerHTML.substring(2);
}