<?php include_once "api/db.php";

if (!isset($_SESSION['login'])) {
    echo "請從登入頁登入<a href='index.php?do=login'>管理登入</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>花草fei fei</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 引入 Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJxv4s3QK+7b5k3yW2pE3oY5O92F5f5a0fHj9aVe2kEozFO0ggk3dyvB4jZ9" crossorigin="anonymous">

    <!-- 自定義 CSS -->
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
    <style>
        body{
            background:#FAF8F2;
        }
    </style>
</head>

<body>

    <!-- 覆蓋層 (保留彈出功能) -->
    <div id="cover" style="display:none;">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>

    <!-- 主內容區域 -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <a title="<?= $Title->find(['sh' => 1])['text']; ?>" href="index.php">
                    <div class="ti" style="height: 180px; background: url('./upload/<?= $Title->find(['sh' => 1])['img']; ?>') center/contain no-repeat;">
                        <!-- 這裡可以加上文字或其他內容 -->
                        
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-9">

                <h2 class="mb-4 ">後台管理選單</h2>
                <!-- 使用 nav-tabs 類別來顯示水平選單 -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="?do=title">網站標題管理</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="?do=ad">動態文字廣告管理</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="?do=mvim">形象圖片管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=image">花藝商品資料管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=total">進站總人數管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=bottom">頁尾版權資料管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=news">新鮮事管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=admin">管理者帳號管理</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="?do=menu">選單管理</a>
                    </li> -->
                </ul>
            </div>

            <!-- 主要內容區域 -->
            <div class="col-2"></div>
            <div class="col-10">
                <!-- 動態載入頁面 -->
                <?php
                $do = $_GET['do'] ?? 'title';
                $file = "./backend/{$do}.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    include "./backend/title.php";
                }
                ?>
            </div>
        </div>

        <!-- 頁尾 -->
        <footer class="alert alert-info text-center py-3 mt-4">
            <span><?= $Bottom->find(1)['bottom']; ?></span>
        </footer>
    </div>


    <!-- 引入 Bootstrap 5 的 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ojm81gYbl6cQzMx/6RkW1nSKm6QxK5EIfyP7tXl3sVKgFd5aOoVK9WJ5OXG+dhly" crossorigin="anonymous"></script>
</body>

</html>