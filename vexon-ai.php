<?php
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$userMessage = $input["message"];

$apiKey = "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";

$data = [
  "model" => "gpt-4o-mini",
  "messages" => [
    ["role" => "system", "content" => "You are VEXON AI, a professional trading mentor teaching SMC, ICT and VEP model in simple Hinglish."],
    ["role" => "user", "content" => $userMessage]
  ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Content-Type: application/json",
  "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
