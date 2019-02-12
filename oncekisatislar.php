<?php
require_once("veritabanibaglantisi.php");
require_once("sorgular.php");
	$gelenmusteri=@$_REQUEST['kno'];
	$alinacak="SELECT musteriler.adi,musteriler.soyadi,musteriler.tc ,odalar.oda_no,satislar.kalacak_kisi,satislar.kalacak_gun,satislar.satis_tutari,satislar.gtarih,satislar.ctarih from musteriler inner join satislar on(musteriler.musteri_id=satislar.musteri_id) inner join odalar on(satislar.oda_id=odalar.oda_id) where musteriler.musteri_id='$gelenmusteri' order by satislar.ctarih desc";
	$alinacakveri=$baglanti->query($alinacak);
 		if($alinacakveri)
     {
	echo "<table border='0'>";
	echo "<tr>";
	echo "<td><label>AD</label></td><td><label>SOYAD</label></td><td><label>TC</label></td><td><label>ODA-NO</label></td><td><label>KALAN KİŞİ</label></td><td><label>KALINAN GÜN</label></td><td><label>SATIŞ TUTARI
	</label></td><td><label>GİRİŞ TARİHİ</label></td><td><label>ÇIKIŞ TARİHİ</label></td>";
	echo"</tr>";
	echo"<tr> <hr/> </tr>";
	foreach ($alinacakveri as $key => $value) {
				echo "<tr>";
				echo "<td>".$value['adi']."</td><td>".$value['soyadi']."</td><td>".$value['tc']."</td><td>".$value['oda_no']."</td><td>".$value['kalacak_kisi']."</td><td>".$value['kalacak_gun']."</td><td>"
				.$value['satis_tutari']."</td><td>".$value['gtarih']."</td><td>".$value['ctarih']."</td>";
			    echo "</tr>";
			}
				echo "</table>";
				echo"<tr> <hr/> </tr>";
		}
?>