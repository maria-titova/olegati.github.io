<? // WR-Gallery v 1.3  //  30.06.06 �.  //  Miha-ingener@yandex.ru
//  ���� ���� ���������� ��������� ���������� �� ����.
//  ��������� ������ ����� ����� �� ����� �������� ������ �����, ��
//  �� �������� ������� ������������� ��� ������ ���� � �������:
//  include "config.php"; - ����� 8 ������
//  $lines=file("$datafile"); - ����� 11 ������

include "config.php";

$kolvo="3"; // ���-�� �������� �����
$lines=file("$datafile");
$itogo=count($lines)-1;

print"<table border=1 bordercolor=#ffc72a width=410 height=130 cellpadding=6 cellspacing=0><TR>";

do {$kolvo--;
// �������� ��������� ����� ������ 0
srand((double) microtime()*1000000);
$i=rand(0,$itogo); // �������� ��������� ����� (0...MAX)

$dt=explode("|", $lines[$i]);
$teknum=$itogo+1-$i;
print"<td>
<table width=220 cellpadding=1 cellspacing=8 bgcolor=#E9E9E9><tr><td>
<table width=219 height=270 cellpadding=1 cellspacing=0 bgcolor=#FFFFFF><tr><td valign=top align=center>
<font size=-1>���� � $teknum</font><BR>
<table width=210 height=210 cellpadding=1 cellspacing=0><tr><td align=center height=120 colspan=2><a href='index.php?event=showimg&msnum=$dt[10]'><img src='data/$dt[5]' alt='$dt[0]' border=0></a></td></tr>
<TR height=25><TD colspan=2 align=center>$dt[0]<BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>����������: <B>$dt[8] � $dt[9]</B></small><BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>������: <B>$dt[7]</B> ��.</small><BR></td></tr>
</table>
</td></tr></table>
</td></tr></table>";

} while($kolvo > 0);
print"</td></tr></table>";
?>
