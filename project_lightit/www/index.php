<?php
/*
//29523e3d8a45ced8fc0d385b41aeadba
//константы бд подключения к локальной базе данных
define($host, "localhost"); 
define($db_name, "weatherbase"); 
define($db_user, "root"); 
define($db_pass, "");

$dbh = mysql_connect($host, $db_user, $_db_pass) or die("Не могу соединиться с MySQL.");
mysql_select_db($db_name) or die("Не могу подключиться к базе.");
*/
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
function curl($url)
{
$ch = curl_init();
curl_setopt($ch, CUROPT_URL, $url);
curl_setopt($ch, CUROPT_RETURNTRANSFER, l);
curl_setopt($ch, CUROPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
curl_close($ch);

return $data;
}
if($_GET['city'])
{
	echo
	curl("http://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=29523e3d8a45ced8fc0d385b41aeadba");	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Light-It - Практика</title>
</head>

<body>
<? echo "$h $hs $i $is";?>

</body>
</html>
