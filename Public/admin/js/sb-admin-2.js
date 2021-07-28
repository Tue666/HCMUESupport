// print
function printArea(idDiv) {
  var printContents = document.getElementById(idDiv).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}

// defalt 0 is order
function switchStatus(ID, type = 0) {
  $.ajax({
    url: 'http://localhost/HCMUESupport/Admin/Ajax/switchStatus',
    method: 'post',
    data: {
      ID: ID,
      type: type
    },
    success: function (response) {
      if (response) {
        loadOrder();
        showToast('Thành công', 'Cập nhật trạng thái thành công');
      }
    }
  });
}

/* Start Accounts Manager */

/* load accounts admin function */
loadAccount();
function loadAccount() {
  $(document).ready(function () {
    $('#accountTable').DataTable({
      "ajax": "http://localhost/HCMUESupport/Admin/Ajax/accountData",
      "scrollY": 650,
      "scrollX": true,
      "bDestroy": true,
      "stateSave": true,
      "autoWidth": true,
      "columns": [{
        "data": "ID"
      },
      {
        "data": "UserName"
      },
      {
        "data": "Name"
      },
      {
        "data": "Email"
      },
      {
        "data": "Phone"
      },
      {
        "data": "Type"
      },
      {
        "data": "Status"
      },
      {
        "data": "Action"
      }
      ]
    });
  });
}
// pass data to reset pass modal function
function passDataReset(id) {
  $('#resetPassModal input[name="id-resetPass"]').val(id);
}
// pass data to edit modal account function
function passDataEditAccount(id, name, email, phone, address, type, status) {
  $('#editModal input[name="id-edit"]').val(id);
  $('#editModal input[name="edit-name"]').val(name);
  $('#editModal input[name="edit-email"]').val(email);
  $('#editModal input[name="edit-phone"]').val(phone);
  $('#editModal input[name="edit-address"]').val(address);
  type == 1 ? $('#editModal input[name="edit-isadmin"]').prop('checked', true) : $('#editModal input[name="edit-isadmin"]').prop('checked', false);
  status == 0 ? $('#editModal input[name="edit-status"]').prop('checked', true) : $('#editModal input[name="edit-status"]').prop('checked', false);
}
/* End Accounts Manager */

/* Start Products Manager */

/* load accounts admin function */
loadProduct();
function loadProduct() {
  $(document).ready(function () {
    $('#productTable').DataTable({
      "ajax": "http://localhost/HCMUESupport/Admin/Ajax/productData",
      "scrollY": 650,
      "scrollX": true,
      "bDestroy": true,
      "stateSave": true,
      "autoWidth": true,
      "columns": [{
        "data": "ID"
      },
      {
        "data": "ProductName"
      },
      {
        "data": "Category"
      },
      {
        "data": "Quantity"
      },
      {
        "data": "Created"
      },
      {
        "data": "Status"
      },
      {
        "data": "Action"
      }
      ]
    });
  });
}

// pass data to edit modal product function
function passDataEditProduct(id, name, cateName, quantity, status) {
  $('#editModal input[name="id-edit"]').val(id);
  $('#editModal input[name="edit-product-name"]').val(name);
  $('#editModal select').val(cateName);
  $('#editModal input[name="edit-quantity"]').val(quantity);
  status == 0 ? $('#editModal input[name="edit-status"]').prop('checked', true) : $('#editModal input[name="edit-status"]').prop('checked', false);
}
/* End Products Manager */

/* Start Orders Manager */

