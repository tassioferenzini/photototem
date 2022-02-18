<?
//verifica a existencia do arquivo foto
if (file_exists("/home/tassio/www/fotoeventocesjf/imagens/foto.jpg")) {
    //remove o arquivo do servidor
    unlink("/home/tassio/www/fotoeventocesjf/imagens/foto.jpg");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Photo Totem</title>
        <script type="text/javascript" src="webcam.js"></script>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
    <center>
        <br/>
        <div id="msg"></div><br/>
        <script language="JavaScript">
            document.write(webcam.get_html(885, 520));
        </script>
        <form>
            <!--input type="button" class="botao2" value="" onClick="webcam.configure()"-->
            &nbsp;&nbsp;
            <input type="button" class="botao" value="" onClick="fotografar();">
        </form>
        <div id="cronometro"></div>
    </center>
    <script language="JavaScript">
            webcam.set_api_url('salvar_img.php');
            webcam.set_quality(75); // JPEG quality (1 - 100)
            webcam.set_shutter_sound(false); // play shutter click sound
            webcam.set_hook('onComplete');

            var i = 6; // segundos
            function contagemRegressiva() {
                if (i === 0) {
                    document.getElementById('cronometro').innerHTML = '';
                    take_snapshot();
                } else {
                    i--;
                    document.getElementById('cronometro').innerHTML = i;
                }
            }

            function fotografar() {
                if (i !== 0) {
                    intervalo = setInterval("contagemRegressiva()", 1000);
                }
                else {
                    clearInterval(intervalo);
                    var i = 1; // segundos
                }
            }

            function take_snapshot() {
                // take snapshot and upload to server
                webcam.snap();
                document.getElementById('msg').innerHTML = "";
                window.setTimeout("location.href='mesclar.php'", 2000);
            }
    </script>
</body>
</html>
