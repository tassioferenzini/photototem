<?php

require_once './fbconfig.php';

//pega a foto que foi tirada
$foto = $_GET['foto'];

// usuario nao logado, solicitar autenticacao e informa apgina que deve ser retornada apos autenticação
$loginUrl = $facebook->getLoginUrl(array('redirect_uri' => 'http://tassio.eti.br/fotoeventocesjf/enviar.php?foto=' . $foto));

//cria o titulo da pagina
echo '<title>Photo Totem</title>';
echo '<header>';
//chama a folha de estilo
echo '<link rel="stylesheet" href="estilo.css">';
echo '</header>';
//alinha a imagem e o botao centralizado
echo '<center>';
echo '<img id="foto" src="imagens/' . $foto . '" />';
echo "<a href=" . $loginUrl . "><img class='botaoface' src='img/Loginface.png' alt='Login do Facebook'><br />";
echo '</center>';
?>