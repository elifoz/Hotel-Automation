<?php
	if(!isset($_SESSION)) {
    	 session_start();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Giriş sayfası</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="girisfonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="girisfonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<?php
require_once("veritabanibaglantisi.php");
?>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="girissayfasi.php" method="post">
				<span class="login100-form-title p-b-37">
					 HOŞGELDİNİZ!
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="kuladi" placeholder="kullanıcı adı" required="required">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="ksifre" placeholder="şifre" required="required">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="girisbtn">
						Giriş Yap
					</button>
				</div>
			</form>
		</div>
	</div>
<?php
      if(isset($_POST["girisbtn"]))
		   {
	         $kuladi=$_REQUEST["kuladi"];
	         $kulsifre=$_REQUEST["ksifre"];
	         $sorgu="select * from kullanicilar where kul_adi='$kuladi' and sifre='$kulsifre'";
	         $sorgucalistir=$baglanti->query($sorgu);
	         $toplam = $sorgucalistir->rowCount();
       if($sorgucalistir==true and $toplam>=1){
             foreach ($sorgucalistir as $key => $value) {
             	$kul_id=$value['user_id'];
                 }
			$_SESSION['kullaniciadi']=$kuladi;
			$_SESSION['kullanici_id']=$kul_id;
			$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
			$_SESSION['sisttarih']=date("d.m.Y");
			$_SESSION['sistsaat']=date("H:i:s");
				header("location:main.php?link=1");
             }
      else{
             	header("location:girissayfasi.php");
          	 }
          }         
	?>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

 <footer>
<p class="footer"><h6><b>Copyright 2018 Elif Özceylan</b></h6></p>
</footer>
</body>
</html>