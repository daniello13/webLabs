<?php
    $title = "CreateComment.php";
    $style = "css/style.css";
    $news_title = "Yours";
?>
<?php 
    require_once "header.php";
    $link = mysqli_connect('localhost', 'root','','shop');
    if (!$link) {
        die('Ошибка соединения: ' . mysqli_error());
    }
    $query ="SELECT tovar.names FROM tovar";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $types = array();
    //получаем названия товаров
    if($result){
        $rows = mysqli_num_rows($result); // количество полученных строк
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            $types[$i]=$row[0];
            //echo "<tr>";
            
        }
        
        // очищаем результат
        mysqli_free_result($result);
    }
?>
<?php
    if (isset($_POST['selectq'])&&isset($_POST['comment'])&&isset($_POST['login'])&&isset($_POST['email'])&&isset($_POST['ip'])){
        $com=$_POST['comment'];
        $log=$_POST['login'];
        $em=$_POST['email'];
        $ip=$_POST['ip'];
        $id_tov;
        $query ="SELECT tovar.id FROM tovar WHERE tovar.names='".$_POST['selectq']."'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result){
            $rows = mysqli_num_rows($result);
            $id_tov=mysqli_fetch_row($result);
        }
        $query="INSERT INTO comment(names, email, ip, comment, id_tovar) VALUES ('$log', '$em', '$ip', '$com', '$id_tov[0]')";
        $result=mysqli_query($link, $query) or  die("Ошибка " . mysqli_error($link));
    }
    ///'); select 
?>
<form action="CreateComment.php" method="POST">
    <p><strong><br>Введите комментарий</strong></p>
    <input type="textarea" size="50" name="comment"/>
    <p><strong><br>Введите логин</strong></p>
    <input type="text" size="20" name="login"/>
    <p><strong><br>Введите почту</strong></p>
    <input type="text" size="20" name="email"/>
    <p><strong><br>Введите ip</strong></p>
    <input type="text" size="17" name="ip"/>
    <p><strong><br>Выберите товар</strong></p>
    <p><select name='selectq' size='1'>
    <?php
    for($i=0; $i<count($types);++$i){
        $name=$types[$i];
        echo "<option value='";
        echo $name;
        echo "'>";
        echo $types[$i];
        echo "</option>"; 
    }?>
    </select>
    <input type="submit" value="Отправить"></p>
</form>