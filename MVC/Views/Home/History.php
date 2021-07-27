<div class="content">
    <div class="history-wrapper">
        <table id="historyTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Nơi nhận</th>
                    <th>Ghi chú</th>
                    <th>Ngày tạo</th>
                    <th>Ngày nhận</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['ordersByUser'] as $item) : ?>
                    <tr>
                        <td><?php echo $item['ID']; ?></td>
                        <td><?php echo $item['CustomerName']; ?></td>
                        <td><?php echo $item['Place']; ?></td>
                        <td><?php echo $item['Note']; ?></td>
                        <td><?php echo $item['CreatedDay']; ?></td>
                        <td><?php echo $item['ReceivedDay']; ?></td>
                        <td>
                            <?php if ($item['Status']) : ?>
                                <label class="text-success" style="font-weight:bold;">Đã nhận</label>
                            <?php else : ?>
                                <label class="text-danger"  style="font-weight:bold;">Đang xử lý</label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button onclick="window.location.href='<?php echo BASE_URL . 'Home/Ordered/' . $item['ID']; ?>'" class="btn btn-secondary" title="Xem"><i class="far fa-eye"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>