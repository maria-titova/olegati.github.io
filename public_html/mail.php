<html><head>
<meta http-equiv="Refresh" content="2; url=http://olegati.spb.ru"></head>
<body BGCOLOR="#CCCCCC">
<?php

$to = "info@olegati.ru";

$subj = "��������� � ����� Olegati: ";

$mess = "� ����� olegati.spb.ru ���� ����������� ��������� ���������:


E-mail �������: $pole1


������ �������:

$pole2

";

$headers = "Content-type: text/plain; charset=windows-1251

";

mail($to, $subj, $mess, $headers);

echo "<br><BR><BR><BR><BR><center>�������. ���� ��������� ����������! �� ����������� ��� �������.</center>";

echo "<p><b>����� ��� �������� ��������� ������� ��� ������ MEF - ��������� �������� ����. �������� ���� ������: <a href=http://www.maxgal.com target=_blank>http://www.maxgal.com</a></b>";

?>
</body>
</html>