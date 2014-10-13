<!doctype html>
<html lang="en">
<head>
    <title>Bancakan</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="shortcut icon" href="../../assets/ico/favicon.ico"-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.js'></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="css.css">

    <script type="text/javascript">
      $( document ).ready(function(){
        $("body").addClass('idx');
        $("#hhr").html('');
      });
    </script>
</head>

<?php
  include 'dbcon.php';
  session_start();
   $new = false;
    if(isset($_SESSION['login_time']))
    {
      if ($_SESSION['login_time']==1) {
        $qrFirst ="SELECT id_lencana, nama_lencana, nama_file_icon FROM lencana where id_lencana = 2";
        $getFirst = mysql_query($qrFirst);
        $resultFirst=mysql_fetch_array($getFirst);

        if($resultFirst)
        {
          ?>
          <div id="lencanaFirst" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div style="padding:10px 20px">
                    <h3 style="text-align: center;">Selamat, <?php echo $_SESSION['fname']  ;?>!</h3>
                    <span  style="text-align:center;">Anda mendapatkan lencana <?php echo $resultFirst['nama_lencana'];?>.</span>
                    <img style="margin-left:25px;" src="assets/images/badge/<?php echo $resultFirst['nama_file_icon'];?>" width="200px" height="200px" alt="">
                  </div>
              </div>
            </div>
          </div>
          <?php     
          
          $qrAddLencanaSt ="INSERT INTO user_have_lencana (id_tab_user,id_lencana,tanggal)
                            values ('".$_SESSION['id_tab_user']."','".$resultFirst['id_lencana']."',NOW())";
          $resultbadgefirst = mysql_query($qrAddLencanaSt);
          if($resultbadgefirst)
          {
            ?>
              <script type="text/javascript">
                $('#lencanaFirst').modal('show');
              </script>
            <?php
          }
        }
      }
    }
