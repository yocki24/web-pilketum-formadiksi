<?php
@session_start();
ob_start(); 
require_once "kon/koneksi.php";
if ( isset($_POST [ 'form' ] ) && $_POST[ 'form' ] == "forgot") {
  include "classes/class.phpmailer.php";
  date_default_timezone_set('Etc/UTC');
      $result=mysqli_query($koneksi,"SELECT * FROM `tbl_user` WHERE status = 'belum'");
      $x = 1;
	while($x <= 100){
	$row_user=mysqli_fetch_array($result);
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Debugoutput = 'html';
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com"; //hostname masing-masing provider email
    $mail->SMTPDebug = 2;
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "yockifebrianto@gmail.com"; //user email
    $mail->Password = "YCI24fb01"; //password email
    $mail->SetFrom("yockifebrianto@gmail.com","Yocki Febrianto"); //set email pengirim
    $mail->Subject = "Pin Unik"; //judul email

    $mail->AddAddress($row_user["email"],$row_user["nama_lengkap"]); //tujuan email
    $mail->MsgHTML("Kami telah Mengirim Pin Unik ke anda ".$row_user["nama_lengkap"]." . Dan anda dapat login ke web kami dan pilihlah yang bijak <br><br>
    DETAIL AKUN ANDA :<br> Nama Penguna : ".$row_user["username"]." <br>
    Pin anda adalah: ".$row_user["pin"]."<br><br>
    <br> PESAN NO-REPLY");
    $mail->Send() ;
    if ($mail->Send()) {
    	    // update password baru ke database (jika pengiriman email sukses)
    $query = sprintf("UPDATE `tbl_user` SET `status`='%s' WHERE id_user = '%s'", 'sudah',  $row_user["id_user"]);
    $res = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
	echo "Berhasil di Send!";
    
    }else{
    echo "Failed to sending message". $mail->ErrorInfo;
    }
    $x++;
   }
  }else{
    echo "Rusak";
  }   
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Kirimmmmmm</title>
      <!--Import Google Icon Font-->
      <link href="source/font/a.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="source/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="source/css/masuk.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
<div class="wrapper fadeInDown">

<div id="formContent" width="80%">
<!-- Tabs Titles -->
    <h2 class="active" style="width: 100%;margin: 30 0 20 0;padding: 0;"><p style="font-size: 25;font-family: monospace;line-height: 1; margin: 0;"> </p></h2>
    <!-- Icon -->
    <div class="fadeIn first" align="center">
      <img src="admin/img/logo.png" id="icon" alt="User Icon" height="" width="" />
    </div>
    <h2 class="active"><font size="" >"Halaman Kirim Kode"</font></h2>

<br>
<br>


    <!-- Forgot Form -->
    <form action="" id="frm_login" method="post" enctype="multipart/form-data" >
      <input type="submit" class="fadeIn fourth" value="Lanjut">      
      <input type="hidden" name="form" value="forgot">
    </form>
</div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="source/js/materialize.min.js"></script>
    </body>
  </html>
