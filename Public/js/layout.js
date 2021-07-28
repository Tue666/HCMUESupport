/* search product function */
function searching() {
    var keyWord = $('.content .searching input[name="search-key-word"]').val();
    var category = $('.content .searching #search-category').val();
    var status = $('.content .searching #search-status').val();
    loadProducts(keyWord,category,status);
}

/* add order function */
function addOrder() {
    var mssv = $('.detail-form input[name="detail-mssv"]').val();
    var khoa = $('.detail-form input[name="detail-khoa"]').val();
    var name = $('.detail-form input[name="detail-name"]').val();
    var address = $('.detail-form input[name="detail-address"]').val();
    var phone = $('.detail-form input[name="detail-phone"]').val();
    var email = $('.detail-form input[name="detail-email"]').val();
    var method = $('.order-wrapper #method').val();
    var method_address = $('.order-wrapper #method-address').val();
    var method_note = $('.order-wrapper #method-note').val();
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/addOrder',
        method: 'post',
        data: {
            mssv: mssv,
            khoa: khoa,
            name: name,
            address: address,
            phone: phone,
            email: email,
            method: method,
            method_address: method_address,
            method_note: method_note
        },
        success: function (response) {
            if (response){
                window.location.href="http://localhost/HCMUESupport/Home/Success";
            }
            else{
                window.location.href="http://localhost/HCMUESupport/Home/Failed";
            }
        }
    });
}

/* check fill input detail order form */
$('.detail-form input[type!="hidden"]').keyup(function () {
    var areEmpty = false;
    $('.detail-form input[type!="hidden"]').each(function () {
        if ($(this).val() == "") {
            areEmpty = true;
        }
    });
    if (areEmpty) {
        $('#order-btn').html('<label style="color:red;">Điền đầy đủ thông tin để đặt</label>');
    }
    else {
        $('#order-btn').html('<a onclick="$(\'#checkOrderModal\').modal();" style="width:100%;" class="btn btn-primary">ĐẶT</a>');
    }
});

/* change status address order */
$('.order-wrapper #method').on('change', function () {
    $('.order-wrapper #method-address').val('');
    if (this.value == 'Nhận theo địa chỉ') {
        $('.order-wrapper #method-address').prop('readonly', false);
    }
    else {
        $('.order-wrapper #method-address').prop('readonly', true);
    }
});

/* load cart function*/
loadCart();
function loadCart() {
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/loadCart',
        method: 'post',
        success: function (response) {
            $('.content .order-wrapper .carts').html(response);
        }
    });
}

/* pass data remove cart function*/
function passDataRemove(id, name) {
    $('#removeModal input[name="id-remove"]').val(id);
    $('#removeModal label').html(name);
    $('#removeModal').modal();
}

/* remove cart function*/
function removeCart() {
    var productID = $('#removeModal input[name="id-remove"]').val();
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/removeCart',
        method: 'post',
        data: {
            productID: productID
        },
        success: function (response) {
            if (response) {
                loadCart();
                loadCartHover();
            }
        }
    });
}

/* load cart hover function*/
loadCartHover();
function loadCartHover() {
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/loadCartHover',
        method: 'post',
        success: function (response) {
            $('.header .cart').html(response);
        }
    });
}

/* add cart function */
function addCart(productID) {
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/CheckSession',
        method: 'post',
        success: function (response) {
            if (response) {
                $.ajax({
                    url: 'http://localhost/HCMUESupport/Ajax/addCart',
                    method: 'post',
                    data: {
                        productID: productID
                    },
                    success: function (response) {
                        if (response == 1) {
                            loadCartHover();
                            loadProducts();
                        }
                        else if (response == 2) {
                            $('#outQuantityModal').modal();
                        }
                        else if (response == 3) {
                            $('#orderPermisstionModal').modal();
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
function loadProducts(keyWord = "", category = "Tất cả", status = "Tất cả") {
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/loadProducts',
        method: 'post',
        data: {
            keyWord: keyWord,
            category: category,
            status: status
        },
        success: function (response) {
            $('.content .wrapper .products').html(response);
        }
    });
}