<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $model['title']; ?></title>
	<!-- <link rel="icon" href="https://dkhp.hcmue.edu.vn/Content/images/logo_HCMUP.png"> -->
	<link rel="icon" href="https://upload.wikimedia.org/wikipedia/vi/5/59/Logo_HCMUP.png">
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<!-- header start -->
	<div class="header">
		<img class="image" onclick="window.location.href='<?php echo BASE_URL; ?>'" src="<?php echo IMAGE_URL . '/heart_logo.png'; ?>" />
		<!-- <img class="image" onclick="window.location.href='<?php echo BASE_URL; ?>'" src="<?php echo IMAGE_URL . '/logo.png'; ?>" /> -->
		<!-- <img onclick="window.location.href='<?php echo BASE_URL; ?>'" style="width:200; height:100%;cursor:pointer;" src="https://dkhp.hcmue.edu.vn/Content/images/logo_HCMUP.png" /> -->
		<div></div>
		<div style="display:flex;flex-direction:row;align-items:center">
			<?php if (empty($_SESSION['USER_SESSION'])) : ?>
				<a class="btn btn-danger" href="<?php echo BASE_URL . 'Login/Index'; ?>">ĐĂNG NHẬP</a>
			<?php else : ?>
				<?php if ($_SESSION['USER_TYPE_SESSION']) : ?>
					<i onclick="window.location.href='<?php echo ADMIN_BASE_URL; ?>'" style="cursor:pointer;margin:0px 7px;color:red;" class="fas fa-tachometer-alt" title="Dashboard"></i>
				<?php endif; ?>
				<i onclick="window.location.href='<?php echo BASE_URL . 'Home/History'; ?>'" style="cursor:pointer;margin:0px 5px;" class="fas fa-history" title="Lịch sử giao dịch"></i>
				<div class="cart" onclick="window.location.href='<?php echo BASE_URL . 'Order/Index'; ?>'">

				</div>
				<label style="margin:0;margin-right:10px;">Xin chào, <?php echo $_SESSION['USER_SESSION']; ?></label>
				<i data-toggle="modal" data-target="#logoutModal" class="fas fa-power-off" style="color:red;cursor:pointer;"></i>
			<?php endif; ?>
		</div>
	</div>
	<!-- header end -->

	<!-- content start -->
	<?php
	if (file_exists($link . $model['page'] . '.php')) {
		require_once($link . $model['page'] . '.php');
	}
	?>
	<!-- content end -->

	<!-- Logout Modal Start -->
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
					<a class="btn btn-danger" href="<?php echo BASE_URL; ?>Login/Logout">Thoát</a>
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Logout Modal End -->

	<script>
		$(document).ready(function() {
			$('#historyTable').DataTable({
				order: [
					[4, 'desc']
				]
			});
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="<?php echo JS_URL; ?>/layout.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>