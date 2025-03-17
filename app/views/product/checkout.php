<?php include 'app/views/shares/header.php'; ?>
<div class="container py-6">
    <h1 class="text-3xl font-bold text-gray-800">Thanh toán</h1>
    <form method="POST" action="/webbanhang/Product/processCheckout" class="mt-4">
        <div class="form-group mb-3">
            <label for="name">Họ tên:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </form>
    <a href="/webbanhang/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>
</div>
<?php include 'app/views/shares/footer.php'; ?>