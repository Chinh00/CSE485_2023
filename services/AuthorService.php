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

    }
}
?>
