<?php

include "services/AuthorService.php";

include_once "models/Author.php";
class AuthorController {
    public function index()
    {

        $authors = new AuthorService();
        $author = $authors->getAllAuthor();
        include "views/author/author.php";
    }

    public function edit()
    {
        $id = $_GET["id"];
        $authors = new AuthorService();
        $author = $authors->getDetail($id);
        include "views/author/edit_author.php";
    }


    public function add()
    {
        
        include "views/author/add_author.php";
    }

    public function postAdd()
    {
        if ($_FILES["img"]['tmp_name']){
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/image_author/" . basename($_FILES["img"]["name"]));
            $img = "assets/image_author/" . basename($_FILES["img"]["name"]);
        }
        $authors = new AuthorService();
        $authors->insert(new Tacgia(0, $_POST["txtAuthorName"], $img ?? ""));
        header("location: ?controller=author&action=index");


    }

    public function postEdit()
    {
        $authors = new AuthorService();

        
        $img = $_POST["img_old"];
        if ($_FILES["img"]['tmp_name']){
            if (file_exists($_POST["img_old"])) {
                unlink($_POST["img_old"]);
            }
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/image_author/" . basename($_FILES["img"]["name"]));
            $img = "assets/image_author/" . basename($_FILES["img"]["name"]);
        }
        $authors->update(new Tacgia($_POST["txtAuthorId"], $_POST["txtAuthorName"], $img));
        header("location: ?controller=author&action=index");
    }

    public function delete()
    {
        $id = $_POST["id"];
        $authors = new AuthorService();
        $baiviet = $authors->getDetail($id);
        if (file_exists($baiviet->get_hinh_tgia())) {
            unlink($baiviet->get_hinh_tgia());
        }
        $imgs = $authors->delete($id);
        foreach($imgs as $key => $val) {
            if (file_exists($val)) {
                unlink($val);
            }
        }
        header("location: ?controller=author&action=index");
    }
}


?>