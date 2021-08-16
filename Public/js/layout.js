$(window).scroll(function () {
    if (window.scrollY > 600) {
        showHomeCart();
    }
    else {
        $('.content .wrapper-carts').removeClass('active');
        $('.content .wrapper').css("width", "100%");
    }
});

/* show home cart */
function showHomeCart() {
    if (!window.matchMedia('(max-width: 500px)').matches) {
        if ($('.content .wrapper-carts').children().length > 0) {
            $('.content .wrapper-carts').addClass('active');
            $('.content .wrapper').css("width", "67%");
        }
        else {
            $('.content .wrapper-carts').removeClass('active');
            $('.content .wrapper').css("width", "100%");
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
    var name = $('.detail-form input[name="detail-name"]').val();
    var object = $('.order-wrapper #detail-object').val();
    var khoa = $('.order-wrapper #detail-khoa').val();
    var mssv = $('.detail-form input[name="detail-mssv"]').val();
    var address = $('.detail-form input[name="detail-address"]').val();
    var phone = $('.detail-form input[name="detail-phone"]').val();
    var email = $('.detail-form input[name="detail-email"]').val();
    var method = $('.order-wrapper #method').val();
    var method_address = $('.order-wrapper #method-address').val();
    var method_note = $('.order-wrapper #method-note').val();
    // alert(name + '\n' + object + '\n' + khoa + '\n' + mssv + '\n' + address + '\n' + phone + '\n' + email + '\n' + method + '\n' + method_address + '\n' + method_note);
    $.ajax({
        url: 'http://localhost/HCMUESupport/Ajax/addOrder',
        method: 'post',
        data: {
            name: name,
            object: object,
            khoa: khoa,
            mssv: mssv,
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
    if (this.value == 'Chuyển đến nhà qua ứng dụng grap, now, ... (người nhận trả phí vận chuyển)') {
        var address = $('.detail-form input[name="detail-address"]').val();
        $('.order-wrapper #method-area').html(`
            <label>Địa chỉ hiện tại</label>
            <input type="text" class="form-control" id="method-address" placeholder="Địa chỉ hiện tại" value="${address}" readonly>
        `);
    }
    else if (this.value == 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)') {
        $('.order-wrapper #method-area').html(`
            <label>Chọn địa chỉ</label>
            <select class="form-control" id="method-address">
                <option>Cơ sở 280 An Dương Vương (Dành cho khu vực Quận 5, 10, 11)</option>
                <option>Cơ sở 222 Lê Văn Sỹ (Dành cho khu vực Quận 1, 3, 10, Phú Nhuận, Bình Thạnh, Tân Bình)</option>
                <option>Khu vực Quận 4 (Dành cho khu vực Quận 1, 4, 7, huyện Nhà Bè)</option>
                <option>Khu vực Quận 6 (Dành cho khu vực Quận 6, 8, huyện Bình Chánh)</option>
                <option>Khu vực Quận Bình Tân (Dành cho khu vực Quận 6, Tân Phú, Bình Tân, huyện Bình Chánh)</option>
                <option>Khu vực Quận 12 (Dành cho khu vực Quận 12, Tân Bình, Gò Vấp, huyện Hóc Môn)</option>
            </select>
        `);
    } else {
        $('.order-wrapper #method-area').html(`<input type="hidden" id="method-address" readonly></input>`);
    }
});

/* load cart function*/
// loadCart();
// function loadCart() {
//     $.ajax({
//         url: 'http://localhost/HCMUESupport/Ajax/loadCart',
//         method: 'post',
//         success: function (response) {
//             $('.content .order-wrapper .carts').html(response);
//         }
//     });
// }

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
                $('.cart-item').each(function () {
                    if ($(this).val() == productID) {
                        $(this).parent().css("animation", "remove-cart-item 0.5s ease");
                        setTimeout(() => {
                            $(this).parent().remove();
                            showHomeCart();
                            if (type == 1) {
                                if ($('.content .order-wrapper .carts').children().length < 1) {
                                    $('.content .order-wrapper .carts').html(`
                                        <div style="display:flex;flex-direction:column;justify-content:center;align-items:center;height:100%;text-align:center;">
                                            <label style="color:red;font-weight:bold;">Không có sản phẩm nào trong giỏ!</label>
                                            <label style="color:red;font-weight:bold;">NOTE: Không thể tiến hành đặt hàng nếu giỏ hàng rỗng!</label>
                                        </div>
                                    `);
                                }
                            }
                        }, 450);
                    }
                });
                loadCartHover();
                if (type == 0) {
                    loadProducts();
                }
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
                    dataType: 'json',
                    success: function (response) {
                        if (response.type == 1) {
                            loadCartHover();
                            loadProducts();
                            $('.content .wrapper-carts').append(response.item);
                            showHomeCart();
                        }
                        else if (response.type == 2) {
                            $('#outQuantityModal').modal();
                        }
                        else if (response.type == 3) {
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