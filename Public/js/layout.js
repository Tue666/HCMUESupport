/* load cart hover function*/
loadCartHover();
function loadCartHover() {
    $.ajax({
        url: '../HCMUESupport/Ajax/loadCartHover',
        method: 'post',
        success: function (response) {
            $('.header .cart').html(response);
        }
    });
}

/* add cart function */
function addCart(productID) {
    $.ajax({
        url: '../HCMUESupport/Ajax/CheckSession',
        method: 'post',
        success: function (response) {
            if (response) {
                $.ajax({
                    url: '../HCMUESupport/Ajax/addCart',
                    method: 'post',
                    data: {
                        productID: productID
                    },
                    success: function (response) {
                        if (response) {
                            loadCartHover();
                            loadProducts();
                        }
                    }
                });
            }
            else {
                $('#loginPermissionModal').modal();
            }
        }
    });
}

/* load products function*/
loadProducts();
function loadProducts() {
    $.ajax({
        url: '../HCMUESupport/Ajax/loadProducts',
        method: 'post',
        success: function (response) {
            $('.content .wrapper .products').html(response);
        }
    });
}