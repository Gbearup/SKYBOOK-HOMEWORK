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
        <!-- 標題區 -->
        <nav class="navbar navbar-light" style="background-color: #f5deb3;">
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
                        <i class="fab fa-facebook-f" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://www.instagram.com/huatsaofeifei/" target="_blank" class="text-dark mx-2">
                        <i class="fab fa-instagram" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://line.me/R/ti/p/@287lkmtd" target="_blank" class="text-dark mx-2">
                        <i class="fab fa-line" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>


    <!-- 選單區 -->
    <div class="container-fluid">
        <!-- 主選單區 (左邊) -->
        <div class="row mb-4">
            <div class="col-12 col-md-3">
                <div id="menuput" class="dbor shadow-sm">
                    <span class="t botli">主選單區</span>
                    <?php
                    $mains = $Menu->all(['sh' => 1, 'main_id' => 0]);
                    foreach ($mains as $main) {
                        echo "<div class='mainmu'>";
                        echo "<a href='{$main['href']}' class='text-decoration-none'>" . $main['text'] . "</a>";

                        echo "<div class='mw'>";
                        if ($Menu->count(['main_id' => $main['id']]) > 0) {
                            $subs = $Menu->all(['main_id' => $main['id']]);
                            foreach ($subs as $sub) {
                                echo "<div class='mainmu2'>";
                                echo "<a href='{$sub['href']}' class='text-decoration-none'>" . $sub['text'] . "</a>";
                                echo "</div>";
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
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
                <p>「花草Feifei」是一家以花為主題的地方小小花店，透露著自然、清新的氛圍，擁有獨特的品牌形象，在繁忙的都市生活中，我們常常忽略了身邊最美麗的事物——花，創辦人Mandy希望能將品牌形象建構在對自然的熱愛和生活的熱情之上，將這份對於生活的熱情融入到每一束甚至是一朵花，為顧客帶來一次次美好經驗，「花草Feifei」誠摯邀請您走進我們的花店，感受大自然的美好，一同尋找生活中的小確幸。</P>

                <p>品牌形象的關鍵特點包括：</P>

                <p>自然與清新：「花草Feifei」以自然、清新的形象為品牌特色，店內陳設綠意盎然的綠植搭配Mandy定期上花市精選的新鮮花兒及從日本引進的永生花，營造出舒適愜意又帶有點溫柔浪漫的環境。</P>
                <p>獨特設計：花店的花束和花藝設計因為客製化所以都能保有特色，融合了法式風格和隨著四季變化之元素，展現出獨特的美感和品味，為您帶來獨一無二的視覺饗宴和感動。</P>
                <p>專業服務：「花草Feifei」注重對於每一位顧客的服務及感受，將花材的美麗和創意完美結合，為您打造出各種風格迥異的花藝作品，從花材選擇到搭配都會與消費者充分討論後製作，力求滿足每一份需求，讓顧客都能感受到溫暖和專業是Mandy希望能帶給大家的感受，無論是浪漫溫馨還是時尚簡約亦或是小清新，都能滿足您的需求。</P>
                <p>社交媒體行銷：透過社交媒體平台，「花草Feifei」與顧客建立了密切的互動，分享花藝知識、生活美學和精彩瞬間，之後將透過不定期舉辦各類花藝相關主題活動，讓您更深入地了解花的魅力、感受花藝的樂趣，提升了品牌的曝光度和影響力。</P>
                <p>總的來說，「花草Feifei」以其獨特的花店形象和專業服務，贏得顧客的喜愛和信任，成為了一個極具吸引力的品牌。</P>
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <div class="card mt-4 shadow-sm">
            <div class="card-header text-black" style="background-color: #f5deb3;">
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








    <!-- 最新消息區 -->

    <div class="container">
        <div class="row">
            <div class="col">
                <!-- 動態載入頁面 -->
                <?php
                $do = $_GET['do'] ?? 'main';
                $file = "./front/{$do}.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    include "./front/main.php";
                }
                ?>
            </div>
        </div>
    </div>







    <footer class="alert alert-info text-black py-3 mt-4">
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