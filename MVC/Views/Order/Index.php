<div class="content">
    <!-- wrapper start -->
    <div class="order-wrapper">
        <div class="carts">

        </div>
        <div class="detail scroll-down">
            <!-- detail-form-start -->
            <form class="detail-form">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" name="detail-name" value="<?php echo $model['account']['Name']; ?>" placeholder="Nhập họ và tên ..." required>
                </div>
                <div class="form-group">
                    <label>Khoa</label>
                    <input type="text" class="form-control" name="detail-khoa" placeholder="Nhập vào khoa ..." required>
                </div>
                <div class="form-group">
                    <label>MSSV</label>
                    <input type="text" class="form-control" name="detail-mssv" value="<?php echo $model['account']['UserName']; ?>" placeholder="Nhập MSSV ..." required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ hiện tại</label>
                    <input type="text" class="form-control" name="detail-address" value="<?php echo $model['account']['Address']; ?>" placeholder="Nhập địa chỉ ..." required>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="detail-phone" value="<?php echo $model['account']['Phone']; ?>" maxlength="10" placeholder="Nhập số điện thoại ..." required>
                </div>
                <div class="form-group">
                    <label>Email/Gmail</label>
                    <input type="email" class="form-control" name="detail-email" value="<?php echo $model['account']['Email']; ?>" placeholder="Nhập email hoặc gmail ..." required>
                </div>
                <div style="display:flex;justify-content:center" id="order-btn">
                    <label style="color:red;">Điền đầy đủ thông tin để đặt</label>
                </div>
            </form>
            <!-- detail-form-end -->
        </div>
        <div class="method scroll-down">
            <div class="form-group">
                <label style="color:red;font-weight:bold;">Chọn phương thức nhận đồ</label>
                <select class="form-control" id="method">
                    <option>Nhận tại trường</option>
                    <option>Nhận tại điểm chốt</option>
                    <option>Nhận theo địa chỉ</option>
                </select>
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="method-address" placeholder="Địa chỉ ..." readonly>
            </div>
            <div class="form-group">
                <label>Ghi chú (nếu cần thiết)</label>
                <textarea class="form-control" id="method-note" rows="4"></textarea>
            </div>
        </div>
    </div>
    <!-- wrapper end -->
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
                <button onclick="removeCart()" type="button" class="btn btn-danger" data-dismiss="modal">Xóa</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->

<!-- start check order modal -->
<div class="modal fade" id="checkOrderModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kiểm tra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Chắc chắn đã kiểm tra kỹ các <label style="color:red;font-weight:bold;">thông tin, phương thức nhận</label> trước khi tiến hành đặt hàng.
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addOrder();" class="btn btn-primary" data-dismiss="modal">Đặt</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end check order modal -->