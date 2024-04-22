<?php
$to = "info@bestposition.ru";
$subj = "Сообщение с сайта Olegati: ";
$mess = "С вашего сайта было отправленно сообщение.
Ваш e-mail?

$pole1
Ваш вопрос...

$pole2
";
$headers = "Content-type: text/plain; charset=windows-1251
";
mail($to, $subj, $mess, $headers);
echo "Спасибо. Ваше сообщение отправлено!";
echo "<p><b>Форма для отправки сообщения создана при помощи MEF - редактора почтовых форм. Посетите сайт автора: <a href=http://www.maxgal.com target=_blank>http://www.maxgal.com</a></b>";
?>