<?php include_once "api/db.php"; ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>花草fei fei</title>
    <!-- 引入 Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- 自製js css -->
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>



    <!-- 引入 jQuery 和 Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>


    <style>
        .col-md-8 p {
            font-size: 18px;
            /* Set the desired font size */
        }

        body {
            background-color: #FAF8F2;
        }

        .bg-brown {
            background-color: rgb(184, 159, 139);
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
        <!-- 標題區  #f5deb3-->
        <nav class="navbar navbar-light" style="background-color:#C9B49F; position: relative;">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="index.php" title="<?= $Title->find(['sh' => 1])['text']; ?>">
                    <!-- 圓形圖片區 -->
                    <div class="ti" style="height: 180px; width: 180px; background: url('./upload/<?= $Title->find(['sh' => 1])['img']; ?>') center/contain no-repeat; margin-right: 10px; border-radius: 50%;"></div>
                    <!-- 文字區 -->
                    <span class="h1 m-0" style="font-size: 2rem;">花草fei fei</span>
                </a>
                <!-- 社交媒體連結區 -->
                <div class="ml-auto d-flex align-items-center">
                    <a href="https://www.facebook.com/profile.php?id=61556129413714" target="_blank" class="text-dark mx-2">
                        <i class="fab fa-facebook-f" style="font-size: 2rem;"></i>
                    </a>
                    <a href="https://www.instagram.com/huatsaofeifei/" target="_blank" class="text-dark mx-2">
                        <i class="fab fa-instagram" style="font-size: 2rem;"></i>
                    </a>
                    <a href="https://line.me/R/ti/p/@287lkmtd" target="_blank" class="text-dark mx-2">
                        <i class="fab fa-line" style="font-size: 2rem;"></i>
                    </a>

                    <!-- 訂購專區 -->
                    <a href=" https://www.pinkoi.com/store/huatsaofeifei?utm_campaign=koc&utm_content=huatsaofeifei&utm_medium=ios_share&utm_source=Copy&utm_term=store" target="_blank" class="text-dark mx-2">
                        <img src="./upload/pinkoi.png" alt="pinkoi" style="width: 30px; height: 30px;border-radius: 5px;">
                    </a>


                    <!-- 管理者登入圖標 -->
                    <a href="login.php" class="text-decoration-none ml-3 d-flex text-dark mx-2">
                        <!-- 圖標 -->
                        <img src="./upload/flora.jpg" alt="管理者登入" style="width: 30px; height: 30px; margin-right: 8px; border-radius: 5px;">

                    </a>
                </div>
            </div>
        </nav>
    </div>



    <!-- 最新消息區 -->
    <div class="container">
        <h3 class="mt-4">新鮮事</h3>
        <hr>

        <!-- 顯示資料 -->
        <div class="card">
            <div class="card-body" style="height: 150px; overflow: hidden;">
                <?php
                $div = 2; // 每頁顯示5條新聞
                $total = $News->count(); // 總共有多少條新聞
                $pages = ceil($total / $div); // 計算總頁數
                $now = isset($_GET['p']) ? $_GET['p'] : 1; // 如果頁碼沒有設置，預設為第1頁
                $start = ($now - 1) * $div; // 計算顯示的起始位置
                $rows = $News->all("limit $start, $div"); // 從資料庫中查詢當前頁的新聞資料

                if ($rows) {
                    echo "<ul class='list-group'>";

                    foreach ($rows as $row) {
                        echo "<li class='list-group-item'>";
                        // 直接顯示完整的新聞內容
                        echo $row['text'];
                        echo "</li>";
                    }

                    echo "</ul>";
                } else {
                    echo "<p>目前沒有更多的資料</p>";
                }
                ?>
            </div>
        </div>

        <!-- 分頁控制 -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <!-- 上一頁 -->
                <?php if ($now > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?p=<?php echo $now - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- 分頁按鈕 -->
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $now) ? 'active' : ''; ?>">
                        <a class="page-link" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- 下一頁 -->
                <?php if ($now < $pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?p=<?php echo $now + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>















    <div class="container-fluid">
        <div class="row mb-">
            <!-- 左側圖片區，佔50%寬度 -->
            <div class="col-md-4 d-flex justify-content-center align-items-center" style="height:500px; margin-top:20px;">
                <div id="mwww" style="width:100%; height:100%;">
                    <!-- 圖片會由 JavaScript 動態載入 -->
                </div>

                <script>
                    var lin = new Array();
                    <?php
                    $mvs = $Mvim->all(['sh' => 1]);
                    foreach ($mvs as $mv) {
                        echo "lin.push('upload/{$mv['img']}');";
                    }
                    ?>
                    var now = 0;
                    if (lin.length > 1) {
                        setInterval("ww()", 3000);
                    }

                    function ww() {
                        // 使用 object-fit 保持圖片比例不變形
                        $("#mwww").html("<img src='" + lin[now] + "' style='width:100%; height:100%; object-fit:contain;' />");
                        now++;
                        if (now >= lin.length) now = 0;
                    }

                    ww();
                </script>
            </div>

            <!-- 右側頁面區，佔50%寬度 -->
            <div class="col-md-8 mt-5">
                <p>「花草Feifei」是一家以花為主題的地方小小花店，透露著自然、清新的氛圍，擁有獨特的品牌形象</P>
                <p>在繁忙的都市生活中，我們常常忽略了身邊最美麗的事物——花</P>
                <p>創辦人Mandy希望能喚醒每個人心中那份在對自然的熱愛和生活的熱情，將這份情意融入到每一束甚至是一朵花，為顧客帶來一次次美好體驗</P>
                <p>「花草Feifei」誠摯邀請您走進我們的花店，感受大自然的美好，一同尋找生活中的小確幸</P>

                <p>我們的特色：</P>
                <p>🌼自然與清新：店內陳設綠意盎然的綠植搭配Mandy定期上花市精選的新鮮花兒及從日本引進的永生花，營造出舒適愜意又帶有點溫柔浪漫的環境。</P>
                <p>🌷獨特設計：花店的花束和花藝設計因為客製化所以都能保有特色，融合了法式風格和隨著四季變化之元素，展現出獨特的美感和品味，為您帶來獨一無二的視覺饗宴和感動。</P>
                <p>🎋專業服務：「花草Feifei」注重對於每一位顧客的服務及感受，將花材的美麗和創意完美結合，為您打造出各種風格迥異的花藝作品，從花材選擇到搭配都會與消費者充分討論後製作，力求滿足每一份需求，讓顧客都能感受到溫暖和專業是Mandy希望能帶給大家的感受，無論是浪漫溫馨還是時尚簡約亦或是小清新，都能滿足您的需求。</P>
                <p>🌻緊密連結：透過社交媒體平台，「花草Feifei」與顧客建立了密切的互動，分享花藝知識、生活美學和精彩瞬間，之後將透過不定期舉辦各類花藝相關主題活動，讓您更深入地了解花的魅力、感受花藝的樂趣，提升了品牌的曝光度和影響力。</P>
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <div class="card mt-4 shadow-sm">
            <div class="card-header text-black" style="background-color: #C9B49F;">
                花藝商品展示區
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- 左翻按鈕 -->
                    <button class="btn btn-secondary" id="prevBtn" onclick="moveLeft()">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <!-- 圖片區域 -->
                    <div class="d-flex overflow-hidden w-100">
                        <div class="d-flex" id="image-gallery" style="transition: transform 0.3s ease-in-out;">
                            <?php
                            $imgs = $Image->all(['sh' => 1]);
                            foreach ($imgs as $idx => $img) {
                                echo "<div class='image-item' id='ssaa{$idx}' style='flex: 0 0 12.5%; margin-right: 10px;'>";
                                echo "<div class='img-container' style='width: 100%; height: 200px; overflow: hidden;'>";
                                echo "<img src='./upload/{$img['img']}' class='img-fluid rounded' style='width: 100%; height: 100%; object-fit: cover; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);' />";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- 右翻按鈕 -->
                    <button class="btn btn-secondary" id="nextBtn" onclick="moveRight()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        let currentIndex = 0; // 當前顯示的圖片區域
        const imagesPerPage = 8; // 每次顯示 8 張圖片
        const imageWidth = 200; // 每張圖片的寬度
        const imageSpacing = 10; // 圖片之間的間隙
        const imageItems = document.querySelectorAll('.image-item'); // 所有圖片項目
        const totalImages = imageItems.length; // 總圖片數量
        const imageGallery = document.getElementById('image-gallery');

        // 計算容器的總寬度，這裡使用 Math.floor 來確保寬度沒有浮動誤差
        const containerWidth = Math.floor(imagesPerPage * (imageWidth + imageSpacing) - imageSpacing); // 確保容器寬度整除圖片的寬度

        // 設定圖片容器寬度
        imageGallery.style.width = `${containerWidth}px`;

        // 更新箭頭顯示邏輯
        function updateArrows() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= totalImages - imagesPerPage;
        }

        // 左箭頭移動
        function moveLeft() {
            if (currentIndex > 0) {
                currentIndex--;
                updateImagePosition();
            }
        }

        // 右箭頭移動
        function moveRight() {
            if (currentIndex < totalImages - imagesPerPage) {
                currentIndex++;
                updateImagePosition();
            }
        }

        // 更新圖片顯示位置
        function updateImagePosition() {
            // 計算平移量，確保是整數倍，避免浮動誤差
            const offset = -currentIndex * (imageWidth + imageSpacing);
            imageGallery.style.transform = `translateX(${offset}px)`; // 平移圖片區域

            // 更新箭頭
            updateArrows();
        }

        // 初始化顯示
        updateArrows();
    </script>



    <footer class=" text-black py-3 mt-4 bg-brown ">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- 進站總人數統計 -->
            <div>
                <span>進站總人數: <?= $Total->find(1)['total']; ?></span>
            </div>

            <!-- 版權信息 -->
            <div>
                <span><?= $Bottom->find(1)['bottom']; ?></span>
            </div>
        </div>
    </footer>





    <script>
        var nowpage = 0,
            num = <?= $Image->count(['sh' => 1]); ?>;

        function pp(x) {
            var s, t;
            if (x == 1 && nowpage - 1 >= 0) {
                nowpage--;
            }
            if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
                nowpage++;
            }
            $("#image-gallery .col-4").hide();
            for (s = 0; s <= 2; s++) {
                t = s * 1 + nowpage * 1;
                $("#ssaa" + t).show();
            }
        }
        pp(1);
    </script>
</body>

</html>