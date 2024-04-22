<? // WR-Gallery v 1.3  //  30.06.06 г.  //  Miha-ingener@yandex.ru
//  Этот файл показывает СЛУЧАЙНУЮ ФОТОГРАФИЮ из базы.
//  Инклюдить данную фишку можно на любой странице Вашего сайта, но
//  Не забудьте указать относительный или полный путь в строках:
//  include "config.php"; - здесь 8 строка
//  $lines=file("$datafile"); - здесь 11 строка

include "config.php";

$kolvo="3"; // Кол-во выодимых анкет
$lines=file("$datafile");
$itogo=count($lines)-1;

print"<table border=1 bordercolor=#ffc72a width=410 height=130 cellpadding=6 cellspacing=0><TR>";

do {$kolvo--;
// выбираем случайное число больше 0
srand((double) microtime()*1000000);
$i=rand(0,$itogo); // выбираем случайное число (0...MAX)

$dt=explode("|", $lines[$i]);
$teknum=$itogo+1-$i;
print"<td>
<table width=220 cellpadding=1 cellspacing=8 bgcolor=#E9E9E9><tr><td>
<table width=219 height=270 cellpadding=1 cellspacing=0 bgcolor=#FFFFFF><tr><td valign=top align=center>
<font size=-1>Фото № $teknum</font><BR>
<table width=210 height=210 cellpadding=1 cellspacing=0><tr><td align=center height=120 colspan=2><a href='index.php?event=showimg&msnum=$dt[10]'><img src='data/$dt[5]' alt='$dt[0]' border=0></a></td></tr>
<TR height=25><TD colspan=2 align=center>$dt[0]<BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>Разрешение: <B>$dt[8] х $dt[9]</B></small><BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>Размер: <B>$dt[7]</B> Кб.</small><BR></td></tr>
</table>
</td></tr></table>
</td></tr></table>";

} while($kolvo > 0);
print"</td></tr></table>";
?>
