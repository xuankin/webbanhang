<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KingNguyenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .navbar { background-color: #ffcc00; transition: all 0.3s ease; padding: 10px 0; }
        .navbar-brand { font-weight: bold; font-size: 1.5rem; color: #1a1a1a !important; display: flex; align-items: center; }
        .nav-link { color: #1a1a1a !important; font-weight: 500; padding: 8px 15px; }
        .nav-link:hover { color: #ffffff !important; }
        .banner-img { height: 200px; object-fit: cover; width: 100%; transition: transform 0.3s ease; }
        .banner-img:hover { transform: scale(1.05); }
        .filter-section { background-color: #fff; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 10px; }
        .search-input { border-radius: 20px; border: 1px solid #ccc; padding-left: 15px; transition: border-color 0.3s ease; }
        .search-input:focus { border-color: #ffcc00; box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); }
        .filter-select { border-radius: 20px; padding: 5px 15px; border: 1px solid #ccc; transition: border-color 0.3s ease; }
        .filter-select:focus { border-color: #ffcc00; box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); }
        .logo-img { height: 50px; width: auto; transition: transform 0.3s ease; }
        .navbar-brand:hover .logo-img { transform: scale(1.1); }
        .custom-btn { background-color: #1a1a1a; color: #ffcc00; border-radius: 20px; padding: 8px 20px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; border: 2px solid #1a1a1a; }
        .custom-btn:hover { background-color: #ffcc00; color: #1a1a1a; border-color: #1a1a1a; }
        .custom-btn i { margin-right: 5px; }
    </style>
</head>
<body class="bg-gray-100 font-['Roboto']">
    <nav class="navbar navbar-expand-lg navbar-light shadow-md">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/Product/">
                <svg width="150" height="50" viewBox="0 0 150 50" xmlns="http://www.w3.org/2000/svg" class="logo-img">
                    <path d="M10 40 L20 20 L30 40 L40 20 L50 40" fill="none" stroke="#000000" stroke-width="2"/>
                    <line x1="10" y1="40" x2="50" y2="40" stroke="#000000" stroke-width="2"/>
                    <text x="55" y="35" font-family="Roboto, sans-serif" font-size="20" font-weight="bold" fill="#000000">King</text>
                    <text x="95" y="35" font-family="Roboto, sans-serif" font-size="16" fill="#000000">NguyenShop</text>
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item">
                            <a href="/webbanhang/Product/add" class="custom-btn"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                        </li>
                    <?php endif; ?>
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item">
                            <span class="nav-link fw-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        </li>
                        <li class="nav-item">
                            <a href="/webbanhang/account/logout" class="custom-btn"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="/webbanhang/account/login" class="custom-btn"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a href="/webbanhang/account/register" class="custom-btn"><i class="fas fa-user-plus"></i> Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="filter-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 mb-2 mb-md-0">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" id="searchInput" 
                               placeholder="Tìm kiếm sản phẩm..." aria-label="Search" 
                               value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                        <button class="btn btn-outline-secondary" type="button" onclick="searchProducts()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-2 mb-md-0">
                    <select class="form-select filter-select" id="categorySelect" aria-label="Chọn danh mục">
                        <option value="all" <?php echo (($_GET['category'] ?? 'all') === 'all' ? 'selected' : ''); ?>>Tất cả</option>
                        <option value="1" <?php echo (($_GET['category'] ?? '') === '1' ? 'selected' : ''); ?>>Điện thoại</option>
                        <option value="2" <?php echo (($_GET['category'] ?? '') === '2' ? 'selected' : ''); ?>>Laptop</option>
                        <option value="3" <?php echo (($_GET['category'] ?? '') === '3' ? 'selected' : ''); ?>>Máy tính bảng</option>
                        <option value="4" <?php echo (($_GET['category'] ?? '') === '4' ? 'selected' : ''); ?>>Phụ kiện</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select class="form-select filter-select" id="sortSelect" aria-label="Sắp xếp">
                        <option value="" <?php echo (empty($_GET['sort']) ? 'selected' : ''); ?>>Sắp xếp theo</option>
                        <option value="price-asc" <?php echo ($_GET['sort'] === 'price-asc' ? 'selected' : ''); ?>>Giá: Thấp đến Cao</option>
                        <option value="price-desc" <?php echo ($_GET['sort'] === 'price-desc' ? 'selected' : ''); ?>>Giá: Cao đến Thấp</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <a href="#" class="d-block">
                                <img src="/webbanhang/images/banner1.png" class="banner-img rounded-lg shadow-md" alt="Banner 1">
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="#" class="d-block">
                                <img src="/webbanhang/images/banner2.png" class="banner-img rounded-lg shadow-md" alt="Banner 2">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <a href="#" class="d-block">
                                <img src="/webbanhang/images/banner3.png" class="banner-img rounded-lg shadow-md" alt="Banner 3">
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="#" class="d-block">
                                <img src="/webbanhang/images/banner4.png" class="banner-img rounded-lg shadow-md" alt="Banner 4">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-12 col-md-6">
                            <a href="#" class="d-block">
                                <img src="/webbanhang/images/banner5.png" class="banner-img rounded-lg shadow-md" alt="Banner 5">
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="#" class="d-block">
                                <img src="/webbanhang/images/banner6.png" class="banner-img rounded-lg shadow-md" alt="Banner 6">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Nội dung chính nếu cần -->
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init();
        function searchProducts() {
            const searchTerm = document.getElementById('searchInput').value.trim();
            const sortValue = document.getElementById('sortSelect').value;
            const categoryValue = document.getElementById('categorySelect').value;
            const url = `/webbanhang/Product/?search=${encodeURIComponent(searchTerm)}${sortValue ? '&sort=' + sortValue : ''}${categoryValue ? '&category=' + categoryValue : ''}`;
            window.location.href = url;
        }
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') searchProducts();
        });
        document.getElementById('sortSelect').addEventListener('change', function() {
            const sortValue = this.value;
            const searchTerm = document.getElementById('searchInput').value.trim();
            const categoryValue = document.getElementById('categorySelect').value;
            const url = `/webbanhang/Product/?sort=${sortValue}${searchTerm ? '&search=' + encodeURIComponent(searchTerm) : ''}${categoryValue ? '&category=' + categoryValue : ''}`;
            window.location.href = url;
        });
        document.getElementById('categorySelect').addEventListener('change', function() {
            const categoryValue = this.value;
            const searchTerm = document.getElementById('searchInput').value.trim();
            const sortValue = document.getElementById('sortSelect').value;
            const url = `/webbanhang/Product/?category=${categoryValue}${searchTerm ? '&search=' + encodeURIComponent(searchTerm) : ''}${sortValue ? '&sort=' + sortValue : ''}`;
            window.location.href = url;
        });
    </script>
</body>
</html>