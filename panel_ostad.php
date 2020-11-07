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

    <div class="jumbotron">
        <p style="color: #737373"> خوش آمدید  <?php echo $fetch['fname'];?>  </p>

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
            <div class="panel-heading">ارسال پیام</div>
            <div class="panel-body">
                <?php

                include ('engine/jdf.php');
                date_default_timezone_set('Asia/Tehran');
                $time = jdate('Y/m/d h:i:sa');

                if (isset($_POST['do-send'])) {
                    if (empty($_POST['mokhatab'] && $_POST['matn'])) {
                        echo '<p style="color: red; text-align: center"> لطفا مخاطب و پیام مورد نظر خود را وارد کنید !</p>';
                    }else{

                        $pode= $_SESSION['loggedin'];
                        $sl=mysqli_query($db,"SELECT * FROM db_karbar WHERE p_code='$pode'");
                        $fech= mysqli_fetch_array($sl);

                        $ferestande= $fech['fname'];

                        $mokhatab= $_POST['mokhatab'];
                        $matn= $_POST['matn'];

                        $register = mysqli_query($db, "INSERT INTO db_chat(fname,chat,gname,timestamp) VALUES('$ferestande','$matn','$mokhatab','$time')");
                        header('Location: moshahede_payam_ostad.php');
                    }
                }
                ?>

                <form action="engine/search.php" method="get" class="warp">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="query" placeholder="جستوجوی مخاطب">
                    
                       <div  class="result" style="position: absolute;right: 0; top: 33px; height: 100px;"></div>

                    <div class="input-group-btn">
                        <button class="btn btn-default" name="search" id="submit" type="submit" >
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>

              <script>
                    var timeout;
                  $('#search').keypress(function () {
                   clearTimeout(timeout);
                   timeout=setTimeout(function () {sendrequest()},1000);
                  });
                  function sendrequest () {
                      $.ajax({
                          url:'engine/search.php',
                          type:'POST',
                          data:{text:$('#search').val(),},success: function f(data) {
                            $('.result').html(data);

                              $('.result').click(function () {
                                  var myInput =  $('#e');
                                  var inputValue = myInput.val();
                                  $('#usr').val(inputValue);
                                  $('.result').hide();
                                  $('#search').keypress(function(){
                                      $('.result').show();
                                  });
                                  $('.panel-body').click(function(){
                                      $('.result').hide();
                                  });


                              });
                          }
                      })

                  }
              </script>


               <form  method="post">
                <div class="form-group">
                    <label for="usr"></label>
                    <input type="text" class="form-control" id="usr" name="mokhatab" placeholder="مخاطب">
                </div>
                <div class="form-group">
                    <label for="comment"></label>
                    <textarea class="form-control" rows="5" id="comment" name="matn" placeholder="متن"></textarea>
                </div>
                   <button type="submit" class="btn btn-warning btn-block" name="do-send">ارسال</button>
               </form>
            </div>
 </div>
        </div>
    </div>
        </div>
   </section>
</body>
</html>

