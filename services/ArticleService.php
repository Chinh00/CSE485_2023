<?php
include_once("configs/DBConnection.php");
include("models/Article.php");

class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new BaiViet($row["ma_bviet"], $row["tieude"], $row["ten_bhat"], $row["ma_tloai"], $row["tomtat"], $row["noidung"], $row["ma_tgia"], $row["ngayviet"], $row["hinhanh"]);
            array_push($articles,$article);
        }
        
        return $articles;
    }

    public function getDetail($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = {$id}";
        $stmt = $conn->query($sql);
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new BaiViet($row["ma_bviet"], $row["tieude"], $row["ten_bhat"], $row["ma_tloai"], $row["tomtat"], $row["noidung"], $row["ma_tgia"], $row["ngayviet"], $row["hinhanh"]);
            array_push($articles,$article);
        }

        return $articles;

    }

    public function update($article)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE baiviet 
        SET tieude = '{$article->get_tieude()}',
        ten_bhat = '{$article->get_ten_bhat()}',
        ma_tloai = {$article->get_ma_tloai()},
        tomtat = '{$article->get_tomtat()}',
        noidung = '{$article->get_noidung()}',
        ma_tgia = {$article->get_ma_tgia()},
        ngayviet = '{$article->get_ngayviet()}',
        hinhanh = '{$article->get_hinhanh()}' WHERE ma_bviet = {$article->get_ma_bviet()};";
        echo $sql;

        $stmt = $conn->query($sql);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($article)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "INSERT INTO baiviet VALUES (0, '{$article->get_tieude()}', '{$article->get_ten_bhat()}', {$article->get_ma_tloai()}, '{$article->get_tomtat()}', '{$article->get_noidung()}', {$article->get_ma_tgia()}, '{$article->get_ngayviet()}', '{$article->get_hinhanh()}')";
        $stmt = $conn->query($sql);

    }

    public function delete($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "DELETE FROM baiviet WHERE ma_bviet = {$id}";
        $stmt = $conn->query($sql);
    }

}

?>