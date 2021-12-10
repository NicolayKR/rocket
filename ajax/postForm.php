<?php
$fio =  $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$fio = htmlspecialchars($fio);
$email = htmlspecialchars($phone);
$email = htmlspecialchars($email);

$to = "n.kryuchkov@enterprise-it.ru";
$message = '
<html>
<body>
<center>
<table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
 <tr><td colspan=2 align=center bgcolor="#E4E4E4"><b>Заявка на прием</b></td></tr>
 <tr>
  <td><b>ФИО</b></td>
  <td>'.$fio.'</td>
 </tr>
 <tr>
  <td><b>Телефон</b></td>
  <td><a href="tel:'.$phone.'">'.$phone.'</a></td>
 </tr>
 <tr>
  <td><b>Почта</b></td>
  <td>'.$email.'</td>
 </tr>
</table>
</center>
</body>
</html>';
$headers  = "Content-type: text/html; charset=utf-8\r\n";
if(mail($to, "Заявка на прием", $message, $headers)){
    echo 'success';
};
?>
