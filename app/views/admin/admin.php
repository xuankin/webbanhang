<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'app/helpers/SessionHelper.php';

if (!SessionHelper::isAdmin()) {
    header('Location: /webbanhang/account/login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Admin - KingNguyenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        .navbar { background-color: #ffcc00; }
        .nav-link { color: #1a1a1a !important; font-weight: 500; }
        .nav-link:hover { color: #ffffff !important; }
        .custom-btn { background-color: #1a1a1a; color: #ffcc00; border-radius: 20px; padding: 8px 20px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; border: 2px solid #1a1a1a; }
        .custom-btn:hover { background-color: #ffcc00; color: #1a1a1a; border-color: #1a1a1a; }
        .custom-btn i { margin-right: 5px; }
        .tab-content { padding: 20px; }
        .table { font-size: 0.9rem; }
        .table th, .table td { vertical-align: middle; }
        .product-image { max-width: 100px; max-height: 100px; object-fit: cover; }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="navbar navbar-expand-lg navbar-light shadow-md">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/product">
                <svg width="150" height="50" viewBox="0 0 150 50" xmlns="http://www.w3.org/2000/svg" class="logo-img">
                    <path d="M10 40 L20 20 L30 40 L40 20 L50 40" fill="none" stroke="#000000" stroke-width="2"/>
                    <line x1="10" y1="40" x2="50" y2="40" stroke="#000000" stroke-width="2"/>
                    <text x="55" y="35" font-family="Arial" font-size="20" font-weight="bold" fill="#000000">King</text>
                    <text x="95" y="35" font-family="Arial" font-size="16" fill="#000000">NguyenShop</text>
                </svg>
            </a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="nav-link fw-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="/webbanhang/account/logout" class="custom-btn"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-3xl font-weight-bold text-dark mb-4">Bảng điều khiển Admin</h1>
        
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#products">Sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#categories">Danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#accounts">Tài khoản</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Tab Sản phẩm -->
            <div class="tab-pane fade show active" id="products">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="h4">Quản lý sản phẩm</h2>
                    <a href="/webbanhang/admin/addProduct" class="custom-btn"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th> <!-- Thêm cột hình ảnh -->
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                            <tr><td colspan="7" class="text-center">Không có sản phẩm nào.</td></tr>
                        <?php else: ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product->id; ?></td>
                                    <td><?php echo htmlspecialchars($product->name); ?></td>
                                    <td><?php echo htmlspecialchars($product->description); ?></td>
                                    <td><?php echo number_format($product->price, 0, ',', '.'); ?>đ</td>
                                    <td><?php echo htmlspecialchars($product->category_name); ?></td>
                                    <td>
                                        <?php if (!empty($product->image)): ?>
                                            <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" class="product-image" alt="Hình ảnh sản phẩm">
                                        <?php else: ?>
                                            <span>Không có hình ảnh</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/webbanhang/admin/editProduct/<?php echo $product->id; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="/webbanhang/admin/deleteProduct/<?php echo $product->id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tab Danh mục -->
            <div class="tab-pane fade" id="categories">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="h4">Quản lý danh mục</h2>
                    <a href="/webbanhang/admin/addCategory" class="custom-btn"><i class="fas fa-plus"></i> Thêm danh mục</a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                            <tr><td colspan="4" class="text-center">Không có danh mục nào.</td></tr>
                        <?php else: ?>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?php echo $category->id; ?></td>
                                    <td><?php echo htmlspecialchars($category->name); ?></td>
                                    <td><?php echo htmlspecialchars($category->description); ?></td>
                                    <td>
                                        <a href="/webbanhang/admin/editCategory/<?php echo $category->id; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="/webbanhang/admin/deleteCategory/<?php echo $category->id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tab Tài khoản -->
            <div class="tab-pane fade" id="accounts">
                <div class="d-flex justify-content-between mb-3">
                    <h2 class="h4">Quản lý tài khoản</h2>
                   
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Vai trò</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($accounts)): ?>
                            <tr><td colspan="5" class="text-center">Không có tài khoản nào.</td></tr>
                        <?php else: ?>
                            <?php foreach ($accounts as $account): ?>
                                <tr>
                                    <td><?php echo $account->id; ?></td>
                                    <td><?php echo htmlspecialchars($account->username); ?></td>
                                    <td><?php echo htmlspecialchars($account->fullname); ?></td>
                                    <td><?php echo htmlspecialchars($account->role); ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'app/views/shares/footer.php'; ?>
</body>

</html>