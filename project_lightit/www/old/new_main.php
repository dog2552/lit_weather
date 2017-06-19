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
        $weatherArrayURL = curl("http://api.openweathermap.org/data/2.5/forecast?q=London&mode=$mode&units=$units&lang=$lang&appid=29523e3d8a45ced8fc0d385b41aeadba");
        $weatherArray = json_decode($weatherArrayURL);





        /*[0]*/
        $weather1 = "Дата: ".$weatherArray->list[0]->dt_txt." Температура: ".$weatherArray->list[0]->main->temp."&deg;C<br/>"."От: ".$weatherArray->list[0]->main->temp_min."&deg;C "."До: ".$weatherArray->list[0]->main->temp_max."&deg;C<br/>".
        "Скорость ветра: ".$weatherArray->list[0]->wind->speed."м/с "."Направление ветра: ".$weatherArray->list[0]->wind->deg."<br/>"."Описание: ".$weatherArray->list[0]->weather[0]->description."<img src='http://openweathermap.org/img/w/".
        $weatherArray->list[0]->weather[0]->icon.".png' alt='Icon depicting current weather.'><br/>".
        "Атмосферное давление: ".$weatherArray->list[0]->main->pressure*0.75."мм рт. ст.<br/>"."Влажность: ".$weatherArray->list[0]->main->humidity."%";
        /*[1]*/
        $weather2 = "Дата: ".$weatherArray->list[1]->dt_txt." Температура: ".$weatherArray->list[1]->main->temp."&deg;C<br/>"."От: ".$weatherArray->list[1]->main->temp_min."&deg;C "."До: ".$weatherArray->list[1]->main->temp_max."&deg;C<br/>".
        "Скорость ветра: ".$weatherArray->list[1]->wind->speed."м/с "."Направление ветра: ".$weatherArray->list[1]->wind->deg."<br/>"."Описание: ".$weatherArray->list[1]->weather[0]->description."<img src='http://openweathermap.org/img/w/".
        $weatherArray->list[1]->weather[0]->icon.".png' alt='Icon depicting current weather.'><br/>".
        "Атмосферное давление: ".$weatherArray->list[1]->main->pressure*0.75."мм рт. ст.<br/>"."Влажность: ".$weatherArray->list[1]->main->humidity."%";

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
                        <li class="lang_drop">Рус ▼</li>
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
                    echo $weather1;
                ?>
                </div>
                <div class="col-md-7 weatherblocks">
                   <div class="weather_list">
                    <table class="table table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
								                <th></th>
                                <th></th>
                                <th>Температура</th>
                                <th>Описание</th>
								                <th>Атмосферное давление</th>
								                <th>Влажность</th>
								                <th>Скорость ветра</th>
								                <th>Направление ветра</th>
                            </tr>
                        </thead>
                       <tbody>
						           <?php
						           for($i=0; $i>=$weatherArray->list[$q]; $i++)
							            {
							             echo "<tr>";
							             echo "<td>".$weatherArray->list[$q]->dt_txt."</td>";
							             echo "<td><img src='http://openweathermap.org/img/w/".$weatherArray->list[$q]->weather[0]->icon.".png' alt='Icon depicting current weather.'></td>";
							             echo "<td>".$weatherArray->list[$q]->main->temp."&deg;C</td>";
							             echo "<td>".$weatherArray->list[$q]->weather[0]->description."</td>";
							             echo "<td>".$weatherArray->list[$q]->main->pressure*0.75."мм рт.ст.</td>";
							             echo "<td>".$weatherArray->list[$q]->main->humidity."%</td>";
							             echo "<td>".$weatherArray->list[$q]->wind->speed."м/с</td>";
                           echo "<td>".$weatherArray->list[$q]->wind->deg."&deg;</td>";
							             echo "</tr>";
                           
							             }
                           ?>
                        </tbody>
                    </table>
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

    <script src="js/time.js"></script>
    <script src="js/map.js"></script>

</html>
