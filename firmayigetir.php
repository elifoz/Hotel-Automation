
<head>
<link rel="stylesheet" type="text/css" href="mainstyle2.css" />
</head>
 	<body>
<?php
	header('Content-type: text/html; charset=utf-8');
	require_once("veritabanibaglantisi.php");
?>
<?php
if(!isset($_SESSION)) {
     session_start();
					}
		$musteri_id=$_SESSION['musteri_id'];
		$islemtarihi=$_SESSION['islemtarihi'];
		$fatura_tutar=$_SESSION['fatura_tutar'];
		$firmafatura_id=$_REQUEST['fg'];
			$firmagetir="SELECT * FROM fatura_bilgileri where fatura_id='$firmafatura_id'";
			$firmayi_getir=$baglanti->query($firmagetir);
	 foreach ($firmayi_getir as $key => $value) {
 	?>
 	<form>
 		<table>
 	 		<p>Firma Adı:<?php echo $value['firma_adi'];?></p>
 	 		<p>Vergi Numarası:<?php echo $value['vergi_no'];?></p>
 	 		<p>Vergi Dairesi:<?php echo $value['vergi_dairesi'];?></p>
 	 		<p>Fatura Adresi:<?php echo $value['fatura_adresi'];?></p>
  			<button><a href="main.php?link=18&kno=<?php echo $value['fatura_id'];?>&musteri_id=<?php echo $musteri_id;?>&islemtarihi=<?php echo $islemtarihi;?>&faturatutar=<?php echo $fatura_tutar;?>">SEÇ</a></button>
     		<button> <a href="main.php?link=15&kno=<?php echo $value['fatura_id'];?>">DÜZENLE</a></button>
     		<button> <a href="main.php?link=16&kno=<?php echo $value['fatura_id'];?>">SİL</a></button>
        </table>
     </form>
 <?php
}
 ?>
</body>

