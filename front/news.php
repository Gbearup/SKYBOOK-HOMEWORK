<div class="container-fluid">
    <div class="row">
        <!-- 左側區塊 -->
        <div class="col-md-6" style="border: 1px solid #999; padding: 20px; margin-top: 20px;">
            <!-- 滾動文字區 -->
            <marquee scrolldelay="120" direction="left" class="mb-3">
                <!-- 您可以在這裡放置滾動內容 -->
            </marquee>

            <!-- 標題 更多最新消息資料區-->
            <h3>NEWS</h3>
            <hr>

            <?php
            $div = 3;
            $total = $News->count();
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all(" limit $start,$div");
            echo "<ol class='list-group'>";

            foreach ($rows as $row) {
                echo "<li class='list-group-item sswww'>";
                echo mb_substr($row['text'], 0, 20);
                echo "<span class='all' style='display:none'>" . $row['text'] . "</span>";
                echo "</li>";
            }
            ?>
            </ol>

            <!-- 分頁 -->
            <div class="cent text-center">
                <?php
                if (($now - 1) > 0) {
                    $prev = $now - 1;
                    echo "<a href='?do=$do&p=$prev' class='btn btn-sm btn-primary'> < </a>";
                }
                for ($i = 1; $i <= $pages; $i++) {
                    $size = ($i == $now) ? "20px" : "16px";
                    echo "<a href='?do=$do&p=$i' style='font-size:$size' class='btn btn-link'>$i</a>";
                }
                if (($now + 1) <= $pages) {
                    $next = $now + 1;
                    echo "<a href='?do=$do&p=$next' class='btn btn-sm btn-primary'> > </a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Tooltip 視窗 -->
<div id="alt"
    style="position: absolute; width: 350px; min-height: 100px; word-break: break-all; text-align: justify; background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0);">
</div>

<script>
    // 顯示更多內容的 hover 效果
    $(".sswww").hover(
        function() {
            $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show();
        }
    );
    $(".sswww").mouseout(function() {
        $("#alt").hide();
    });
</script>