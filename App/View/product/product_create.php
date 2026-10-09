<?php
$pageTitle = "Thêm mô hình mới";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mô hình | HAKUDA-store</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .main-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 15px;
        }
        .page-title {
            font-weight: 700;
            color: #198754;
        }
        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }
        .product-card .card-header {
            padding: 18px 24px;
            font-weight: 600;
        }
        .product-card .card-body {
            padding: 28px;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control,
        .form-select {
            padding: 10px 12px;
        }
        .status-option {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin: 5px 20px 5px 0;
        }
        #imagePreview {
            display: none;
            max-width: 220px;
            max-height: 220px;
            object-fit: contain;
            margin-top: 15px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 5px;
            background: white;
        }
    </style>
</head>
<body>
<div class="main-container">
    <div class="d-flex justify-content-between align-items-center
                flex-wrap gap-3 mb-4">
        <div>
            <h2 class="page-title mb-1">Thêm mô hình mới</h2>
            <p class="text-secondary mb-0">
                HAKUDA-store / Quản lý sản phẩm
            </p>
        </div>
        <a href="index.php?modun=Product&action=index"
           class="btn btn-outline-secondary">
            &larr; Quay lại
        </a>
    </div>
    <div class="card product-card shadow-sm">
        <div class="card-header bg-success text-white">
            Thông tin mô hình
        </div>
        <div class="card-body">
            <form method="POST"
                  action=""
                  enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="TenSP" class="form-label">
                        Tên mô hình <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           class="form-control"
                           id="TenSP"
                           name="TenSP"
                           placeholder="Ví dụ: HG Zaku Solari"
                           required>
                </div>
                <div class="mb-4">
                    <label for="LoaiMoHinh" class="form-label">
                        Loại mô hình <span class="text-danger">*</span>
                    </label>
                    <select class="form-select"
                            id="LoaiMoHinh"
                            name="LoaiMoHinh"
                            required>
                        <option value="">-- Chọn loại mô hình --</option>
                        <option value="HG">HG</option>
                        <option value="RG">RG</option>
                        <option value="MG">MG</option>
                        <option value="MGSD">MGSD</option>
                        <option value="SD">SD</option>
                        <option value="EG">EG</option>
                        <option value="PG">PG</option>
                        <option value="FM">FM</option>
                        <option value="RE/100">RE/100</option>
                        <option value="Other">Khác</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="GiaBan" class="form-label">
                            Giá bán (VNĐ) <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control"
                               id="GiaBan"
                               name="GiaBan"
                               min="0"
                               step="1000"
                               placeholder="Nhập giá bán"
                               required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="SoLuong" class="form-label">
                            Số lượng <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control"
                               id="SoLuong"
                               name="SoLuong"
                               min="0"
                               value="0"
                               required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label d-block">
                        Tình trạng <span class="text-danger">*</span>
                    </label>
                    <div class="status-option">
                        <input class="form-check-input"
                               type="radio"
                               name="TinhTrang"
                               id="ConHang"
                               value="Còn hàng"
                               checked>
                        <label for="ConHang">Còn hàng</label>
                    </div>
                    <div class="status-option">
                        <input class="form-check-input"
                        type="radio"
                               name="TinhTrang"
                               id="HetHang"
                               value="Hết hàng">
                        <label for="HetHang">Hết hàng</label>
                    </div>
                    <div class="status-option">
                        <input class="form-check-input"
                               type="radio"
                               name="TinhTrang"
                               id="PreOrder"
                               value="Pre-order">
                        <label for="PreOrder">Pre-order</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="HinhAnh" class="form-label">
                        Hình ảnh mô hình
                    </label>
                    <input type="file"
                           class="form-control"
                           id="HinhAnh"
                           name="HinhAnh"
                           accept="image/*">
                    <div class="form-text">
                        Chọn ảnh mô hình từ máy tính.
                    </div>
                    <img id="imagePreview"
                         src=""
                         alt="Ảnh xem trước">
                </div>
                <hr>
                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-success px-4">
                        Lưu sản phẩm
                    </button>
                    <button type="reset"
                            class="btn btn-outline-secondary px-4">
                        Nhập lại
                    </button>
                </div>
                <div class="alert alert-info mt-4 mb-0">
                    Giao diện hiện chưa kết nối SQL Server.
                    Dữ liệu chưa được lưu vào cơ sở dữ liệu.
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const imageInput = document.getElementById("HinhAnh");
    const imagePreview = document.getElementById("imagePreview");
    let currentImageUrl = null;
    imageInput.addEventListener("change", function () {
        if (currentImageUrl) {
            URL.revokeObjectURL(currentImageUrl);
            currentImageUrl = null;
        }
        const file = this.files[0];
        if (!file) {
            imagePreview.removeAttribute("src");
            imagePreview.style.display = "none";
            return;
        }
        if (!file.type.startsWith("image/")) {
            alert("Vui lòng chọn một file hình ảnh.");
            this.value = "";
            imagePreview.style.display = "none";
            return;
        }
        currentImageUrl = URL.createObjectURL(file);
        imagePreview.src = currentImageUrl;
        imagePreview.style.display = "block";
    });
    document.querySelector("form").addEventListener("reset", function () {
        setTimeout(function () {
            if (currentImageUrl) {
                URL.revokeObjectURL(currentImageUrl);
                currentImageUrl = null;
            }
            imagePreview.removeAttribute("src");
            imagePreview.style.display = "none";
        }, 0);
    });
</script>
</body>
</html>