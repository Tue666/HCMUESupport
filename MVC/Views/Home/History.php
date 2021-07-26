<div class="content">
    <div class="history-wrapper">
        <?php if ($model['totalItem'] > 0) : ?>
            <!-- table start -->
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Nơi nhận</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model['ordersByPage'] as $item) : ?>
                        <tr>
                            <td><?php echo $item['ID']; ?></td>
                            <td><?php echo $item['CustomerName']; ?></td>
                            <td><?php echo $item['Place']; ?></td>
                            <td><?php echo $item['Note']; ?></td>
                            <td><?php echo $item['CreatedDay']; ?></td>
                            <td>
                                <?php if ($item['Status']) : ?>
                                    <label class="text-success">Đã nhận</label>
                                <?php else : ?>
                                    <label class="text-danger">Đang xử lý</label>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button onclick="window.location.href='<?php echo BASE_URL . 'Home/Ordered/' . $item['ID']; ?>'" class="btn btn-secondary" title="Xem"><i class="far fa-eye"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- table end -->

            <!-- pagination start -->
            <nav class="pagination" style="display:flex;justify-content:center;">
                <ul class="pagination">
                    <?php if ($model['currentPage'] > 1) : ?>
                        <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/History/'; ?>>First</a></li>
                        <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/History/' . $model['prevPage']; ?>><span aria-hidden="true">&laquo;</span></a></li>
                    <?php endif; ?>

                    <?php
                    $startPage = 1;
                    $endPage = $model['totalPage'];
                    if ($model['currentPage'] - ($model['maxPage'] / 2) > 1) {
                        $startPage = $model['currentPage'] - ($model['maxPage'] / 2);
                    }
                    if ($model['currentPage'] + ($model['maxPage'] / 2) < $model['totalPage']) {
                        $endPage = $model['currentPage'] + ($model['maxPage'] / 2);
                    }
                    ?>
                    <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                        <?php if ($model['currentPage'] == $i) : ?>
                            <li class="page-item active" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/History/' . $i; ?>><?php echo $i; ?></a></li>
                        <?php else : ?>
                            <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/History/' . $i; ?>><?php echo $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($model['currentPage'] < $model['totalPage']) : ?>
                        <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/History/' . $model['nextPage']; ?>><span aria-hidden="true">&raquo;</span></a></li>
                        <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/History/' . $model['totalPage']; ?>>End</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <!-- pagination end -->
        <?php else : ?>
            <label>Chưa có đơn hàng nào</label>
        <?php endif; ?>
    </div>
</div>