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
        <!-- login-wrapper-start -->
        <div class="login-wrapper">
            <div style="text-align: center;">
                <label style="font-size:16px;color:red;align-self:center">Vì tính chất quan trọng, mong mọi người điền đúng thông tin hiện tại. Xin cảm ơn!</label>
            </div>
            <!-- update-form-start -->
            <form class="update-form" action="<?php echo BASE_URL; ?>Auth/Update" method="POST">
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" class="form-control" name="update-name" placeholder="Nhập tên người dùng ..." required>
                </div>
                <div class="form-group">
                    <label>Email/Gmail</label>
                    <input type="emial" class="form-control" name="update-email" placeholder="Nhập email hoặc gmail ..." required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="update-address" placeholder="Nhập địa chỉ ..." required>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="update-phone" placeholder="Nhập số điện thoại ..." maxlength="10" required>
                </div>
                <input class="btn" name="update-btn" type="submit" value="CẬP NHẬT">
                <div class="option-2">
                    <label style="margin:0"><a href="<?php echo BASE_URL . 'Login/Index'; ?>">Quay lại</a></label>
                </div>
            </form>
            <!-- update-form-end -->

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