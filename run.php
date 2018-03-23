<?php
include '../include/Util.php';
include '../include/Telegram.php';
include 'falas.php';
include '../conexao_bd.php';

$bot_token = 'TOKEN';

$base = new Database();

// Instances the class
$telegram = new Telegram($bot_token);

// Take text and chat_id from the message
$text = $telegram->Text();
$chat_id = $telegram->ChatID();
$message_id = $telegram->MessageID();

$data = $telegram->getData();
$new_user = $data['message']['new_chat_members']['first_name'];
$left_user = $data['message']['left_chat_member']['first_name'];
$replyTo= $data['message']['reply_to_message']['from']['username'];

if (!is_null($text) && !is_null($chat_id)) 
{
	//$base->insert("insert into log_bot(tp_msg,usuario,conteudo,dtlog,origem) values (?,?,?,?,?)",
	//array($telegram->getUpdateType(), $data['message']['from']['username'],$text,date("d.m.Y"),$chat_id));

	if(!empty($new_user))
	{
	   $content = ['chat_id' => $chat_id, 'text' => "Opa! Carne Nova\nFalae ".$new_user,'reply_to_message_id' => $message_id];
	   $telegram->sendMessage($content);
	}
	else if(!empty($left_user))
	{
	   $content = ['chat_id' => $chat_id, 'text' => "R.I.P. ".$left_user,'reply_to_message_id' => $message_id];
	   $telegram->sendMessage($content);
	}
	else
	{
	  $reply = parseResposta($text,$replyTo); 
	  if($reply !== "")
	  { 
		if($reply == "rosca")
		{
			$content = ['chat_id' => $chat_id, 'photo' => 'http://desenvolvendo.com.br/bots/chuca.jpg'];
		$telegram->sendPhoto($content);
		}
		else
		{
		  $content = ['chat_id' => $chat_id, 'text' => $reply,'reply_to_message_id' => $message_id];
		  $telegram->sendMessage($content);
		}
	  }
      if(($text=="/redditsilver")||($text=="!redditsilver"))
       {
            $content = ['chat_id' => $chat_id, 'photo' => 'https://i.imgur.com/f0Iu0xE_d.jpg'];
		$telegram->sendPhoto($content);
        }
	  if(($text=="/redditniobio")||($text=="!redditniobio"))
       {
            $a= array('https://i.imgur.com/JvveVFg.png',"http://desenvolvendo.com.br/bots/1.jpg","http://desenvolvendo.com.br/bots/2.jpg");
			$foto = $a[array_rand($a,1)];
            $content = ['chat_id' => $chat_id, 'photo' => $foto];
		$telegram->sendPhoto($content);
        }
	}
}

?>
