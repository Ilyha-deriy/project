<?php

function get_api_data() {
    $currency_url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
    $currency = file_get_contents($currency_url);
    $decoded = json_decode($currency, true);
    foreach ($decoded as $key => $value) {
        if ($value['ccy'] == "USD"){
            $rate = $value['sale'];
        }
    }
    return $rate;
}

$rate = 0;
if (($file = fopen("currency.csv", "r")) != FALSE) {
    $arr = fgetcsv($file, 1000, ',');
    fclose($file);
}

if (!$arr){
    echo "ENTER here";
    $rate = get_api_data();
    echo $rate * 100;
    $arr[0] = date('Y-m-d');
    $arr[1] = $rate;

    $file = fopen("currency.csv", "w");
    fputcsv($file, $arr);
    fclose($file);

} else {

    $time_now_unix = strtotime(date('Y-m-d'));
    $date_input_unix = strtotime($arr[0]);
    if ($time_now_unix > $date_input_unix){
        echo "ENTER date >";
        $rate = get_api_data();
        echo $rate * 100;

        $arr[0] = date('Y-m-d');
        $arr[1] = $rate;
        $file = fopen("currency.csv", "w");
        fputcsv($file, $arr);
        fclose($file);
    } else {
        echo "ENTER date =====";
        $rate = $arr[1];
        echo $rate * 100;
    }
}






?>