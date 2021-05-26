// show toast function
function showToast(title, content, type = 1) {
    document.getElementById('titleToast').innerHTML = title;
    document.getElementById('contentToast').innerHTML = content;
    if (type == 0) {
        document.getElementById('iconToast').innerHTML = '<i class="fas fa-times-circle fa-2x" style="color:red"></i>';
        $('.toast .toast-header').css("background-color", "rgba(245, 66, 66, 1)");
    }
    else {
        document.getElementById('iconToast').innerHTML = '<i class="fas fa-check-circle fa-2x" style="color:#7BCA2F"></i>';
        $('.toast .toast-header').css("background-color", "rgba(14, 198, 13, 1)");
    }
    document.getElementById('cooldown-line').innerHTML = '<div id="line"></div>';
    $('.toast').toast('show');
}
// hide toast function
function hideToast() {
    $('.toast').toast('hide');
}

// load data function
function loadData() {
    var url = window.location.href;
    var urlArray = url.split('/');
    var page = urlArray[urlArray.length - 1];
    $.ajax({
        url: 'http://localhost/Middle_Term_Web/Ajax/loadData',
        method: 'post',
        data: {
            page: page
        },
        success: function (response) {
            $('#data').html(response);
        }
    });
}

// add item function
function addItem() {
    loadData();
    //showToast('Success', 'Add successfully');
}

// pass data edit function
function passDataEdit(id, productName, cate, price, quantity, discount) {
    const cateName = cate == 1 ? 'Mobiles' : cate == 2 ? 'Tablets' : cate == 3 ? 'Cameras' : 'Laptops';
    $('#edit-option').val(cateName);
    $('input[name="edit-id"]').val(id);
    $('input[name="edit-productName"]').val(productName);
    $('input[name="edit-price"]').val(price);
    $('input[name="edit-quantity"]').val(quantity);
    $('input[name="edit-discount"]').val(discount);
}
// edit item function
function editItem() {
    var cateName = $('#edit-option').val();
    var cate = cateName == 'Mobiles' ? 1 : cateName == 'Tablets' ? 2 : cateName == 'Cameras' ? 3 : 4;
    var productID = $('input[name="edit-id"]').val();
    var productName = $('input[name="edit-productName"]').val();
    var price = $('input[name="edit-price"]').val();
    var quantity = $('input[name="edit-quantity"]').val();
    var discount = $('input[name="edit-discount"]').val();
    $.ajax({
        url: 'http://localhost/Middle_Term_Web/Ajax/editItem',
        method: 'post',
        data: {
            productID: productID,
            productName: productName,
            idCate: cate,
            price: price,
            quantity: quantity,
            discount: discount
        },
        success: function (response) {
            if (response) {
                showToast('Success', 'Edit successfully');
                loadData();
            }
            else {
                showToast('Failed', 'Edit failed', 0);
            }
        }
    });

}

// remove item function
function removeItem() {
    showToast('Success', 'Remove successfully');
}