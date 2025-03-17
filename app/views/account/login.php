<?php include 'app/views/shares/header.php'; ?>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-lg" style="border-radius: 1rem; background-color: #ffffff;">
                <div class="card-body p-5 text-center">
                    <h2 class="fw-bold mb-4 text-uppercase text-dark" data-aos="fade-down">Đăng nhập</h2>
                    <p class="text-muted mb-5">Vui lòng nhập tên đăng nhập và mật khẩu của bạn!</p>
                    <?php if (isset($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach ($errors as $err): ?>
                                <p class="mb-0"><?php echo $err; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form action="/webbanhang/account/checkLogin" method="post">
                        <div class="form-outline mb-4">
                            <input type="text" name="username" class="form-control form-control-lg shadow-sm" 
                                   placeholder="Tên đăng nhập" 
                                   value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="form-control form-control-lg shadow-sm" 
                                   placeholder="Mật khẩu" required>
                        </div>
                        <p class="small mb-5"><a href="#!" class="text-muted">Quên mật khẩu?</a></p>
                        <button class="btn btn-outline-primary btn-lg px-5 shadow-md custom-btn" 
                                style="background-color: #ffcc00; border-color: #ffcc00; color: #1a1a1a;" 
                                type="submit">
                            <i class="fas fa-sign-in-alt me-2"></i> Đăng nhập
                        </button>
                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            <a href="#!" class="text-dark mx-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-dark mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#!" class="text-dark mx-2"><i class="fab fa-google fa-lg"></i></a>
                        </div>
                        <p class="mt-3 text-muted">Chưa có tài khoản? <a href="/webbanhang/account/register" class="text-primary">Đăng ký ngay</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>