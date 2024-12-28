<div style="height:65vh; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    
    <div style="width:99%; height:100%; margin:auto; overflow:auto; ">
        <p class="t cent botli">新鮮事內容管理</p>
        <form method="post" action="./api/edit.php">
            <table width="100%">
                <tbody>
                    <tr class="cent" style="background:#FF85C1">
                        <td width="80%">新鮮事資料內容</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                    </tr>
                    <?php

                    $div=3;
                    $total=$News->count();
                    $pages=ceil($total/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;

                    $rows=$News->all(" limit $start,$div");
                    foreach($rows as $row){
                    ?>
                    <tr>
                        <td>
                            <textarea name="text[]"  style="width:95%;height:120px;"><?=$row['text'];?></textarea>
                        </td>
                        <td style="text-align: center;">
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td style="text-align: center;">
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
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
                                    新增新鮮事資料
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