/* load orders admin function */
loadOrder();
function loadOrder() {
  $(document).ready(function () {
    $('#orderTable').DataTable({
      "ajax": "http://localhost/HCMUESupport/Admin/Ajax/orderData",
      "scrollY": 650,
      "scrollX": true,
      "bDestroy": true,
      "stateSave": true,
      "autoWidth": true,
      "columns": [{
        "data": "ID"
      },
      {
        "data": "MSSV"
      },
      {
        "data": "Tên"
      },
      {
        "data": "Điện thoại"
      },
      {
        "data": "Nơi nhận"
      },
      {
        "data": "Vị trí"
      },
      {
        "data": "Ngày tạo"
      },
      {
        "data": "Ngày nhận"
      },
      {
        "data": "Status"
      },
      {
        "data": "Action"
      }
      ]
    });
  });
}
// update day received order
function updateReceivedDay() {
  var date = $('#date-received').val();
  var orderID = $('#receivedModal input[name="id-received-order"]').val();
  $.ajax({
    url: 'http://localhost/HCMUESupport/Admin/Ajax/updateReceivedDay',
    method: 'post',
    data: {
      date: date,
      orderID: orderID
    },
    success: function (response) {
      if (response) {
        loadOrder();
        showToast('Thành công', 'Cập nhật ngày nhận thành công');
      }
      else {
        showToast('Thất bại', 'Cập nhật ngày nhận thất bại');
      }
    }
  });
}
function passDataReceivedDay(orderID) {
  $('#receivedModal input[name="id-received-order"]').val(orderID);
  $('#receivedModal').modal();
}
function passDataViewOrder(orderID) {
  $.ajax({
    url: 'http://localhost/HCMUESupport/Admin/Ajax/dataViewOrder',
    method: 'post',
    data: {
      orderID: orderID
    },
    success: function (response) {
      $('#viewModal .modal-body').html(response);
      $('#viewModal').modal();
    }
  });
}
/* End Orders Manager */

// remove item admin function | default 0 is users, 1 is products
function removeItem(type = 0) {
  var itemID = $('#removeModal input[name="id-remove"]').val();
  $.ajax({
    url: 'http://localhost/HCMUESupport/Admin/Ajax/removeItem',
    method: 'post',
    data: {
      itemID: itemID,
      type: type
    },
    success: function (response) {
      if (response) {
        if (type == 0) {
          showToast('Thành công', 'Xóa tài khoản thành công');
        }
        else if (type == 1) {
          showToast('Thành công', 'Xóa hàng hóa thành công');
        }
        loadProduct();
      }
      else {
        if (type == 0) {
          showToast('Thất bại', 'Xóa tài khoản thất bại', 0);
        }
        else if (type == 1) {
          showToast('Thất bại', 'Xóa hàng hóa thất bại', 0);
        }
      }
    }
  });
}

// pass data to remove modal function
function passDataRemove(id, name) {
  $('#removeModal input[name="id-remove"]').val(id);
  $('#removeModal label').html(name);
}

// show toast function
function showToast(title, content, type = 1) {
  document.getElementById('titleToast').innerHTML = title;
  document.getElementById('contentToast').innerHTML = content;
  if (type == 0) {
    document.getElementById('iconToast').innerHTML = '<i class="fas fa-times-circle fa-2x" style="color:red"></i>';
    $('.toast .toast-header').css("background-color", "red");
  }
  else {
    document.getElementById('iconToast').innerHTML = '<i class="fas fa-check-circle fa-2x" style="color:green"></i>';
    $('.toast .toast-header').css("background-color", "green");
  }
  document.getElementById('cooldown-line').innerHTML = '<div id="line"></div>';
  $('.toast').toast('show');
}
// hide toast function
function hideToast() {
  $('.toast').toast('hide');
}

