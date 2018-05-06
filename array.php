<?php
    // $js = "js/main.js";
    $title = "index3.html";
    $style = "css/style3.css";
	$news_title = "Массив";
?>

<?php
    require_once "header.php"
?>
<?php 
	function clean($value = "") {
		$value = trim($value);
		$value = htmlspecialchars_decode($value);
		$value = htmlentities($value);
	  return $value;
	}
	function showArray ($nameOFarr) { 
		if (isset($nameOFarr) && !empty($nameOFarr)) { 
			$temp=''; 
			switch ($nameOFarr) { 
				case $_GET: $ar = '$_GET'; break; 
				case $_POST: $ar = '$_POST'; break; 
				case $_SERVER: $ar = '$_SERVER'; break; 
				default: $ar = 'Error'; break; 
			} 
		
		echo "
			<span class=\"name-of\">$ar:</span>
			<table class=\"array\">"; 
		foreach ($nameOFarr as $key => $value){ 
			$temp = $key.' = '.clean($value); 
			echo "
			<tr class=\"list\">
				<td class=\"element\">
					$temp 
				</td>
			</tr>";
		}
		echo "</table>"; 
		} 
	} 
?>               
	<div class="table">
		<?php
    		showArray($_GET);
			showArray($_POST);
			showArray($_SERVER);
		?>
	</div>
      
<?php
    require_once "footer.php"
?>