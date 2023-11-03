<?php
// chatbot.php
$openai_api_key = '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  ';

// Obtén el mensaje del usuario desde la solicitud POST
$user_message = $_POST['message'];

// Prepara los datos para la solicitud a la API de OpenAI
$post_data = [
  'prompt' => $user_message,  // o cualquier contexto necesario
  'max_tokens' => 120  // puedes ajustar esto según sea necesario
];

// Inicializa cURL y envía la solicitud
$ch = curl_init('https://api.openai.com/v1/engines/gpt-3.5-turbo-instruct/completions');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json',
  'Authorization: Bearer ' . $openai_api_key
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decodifica la respuesta JSON y obtiene el mensaje del bot
$response_data = json_decode($response, true);
$bot_message = $response_data['choices'][0]['text'];  // Esto puede variar según la estructura de la respuesta

// Envía el mensaje del bot como respuesta a la solicitud AJAX
echo $bot_message;
?>
