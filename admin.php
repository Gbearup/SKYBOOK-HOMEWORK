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


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>




    <!-- 自定義 CSS -->
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
    <style>
        body {
            background: #FAF8F2;
        }

        .nav-link.active {
            background-color: #FF85C1 !important;
            color: white !important;
        }

        .nav-link {
            color: black !important;
            /* 使文字顏色變成黑色 */
        }

        /* 按鈕正常狀態 */
        .btn-custom {
            background-color:#F8D7E8;
            color: black;
            border: none;
            transition: background-color 0.3s, color 0.3s;
            /* 增加平滑過渡效果 */
        }

        /* 當按鈕被 hover 時 */
        .btn-custom:hover {
            background-color:rgb(6, 179, 185);
            /* 更深的顏色 */
            color: white;
            /* 文字顏色變為白色 */
        }

        .alert-gray{
            background-color:#E9B8CE;
            color: #4A4A4A;

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

    <!-- 標題區域 -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 d-flex align-items-center text-center">
                <a title="<?= $Title->find(['sh' => 1])['text']; ?>" href="index.php">
                    <div style="width: 180px; height: 180px; background: url('./upload/<?= $Title->find(['sh' => 1])['img']; ?>') center/cover no-repeat; border-radius: 50%;"></div>
                </a>
                <h2 class="mb-4 ml-3 pt-3 pt-md-5" style="padding-top: 25px;">花草FeiFei 後台管理選單</h2>

            </div>
        </div>
    </div>



    <!-- 選單區域 -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <!-- 使用 nav-tabs 類別來顯示水平選單 -->
                <ul class="nav nav-tabs">

                    <?php
                    $activeTab = isset($_GET['do']) ? $_GET['do'] : 'default'; // 如果沒設置，則使用預設值
                    ?>

                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'title') ? 'active' : ''; ?>" href="?do=title">網站LOGO管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'news') ? 'active' : ''; ?>" href="?do=news">新鮮事管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'mvim') ? 'active' : ''; ?>" href="?do=mvim">形象圖片管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'image') ? 'active' : ''; ?>" href="?do=image">花藝商品資料管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'total') ? 'active' : ''; ?>" href="?do=total">進站總人數管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'bottom') ? 'active' : ''; ?>" href="?do=bottom">頁尾版權資料管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activeTab == 'admin') ? 'active' : ''; ?>" href="?do=admin">管理者帳號管理</a>
                    </li>
                    <li class="nav-item">
                        <button onclick="document.cookie='user='; location.replace('./api/logout.php')"
                            class="btn btn-outline-danger w-100" style="height: 50px;">
                            管理登出
                        </button>
                    </li>


                </ul>
            </div>
        </div>
    </div>

    <!-- 主要內容區域 -->
    <div class="container-fluid" style="height:65vh" ;>
        <div class="row">
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

    </div>

    <!-- 頁尾 -->
    <div class="container-fluid">
        <footer class="alert alert-gray text-center py-3 mt-4">
            <span><?= $Bottom->find(1)['bottom']; ?></span>
        </footer>
    </div>



    <!-- 引入 Bootstrap 5 的 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ojm81gYbl6cQzMx/6RkW1nSKm6QxK5EIfyP7tXl3sVKgFd5aOoVK9WJ5OXG+dhly" crossorigin="anonymous"></script>
</body>

</html>