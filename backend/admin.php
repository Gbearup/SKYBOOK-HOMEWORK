<div style="height:65vh; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->

    <div style="width:99%; height:100%; margin:auto; overflow:auto; ">
        <p class="t cent botli">管理者帳號管理</p>
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
            <div class="container mt-5">
            <div class="container mt-5">
                <table class=" w-75 mx-auto">
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <button class="btn btn-custom btn-block"
                                    onclick="op('#cover', '#cvr', './modal/<?= $do; ?>.php?table=<?= $do; ?>')">
                                    新增管理者帳號
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
            </div>

        </form>
    </div>
</div>