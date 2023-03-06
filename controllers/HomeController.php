<?php

    include_once("services/ArticleService.php");
class HomeController {

    public function index()
    {

        $articles = new ArticleService();
        $baiviet = $articles->getAllArticles();
        
        include ("views/home/index.php");
    }

    public function login()
    {
        include ("views/home/login.php");
    }

}

?>