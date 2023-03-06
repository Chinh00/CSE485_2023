<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php
        include '../layouts/header.php';

        include '../../includes/Database.php';


        $categories = $db->getAllRecordTable("theloai");
        $authors = $db->getAllRecordTable("tacgia");
        $article_old = $db->getWithCondition("baiviet", array("ma_bviet" => $_GET["id"]));
    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa bài viết</h3>
                <form action="process_article.php" method="post" enctype="multipart/form-data">
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Mã bài viết</span>
                        <input type="text" class="form-control" readonly name="txtArticleId"  value="<?php echo $article_old[0]["ma_bviet"] ?>">
                    </div>
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtTitleName" value="<?php echo $article_old[0]["tieude"] ?>">
                    </div>
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtMusicName" value="<?php echo $article_old[0]["ten_bhat"] ?>">
                    </div>
                    
                    <div class="input-group mt-3 mb-3">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option>Chọn thể loại</option>
                            <?php
                                foreach($categories as $key => $val) {
                            ?>
                                <option value="<?php echo $val["ma_tloai"]?>" <?php if($article_old[0]["ma_tloai"] == $val["ma_tloai"]) { echo "selected"; }  ?>><?php echo $val["ten_tloai"]  ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <select class="form-select" aria-label="Default select example" name="author_id">
                            <option selected>Chọn tắc giả</option>
                            <?php
                                foreach($authors as $key => $val) {
                            ?>
                                <option value="<?php echo $val["ma_tgia"]?>" <?php if($article_old[0]["ma_tgia"] == $val["ma_tgia"]) { echo "selected"; }  ?> ><?php echo $val["ten_tgia"]  ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="short_content" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $article_old[0]["tomtat"]  ?></textarea>
                            <label for="floatingTextarea">Tóm tắt</label>
                        </div>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $article_old[0]["noidung"]  ?></textarea>
                            <label for="floatingTextarea">Nội dung</label>
                        </div>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" name="date" value="<?php echo date("Y/m/d")  ?>">
                            <label for="floatingTextarea">Chọn ngày</label>
                        </div>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <input type="file"  class="form-control" name="img">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <img src="<?php echo $article_old[0]["hinhanh"]  ?>" class="img-thumbnail" alt="...">
                        <input type="hidden" name="img_old" value="<?php echo $article_old[0]["hinhanh"]  ?>">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php 
        include '../layouts/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>