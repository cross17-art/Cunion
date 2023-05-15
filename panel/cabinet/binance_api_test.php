<?php
require ("classes/php-binance-api.php");

$api = new Binance\API("aFo9VZjMe7eNi9jMflRhlOcP4pRN5wU5mXk9kd7AxoXxUUAzft7iIRbg7jVtn3Hd", "jMYcpLdi0JuRb3GbLW5EEwWQzcn1P8fapJaDLfj8s1X1Ux3Ok66FHKawUK03wjaD");


// Get latest price of all symbols
$trades = $api->aggTrades("BTCUSDT");
print_r($trades);

?>