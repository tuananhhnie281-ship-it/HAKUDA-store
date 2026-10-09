<?php require_once __DIR__."/../header.php" ?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Quản lý sản phẩm</h3>

        <a href="index.php?modun=Product&action=create"
           class="btn btn-success">
            + Thêm sản phẩm
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header fw-bold">
            Danh sách sản phẩm
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Chưa kết nối dữ liệu sản phẩm.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="index.php" class="btn btn-secondary mt-3">
        Trang chủ
    </a>

</div>

<?php require_once __DIR__."/../footer.php" ?>