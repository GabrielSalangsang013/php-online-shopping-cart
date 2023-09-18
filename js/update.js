function update(num) {
    var quantityUpdate = document.getElementsByClassName("quantityUpdate");
    var quantity = document.getElementsByClassName("quantity");
    for(var i = 0; i < quantityUpdate.length; i++) {
        if(quantityUpdate[i].getAttribute("data-hold-id") == num) {
            quantityUpdate[i].value = quantity[i].value;
        }
    }
}