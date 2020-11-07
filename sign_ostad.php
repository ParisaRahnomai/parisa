<?php
require_once 'engine/db.php';
if(isset($_SESSION['loggedin'])) {
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
    <div class="jumbotron" style="height:430px" >
        <p style="color: #737373"> ورود به پنل کاربری</p><br>
        <?php
        if (isset($_POST['do-login'])){
            if (empty($_POST['personel-code'] &&$_POST['password'])){
                echo '<p style="color: red; text-align: center"> لطفا نام کاربری و رمز عبور خود را وارد کنید !</p>';
            }else {
                $personel_code = $_POST['personel-code'];
                $password = $_POST['password'];
                $check = mysqli_query($db, "SELECT * FROM db_karbar WHERE p_code='".$_POST['personel-code']."' AND melli_code='".$_POST['password']."'");
                if (mysqli_num_rows($check) > 0) {

                    $_SESSION['loggedin'] = $personel_code;
                    header('Location: panel_ostad.php');
                }else{
                    echo '<p style="color: red; text-align: center"> نام کاربری و رمز عبور صحیح نمی باشد ! </p>';}

            }
        }
        ?>
        <form  method="post">
        <div class="form-group" >
            <label for="usr" style="color: #737373"> نام کاربری:</label>
            <input type="text" class="form-control" id="usr" name="personel-code" placeholder=" کد پرسنلی / کد دانشجویی">
        </div>
        <div class="form-group">

            <label for="pwd" style="color: #737373">رمز عبور:</label>
            <input type="password" class="form-control" id="pwd" name="password" placeholder="کد ملی"><br>
            <input type="submit" class="btn btn-warning btn-block" id="submit" name="do-login" value="ورود">
        </div>
        </form>
    </div>
</section>
</body>
</html>