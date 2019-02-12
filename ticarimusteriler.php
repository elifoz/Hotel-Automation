<?php
require_once('veritabanibaglantisi.php');
$tcrmusteriler="SELECT musteriler.musteri_id,musteriler.adi,musteriler.soyadi,fatura_bilgileri.firma_adi,fatura_bilgileri.vergi_no,fatura_bilgileri.vergi_dairesi,fatura_bilgileri.fatura_adresi,fatura_islemleri.islem_tarihi,fatura_islemleri.fatura_tutari FROM musteriler inner join fatura_islemleri on(musteriler.musteri_id=fatura_islemleri.musteri_id) inner join fatura_bilgileri on(fatura_islemleri.fatura_id=fatura_bilgileri.fatura_id) order by fatura_islemleri.islem_tarihi desc";
$ticarimusteri=$baglanti->query($tcrmusteriler);
if($ticarimusteri)
     {
echo "<table border='0'>";
	echo "<tr>";
	echo "<td><label>AD</label></td><td><label>SOYAD</label></td><td><label>FİRMA ADI</label></td><td><label>VERGİ-NO</label></td>
	<td><label>VERGİ DAİRESİ</label></td><td><label>FATURA ADRESİ</label></td><td><label>İŞLEM TARİHİ
	</label></td><td><label>FATURA TUTARI</label></td>";
	echo"</tr>";
	echo"<tr> <hr/> </tr>";
	$stoplam=0;
	 foreach ($ticarimusteri as $key => $value) {
     		$stoplam=$stoplam+$value['fatura_tutari'];
			$duzenle="<a href='main.php?link=20&kno=".$value['musteri_id']."'>Düzenle</a>";
			$sil="<a href='main.php?link=21&kno=".$value['musteri_id']."'>Sil</a>";
				echo "<tr>";
				echo "<td>".$value['adi']."</td><td>".$value['soyadi']."</td><td>".$value['firma_adi']."</td><td>".$value['vergi_no']."</td><td>".$value['vergi_dairesi']."</td><td>".$value['fatura_adresi']."</td><td>"
				.$value['islem_tarihi']."</td><td>".$value['fatura_tutari']."</td><td><button>".$duzenle."</button></td><td><button>".$sil."</button></td>";
			    echo "</tr>";
			    

			}
			//echo "<tr><td colspan='8' align='right'>".$stoplam."</td></tr>";
				echo "</table>";
				 echo"<tr><hr/><tr>";
		}
     

?>