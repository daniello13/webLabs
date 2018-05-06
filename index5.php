<?php
	// $js = "js/main.js";
	$js2 = "js/jqvalidate.js";
    $title = "index2.html";
    $style = "css/style2.css";
	$news_title = "Регистрация";
?>

<?php
	require_once "header.php"
?>

<form action="index5.php" id="form" class="clearfix"  method="post">
	<input type="hidden" name="FIO" value="readyfor">
	<div class="inputName">
		<input type="text" name="name" id="name" placeholder="Имя">
		<span id="resName"></span>
	</div>
	<div class="inputSurname">
		<input type="text" name="surname" id="surname" placeholder="Фамилия">
		<span id="resSur"></span>
	</div>
	<div class="inputSecondname">
		<input type="text" name="secondname" id="seсondname" placeholder="Отчество">
		<span id="resSecond"></span>
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
	<div class="check1 clearfix">
		<label for="check1">Высшее образование</label>
		<input type="checkbox" class="check" >
	</div>
	<div class="check1 clearfix">
		<label for="check">Незаконченное высшее</label>
		<input type="checkbox" class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check">Среднее образование</label>
		<input type="checkbox" class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check1">Красный диплом</label>
		<input type="checkbox"class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check">Синий диплом</label>
		<input type="checkbox" class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check">Опыт работы</label>
		<input type="checkbox"  class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check">Желание работать с нами</label>
		<input type="checkbox" class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check">Что-то1</label>
		<input type="checkbox" class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check1">что-то2</label>
		<input type="checkbox" class="check">
	</div>
	<div class="check1 clearfix">
		<label for="check1">Что-то3</label>
		<input type="checkbox" class="check">
	</div>
	<div>
		<input type="button" value="Отметить все" id="CheckAll" class="control-buttons">
		<input type="button" value="Снять отметки" id="disableCheckAll" class="control-buttons">
		<input type="button" value="Реверс" id="reverseCheckAll" class="control-buttons">
	</div>

	<input type="submit" value="Отправить" name="Submit"  class="submit">

</form>
<!-- <div class="formSubmited" style=" display:<?php echo $showSubmited; ?>">
	<span class="formdata">Поздравляем с успешной регистрацией!</span>
	<span class="formdata">Имя:  </span>
	<span class="formdata">Фамилия:  </span>
	<span class="formdata">Отчество: </span>
	<span class="formdata">Возраст: </span>
	<p class="formdata">О себе:
	</p>
</div> -->
<?php
	require_once "footer.php"
?>