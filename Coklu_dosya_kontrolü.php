<?php


    if(isset($_POST["btnUpload"]) && $_POST["btnUpload"] == "Upload") {
       
        $dosya_adeti = count($_FILES["fileToUpload"]["name"]);
        $maxFileSize = (1024 * 1024) * 1;
        $fileTypes = array(
            "image/png",
            "image/jpg",
            "image/jpeg"
        );

        if($dosya_adeti>3) {
            die("en fazla 3 dosya yükleyebilirsiniz.");
        }

        for($x=0;$x<$dosya_adeti;$x++) {
            $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"][$x];
            $fileName = $_FILES["fileToUpload"]["name"][$x];
            $fileSize = $_FILES["fileToUpload"]["size"][$x];
            $fileType = $_FILES["fileToUpload"]["type"][$x]; # image/jpeg

            if(in_array($fileType, $fileTypes)) {

                if($fileSize > $maxFileSize) {
                    echo "dosyanın boyutu maksimum 1 mb olabilir.";
                } else {

                    $dosyaAdi_Arr = explode('.', $fileName);
                    $dosyaAdi_uzantisiz = $dosyaAdi_Arr[0];
                    $dosya_uzantisi = $dosyaAdi_Arr[1];

                    $yeniDosyaAdi = md5(rand(0,9999999)).'.'.$dosya_uzantisi;

                    $dest_path = "images/".$yeniDosyaAdi;

                    if(move_uploaded_file($fileTmpPath, $dest_path)) {
                        echo $yeniDosyaAdi." dosyası yüklendi.<br>";
                    } else {
                        echo $yeniDosyaAdi." dosyası yüklenemedi";
                    }
                }

             

            } else {
                echo "dosya uzantısı kabul edilmiyor.";
                echo "kabul edilen dosya tipleri: ".implode(", ", $fileTypes);
            }

        }
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form  method="POST" enctype="multipart/form-data">    
        <input type="file" multiple="multiple" name="fileToUpload[]">
        <input type="submit" value="Upload" name="btnUpload">
    </form>


</body>
</html>