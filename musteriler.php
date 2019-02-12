<?php
    include('xcrud/xcrud.php');
    $xcrud = Xcrud::get_instance();
    $xcrud->table('musteriler');
    //$xcrud->unset_remove();
    $xcrud->table_name('MÜŞTERİLER');  
    $xcrud->label('adi','Adı');
    $xcrud->label('soyadi','Soyadı');
     $xcrud->label('meslegi','Meslek');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>musteri listesi</title>
</head>
<body>
<?php
    echo $xcrud->render();
?> 
</body>
</html>