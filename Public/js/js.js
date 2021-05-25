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

// add item function
function addItem() {
    showToast('Success', 'Add successfully');
}

// edit item function
function editItem() {
    showToast('Success', 'Edit successfully');
}

// remove item function
function removeItem() {
    showToast('Success', 'Remove successfully');
}