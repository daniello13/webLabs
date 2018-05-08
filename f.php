<?php
//для начала опишем функцию очистки данных от лишних пробелов и тегов
function clstr($data){
 return trim(strip_tags($data));
}
//если метод обращения совпадает, то обрабатываем данные из массива $_POST
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = clstr($_POST['name']);
	$phone = clstr($_POST['phone']);
	$msg = clstr($_POST['message']);
		//проверим наши переменные на пустоту
		if(!empty($name)&&!empty($phone)&&!empty($msg)){
			$to='d.artemiev@outlook.com';
			$sub='Письмо с сайта';
			$text='Имя - '.$name.' Телефон - '.' Сообщение: '.$msg;
			//в переменную положим результат от функции mail false или true
			$status=mail($to, $sub, $text); 
			//положим результат в куки с временем хранения 10 сек
			setcookie('status_mail', $status, time()+10);
			header('Location:'.$_SERVER['REQUEST_URI']); 
		}
}

?>
<form method="post" action="<?= $_SERVER['REQUEST_URI'];?>">
<label>Имя<br> <input type="text" name="name" required></label><br>
<label>Телефон<br> <input type="text" name="phone" required></label><br>
<label>Ваше сообщение<br><textarea name="message"></textarea></label><br>
<input type="submit" value="Отправить!" />
</form>