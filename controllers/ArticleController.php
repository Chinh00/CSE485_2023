<?php
include_once "services/ArticleService.php";
include_once "services/CategoryService.php";
include_once "services/AuthorService.php";
include_once "models/Article.php";
class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        $articles = new ArticleService();
        $baiviet = $articles->getAllArticles();
        include "./views/article/article.php";        
    }

    public function add(){
        $cate = new CategoryService();
        $categories = $cate->getAllCategory();
        $auth = new AuthorService();
        $authors = $auth->getAllAuthor();

        include "./views/article/add_article.php";

    }


    public function edit()
    {
        $articles = new ArticleService();

        $baiviet = $articles->getDetail($_GET["id"])[0];
        $cate = new CategoryService();
        $categories = $cate->getAllCategory();
        $auth = new AuthorService();
        $authors = $auth->getAllAuthor();


        
        include "./views/article/edit_article.php";
        

    }


    public function postEdit()
    {
        $id = $_POST["txtArticleId"];
        $articles = new ArticleService();
        $tieude = $_POST["txtTitleName"];
        $ten_bhat = $_POST["txtMusicName"];
        $short_content = $_POST["short_content"];
        $category_id = $_POST["category_id"];
        $author_id = $_POST["author_id"];
        $content = $_POST["content"];
        $date = $_POST["date"] ?? date("Y-m-d");
        $img_new = $_POST["img"] ?? $_POST["img_old"];
        if ($_FILES["img"]["name"]){
            if (file_exists($_POST["img_old"])) {
                unlink($_POST["img_old"]);
            }
            move_uploaded_file($_FILES["img"]["tmp_name"], "assets/image_article/" . basename($_FILES["img"]["name"]));
            $img_new = ("assets/image_article/" . basename($_FILES["img"]["name"]));

        }
        $article_update = new BaiViet($id, $tieude, $ten_bhat, $category_id, $short_content, $content, $author_id, $date, $img_new);
        $check = $articles->update($article_update);
        header("location: ?controller=article&action=index");

    }
   
    public function postInsert()
    {
        $articles = new ArticleService();
        $tieude = $_POST["txtTitleName"];
        $ten_bhat = $_POST["txtMusicName"];
        $short_content = $_POST["short_content"];
        $category_id = $_POST["category_id"];
        $author_id = $_POST["author_id"];
        $content = $_POST["content"];
        $date = $_POST["date"] ?? date("Y-m-d");
        
        echo "assets/image_article/" . basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"], "assets/image_article/" . basename($_FILES["img"]["name"]) );
        $img = ("assets/image_article/" . basename($_FILES["img"]["name"]));
        $articles->insert(new BaiViet(0, $tieude, $ten_bhat, $category_id, $short_content, $content, $author_id, $date, $img));
        // $this->index();

    }

    public function delete()
    {
        $id = $_POST["id"];
        $articles = new ArticleService();
        $articles->delete($id);
        header("location: ?controller=article&action=index");
    }

}



?>