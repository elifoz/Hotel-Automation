<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SATIŞLAR</title>
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  require_once('veritabanibaglantisi.php');
  require_once('sorgular.php');
   $alinacak="SELECT musteriler.musteri_id,musteriler.adi,musteriler.soyadi,musteriler.tc,odalar.oda_no,satislar.kalacak_kisi,satislar.kalacak_gun,satislar.satis_tutari,satislar.odeme,satislar.satis_tipi, satislar.gtarih,satislar.ctarih from  musteriler inner join satislar  on (musteriler.musteri_id=satislar.musteri_id) inner join  odalar on ( satislar.oda_id=odalar.oda_id)";
     $alinacakveri=$baglanti->query($alinacak);
     if($alinacakveri)
     {
?>
<!--<div class="container">-->
  <h2>SATIŞLAR</h2>                                                                                      
  <!--<div class="table-responsive">  -->    
  <table class="table">
    <thead>
      <tr>
        <th>ADI</th>
        <th>SOYADI</th>
        <th>TC</th>
        <th>ODA-NO</th>
        <th>KİŞİ SAYISI</th>
        <th>GÜN SAYISI</th>
        <th>SATIŞ TUTARI</th>
        <th>ÖDEME</th>
        <th>SATIŞ TİPİ</th>
        <th>GİRİŞ TARİHİ</th>
        <th>ÇIKIŞ TARİHİ</th>
      </tr>
     
    </thead>
    <?php
    $stoplam=0;
     foreach ($alinacakveri as $key => $value) {
        $stoplam=$stoplam+$value['satis_tutari'];
      $duzenle="<a href='main.php?link=8&kno=".$value['musteri_id']."'>Düzenle</a>";
      $sil="<a href='main.php?link=12&kno=".$value['musteri_id']."'>Sil</a>";
?>
    <tbody>
      <tr>
        <td><?php echo $value['adi'];?></td>
        <td><?php echo $value['soyadi'];?></td>
        <td><?php echo $value['tc'];?></td>
        <td><?php echo $value['oda_no'];?></td>
        <td><?php echo $value['kalacak_kisi'];?></td>
        <td><?php echo $value['kalacak_gun'];?></td>
        <td><?php echo $value['satis_tutari'];?></td>
        <td><?php echo $value['odeme'];?></td>
        <td><?php echo $value['satis_tipi'];?></td>
        <td><?php echo $value['gtarih'];?></td>
        <td><?php echo $value['ctarih'];?></td>
        <td><button type="button" class="btn btn-danger"><?php echo $duzenle;?></button></td>
        <td><button type="button" class="btn btn-danger"><?php echo $sil;?></button></td>
      </tr>
       <tr>
        <hr />
      </tr>
     <!-- <tr>
        <td><b>TOPLAM SATIŞ TUTARI</b></td>
      </tr>
      <tr>
       <td colspan='7' align='left'><?/*php echo $stoplam;*/?></td>
      </tr>
    -->
    </tbody>
  </table>
  <!--</div>-->
<!--</div>-->
<?php
    }
    } 
?>
</body>
</html>
