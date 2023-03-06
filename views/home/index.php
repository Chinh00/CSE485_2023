
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
        $articles = $db->getAllRecordTable("baiviet");
    ?>

    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            <?php 
                foreach($articles as $key => $val) {
            ?>
                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="<?php echo handleImageForFrontend($val["hinhanh"]) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <a href="detail.php?id=<?php echo $val['ma_bviet'] ?>" class="text-decoration-none"><?php echo $val["tieude"] ?></a>
                            </h5>
                        </div>
                    </div>
                </div>

            <?php
                }
            ?>

            
        </div>
    </main>
    <?php include 'layouts/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>