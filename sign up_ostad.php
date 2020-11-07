<?php
require_once 'engine/db.php';

if(isset($_SESSION['loggedin'])){
    header('Location: panel_ostad.php');
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سیستم تسهیل ارتباطات دانشگاهیان</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.rtl.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body style="background-color: #3f3f3f">
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap-rtl.js"></script>
<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<section class="container"><br>
    <div class="jumbotron text-center">
        <h1 style="color:orange"data-toggle="tooltip" title="سیستم تسهیل ارتباط استاد با دانشجو">سیستم ستاد</h1>
        <p style="color: #737373"> وزارت علوم تحقیقات و فناوری دانشگاه فنی و حرفه ای</p>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <div class="jumbotron">
        <p style="color: #737373">ثبت نام کاربران</p><br>
        <?php

        if(isset($_POST['do-register'])){
            if (empty($_POST['display-name'] && $_POST['password'] && $_POST['password-conf'] && $_POST['personel-code'])) {
                echo '<p style="color: red; text-align: center">     لطفا فرم خود را با دقت کامل کنید !</p>';
            }else{

$display_name= $_POST['display-name'];
$password= $_POST['password'];
$password_conf= $_POST['password-conf'];
$personel_code= $_POST['personel-code'];

if($password!=$password_conf){
    echo '<p style="color: red; text-align: center"> رمز شما با تکرارش مطابقت ندارد !</p>';
}else {


        $check = mysqli_query($db, "SELECT * FROM db_karbar WHERE p_code='".$_POST['personel-code']."' AND melli_code='".$_POST['password']."'");
        if (mysqli_num_rows($check) > 0) {
            echo '<p style="color: red; text-align: center"> کاربری با همین مشخصات موجود می باشد !</p>';
        } else {
        $register = mysqli_query($db, "INSERT INTO db_karbar(fname,melli_code,p_code) VALUES('$display_name','$password','$personel_code')");
        header('Location: sign_ostad.php');
               }
}}}?>

        <form  method="post">
        <div class="form-group">
            <label for="usr" style="color: #737373">نام و نام خانوادگی:</label>
            <input type="text" class="form-control" id="usr" name="display-name" placeholder="مثال: پریسا رهنمای">
        </div>

        <div class="form-group">
            <label for="usr2" style="color: #737373">رمز عبور:</label>
            <input type="password" class="form-control" id="usr2" name="password" placeholder="کد ملی خود را وارد کنید.">
        </div>
            <div class="form-group">
                <label for="usr2" style="color: #737373">تکرار رمز عبور:</label>
                <input type="password" class="form-control" id="usr2" name="password-conf" placeholder="کدملی خود را مجددا وارد کنید.">
            </div>
        <div class="form-group">
            <label for="usr3" style="color: #737373"> کد پرسنلی / کد دانشجویی</label>
            <input type="text" class="form-control" id="usr3" name="personel-code" placeholder="کد پرسنلی یا کد دانشجویی خود را وارد کنید"><br>
            <input type="submit" class="btn btn-warning btn-block"  id="submit" name="do-register" value="ثبت نام">
        </div>

        </form>
    </div>
</section>
</body>
</html>