<?php
	
  include('include/config.php');

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
		
        $weather0_1 = $weatherArray->city->name.", ".$weatherArray->city->country."<br/>"."<img src='http://openweathermap.org/img/w/".$weatherArray->list[0]->weather[0]->icon.".png' alt='Icon current weather.'>".$weatherArray->list[0]->main->temp."&deg;C<br/>"
		              .$weatherArray->list[0]->weather[0]->main."<br/>".$weatherArray->list[0]->dt_txt."<br/>";
		$weather0_2 = "<div class='weather_list'><br/>"."<table class='table table-striped table-condensed table-bordered'><br/>"
					  ."<tbody><br/>"."<tr>"."<td>Скорость ветра</td>"."<td>".$weatherArray->list[0]->wind->speed." м/с</td>"."</tr>";		  
		$weather0_3 = "<tr>"."<td>Влажность</td>"."<td>".$weatherArray->list[0]->main->humidity." %</td>"."</tr>";	
		$weather0_4 = "<tr>"."<td>Атмосферное давление</td>"."<td>".$weatherArray->list[0]->main->pressure*0.75. "мм рт. ст.</td>"."</tr>";
		$weather0_5 = "<tr>"."<td>Описание</td>"."<td>".$weatherArray->list[0]->weather[0]->description."</td>"."</tr>";
		$weather0_6 = "<tr>"."<td>Облачность</td>"."<td>".$weatherArray->list[0]->clouds->all." %</td>"."</tr>";
		$weather0_7 = "<tr>"."<td>Температурный диапазон</td>"."<td>От: ".$weatherArray->list[0]->main->temp_min."&deg;C "."До: ".$weatherArray->list[0]->main->temp_max."&deg;C</td>"."</tr>";
		$weather0_8 = "<tr>"."<td>Координаты</td>"."<td>"."[".$weatherArray->city->coord->lat.";".$weatherArray->city->coord->lon."]"."</td>"."</tr>"
					  ."</tbody><br/>"."</table><br/>"."</div><br/>";		
	 



			 
		"Дата: ".$weatherArray->list[0]->dt_txt." Температура: ".$weatherArray->list[0]->main->temp."&deg;C<br/>"."От: ".$weatherArray->list[0]->main->temp_min."&deg;C "."До: ".$weatherArray->list[0]->main->temp_max."&deg;C<br/>".
        "Скорость ветра: ".$weatherArray->list[0]->wind->speed."м/с "."Направление ветра: ".$weatherArray->list[0]->wind->deg."<br/>"."Описание: ".$weatherArray->list[0]->weather[0]->description."<img src='http://openweathermap.org/img/w/".
        $weatherArray->list[0]->weather[0]->icon.".png' alt='Icon depicting current weather.'><br/>".
        "Атмосферное давление: ".$weatherArray->list[0]->main->pressure*0.75."мм рт. ст.<br/>"."Влажность: ".$weatherArray->list[0]->main->humidity."%";
      }
	  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная - WeatherNews</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="css/pagestyle.css">
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">

</head>
<body onload="clock()">

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 title">
                    <h2>Weather<span>News</span></h2>
                </div>
                <form>
                <div class="col-sm-4 search_tbox">
                    <input type="text" class="text" id="city" name="city" placeholder="Введите название населенного пункта" value="<?php echo $_GET['city']; ?>">
                </div>
                <div class="col-sm-2 search">
                   <button class="search_bt">Поиск</button>
                </div>
                </form>
                <div class="col-sm-3 time-date">
                    <p id="timedate"></p>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="row">
                <ul class="list-inline">
                    <a href="main.html">
                        <li>Главная</li>
                    </a>
                    <a href="cities.html">
                        <li>Выбрать город</li>
                    </a>
                    <a href="horoscope.html">
                        <li>Гороскоп</li>
                    </a>
                    <a href="about.html">
                        <li>О нас</li>
                    </a>
                    <a href="feedback.html">
                        <li>Обратная связь</li>
                    </a>
                    <a id="lang" href="#">
                        <li class="lang_drop">Рус Ў</li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
               <div class="col-md-2 present_weather">
				<?php
					echo $weather0_1;
					echo $weather0_2;
					echo $weather0_3;
					echo $weather0_4;
					echo $weather0_5;
					echo $weather0_6;
					echo $weather0_7;
					echo $weather0_8;          
                ?>
				
                </div>
                <div class="col-md-7 weatherblocks">
                   <div class="weather_list">
				   <?php		  
				    for($i=0; $i<=$weatherArray->list[$q]; $i++)
							{
							for($k=0; $k<=$weatherArray->list[$d]; $k++)
								{
									for($kk=0; $kk<=$weatherArray->list[$dd]; $kk++)
									{
										
										for($c=0; $c<=$weatherArray->list[$qq]; $c++)
										{
											for($cc=0; $cc<=$weatherArray->list[$f]; $cc++)
											{
												for($z=0; $z<=$weatherArray->list[$ff]; $z++)
												{
													for($zz=0; $zz<=$weatherArray->list[$p]; $zz++)
													{
														for($o=0; $o<=$weatherArray->list[$pp]; $o++)
														{
								echo $weatherArray->list[$q]->dt_txt."\n\n";
								echo $weatherArray->list[$d]->main->temp."\n\n";
								$iconId = $weatherArray->list[$dd]->weather[0]->icon;
								echo "<img src='http://openweathermap.org/img/w/".$iconId.".png' alt='Icon depicting current weather.'>"."\n\n";
								echo $weatherArray->list[$qq]->weather[0]->description."\n\n";
								echo $weatherArray->list[$f]->main->humidity."\n\n";
								$pressure = $weatherArray->list[$ff]->main->pressure*0.75;
								echo $pressure."\n\n";
								echo $weatherArray->list[$p]->wind->speed."\n\n";
								echo $weatherArray->list[$p]->wind->deg."\n\n";
								echo "<br/>";		
								$q++;
								$d++;
								$dd++;
								$qq++;
								$f++;
								$ff++;		
								$p++;
								$pp++;
														}
													}
												}
											}
										}
									}
								}									
							}
							?>
                </div>
                </div>
                <div class="col-md-3 mapblock">
                    <div id="map">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Weather<span>News</span></h3>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </footer>
</body>
	<!--include js time; map-->
    <script src="js/time.js"></script>
    <script src="js/map.js"></script>
</html>
