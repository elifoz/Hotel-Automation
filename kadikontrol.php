
<?php
	header('Content-type: text/html; charset=utf-8');
	require_once("veritabanibaglantisi.php");
?>
<?php 
	$kul_adi=$_REQUEST['q'];
	$listele_sorgu="SELECT * from kullanicilar where kul_adi='$kul_adi'";
	$listele=$baglanti->query($listele_sorgu);
	$toplam =$listele->rowCount();
		if($toplam==0)	{
 	echo "Geçerli kullanıcı adı".'<img src="img/if_ok_61805.png">';
		}
	else
	{
		 echo "Bu kullanıcı adı sisteme kayıtlı!"."<br>"."Lütfen başka bir kullanıcı adı belirleyiniz.".'<img src="img/if_DeleteRed_34218.png">';
	}
?>
