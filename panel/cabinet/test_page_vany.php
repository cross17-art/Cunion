<?php
?>
<html>
<body style="">
<!--<img style="width: 100%;height: 100%;" src="/../img/telegram/img.png" >-->

<?php
$str = "1234567891234589@gmaio.com";
$log = explode("@",$str);
$count = (int)(strlen($log[0])/3);
$count2=$count+$count;



$new_str ="";



for($i = 0;$i<(int)(strlen($log[0]));$i++){

    if($count<$i && $count2>=$i){
        $log[0][$i]="*";
    }
}


var_dump($log[0]);



?>


</body>
</html>
