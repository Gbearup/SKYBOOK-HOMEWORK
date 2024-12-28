<div style="height:65vh; border:#D3D3D3 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->

    <div style="width:99%; height:100%; margin:auto; overflow:auto;">
        <!-- <p class="t cent botli">新鮮事內容管理</p> -->
        <form method="post" action="./api/edit.php">
            <table width="100%">
                <tbody>
                    <tr class="cent" style="background:#FF85C1">
                        <td width="80%">資料內容</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                    </tr>
                    <?php

                    $div = 3;
                    $total = $News->count();
                    $pages = ceil($total / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;

                    $rows = $News->all(" limit $start,$div");
                    foreach ($rows as $row) {
                    ?>
                        <tr>
                            <td>
                                <textarea name="text[]" style="width:95%;height:140px;"><?= $row['text']; ?></textarea>
                            </td>
                            <td style="text-align: center;">
                                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                            </td>
                            <td style="text-align: center;">
                                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                            </td>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="cent">
                <?php

                if (($now - 1) > 0) {
                    $prev = $now - 1;
                    echo "<a href='?do=$do&p=$prev'> < </a>";
                }
                for ($i = 1; $i <= $pages; $i++) {
                    $size = ($i == $now) ? "24px" : "16px";
                    echo "<a href='?do=$do&p=$i' style='font-size:$size'> ";
                    echo $i;
                    echo " </a>";
                }
                if (($now + 1) <= $pages) {
                    $next = $now + 1;
                    echo "<a href='?do=$do&p=$next'> > </a>";
                }

                ?>
            </div>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" class="btn btn-custom btn-block"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?table=<?= $do; ?>&#39;)"
                                value="新增最新消息資料">
                        </td>
                        <td class="cent">
                            <input type="hidden" name="table" value="<?= $do; ?>">
                            <input type="submit" value="修改確定" class="btn btn-custom btn-block">
                            <input type="reset" value="重置" class="btn btn-custom btn-block">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>