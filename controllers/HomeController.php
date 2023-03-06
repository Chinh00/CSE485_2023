<?php

    include_once("services/ArticleService.php");
    include_once("services/MemberService.php");
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

    public function postLogin()
    {
        $meber = new MemberService();
        if (isset($_POST["username"], $_POST["password"])){
            $login = $meber->checkLogin($_POST["username"], $_POST["password"]);
            var_dump($login);
            if (isset($login)){
                session_start();
                $_SESSION["isLogin"] = 1;
                if ($login->get_isAdmin() == 1 ) {
                    $_SESSION["isAdmin"] = 1;
                    header("location: ?controller=admin&action=index");
                } else {
                    header("location: ?controller=home&action=index");
                }
            } else {
                header("location: ?controller=home&action=login");
            }
        } else {
            header("location: ?controller=home&action=login");
        }
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION["isLogin"])) {
            session_unset();
            header("location: ?controller=home&action=index");
        }
    }

}

?>