<?php
    include('xcrud/xcrud.php');
    $xcrud = Xcrud::get_instance();
    $xcrud->table('kullanicilar');
    $xcrud->table_name('KULLANICILAR');
    $xcrud->label('kul_adi','Kullanıcı Adı');
    $xcrud->label('sifre','Şifre');
   $xcrud->change_type('sifre', 'password', '', 50);
    $xcrud->label('adi','Adı');
    $xcrud->label('soyadi','Soyadı');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Kullanıcılar</title>
</head>
<body>
<?php
    echo $xcrud->render();       
?> 
</body>
</html>