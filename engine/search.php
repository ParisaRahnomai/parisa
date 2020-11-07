<?php
require_once 'db.php';
    $get= mysqli_query($db,"SELECT * FROM db_karbar WHERE fname LIKE '%".$_POST['text']."%'");
?>
<html>
<head></head>
<body>
<select multiple class="form-control" id="e">
<?php while ($row = mysqli_fetch_array($get)) {?>

   <option class="select">
       <div class="list_pro" style="padding: 11px; border-bottom: 1px solid #3f3f3f;">
       <?php
                echo $row['fname'] ;
       ?>
    </div>
   </option>

    <?php
}
?>
</select>
</body>
</html>





