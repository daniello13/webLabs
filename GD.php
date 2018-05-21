<?php
    $title = "index.html";
    $style = "css/style.css";
	$news_title = "GD";
?>

<?php
    require_once "header.php"
   
    //
?>

    <form id="image-load" action="GD.php" method="post" enctype="multipart/form-data">
        <div class="load-form-contetnt">
            <input type="file" name="filename">
        <div>
        <div class="load-form-contetnt">
            <span class="info-text">Ширина:</span>
            <input type="text" name="Width" value=300>
        </div>
        <div class="load-form-contetnt">
            <span class="info-text">Высота:</span>
            <input type="text" name="Height" value=400>	
        </div>				
        <input type="submit" value="Преобразовать">
    </form>
<?php
    
    function Resize($src,$width,$height)
    {
        $size = getimagesize($src);
        
        switch($size["mime"])
        {
            case "image/jpeg":$isrc = imagecreatefromjpeg($src); break;
            case "image/png":$isrc = imagecreatefrompng($src);break;
            case "image/bmp":$isrc = imagecreatefrombmp($src);break;
            case "image/gif":$isrc = imagecreatefromgif($src);break;
            default: return false;
        }
        if($isrc==false) return false;

        $ratioWidth = $size[0]/$width;
        $ratioHeight = $size[1]/$height;

        if($ratioWidth < $ratioHeight)
        {
            $destWidth = intval($size[0]/$ratioHeight);
            $destHeight = $height;
        }
        else
        {
            $destWidth = $width;
            $destHeight = intval($size[1]/$ratioWidth);
        }

        $idest = imagecreatetruecolor($destWidth, $destHeight);
        $color = imagecolorallocate($idest,255, 0, 0);
        $font = "/xamp/htdocs/lab7v2/fonts/arial.ttf";
        $text = "Abarnikov Y.A.";

        imagecopyresampled($idest, $isrc, 0, 0, 0, 0, $destWidth, $destHeight, $size[0], $size[1]);
        imagettftext($idest, 24, 0, $destWidth - 205, $destHeight,  $color, $font, $text);
       
        $newPath="userImg/"."resizedImage".$_FILES["filename"]["name"];	
        
        if(!imagejpeg($idest,$newPath,100))
            return false;
        imagedestroy($isrc);
        imagedestroy($idest);
        return true;
    }
    

    if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
    {
        move_uploaded_file($_FILES["filename"]["tmp_name"], "userImg/".$_FILES["filename"]["name"]);
        $src="userImg/".$_FILES["filename"]["name"];
        if(Resize($src,$_POST["Width"],$_POST["Height"]))
        {
            $newPath="userImg/"."resizedImage".$_FILES["filename"]["name"];	
            echo "<span class=\"info-text\">Уменьшенное  изображение</span><img src=$newPath></img>";
            echo "<span class=\"info-text\">Оригинал</span><img style=\"max-width:100%;\" src='$src'></img>";
        }
        else
            echo "Ошибка преобразования!";
    }
?>
<?php

	require_once "header.php";
?>