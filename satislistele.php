<?php
require_once('veritabanibaglantisi.php');
require_once('sorgular.php');

   $alinacak="SELECT musteriler.musteri_id,musteriler.adi,musteriler.soyadi,musteriler.tc,odalar.oda_no,satislar.kalacak_kisi,satislar.kalacak_gun,satislar.satis_tutari,satislar.odeme,satislar.satis_tipi, satislar.gtarih,satislar.ctarih from  musteriler inner join satislar  on (musteriler.musteri_id=satislar.musteri_id) inner join  odalar on ( satislar.oda_id=odalar.oda_id) order by satislar.ctarih desc";

     $alinacakveri=$baglanti->query($alinacak);
     if($alinacakveri)
     {
echo "<table border='0'>";
	echo "<tr>";
	echo "<td><label> AD </label></td><td><label> SOYAD </label></td><td><label>TC</label></td><td><label>ODA-NO</label></td>
	<td><label>KİŞİ SAYISI</label></td><td><label>GÜN SAYISI</label></td><td><label>SATIŞ TUTARI
	</label></td><td><label>ÖDEME</label></td><td><label>SATIŞ TİPİ</label></td><td><label>GİRİŞ TARİHİ</label></td><td><label>ÇIKIŞ TARİHİ</label></td>";
	echo"</tr>";
	 echo"<tr> <hr/> </tr>";

	$stoplam=0;
     foreach ($alinacakveri as $key => $value) {
     		$stoplam=$stoplam+$value['satis_tutari'];
			$duzenle="<a href='main.php?link=8&kno=".$value['musteri_id']."'>Düzenle</a>";
			$sil="<a href='main.php?link=12&kno=".$value['musteri_id']."'>Sil</a>";
				echo "<tr>";
				echo "<td>".$value['adi']."</td><td>".$value['soyadi']."</td><td>".$value['tc']."</td><td>".$value['oda_no']."</td><td>".$value['kalacak_kisi']."</td><td>".$value['kalacak_gun']."</td><td>"
				.$value['satis_tutari']."</td><td>".$value['odeme']."</td><td>".$value['satis_tipi']."</td><td>".$value['gtarih']."</td><td>".$value['ctarih']."</td><td><button>".$duzenle."</button></td><td><button>".$sil."</button></td>";
			    echo "</tr>";
			   
        
     
			}
			/*echo "<tr><td colspan='7' align='right'>".$stoplam."</td></tr>";*/
				echo "</table>";
				 echo"<tr><hr /><tr>";
		}
     
  
/*$satislistele="SELECT * FROM satislar ";
$listele=$baglanti->query($satislistele);
if($listele)
{

	echo "<table border='1'>";
	echo "<tr>";
	echo "<td><label>AD</label></td><td><label>SOYAD</label></td><td><label>TC</label></td><td><label>ODA-NO</label></td><td><label>SATIŞ TUTARI
	</label></td><td><label>GİRİŞ TARİHİ</label></td><td><label>ÇIKIŞ TARİHİ</label></td>";
	echo"</tr>";
	foreach ($listele as $key => $value) {

			//$odasec="<a href='main.php?link=7&kno=".$value['musteri_id']."'>Oda Satışı</a>";


				
		}
}
*/


?>