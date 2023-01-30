<?php

if (isset($_POST["btnYükle"]) && $_POST["btnYükle"]=="yükle") {
 
    // echo "<pre>";
    // print_r ($_FILES["yüklenecekDosya"]);

    $geciciKonum = $_FILES["yüklenecekDosya"]["tmp_name"]; //dosyanın geçici konumu 
    $yüklenecekIsim = $_FILES["yüklenecekDosya"]["name"];  //yüklenecek isimi 
    $kaliciKonum ='./yüklenecekYer/';                      //son konumu 
    $kaliciIsim = $kaliciKonum.$yüklenecekIsim;            //uzantisiyla ismi
    if (move_uploaded_file($geciciKonum , $kaliciIsim)) {  // geçici konumdan kalıcı konuma geçiş 
        echo "doya yüklendi";
    }
        else{echo"dosya yüklenemedi";}
}

?>