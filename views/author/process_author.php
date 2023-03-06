<?php

    include '../../includes/Database.php';
    
    function uploadFile($file_name_from, $file_name_to) {
        move_uploaded_file($_FILES[$file_name_from]["tmp_name"], $file_name_to . basename($_FILES[$file_name_from]["name"]));
        return ($file_name_to . basename($_FILES[$file_name_from]["name"]));
    }
    function removeFile($file_old) {
        return unlink($file_old);
    }


    if (isset($_POST["txtAuthorName"])) {
        $author_name = $_POST["txtAuthorName"];
    } 

    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];
        $author_img = $db->getWithCondition("tacgia", array("ma_tgia" => $id))[0]["hinh_tgia"];
        $article_imgs = $db->getWithCondition("baiviet", array("ma_tgia" => $id));
        $db->deleteWithCondition("baiviet", array("ma_tgia" => $id));
        $db->deleteWithCondition("tacgia", array("ma_tgia" => $id));
        removeFile($author_img);
        foreach($article_imgs as $key => $val) {
            removeFile($val['hinhanh']);
        }
        header("Location: author.php");
    } else {
        if (isset($_POST["txtAuthorId"])) {
            $id = $_POST["txtAuthorId"];
            if ($_FILES["img"]["name"]) {
                removeFile($_POST["img_old"]);
                $file_name = uploadFile("img", "../../public/images/author/");
                if ($db->updateWithCondition("tacgia", array("ten_tgia" => $author_name, "hinh_tgia" => $file_name), array("ma_tgia" => $id))) {
                    header("Location: author.php");
                }
            } else {
                if ($db->updateWithCondition("tacgia", array("ten_tgia" => $author_name), array("ma_tgia" => $id))) {
                    header("Location: author.php");
                }
            }
        } else  {
            if (isset($_FILES["img"])) {
                $file_name = uploadFile("img", "../../public/images/author/");
                if ($db->insertRecord("tacgia", array("ten_tgia" => $author_name, "hinh_tgia" => $file_name))) {
                    header("Location: author.php");
                }
            } else {
                header("Location: add_author.php");
            }
        }
    }




    

?>