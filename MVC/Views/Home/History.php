<div class="content history" style="height:100%;">
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
                
            </tbody>
        </table>
    </div>
</div>

<!-- remove modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hủy đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id-remove" />
                <label style="font-weight:bold;color:red;"></label>. Bấm 'Hủy' để hủy đơn hàng.
            </div>
            <div class="modal-footer">
                <button onclick="cancelOrder();" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->