<div style="height:65vh; border:#D3D3D3 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->

    <div style="width:99%; height:100%; margin:auto; overflow:auto;">
        <!-- <p class="t cent botli">管理者帳號管理</p> -->
        <form method="post" action="./api/edit.php">
            <table width="100%">
                <tbody>
                    <tr class="cent" style="background:#FF85C1">
                        <td width="45%">帳號</td>
                        <td width="45%">密碼</td>
                        <td width="10%">刪除</td>
                    </tr>
                    <?php
                    $rows = $Admin->all();
                    foreach ($rows as $row) {

                    ?>
                        <tr>
                            <td style="text-align: center;">
                                <input type="text" name="acc[]" value="<?= $row['acc']; ?>">
                            </td>
                            <td style="text-align: center;">
                                <input type="password" name="pw[]" value="<?= $row['pw']; ?>">
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



            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" class="btn btn-custom btn-block"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?table=<?= $do; ?>&#39;)"
                                value="新增管理者帳號">
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