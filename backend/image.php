<div style="height:65vh; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    
    <div style="width:99%; height:100%; margin:auto; overflow:auto; ">
        <p class="t cent botli">花藝商品展示圖片管理</p>
        <form method="post" action="./api/edit.php">
            <table width="100%" class='cent'>
                <tbody>
                <tr class="cent" style="background:#FF85C1">
                        <td width="70%">花藝商品展示照片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $div=3;
                    $total=$Image->count();
                    $pages=ceil($total/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;

                    $rows=$Image->all(" limit $start,$div");
                    foreach($rows as $row){
                    ?>
                    <tr>
                        <td>
                            <img src="./upload/<?=$row['img'];?>" style="width:120px;height:120px;text-align:center">    
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
                                  value="更換圖片">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="cent">
            <?php

                if(($now-1)>0){
                    $prev=$now-1;
                    echo "<a href='?do=$do&p=$prev'> < </a>";
                }

                
                for($i=1;$i<=$pages;$i++){
                    $size=($i==$now)?"24px":"16px";
                    echo "<a href='?do=$do&p=$i' style='font-size:$size'> ";
                    echo $i;
                    echo " </a>";
                }

                if(($now+1)<=$pages){
                    $next=$now+1;
                    echo "<a href='?do=$do&p=$next'> > </a>";
                }

            ?>
            </div>
            <div class="container mt-5">
                <table class=" w-75 mx-auto">
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <button class="btn btn-custom btn-block"
                                    onclick="op('#cover', '#cvr', './modal/<?= $do; ?>.php?table=<?= $do; ?>')">
                                    新增花藝商品展示照片
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


