<?php
	
	if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message']) AND !empty($_POST['them']))
		{
			$head = 'From: ����� ����������\r\n'.
					'Reply-To: pahamonk@mail\r\n';
			
			$mess = '������ ���������:\r\n';
			$mess .= '���: '.$_POST['name'].'\r\n';
			$mess .= 'Email: '.$_POST['email'].'\r\n';
			$mess .= '����: '.$_POST['them'].'\r\n';
			$mess .= '���������: '.$_POST['message'].'\r\n';
			
			if (mail('pahamonk@mail.ru', '����� ���������', $mess, $head))
			{
				echo '�������, ���� ������ ����������!';
			}		
			else
			{
				echo '����, ���-�� ����� �� ���!';
			}
		}
	else
		{
			echo '����, ���-�� �������� ������!';
		}
?>