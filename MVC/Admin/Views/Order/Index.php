<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h4 mb-1 text-gray-800">Hóa đơn</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <span data-toggle="modal" data-target="#addModal">
                <button title="Add User" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
            </span>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="orderTable" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>MSSV</th>
                            <th>Tên</th>
                            <th>Điện thoại</th>
                            <th>Nơi nhận</th>
                            <th>Vị trí</th>
                            <th>Ngày tạo</th>
                            <th>Ngày nhận</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- view modal -->
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