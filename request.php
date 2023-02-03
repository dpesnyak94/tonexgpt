<?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $request = $_POST["request"];
    // code to send request to chatGPT api
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/engines/chatbot/jobs");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("text" => $request)));
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = array();
    $headers[] = "Content-Type: application/json";
    $headers[] = "Authorization: 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";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);
    $response = json_decode($result, true)['choices'][0]['text'];
    echo $response;
  }
?>
