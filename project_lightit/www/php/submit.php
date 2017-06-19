<?php
	
	if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message']) AND !empty($_POST['them']))
		{
			$head = 'From: Павел Водениктов\r\n'.
					'Reply-To: pahamonk@mail\r\n';
			
			$mess = 'Данные сообщения:\r\n';
			$mess .= 'Имя: '.$_POST['name'].'\r\n';
			$mess .= 'Email: '.$_POST['email'].'\r\n';
			$mess .= 'Тема: '.$_POST['them'].'\r\n';
			$mess .= 'Сообщение: '.$_POST['message'].'\r\n';
			
			if (mail('pahamonk@mail.ru', 'Новое сообщение', $mess, $head))
			{
				echo 'Ваше сообщение было отправлено!';
			}		
			else
			{
				echo 'Упсс, что-то пошло не так!';
			}
		}
	else
		{
			echo 'Упсс, что-то осталось пустым!';
		}
?>