<div class="content">
    <!-- wrapper start -->
    <div class="wrapper">
        <!-- searching start -->
        <div class="searching">
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="search-key-word" placeholder="Nhập sản phẩm cần tìm ...">
                    <small class="form-text text-muted">Ví dụ: rau, nước uống, ...</small>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" id="search-category">
                        <option>Tất cả</option>
                        <?php foreach ($model['listCategories'] as $item) : ?>
                            <option><?php echo $item['CateName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-muted">Loại</small>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" id="search-status">
                        <option>Tất cả</option>
                    </select>
                    <small class="form-text text-muted">Số lượng</small>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary" onclick="searching();"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <!-- searching end -->
        <!-- products start -->
        <div class="products">
            
        </div>
        <!-- products end -->
    </div>
    <!-- wrapper end -->
</div>

<!-- start login permission modal -->
<div class="modal fade" id="loginPermissionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:black;" class="modal-title">Oops!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color:black;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color:black;">Đăng nhập để sử dụng. Cảm ơn :D</label>
            </div>
            <div class="modal-footer">
                <button onclick="window.location.href='<?php echo BASE_URL; ?>Login/Index'" type="button" class="btn btn-danger" data-dismiss="modal">Đăng nhập</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end login permission modal -->

<!-- start out quantity modal -->
<div class="modal fade" id="outQuantityModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:black;" class="modal-title">Oops!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color:black;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color:black;">
                    Có vẻ ai đó đã mua trước và hết hàng. Trong lúc chờ bạn có thể mua sản phẩm khác. Cảm ơn.
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- end out quantity modal -->

<!-- start order permisstion modal -->
<div class="modal fade" id="orderPermisstionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:black;" class="modal-title">Oops!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color:black;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>
                    Bạn đã đặt hàng rồi. Hãy đợi đến lượt tiếp theo nhé :D.
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- end out quantity modal -->