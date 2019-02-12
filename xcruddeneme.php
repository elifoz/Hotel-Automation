<?php
    include('xcrud/xcrud.php');
    $xcrud1 = Xcrud::get_instance();
    $xcrud1->table('musteriler','satislar','odalar');
    $xcrud1->columns('adi,soyadi,tc,satis_tutari');
    $xcrud1->unset_edit()->unset_view();
    $xcrud1->hide_button('add');
    echo $xcrud1->render();
     
    /*$xcrud2 = Xcrud::get_instance();
    $xcrud2->table('odalar');
    $xcrud2->fields('oda_no');
    $xcrud2->hide_button('save_return,return,save_edit');
    //$xcrud2->set_lang('save_new','Publish');
    echo $xcrud2->render();

    $xcrud3 = Xcrud::get_instance();
    $xcrud3->table('satislar');
    $xcrud3->fields('satis_tutari,satis_tipi,gtarih,ctarih');
    $xcrud3->hide_button('save_return,return,save_edit');
   // $xcrud3->set_lang('save_new','Publish');
    echo $xcrud3->render();
    */

?>
<script type="text/javascript">
window.onload = function(){
    jQuery(document).on("xcrudafterrequest",function(event,container){
        if(jQuery(container).closest(".xcrud").prevAll(".xcrud").size()){
            Xcrud.reload(".xcrud:first");
        }
    });
}
</script>