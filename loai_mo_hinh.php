<?php
include "connect.php";

// ================= THÊM =================
if (isset($_POST['them'])) {

    $maLoai = trim($_POST['maLoai']);
    $tenLoai = trim($_POST['tenLoai']);
    $moTa = trim($_POST['moTa']);

    $sql = "INSERT INTO loai_mo_hinh (MaLoai, TenLoai, MoTa)
            VALUES ('$maLoai', '$tenLoai', '$moTa')";

    if ($conn->query($sql)) {
        $thongBao = "Thêm loại mô hình thành công!";
        $loai = "success";
    } else {
        $thongBao = "Lỗi: " . $conn->error;
        $loai = "error";
    }
}


// ================= XÓA =================
if (isset($_GET['xoa'])) {

    $maLoai = $_GET['xoa'];

    $sql = "DELETE FROM loai_mo_hinh
            WHERE MaLoai = '$maLoai'";

    if ($conn->query($sql)) {
        header("Location: loai_mo_hinh.php");
        exit();
    } else {
        $thongBao = "Không thể xóa: " . $conn->error;
        $loai = "error";
    }
}


// ================= LẤY DỮ LIỆU ĐỂ SỬA =================
$duLieuSua = null;

if (isset($_GET['sua'])) {

    $maLoai = $_GET['sua'];

    $sql = "SELECT *
            FROM loai_mo_hinh
            WHERE MaLoai = '$maLoai'";

    $resultSua = $conn->query($sql);

    if ($resultSua->num_rows > 0) {
        $duLieuSua = $resultSua->fetch_assoc();
    }
}


// ================= CẬP NHẬT =================
if (isset($_POST['capnhat'])) {

    $maLoai = trim($_POST['maLoai']);
    $tenLoai = trim($_POST['tenLoai']);
    $moTa = trim($_POST['moTa']);

    $sql = "UPDATE loai_mo_hinh
            SET TenLoai = '$tenLoai',
                MoTa = '$moTa'
            WHERE MaLoai = '$maLoai'";

    if ($conn->query($sql)) {
        header("Location: loai_mo_hinh.php");
        exit();
    } else {
        $thongBao = "Lỗi: " . $conn->error;
        $loai = "error";
    }
}


// ================= HIỂN THỊ DANH SÁCH =================
$sql = "SELECT *
        FROM loai_mo_hinh
        ORDER BY MaLoai";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Quản lý loại mô hình</title>

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


    <!-- FORM -->

    <div class="card">

        <div class="title">

            <?php if ($duLieuSua != null) { ?>

                <h2>SỬA LOẠI MÔ HÌNH</h2>

                <p>Cập nhật thông tin loại mô hình</p>

            <?php } else { ?>

                <h2>QUẢN LÝ LOẠI MÔ HÌNH</h2>

                <p>Thêm loại mô hình mới</p>

            <?php } ?>

        </div>


        <?php if (isset($thongBao)) { ?>

            <div class="<?= $loai ?>">
                <?= $thongBao ?>
            </div>

        <?php } ?>


        <form method="post">

            <?php if ($duLieuSua != null) { ?>

                <!-- MÃ KHÔNG CHO SỬA -->

                <div class="form-group">

                    <label>Mã loại</label>

                    <input
                        type="text"
                        name="maLoai"
                        value="<?= htmlspecialchars($duLieuSua['MaLoai']) ?>"
                        readonly
                    >

                </div>


                <div class="form-group">

                    <label>Tên loại mô hình</label>

                    <input
                        type="text"
                        name="tenLoai"
                        value="<?= htmlspecialchars($duLieuSua['TenLoai']) ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Mô tả</label>

                    <input
                        type="text"
                        name="moTa"
                        value="<?= htmlspecialchars($duLieuSua['MoTa']) ?>"
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
                    href="loai_mo_hinh.php"
                    class="btn btn-secondary"
                >
                    HỦY
                </a>


            <?php } else { ?>


                <div class="form-group">

                    <label>Mã loại</label>

                    <input
                        type="text"
                        name="maLoai"
                        placeholder="Ví dụ: ML05"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Tên loại mô hình</label>

                    <input
                        type="text"
                        name="tenLoai"
                        placeholder="Ví dụ: Mô hình One Piece"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Mô tả</label>

                    <input
                        type="text"
                        name="moTa"
                        placeholder="Nhập mô tả loại mô hình"
                    >

                </div>


                <button
                    type="submit"
                    name="them"
                    class="btn btn-primary"
                >
                    + THÊM LOẠI MÔ HÌNH
                </button>


            <?php } ?>

        </form>

    </div>


    <!-- DANH SÁCH -->

    <div class="card">

        <div class="title">

            <h2>DANH SÁCH LOẠI MÔ HÌNH</h2>

        </div>


        <table>

            <thead>

                <tr>

                    <th>Mã loại</th>

                    <th>Tên loại</th>

                    <th>Mô tả</th>

                    <th>Thao tác</th>

                </tr>

            </thead>


            <tbody>

            <?php if ($result->num_rows > 0) { ?>

                <?php while ($row = $result->fetch_assoc()) { ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($row['MaLoai']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['TenLoai']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['MoTa']) ?>
                        </td>

                        <td class="actions">

                            <a
                                href="loai_mo_hinh.php?sua=<?= urlencode($row['MaLoai']) ?>"
                                class="btn btn-warning"
                            >
                                Sửa
                            </a>


                            <a
                                href="loai_mo_hinh.php?xoa=<?= urlencode($row['MaLoai']) ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa loại mô hình này không?')"
                            >
                                Xóa
                            </a>

                        </td>

                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>

                    <td colspan="4" class="empty">

                        Chưa có loại mô hình nào.

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>