<?php
include("services/ArticleService.php");
class HomeController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/home/index.php");
    }
}