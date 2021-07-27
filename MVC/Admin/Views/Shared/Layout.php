<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $model['title']; ?></title>
	<!-- <link rel="icon" href="https://dkhp.hcmue.edu.vn/Content/images/logo_HCMUP.png"> -->
	<link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/5/59/Logo_HCMUP.png">
	<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL; ?>/sb-admin-2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo ADMIN_BASE_URL; ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-jedi"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Dashboard</div>
			</a>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">
			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo BASE_URL; ?>">
					<i class="fas fa-chevron-left"></i>
					<span>Trang chủ</span>
				</a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">
			<!-- Heading -->
			<div class="sidebar-heading">
				Interface
			</div>
			<!-- Nav Item - Users Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-users"></i>
					<span>Tài khoản</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'Account/Index'; ?>">Tất cả</a>
					</div>
				</div>
			</li>
			<!-- Nav Item - Products Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fab fa-product-hunt"></i>
					<span>Hàng hóa</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo ADMIN_BASE_URL . 'Product/Index'; ?>">Tất cả hàng</a>
						<!-- <a class="collapse-item" href="">Loại hàng</a> -->
					</div>
				</div>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">
			<!-- Heading -->
			<div class="sidebar-heading">
				Addons
			</div>
			<!-- Nav Item - Orders -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo ADMIN_BASE_URL . 'Order/Index'; ?>">
					<i class="fab fa-jedi-order"></i>
					<span>Hóa đơn</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline font-weight-bold text-danger small"><?php echo $_SESSION['USER_SESSION']; ?></span>
								<img class="img-profile rounded-circle" src="https://img.icons8.com/bubbles/2x/admin-settings-male.png">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Đăng xuất
								</a>
							</div>
						</li>
					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<?php
				if (file_exists($link . $model['page'] . '.php')) {
					require_once($link . $model['page'] . '.php');
				}
				?>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; 9hT <?php echo date('Y'); ?></span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" style="cursor:pointer;">
		<i class="fas fa-angle-up"></i>
	</a>

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

	<!-- toasts start -->
	<div class="toast" role="alert" style="position: fixed; top: 0.8rem; right: 1rem; width: 25%; z-index: 999">
        <div class="toast-header" style="display:flex;justify-content:space-between;align-items:center;">
            <strong id="titleToast" style="color:#fff;">Success</strong>
            <a style="color:#fff;cursor:pointer;" onclick="hideToast();"><i class="fas fa-times"></i></a>
        </div>
        <div class="toast-body">
            <div style="display:flex;flex-direction:column;justify-content:space-between;align-items:center;">
                <div id="iconToast">

                </div>
                <div id="contentToast">

                </div>
            </div>
            <div id="cooldown-line">

            </div>
        </div>

    </div>
	<!-- toasts end -->

	<script>
		// Datatable boostrap
		$(document).ready(function() {
			$('.toast').toast('show');
		});

		//tooltip boostrap
		$(function() {
			$('[data-toggle="tooltip"]').tooltip({
				trigger: 'hover'
			})
		});
	</script>
	<!-- Bootstrap core JavaScript-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script src="<?php echo ADMIN_JS_URL; ?>/sb-admin-2.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>