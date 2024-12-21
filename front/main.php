<div class="container-fluid">
    <div class="row">
        <!-- 右側最新消息區，佔50%寬度 -->
        <div class="col-md-6">
            <!-- 增加容器的高度並加大內邊距，調整區域大小 -->
            <div class="p-4 mt-4" style="background-color: #f8f9fa; border-radius: 8px; position:relative; height: 300px;">
                <!-- 標題部分，文字稍微加大 -->
                <h4 class="font-weight-bold">最新消息區
                    <?php
                    if ($News->count(['sh' => 1]) > 5) {
                        echo "<a href='index.php?do=news' class='float-right text-primary' style='font-size: 16px;'>";
                        echo "More...";
                        echo "</a>";
                    }
                    ?>
                </h4>
                <!-- 內容列表 -->
                <ul class="list-unstyled">
                    <?php
                    $all_news = $News->all(['sh' => 1], " limit 5");
                    foreach ($all_news as $n) {
                        echo "<li class='ssaa mb-3'>";
                        echo "<span class='text-dark' style='font-size: 16px;'>" . mb_substr($n['text'], 0, 30) . "</span>";
                        echo "<span class='all' style='display:none'>" . $n['text'] . "</span>";
                        echo "</li>";
                    }
                    ?>
                </ul>
                <!-- 顯示更多詳細內容的提示框 -->
                <div id="altt"
                    style="position: absolute; width: 350px; min-height: 120px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); border-radius: 5px;">
                </div>
            </div>

            <script>
                $(".ssaa li").hover(
                    function() {
                        $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>");
                        $("#altt").show();
                    }
                );
                $(".ssaa li").mouseout(
                    function() {
                        $("#altt").hide();
                    }
                );
            </script>
        </div>
    </div>
</div>