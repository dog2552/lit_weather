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
   
   if ($_GET['city']) {
        
        $urlContents = curl("http://api.openweathermap.org/data/2.5/forecast?q=".$_GET['city']."&mode=$mode&units=$units&lang=$lang&appid=29523e3d8a45ced8fc0d385b41aeadba");
        $weatherArray = json_decode($urlContents, true); 
		$weatherPressure1 = $weatherArray['list'][0]['main']['pressure'] * 0.75;
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>
<body> 
        <form>
         
            <input type="text" name="city" placeholder="E.g. New York, Tokyo" value="<?php echo $_GET['city']; ?>">
			<button>Submit</button>
             </form>
        
         
         
          
          <?php 
            
                
        echo "Температура: ".$weatherArray['list'][0]['main']['temp']."&deg;C<br/>";
        echo "От: ".$weatherArray['list'][0]['main']['temp_min']."&deg;C";
        echo "До: ".$weatherArray['list'][0]['main']['temp_max']."&deg;C<br/>";
		echo "Скорость ветра: ".$weatherArray['list'][0]['wind']['speed']."м/с";
        echo "Направление ветра: ".$weatherArray['list'][0]['wind']['deg']."<br/>";
        echo "Описание: ".$weatherArray['list'][0]['weather'][0]['description'];
        echo "Атмосферное давление: ".$weatherPressure1."мм рт. ст.<br/>";
        echo "Влажность: ".$weatherArray['list'][0]['main']['humidity']."%";
              
            
          ?>
      
      
         
    
      
      
      

</body>
</html>