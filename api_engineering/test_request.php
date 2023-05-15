<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
echo json_encode(array("foo"=>"bar", "fizz"=>"buzz"));

?>
