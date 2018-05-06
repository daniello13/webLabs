<?php
    // $js = "js/main.js";
    $title = "index3.html";
    $style = "css/style4.css";
	$news_title = "Файлы";
	$errormes = '';

    require_once "header.php";

	if(isset($_POST['path'])){
		$start_dir = $_POST['path'];
	}
	else
	{
		$start_dir = "./";
	}

	function checkDir($dir){
		if (isset($_REQUEST['DIR']))
		{
			$dir = $_REQUEST['DIR'];
		}
		if(preg_match('/^\\.(\\/|\\\\)([a-zA-ZА-ЯЁа-яё 0-9\\-_]+(\\/|\\\\))*$/iu',$dir) && (strpos($dir,'/.')==false))
		{ 
			$directory = $dir; 
		} 
		else 
		{ 
			$directory = './'; 
		}
		if(!is_dir($directory)) 
		{
		   $directory='./';
		}
		$files = scandir($directory);
	    for($i=1; $i< count($files); $i++){
			if($files[$i]=='..'){
			   if($directory=='./')
			   {
				   $nextdir=$directory;
			   }
			   else{
					$pos = strrpos($directory,'/',-2);
					$nextdir = substr_replace($directory," ",$pos+1);
				}
			}
			else
			{ 
				$nextdir = $directory.$files[$i].'/';
			}
		   $type = filetype($directory.$files[$i]);
		   $size = get_filesize($directory.$files[$i]);
		   $date = date("H:i:s d F Y", filectime($directory.$files[$i]));
		   if($type == "dir"){
			   echo "
				<tr>
					<td class=\"content-table content-table-dir\">
					<a href=\"?DIR=$nextdir\">$files[$i]</a>
					</td>
					<td class=\"content-table\"> $type </td>
					<td class=\"content-table\"> $size </td>
					<td class=\"content-table\"> $date </td>
				</tr>";}
		}
		for($i = 0; $i<count($files);$i++){
			$type = filetype($directory.$files[$i]);
			$size = get_filesize($directory.$files[$i]);
			$date = date("H:i:s d F Y", filectime($directory.$files[$i]));
			if( $type != "dir"){
				 echo "
				 <tr>
					<td class=\"content-table\">$files[$i]</td>
					<td class=\"content-table\"> $type </td>
					<td class=\"content-table\"> $size </td>
					<td class=\"content-table\"> $date </td>
				</tr>";
			}
		}
		return $directory;	
	}

	if (isset($_POST['CreateDir'])) {
		$nameoff = clean($_POST['nameOfFolder']);
		if(empty($nameoff)) 
			$errormes = 'Вы не ввели имя папки!';
		else {
			if(is_dir($start_dir.$nameoff)) {
				$errormes = 'Такой каталог уже сущетсвует в данной директории!';
			}
			else {
				mkdir("$start_dir$nameoff");
			}
		}
	}
  	if (isset($_POST['DeleteDir'])) {
		$nameoff = clean($_POST['nameOfFolder']);
		if(empty($nameoff)) 
			$errormes = 'Вы не ввели имя папки!';
		else {
			if(is_dir($start_dir.$nameoff)) {
				delFolder($start_dir.$nameoff);
			}
			else {
				$errormes = 'Такой каталог не сущетсвует в данной директории!';
			}
		}
	}
	function clean($value = "") 
	{
		$value = trim($value);
		return $value;
	}
	function delFolder($dir)
	{
		$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file) {
		(is_dir("$dir/$file")) ? delFolder("$dir/$file") : unlink("$dir/$file");
	}
		return rmdir($dir);
	}
	function get_filesize($file) 
	{ 
		if(!file_exists($file))
		{
			return "Файл не найден"; 
		} 
		  $filesize = filesize($file); 
		   if($filesize > 1024) 
		   { 
			   $filesize = ($filesize/1024); 
			   if($filesize > 1024) 
			   { 
					$filesize = ($filesize/1024); 
				   if($filesize > 1024) 
				   { 
					   $filesize = ($filesize/1024); 
					   $filesize = round($filesize, 1); 
					   return $filesize." ГБ";    
				   } 
				   else 
				   { 
					   $filesize = round($filesize, 1); 
					   return $filesize." MБ";    
				   }   
			   } 
			   else 
			   { 
				   $filesize = round($filesize, 1); 
				   return $filesize." Кб";    
			   } 
		   } 
		   else 
		   { 
			   $filesize = round($filesize, 1); 
			   return $filesize." байт";    
		   } 

		} 

 ?>
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
		<table class="file-menu">
			<tr>
				<th class="thead">Имя</th>
				<th class="thead">Тип</th>
				<th class="thead">Размер</th>
				<th class="thead">Дата</th>
			</tr>
			<?php $path = checkDir($start_dir);?>
		</table>
		<span class="errormes"><?=$errormes;?></span>
		<input type="text" name="nameOfFolder">
		<input type="hidden" name="path" value="<?=$path; ?>">
		<input name="CreateDir" type="submit" value="Создать каталог" id="CreateDir" />
		<input name="DeleteDir" type="submit" value="Удалить каталог" id="RemoveDir" />
	</form>
<?php
    require_once "footer.php";
?>
