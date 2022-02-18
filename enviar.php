<?php

//chama as configurações do facebook
require_once './fbconfig.php';

//pega a foto que foi capturada
$foto = $_GET['foto'];

//mensagem que aparecera na foto
$mensagem_do_evento = "VESTIBULAR CES/JF 2014 - tem um curso que é a sua cara!";

// habilita suporte para upload de arquivos
$facebook->setFileUploadSupport(true);

//configura o tratamento de exceção
try {
    // verifica se o usuario permitiou o aplicativo publicar fotos em seu perfil
    $permissions = $facebook->api("/me/permissions");
    if (!array_key_exists('publish_stream', $permissions['data'][0])) {
        header('Location: ' . $facebook->getLoginUrl(array('scope' => 'publish_stream')));
        exit;
    }

    // dados para envio da publicacao da foto
    $post_data = array(
        "message" => $mensagem_do_evento,
        "image" => '@' . realpath('imagens/' . $foto), // localizacao da foto
    );

    // publica foto na timeline
    $data['photo'] = $facebook->api("/me/photos", "post", $post_data);
    //caso ocorra erro
} catch (FacebookApiException $e) {
// tratamento de excecao
    echo($e);
}
//exibi o botão para deslogar o usuario e voltar a pagina inicial
$logoutUrl = $facebook->getLogoutUrl(array('next' => 'http://tassio.eti.br/fotoeventocesjf/index.php'));
echo '<span style="position:relative; top:0px; left:42%;font-size: 40px; font:bold;">Foto publicada!</span><br/>';
echo "<a href=" . $logoutUrl . "><img src='img/Voltar.png' alt='Nova foto' title='Nova foto' style='position:relative; top:10px; left:45%;'>";
?>
