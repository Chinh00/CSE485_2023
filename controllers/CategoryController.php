<?php
    include_once "services/CategoryService.php";

    class CategoryController {
        public function index()
        {
            $category = new CategoryService();
            $categories = $category->getAllCategory();
            include "./views/category/category.php";
        }
    }
 
?>