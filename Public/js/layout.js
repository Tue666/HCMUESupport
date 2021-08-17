var http = 'http://localhost/HCMUESupport/';

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
    loadProducts(0, keyWord, category, status);
}

/* add order function */
function addOrder() {
    var name = $('.detail-form input[name="detail-name"]').val();
    var object = $('.order-wrapper #detail-object').val();
    var khoa = $('.order-wrapper #detail-khoa').val();
    var health = $('.order-wrapper #detail-health').val();
    var mssv = $('.detail-form input[name="detail-mssv"]').val();
    var address = $('.detail-form input[name="detail-address"]').val();
    var phone = $('.detail-form input[name="detail-phone"]').val();
    var email = $('.detail-form input[name="detail-email"]').val();
    var method = $('.order-wrapper #method').val();
    var method_address = $('.order-wrapper #method-address').val();
    var method_note = $('.order-wrapper #method-note').val();
    $.ajax({
        url: http + 'Ajax/addOrder',
        method: 'post',
        data: {
            name: name,
            object: object,
            khoa: khoa,
            health: health,
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
                window.location.href = http + "Home/Success";
            }
            else {
                window.location.href = http + "Home/Failed";
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
    if (this.value == 'Chuyển đến nhà qua các ứng dụng giao hàng (Người nhận trả phí vận chuyển, Ban tổ chức hỗ trợ đặt dịch vụ)' || this.value == 'Tình nguyện viên giao hàng tận nơi miễn phí (Chỉ áp dụng đối với người trong khu vực phong tỏa hoặc đang tự cách ly, điều trị tại nhà)') {
        var address = $('.detail-form input[name="detail-address"]').val();
        $('.order-wrapper #method-area').html(`
            <label>Địa chỉ hiện tại</label>
            <input type="text" class="form-control" id="method-address" placeholder="Địa chỉ hiện tại" value="${address}" readonly>
        `);
    }
    else if (this.value == 'Nhận tại các điểm tiếp nhận (Người nhận tự đến lấy tại điểm tiếp nhận đã đăng ký)') {
        $('.order-wrapper #method-area').html(`
            <label>Chọn địa chỉ</label>
            <select class="form-control" id="method-address">
                <option>Cơ sở chính - 280 An Dương Vương, Phường 4, Quận 5, Thành phố Hồ Chí Minh (Đối với khu vực Quận 1, Quận 3, Quận 5, Quận 10)</option>
                <option>Cơ sở 222 Lê Văn Sĩ, Phường 14, Quận 3, Thành phố Hồ Chí Minh (Đối với khu vực Quận 1, Quận 3)</option>
                <option>Ký túc xá Trường - 01 Nguyễn Văn Phú, Phường 5, Quận 11, Thành phố Hồ Chí Minh ((Đối với khu vực Quận 11, Quận Tân Bình, Quận 6)</option>
                <option>Quận Đoàn Phú Nhuận - 179 Hoàng Văn Thụ, Phường 8, Quận Phú Nhuận, Thành phố Hồ Chí Minh (Đối với khu vực Quận Tân Bình, Phú Nhuận, Gò Vấp)</option>
                <option>Quận Đoàn Gò Vấp - 450 Lê Đức Thọ, Phường 16, Quận Gò Vấp, Thành phố Hồ Chí Minh (Đối với khu vực Quận 12 Gò Vấp)</option>
                <option>Nhà thiếu nhi Quận 12 - 100 Hiệp Thành 11, Phường Hiệp Thành, Quận 12, Thành phố Hồ Chí Minh (Đối với khu vực Quận 12, Huyện Hóc Môn, Huyện Củ Chi).</option>
                <option>Quận Đoàn Tân Phú - 562 Lũy Bán Bích, Phường Hoà Thanh, Quận Tân Phú, Thành phố Hồ Chí Minh (Đối với khu vực Quận Bình Tân, Quận Tân Phú, Quận Tân Bình).</option>
                <option>Nhà thiếu nhi Quận 6 - 212 Nguyễn Văn Luông, Phường 11, Quận 6, Thành phố Hồ Chí Minh (Đối với khu vực Quận 6, Quận 8, Quận Bình Tân).</option>
                <option>Quận Đoàn 8 - 11-13 Dương Bạch Mai, Phường 5, Quận 8, Thành phố Hồ Chí Minh (Đối với khu vực Quận 8, Huyện Bình Chánh).</option>
                <option>Quận Đoàn 7 - 221 Lê Văn Lương, Phường Tân Kiểng, Quận 7, Thành phố Hồ Chí Minh (Đối với khu vực Quận 7, Huyện Nhà Bè).</option>
                <option>Nhà thiếu nhi Thành phố Thủ Đức - 281 Võ Văn Ngân, Phường Linh Chiểu, Thành phố Thủ Đức, Thành phố Hồ Chí Minh (Đối với khu vực Quận Thủ Đức cũ)</option>
                <option>Nhà thiếu nhi Quận 2 (cũ) - 200 Đường Nguyễn Duy Trinh, Phường Bình Trưng Tây, Thành phố Thủ Đức, Thành phố Hồ Chí Minh (Đối với khu vực Quận 2 cũ)</option>
            </select>
        `);
    } else {
        $('.order-wrapper #method-area').html(`<input type="hidden" id="method-address" readonly></input>`);
    }
});

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
        url: http + 'Ajax/removeCart',
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
                    loadProducts(productID);
                }
            }
        }
    });
}

/* load cart hover function*/
loadCartHover();
function loadCartHover() {
    $.ajax({
        url: http + 'Ajax/loadCartHover',
        method: 'post',
        success: function (response) {
            $('.header .cart').html(response);
        }
    });
}

/* add cart function */
function addCart(productID) {
    $.ajax({
        url: http + 'Ajax/CheckSession',
        method: 'post',
        success: function (response) {
            if (response) {
                $.ajax({
                    url: http + 'Ajax/addCart',
                    method: 'post',
                    data: {
                        productID: productID
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.type == 1) {
                            loadCartHover();
                            loadProducts(productID);
                            $('.content .wrapper-carts').prepend(response.item);
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

/* load products function, defult type(product id too) 0 is for searching, otherwhile for CSR one item product*/
function loadProducts(type = 0, keyWord = "", category = "Tất cả", status = "Tất cả") {
    if (type == 0) {
        $.ajax({
            url: http + 'Ajax/loadProducts',
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
    else {
        $('.product-item').each(function () {
            if ($(this).val() == type) {
                var parentDOM = $(this).parent();
                $.ajax({
                    url: http + 'Ajax/loadProducts/' + type,
                    method: 'post',
                    data: {
                        productID: type,
                        keyWord: keyWord,
                        category: category,
                        status: status
                    },
                    success: function (response) {
                        parentDOM.html(response);
                    }
                });
            }
        });
    }
}