<?php
$latitude = $_POST["lat"];
$longitude = $_POST["long"];
$url = "https://api.openweathermap.org/data/2.5/weather?lat=" . $latitude . "&lon=" . $longitude . "&appid=f402bce671988768fddb242f8dad1a4c&units=metric";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>
