<?php
header('Content-type: text/html; charset=utf-8');
require_once("veritabanibaglantisi.php");
	 $musteri_id=$_REQUEST['musteri_id'];
 	$firmafatura_id=$_REQUEST['kno'];
 	$islem_tarihi=$_REQUEST['islemtarihi'];
 	$fatura_tutar=$_REQUEST['faturatutar'];
           	$sorgu="INSERT INTO fatura_islemleri(musteri_id,fatura_id,islem_tarihi,fatura_tutari)
                                values('$musteri_id','$firmafatura_id','$islem_tarihi','$fatura_tutar')";
            $sorgula=$baglanti->query($sorgu);	
            	if($sorgula)	
		            {
		            	 echo "<h6>SEÇİM İŞLEMİ BAŞARIYLA KAYDEDİLDİ</h6>".'<img src="img/if_ok_61805.png">';
		            }
		    	else
				    {
                        echo "İŞLEMİNİZ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
				    }	           
?>