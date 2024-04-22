<?php
session_start();
?>

<html>
<head>
<title>MEF v. 1.0 created by Maxim Galtsov 
</title>
</head>
<body bgcolor=#faedca>

<?php

if (isset($exit))
{
echo "<h3>Спасибо, что воспользовались редактором MEF v. 1.0 Другие скрипты вы всегда можете найти на сайте <a href=http://www.maxgal.com>http://www.maxgal.com</a>";
session_destroy();
if (file_exists("1.txt")) unlink("1.txt");
exit;
}

if (isset($repeat))
{
if (file_exists("1.txt")) unlink("1.txt");
touch("1.txt");
}

echo "<h3><i>Добро пожаловать в MEF v. 1.0</h3>";

if (!isset($step))
{
echo "<p>MEF - редактор почтовых форм. С помощью него вы легко сможете создать нужную вам форму для обратной связи с посетителями вашего сайта.
<br>Обращаться с MEF'ом очень легко. Просто добавляйте нужные вам поля, а затем нажмите кнопку создать форму.<br>Будет создано два файла: mail.php - нужен для отправки сообщений и forma.html - эта ваша форма в html-формате, дизайн который вы легко сможете поменять.<p>Разместите html-код на вашем сайте и файл mail.php и посетители смогут отправлять с вашего сайта вам письма.<br>MEF распространяется бесплатно при условии, если вы не будете менять код данных скриптов, убирать мою небольшую рекламу и т.д.<br>Если вы желаете разместить MEF в каком-либо каталоге, диске спишитесь со мной (<a href=\"mailto:info@maxgal.com\">info@maxgal.com</a>)<p>С уважением, Максим Гальцов.<br>Скрипты любой сложности здесь: <a href=http://www.maxgal.com target=_blank>http://www.maxgal.com</a><br><a href=http://forum.maxgal.com>Форум MEF</a><p>";
}

echo "<table border=0 width=60% align=center>";
echo "<tr>";
echo "<td align=center><form action=index.php?addinput method=post><input type=submit value=\"Добавить текстовое поле(INPUT)\"></form><td align=center><form action=index.php?addtextarea method=post><input type=submit value=\"Добавить поле ввода текста(TEXTAREA)\"></form><td align=center><form action=index.php?addselect method=post><input type=submit value=\"Добавить список(SELECT)\"></form></tr></table><table border=0 align=center width=40%><tr><td align=center><form action=index.php?look method=post><input type=submit value=\"Посмотреть как будет выглядеть форма\"></form><td align=center><form action=index.php?ended method=post><input type=submit value=\"Закончить редактирование, создать необходимые файлы\"></form></tr></table><table border=0 align=center width=40%><tr><td align=center colspan=1><form action=index.php?repeat method=post><input type=submit value=\"Начать работу над новой формой\"></form><td align=center colspan=1><form action=index.php?exit method=post><input type=submit value=\"Закончить работу с редактором\"></form></tr>";
echo "</table><p>";

