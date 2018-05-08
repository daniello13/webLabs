<?php
$link = mysqli_connect('localhost', 'root','');
if (!$link) {
    die('Ошибка соединения: ' . mysqli_error());
}
$sql = 'CREATE DATABASE shop CHARACTER SET utf8 COLLATE utf8_general_ci';
mysqli_query($link, $sql);


$sql = "use shop";
mysqli_query($link, $sql);
$sql = "CREATE TABLE types
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    names VARCHAR(50) NOT NULL
)";
mysqli_query($link, $sql);
$sql = "CREATE TABLE tovar
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(50) NOT NULL,
    names VARCHAR(20) NOT NULL,
    proizv  VARCHAR(20) NOT NULL,
    opis VARCHAR (200) NOT NULL,
    type_id INT NOT NULL,
    cost INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES types(id)
    ON UPDATE RESTRICT
    ON DELETE CASCADE   
)";
mysqli_query($link, $sql);
$sql = "CREATE TABLE comment 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    names VARCHAR(20) NOT NULL,
    email  VARCHAR(25) NOT NULL,
    IP VARCHAR (200) NOT NULL,
    comment NVARCHAR (200) NOT NULL,
    id_tovar INT NOT NULL,
    FOREIGN KEY (id_tovar) REFERENCES tovar(id)
    ON UPDATE RESTRICT
    ON DELETE CASCADE   
)";
mysqli_query($link, $sql);
$sql="INSERT INTO types (names) VALUES
    ('Антивирус'),
    ('Антиаллергик'),
    ('Разное')
";
mysqli_query($link, $sql);
$sql="INSERT INTO tovar (photo,names, proizv, opis, type_id, cost) VALUES
    ('img/amizon-big.jpg','Amizon', 'LTD Farma', 'Amizon is used for treatment and prevention influenza and RVIs; infectious mononucleosis; measles, rubella, chickenpox, parotitic infection cat scratch disease.',1, 1),
    ('img/cetrin.jpg','Cetrin', 'Ind_Medicals', 'Cetirizine, prominently marketed under the brand name Zyrtec among others, is a potent second-generation antihistamine used in the treatment of hay fever, allergies, angioedema, and urticaria.', 2, 5),
    ('img/iod.jpg','Iod', 'Azov', 'Iodine is a chemical element with symbol I and atomic number 53. The heaviest of the stable halogens, it exists as a lustrous, purple-black metallic solid.', 3, 1)
";
mysqli_query($link, $sql);
$sql="INSERT INTO comment (names, email, IP, comment, id_tovar) VALUES
    ('Daniel', 'daniello13@mail.ru', '192.168.11.5', 'Замечательно. Рекомендую держать дома', 1),
    ('Maks', 'maximum@outlook.com', '192.465.15.12', 'Замечательное лекарство, всем советую...', 2),
    ('Irina', 'ruwm@outlook.com', '175.45.45.12', 'Раны просто затягиваются', 3),
    ('Derek', 'derekussik@ruv.com', '166.178.45.19', 'Иногда помогает', 1),
    ('Gena', 'gennadiy@kuch.en', '178.122.14.72', 'Что-то в этом есть', 2),
    ('JIeHiH', 'jiehih@mail.ru', '208.45.86.70', 'Восстать из саркофага не поможет', 3)
";
echo mb_detect_encoding('Все хуйня');
mysqli_query($link, $sql);
mysqli_close($link);
?>