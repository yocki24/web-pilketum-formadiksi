<?php
@session_start();
require_once "kon/koneksi.php"; 
ob_start();
if(isset($_SESSION['pin'])){
  $pin =$_SESSION['pin'];
  $qses =$koneksi->query("SELECT * FROM tbl_user where pin='".$_SESSION['pin']."'")or die(get_error());
  $scan = mysqli_num_rows($qses);
  $data   = mysqli_fetch_assoc($qses);
  if ($data['status']=='belum') {
      echo "<script>alert('Selamat Datang Kembali!!!....,Akun Anda Bisa Di Gunakan Sekali Jadi Harap Gunakan Akun Anda Dengan Bijak!');window.location='calon.php'</script> ";
    }else{
    header("location:logout.php ");
    }
}

else if( isset ( $_POST[ 'form' ] ) && $_POST[ 'form' ] != NULL ) {
$pin = $_POST['pin'];
$qa = $koneksi->query("SELECT * FROM tbl_user WHERE pin='".$_POST['pin']."'")or die(get_error());
  $scan = mysqli_num_rows($qa);
  $data   = mysqli_fetch_assoc($qa);
$_SESSION['pin']=$pin;
 if ($data['status']=='belum') {
echo "<script>alert('Selamat Datangg....,Akun Anda Bisa Di Gunakan Sekali Jadi Harap Gunakan Akun Anda Dengan Bijak');window.location='calon.php'</script>";
}
else{
 echo "<script>alert('Anda Tidak Tidak Bisa Melanjutkan');window.location='logout.php'</script>"; 
}
}
//print_r($_SESSION);
print_r($_SESSION['pin']);
//unset($_SESSION['pin']);
//session_destroy();
//function get_sidebar($page=null){$root_base = $GLOBALS['root_base'];?>
  <html>
    <head>
      <title>Login</title>
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
    <h2 class="active" style="width: 100%;margin: 30 0 20 0;padding: 0;"><p style="font-size: 25;font-family: monospace;line-height: 1; margin: 0;">Selamat Datang<br>Pemilihan Ketua Umum <br>Workshop Electro 2020 - 2021<br></p></h2>
    <!-- Icon -->
    <div class="fadeIn first" align="center">
     <img src="admin/img/logo.png" id="icon" alt="User Icon" height="" width="" />
    </div>
    <h2 class="active"><font size="" >"Gunakan hak pilih anda, Untuk Workshop Electro Yang Lebih Baik"</font></h2>
    
<br>
<br>
    

    <!-- Login Form -->
    <form action="" id="frm_login" method="post" enctype="multipart/form-data" >
      <input type="text" id="nim" class="fadeIn second lb" name="pin" placeholder="Masukan Pin" required>
      <!--input type="text" id="nama" class="fadeIn third lb" name="nama" placeholder="Nama Anda" required-->
      <input type="submit" class="fadeIn fourth" value="Masuk">
      <input type="hidden" name="form" value="login">
    </form>

    <!-- Remind Passowrd -->
    <!--div id="formFooter">
      <a class="underlineHover" href="#"></a>
    </div>

  </div-->
</div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="source/js/materialize.min.js"></script>
    </body>
  </html>
