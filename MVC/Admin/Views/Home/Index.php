<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hello, <span>Welcome back!</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Quản lí</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fas fa-user color-success border-success"></i>
                        </div>
                        <div class="stat-content dib">
                            <div class="stat-digit">Tài khoản</div>
                            <div class="stat-text">(<?php echo $model['totalAdmin']; ?> Quản lý - <?php echo $model['totalUser']; ?> Người dùng)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fab fa-product-hunt color-primary border-primary"></i>
                        </div>
                        <div class="stat-content dib">
                            <div class="stat-digit">Hàng hóa</div>
                            <div class="stat-text"><?php echo $model['totalProduct']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fas fa-clipboard-list color-pink border-pink"></i>
                        </div>
                        <div class="stat-content dib">
                            <div class="stat-digit">Hóa đơn</div>
                            <div class="stat-text">Tất cả: <?php echo $model['totalProcessOrder'] + $model['totalSuccessOrder'] + $model['totalDoingOrder']; ?> (Chưa xử lý: <?php echo $model['totalProcessOrder'] + $model['totalDoingOrder']; ?>)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="height:238px;"></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer d-flex justify-content-center align-items-center">
                    <p class="text-center">Bản quyền <?php echo date("Y"); ?> thuộc về Đoàn - Hội khoa Công nghệ Thông tin</p>
                </div>
            </div>
        </div>
    </section>
</div>