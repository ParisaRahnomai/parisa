<?php

require_once 'db.php';


$sql=mysqli_query($db,"SELECT db_chat.chat, db_chat.timestamp, db_chat.gname ,db_chat.fname,db_chat.idc
FROM db_karbar
INNER JOIN db_chat
ON db_chat.fname=db_karbar.fname OR db_chat.gname=db_karbar.fname WHERE db_karbar.p_code LIKE '%".$_SESSION['loggedin']."%'");
$pcode= $_SESSION['loggedin'];
$sl=mysqli_query($db,"SELECT * FROM db_karbar WHERE p_code='$pcode'");
$fet= mysqli_fetch_array($sl);

$fer= $fet['fname'];

?>
<html>
<head></head>
<body>
    <?php while  ( $fetch = mysqli_fetch_array($sql)){?>

        <div class="col-xs-12">
            <div class="panel panel-danger" id="s">
                <div class="panel-heading col-xs-12">
                    <div  class="col-sm-4" style="direction: rtl;"><?php  echo "از طرف"." ".":"." ".$fetch['fname'];?></div>

                    <div  class="col-sm-4" style="direction: ltr;"><?php echo $fetch['timestamp'] ; ?></div>

                    <div  class="col-sm-4" style="direction: ltr;"><?php  echo "به"." ".":"." ".$fetch['gname'];?></div>
                </div>

                <div class="panel-body"></div>

                <div style="padding: 10px;"> <?php echo $fetch['chat']."<br>"; ?></div>
            </div>
        </div>
        <?php }?>
</body>

</html>