if (isset($ended) && isset($step))
{

  if (isset($end))
  {
  touch("mail.php");
  $fp = fopen("mail.php", 'w');
  $txtf = "<?php\r\n";
  $txtf .="\$to = \"$email\";\r\n";
  $txtf .="\$subj = \"$subj\";\r\n";
  $mess = "С вашего сайта было отправленно сообщение.\r\n";

    $data = File("1.txt");
    for ($i=0;$i<count($data);$i++)
    {
    $data_exp = explode(";", $data[$i]);
      if ($data_exp[0] == "input")
      {
      $mess .= "$data_exp[5]\r\n\$$data_exp[4]\r\n";
      }
      if ($data_exp[0] == "textarea")
      {
      $mess .= "$data_exp[4]\r\n\$$data_exp[1]\r\n";
      }
      if ($data_exp[0] == "select")
      {
      $mess .= "$data_exp[5]\r\n\$$data_exp[1]\r\n";
      }
    }
  
  $txtf .= "\$mess = \"$mess\";\r\n";
  $txtf .= "\$headers = \"Content-type: text/plain; charset=windows-1251\r\n\";\r\n";
  $txtf .= "mail(\$to, \$subj, \$mess, \$headers);\r\n";
  $txtf .= "echo \"Спасибо. Ваше сообщение отправлено!\";\r\necho \"<p><b>Форма для отправки сообщения создана при помощи MEF - редактора почтовых форм. Посетите сайт автора: <a href=http://www.maxgal.com target=_blank>http://www.maxgal.com</a></b>\";\r\n";
  $txtf .= "?>";
  fputs($fp, $txtf);
  fclose($fp);
  touch("forma.html");
  $fp = fopen("forma.html", 'w');
  $txtf = "<html><body bgcolor=#faedca><!-- o65 --><!-- c65 -->";
  $txtf .= "<form action=mail.php method=post><table border=0 align=center width=60%>";

  for ($i=0;$i<count($data);$i++)
  {
  $data_exp = explode(";", $data[$i]);
  if ($data_exp[0] == "input")
  {
  $txtf .= "<tr><td align=left>$data_exp[5]<td align=center><$data_exp[0] type=$data_exp[1] size=$data_exp[2] name=$data_exp[4]></tr>";
  }
  if ($data_exp[0] == "textarea")
  {
  $txtf .= "<tr><td align=left>$data_exp[4]<td align=center><$data_exp[0] name=$data_exp[1] cols=$data_exp[2] rows=$data_exp[3]></textarea></tr>";
  }
  if ($data_exp[0] == "select")
  {
  $txtf .= "<tr><td align=left>$data_exp[5]<td align=center><$data_exp[0] name=$data_exp[1] size=$data_exp[2]><option value=$data_exp[3]>$data_exp[4]</select></tr>";
  }  
  }
  
  $txtf .= "<tr><td align=left colspan=2><input type=submit value=\"Отправить сообщение\"></tr>";
  $txtf .= "</table></form>";
  $txtf .= "</body></html>";
  fputs($fp, $txtf);
  fclose($fp);
  echo "<p>Необходимые файлы созданы!<p>";
  exit;
  }

$data = File("1.txt");
if (empty($data)) { echo "<p><b>Форма еще не создана!</b><p>"; exit; }
echo "<form action=index.php?ended&end method=post>";
echo "<p><b>Необходимые настройки</b><p>";
echo "Куда будут приходить письма с вашего сайта? <input type=text name=email value=\"e-mail\" size=20><br>";
echo "Тема письма? (например, новое сообщение от посетителя): <input type=text name=subj size=20><br>";
echo "<input type=submit value=\"Создать форму!\">";
echo "</form>";
exit;
}

if (isset($look) && isset($step))
{
$data = File("1.txt");
if (empty($data)) { echo "<p><b>Форма еще не создана!</b><p>"; exit; }
echo "<table border=0 align=center width=60%>";
  for ($i=0;$i<count($data);$i++)
  {
  $data_exp = explode(";", $data[$i]);
  if ($data_exp[0] == "input")
  {
  echo "<tr><td align=left>$data_exp[5]<td align=center><$data_exp[0] type=$data_exp[1] size=$data_exp[2] name=$data_exp[4]></tr>";
  }
  if ($data_exp[0] == "textarea")
  {
  echo "<tr><td align=left>$data_exp[4]<td align=center><$data_exp[0] name=$data_exp[1] cols=$data_exp[2] rows=$data_exp[3]></textarea></tr>";
  }
  if ($data_exp[0] == "select")
  {
  echo "<tr><td align=left>$data_exp[5]<td align=center><$data_exp[0] name=$data_exp[1] size=$data_exp[2]><option value=$data_exp[3]>$data_exp[4]</select></tr>";
  }
  }
echo "<tr><td align=left colspan=2><input type=submit value=\"Отправить сообщение\"></tr>";
echo "</table>";
exit;
}

