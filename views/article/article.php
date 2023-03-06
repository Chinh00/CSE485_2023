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

        include '../../hepler/Support.php';

        

    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($db->getAllRecordTable("baiviet") as $key => $val){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $val["ma_bviet"] ?></th>
                                <th scope="row"><?php echo $val["tieude"] ?></th>
                                <th scope="row"><?php echo $val["ten_bhat"] ?></th>
                                <th scope="row"><?php echo  SplitStringByWord($val["tomtat"], 15)  ?></th>
                                <th scope="row"><?php echo $val["noidung"] ?></th>
                                <th scope="row"><?php echo date("y/m/d", strtotime($val["ngayviet"])) ?></th>
                                <td><img src="<?php echo $val["hinhanh"] ?>" alt="" width="100px" height="100px"></td>
                                <td>
                                    <a href="edit_article.php?id=<?php echo $val["ma_bviet"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <form action="process_article.php" method="post">
                                        <input type="hidden" name="delete" value="<?php echo $val["ma_bviet"] ?>" >

                                        <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                        <?php
                            }
                        ?>

                       
                    </tbody>
                </table>
            </div>
        </div>
    </main>



    <?php 
        include '../layouts/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>