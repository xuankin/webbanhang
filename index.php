<?php
session_start();
require_once 'app/models/ProductModel.php';
require_once 'app/helpers/SessionHelper.php';

// Xử lý URL
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định controller và action
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'ProductController';
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Kiểm tra controller có tồn tại không
if (!file_exists('app/controllers/' . $controllerName . '.php')) {
    die('Controller not found: ' . $controllerName);
}

// Load controller
require_once 'app/controllers/' . $controllerName . '.php';
$controller = new $controllerName();

// Kiểm tra action có tồn tại không
if (!method_exists($controller, $action)) {
    die('Action not found: ' . $action . ' in ' . $controllerName);
}

// Gọi action với các tham số còn lại (nếu có)
call_user_func_array([$controller, $action], array_slice($url, 2));