?>
<body class="idx">
    <header>
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo.png"></a>
            </div>
            <div class="menu">
                <ul id="navigation" class="nav navbar-nav">
                    <li><a class="aaa active" href="index.php">Home</a></li>
                    <li><a id="jelajah" class="aaa" href="#">Jelajah</a></li>
                    <li id="per" class="dropdown"><a href="#" class="dropdown-toggle aaa" data-toggle="dropdown">Permainan</a>
                        <ul class="dropdown-menu">
                            <li><a id="cariP" href="#">Cari Permainan</a></li>
                            <?php 
                              if(isset($_SESSION['email']))
                              {
                                ?>
                                  <li><a id="tambahP" href="#">Buat Permainan</a></li>
                                <?php
                              }
                            ?>
                        </ul>
                    </li>
                    <li><a class="aaa" href="index.php">Bantuan</a></li>
                </ul>
            </div>
            <div class="login">
                <div class="user">
                  <?php
                    if(!isset($_SESSION['email']))
                    {
                  ?>
                    </div>
                    <ul style="list-style:none; margin-left:20px;" class="navbar-nav">
                      <li id="drops" class="dropdown">
                        <a href="#" data-toggle="dropdown" id="masuk" class="btn">Masuk</a>
                        <div style="width:280px;margin-top:3px;padding:10px 20px;background:#76421c;border:none;border-radius:10px;box-shadow: 0px 5px 3px #000;" class="dropdown-menu">
                          <form id="formLogin" name="login" action="login.php" autocomplete="off" role="form" method="post">
                            <input style="height:35px;margin-bottom:10px;" name="username" id="username" type="text" class="form-control" placeholder="Email" required autofocus>
                            <input style="height:35px;margin-bottom:10px;" name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
                            <button id="subsub" style="height:35px;line-height: 10px;" class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                          </form>
                        </div>
                      </li>
                      <li><a id="daftar" href="#" class="btn">Daftar</a></li>
                     </ul> 
                  <?php
                    }
                    else
                    {
                  ?>
                    <ul class="navbar-nav">
                      <li class="dropdown">
                        <a href="#" data-toggle="dropdown"> Selamat Datang, <?php echo $_SESSION['fname'];?>! <b style="margin-top:3px;margin-left:5px;" class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a id="prop1" href="#">Edit Profile</a></li>
                          <li><a id="prop2" href="#">Lencanaku</a></li>
                          <li><a href="logout.php">Logout</a></li>
                        </ul>
                      </li>
                    </ul>
                </div>
                <?php
                  }
                ?>
            </div>
        </div>
    </header>
    <div id="contents">
        <div class="container">
            <div id="tagline">
                <h2>BANCAKAN</h2>
                <h3>Bandung Cinta Kabudayaan</h3>
                <br><br>
                <i>Jejaring Sosial berbasis Event dan Budaya</i>
                <br><br>
                <?php
                  if(!isset($_SESSION['email']))
                  {
                ?>
                  <button id="gabung" class="btn btn-lg btn-block" type="button">Gabung Sekarang!</button>
                <?php
                  }
                ?>
            </div>
            <div id="event_home">
                <h2>Event Mendatang</h2>
                <div id="box_event_home">
                  <?php
                    $qrEvent = "SELECT nama_event,id_event,tanggal_open, tanggal_close
                                FROM event
                                ORDER BY tanggal_open DESC
                                LIMIT 0,3
                                "; 
                    $getEvent = mysql_query($qrEvent);

                    while($resultEvent=mysql_fetch_assoc($getEvent)) {
                      $date = date("d",strtotime($resultEvent['tanggal_open']));
                      $month = date("M",strtotime($resultEvent['tanggal_open']));
                  ?>
                      <div class="eves">
                        <div class="date"><?php echo $date;?></div>
                        <div class="month"><?php echo $month;?></div>
                      </div> 
                      <div class="eves_name">
                        <a onclick="det(<?php echo $resultEvent['id_event'];?>)" href="#"><?php echo $resultEvent['nama_event']; ?></a>
                      </div>
                      <script type="text/javascript">
                        function det(id_eve)
                        {
                          $("#contents").load('detail.php?pages=2&idEve='+id_eve);
                          $("body").removeClass('idx');
                          $("#hhr").html('');
                          // $("#hhr").html('<hr>');
                        }
                       </script>
                      <div class="clear"></div>
                      <?php
                        }
                      ?>
                      <button id="more" class="btn btn-lg btn-block" type="button">Lihat semua</button>
                </div>
            </div>
            <div class="clear"></div>
        
            <div id="fitur">
              <div class="container">
                <div class="row">
                   <div class="col-xs-4">
                    <div class="partner-item">
                      <a href="#"><img src="assets/images/ft_jelajahbudaya.png" alt=""></a>
                    </div> <!-- /.partner-item -->
                   </div>
                   <div class="col-xs-4">
                    <div class="partner-item">
                       <a href="#"><img src="assets/images/ft_mulaipermainan.png" alt=""></a>
                    </div> <!-- /.partner-item -->
                   </div>
                   <div class="col-xs-4">
                    <div class="partner-item">
                       <a href="#"><img src="assets/images/ft_lencana.png" alt=""></a>
                    </div> <!-- /.partner-item -->
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <a href="#">About Us</a> &#8226; <a href="#">Help</a>
        </div>
    </footer>
    <div id="footer2">
        <div class="container">
            Copyright © 2014 Terms & Conditions Team 
        </div>
    </div>
    <script type="text/javascript">
      $(function() {
          $('#navigation li a').click(function() {
              $('#navigation li a').removeClass('active');
              $(this).addClass('active');
          });
      });
      $("#daftar").click(function(){
          $("#contents").load("registerForm.php");
          $("body").removeClass('idx');
          $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
      $("#gabung").click(function(){
          $("#contents").load("registerForm.php");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
      $("#jelajah").click(function(){
          $("#contents").load("jelajah.php");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // 

          // $("#hhr").html('<hr>');
        });
      $("#cariP").click(function(){
          $("#contents").load("permainan.php?pageId=1");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
      $("#tambahP").click(function(){
          $("#contents").load("permainan.php?pageId=2");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
      $("#prop1").click(function(){
          $("#contents").load("profile.php?prop=1");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
      $("#prop2").click(function(){
          $("#contents").load("profile.php?prop=2");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
      $("#per").hover(function() {
        $(this).addClass("open");
      }, function() {
        $(this).removeClass("open");
      });
      $("#more").click(function(){
          $("#contents").load("event.php");
           $("body").removeClass('idx');
           $("#hhr").html('');
          // $("#hhr").html('<hr>');
        });
    </script>
</body>
</html>