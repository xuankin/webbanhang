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
        .search-input { border-radius: 20px; border: 1px solid #ccc; padding-left: 15px; transition: border-color 0.3s ease; }
        .search-input:focus { border-color: #ffcc00; box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); }
        .filter-select { border-radius: 20px; padding: 5px 10px; border: 1px solid #ccc; transition: border-color 0.3s ease; }
        .filter-select:focus { border-color: #ffcc00; box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); }
        .header-container { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px; width: 100%; }
        .filter-group { display: flex; align-items: center; gap: 15px; flex-wrap: wrap; }
        .custom-btn { background-color: #1a1a1a; color: #ffcc00; border-radius: 20px; padding: 8px 20px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; border: 2px solid #1a1a1a; }
        .custom-btn:hover { background-color: #ffcc00; color: #1a1a1a; border-color: #1a1a1a; }
        .product-card { height: 100%; transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: 10px; overflow: hidden; }
        .product-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); }
        .product-image-container { position: relative; height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa; border-bottom: 2px solid #ffd700; }
        .card-img-top { max-height: 100%; max-width: 100%; object-fit: contain; transition: transform 0.3s ease; }
        .product-card:hover .card-img-top { transform: scale(1.05); }
        .badge { font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 5px; }
        .text-danger { color: #dc3545 !important; }
        .text-warning { color: #ffc107 !important; }
        .logo-img { height: 50px; width: auto; transition: transform 0.3s ease; }
        .navbar-brand:hover .logo-img { transform: scale(1.1); }
        .navbar-nav { display: flex; align-items: center; gap: 10px; }
        .auth-group { display: flex; align-items: center; gap: 10px; }
    </style>
</head>
<body class="bg-gray-100 font-['Roboto']">
    <header class="navbar navbar-expand-lg navbar-light shadow-md">
        <div class="container header-container">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="/webbanhang/Product/">
                    <svg width="150" height="50" viewBox="0 0 150 50" xmlns="http://www.w3.org/2000/svg" class="logo-img">
                        <path d="M10 40 L20 20 L30 40 L40 20 L50 40" fill="none" stroke="#000000" stroke-width="2"/>
                        <line x1="10" y1="40" x2="50" y2="40" stroke="#000000" stroke-width="2"/>
                        <text x="55" y="35" font-family="Roboto, sans-serif" font-size="20" font-weight="bold" fill="#000000">King</text>
                        <text x="95" y="35" font-family="Roboto, sans-serif" font-size="16" fill="#000000">NguyenShop</text>
                    </svg>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="filter-group">
                <div class="input-group" style="max-width: 250px;">
                    <span class="input-group-text bg-white border-0" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control search-input" id="searchInput" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" style="border-left: 0;" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                </div>

                <div class="d-flex gap-2" style="flex-wrap: wrap;">
                    <a href="/webbanhang/Product/?category=all" class="category-btn" data-category="all"><i class="fas fa-th"></i> Tất cả</a>
                    <a href="/webbanhang/Product/?category=1" class="category-btn" data-category="1"><i class="fas fa-mobile-alt"></i> Điện thoại</a>
                    <a href="/webbanhang/Product/?category=2" class="category-btn" data-category="2"><i class="fas fa-laptop"></i> Laptop</a>
                    <a href="/webbanhang/Product/?category=3" class="category-btn" data-category="3"><i class="fas fa-tablet-alt"></i> Máy tính bảng</a>
                    <a href="/webbanhang/Product/?category=4" class="category-btn" data-category="4"><i class="fas fa-headphones"></i> Phụ kiện</a>
                </div>

                <div class="input-group" style="max-width: 200px;">
                    <span class="input-group-text bg-white border-0" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                        <i class="fas fa-sort-amount-down"></i>
                    </span>
                    <select class="form-select filter-select" id="sortSelect" aria-label="Sắp xếp" style="border-left: 0;">
                        <option value="" <?php echo (empty($_GET['sort']) ? 'selected' : ''); ?>>Sắp xếp theo</option>
                        <option value="price-asc" <?php echo ($_GET['sort'] === 'price-asc' ? 'selected' : ''); ?>>Giá: Thấp đến Cao</option>
                        <option value="price-desc" <?php echo ($_GET['sort'] === 'price-desc' ? 'selected' : ''); ?>>Giá: Cao đến Thấp</option>
                    </select>
                </div>

                <?php if (SessionHelper::isAdmin()): ?>
                    <a href="/webbanhang/Product/add" class="custom-btn"><i class="fas fa-plus"></i> Thêm sản phẩm</a>
                    <a href="/webbanhang/Category" class="custom-btn"><i class="fas fa-list"></i> Quản lý danh mục</a>
                <?php endif; ?>

                <div class="auth-group">
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <span class="nav-link fw-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        <a href="/webbanhang/account/logout" class="custom-btn"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    <?php else: ?>
                        <a href="/webbanhang/account/login" class="custom-btn"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                        <a href="/webbanhang/account/register" class="custom-btn"><i class="fas fa-user-plus"></i> Đăng ký</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

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

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-3xl font-weight-bold text-dark mb-4" data-aos="fade-down">Danh sách sản phẩm</h1>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4" id="productList">
            <?php if (empty($products)): ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Không có sản phẩm nào để hiển thị.</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="col" data-aos="fade-up" data-aos-duration="600">
                        <div class="card product-card h-100 border-0 shadow-sm overflow-hidden position-relative">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="product-image-wrapper">
                                <div class="product-image-container">
                                    <?php if (!empty($product->image)): ?>
                                        <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                             alt="Product Image" class="card-img-top w-100">
                                    <?php else: ?>
                                        <img src="/webbanhang/images/default-product.jpg" 
                                             alt="No Image" class="card-img-top w-100">
                                    <?php endif; ?>
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">Giá sốc</span>
                                </div>
                            </a>
                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h2 class="h6 text-dark font-weight-bold mb-2 line-clamp-2">
                                        <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-dark text-decoration-none">
                                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </h2>
                                    <p class="text-muted small line-clamp-2">
                                        <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="text-danger h5 mb-0 me-2">
                                            <?php echo number_format($product->price, 0, ',', '.'); ?>đ
                                        </span>
                                        <span class="text-decoration-line-through text-muted small me-2">
                                            <?php echo number_format($product->price * 1.2, 0, ',', '.'); ?>đ
                                        </span>
                                        <span class="badge bg-success text-white">
                                            -<?php echo round((1 - $product->price / ($product->price * 1.2)) * 100); ?>%
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="text-warning">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="text-muted small ms-1">(4.5 - 123 đánh giá)</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="d-flex gap-2">
                                        <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
                                           class="btn btn-primary btn-sm w-100">
                                            <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                                        </a>
                                        <button class="btn btn-danger btn-sm w-100 buy-now" 
                                            data-name="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                                                <i class="fas fa-shopping-cart"></i> Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init();

        // Mua ngay
        document.querySelectorAll('.buy-now').forEach(button => {
            button.addEventListener('click', function() {
                const productName = this.getAttribute('data-name');
                Swal.fire({
                    title: 'Mua thành công!',
                    text: `Bạn đã mua ${productName}.`,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
<?php include 'app/views/shares/footer.php'; ?>
</body>
</html>