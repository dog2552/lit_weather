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
									echo "<td>�������� �����</td>";
									echo "<td>".$weatherArray->list[0]->wind->speed." �/�</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>���������</td>";
									echo "<td>".$weatherArray->list[0]->main->humidity." %</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>����������� ��������</td>";
									echo "<td>".$weatherArray->list[0]->main->pressure*0.75. "�� ��. ��.</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>��������</td>";
									echo "<td>".$weatherArray->list[0]->weather[0]->description."</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>����������</td>";
									echo "<td>".$weatherArray->list[0]->clouds->all." %</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>������������� ��������</td>";
									echo "<td>��: ".$weatherArray->list[0]->main->temp_min."&deg;C "."��: ".$weatherArray->list[0]->main->temp_max."&deg;C</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td>����������</td>";
									echo "<td>"."[".$weatherArray->city->coord->lat.";".$weatherArray->city->coord->lon."]"."</td>";
								echo "</tr>";								
                       echo "</tbody>";
                    echo "</table>";	
		echo "</div>";
		
		
		
        $weather1 = "����: ".$weatherArray->list[0]->dt_txt." �����������: ".$weatherArray->list[0]->main->temp."&deg;C<br/>"."��: ".$weatherArray->list[0]->main->temp_min."&deg;C "."��: ".$weatherArray->list[0]->main->temp_max."&deg;C<br/>".
        "�������� �����: ".$weatherArray->list[0]->wind->speed."�/� "."����������� �����: ".$weatherArray->list[0]->wind->deg."<br/>"."��������: ".$weatherArray->list[0]->weather[0]->description."<img src='http://openweathermap.org/img/w/".
        $weatherArray->list[0]->weather[0]->icon.".png' alt='Icon depicting current weather.'><br/>".
        "����������� ��������: ".$weatherArray->list[0]->main->pressure*0.75."�� ��. ��.<br/>"."���������: ".$weatherArray->list[0]->main->humidity."%";

      }

?>