<?php

$host='127.0.0.1'; // имя хоста (уточняется у провайдера)
$database='db1'; // имя базы данных, которую вы должны создать
$user='root'; // заданное вами имя пользователя, либо определенное провайдером
$pswd=''; // заданный вами пароль

$arr = array();
$i = 0;

mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL."); //подключаемся к базе
mysql_select_db($database) or die("Не могу подключиться к базе."); // выбираем нашу базу

$query = "select * from trans_lists"; // запрос к нашей базе
$res = mysql_query($query);

while ($row = mysql_fetch_array($res)) {
    # code...
    array_push($arr, $row['paysys_name']." - ".$row['sum(transactions.sum)']); // записываем результат в массив
}
$message = implode("\n", $arr); // преобразовываем наш массив с результатом в строку, что бы можно было отправить по e-mail
$to = "zakhar96@gmail.com";
$subject = "Transactions";

mail($to, $subject, $message);// отправляем на почту 

?>