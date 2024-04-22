<html><head>
<meta http-equiv="Refresh" content="2; url=http://olegati.spb.ru"></head>
<body BGCOLOR="#CCCCCC">
<?php

$to = "info@olegati.ru";

$subj = "Сообщение с сайта Olegati: ";

$mess = "С сайта olegati.spb.ru было отправленно следующее сообщение:


E-mail клиента: $pole1


Вопрос клиента:

$pole2

";

$headers = "Content-type: text/plain; charset=windows-1251

";

mail($to, $subj, $mess, $headers);

echo "<br><BR><BR><BR><BR><center>Спасибо. Ваше сообщение отправлено! Мы обязательно Вам ответим.</center>";

echo "<p><b>Форма для отправки сообщения создана при помощи MEF - редактора почтовых форм. Посетите сайт автора: <a href=http://www.maxgal.com target=_blank>http://www.maxgal.com</a></b>";

?>
</body>
</html>