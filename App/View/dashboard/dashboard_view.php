<?php require_once __DIR__."/../header.php" ?>

        <h2>🧸 Dashboard cửa hàng đồ chơi</h2>

        <p>Thống kê tổng quan cửa hàng</p>


        <!-- 4 ô thống kê -->
        <div class="row">

            <!-- Sản phẩm -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <a href="index.php?modun=Product"><h5>Sản phẩm</h5></a>
                    <h2><?= $slSanPham; ?></h2>
                </div>
            </div>


            <!-- Đơn hàng -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5>Đơn hàng</h5>
                    <h2>35</h2>
                </div>
            </div>


            <!-- Khách hàng -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5>Khách hàng</h5>
                    <h2>85</h2>
                </div>
            </div>


            <!-- Doanh thu -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h5>Doanh thu</h5>
                    <h2>25.000.000đ</h2>
                </div>
            </div>

        </div>


        <!-- Thống kê doanh thu -->
        <div class="card mt-4">

            <div class="card-body">

                <h4>📊 Thống kê doanh thu</h4>

                <p>Doanh thu tháng này</p>

                <h2>25.000.000đ</h2>

            </div>

        </div>


        <!-- Thống kê đơn hàng -->
        <div class="card mt-4">

            <div class="card-body">

                <h4>📦 Thống kê đơn hàng</h4>

                <p>Tổng số đơn hàng: <b>35</b></p>

                <p>Đơn hàng đã giao: <b>28</b></p>

                <p>Đơn hàng đang xử lý: <b>7</b></p>

            </div>

        </div>

    

<?php require_once __DIR__."/../footer.php" ?>