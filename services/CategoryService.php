<?php
include_once "configs/DBConnection.php";
include "models/Category.php";

class CategoryService {

    public function getAllCategory(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categories = [];
        while($row = $stmt->fetch()){
            $category = new TheLoai($row["ma_tloai"], $row["ten_tloai"]);
            array_push($categories, $category);
        }

        return $categories;
    }
    public function getDetail($id)
    {

        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * FROM theloai WHERE ma_tloai = {$id}";
        $stmt = $conn->query($sql);
        $categories = [];
        while($row = $stmt->fetch()){
            $category = new TheLoai($row["ma_tloai"], $row["ten_tloai"]);
            array_push($categories, $category);
        }
        $category = $categories[0];
        return $category;

    }


    public function update($category)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "UPDATE theloai SET ten_tloai = '{$category->get_ten_tloai()}' WHERE ma_tloai = {$category->get_ma_tloai()}";
        $conn->query($sql);
    }

    public function insert($category)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "INSERT INTO theloai VALUES (0, '{$category->get_ten_tloai()}', 0)";
        $conn->query($sql);

    }

    public function delete($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet WHERE ma_tloai = {$id};";
        $stmt = $conn->query($sql);
        $article_img = [];
        while ($row = $stmt->fetch()) {
            array_push($article_img, $row["hinhanh"]);
        }
        $sql = "DELETE FROM baiviet WHERE ma_tloai = {$id}";

        $conn->query($sql);
        
        $sql = "DELETE FROM theloai WHERE ma_tloai = {$id}";

        $conn->query($sql);
        return $article_img;
    }
}

?>