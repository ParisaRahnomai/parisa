<?php
require_once 'db.php';
$sql=mysqli_query($db,"SELECT * FROM db_ettela ");
?>
<html>
<head></head>
<body>
<?php while  ( $fetch = mysqli_fetch_array($sql)){?>
    <div class="col-xs-12">
<div class="panel panel-danger ">
    <div class="panel-heading col-xs-12">
        <div  class="col-sm-6" style="direction: rtl;"><?php echo $fetch['fname'];?></div>
        <div  class="col-sm-6" style="direction: ltr;"><?php echo $fetch['timestamp'] ; ?></div>
    </div>
<div class="panel-body"></div>
   <div style="padding: 10px;"> <?php echo $fetch['matn']."<br>"; ?></div>
</div>
    </div>
<?php }?>
</body>
</html>
