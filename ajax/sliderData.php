<?php
function p($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
$conn = new mysqli("localhost", "root", "root", "rocket_test");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM slider";
$data = Array();
if($result = $conn->query($sql)){
    foreach($result as $row){
        $data[] = $row;
    }
} else{
    echo "Ошибка: " . $conn->error;
}

foreach ($data as $index => $current_slide){
    $data[$index]['services'] = explode(',',$current_slide['services']);
}
echo json_encode($data);
$conn->close();
//CREATE TABLE slider(id INT NOT NULL AUTO_INCREMENT,title TINYTEXT, subtitle TINYTEXT, services TEXT, new_price INT,old_price INT, CONSTRAINT slider_pk PRIMARY KEY (id)) - Скрипт создание таблицы в бд
//INSERT INTO slider(title, subtitle, services, new_price, old_price)
//    VALUES ('Check-UP','для мужчин', 'Гормональный скрининг,Тестостерон,Свободный тестостерон
//,Глобулин, связывающий половые гормоны', 2800, 3500);- Пример создание записи, решил оставить такой формат ввода.

