<?php
    include('xcrud/xcrud.php');
    $xcrud = Xcrud::get_instance();
    //$xcrud->query('SELECT odaislem.oda_no,kullanicilar.adi,kullanicilar.soyadi, odaislem.btarih,odaislem.ctarih FROM odaislem INNER JOIN kullanicilar on(odaislem.kul_id=kullanicilar.user_id)');
   $xcrud->table('odaislem');
   $xcrud->join('kul_id','kullanicilar','user_id');
   $xcrud->columns('oda_no,kullanicilar.adi,kullanicilar.soyadi,btarih');
   $xcrud->table_name('ODA İŞLEMLERİ');
   $xcrud->label('kullanicilar.adi','Adı');
   $xcrud->label('kullanicilar.soyadi','Soyadı');
   $xcrud->label('btarih','İşlem Tarihi');
  //$xcrud->unset_remove();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Some page title</title>
</head>
<body> 
<?php
     echo $xcrud->render(); // add entry screen
 ?>
</body>
</html>