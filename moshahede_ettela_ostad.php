<?php
require_once 'engine/db.php';

if(!isset($_SESSION['loggedin'])){
    header('Location: sign_ostad.php');
}
$pcode= $_SESSION['loggedin'];
$sql=mysqli_query($db,"SELECT * FROM db_karbar WHERE p_code='$pcode'");
$fetch= mysqli_fetch_array($sql);
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

    <div class="jumbotron" style="height: auto">
        <p style="color: #737373"> خوش آمدید  <?php echo $fetch['fname'];?></p>
        <div class="row">
            <div class="btn-group-vertical col-sm-3 col-xs-12">
                <button type="button" class="btn btn-warning"><a href="payam_shakhsi.php" style="color: white;">گفت و گوی شخصی</a> </button>
                <button type="button" class="btn btn-warning"><a href="panel_ostad.php" style="color: white;"> ارسال پیام</a></button>
                <button type="button" class="btn btn-warning"><a href="moshahede_payam_ostad.php" style="color: white;"> فهرست پیام ها</a></button>
                <button type="button" class="btn btn-warning"><a href="moshahede_ettela_ostad.php" style="color: white;"> فهرست اطلاعات</a></button>
                <button type="button" class="btn btn-warning"><a href="sabt_ettela_ostad.php" style="color: white;"> ثبت اطلاعیه</a></button>
                <button type="button" class="btn btn-warning"><a href="engine/logout.php" style="color: white;"> خروج</a></button>
            </div>

            <div class="col-xs-12 col-sm-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">مشاهده ی اطلاعیه</div>
                    <div class="panel-body"></div>
                    <form action="engine/mosh_ettela.php" method="post">
                        <div class="result" id="result" style=" right: 0;  top: 33px; height: 500px; overflow: auto;">
                        </div>
                    </form>

                    <script>
                        $(document).ready(function (e) {
                            function showmsg() {
                                $.post("engine/mosh_ettela.php","r.php",function (data) {
                                    $("#result").html(data);
                                });
                            }
                            setInterval(showmsg,1000);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>