<?php


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

        /*[0]*/
		echo $weatherArray->city->name.", ".$weatherArray->city->country."<br/>";
		echo "<img src='http://openweathermap.org/img/w/".$weatherArray->list[0]->weather[0]->icon.".png' alt='Icon depicting current weather.'>".$weatherArray->list[0]->main->temp."&deg;C<br/>";
		echo $weatherArray->list[0]->weather[0]->main;
		echo $weatherArray->list[0]->dt_txt;
		echo "<div class='weather_list'>";
		     echo  "<table class='table table-striped table-condensed table-bordered'>";

                       echo "<tbody>";		 
								echo "<tr>";
									echo "<td>Скорость ветра</td>";
									echo "<td>".$weatherArray->list[0]->wind->speed." м/с</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>Влажность</td>";
									echo "<td>".$weatherArray->list[0]->main->humidity." %</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>Атмосферное давление</td>";
									echo "<td>".$weatherArray->list[0]->main->pressure*0.75. "мм рт. ст.</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>Описание</td>";
									echo "<td>".$weatherArray->list[0]->weather[0]->description."</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>Облачность</td>";
									echo "<td>".$weatherArray->list[0]->clouds->all." %</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>Температурный диапазон</td>";
									echo "<td>От: ".$weatherArray->list[0]->main->temp_min."&deg;C "."До: ".$weatherArray->list[0]->main->temp_max."&deg;C</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>Координаты</td>";
									echo "<td>"."[".$weatherArray->city->coord->lat.";".$weatherArray->city->coord->lon."]"."</td>";
								echo "</tr>";								
                       echo "</tbody>";
                    echo "</table>";	
		echo "</div>";
		
		
		
        $weather1 = "Дата: ".$weatherArray->list[0]->dt_txt." Температура: ".$weatherArray->list[0]->main->temp."&deg;C<br/>"."От: ".$weatherArray->list[0]->main->temp_min."&deg;C "."До: ".$weatherArray->list[0]->main->temp_max."&deg;C<br/>".
        "Скорость ветра: ".$weatherArray->list[0]->wind->speed."м/с "."Направление ветра: ".$weatherArray->list[0]->wind->deg."<br/>"."Описание: ".$weatherArray->list[0]->weather[0]->description."<img src='http://openweathermap.org/img/w/".
        $weatherArray->list[0]->weather[0]->icon.".png' alt='Icon depicting current weather.'><br/>".
        "Атмосферное давление: ".$weatherArray->list[0]->main->pressure*0.75."мм рт. ст.<br/>"."Влажность: ".$weatherArray->list[0]->main->humidity."%";

      }

?>