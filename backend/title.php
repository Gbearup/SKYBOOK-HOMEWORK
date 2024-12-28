<div style="height:65vh; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->

    <div style="width:99%; height:100%; margin:auto; overflow:auto; ">
        <p class="t cent botli">網站LOGO管理</p>
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
                                <img src="./upload/<?= $row['img']; ?>" style="width:130px;height:130px;">
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


            <div class="container mt-5">
                <table class=" w-75 mx-auto">
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <button class="btn btn-custom btn-block"
                                    onclick="op('#cover', '#cvr', './modal/<?= $do; ?>.php?table=<?= $do; ?>')">
                                    新增網站LOGO圖片
                                </button>
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="table" value="<?= $do; ?>">
                                <button type="submit" class="btn btn-custom">修改確定</button>
                                <button type="reset" class="btn btn-custom">重置</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
    </div>
</div>