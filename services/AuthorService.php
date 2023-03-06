<?php
include_once "configs/DBConnection.php";
include "models/Author.php";
class AuthorService
{

    public function getAllAuthor()
    {
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $authors = [];
        while ($row = $stmt->fetch()) {
            $author = new Tacgia($row["ma_tgia"], $row["ten_tgia"], $row["hinh_tgia"]);
            array_push($authors, $author);
        }

        return $authors;
    }
    public function getDetail($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia WHERE ma_tgia = {$id}";
        $stmt = $conn->query($sql);

        $authors = [];
        while ($row = $stmt->fetch()) {
            $author = new Tacgia($row["ma_tgia"], $row["ten_tgia"], $row["hinh_tgia"]);
            array_push($authors, $author);
        }

        $author = $authors[0];
        return $author;

    }

    public function insert($author)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "INSERT INTO tacgia VALUES (0, '{$author->get_ten_tgia()}', '{$author->get_hinh_tgia()}')";
        $stmt = $conn->query($sql);
    }


    public function update($author)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "UPDATE tacgia SET ten_tgia = '{$author->get_ten_tgia()}', hinh_tgia = '{$author->get_hinh_tgia()}' WHERE ma_tgia = {$author->get_ma_tgia()}";
        $conn->query($sql);
    }

    public function delete($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet WHERE ma_tgia = {$id}";
        $stmt = $conn->query($sql);
        $article_img = [];
        while ($row = $stmt->fetch()) {
            array_push($article_img, $row["hinhanh"]);
        }
        $sql = "DELETE FROM baiviet WHERE ma_tgia = {$id}";
        $conn->query($sql);
        
        $sql = "DELETE FROM tacgia WHERE ma_tgia = {$id}";
        $conn->query($sql);
        return $article_img;
    }
}

?>
