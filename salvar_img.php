<?php

//configura o caminho de salvamento da imagem
$foto = "/home/tassio/www/fotoeventocesjf/imagens/foto.jpg";

//salva a imagem capturada no caminho que foi especificado
file_put_contents($foto, file_get_contents('php://input'));
?>
