
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
<h1>api.privatbank.ua</h1>
<body>
<p><?php

    $currency_url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
    $currency = file_get_contents($currency_url);

    $decoded = json_decode($currency, true);

    foreach ($decoded as $key => $value) {
        if ($value['ccy'] == "USD"){
            echo $value['sale'] * 100 , "\n" ;
        }
    }

    ?></p>
</body>
</html>
