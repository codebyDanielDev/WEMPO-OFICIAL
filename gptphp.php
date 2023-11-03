<?php

$openaiApiKey = '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';
$gpt4Response = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userInput'])) {
    $userInput = $_POST['userInput'];
    $gpt4Response = chatWithGpt4($userInput);
}

function chatWithGpt4($prompt) {
    global $openaiApiKey;

    $messages = [
        ["role" => "system", "content" => "You are a helpful assistant."],
        ["role" => "user", "content" => $prompt]
    ];

    $payload = [
        "model" => "gpt-4",
        "messages" => $messages
    ];

    $ch = curl_init('https://api.openai.com/v1/engines/gpt-4/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $openaiApiKey,
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    $responseDecoded = json_decode($response, true);

    curl_close($ch);

    if (isset($responseDecoded['choices'][0]['message']['content'])) {
        return $responseDecoded['choices'][0]['message']['content'];
    } else {
        return 'Error en la respuesta de la API. Por favor, verifica las credenciales y la URL.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>GPT-4 Chat</title>
</head>
<body>

<form method="post">
    <label>Tú:</label>
    <input type="text" name="userInput">
    <input type="submit" value="Enviar">
</form>

<?php
if (!empty($gpt4Response)) {
    echo "GPT-4: " . $gpt4Response;
}
?>

</body>
</html>
