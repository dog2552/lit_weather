<?php
  $link=mysqli_connect('localhost', 'root', '', 'weathernews');
    if($link == false)
	{
		echo '�� ������� ������������ � ��!<br/>';
		echo mysqli_connect_error();
		exit();
	}
?>