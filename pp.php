<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- 引入 jQuery 和 Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    // 取得圖片資料
    $imgs = $Image->all(['sh' => 1]);
    ?>

    <div id="flowerCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $chunks = array_chunk($imgs, 8); // 每行 8 張圖片
            foreach ($chunks as $index => $chunk) {
                // 判斷這是第一組圖片，用來設置 active 類別
                $activeClass = $index == 0 ? ' active' : '';
            ?>
                <div class="carousel-item<?php echo $activeClass; ?>">
                    <div class="row">
                        <?php foreach ($chunk as $img) { ?>
                            <div class="col-3">
                                <img src="./upload/<?php echo $img['img']; ?>" class="d-block w-100" alt="Flower Image">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- 左右箭頭 -->
        <a class="carousel-control-prev" href="#flowerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#flowerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</body>

</html>