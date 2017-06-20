<?php include("php/start.php"); ?>
<?php include("php/weather.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная - WeatherNews</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <link rel="stylesheet" href="css/pagestyle.css"> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script> 
    
    <link rel="shortcut icon" href="img/favicon.png" type="image/png"> 
    
   <link href="https://fonts.googleapis.com/css?family=Roboto|Scada:400 &amp;subset=cyrillic" rel="stylesheet">
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
                    <input type="text" class="text" id="city" name="city" placeholder="Введите название населенного пункта">
                </div>
                <div class="col-sm-2 search">
                   <button class="search_bt" onclick="search()">Поиск</button>
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
                <ul class="list-inline text-center">
                    <a href="main.php">
                        <li>Главная</li>
                    </a>
                    <a href="about.html">
                        <li>О нас</li>
                    </a>
                    <a href="feedback.html">
                        <li>Обратная связь</li>
                    </a>
                </ul>
            </div>
        </div>

    </nav>
    
    <main>
        <div class="container">
            <div class="row">
               <div class="col-md-4 present_weather">
                    <div class="prs_weather">
                            <p id="weather_city_country"><?php echo $weather_city_country; ?></p>
                        <div class="icon_temp">
                            <p id="weather_icon_temp"><?php echo $weather_icon; echo $weather_temp;?></p>
                        </div>
                        <p id="weather_main"><?php echo $weather_main; ?></p>
                    </div>
                <?php
					echo $weather0_1;
					echo $weather0_2;
					echo $weather0_3;
					echo $weather0_4;
					echo $weather0_5;
					echo $weather0_6;          
                ?>
                <div id="map">
                        
                </div>
                </div>
                <div class="col-md-8 weatherblocks">
                      <div class="weather_list" style="box-shadow: 0 2px 5px rgba(0,0,0,0.5);">
                       <table class="table table-striped table-condensed table-bordered" style="margin-bottom: 50px;">
                       <?php
                        for($i=0; $i<=$weatherArray->list[$q]; $i++)
                                {
                                for($k=0; $k<=$weatherArray->list[$d]; $k++)
                                    {
                                        for($kk=0; $kk<=$weatherArray->list[$dd]->weather[1]->icon; $kk++)
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

                                    echo "<tr><td>".$weatherArray->list[$q]->dt_txt."\n\n</td>";
                                    echo "<td>".$weatherArray->list[$d]->main->temp."\n\n</td>";
                                    $iconId = $weatherArray->list[$dd]->weather[0]->icon;
                                    echo "<td>"."<img src='http://openweathermap.org/img/w/".$iconId.".png' alt=''>"."\n\n</td>";
                                    echo "<td>".$weatherArray->list[$qq]->weather[0]->description."\n\n</td>";
                                    echo "<td>".$weatherArray->list[$f]->main->humidity."\n\n</td>";
                                    $pressure = $weatherArray->list[$ff]->main->pressure*0.75;
                                    echo "<td>".$pressure."\n\n</td>";
                                    echo "<td>".$weatherArray->list[$p]->wind->speed."\n\n</td>";
                                    echo "<td>".$weatherArray->list[$p]->wind->deg."\n\n</td>";
                                    echo "<tr/>";		
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
                       </table>
                </div>
                </div>
            </div>
        </div>
    </main>  
    <a href="#" class="scrollup">Наверх</a>
<footer>
        <div class="container">
            <div class="row">
               <div class="footer">
                    <div class="col-md-4">
                        <h5>Все права принадлежат © 2017 Weather<span>News</span>.</h5> 
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </footer>

</body>
<script type="text/javascript">
$(document).ready(function(){
 
$(window).scroll(function(){
if ($(this).scrollTop() > 100) {
$('.scrollup').fadeIn();
} else {
$('.scrollup').fadeOut();
}
});
 
$('.scrollup').click(function(){
$("html, body").animate({ scrollTop: 0 }, 600);
return false;
});
 
});
</script>

    <script src="js/time.js"></script>
    <script src="js/map.js"></script> <!--Начальная карта--> 
    <script type="text/javascript">
    function init_map()
    {
        var myOptions = {
            zoom:10,
            center:new google.maps.LatLng(<?php echo $weatherArray->city->coord->lat; ?> , <?php echo $weatherArray->city->coord->lon; ?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP};
        
            map = new google.maps.Map(document.getElementById('map'), myOptions);
            marker = new google.maps.Marker(
                {
                    map: map,position: new google.maps.LatLng(<?php echo $weatherArray->city->coord->lat;?> , <?php echo $weatherArray->city->coord->lon; ?>)});
                    google.maps.event.addListener(marker, 'click', function(){
                    infowindow.open(map,marker);
        });  
        infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script> <!--Карта после запроса-->
    <script type="text/javascript">
        function search (unE)
        {
        var e = encodeURIComponent(<?php echo $weather_city; ?>);
        var unE = decodeURIComponent(<?php echo $_GET['e']; ?>);
            document.getElementById('weather_city_country').innerHTML = unE.value;
        }
    </script> <!--Транслит. Версия 2-->
</html>