<?php
    // $js = "js/main.js";
    $title = "index2.html";
    $style = "css/style2.css";
	$news_title = "Регистрация";
?>

<?php
	require_once "header.php"
?>
<?php 
	$valid_name = '';
	$valid_surname = ''; 
	$valid_secondname = '';
	$resName = '';
	$resSur = '';
	$resSec = '';
	$formShow = '';
	$showSubmited ='none'; 
	$flag = true;
	$name = getVar('name');
	$surname = getVar('surname');
	$secondname = getVar('secondname');
	$about = getVar('about'); 
	$age= getVar('age');
	if (isset($_POST['FIO']) && $_POST['FIO'] == 'readyfor')
	{
		$name = clean($name);
		$surname = clean($surname);
		$secondname = clean($secondname);
		$about = clean($about);
		$age = clean($age);

		if((preg_match('/^[a-zA-Z]{2,64}$/', $name) === 0))
		{
			$resName = 'Проверьте коррректность ввода имени';
			$valid_name= 'error';
			$flag = false;
		}

		if((preg_match('/^[a-zA-Z]{2,64}$/', $surname) === 0))
		{
			$resSur = 'Проверьте коррректность ввода Фамилии';
			$valid_surname= 'error';
			$flag = false;
		}

		if((preg_match('/^[a-zA-Z]{2,64}$/', $secondname) === 0))
		{
			$resSec = 'Проверьте коррректность ввода Отчества';
			$valid_secondname= 'error';
			$flag = false;
		}
		if ($flag){
			$formShow = 'none';
			$showSubmited =''; 
		}
	}

	function clean($value) {
	  $value = trim($value);
//	  $value = stripslashes($value);
//	  $value = strip_tags($value);
//	  $value = htmlspecialchars($value);
	  $value = htmlspecialchars_decode($value);
	  $value = htmlentities($value);
	  return $value;
	}

	function getVar($name, $def='') { 
		return isset($_POST[$name]) ? clean($_POST[$name]) : $def; 
	} 

?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" id="form" class="clerfix" style=" display:<?php echo $formShow; ?>" method="post">
	<input type="hidden" name="FIO" value="readyfor">
	<div class="inputName">
		<input type="text" name="name" id="name" placeholder="Имя" class="<?php echo $valid_name; ?>" value="<?php echo $name; ?>">
		<span id="resName"><?php echo $resName; ?></span>
	</div>
	<div class="inputSurname">
		<input type="text" name="surname" id="surname" placeholder="Фамилия" class="<?php echo $valid_surname; ?>" value="<?php echo $surname; ?>">
		<span id="resSur"><?php echo $resSur; ?></span>
	</div>
	<div class="inputSecondname">
		<input type="text" name="secondname" id="seсondname" placeholder="Отчество" class="<?php echo $valid_secondname; ?>" value="<?php echo $secondname; ?>">
		<span id="resSec"><?php echo $resSec; ?></span>
	</div>
	<div class="AGE">
		<span class="Age">Возраст</span>
		<select class="age" id="age" name="age">
					<option>16</option>
					<option>16-21</option>
					<option>21-27</option>
					<option>27-35</option>
					<option>35-45</option>
					<option>45-55</option>
					<option>больше 55</option>
				</select>
	</div>
	<textarea class="about" id="about" placeholder="О себе" spellcheck="true" align="left" name="about"></textarea>

	<input type="submit" value="Отправить" name="Submit" onClick="return SubmitForm()" class="submit">
</form>
<div class="formSubmited" style=" display:<?php echo $showSubmited; ?>">
	<span class="formdata">Поздравляем с успешной регистрацией!</span>
	<span class="formdata">Имя: <?=$name;?> </span>
	<span class="formdata">Фамилия: <?=$surname;?> </span>
	<span class="formdata">Отчество: <?=$secondname;?></span>
	<span class="formdata">Возраст: <?=$age;?> лет</span>
	<p class="formdata">О себе:
		<?=$about;?>
	</p>
</div>
<?php
	require_once "footer.php"
?>