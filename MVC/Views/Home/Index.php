<?php if ($model['totalItem'] > 0) : ?>
    <!-- title start -->
    <div class="title">
        <p class="text-title">MIDDLE TERM WEB 2020-2021</p>
    </div>
    <!-- title end -->

    <!-- table start -->
    <a class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#addModal" title="Add"><i class="fas fa-plus-circle"></i></a>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>ProductName</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>CreatedDay</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model['product'] as $item) : ?>
                <tr>
                    <td><?php echo $item['ID']; ?></td>
                    <td><?php echo $item['ProductName']; ?></td>
                    <td><?php echo $item['IDCate']; ?></td>
                    <td><?php echo number_format($item['Price'], 0, '', ','); ?></td>
                    <td><?php echo $item['Quantity']; ?></td>
                    <td><?php echo $item['Discount']; ?></td>
                    <td><?php echo $item['CreatedDay']; ?></td>
                    <td><?php echo $item['Status']; ?></td>
                    <td>
                        <button class="btn btn-secondary" title="View"><i class="far fa-eye"></i></button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="far fa-edit"></i></button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal" title="Remove"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <!-- table end -->

    <!-- pagination start -->
    <nav class="pagination">
        <ul class="pagination">
            <?php if ($model['currentPage'] > 1) : ?>
                <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL; ?>>First</a></li>
                <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/Index/' . $model['prevPage']; ?>><span aria-hidden="true">&laquo;</span></a></li>
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
                    <li class="page-item active" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/Index/' . $i; ?>><?php echo $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/Index/' . $i; ?>><?php echo $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($model['currentPage'] < $model['totalPage']) : ?>
                <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/Index/' . $model['nextPage']; ?>><span aria-hidden="true">&raquo;</span></a></li>
                <li class="page-item" style="cursor:pointer"><a class="page-link" href=<?php echo BASE_URL . '/Home/Index/' . $model['totalPage']; ?>>End</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- pagination end -->





    <!-- modal start -->

    <!-- modal add start -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ADD ITEM HERE
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addItem();">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal add end -->

    <!-- modal edit start -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    EDIT ITEM HERE
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="editItem();">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit end -->

    <!-- modal remove start -->
    <div class="modal fade" id="removeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REMOVE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you wanna remvove this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="removeItem()">Remove</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal remove end -->

    <!-- modal end -->

    <!-- toasts start -->
    <div class="toast" role="alert" style="position: fixed; top: 0.8rem; right: 1rem; width: 17%; z-index: 999">
        <div class="toast-header" style="display:flex;justify-content:space-between;align-items:center;">
            <strong id="titleToast" style="color:#fff;">Success</strong>
            <a style="color:#fff;cursor:pointer;" onclick="hideToast();"><i class="fas fa-times"></i></a>
        </div>
        <div class="toast-body">
            <div style="display:flex;flex-direction:column;justify-content:space-between;align-items:center;">
                <div id="iconToast">

                </div>
                <div id="contentToast">

                </div>
            </div>
            <div id="cooldown-line">

            </div>
        </div>

    </div>
    <!-- toasts end -->
<?php else : ?>

<?php endif; ?>