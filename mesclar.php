<?php

// Abre imagem 1
$img1 = imagecreatefromjpeg('/home/tassio/www/fotoeventocesjf/img/Frame-photo.jpg');

// Abre imagem 2
$img2 = imagecreatefromjpeg('/home/tassio/www/fotoeventocesjf/imagens/foto.jpg');

// Insere imagem 2 na 1
imagecopy($img1, $img2, 40, 40, 0, 0, imagesx($img2), imagesy($img2));

//inserre o texto na imagem
//Definir cor
//$cor = imagecolorallocate($img1, 255, 255, 255);
//Escrever nome
//imagettftext($img1, 14, 0, 750, 550, $cor, "img/GROBOLD.ttf", "www.photototem.com.br");
//
//gera o nome da imagem
$name = date('YmdHis');

//configura o caminho de salvamento da imagem
$newname = "/home/tassio/www/fotoeventocesjf/imagens/" . $name . ".jpg";

//salva a imagem
imagejpeg($img1, $newname);

// Destroi as imagens
imageDestroy($img1);
imageDestroy($img2);

//redireciona para a pagina de envio com a foto que deve ser chamada
header("location: login.php?foto=" . $name . ".jpg");
?>