<?php
    include_once "services/CategoryService.php";

    class CategoryController {
        public function index()
        {
            $category = new CategoryService();
            $categories = $category->getAllCategory();
            include "./views/category/category.php";
        }
        public function edit()
        {
            $id = $_GET["id"];
            $cate = new CategoryService();
            $category = $cate->getDetail($id);
            include "views/category/edit_category.php";
        }

        public function postEdit()
        {
            $category = new CategoryService();
            $category->update(new TheLoai($_POST["txtCatId"], $_POST["txtCatName"]));
            header("location: ?controller=category&action=index");
        }

        public function add()
        {
            include "views/category/add_category.php";
        }

        public function postAdd()
        {
            $category = new CategoryService();
            $category->insert(new TheLoai(-1, $_POST["txtCatName"]));
            header("location: ?controller=category&action=index");
        }

        public function delete()
        {
            $id = $_POST["id"];
            $cate = new CategoryService();
            $imgs = $cate->delete($id);
            foreach($imgs as $key => $val) {
                if (file_exists($val)) {
                    unlink($val);
                }
            }
            header("location: ?controller=category&action=index");
        }
    }
 
?>