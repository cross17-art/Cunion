<?php

$json = file_get_contents('php://input');

$traderData = json_decode($json);

$supportEmail = "wyde90@gmail.com";
//$subject = "New Investor Request";
//$msg = json_encode($traderData);
mail($supportEmail, "test email from cunion", "msg");
echo json_encode(array("status" => "success", "trader_data" => $traderData));