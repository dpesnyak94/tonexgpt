<html>
<head>
  <title>ChatGPT API Request</title>
</head>
<body>
  <form action="" method="post">
    <label for="request">Enter your request:</label>
    <input type="text" name="request" id="request" required>
    <input type="submit" name="submit" value="Send Request">
  </form>
  <?php
    if (isset($_POST['submit'])) {
      $request = $_POST['request'];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/engines/chatgpt/jobs");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("prompt" => $request, "max_tokens" => 100)));
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Authorization: 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"
      ));
      $response = curl_exec($ch);
      curl_close($ch);
      $response = json_decode($response, true);
      echo '<p>Response: ' . $response['choices'][0]['text'] . '</p>';
    }
  ?>
</body>
</html>
