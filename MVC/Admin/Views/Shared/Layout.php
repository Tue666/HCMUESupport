<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $model['title']; ?></title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/5/59/Logo_HCMUP.png">
    <!-- Styles -->
    <link href="<?php echo ADMIN_CSS_URL; ?>/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_CSS_URL; ?>/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="<?php echo ADMIN_CSS_URL; ?>/lib/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_CSS_URL; ?>/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_CSS_URL; ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <a href="<?php echo ADMIN_BASE_URL; ?>"><img style="width: 58px;height: 58px;" src="https://hcmue.edu.vn/images/lOGO/CNTT.png" alt="" /></a>
                    </div>

                    <li class="label">Người dùng</li>
                    <li><a href="<?php echo BASE_URL; ?>"><i class="fas fa-house-user mb-2"></i> Trang chủ</a></li>

                    <li class="label">Quản lý</li>
                    <li><a href="<?php echo ADMIN_BASE_URL; ?>"><i class="fas fa-tachometer-alt mb-2"></i> Quản lí</a></li>
                    <li><a href="<?php echo ADMIN_BASE_URL . 'Account/Index'; ?>"><i class="fas fa-user mb-2"></i> Tài khoản</a></li>
                    <li><a href="<?php echo ADMIN_BASE_URL . 'Product/Index'; ?>"><i class="fab fa-product-hunt mb-2"></i> Hàng hóa</a></li>
                    <li><a href="<?php echo ADMIN_BASE_URL . 'Order/Index'; ?>"><i class="fas fa-luggage-cart mb-2"></i> Hóa đơn</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar text-danger"><?php echo $_SESSION['USER_SESSION']; ?>
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading" style="display:flex;justify-content:center;align-items:center;">
                                        <img style="width:100px;height:100px;" src="<?php echo IMAGE_URL . '/12.png'; ?>" />
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a onclick="window.location.href='<?php echo ADMIN_BASE_URL . 'Home/Profile'; ?>';"><i class="far fa-id-card mr-2"></i><span>Profile</span></a></li>
                                            <li><a onclick="$('#logoutModal').modal();"><i class="fas fa-sign-out-alt mr-2"></i><span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <?php
            if (file_exists($link . $model['page'] . '.php')) {
                require_once($link . $model['page'] . '.php');
            }
            ?>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bạn có chắc muốn thoát?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Nhấn 'Thoát' để thoát :D</div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="<?php echo BASE_URL . 'Login/Logout'; ?>">Thoát</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo ADMIN_JS_URL; ?>/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo ADMIN_JS_URL; ?>/lib/menubar/sidebar.js"></script>
    <!-- sidebar -->
    <!-- <script src="<?php echo ADMIN_JS_URL; ?>/lib/toastr/toastr.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- toastr -->
    <script src="<?php echo ADMIN_JS_URL; ?>/sb-admin-2.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
</body>

</html>