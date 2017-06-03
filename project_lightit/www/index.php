<?php
$h=date("H");
$i=date("i");

if(($h==1)||($h==21))
	$hs = 'час';
elseif(($h<=4)||($h>=22))
	$hs = 'часа';
else $hs = 'часов';

if($i < 10)
	$i0=$i;
else
	$i0=($i % 10);
	
if(($i>=10)&&($i<=20))
	$is='минут';
elseif($i0==1)
	$is='минута';
elseif($i0>=2 && $i0<=4)
	$is='минуты';
else
	$is='минут';		
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>LiT Weather</title>
</head>

<body>
<? echo "Текущее время: $h $hs $i $is";?>

</body>
</html>