(function ($) {
  "use strict"; // Start of use strict

  /* Start Accounts Manager */
  // add user
  $('#addUser').click(function () {
    var addName = $('input[name="add-username"]').val();
    var addPass = $('input[name="add-password"]').val();
    var isAdmin = $('input[name="add-isadmin"]').is(':checked');
    $.ajax({
      url: 'http://localhost/HCMUESupport/Admin/Ajax/insertUser',
      method: 'post',
      data: {
        addName: addName,
        addPass: addPass,
        isAdmin: isAdmin
      },
      success: function (response) {
        if (response) {
          loadAccount();
          showToast('Thành công', 'Thêm thành công');
        }
        else {
          showToast('Thất bại', 'Thêm thất bại', 0);
        }
      }
    });
  });
  // edit user
  $('#editUser').click(function () {
    var id = $('#editModal input[name="id-edit"]').val();
    var name = $('#editModal input[name="edit-name"]').val();
    var email = $('#editModal input[name="edit-email"]').val();
    var phone = $('#editModal input[name="edit-phone"]').val();
    var address = $('#editModal input[name="edit-address"]').val();
    var isAdmin = $('#editModal input[name="edit-isadmin"]').is(':checked');
    var status = $('#editModal input[name="edit-status"]').is(':checked');
    $.ajax({
      url: 'http://localhost/HCMUESupport/Admin/Ajax/editUser',
      method: 'post',
      data: {
        id: id,
        name: name,
        email: email,
        phone: phone,
        address: address,
        isAdmin: isAdmin,
        status: !status
      },
      success: function (response) {
        if (response) {
          loadAccount();
          showToast('Thành công', 'Sửa thành công');
        }
        else {
          showToast('Thất bại', 'Sửa thất bại', 0);
        }
      }
    });
  });
  // reset pass user
  $('#resetPass').click(function () {
    var id = $('#resetPassModal input[name="id-resetPass"]').val();
    var newPass = $('#resetPassModal input[name="reset-pass"]').val();
    $.ajax({
      url: 'http://localhost/HCMUESupport/Admin/Ajax/resetPass',
      method: 'post',
      data: {
        id: id,
        newPass: newPass
      },
      success: function (response) {
        if (response) {
          loadAccount();
          showToast('Thành công', 'Đổi mật khẩu thành công');
        }
        else {
          showToast('Thất bại', 'Đổi mật khẩu thất bại', 0);
        }
      }
    });
  });

  // check fill input reset pass
  $('form #checkPassReset').keyup(function () {
    if ($(this).val() == "") {
      $('#resetPass').addClass('disabled');
    }
    else {
      $('#resetPass').removeClass('disabled');
    }
  });
  // check user name admin existed
  $('.add-user-form input').keyup(function () {
    var inputName = $('.add-user-form #checkNameAdmin').val();
    $.ajax({
      url: 'http://localhost/HCMUESupport/Admin/Ajax/checkNameAdmin',
      method: 'post',
      data: {
        inputName: inputName
      },
      success: function (response) {
        $('#showMessageAdmin').html(response);
        if ($('input[name="add-username"]').val() != "" && $('input[name="add-password"]').val() != "") {
          if (response) {
            $('#addUser').addClass('disabled');
          }
          else {
            $('#addUser').removeClass('disabled');
          }
        }
        else {
          $('#addUser').addClass('disabled');
        }
      }
    });
  });
  /* End Accounts Manager */


  /* Start Products Manager */
  // add product
  $('#addProduct').click(function () {
    var name = $('#addModal input[name="add-name"]').val();
    var cate = $('#addModal select option:selected').val();
    var quantity = $('#addModal input[name="add-quantity"]').val();
    $.ajax({
      url: 'http://localhost/HCMUESupport/Admin/Ajax/addProduct',
      method: 'post',
      data: {
        name: name,
        cate: cate,
        quantity: quantity
      },
      success: function (response) {
        if (response) {
          loadProduct();
          showToast('Thành công', 'Thêm hàng hóa thành công');
        }
        else {
          showToast('Thất bại', 'Thêm hàng hóa thất bại', 1);
        }
      }
    });
  });
  // edit product
  $('#editProduct').click(function () {
    var id = $('#editModal input[name="id-edit"]').val();
    var productName = $('#editModal input[name="edit-product-name"]').val();
    var productCate = $('#editModal select option:selected').val();
    var quantity = $('#editModal input[name="edit-quantity"]').val();
    var status = $('#editModal input[name="edit-status"]').is(':checked');
    $.ajax({
      url: 'http://localhost/HCMUESupport/Admin/Ajax/editProduct',
      method: 'post',
      data: {
        id: id,
        productName: productName,
        productCate: productCate,
        quantity: quantity,
        status: !status
      },
      success: function (response) {
        if (response) {
          loadProduct();
          showToast('Thành công', 'Sửa sản phẩm thành công');
        }
        else {
          showToast('Thất bại', 'Sửa sản phẩm thất bại', 1);
        }
      }
    });
  });

  // check fill input add product
  $('.add-product-form input').keyup(function () {
    var areEmpty = false;
    $(".add-product-form input").each(function () {
      if ($(this).val() == "") {
        areEmpty = true;
      }
    });
    if (areEmpty) {
      $('#addProduct').addClass('disabled');
    }
    else {
      $('#addProduct').removeClass('disabled');
    }
  });
  /* Start Products Manager */

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $('.scroll-to-top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
  });

})(jQuery); // End of use strict