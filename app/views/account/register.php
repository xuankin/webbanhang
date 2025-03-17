<?php include 'app/views/shares/header.php'; ?>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-lg" style="border-radius: 1rem; background-color: #ffffff;">
                <div class="card-body p-5 text-center">
                    <h2 class="fw-bold mb-4 text-uppercase text-dark" data-aos="fade-down">Đăng ký</h2>
                    <?php
                    if (isset($errors)) {
                        echo "<ul class='list-unstyled mb-4'>";
                        foreach ($errors as $err) {
                            echo "<li class='text-danger font-weight-bold'>$err</li>";
                        }
                        echo "</ul>";
                    }
                    ?>
                    <form class="user" action="/webbanhang/account/save" method="post">
                        <div class="form-group row mb-4">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user shadow-sm" 
                                       id="username" name="username" placeholder="Tên đăng nhập" 
                                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" 
                                       required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user shadow-sm" 
                                       id="fullname" name="fullname" placeholder="Họ và tên" 
                                       value="<?php echo htmlspecialchars($_POST['fullname'] ?? ''); ?>" 
                                       required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user shadow-sm" 
                                       id="password" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user shadow-sm" 
                                       id="confirmpassword" name="confirmpassword" placeholder="Xác nhận mật khẩu" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <select class="form-control form-control-user shadow-sm" id="role" name="role" required>
                                <option value="user" <?php echo (($_POST['role'] ?? 'user') === 'user' ? 'selected' : ''); ?>>Người dùng (User)</option>
                                <option value="admin" <?php echo (($_POST['role'] ?? '') === 'admin' ? 'selected' : ''); ?>>Quản trị viên (Admin)</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-icon-split p-3 w-50 shadow-md" 
                                    style="background-color: #ffcc00; border-color: #ffcc00; color: #1a1a1a;" 
                                    type="submit" onmouseover="this.style.backgroundColor='#e6b800'" 
                                    onmouseout="this.style.backgroundColor='#ffcc00'">
                                <i class="fas fa-user-plus me-2"></i> Đăng ký
                            </button>
                        </div>
                        <p class="mt-3 text-muted">Đã có tài khoản? <a href="/webbanhang/account/login" class="text-primary">Đăng nhập ngay</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>