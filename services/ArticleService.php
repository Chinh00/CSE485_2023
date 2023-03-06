<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new BaiViet($row["ma_bviet"], $row["tieude"], $row["ten_bhat"], $row["ma_tloai"], $row["tomtat"], $row["noidung"], $row["ma_tgia"], $row["ngayviet"], $row["hinhanh"]);
            array_push($articles,$article);
        }

        return $articles;
    }
}