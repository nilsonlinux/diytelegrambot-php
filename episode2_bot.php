<?php
$json_raw = file_get_contents("php://input");

$handle = fopen("bot.log","a+");
fwrite($handle,$json_raw . "\n\n");
fclose($handle);

//$json_out = json_decode($json_raw);

$bot_id = "";

$chat_id = "EURE CHAT-ID";

$ch = curl_init("https://api.telegram.org/bot" . $bot_id . "/sendMessage");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$param = array(
 "chat_id" => $chat_id,
 "text" => "Hello World !"
);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

$result = curl_exec($ch);
curl_close($ch);
?>
