<div style="height:65vh; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    
    <div style="width:99%; height:100%; margin:auto; overflow:auto; ">
        <p class="t cent botli">形象圖片管理</p>
        <form method="post" action="./api/edit.php">
            <table width="100%" class='cent'>
                <tbody>
                <tr class="cent" style="background:#FF85C1">
                        <td width="70%">形象圖片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $rows=$Mvim->all();
                    foreach($rows as $row){
                    ?>
                    <tr>
                        <td>
                            <img src="./upload/<?=$row['img'];?>" style="width:120px;height:120px;">    
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                            <input type="button" 
                                onclick="op('#cover','#cvr','./modal/upload_<?=$do;?>.php?id=<?=$row['id'];?>&table=<?=$do;?>')"
                                  value="更換照片">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
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
                                    新增形象圖片
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


