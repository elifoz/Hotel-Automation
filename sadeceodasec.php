
<?php
if(!isset($_SESSION)) {
     session_start();
}
$kullanici_id= $_SESSION['kullanici_id'];
require_once("veritabanibaglantisi.php");
$gelenkayit=@$_REQUEST['kno'];
$sorgu="SELECT * from musteriler where musteri_id= '$gelenkayit'";
$sorgumo="SELECT * from odalar where odadurumu='Boş'|| odadurumu='boş' || odadurumu=''";
$sco=$baglanti->query($sorgumo);
$sc=$baglanti->query($sorgu);
	?>
<body>
  <form id="odasectirme" name="odasectirme" method="POST">
    <table>
	<?php 
     foreach ($sc as $key => $value) {
	?>
	<table border="0">
    <tr>
    	<td><label for="madi">Adı: </label></td>
 <td> <?php echo $value['adi'];?></td>
    </tr>
    <tr>
    	<td><label for="msoyadi">Soyadı: </label></td>
<td><?php echo $value['soyadi'];?></td>
    </tr>
    <tr>
    	<td><label for="mtc">TC: </label></td>
<td><?php echo $value['tc'];?></td>
    </tr>
    <tr>
    	<td><label for="mtel_no">Telefon: </label></td>
<td> <?php echo $value['tel_no'];?></td>
    </tr>
    <?php
}
?>
     <tr>
      <td>Satış Tipini Seçiniz</td>
      <td>
        <select name="satis_tipi" id="satis_tipi" required="required" >
         <option value="">Seçim Yapınız</option>
           <option value="Rezervasyon">Rezervasyon</option>
            <option value="Kesin Kayıt">Kesin Kayıt</option>
          </select>
        </td>
      </tr>
	 <tr>
        <td>Oda Seçiniz</td> 
        <td>
     <select name="odano" id="odano" required="required">
       <option value="">Seçim Yapınız</option>
     <?php 
       foreach($sco as $odalar=>$odabil){
       ?>
     
    
       <option value="<?php echo $odabil['oda_id'];?>"><?php echo $odabil['oda_no'];?></option>
      <?php
  }
      ?>
      </select>
  </td>
     </tr>
      <tr>
        <td><label for="kalacakkisi">Kalacak Kişi Sayısı:</label></td>
        <td> <input type="text" name="kalacak_kisi" required="required"></td>
    </tr>
     <tr>
        <td><label for="kalinacakgun">Kalınacak Gün Sayısı:</label></td>
        <td> <input type="text" name="kalinacak_gun" required="required"></td>
    </tr>
    <tr>
        <td><label for="topfiyat">Toplam Fiyatı Giriniz:</label></td>
        <td> <input type="text" name="topfiyat"></td>
    </tr>
    <tr>
        <td><label for ="odeme">Ödeme Seçeneği:</label></td>
        <td>
          <input type="radio" name="odeme" value="nakit" required="required">NAKİT</input>
        <input type="radio" name="odeme" value="visa" required="required">VİSA</input>
      </td>
    </tr>
    <tr>
        <td><label for="aciklama">Açıklama:</label></td>
        <td> <input type="text" class="ilkharf" name="odaaciklama" id="odaaciklama"></td>
    </tr>
  <form action="demo_form.php">
  <tr>
       <td><label for="aciklama">Giriş Tarihi:</label></td>
    <td><input type="date" name="gtarih" id="gtarih" required="required"></td>
  </tr>
  <form action="demo_form.php">
  <tr>
       <td><label for="aciklama">Çıkış Tarihi:</label></td>
    <td><input type="date" name="ctarih" id="starih" required="required"></td>
  </tr>
</form>
</table>
  </form>
<p>
	<input type="hidden" value="<?php echo $gelenkayit;  ?>" name="kontrol"/>
	  <input type="submit" name="odasec" value="ODA SATIŞI" id="odasec">
</p>




      

<?php
if(isset($_REQUEST["odasec"]))
  {     $kno=@$_REQUEST['kno'];
        $aciklama=$_REQUEST["odaaciklama"];
        $odano=$_REQUEST["odano"];
        $kalacak_kisi=$_REQUEST['kalacak_kisi'];
        $kalinacak_gun=$_REQUEST['kalinacak_gun'];
        $odeme=$_REQUEST['odeme'];
        $k=$_REQUEST["kontrol"];
        $ctarih=$_REQUEST["ctarih"];
         $gtarih=$_REQUEST["gtarih"];
        $topfiyat=$_REQUEST['topfiyat'];
        $satis_tipi=$_REQUEST["satis_tipi"];
            $musteriekleme="INSERT INTO satislar(musteri_id,oda_id,kalacak_kisi,kalacak_gun,satis_tutari,odeme, gtarih,ctarih,satis_tipi,aciklama)
                values('$k','$odano','$kalacak_kisi','$kalinacak_gun','$topfiyat','$odeme','$gtarih','$ctarih',
                '$satis_tipi','$aciklama')";
        $sorgu_calistir=$baglanti->query($musteriekleme); 
        $lastid=$baglanti->lastInsertId();
        $guncelle="UPDATE odalar set odadurumu='$satis_tipi' where oda_id=$odano";
                $guncelleniyor=$baglanti->query($guncelle);
                $sorgukntrl="SELECT * from odalar where oda_id='$odano'";
                $srg=$baglanti->query($sorgukntrl);
               foreach ($srg as $key => $value) {
                 $odanumara=$value['oda_no'];
               }
        $odaislem="INSERT INTO odaislem(
        satis_id,oda_id,oda_no,kul_id,btarih,ctarih)
        values('$lastid','$odano','$odanumara','$kullanici_id','$gtarih','$ctarih')";
        $sorgu_calistir2=$baglanti->query($odaislem);
        if ($sorgu_calistir and $guncelleniyor and $srg and $sorgu_calistir2)
        {
          ?>
          <p><?php echo "<h5>SATIŞ İŞLEMİ BAŞARIYLA GERÇEKLEŞTİRİLDİ</h5>".'<img src="img/if_ok_61805.png" align="center">';?></p>
          <?php
          $fatura="<a href='main.php?link=14&kno=".$gelenkayit."&islemtarihi=".$gtarih."&faturatutar=".$topfiyat."' style='color:blue'>FATURA İŞLEMi İÇİN TIKLAYINIZ</a>";
            echo $fatura; 
        }
        else{
           echo "İŞLEMİNİZ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
        }
 
  } 
  ?>
 
