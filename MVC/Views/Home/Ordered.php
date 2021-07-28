<div class="content">
    <!-- wrapper start -->
    <div class="order-wrapper">
        <div class="ordered">
            <?php foreach ($model['listOrdered'] as $item) : ?>
                <div class="item">
                    <label class="item-name" title="<?php echo $item; ?>"><?php echo $item; ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="infor">
            <div class="infor-item">
                <label style="font-weight:bold">(MSSV):</label>
                <label>(<?php echo $model['orderByID']['MSSV']; ?>)</label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Khoa:</label>
                <label><?php echo $model['orderByID']['Khoa']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Tên:</label>
                <label><?php echo $model['orderByID']['CustomerName']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Email:</label>
                <label><?php echo $model['orderByID']['CustomerEmail']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Address:</label>
                <label><?php echo $model['orderByID']['CustomerAddress']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Phone:</label>
                <label><?php echo $model['orderByID']['CustomerPhone']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Nơi nhận hàng:</label>
                <label style="font-weight:bold;"><?php echo $model['orderByID']['Place']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Địa chỉ đính kèm:</label>
                <label style="font-weight:bold;"><?php echo $model['orderByID']['Address'] ? $model['orderByID']['Address'] : '-------'; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Đặt hàng ngày:</label>
                <label><?php echo $model['orderByID']['CreatedDay']; ?></label>
            </div>
            <div class="infor-item">
                <label style="font-weight:bold">Ngày nhận:</label>
                <label><?php echo $model['orderByID']['ReceivedDay'] ? $model['orderByID']['ReceivedDay'] : '-------'; ?></label>
            </div>
            <label style="font-weight:bold">Ghi chú</label>
            <label><?php echo $model['orderByID']['Note'] ? $model['orderByID']['Note'] : '-------'; ?></label>
        </div>
        <div class="status">
            <?php if ($model['orderByID']['Status'] == 2) : ?>
                <label style="color:green;font-weight:bold">Đã nhận</label>
                <img style="width:300px;height:300px" src="https://lh3.googleusercontent.com/proxy/NUqVG0-hII_ol6QoXK6TDOG8J1U_e_qwQbXuqZfb_4bvPo7J5MmrvQJvftkXbC7SmNiVXMIABDb_nkPZth_p2fhVFmZ2218RFefIaYO0fyqrzK8NtyPquA" />
            <?php elseif ($model['orderByID']['Status'] == 0) : ?>
                <label style="color:red;font-weight:bold">Đang xử lý</label>
                <img style="width:300px;height:300px" src="https://acegif.com/wp-content/uploads/loading-36.gif" />
            <?php else : ?>
                <label style="color:red;font-weight:bold">Đang soạn hàng</label>
                <img style="width:300px;height:300px" src="https://acegif.com/wp-content/uploads/loading-36.gif" />
            <?php endif; ?>
        </div>
    </div>
    <!-- wrapper end -->
</div>