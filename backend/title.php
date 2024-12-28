<div style="height:65vh; border:#D3D3D3 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->

    <div style="width:99%; height:100%; margin:auto; overflow:auto;">
        <!-- <p class="t cent botli">網站標題管理</p> -->
        <form method="post" action="./api/edit.php">
            <table width="100%">
                <tbody>
                    <tr class="cent" style="background:#FF85C1">
                        <td width="45%">網站LOGO</td>
                        <td width="23%">替代文字</td>
                        <td width="7%">顯示</td>
                        <td width="7%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $rows = $Title->all();
                    foreach ($rows as $row) {
                    ?>
                        <tr>
                            <td class="cent">
                                <img src="./upload/<?= $row['img']; ?>" style="width:150px;height:150px;margin-top:8px;">
                            </td>
                            <td class="cent">
                                <input type="text" name="text[]" value="<?= $row['text']; ?>">
                            </td>
                            <td class="cent">
                                <input type="radio" name="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                            </td>
                            <td class="cent">
                                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                            </td>
                            <td>
                                <input type="button"
                                    onclick="op('#cover','#cvr','./modal/upload_<?= $do; ?>.php?id=<?= $row['id']; ?>&table=<?= $do; ?>')"
                                    value="更新圖片">
                            </td>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>




            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" class="btn btn-custom btn-block"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?table=<?= $do; ?>&#39;)"
                                value="新增網站LOGO圖片">
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