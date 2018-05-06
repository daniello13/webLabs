<?php
    // $js = "js/main.js";
    $title = "index.html";
    $style = "css/style.css";
	$news_title = "Магазин";
	$jq = "<script src=\"js/modalWinJQ.js\"></script>";
?>

<?php
    require_once "header.php";
?>
<?php
	if (file_exists('xml/goods.xml')) 
	{
		$xml = new DOMDocument(); 
		$xml->load('xml/goods.xml'); 
		$item = array();
		foreach( $xml->getElementsByTagName("product") as $someItem)
		{
			foreach($someItem->childNodes as $parameter)
			{
				if($parameter->nodeType != XML_TEXT_NODE)
				{
					switch($parameter->nodeName)
					{
						case 'image': $item['image'] = $parameter->nodeValue; break;
						case 'name': $item['name'] = $parameter->nodeValue; break;
						case 'typen': $item['typen'] = $parameter->nodeValue; break;
						case 'maker': $item['maker'] = $parameter->nodeValue; break;
						case 'incompletedesc': $item['incompletedesc'] = $parameter->nodeValue; break;
						// case 'description': $item['description'] = $parameter->nodeValue; break;
						case 'valiability': $item['valiability'] = $parameter->nodeValue; break;
						case 'price': $item['price'] = $parameter->nodeValue; break;
						// case 'param': 
						// 	if($parameter->getElementsByTagName("nameofParam")->length != 0 && $parameter->getElementsByTagName("valofParam")->length != 0) {
						// 		$par_msg = $parameter->getElementsByTagName("nameofParam")->item(0)->nodeValue;
                        //     	$par_msg .= ": ";
						// 		$par_msg .= $parameter->getElementsByTagName("valofParam")->item(0)->nodeValue;
						// 		$item['parameters'][] = $par_msg;
						// 	} 
						// break;
					}
				}
			}
			$item['sernum'] = $someItem->getAttribute('sernum');
			$item['id'] = $someItem->getAttribute('iid');
			$medicines[]=$item;
			unset($item);
		}
		echo"<ul class=\"list-item\">";
		for($i=0; $i < count($medicines); $i++)
		{
			$temp2 = $medicines[$i]['sernum'];
			$temp1 = $medicines[$i]['id'];

			echo "
				<li class=\"item clearfix\">
					<div  class=\"img-item\" style=\"background: url('". $medicines[$i]['image'] ."'); background-size: cover;\"></div>
					<div class=\"info\">
					<!--name -->
						<span class=\"info-text\">Название препарата: ". $medicines[$i]['name'].';'."</span>
					<!--type -->
						<span class=\"info-text\">Тип : ". $medicines[$i]['typen'].';'."</span>
					<!--maker -->	
						<span class=\"info-text\">Производитель : ". $medicines[$i]['maker'].';'."</span>
					<!--incompletedesc--> 
						<span class=\"info-text\" id=\"info-text\">Описание : ". $medicines[$i]['incompletedesc'].	
						"<a href=\"#\" style=\"padding-left:10px;\" onclick=\"showDesc('$temp1','$temp2');\">подробне...</a></span>	
						";
						// foreach($medicines[$i]['parameters'] as $param)
						// {
						// 	echo "<span class=\"info-text\">". $param .';'."</span>";
						// }
					echo "
					<!--valiability -->	
						<span class=\"info-text\">Наличие : ". $medicines[$i]['valiability'].';'."</span>
					<!--price -->	
						<span class=\"info-text\">Цена : ". $medicines[$i]['price'].';'."</span>
						<button class=\"order\">Купить</button>";
			echo '</div>
				</li>
				';
		}
		echo"</ul>";
		require_once "modalwin.php";
	}
	else
	{
		exit('Не удалось открыть файл goods.xml!');
	}
?>

<?php	
	require_once "footer.php";
?>