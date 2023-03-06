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
}

?>