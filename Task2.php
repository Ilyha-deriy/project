
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>  p {
            font-size: 20pt;
        }
    </style>
</head>
<h1>Банкоматы Никополя</h1>
<body>
<p><?php

    $currency_url = "https://api.privatbank.ua/p24api/infrastructure?json&atm&address=&city=Никополь";
    $currency = file_get_contents($currency_url);


    $decoded = json_decode($currency, true);

    foreach ($decoded['devices'] as $key => $value) {
        echo $value['fullAddressRu'], "\n";
    }
    ?></p>
</body>
</html>
