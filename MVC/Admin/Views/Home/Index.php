<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tài khoản</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-700"><?php echo $model['totalAdmin'] + $model['totalUser']; ?></div>
                            <div>( <?php echo $model['totalAdmin']; ?> Admins - <?php echo $model['totalUser']; ?> Users )</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hàng hóa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-700"><?php echo $model['totalProduct']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-product-hunt fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hóa đơn</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-700">Tất cả: <?php echo $model['totalProcessOrder'] + $model['totalSuccessOrder']; ?></div>
                            <div class="h6 mb-0 font-weight-bold text-gray-700">Chưa xử lý: <?php echo $model['totalProcessOrder']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
</div>