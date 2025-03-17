<?php include 'app/views/shares/header.php'; ?>
<div class="container py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Giỏ hàng</h1>
    
    <style>
        .cart-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #fff;
            transition: box-shadow 0.2s;
        }
        .cart-item:hover {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .price {
            color: #dc3545;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .total-price {
            color: #198754;
            font-weight: 700;
            font-size: 1.25rem;
        }
        .quantity-control .btn {
            min-width: 32px;
            padding: 0.25rem 0.5rem;
        }
        .quantity-control span {
            min-width: 32px;
            text-align: center;
            display: inline-block;
        }
        .product-image {
            border-radius: 4px;
            object-fit: cover;
        }
        .cart-actions {
            margin-top: 2rem;
        }
    </style>

    <?php if (!empty($cart)): ?>
        <ul class="list-unstyled">
            <?php 
            $total = 0;
            foreach ($cart as $id => $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <li class="cart-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <?php if ($item['image']): ?>
                            <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" class="product-image mr-3" style="width: 80px; height: 80px;">
                        <?php endif; ?>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">
                                <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </h2>
                            <p>Đơn giá: <span class="price"><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</span></p>
                            <div class="quantity-control my-2">
                                <a href="/webbanhang/Product/decreaseQuantity/<?php echo $id; ?>" class="btn btn-sm btn-outline-secondary">-</a>
                                <span><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                <a href="/webbanhang/Product/increaseQuantity/<?php echo $id; ?>" class="btn btn-sm btn-outline-secondary">+</a>
                            </div>
                            <p>Tổng: <span class="price"><?php echo number_format($subtotal, 0, ',', '.'); ?> VND</span></p>
                        </div>
                    </div>
                    <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-danger btn-sm">Xóa</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-4 p-3 bg-light rounded">
            <h3 class="total-price">Tổng tiền: <?php echo number_format($total, 0, ',', '.'); ?> VND</h3>
        </div>
    <?php else: ?>
        <div class="alert alert-info mt-3" role="alert">
            Giỏ hàng của bạn đang trống.
        </div>
    <?php endif; ?>

    <div class="cart-actions">
        <a href="/webbanhang/Product" class="btn btn-secondary mr-2">Tiếp tục mua sắm</a>
        <?php if (!empty($cart)): ?>
            <a href="/webbanhang/Product/checkout" class="btn btn-primary">Thanh Toán</a>
        <?php endif; ?>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>