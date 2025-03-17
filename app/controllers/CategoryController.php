<?php
require_once 'app/config/database.php';
require_once 'app/models/CategoryModel.php';

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $result = $this->categoryModel->addCategory($name, $description);

            if (is_array($result)) {
                $errors = $result;
                include 'app/views/category/add.php'; // Trả về lại màn hình thêm nếu có lỗi
            } else {
                header('Location: /webbanhang/Category');
                exit;
            }
        } else {
            include 'app/views/category/add.php'; // Hiển thị màn hình thêm danh mục
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $result = $this->categoryModel->updateCategory($id, $name, $description);

            if (is_array($result)) {
                $errors = $result;
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/category/edit.php'; // Trả về lại màn hình sửa nếu có lỗi
            } else {
                header('Location: /webbanhang/Category');
                exit;
            }
        } else {
            $category = $this->categoryModel->getCategoryById($id);
            include 'app/views/category/edit.php'; // Hiển thị màn hình sửa danh mục
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->categoryModel->deleteCategory($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $result]);
            exit;
        }
    }
}
?>