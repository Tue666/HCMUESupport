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
    <!-- login-container-start -->
    <div class="login-container">
        <!-- logo-start -->
        <img class="logo" src="https://dkhp.hcmue.edu.vn/Content/images/logo_HCMUP.png" />
        <!-- logo-end -->

        <!-- login-wrapper-start -->
        <div class="login-wrapper">
            <!-- login-form-start -->
            <form class="login-form" action="<?php echo BASE_URL; ?>Login/Login" method="POST">
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input type="text" class="form-control" name="login-user-name" placeholder="Nhập tên tài khoản ..." required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="login-password" placeholder="Nhập mật khẩu ..." required>
                </div>
                <input class="btn" name="login-btn" type="submit" value="ĐĂNG NHẬP">
                <div class="option-2">
                    <label>Chưa có tài khoản?<a href="#">Đăng ký ngay</a></label>
                </div>
            </form>
            <!-- login-form-end -->

            <!-- regis-form-start -->
            <form class="regis-form" action="<?php echo BASE_URL; ?>Login/Register" method="POST">
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input type="text" id="checkUserName" class="form-control" name="regis-user-name" placeholder="Nhập tên tài khoản ..." autocomplete="off" required>
                </div>
                <div id="showMessage" style="margin-bottom:10px;color:red"></div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="regis-password" placeholder="Nhập mật khẩu ..." required>
                </div>
                <div class="form-group">
                    <label>Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="regis-confirm-password" placeholder="Nhập lại mật khẩu ..." required>
                </div>
                <input class="btn" name="register-btn" type="submit" value="TIẾP TỤC">
                <div class="option-2">
                    <label>Có tài khoản?<a href="#">Đăng nhập</a></label>
                </div>
            </form>
            <!-- regis-form-end -->

            <!-- message start -->
            <div style="text-align: center;">
                <?php if (isset($model['message']) && isset($model['type'])) : ?>
                    <?php $color = ($model['type'] == 'error') ? "red" : "green"; ?>
                    <label style="font-size:16px;color:<?php echo $color; ?>;align-self:center">
                        <?php
                        echo $model['message'];
                        ?>
                    </label>
                <?php endif; ?>
            </div>
            <!-- message end -->
        </div>
        <!-- login-wrapper-end -->
    </div>
    <!-- login-container-end -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo JS_URL; ?>/login.js"></script>
</body>

</html>