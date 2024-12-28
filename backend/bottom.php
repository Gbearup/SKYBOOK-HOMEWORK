<div style="height:65vh; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    
    <div style="width:99%; height:100%; margin:auto; overflow:auto; ">
        <p class="t cent botli">頁尾版權資料管理</p>
        <form method="post" action="./api/update_data.php">
            <table width="50%" style="margin:auto">
                <tbody>
                <tr class="cent" style="background:#FF85C1">
                        <td width="50%">頁尾版權資料：</td>
                        <td width="50%"><input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>"></td>
                    </tr>
                </tbody>
            </table>
            <div class="container mt-5">
                <table class=" w-75 mx-auto">
                    <tbody>
                        <tr>
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


