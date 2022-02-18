<?php

//chama o sdk do facebook
require_once './sdk/facebook.php';

/// Cria a instancia da aplicacao, informando o appid e o secret key
$facebook = new Facebook(array(
    'appId' => '',
    'secret' => ''
        ));
?>
