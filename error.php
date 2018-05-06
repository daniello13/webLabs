<?php
function SetImgSize($img, $width, $height, $AspectRatio = true)
    {
    //Создаем изображение в зависимости от типа исходного файла
    // для упрощения, считаю, что расширение соответствует типу файла
    switch ( strtolower(strrchr($img, '.')) ){
    case "jpg":
        $srcImage = @ImageCreateFromJPEG($img);
        break;
    case "gif":
        $srcImage = @ImageCreateFromGIF($img);
        break;
    case "png":
        $srcImage = @ImageCreateFromPNG($img);
        break;
    default:
        return -1;
    }
    $srcWidth = ImageSX($srcImage);
    $srcHeight = ImageSY($srcImage);
    echo 'Исходная картинка('.$srcWidth.'x'.$srcHeight.'): <b>'.$pURL_name.'</b><br><img src="'.$img.'" />';
    if(($width < $srcWidth) || ($height > $srcHeight))
    {   if($AspectRatio){
            $ratioWidth = $srcWidth/$width;
            $ratioHeight = $srcHeight/$height;
            if($ratioWidth < $ratioHeight)
            {
                $destWidth = intval($srcWidth/$ratioHeight);
                $destHeight = $height;
            }
            else
            {
                $destWidth = $width;
                $destHeight = intval($srcHeight/$ratioWidth);
            }
        }
        $resImage = ImageCreateTrueColor($destWidth, $destHeight);
        ImageCopyResampled($resImage, $srcImage, 0, 0, 0, 0, $destWidth, $destHeight, $srcWidth, $srcHeight);
        unlink($img);// удаляю исходный файл
        switch ( strtolower(strrchr($img, '.')) ){
        case "jpg":
            ImageJPEG($resImage, $img, 100); // 100 - максимальное качество
            break;
        case "gif":
            ImageGIF($resImage, $img);
            break;
        case "png":
            ImagePNG($resImage, $img);
            break;
        }
        ImageDestroy($srcImage);
        ImageDestroy($resImage);
        echo "<br>\nИзмененная картинка(".$destWidth.'x'.$destHeight.'):<br><img src="'.$img.'" />';
    }
}