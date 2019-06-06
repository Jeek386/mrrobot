<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao") #test
{
	$response = "Ciao $firstname, benvenuto!";
	or
	$response = "Ciao $firstname, bentornato!";
}
elseif($text=="come mi chiamo?")
{
	$response = "Il tuo nome è $firstname";
}
elseif($text=="indirizzo repo interporto")
{
	$response = "Da Explorer recarsi nel percorso di rete \\\yoox.net\yhelpdesk\HelpdeskITA\Interporto\HD";
}
else
{
	$response = "Giovanni non essere precipitoso è solo una beta...";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
