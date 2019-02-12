<?php
header('Content-type: text/html; charset=utf-8');
require_once("veritabanibaglantisi.php");
?>
<?php 
$sifre=$_REQUEST['s'];
$sifretkr=$_REQUEST['st'];

if($sifre==$sifretkr){
			 echo "Şifreler uyumlu".'<img src="img/if_ok_61805.png" align="center">';
					}
else{
		 echo "Şifreler uyumlu değil!".'<img src="img/if_DeleteRed_34218.png">';
	}
	?>