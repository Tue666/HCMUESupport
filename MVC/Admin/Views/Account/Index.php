<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Tài khoản</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN_BASE_URL ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Accounts</li>
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
                            <table class="table table-bordered table-hover" id="accountTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Type</th>
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

<!-- add modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add-user-form">
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input type="text" autocomplete="off" id="checkNameAdmin" name="add-username" class="form-control" placeholder="Enter user name ...">
                    </div>
                    <div style="text-align:center;" id="showMessageAdmin"></div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="add-password" class="form-control" placeholder="Enter password ...">
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="add-isadmin" type="checkbox">
                        <label class="form-check-label">Cấp quyền Admin?</label>
                    </div>
                    <div class="modal-footer">
                        <a id="addUser" type="button" class="btn btn-primary disabled" data-dismiss="modal">Lưu</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add modal -->

<!-- edit modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id-edit" />
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" autocomplete="off" name="edit-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="edit-email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="edit-phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="edit-address" class="form-control">
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="edit-isadmin" type="checkbox">
                        <label class="form-check-label">Cấp quyền Admin?</label>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="edit-status" type="checkbox">
                        <label class="form-check-label">Khóa?</label>
                    </div>
                    <div class="modal-footer">
                        <button id="editUser" type="button" class="btn btn-success" data-dismiss="modal">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->

<!-- remove modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id-remove" />
                Bạn có chắc muốn xóa <label style="font-weight:bold;color:red;"></label> ?
            </div>
            <div class="modal-footer">
                <button onclick="removeItem()" type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->

<!-- reset pass modal -->
<div class="modal fade" id="resetPassModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id-resetPass" />
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" name="reset-pass" id="checkPassReset" class="form-control" placeholder="Enter new password ...">
                    </div>
                    <div class="modal-footer">
                        <a id="resetPass" type="button" class="btn btn-warning disabled" data-dismiss="modal">Lưu</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end reset pass modal -->