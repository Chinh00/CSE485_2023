<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        include 'layouts/header.php';
        include 'includes/Database.php'; 
        include 'hepler/Support.php';

        $id = $_GET["id"] ?? 0;
        $article_detail = $db->getWithCondition("baiviet", array("ma_bviet" => $id));
        $author = $db->getWithCondition("tacgia", array("ma_tgia" => $article_detail[0]["ma_tgia"]));
        $category_name = $db->getWithCondition("theloai", array("ma_tloai" => $article_detail[0]["ma_tloai"]));
        echo $id;
    ?>
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
       
                <div class="row mb-5">
                    <div class="col-sm-4">
                        <img src="<?php echo handleImageForFrontend($article_detail[0]["hinhanh"]) ?>" class="img-fluid" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none"><?php echo $article_detail[0]["tieude"] ?></a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $article_detail[0]["ten_bhat"] ?></p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $category_name[0]["ten_tloai"] ?></p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $article_detail[0]["tomtat"] ?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $article_detail[0]["noidung"] ?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $author[0]["ten_tgia"] ?></p>

                    </div>          
        </div>
    </main>
        <?php include 'layouts/footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>