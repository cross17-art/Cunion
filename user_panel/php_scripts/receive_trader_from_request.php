<?php
$json = file_get_contents('php://input');
$traderData = json_decode($json);
$supportEmail = "support@cunion.io";
$subject = "New Investor Request";
$msg = json_encode($traderData);
mail($supportEmail, $subject, $msg);
echo json_encode(array("status" => "success", "trader_data" => $traderData));