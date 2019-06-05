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
$response = '';
if(isset($message['text']))
{
	$response = "Ho ricevuto il seguente messaggio di testo: " . $message['text'];
}
elseif(isset($message['audio']))
{
	$response = "Ho ricevuto un messaggio audio";
}
elseif(isset($message['document']))
{
	$response = "Ho ricevuto un messaggio document";
}
elseif(isset($message['photo']))
{
	$response = "Ho ricevuto un messaggio photo";
}
elseif(isset($message['sticker']))
{
	$response = "Ho ricevuto un messaggio sticker";
}
elseif(isset($message['video']))
{
	$response = "Ho ricevuto un messaggio video";
}
elseif(isset($message['voice']))
{
	$response = "Ho ricevuto un messaggio voice";
}
elseif(isset($message['contact']))
{
	$response = "Ho ricevuto un messaggio contact";
}
elseif(isset($message['location']))
{
	$response = "Ho ricevuto un messaggio location";
}
elseif(isset($message['venue']))
{
	$response = "Ho ricevuto un messaggio venue";
}
else
{
	$response = "Ho ricevuto un messaggio ?";
}
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
