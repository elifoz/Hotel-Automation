<?php
require_once('veritabanibaglantisi.php');
require_once('sorgular.php');

   $alinacak="SELECT * from odalar order by oda_no asc";

     $alinacakveri=$baglanti->query($alinacak);
     if($alinacakveri)
     {
echo "<table border='0'>";
	echo "<tr>";
	echo "<td><label> ODA-NO </label></td><td><label> AÇIKLAMA</label></td><td><label>ODA KAPASİTESİ</label></td><td><label>ODA DURUMU</label></td>";
	echo"</tr>";
	 echo"<tr> <hr/> </tr>";

	//$stoplam=0;
     foreach ($alinacakveri as $key => $value) {
     		//$stoplam=$stoplam+$value['satis_tutari'];
			//$duzenle="<a href='main.php?link=8&kno=".$value['musteri_id']."'>Düzenle</a>";
			//$sil="<a href='main.php?link=12&kno=".$value['musteri_id']."'>Sil</a>";
				echo "<tr>";
				echo "<td>".$value['oda_no']."</td><td>".$value['aciklama']."</td><td>".$value['oda_kapasitesi']."</td><td>".$value['odadurumu']."</td>";
			    echo "</tr>";
			   
        
     
			}
			/*echo "<tr><td colspan='7' align='right'>".$stoplam."</td></tr>";*/
				echo "</table>";
				 echo"<tr><hr /><tr>";
		}