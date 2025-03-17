<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');

class AccountController
{
    private $accountModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    public function register()
    {
        include_once 'app/views/account/register.php';
    }

    public function login()
    {
        include_once 'app/views/account/login.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role = $_POST['role'] ?? 'user';

            $errors = [];
            if (empty($username)) $errors['username'] = "Vui lòng nhập tên đăng nhập!";
            if (empty($fullname)) $errors['fullname'] = "Vui lòng nhập họ và tên!";
            if (empty($password)) $errors['password'] = "Vui lòng nhập mật khẩu!";
            if ($password != $confirmPassword) $errors['confirmPass'] = "Mật khẩu và xác nhận chưa khớp!";
            if ($this->accountModel->getAccountByUsername($username)) $errors['account'] = "Tài khoản này đã được đăng ký!";
            if (!in_array($role, ['admin', 'user'])) $errors['role'] = "Vai trò không hợp lệ!";

            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->save($username, $fullname, $password, $role);
                if ($result) {
                    header('Location: /webbanhang/account/login');
                    exit;
                } else {
                    $errors['db'] = "Đăng ký thất bại, vui lòng thử lại!";
                    include_once 'app/views/account/register.php';
                }
            }
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        session_destroy();
        header('Location: /webbanhang/product');
        exit;
    }

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $account = $this->accountModel->getAccountByUsername($username);

            if ($account && password_verify($password, $account->password)) {
                session_start();
                $_SESSION['username'] = $account->username;
                $_SESSION['role'] = $account->role;

                // Debug session (bỏ comment nếu cần kiểm tra)
                // var_dump($_SESSION); die();

                // Điều hướng dựa trên vai trò
                if ($account->role === 'admin') {
                    header('Location: /webbanhang/admin/index');
                } else {
                    header('Location: /webbanhang/product');
                }
                exit;
            } else {
                $errors['login'] = "Tên đăng nhập hoặc mật khẩu không đúng!";
                include_once 'app/views/account/login.php';
            }
        }
    }
}