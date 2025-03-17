<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Hàm kiểm tra vai trò admin
    private function isAdmin()
    {
        session_start();
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public function getCategories()
    {
        // Không cần kiểm tra quyền cho việc lấy danh sách danh mục
        $query = "SELECT id, name, description FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getCategoryById($id)
    {
        // Không cần kiểm tra quyền cho việc lấy chi tiết danh mục
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function addCategory($name, $description)
    {
        if (!$this->isAdmin()) {
            return ['error' => 'Bạn không có quyền thêm danh mục'];
        }

        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Tên danh mục không được để trống';
        }
        
        if (count($errors) > 0) {
            return $errors;
        }

        $query = "INSERT INTO " . $this->table_name . " (name, description) VALUES (:name, :description)";
        $stmt = $this->conn->prepare($query);
        
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateCategory($id, $name, $description)
    {
        if (!$this->isAdmin()) {
            return ['error' => 'Bạn không có quyền sửa danh mục'];
        }

        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Tên danh mục không được để trống';
        }
        
        if (count($errors) > 0) {
            return $errors;
        }

        $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteCategory($id)
    {
        if (!$this->isAdmin()) {
            return ['error' => 'Bạn không có quyền xóa danh mục'];
        }

        // Kiểm tra xem category có sản phẩm liên quan không
        $query = "SELECT COUNT(*) FROM product WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return false; // Không xóa được vì có sản phẩm liên quan
        }

        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>