<?php
    include('xcrud/xcrud.php');
    $xcrud = Xcrud::get_instance();
    $xcrud->table('odalar');
    $xcrud->table_name('ODALAR');
    $xcrud->label('aciklama','Açıklama');
    $xcrud->label('oda_fiyati','Oda Fiyatı');
    $xcrud->label('odadurumu','Oda Durumu');   
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>odalar</title>
</head>
<body>
<?php
    echo $xcrud->render();
   // echo $xcrud->relation('oda seç','odalar',array('oda_tipi'));
?>
</body>
</html>