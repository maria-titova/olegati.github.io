<?php
$to = "info@bestposition.ru";
$subj = "��������� � ����� Olegati: ";
$mess = "� ������ ����� ���� ����������� ���������.
��� e-mail?

$pole1
��� ������...

$pole2
";
$headers = "Content-type: text/plain; charset=windows-1251
";
mail($to, $subj, $mess, $headers);
echo "�������. ���� ��������� ����������!";
echo "<p><b>����� ��� �������� ��������� ������� ��� ������ MEF - ��������� �������� ����. �������� ���� ������: <a href=http://www.maxgal.com target=_blank>http://www.maxgal.com</a></b>";
?>