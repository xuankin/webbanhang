<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-6">
        <h1 class="text-3xl font-bold mb-4">Thêm tài khoản</h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="/webbanhang/Account/add">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">Họ tên:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Vai trò:</label>
                <select class="form-select" id="role" name="role">
                    <option value="user">Người dùng</option>
                    <option value="admin">Quản trị viên</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
            <a href="/webbanhang/Account" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>