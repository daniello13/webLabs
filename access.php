
<?php
    $title = "access.php";
    $style = "css/style.css";
    $news_title = "Вход";
?>
<?php
    ?>
<?php
         if (isset($_POST['login']))
         {
            $log=$_POST['login'];
            $pas=$_POST['pass'];
            
            require_once "header.php"; 
            $_SESSION['log']=$log;
            if($log=="daniello13@mail.ru" && $pas == "Root4ever"){
				echo "<br>Вы залогинились как админ.";
            }
            else
                echo "<br>Здравствуйте, ".$log." ";
            
         }
         
    ?>
<?php
    require_once "footer.php" ?>