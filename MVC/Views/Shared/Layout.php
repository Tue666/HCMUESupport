<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $model['title']; ?></title>
	<link rel="icon" href="https://dkhp.hcmue.edu.vn/Content/images/logo_HCMUP.png">
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<!-- header start -->
	<div class="header">
		<img style="width:200; height:100%;" src="https://dkhp.hcmue.edu.vn/Content/images/logo_HCMUP.png" />
		<div style="display:flex;flex-direction:row;align-items:center">
			<?php if (empty($_SESSION['USER_SESSION'])) : ?>
				<a class="btn btn-danger" href="<?php echo BASE_URL . 'Login/Index'; ?>">ĐĂNG NHẬP</a>
			<?php else : ?>
				<div class="cart">
					
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="<?php echo JS_URL; ?>/layout.js"></script>
</body>

</html>