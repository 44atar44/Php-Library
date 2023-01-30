<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <title>Furkan atarla dosya aktarımı </title>
    </head>
    <body>
                <form action="yükle.php" method="POST"  enctype="multipart/form-data">
                    <!-- form icindeki datalar sorvere göndermek için (enctype="multipart/form-data") -->
                        <input type="file" name="yüklenecekDosya" > <br><br>
                        <input type="submit" value="yükle" name="btnYükle">

                </form>
    </body>
</html>