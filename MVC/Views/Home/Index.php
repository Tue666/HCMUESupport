<div class="content">
    <!-- logo start -->
    <div class="logo">
        <img class="img-logo" src="http://hehe292001.000webhostapp.com/Public/images/egg.jpg" alt="">
    </div>
    <!-- logo end -->

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

    <?php if (!empty($_SESSION['USER_SESSION'])) : ?>
        <!-- wrapper-carts start -->
        <div class="wrapper-carts">
            <?php foreach ($model['listCarts'] as $item) : ?>
                <div class="item">
                    <input type="hidden" class="cart-item" value="<?php echo $item['ProductID']; ?>">
                    <div class="item-image">
                        <img style="width:90%;height:90%;background-size:100% auto;border-radius:5px;" src="<?php echo IMAGE_URL . '/' . $item['Image']; ?>" />
                    </div>
                    <div class="item-infor">
                        <label class="item-name" title="<?php echo $item['ProductName']; ?>"><?php echo $item['ProductName']; ?></label>
                        <label class="item-description" title="<?php echo ($item['Description']) ? $item['Description'] : " Chưa có mô tả cho sản phẩm này"; ?>"><?php echo ($item['Description']) ? $item['Description'] : " Chưa có mô tả cho sản phẩm này"; ?></label>
                        <i title="Xóa" class="far fa-trash-alt item-remove" onclick="passDataRemove(<?php echo $item['ProductID']; ?>,'<?php echo $item['ProductName']; ?>');"></i>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- wrapper-carts end -->
    <?php endif; ?>
</div>

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
                <button onclick="removeCart(0)" type="button" class="btn btn-danger" data-dismiss="modal">Xóa</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->

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