<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="shortcut icon" href="../../assets/ico/favicon.ico"-->
    <title>Bancakan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.js'></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="jsCarousel-2.0.0.js" type="text/javascript"></script>
    <link href="jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />
    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.css' rel='stylesheet' />
    <link href="custom.css" rel="stylesheet">
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
          echo '<div id="lencanaFirst" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div style="padding:10px 20px">
                        <h3 style="text-align: center;">Selamat, '.$_SESSION['fname'].' '.$_SESSION['lname'].'!</h3>
                        <span  style="text-align:center;">Anda mendapatkan lencana '.$resultFirst['nama_lencana'].'.</span>
                        <img style="margin-left:25px;" src="assets/images/badge/'.$resultFirst['nama_file_icon'].'.png" width="200px" height="200px" alt="">
                      </div>
                  </div>
                </div>
              </div>
                ';
          
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
          <a href="index.php"><img style="margin-top:8px;" src="assets/images/logo.png" alt="Logo" /></a>
        </div>
        <div style="margin-top:45px;float:left;margin-left:-180px">
          <ul id="navigation" style="height:30px; margin-top:10px;list-style: none;" class="navbar-nav">
              <li style="margin-right:10px;"><a class="aaa active" style="padding-top: 5px; padding-bottom: 5px; color:#76421c;font-size:17px;font-weight:bold;" href="index.php">Home</a></li>
              <li style="margin-right:10px"><a class="aaa" style="padding-top: 5px; padding-bottom: 5px;color:#76421c;font-size:17px;font-weight:bold;" id="jelajah" href="#">Jelajah</a></li>              
              <li id="per" class="dropdown">
                <a class="aaa" style="height:30px;padding-top: 5px; padding-bottom: 5px; margin-right:10px;color:#76421c;margin-top:-10px;font-size:17px;font-weight:bold;" href="#" data-toggle="dropdown">Permainan</a>
                <ul style="margin-top:-1px;border:none;background:#ffffff;" class="dropdown-menu">
                  <li><a id="cariP" style="color:#76421c;font-size:17px;font-weight:bold;" href="#">Cari Permainan</a></li>
                  <?php 
                    if(isset($_SESSION['email']))
                    {
                      ?>
                        <li><a id="tambahP" style="color:#76421c;font-size:17px;font-weight:bold;" href="#">Buat Permainan</a></li>
                      <?php
                    }
                  ?>
                </ul>
              </li>
              <li style="margin-right:10px"><a class="aaa" style="padding-top: 5px; padding-bottom: 5px;color:#76421c;font-size:17px;font-weight:bold;" href="#">Bantuan</a></li>
           </ul>
        </div>
        <div class="login">          
          <div style="float:left;color:#b08972;" class="user">  
            <?php
              if(!isset($_SESSION['email']))
              {
                echo '
                      </div>
                      <ul style="list-style:none;" class="navbar-nav">
                        <li id = "drops" class="dropdown">
                          <a style="color:#e8aa00;height:30px; margin-left:-40px;margin-right:10px;margin-top:-30px" href="#"  data-toggle="dropdown">Masuk</a>
                          <div style="margin-left:-60px;width:280px;margin-top:0px;padding:10px 20px;background:#76421c;border:none;border-radius:10px;" class="dropdown-menu">
                            <form id="formLogin" name="login" action="login.php" autocomplete="off" role="form" method="post">
                              <input style="height:35px;margin-bottom:10px;" name="username" id="username" type="text" class="form-control" placeholder="Email" required autofocus>
                              <input style="height:35px;margin-bottom:10px;" name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
                              <button id="subsub" style="height:35px;line-height: 10px;" class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                            </form>
                          </div>
                        </li>
                        <li> | &nbsp</li>
                        <li style="margin-right:10px"><a style="color:#e8aa00;" id="daftar" href="#">Daftar</a></li>
                       </ul> 
                ';
              }
              else
              {
                echo "Selamat Datang, ".$_SESSION['fname'].' '.$_SESSION['lname'].' !
                      </div>
                      <ul style="list-style:none; margin-left:-40px;" class="navbar-nav">
                        <li class="dropdown">
                          <a style="height:30px; margin-right:10px;margin-top:-10px" href="#" data-toggle="dropdown"> <b style="margin-top:3px;margin-left:5px;" class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a id="prop1" href="#">Edit Profile</a></li>
                            <li><a id="prop2" href="#">Lencanaku</a></li>
                            <li style="margin-right:10px"><a href="logout.php">Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                  ';
              }
            ?>
        </div>
      </div>
    </header>
    <div id="hhr"></div>
    <!--nav>
      <div class="container">
           <ul style="height:30px; margin-top:10px;margin-left:-20px;list-style: none;" class="navbar-nav">
              <li style="margin-right:10px;"><a style=" color:white;" href="index.php">Home</a></li>
              <li style="margin-right:10px"><a style=" color:white;" id="jelajah" href="#">Jelajah</a></li>              
              <li class="dropdown">
                <a style="height:30px; margin-right:10px;color:white;margin-top:-10px" href="#" data-toggle="dropdown">Permainan <b class="caret"></b></a>
                <ul style="margin-top:10px;border:none;background:#ffcc00;" class="dropdown-menu">
                  <li><a id="cariP" style="color:white"; href="#">Cari Permainan</a></li>
                  <?php 
                   /* if(isset($_SESSION['email']))
                    {
                      ?>
                        <li><a id="tambahP" style="color:white"; href="#">Buat Permainanmu Sendiri!</a></li>
                      <?php
                    }*/
                  ?>
                </ul>
              </li>
              <li style="margin-right:10px"><a style="color:white;" href="#">Bantuan</a></li>
           </ul>
      </div>
    </nav-->

    <div id="contents" class="content">
      <div class="container">
        <div class="isi">
          <div style="height:450px;padding:10px 10px;">
            <div style="float:right;width:310px;height:387px;margin-top:30px;border-radius:7px;background:white;">
              <div style="height:50px; border-radius: 7px 7px 0px 0px;background:#76421c;font-size:18px;color:white;padding:10px 20px;font-weight:bold;">
                Event Mendatang
              </div>
              <div style="padding: 10px 15px;margin-bottom:20px;">
                <div class="eves">
                  <span style="font-size:25px;font-weight:bold;color:white;">19</span>
                  <span style="font-size:12px;font-weight:bold;color:white;"><p>Sept</p></span>
                </div>
                aaaaaaaaaaaa
              </div><br/>
              <div style="padding: 10px 15px;margin-bottom:20px;">
                <div class="eves">
                  <span style="font-size:25px;font-weight:bold;color:white;">19</span>
                  <span style="font-size:12px;font-weight:bold;color:white;"><p>Sept</p></span>
                </div>
                aaaaaaaaaaaa
              </div><br/>
              <div style="padding: 10px 15px;margin-bottom:20px;">
                <div class="eves">
                  <span style="font-size:25px;font-weight:bold;color:white;">19</span>
                  <span style="font-size:12px;font-weight:bold;color:white;"><p>Sept</p></span>
                </div>
                aaaaaaaaaaaa
              </div><br/>
               <button style="margin-left:35%;margin-top:30px;width:100px;height:40px;" class="btn btn-lg btn-block" type="button">
                <a id="read" href="#">More</a>
              </button>
            </div>
            <div style="float:left">
              <div style="margin-top:30px;"><img src="assets/images/bancakan.png"></div>
              <?php
                if(!isset($_SESSION['email']))
                {
                  echo '<button style="height:60px;width:200px;line-height: 10px;margin-top:100px;background:yellow;" class="btn btn-lg btn-block" type="button">
                          <a id="gabung" href="#">Gabung Sekarang!</a>
                        </button>';
                }
              ?>             
            </div>
            <div style="float:right;">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fitur">
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

    <footer>
      <div class="container">
       <div style="text-align: center;padding:20px 20px">
        <a style="color:white" href="">About Us</a> &nbsp;
        <a style="color:white"href="">Help</a>
      </div>
    </footer>
    <div class="footer2">
      <div class="container">
        <div style="color:white;padding:10px 20px;text-align: center;">
          Copyright © 2014 Terms & Conditions Team
        </div>        
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
          $("#hhr").html('<hr>');
        });
      $("#gabung").click(function(){
          $("#contents").load("registerForm.php");
           $("body").removeClass('idx');
           $("#hhr").html('');
          $("#hhr").html('<hr>');
        });
      $("#jelajah").click(function(){
          $("#contents").load("jelajah.php");
           $("body").removeClass('idx');
           $("#hhr").html('');
          $("#hhr").html('<hr>');
        });
      $("#cariP").click(function(){
          $("#contents").load("permainan.php?pageId=1");
           $("body").removeClass('idx');
           $("#hhr").html('');
          $("#hhr").html('<hr>');
        });
      $("#tambahP").click(function(){
          $("#contents").load("permainan.php?pageId=2");
           $("body").removeClass('idx');
           $("#hhr").html('');
          $("#hhr").html('<hr>');
        });
      $("#prop1").click(function(){
          $("#contents").load("profile.php?prop=1");
           $("body").removeClass('idx');
           $("#hhr").html('');
          $("#hhr").html('<hr>');
        });
      $("#prop2").click(function(){
          $("#contents").load("profile.php?prop=2");
           $("body").removeClass('idx');
           $("#hhr").html('');
          $("#hhr").html('<hr>');
        });
      $("#per").hover(function() {
        $(this).addClass("open");
      }, function() {
        $(this).removeClass("open");
      });
    </script>
  </body>
</html>
