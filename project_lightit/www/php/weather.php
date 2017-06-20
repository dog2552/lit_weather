<?php
  include('php/config.php');

	function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
    }
      $lang = "ru";
      $units = "metric";
      $mode = "json";
      if($_GET['city'])
      {
        $weatherArrayURL = curl("http://api.openweathermap.org/data/2.5/forecast?q=".$_GET['city']."&mode=$mode&units=$units&lang=$lang&appid=29523e3d8a45ced8fc0d385b41aeadba");
        $weatherArray = json_decode($weatherArrayURL);
          
		$res = mysqli_query($link, "INSERT INTO `weather` (`city`, `date`, `temp`, `temp_min`, `temp_max`, `windSpeed`, `windDeg`,
		`humidity`, `pressure`, `description`, `clouds`, `coordLat`, `coordLon`, `idIcon`, `weatherMain`) 
		VALUES ('".$_GET['city']."','".$weatherArray->list[0]->dt_txt."','".$weatherArray->list[0]->main->temp."','".$weatherArray->list[0]->main->temp_min."','".$weatherArray->list[0]->main->temp_max."'
		,'".$weatherArray->list[0]->wind->speed."','".$weatherArray->list[0]->wind->deg."','".$weatherArray->list[0]->main->humidity."','".$weatherArray->list[0]->main->pressure*0.75."'
		,'".$weatherArray->list[0]->weather[0]->description."','".$weatherArray->list[0]->clouds->all."','".$weatherArray->city->coord->lat."','".$weatherArray->city->coord->lon."'
		,'".$weatherArray->list[0]->weather[0]->icon."','".$weatherArray->list[0]->weather[0]->main."')");
		
        $weather_city = $weatherArray->city->name;
          
        $weather_city_country = "Погода в ".$weatherArray->city->name.",".$weatherArray->city->country;
        $weather_icon = "<img src='http://openweathermap.org/img/w/".$weatherArray->list[0]->weather[0]->icon.".png' alt=''>";
        $weather_temp = $weatherArray->list[0]->main->temp." °С";
        $weather_main = $weatherArray->list[0]->weather[0]->description;
          
		$weather0_1 = "<div class='weather_prsnt'>"."<table class='table table-striped table-condensed table-bordered' style='margin-bottom: 15px'>"."<tbody>"."<tr>"."<td>Скорость ветра</td>"."<td>".$weatherArray->list[0]->wind->speed." м/с</td>"."</tr>";		
          
		$weather0_2 = "<tr>"."<td>Влажность</td>"."<td>".$weatherArray->list[0]->main->humidity." %</td>"."</tr>";	
          
		$weather0_3 = "<tr>"."<td>Атм.давление</td>"."<td>".$weatherArray->list[0]->main->pressure*0.75. " мм рт. ст.</td>"."</tr>";
          
		$weather0_4 = "<tr>"."<td>Облачность</td>"."<td>".$weatherArray->list[0]->clouds->all." %</td>"."</tr>";
          
		$weather0_5 = "<tr>"."<td>Темп.диапазон</td>"."<td>От: ".$weatherArray->list[0]->main->temp_min."&deg;C "."До: ".$weatherArray->list[0]->main->temp_max."&deg;C</td>"."</tr>";
          
		$weather0_6 = "<tr>"."<td>Координаты</td>"."<td>"."[".$weatherArray->city->coord->lat.";".$weatherArray->city->coord->lon."]"."</td>"."</tr>"."</tbody>"."</table>"."</div>";		
      }
	  
?>

