<div class="content" style="height:92%;">
    <!-- wrapper start -->
    <div class="order-wrapper">
        <div class="carts">
            <?php if (count($model['listCarts']) > 0) : ?>
                <?php foreach (array_reverse($model['listCarts']) as $item) : ?>
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
            <?php else : ?>
                <div style="display:flex;flex-direction:column;justify-content:center;align-items:center;height:100%;text-align:center;">
                    <label style="color:red;font-weight:bold;">Không có sản phẩm nào trong giỏ!</label>
                    <label style="color:red;font-weight:bold;">NOTE: Không thể tiến hành đặt hàng nếu giỏ hàng rỗng!</label>
                </div>
            <?php endif; ?>
        </div>
        <div class="detail scroll-down">
            <!-- detail-form-start -->
            <form class="detail-form">
                <label style="color:red;font-weight:bold;">Điền đầy đủ thông tin (bắt buộc)</label>
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" name="detail-name" value="<?php echo $model['account']['Name']; ?>" placeholder="Nhập họ và tên ..." required>
                </div>
                <div class="form-group">
                    <label>Đối tượng</label>
                    <select class="form-control" id="detail-object">
                        <option>Cựu giáo chức</option>
                        <option>Cán bộ, viên chức, giảng viên</option>
                        <option>Sinh viên</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Đơn vị</label>
                    <select class="form-control" id="detail-khoa">
                        <option>Khoa Toán - Tin học</option>
                        <option>Khoa Vật lí</option>
                        <option>Khoa Hóa học</option>
                        <option>Khoa Sinh học</option>
                        <option>Khoa Công nghệ thông tin</option>
                        <option>Khoa Ngữ văn</option>
                        <option>Khoa Lịch sử</option>
                        <option>Khoa Địa lí</option>
                        <option>Khoa Khoa học Giáo dục</option>
                        <option>Khoa Tâm lí học</option>
                        <option>Khoa Giáo dục Chính trị</option>
                        <option>Khoa Giáo dục Tiểu học</option>
                        <option>Khoa Giáo dục Mầm non</option>
                        <option>Khoa Giáo dục Thể chất</option>
                        <option>Khoa Giáo dục Đặc biệt</option>
                        <option>Khoa Giáo dục Quốc phòng</option>
                        <option>Khoa Tiếng Anh</option>
                        <option>Khoa Tiếng Pháp</option>
                        <option>Khoa Tiếng Nga</option>
                        <option>Khoa Tiếng Trung</option>
                        <option>Khoa Tiếng Nhật</option>
                        <option>Khoa Tiếng Hàn Quốc</option>
                        <option>Phòng Tổ chức Hành chính</option>
                        <option>Phòng Kế hoạch Tài chính</option>
                        <option>Phòng Công tác Chính trị và Học sinh, sinh viên</option>
                        <option>Phòng Hợp tác Quốc tế</option>
                        <option>Phòng Đào tạo</option>
                        <option>Phòng Sau Đại học</option>
                        <option>Phòng Thanh tra Đào tạo</option>
                        <option>Phòng Khảo thí và Đảm bảo chất lượng</option>
                        <option>Phòng Khoa học Công nghệ và Môi trường - Tạp chí Khoa học</option>
                        <option>Phòng Quản trị Thiết bị</option>
                        <option>Phòng Công nghệ Thông tin</option>
                        <option>Ký túc xá</option>
                        <option>Trạm Y tế</option>
                        <option>Thư viện</option>
                        <option>Viện Nghiên cứu Giáo dục</option>
                        <option>Trường Trung học Thực hành</option>
                        <option>Trung tâm Tin học</option>
                        <option>Trung tâm Ngoại ngữ</option>
                        <option>Trung tâm Phát triển Kỹ năng Sư phạm</option>
                        <option>Trung tâm STEM</option>
                        <option>Nhà xuất bản</option>
                        <option>Trung tâm ứng dụng, bồi dưỡng tâm lý giáo dục</option>
                        <option>Tổ Giáo dục Nữ công</option>
                        <option>Cựu giáo chức</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="color:red;font-weight:bold;">Tình hình sức khỏe</label>
                    <select class="form-control" id="detail-health">
                        <option>F0 điều trị tại nhà</option>
                        <option>F1 cách ly tại nhà</option>
                        <option>F2 tự cách ly tại nhà</option>
                        <option>Có tiếp xúc với đối tượng nghi nhiễm nhưng đảm bảo đủ an toàn, không thuộc diện F1, F2</option>
                        <option>Không tiếp xúc với đối tượng nghi nhiễm</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mã số sinh viên/Mã cán bộ, viên chức</label>
                    <input type="text" class="form-control" name="detail-mssv" value="<?php echo $model['account']['UserName']; ?>" placeholder="Nhập mã số sinh viên/Mã cán bộ, viên chức ..." required>
                    <small>Mã số sinh viên/ Mã cán bộ, viên chức/ SĐT (Đối với thầy, cô nguyên là cán bộ, viên chức, giảng viên Trường)</small>
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
            </form>
            <!-- detail-form-end -->
        </div>
        <div class="method scroll-down">
            <div class="form-group">
                <label style="color:red;font-weight:bold;">Chọn phương thức nhận đồ (bắt buộc)</label>
                <select class="form-control" id="method">
                    <option>Chuyển đến nhà qua các ứng dụng giao hàng (Người nhận trả phí vận chuyển, Ban tổ chức hỗ trợ đặt dịch vụ)</option>
                    <option>Tình nguyện viên giao hàng tận nơi miễn phí (Chỉ áp dụng đối với người trong khu vực phong tỏa hoặc đang tự cách ly, điều trị tại nhà)</option>
                    <option>Nhận tại các điểm tiếp nhận (Người nhận tự đến lấy tại điểm tiếp nhận đã đăng ký)</option>
                </select>
            </div>
            <div class="form-group" id="method-area">
                <label>Địa chỉ hiện tại</label>
                <input type="text" class="form-control" id="method-address" placeholder="Địa chỉ hiện tại" value="<?php echo $model['account']['Address']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Ghi chú (nếu cần thiết)</label>
                <textarea class="form-control" id="method-note" rows="4"></textarea>
            </div>
            <div style="display:flex;justify-content:center" id="order-btn">
                <a onclick="$('#checkOrderModal').modal();" style="width:100%;" class="btn btn-primary">ĐẶT</a>
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
                <label style="color:red;font-weight:bold;">(Tiến hành đặt hàng sẽ thất bại nếu giỏ hàng rỗng!)</label>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addOrder();" class="btn btn-primary" data-dismiss="modal">Đặt</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end check order modal -->