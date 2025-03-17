<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-6">
        <h1 class="text-3xl font-bold mb-4">Danh sách tài khoản</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ tên</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($accounts)): ?>
                    <tr><td colspan="4" class="text-center">Không có tài khoản nào.</td></tr>
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
        <a href="/webbanhang/admin" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</body>
</html>