<?php
    include('xcrud/xcrud.php');
    include('veritabanibaglantisi.php');
     
    $xcrud = Xcrud::get_instance();
     $xcrud->table('musteriler');
		$xcrud->join('musteri_id','satislar','musteri_id'); //musteriler ile satışlar tablosunu musteri id lerine göre joinleme
		$xcrud->join('satislar.oda_id','odalar','oda_id'); // satislar.oda_id  ile odalar.oda_id nin eşit olduğu alanları joinleme
		//$xcrud->unset_remove();
		$xcrud->columns('adi,soyadi,tc,odalar.oda_no,satislar.satis_tutari,satislar.gtarih,satislar.ctarih');//join tablomuzda istediğimiz sütunları getirme
		$xcrud->table_name('SATIŞLAR');
		$xcrud->label('adi','Adı');
		$xcrud->label('soyadi','Soyadı');
		$xcrud->label('satislar.satis_tutari','Satış Tutarı');
		$xcrud->label('satislar.gtarih','Giriş Tarihi');
		$xcrud->label('satislar.ctarih','Çıkış Tarihi');
		$xcrud->unset_remove();
		$xcrud->unset_edit();
		$xcrud->unset_view();
		
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Some page title</title>
</head>
 
<body>
 
<?php

     echo $xcrud->render(); 
 ?>
</body>
</html>