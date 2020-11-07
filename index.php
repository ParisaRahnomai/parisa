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
<body style="background-color:#3f3f3f">

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap-rtl.js"></script>
<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<section class="container"><br>
<div class="jumbotron text-center">
    <h1 style="color:orange"data-toggle="tooltip" title="سیستم تسهیل ارتباط استاد با دانشجو">سیستم ستاد</h1>
    <p style="color: #737373">به سیستم ار تباط استاد با دانشجو خوش آمدید</p>
</div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
<div class="jumbotron" style="height:430px">
    <p style="color: #737373">ورود کاربران دانشگاه</p><br>
    <div class="row">
        <div class="col-sm-4 text-center" >
            <button type="button" class="btn btn-warning btn-lg" style="width: 200px ; height: 70px">
                <a href="sign_ostad.php" style="color: white;">ورود اساتید و کارمندان</a>
                <br><span class="glyphicon glyphicon-log-in"></span></button>
        </div>


        <div class="col-sm-4 text-center">
            <button type="button" class="btn btn-default btn-lg"  style="width: 200px ; height: 70px; color: #737373">
                <a href="sign up_ostad.php" style="color: #737373;">ورود مدیر </a>
                <br><span class="glyphicon glyphicon-log-in"></span></button>
        </div>
        <div class="col-sm-4 text-center">
            <button type="button" class="btn btn-warning btn-lg" style="width: 200px">
                <a href="sign_ostad.php" style="color: white;">ورود دانشجویان</a>
                <br><span class="glyphicon glyphicon-log-in"></span></button>
        </div>
    </div><br><br>
  <!-- <div class="alert alert-warning">
  <strong>توجه!</strong> Indicates a warning that might need attention.
</div>-->
</div>
</section>
</body>
</html>