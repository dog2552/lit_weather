<?php
  $link=mysqli_connect('localhost', 'root', '', 'weathernews');
    if($link == false)
	{
		echo 'Не удалось подключиться к БД!<br/>';
		echo mysqli_connect_error();
		exit();
	}
?>