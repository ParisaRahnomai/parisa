<?php

require_once 'db.php';


$sql=mysqli_query($db,"SELECT db_chat.chat, db_chat.timestamp, db_chat.gname ,db_chat.fname,db_chat.idc 
FROM db_karbar 
INNER JOIN db_chat
 ON db_chat.fname=db_karbar.fname OR db_chat.gname=db_karbar.fname WHERE db_karbar.p_code LIKE '%".$_SESSION['loggedin']."%'
  AND (db_chat.fname='".$_SESSION['payam']."' OR db_chat.gname='".$_SESSION['payam']."')");
?>
<html>
<head></head>
<body>
<?php while  ( $fetch = mysqli_fetch_array($sql)){?>
    <div class="col-xs-12">
        <div class="panel panel-danger ">
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