if (isset($addinput) && isset($step))
{
$fp = fopen("1.txt", 'a');
fputs($fp, "input;text;size;value;name;описаниеr\n");
fclose($fp);
echo "<p>Текстовое поле добавлено. Отредактируйте его.<p>";
}

if (isset($addtextarea) && isset($step))
{
$fp = fopen("1.txt", 'a');
fputs($fp, "textarea;name;cols;rows;описание\r\n");
fclose($fp);
echo "<p>Поле ввода текста добавлено. Отредактируйте его.<p>";
}

if (isset($addselect) && isset($step))
{
$fp = fopen("1.txt", 'a');
fputs($fp, "select;name;size;option;value;описание\r\n");
fclose($fp);
echo "<p>Список добавлен. Отредактируйте его.<p>";
}

if (isset($edit))
{
$data = File("1.txt");
$fp = fopen("1.txt", 'w');
  for ($i=0;$i<count($data);$i++)
  {
    if ($i == $edit)
    {
    $data_exp = explode(";", $data[$i]);
    if ($data_exp[0] == "input") fputs($fp, "$data_exp[0];$type;$sizep;$data_exp[3];$name;$opis\r\n");
    if ($data_exp[0] == "textarea") fputs($fp, "$data_exp[0];$name;$col;$row;$opis\r\n");
    if ($data_exp[0] == "select") fputs($fp, "$data_exp[0];$name;$size;$zn;$valuez;$opis\r\n");
    }
    else
    fputs($fp, $data[$i]);
  }
fclose($fp);
echo "<p>Отредактировано!<p>";
}

if (isset($step))
{

$data = File("1.txt");
  for ($i=0;$i<count($data);$i++)
  {
  $data_exp = explode(";", $data[$i]);

  if ($data_exp[0] == "input")
  {
  echo "$data_exp[5] <$data_exp[0] type=$data_exp[1] size=$data_exp[2] name=$data_exp[4]><br>";
  echo "<form action=index.php?edit=$i method=post>Описание поля(например, Ваша фамилия?): <input type=text name=opis size=20> Размер поля: <input type=text name=sizep size=3><br>Название поля(для кода, только латинские буквы): <input type=text name=name size=6> Тип поля: <select name=type><option value=text>text<option value=hidden>hidden<option value=password>password<option value=checkbox>checkbox<option value=radio>radio</select><br><input type=submit value=\"отредактировать\"></form>";
  }
  if ($data_exp[0] == "textarea")
  {
  echo "$data_exp[4] <$data_exp[0] name=$data_exp[1] cols=$data_exp[2] rows=$data_exp[3]></textarea><br>";
  echo "<form action=index.php?edit=$i method=post>Описание поля(например, Ваше сообщение?): <input type=text name=opis size=20> Столбцов: <input type=text name=col size=3> Строк: <input type=text name=row size=3><br>Название поля(для кода, только латинские буквы): <input type=text name=name size=6><br><input type=submit value=\"отредактировать\"></form>";
  }
  if ($data_exp[0] == "select")
  {
  echo "$data_exp[5] <$data_exp[0] name=$data_exp[1] size=$data_exp[2]><option value=$data_exp[3]>$data_exp[4]</select><br>";
  echo "<form action=index.php?edit=$i method=post>Описание списка(например, Город проживания?): <input type=text name=opis size=20> Размер списка: <input type=text name=size size=3><br>Название поля(для кода, только латинские буквы): <input type=text name=name size=6><br>Первый выбор (например, Москва): <input type=text name=valuez size=15> Значение выбора(например, 1): <input type=text name=zn size=15><br><input type=submit value=\"отредактировать\"></form>";
  }

  }

}

if (!isset($step))
{
touch("1.txt");
if (file_exists("mail.php")) unlink("mail.php");
if (file_exists("forma.html")) unlink("forma.html");
$step = 1;
session_register("step");
}


?>

</body>
</html>