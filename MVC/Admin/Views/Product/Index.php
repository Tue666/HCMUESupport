<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hàng hóa</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN_BASE_URL ?>">Quản lí</a></li>
                        <li class="breadcrumb-item active">Hàng hóa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div>
        <span data-toggle="modal" data-target="#addModal">
            <button title="Thêm hàng hóa" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
        </span>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="productTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Hình</th>
                                        <th>Loại</th>
                                        <th>Mô tả</th>
                                        <th>Số lượng</th>
                                        <th>Ngày tạo</th>
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
                <form id="formID" class="add-product-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên hàng hóa</label>
                        <input type="text" autocomplete="off" name="add-name" class="form-control" placeholder="Nhập tên hàng hóa ...">
                    </div>
                    <div class="form-group">
                        <label>Loại</label>
                        <select class="form-control">
                            <?php foreach ($model['listCate'] as $item) : ?>
                                <option><?php echo $item['CateName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" id="fileID" name="add-image" class="form-control-file">
                        <small>Chỉ nhận file .jpg .jpeg .png</small>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="add-quantity" placeholder="Nhập số lượng ..." min='0'>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" id="add-description" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <a id="addProduct" type="button" class="btn btn-primary disabled" data-dismiss="modal">Lưu</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
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
                <form class="edit-product-form">
                    <input type="hidden" name="id-edit" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" autocomplete="off" name="edit-product-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Loại</label>
                        <select class="form-control">
                            <?php foreach ($model['listCate'] as $item) : ?>
                                <option><?php echo $item['CateName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" name="edit-quantity" class="form-control" min='0'>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-around">
                        <div>
                            <img id="editImage" style="width:150px;height:100px;" />
                        </div>
                        <div>
                            <input type="file" id="editFileID" name="edit-image" class="form-control-file">
                            <small>Để nguyên nếu không muốn thay đổi hình ảnh</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" id="edit-description" rows="3"></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="edit-status" type="checkbox">
                        <label class="form-check-label">Khóa sản phẩm?</label>
                        <small>Mọi sản phẩm bị khóa sẽ không được hiển thị lẫn thao tác.</small>
                    </div>
                    <div class="modal-footer">
                        <a id="editProduct" type="button" class="btn btn-success" data-dismiss="modal">Lưu</a>
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
                <button onclick="removeItem(1)" type="button" class="btn btn-danger" data-dismiss="modal">Xóa</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->