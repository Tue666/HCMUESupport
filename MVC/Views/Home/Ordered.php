<div class="content .ordered" style="height:100%;">
    <!-- wrapper start -->
    <div class="order-wrapper">
        <div class="ordered">
            <?php foreach ($model['listOrdered'] as $key => $value) : ?>
                <div class="item">
                    <div class="item-image">
                        <img style="width:90%;height:90%;background-size:100% auto;border-radius:5px;" src="<?php echo IMAGE_URL . '/' . $value['Image']; ?>" />
                    </div>
                    <div class="item-infor">
                        <label class="item-name" title="<?php echo $value['ProductName']; ?>"><?php echo $value['ProductName']; ?></label>
                        <label class="item-description" title="<?php echo ($value['Description'] ? $value['Description'] : 'Chưa có mô tả cho sản phẩm này'); ?>"><?php echo ($value['Description'] ? $value['Description'] : 'Chưa có mô tả cho sản phẩm này'); ?></label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="infor scroll-down">
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Mã số:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['MSSV']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Đối tượng:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['Object']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Khoa:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['Khoa']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Tên:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['CustomerName']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Email:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['CustomerEmail']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Địa chỉ:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['CustomerAddress']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Điện thoại:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['CustomerPhone']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Sức khỏe:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['Health']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Nơi nhận:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['Place']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Địa chỉ đính kèm:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['Address'] ? $model['orderByID']['Address'] : '-------'; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Đặt hàng ngày:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['CreatedDay']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold;width:25%;">Ngày nhận:</label>
                <label style="width:70%;"><?php echo $model['orderByID']['ReceivedDay'] ? $model['orderByID']['ReceivedDay'] : '-------'; ?></label>
            </div>
            <label style="font-weight:bold">Ghi chú</label>
            <?php if ($model['orderByID']['Status'] == -1) :  ?>
                <label style="color:red;font-weight:bold"><?php echo $model['orderByID']['Note'] ? $model['orderByID']['Note'] : '-------'; ?></label>
            <?php else: ?>
                <label><?php echo $model['orderByID']['Note'] ? $model['orderByID']['Note'] : '-------'; ?></label>
            <?php endif; ?>
        </div>
        <div class="status scroll-down">
            <?php if ($model['orderByID']['Status'] == 2) : ?>
                <label style="color:green;font-weight:bold">Đã nhận</label>
                <img style="width:300px;height:300px" src="<?php echo IMAGE_URL . '/received.gif'; ?>" />
            <?php elseif ($model['orderByID']['Status'] == 0) : ?>
                <label style="color:red;font-weight:bold">Đang xử lý</label>
                <img style="width:300px;height:300px" src="<?php echo IMAGE_URL . '/process.gif'; ?>" />
            <?php elseif ($model['orderByID']['Status'] == 1) : ?>
                <label style="color:red;font-weight:bold">Đang soạn hàng</label>
                <img style="width:300px;height:300px" src="<?php echo IMAGE_URL . '/process.gif'; ?>" />
            <?php else: ?>
                <label style="color:red;font-weight:bold">Đơn bị hủy</label>
            <?php endif; ?>
        </div>
    </div>
    <!-- wrapper end -->
</div>