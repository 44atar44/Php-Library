
<?php

if (isset($_POST["btnYükle"]) && $_POST["btnYükle"]=="yükle") {

$yükle=1;
$geciciKonum = $_FILES["yüklenecekDosya"]["tmp_name"]; //dosyanın geçici konumu 
$yüklenecekIsim = $_FILES["yüklenecekDosya"]["name"];  //yüklenecek isimi 
$yüklenebilirDosyalar =array('jpg','jpeg','gif','png','raw','webp');

    # dosya seçilmişmi
    if (empty($yüklenecekIsim)) { 
        echo "boş dosya yüklenemez "."<br>";
        $yükle=0;
    }  
    
    # dosya boyutu kontrolü
    $dosyaBoyutu =  $_FILES["yüklenecekDosya"]["size"];
    if ($dosyaBoyutu > 1000000) {//1 mb üztü yüklenemez 
       echo "dosya boyutu 1 mb den fazla olamaz ";
       $yükle=0;
    } 
    # dosya uzantısı kontrolü
    $dosyaAdi_Arr=explode(".",$yüklenecekIsim);
    $dosyaAdi_uzantisiz = $dosyaAdi_Arr[0];
    $dosyaAdi_uzantisi = $dosyaAdi_Arr[1];
    if (!in_array($dosyaAdi_uzantisi,$yüklenebilirDosyalar)) {
      echo "yüklenebilir uzantılar :".implode(',',$yüklenebilirDosyalar);
      $yükle=0;
    }
    # dosya Adı kontrlu
    $randomDosyaAdı = md5(time().$dosyaAdi_uzantisiz).'.'.$dosyaAdi_uzantisi;

$kaliciKonum ='./yüklenecekYer/';           //son konumu 
$kaliciIsim = $kaliciKonum.$randomDosyaAdı; //uzantisiyla ismi

    if ($yükle==0) {
        echo"dosya yüklenemedi"; 
    }
    else {
                if (move_uploaded_file($geciciKonum , $kaliciIsim)) { 
                    // geçici konumdan kalıcı konuma geçiş 
                    echo "doya yüklendi";
                }
                    else{echo"hata";}
                }
        
}

?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <title>Furkan atarla dosya aktarımı </title>
    </head>
    <body>
                <form action="index.php" method="POST"  enctype="multipart/form-data">
                    <!-- form icindeki datalar sorvere göndermek için (enctype="multipart/form-data") -->
                        <input type="file" name="yüklenecekDosya" > <br><br>
                        <input type="submit" value="yükle" name="btnYükle">

                </form>
    </body>
</html>