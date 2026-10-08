<?php
include "connect.php";

// ================= THÊM HÃNG =================
if (isset($_POST['them'])) {

    $maHang = trim($_POST['maHang']);
    $tenHang = trim($_POST['tenHang']);
    $xuatXu = trim($_POST['xuatXu']);

    $sql = "INSERT INTO hang_san_xuat (MaHang, TenHang, XuatXu)
            VALUES ('$maHang', '$tenHang', '$xuatXu')";

    if ($conn->query($sql)) {
        $thongBao = "Thêm hãng sản xuất thành công!";
        $loai = "success";
    } else {
        $thongBao = "Lỗi: " . $conn->error;
        $loai = "error";
    }
}


// ================= XÓA HÃNG =================
if (isset($_GET['xoa'])) {

    $maHang = $_GET['xoa'];

    $sql = "DELETE FROM hang_san_xuat
            WHERE MaHang = '$maHang'";

    if ($conn->query($sql)) {
        header("Location: hang_san_xuat.php");
        exit();
    } else {
        $thongBao = "Không thể xóa: " . $conn->error;
        $loai = "error";
    }
}


// ================= LẤY DỮ LIỆU SỬA =================
$duLieuSua = null;

if (isset($_GET['sua'])) {

    $maHang = $_GET['sua'];

    $sql = "SELECT *
            FROM hang_san_xuat
            WHERE MaHang = '$maHang'";

    $resultSua = $conn->query($sql);

    if ($resultSua->num_rows > 0) {
        $duLieuSua = $resultSua->fetch_assoc();
    }
}


// ================= CẬP NHẬT =================
if (isset($_POST['capnhat'])) {

    $maHang = trim($_POST['maHang']);
    $tenHang = trim($_POST['tenHang']);
    $xuatXu = trim($_POST['xuatXu']);

    $sql = "UPDATE hang_san_xuat
            SET TenHang = '$tenHang',
                XuatXu = '$xuatXu'
            WHERE MaHang = '$maHang'";

    if ($conn->query($sql)) {

        header("Location: hang_san_xuat.php");
        exit();

    } else {

        $thongBao = "Lỗi: " . $conn->error;
        $loai = "error";

    }
}


// ================= HIỂN THỊ DANH SÁCH =================
$sql = "SELECT *
        FROM hang_san_xuat
        ORDER BY MaHang";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Quản lý hãng sản xuất</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.10);
            margin-bottom: 30px;
        }

        .title {
            text-align: center;
            margin-bottom: 25px;
        }

        .title h2 {
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .title p {
            color: #64748b;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #2563eb;
            width: 100%;
            font-size: 16px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-warning {
            background: #f59e0b;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-secondary {
            background: #64748b;
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #1e3a8a;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f8fafc;
        }

        .actions {
            white-space: nowrap;
        }

        .actions .btn {
            margin-right: 5px;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 25px;
        }

    </style>

</head>


<body>

<div class="container">


    <!-- ================= FORM ================= -->

    <div class="card">

        <div class="title">

            <?php if ($duLieuSua != null) { ?>

                <h2>SỬA HÃNG SẢN XUẤT</h2>

                <p>Cập nhật thông tin hãng sản xuất</p>

            <?php } else { ?>

                <h2>QUẢN LÝ HÃNG SẢN XUẤT</h2>

                <p>Thêm hãng sản xuất mới</p>

            <?php } ?>

        </div>


        <?php if (isset($thongBao)) { ?>

            <div class="<?= $loai ?>">

                <?= $thongBao ?>

            </div>

        <?php } ?>


        <form method="post">


            <?php if ($duLieuSua != null) { ?>


                <!-- MÃ HÃNG -->

                <div class="form-group">

                    <label>Mã hãng</label>

                    <input
                        type="text"
                        name="maHang"
                        value="<?= htmlspecialchars($duLieuSua['MaHang']) ?>"
                        readonly
                    >

                </div>


                <!-- TÊN HÃNG -->

                <div class="form-group">

                    <label>Tên hãng sản xuất</label>

                    <input
                        type="text"
                        name="tenHang"
                        value="<?= htmlspecialchars($duLieuSua['TenHang']) ?>"
                        required
                    >

                </div>


                <!-- XUẤT XỨ -->

                <div class="form-group">

                    <label>Xuất xứ</label>

                    <input
                        type="text"
                        name="xuatXu"
                        value="<?= htmlspecialchars($duLieuSua['XuatXu']) ?>"
                        required
                    >

                </div>


                <button
                    type="submit"
                    name="capnhat"
                    class="btn btn-warning"
                >
                    CẬP NHẬT
                </button>


                <a
                    href="hang_san_xuat.php"
                    class="btn btn-secondary"
                >
                    HỦY
                </a>


            <?php } else { ?>


                <!-- MÃ HÃNG -->

                <div class="form-group">

                    <label>Mã hãng</label>

                    <input
                        type="text"
                        name="maHang"
                        placeholder="Ví dụ: HG05"
                        required
                    >

                </div>


                <!-- TÊN HÃNG -->

                <div class="form-group">

                    <label>Tên hãng sản xuất</label>

                    <input
                        type="text"
                        name="tenHang"
                        placeholder="Ví dụ: Bandai"
                        required
                    >

                </div>


                <!-- XUẤT XỨ -->

                <div class="form-group">

                    <label>Xuất xứ</label>

                    <input
                        type="text"
                        name="xuatXu"
                        placeholder="Ví dụ: Nhật Bản"
                        required
                    >

                </div>


                <button
                    type="submit"
                    name="them"
                    class="btn btn-primary"
                >
                    + THÊM HÃNG SẢN XUẤT
                </button>


            <?php } ?>


        </form>

    </div>



    <!-- ================= DANH SÁCH ================= -->

    <div class="card">

        <div class="title">

            <h2>DANH SÁCH HÃNG SẢN XUẤT</h2>

        </div>


        <table>

            <thead>

                <tr>

                    <th>Mã hãng</th>

                    <th>Tên hãng</th>

                    <th>Xuất xứ</th>

                    <th>Thao tác</th>

                </tr>

            </thead>


            <tbody>


            <?php if ($result->num_rows > 0) { ?>


                <?php while ($row = $result->fetch_assoc()) { ?>


                    <tr>


                        <td>

                            <?= htmlspecialchars($row['MaHang']) ?>

                        </td>


                        <td>

                            <?= htmlspecialchars($row['TenHang']) ?>

                        </td>


                        <td>

                            <?= htmlspecialchars($row['XuatXu']) ?>

                        </td>


                        <td class="actions">


                            <!-- SỬA -->

                            <a
                                href="hang_san_xuat.php?sua=<?= urlencode($row['MaHang']) ?>"
                                class="btn btn-warning"
                            >
                                Sửa
                            </a>


                            <!-- XÓA -->

                            <a
                                href="hang_san_xuat.php?xoa=<?= urlencode($row['MaHang']) ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa hãng sản xuất này không?')"
                            >
                                Xóa
                            </a>

                        </td>
                    </tr>
                    
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" class="empty">
                        Chưa có hãng sản xuất nào.
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>