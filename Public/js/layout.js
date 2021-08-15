/* set height home carts depend on header height */
function getVisible() {
    var $el = $('.header'),
        scrollTop = $(this).scrollTop(),
        scrollBot = scrollTop + $(this).height(),
        elTop = $el.offset().top,
        elBottom = elTop + $el.outerHeight(),
        visibleTop = elTop < scrollTop ? scrollTop : elTop,
        visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
    return visibleBottom - visibleTop;
}
$(window).scroll(function () {
    var headerHeight = getVisible();
    var screenHeight = screen.height;
    $('.content .wrapper-carts').css({ "top": headerHeight + 5, "height": (screenHeight - headerHeight - 140) + 'px' });
});

/* format size home cart */
function formatHomeCart() {
    if (!window.matchMedia('(max-width: 500px)').matches) {
        if ($('.content .wrapper-carts').children().length < 1) {
            $('.content .wrapper-carts').css("width", "0px");
            $('.content .wrapper').css("width", "97%");
        }
        else {
            $('.content .wrapper-carts').css("width", "33%");
            $('.content .wrapper').css("width", "67%");
        }   
    }
}

/* search product function */
function searching() {
    var keyWord = $('.content .searching input[name="search-key-word"]').val();
    var category = $('.content .searching #search-category').val();
    var status = $('.content .searching #search-status').val();
    loadProducts(keyWord, category, status);
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
            if (response) {
                window.location.href = "http://localhost/HCMUESupport/Home/Success";
            }
            else {
                window.location.href = "http://localhost/HCMUESupport/Home/Failed";
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

/* remove cart function (type default 1 is cart, 0 is home cart)*/
function removeCart(type = 1) {
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
                loadHomeCart();
            }
            if (type == 0) {
                loadProducts();
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

loadHomeCart();
/* load home cart function*/
function loadHomeCart() {
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/loadHomeCart',
        method: 'post',
        success: function (response) {
            $('.content .wrapper-carts').html(response);
            formatHomeCart();
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
                            loadHomeCart();
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
                alert('Chưa đăng nhập');
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