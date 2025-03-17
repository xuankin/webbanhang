<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container py-6">
        <h1 class="text-3xl font-bold mb-4">Danh sách danh mục</h1>
        <a href="/webbanhang/Category/add" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm danh mục</a>
        <table class="table table-bordered">
            <thead>
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
                                <a href="/webbanhang/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                                <button class="btn btn-danger btn-sm delete-category" data-id="<?php echo $category->id; ?>"><i class="fas fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll('.delete-category').forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: 'Bạn muốn xóa danh mục này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi yêu cầu xóa đến máy chủ
                        fetch(`/webbanhang/Category/delete/${categoryId}`, {
                            method: 'POST'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Đã xóa!', 'Danh mục đã được xóa.', 'success').then(() => {
                                    location.reload(); // Tải lại trang để cập nhật danh sách
                                });
                            } else {
                                Swal.fire('Lỗi!', 'Không thể xóa danh mục.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>