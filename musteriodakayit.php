
<?php
  if(!isset($_SESSION)) {
     session_start();
                        }
    $kullanici_id=$_SESSION['kullanici_id'];
  header('Content-type: text/html; charset=utf-8');
  require_once("veritabanibaglantisi.php");
    $sorgumo="SELECT * from odalar where odadurumu='Boş'|| odadurumu='boş' || odadurumu='' ";
    $sco=$baglanti->query($sorgumo); 
?>
<body>
    <h2>KAYIT VE REZERVASYON SAYFASINA HOŞGELDİNİZ!</h2>
<form id="ekle" name="ekle" method="post" >
    <table border="0">
    <tr>
    	<td><label for="madi">Adı:</label></td>
      <td><input type="text" class="ilkharf" name="madi" required="required" ></td>
    </tr>
    <tr>
    	<td><label for="msoyadi">Soyadı: </label></td>
      <td> <input type="text" class="ilkharf" name="msoyadi" required="required"></td>
    </tr>
    <tr>
    	<td><label for="me_posta">E-Posta: </label></td>
      <td> <input type="text" name="me_posta" ></td>
    </tr>
    <tr>
    	<td><label for="mtc">TC: </label></td>
      <td> <input type="text" name="mtc" required="required" ></td>
    </tr>
    <tr>
    	<td><label for="mtel_no">Telefon: </label></td>
      <td> <input type="text" name="mtel_no" required="required" ></td>
    </tr>
    <tr>
    	<td><label for="madres">Adres: </label></td>
      <td><textarea name="madres" class="ilkharf"  cols="50" rows="5"></textarea></td></td>
    </tr>
    <tr>
      <td><label for="mmeslegi">Meslek: </label></td>
      <td> <input type="text" class="ilkharf"  name="mmeslegi" ></td>
    </tr>
    <tr>
      <td>Satış Tipini Seçiniz</td>
      <td>
        <select name="satis_tipi" required="required">
          <option value="seçim">seçim yapınız</option>
          <option value="Rezervasyon">Rezervasyon</option>
          <option value="Kesin Kayıt">Kesin Kayıt</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Oda Seçiniz</td> 
      <td>
        <select name="odano" required="required">
          <option value="-1">Seçim yapınız</option>
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
      <td> <input type="text" name="topfiyat" ></td>
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
      <td><input type="text" class="ilkharf"  name="odaaciklama"></td>
    </tr>
  <form action="demo_form.php">
    <tr>
      <td><label for="gtarih">Giriş Tarihi:</label></td>
      <td><input type="date" name="gtarih" required="required"></td>
    </tr>
  <form action="demo_form.php">
    <tr>
      <td><label for="ctarih">Çıkış Tarihi:</label></td>
      <td><input type="date" name="ctarih" required="required"></td>
    </tr>
  </form>
    </table>
      <p>
        <input type="submit" name="ekle"  value=" SATIŞ YAP" id="ekle2">
      </p>
</form>
<?php
  if(isset($_REQUEST["ekle"]))
  {
          $madi=$_REQUEST["madi"];
          $msoyadi=$_REQUEST["msoyadi"];
          $me_posta=$_REQUEST["me_posta"];
          $mtc=$_REQUEST["mtc"];
          $mtel_no=$_REQUEST["mtel_no"];
          $madres=$_REQUEST["madres"];
          $mmeslegi=$_REQUEST["mmeslegi"];
          $aciklama=$_REQUEST['odaaciklama'];
          $kalacak_kisi=$_REQUEST['kalacak_kisi'];
          $kalinacak_gun=$_REQUEST['kalinacak_gun'];
          $topfiyat=$_REQUEST['topfiyat'];
          $odeme=$_REQUEST['odeme'];
          $satis_tipi=$_REQUEST['satis_tipi'];
          $gtarih=$_REQUEST['gtarih'];
          $ctarih=$_REQUEST['ctarih'];
          $odano=$_REQUEST['odano'];
?>
<?php
        $sorgu1="INSERT INTO musteriler (adi,soyadi,e_posta,tc,tel_no,adres,meslegi) 
                values('$madi','$msoyadi','$me_posta','$mtc','$mtel_no','$madres','$mmeslegi')";
          $sorgu_calistir1=$baglanti->query($sorgu1);
          $sonid=$baglanti->lastInsertId();
          $sorgu2="INSERT INTO satislar(musteri_id,oda_id,kalacak_kisi,kalacak_gun,satis_tutari,odeme, gtarih,ctarih,aciklama,satis_tipi)
                                values('$sonid','$odano','$kalacak_kisi','$kalinacak_gun','$topfiyat','$odeme','$gtarih', '$ctarih','$aciklama',
          '$satis_tipi')";
          $sorgu_calistir2=$baglanti->query($sorgu2);
          $lastid=$baglanti->lastInsertId();
          $sorgu3="UPDATE odalar set odadurumu='$satis_tipi' where oda_id=$odano";
          $sorgu_calistir3=$baglanti->query($sorgu3);
          $sorgukntrl="SELECT * from odalar where oda_id='$odano'";
          $srg=$baglanti->query($sorgukntrl);
              foreach ($srg as $key => $value) {
          $odanumara=$value['oda_no'];
               }
                $sorgu4="INSERT INTO odaislem(satis_id,oda_id,oda_no,kul_id,btarih,ctarih)
                                  values('$lastid','$odano','$odanumara','$kullanici_id','$gtarih','$ctarih')";
          $sorgu_calistir4=$baglanti->query($sorgu4);
                if ($sorgu_calistir1==true and $sorgu_calistir2==true and $sorgu_calistir3 and  $sorgu_calistir4)
        {
          echo "<h6>SATIŞ İŞLEMİ KAYDEDİLDİ</h6>".'<img src="img/if_ok_61805.png" align="center">';
          $fatura="<a href='main.php?link=14&kno=".$sonid."&islemtarihi=".$gtarih."&faturatutar=".$topfiyat."' style='color:blue'>FATURA İŞLEMi İÇİN TIKLAYINIZ</a>";
         echo $fatura;
        } 
        /*else{
           echo "SATIŞ İŞLEMİ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
            }*/
  }
?>
