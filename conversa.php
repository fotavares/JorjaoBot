<?php
/**
 * Telegram Bot example.
 *
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 */
include '../include/Util.php';
include '../include/Telegram.php';

include 'config.php';

// Instances the class
$telegram = new Telegram($bot_token);


if(isset($_POST["msg"]))
{
	   $content = ['chat_id' => -69499318, 'text' => $_POST["msg"]];
	   $telegram->sendMessage($content);
}
	    
if(isset($_POST["foto"]))
{
	   $content = ['chat_id' => -69499318, 'photo' => $_POST["foto"]];
	   $telegram->sendPhoto($content);

}
?>
/r/brasil
<form method="POST">Texto
<input type="text" name="msg">
<input type="submit">
</form>

<form method="POST" >URL Imagem
<input type="text" name="foto">
<input type="submit">
</form>