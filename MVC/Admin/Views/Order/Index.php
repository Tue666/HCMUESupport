<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hóa đơn</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN_BASE_URL ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="orderTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MSSV</th>
                                        <th>Tên</th>
                                        <th>Điện thoại</th>
                                        <th>Nơi nhận</th>
                                        <th>Vị trí</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày nhận</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer">
                    <p>Copyright © 9hT <?php echo date('Y'); ?></p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- view modal -->
<div id="printThis">
    <div class="modal fade" id="viewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end view modal -->

<!-- received modal -->
<div class="modal fade" id="receivedModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ngày nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" name="id-received-order" />
                        <input type="date" id="date-received" class="form-control" placeholder="Enter new password ...">
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-success" data-dismiss="modal" onclick="updateReceivedDay();">Lưu</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end received modal -->

<div id="printThis">
    <div id="MyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <!-- Modal Content: begins -->
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Your Headings</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="body-message">
                        <h4>Any Heading</h4>
                        <p>And a paragraph with a full sentence or something else...</p>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button id="btnPrint" type="button" class="btn btn-default">Print</button>
                </div>

            </div>
            <!-- Modal Content: ends -->

        </div>
    </div>
</div>