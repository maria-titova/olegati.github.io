<? // WR-Gallery v 1.3  //  28.05.06 �.  //  Miha-ingener@yandex.ru

error_reporting  (E_ALL);

include "config.php";


if (isset($_GET['msnum'])) {$msnum=$_GET['msnum'];} else {print"������ - ����������� UID-����. �� ��� ����� ��� ������ �������!"; exit;}
if (is_file("$datadir/$msnum.dat")) { $linesn = file("$datadir/$msnum.dat"); $in=count($linesn); if ($in > 15) {print "$back <B>����� 15 ������������</B> � ���������� ��������� ��������.</center>"; exit;}}

if (!ctype_digit($msnum) or strlen($msnum)<4) {exit(" <h1>$back. ������� ������. ������� ����� �� �����.</h1>");}

if(isset($_GET['event']))  { // ���������� ����������� - ��� 2 ������ ������

if (isset($_POST['name'])) {$name=$_POST['name'];} else {$name="";}
if ($name==="" || strlen($name)>$maxname) {print "$back ���� <B>��� ������, ��� ��������� $maxname ��������!</B></center>"; exit;} $name=str_replace("|","I",$name);
if (isset($_POST['type'])) {$type=$_POST['type'];} else {$type="0";} $type=str_replace("|","I",$type); if (strlen($type)> 2) {print" ������ ������� - \$ type=$type."; exit;}
$msg=$_POST['msg']; if ($msg == "" || strlen($msg) > $maxmsg) {print "$back ��� <B>����������� ���� ��� ��������� $maxmsg ��������.</B></center>"; exit;} $msg=str_replace("|","I",$msg);
if (isset($_POST['email'])) {$email=$_POST['email'];} else {$email="";} $email=str_replace("|","I",$email);

$day=mktime(); $text="$name|$email|$msg|$day|$type|";

$text=str_replace( "&#032;"     ,' '           ,$text);
$text=str_replace( "&"          ,'&amp;'       ,$text);
$text=str_replace( "<!--"       ,'&#60;&#33;--',$text);
$text=str_replace( "-->"        ,'--&#62;'     ,$text);
$text=preg_replace( "/<script/i",'&#60;script' ,$text);
$text=str_replace( ">"          ,'&gt;'        ,$text);
$text=str_replace( "<"          ,'&lt;'        ,$text);
$text=str_replace( "\""         ,'&quot;'      ,$text);
$text=preg_replace( "/\n\n/"    ,'<p>'         ,$text);
$text=preg_replace( "/\n/"      ,'<br>'        ,$text);
$text=preg_replace( "/\\\$/"    ,'&#036;'      ,$text);
$text=preg_replace( "/\r/"      ,''            ,$text);
$text=stripslashes($text);
$text=preg_replace( "/\\\/",'&#092;',$text);
$text=str_replace("\r\n","<br>", $text);
$text=str_replace("\n\n",'<p>',$text);
$text=str_replace("\n",'<br>',$text);
$text=str_replace("\t",' ',$text);
$text=str_replace("\r",' ',$text);
$text=str_replace('  ',' ',$text);

$fp=fopen("$datadir/$msnum.dat","a+");
flock ($fp,LOCK_EX);
fputs($fp,"$text\r\n");
fflush ($fp);//�������� ��������� ������
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("$datadir/$msnum.dat", 0644);
print "<script language='Javascript'>function reload() {location = \"index.php?event=coment&msnum=$msnum\"}; setTimeout('reload()', 800);</script>"; exit;

}  else   {

$rubrika="���������� ����������� � ����";
include "images/$skin/top.html"; // ���������� �����

print"<center><BR><BR><BR><FORM action='addmsg.php?event=add&msnum=$msnum' method=post name=addForm>
<TABLE class=bakfon cellPadding=2 cellSpacing=1><TBODY>
<TR class=toptable><TD height=23 align=middle colSpan=2><B>$rubrika</B></TD></TR>
<TR class=row1 height=23><TD>���� ���: <FONT color=#ff0000>*</FONT></TD><TD><INPUT name=name class=maininput style='FONT-SIZE: 14px; WIDTH: 320px' maxlength=40></td></tr>
<TR class=row2><TD>�����:</TD><TD><INPUT name=email class=maininput style='FONT-SIZE: 14px; WIDTH: 320px' maxlength=$maxzag></TD></TR>
<TR class=row1><TD>����� �����������: <FONT color=#ff0000>*</FONT></TD><TD><TEXTAREA class=maininput name=msg style='FONT-SIZE: 14px; HEIGHT: 100px; WIDTH: 320px'></TEXTAREA></TD></TR>
<TR class=row2><TD>������� ����:</TD><TD><INPUT name=type type=radio value='1'>1 <INPUT name=type type=radio value='2'>2 <INPUT name=type type=radio value='3'>3 
<INPUT name=type type=radio value='4'>4 <INPUT name=type type=radio value='5'>5 <INPUT name=type type=radio value='6'>6 <INPUT name=type type=radio value='7'>7 
<INPUT name=type type=radio value='8'>8 <INPUT name=type type=radio value='9'>9 <INPUT name=type type=radio value='10'>10 </TD></TR>

<TR class=row1><TD colspan=2 height=32 align=middle><INPUT class=longok type=submit value=���������></TD></TR>
</TBODY></TABLE></FORM><BR><BR><BR>";


include "images/bottom.html"; // ���������� �����
}
?>

<center><font size=-2>Powered by <a href="http://www.wr-script.ru/" target="_blank">WR-Gallery</a> &copy; 1.3<br></font></center></body></html>
