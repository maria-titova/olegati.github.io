<? // WR-Gallery v 1.3  //  28.05.06 �.  //  Miha-ingener@yandex.ru

error_reporting (E_ALL);

include "config.php";

$shapka="<html><head><title>����������� - $glname</title>
<META HTTP-EQUIV='Pragma' CONTENT='no-cache'>
<META HTTP-EQUIV='Cache-Control' CONTENT='no-cache'>
<META content='text/html; charset=windows-1251' http-equiv=Content-Type>
<style>BODY {FONT-FAMILY: Verdana}
a {text-decoration: underline; color: #000000;}
a:visited {text-decoration: underline; color: #000000;}
a:hover, a:active {text-decoration: underline; color: #FF9C00;}
A.about_menu {TEXT-DECORATION: none}
A.about_menu:hover {COLOR: #996600}
A.pagesLine {COLOR: #006600}
A.menu {COLOR: #666666; TEXT-DECORATION: none}
A.menu:hover {COLOR: #009900; TEXT-DECORATION: none}
.small {FONT-SIZE: 11px;}
.smallest {FONT-SIZE: 9px;}
.maxiinput {FONT-SIZE: 14px; WIDTH: 300px; font-size: 13; color: 000000; border: #808080 1 solid;}
.maininput {FONT-SIZE: 14px; WIDTH: 140px; font-size: 13; color: 000000; border: #808080 1 solid;}
TD {FONT-SIZE: 11px}
TD.menu {FONT-SIZE: 11px; FONT-WEIGHT: bold}
TD.big_item_title {FONT-SIZE: 13px; FONT-WEIGHT: bold}
TD.pagesLine {FONT-SIZE: 10px}
</STYLE></head><body bgcolor=#F3F3F3><center>

<table width=100% cellpadding=1 cellspacing=0 border=1 bordercolor=#666666>
<TR height=30><TD align=center class=big_item_title><b>
<a href='admin.php?pswrd=$password'>������� �������</a> :: 
<a href='admin.php?pswrd=$password&event=skin'>����������������</a> :: 
<a href='index.php?event=addform'>�������� ����</a> :: 
<a href='index.php'>��������� �� �������</a>
</td></tr><tr><td width=100%>";


$shapkasmall="<html><head><META content='text/html; charset=windows-1251' http-equiv=Content-Type></head><body>";


if (!isset($_GET['pswrd'])) // �����������

{echo "$shapkasmall<BR><BR><BR><center>
<form action='admin.php' method=GET name=pass>������� ������: <BR><input type=password size=17 name=pswrd style='WIDTH: 100px; height:20px; background-color: FFFFFF; font-size: 15; color: 000000; border: #808080 1 solid;'><BR><input type=submit value='�����' style='WIDTH: 80px; height:20px; background-color: dddddd; font-size: 15; color: 000000; border: #000000 1 solid;'>
<SCRIPT language=JavaScript>document.pass.pswrd.focus();</SCRIPT><BR><BR><BR>";}
else {if ($_GET['pswrd']==="$password")  { // ����������� �������� �������



// ���� �������� ���������� ���� � ���������
if (isset($_GET['id'])) { $page=$_GET['page'];
$file=file($datafile); $itogo=count($file)-1;
if ($msginout==1) {$id=$itogo-$_GET['id'];} else {$id=$itogo-$_GET['id']+2;}
if ($itogo<1) {print"$back. ����� �������� ������ ���� ���������!"; exit;}

$lines=file($datafile); $itogo=count($lines); $i=0; $dt=explode("|", $lines[$id]);
if (is_file("$datadir/$dt[5]")) unlink ("$datadir/$dt[5]");  // ������� ����� �����������
if (is_file("$datadir/$dt[6]")) unlink ("$datadir/$dt[6]");  // ������� ������� �����������
if (is_file("$datadir/$dt[10].dat")) unlink ("$datadir/$dt[10].dat"); // ������� ���� � �������������

$fp=fopen($datafile,"w");
flock ($fp,LOCK_EX);
for ($i=0;$i< sizeof($file);$i++) { if ($i==$id) {unset($file[$i]);} }
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("$datafile", 0644);
Header("Location: admin.php?pswrd=$password&page=$page"); exit; }




// ���� �������� ����������� � ����������
if (isset($_GET['remxd']))  {
$msnum=$_GET['msnum']; $remxd=$_GET['remxd'];
$file=file("$datadir/$msnum.dat");
// ������� ������ � ������������
$fp=fopen("$datadir/$msnum.dat","w");
flock ($fp,LOCK_EX);
for ($i=0; $i< sizeof($file); $i++) { if ($i==$remxd) {unset($file[$i]);} }
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("$datadir/$msnum.dat", 0644);
if (count($file)==0) {unlink ("$datadir/$msnum.dat");}
Header("Location: admin.php?pswrd=$password&event=coment&msnum=$msnum"); exit;}





// ���� ����������� �����/���� ������� ��� ������
if(isset($_GET['movetopic'])) { if ($_GET['movetopic'] !="") {
$move1=$_GET['movetopic']; $where=$_GET['where']; 
if ($where=="0") {$where="-1";}
$move2=$move1-$where;
$file=file($datafile); $imax=sizeof($file);
if (($move2>=$imax) or ($move2<"0")) {exit(" ���� ���� �������!");}
$data1=$file[$move1]; $data2=$file[$move2];

$fp=fopen($datafile,"a+");
flock ($fp,LOCK_EX); 
ftruncate ($fp,0);//������� ���������� ����� 
// ������ ������� ��� �������� �������
for ($i=0; $i<$imax; $i++) {if ($move1==$i) {fputs($fp,$data2);} else  {if ($move2==$i) {fputs($fp,$data1);} else {fputs($fp,$file[$i]);}}}
fflush ($fp);
flock ($fp,LOCK_UN);
fclose($fp);
Header("Location: admin.php?pswrd=$password"); exit; }}




if (isset($_GET['event'])) {
if ($_GET['event']=="add") { // if ($event =="add")

$name=$_POST['name']; $msg=$_POST['msg']; $email=$_POST['email']; 
if (isset($_POST['page'])) {$page=$_POST['page'];} else {$page=1;}
if ($name=="" || strlen($name) > $maxname) {print "$back �� �� ����� ���, ��� ������ ������� ������� ���!</B></center>"; exit;}
if ($msg=="" || strlen($msg) > $maxmsg) {print "$back ���� ��������� ��� ������ ��� ��������� $maxmsg ��������.</B></center>"; exit;}

// �������� ������ ������� � ������ � ���������
$email=substr($email,0,30);
$msg=stripslashes($msg);
$msg=htmlspecialchars($msg);
$msg=str_replace("|","I",$msg);
$msg=str_replace("\r\n","<br>",$msg);


// ���� ������� - ��������������
if (isset($_GET['rd'])) { $rd=$_GET['rd'];
$fdate=$_POST['fdate'];$ftime=$_POST['ftime']; //$rd - ����� ������������� ������
$smallfoto=$_POST['smallfoto'];
$foto=$_POST['foto'];
$fotoksize=$_POST['fotoksize'];
$fwidth=$_POST['fwidth'];
$fheight=$_POST['fheight'];
$uid=$_POST['uid'];

$text="$msg|$name|$email|$fdate|$ftime|$smallfoto|$foto|$fotoksize|$fwidth|$fheight|$uid||";
$file=file($datafile);
$fp=fopen($datafile,"a+");
flock ($fp,LOCK_EX);
ftruncate ($fp,0);//������� ���������� �����
for ($i=0;$i< sizeof($file);$i++) {if ($rd!=$i) {fputs($fp,$file[$i]);} else {fputs($fp,"$text\r\n");}}
fflush ($fp);//�������� ��������� ������
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("$datafile", 0644);
}
Header("Location: admin.php?pswrd=$password&page=$page"); exit; }





if ($_GET['event']=="coment")  {$msnum=$_GET['msnum']; // �������� ������������ � ����
$lines=file($datafile); $maxi=count($lines); $i="0";

do {$dt=explode("|", $lines[$i]); $i++;
if ($dt[10]===$msnum) { print"$shapka<BR><center>
<table width=220 cellpadding=1 cellspacing=8 bgcolor=#E9E9E9><tr><td>
<table width=219 height=240 cellpadding=1 cellspacing=0 bgcolor=#FFFFFF><tr><td valign=top align=center>
<font size=-1>���� � $i</font><BR>
<table border=0 width=210 height=210 cellpadding=1 cellspacing=0><tr><td align=center height=120 colspan=2><a href='index.php?event=showimg&msnum=$msnum'><img src='data/$dt[5]' alt='$dt[0]' border=0></a></td></tr>
<TR height=25><TD colspan=2 align=center>$dt[0]<BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>����������: <B>$dt[8] � $dt[9]</B></small><BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>������: <B>$dt[7]</B> ��.</small><BR></td></tr></table></td></tr></table></td></tr></table>"; }
} while($i < $maxi);

if (is_file("$datadir/$msnum.dat")) {
$rlines=file("$datadir/$msnum.dat"); $ri=count($rlines); $bals=0; $all=0;
print"<BR><table bgcolor=#E9E9E9 align=center cellPadding=2 cellSpacing=1 width=560><TR><TD class=main align=center height=25 width=560 bgcolor=#DDDDDD colspan=4><B>����������� �����������:</B></TD></TR>
<TR bgcolor=#FFFFFF height=20 align=center><TD>���, �����, ����</TD><TD>����� �����������</TD><TD>������</TD><TD>.X.</TD></TR>";
do {$ri--; $edt=explode("|",$rlines[$ri]);
$edt[3]=date("d.m.Y H:i:s",$edt[3]);
if ($edt[4]!=0) {$bals=$bals+$edt[4]; $all++;} else {$edt[4]="-";}
print"<TR bgcolor=#FFFFFF><TD><B>$edt[0]</B><BR>$edt[1]<BR>$edt[3]</TD><TD>$edt[2]</TD><TD align=center>$edt[4]</TD><td align=center bgcolor=#FF2244><B><a href='admin.php?pswrd=$password&msnum=$msnum&remxd=$ri'>.X.</a></B></TD></TR>";
} while($ri>0);
if ($bals==0) {$itogobals="-";} else {$itogobals=round($bals*10/$all)/10;}
print "</TD></TR><TR bgcolor=#FFFFFF><TD colspan=4 align=center height=28><font style='FONT-SIZE: 13px'>������� ������ ����: <B>$itogobals</B> / 10</font></TD></TR>
<TR><TD height=35 bgcolor=white colspan=4 align=center><a href='addmsg.php?id=&msnum=$msnum'><B>�������� �����������</B></a></TD></TR></TABLE><BR>";
}} // $event=="coment"



if ($_GET['event']=="skin")  {

$host=$_SERVER["HTTP_HOST"]; $self=$_SERVER["PHP_SELF"];
$gurl="http://$host$self";
$gurl=str_replace("admin.php", "", $gurl);

if ($sendmail=="1") {$m1="checked"; $m2="";} else {$m2="checked"; $m1="";}
print "$shapka <BR><center><B><font size=+1>����������������</font></b><BR><BR>
<table border=1 width=710 align=center cellpadding=3 cellspacing=0 bordercolor=#DDDDDD><tr bgcolor=#BBBBBB height=25 align=center>
<td><B>��������</B></td><td><B>��������</B></td></TR><form action=admin.php?pswrd=$password&event=config method=POST name=REPLIER>
<tr bgcolor=#FFFFFF><td><B>��� �������</B> ������������ � ��������� *</td><td><input type=text value='$glname' name=glname maxlength=80 size=60></tr></td>
<tr bgcolor=#EEEEEE><td><B>�����</B> �����������</td><td><textarea cols=50 rows=4 size=500 name=maintext>$maintext</textarea></tr></td>
<tr bgcolor=#FFFFFF><td><B>�����</B> ������ / <B>������</B> ���������</td><td><input type=text value='$adminemail' name=adminemail size=30>&nbsp;&nbsp;&nbsp;&nbsp; <input type=radio name=sendmail value=\"1\"$m1> ��&nbsp;&nbsp; <input type=radio name=sendmail value='0'$m2> ���</tr></td>
<tr bgcolor=#EEEEEE><td><B>������</B> ������</td><td><input type=text value='$password' name=password maxlength=15 size=15></tr></td>
<tr bgcolor=#FFFFFF><td><B>������ / ������</B> ����-�����������</td><td><input type=text value='$smwidth' name=smwidth maxlength=4 size=10> &nbsp;&nbsp; .:. &nbsp;&nbsp; <input type=text value='$smheight' name=smheight maxlength=4 size=10></tr></td>
<tr bgcolor=#EEEEEE><td><B>������</B> �� ������� �������� ����� *</td><td><input type=text value=\"$mainlink\" name=mainlink size=60></tr></td>
<tr bgcolor=#FFFFFF><td><B>����. ������ ���������</B> � ������</td><td><input type=text value='$max_file_size' name=max_file_size maxlength=6 size=20> ������������� ����� ������ ���������!</tr></td>
<tr bgcolor=#FFFFFF><td><B>������ / ������</B> ������������ ����������� � �������� �� �����</td><td><input type=text value='$maxwidth' maxlength=4 name=maxwidth size=10> &nbsp;&nbsp; .:. &nbsp;&nbsp; <input type=text value='$maxheight' name=maxheight maxlength=4 size=10></tr></td>
<tr bgcolor=#EEEEEE><td>���-�� <B>��������</B> � �������</td><td><input type=text value='$colrubperpage' name=colrubperpage maxlength=1 size=10> &nbsp; ����������� �������� �� 1 �� 9</tr></td>
<tr bgcolor=#FFFFFF><td>���������� �� ��������</td><td><input type=text value='$qq' name=qq size=10 maxlength=2></tr></td>
<tr bgcolor=#EEEEEE><td>������������� <B>���� �� �����</B> � ������� ����� </td><td><input type=text value='$datadir' name=datadir size=20> &nbsp; &nbsp; �� ���������: &quot<B><U>./data</U></B>&quot.</tr></td>
<tr bgcolor=#FFFFFF><td>��� ����� <B>��</B></td><td><input type=text value='$datafile' name=datafile size=20></tr></td>
<tr bgcolor=#EEEEEE><td>������� ��� ����� �� <B>������</B> �������</td><td><input type=text value='$skin' name=skin size=20></tr></td>
<tr bgcolor=#FFFFFF><td>����. ����� <BR><B>����� / ��������� / �����������</B></td><td><input type=text value='$maxname' name=maxname maxlength=2 size=10> &nbsp;&nbsp; .:. &nbsp;&nbsp; <input type=text value='$maxmsg' name=maxmsg maxlength=3 size=10> &nbsp;&nbsp; .:. &nbsp;&nbsp; <input type=text value='$maxzag' name=maxzag maxlength=4 size=10></tr></td>
<tr bgcolor=#EEEEEE><td><B>C���������</B> ����������</td><td><select class=input name=msginout><option value='$msginout'>�������</option><option value='1'>�� ��������</option><option value='0'>�� �����������</option></select></tr></td>
</table><BR><center><table><tr><td><input type=submit value='��������� ������������'></form></td></tr></table>
<font color=red>*</font> �� ����������� ����������� � html-����: <B>\$ \" </B> - �� ������ \"�������\" ���� ������������!<BR>
<BR>��� ��� �������� ���-�� ����� � ������� ����� <B>�������� �� php-��������</B>:
<textarea cols=70 rows=3 size=500>
\$glines=file(\"$gurl$datafile\");
\$glmaxi=count(\$glines);
print\"� ������� ������ \$glmaxi �����.\";</textarea></TBODY></TABLE>";
}

if ($_GET['event']=="config")  {

// ������ �� ������. ��������, ��� � ������� ������ ���������� �������...
$gl=stripslashes($_POST['glname']); $gl=str_replace("\\","/",$gl);
$gl=str_replace("<?","< ?",$gl); $gl=str_replace("?>","? >",$gl);
$gl=str_replace("\"","'",$gl); $glname=str_replace("\r\n","<br>",$gl);

$mt=stripslashes($_POST['maintext']); $mt=str_replace("\\","/",$mt);
$mt=str_replace("<?","< ?",$mt); $mt=str_replace("?>","? >",$mt);
$mt=str_replace("\"","'",$mt); $maintext=str_replace("\r\n","<br>",$mt);

$ml=stripslashes($_POST['mainlink']); $ml=str_replace("\\","/",$ml);
$ml=str_replace("<?","< ?",$ml); $ml=str_replace("?>","? >",$ml);
$ml=str_replace("\"","'",$ml); $mainlink=str_replace("\r\n","<br>",$ml);

$configdata="<? // WR-Gallery v 1.3  //  28.05.06 �.  //  Miha-ingener@yandex.ru\r\n".
"$"."glname=\"".$glname."\"; // ��� ������� ������������ � ���� TITLE � ���������\r\n".
"$"."maintext=\"".$maintext."\"; // �����, ����������� ����� ������ ����� ���������\r\n".
"$"."adminemail=\"".$_POST['adminemail']."\"; // ����� ������\r\n".
"$"."password=\"".$_POST['password']."\"; // ������ ������\r\n".
"$"."sendmail=\"".$_POST['sendmail']."\"; // �������� ��������� �� ����� ������\r\n".
"$"."smwidth=\"".$_POST['smwidth']."\"; // ������ ���������������\r\n".
"$"."smheight=\"".$_POST['smheight']."\"; // ������ ���������������\r\n".
"$"."mainlink=\"".$mainlink."\"; // ������ �� ������� ��������\r\n".
"$"."max_file_size=\"".$_POST['max_file_size']."\"; // ����������� ���������� ������ ������������ ����\r\n".
"$"."maxwidth=\"".$_POST['maxwidth']."\"; // ������ ������������ ����������� � �������� �� �����\r\n".
"$"."maxheight=\"".$_POST['maxheight']."\"; // ������ -||- \r\n".
"$"."maxname=\"".$_POST['maxname']."\";  // ������������ ���-�� �������� � �����\r\n".
"$"."maxmsg=\"".$_POST['maxmsg']."\"; // ������������ ���-�� �������� � ���������\r\n".
"$"."maxzag=\"".$_POST['maxzag']."\"; // ����. ���-�� �������� � �����������\r\n".
"$"."msginout=\"".$_POST['msginout']."\"; // ������� ��������� ���������: �����������/�������� - 1/0\r\n".
"$"."qq=\"".$_POST['qq']."\"; // ���-�� ������������ ��������� �� ������ �������� ��������: 1-100\r\n".
"$"."colrubperpage=\"".$_POST['colrubperpage']."\"; // ���-�� �������� � �������\r\n".
"$"."datadir=\"".$_POST['datadir']."\"; // ������� � ���� � �������������/��������\r\n".
"$"."datafile=\"".$_POST['datafile']."\"; // ��� ����� ��\r\n".
"$"."skin=\"".$_POST['skin']."\"; // ���� ��������\r\n".
"$"."back=\"<center>��������� <a href='javascript:history.back(1)'><B>�����</B></a>\"; // ������� ������\r\n".
"$"."date=date(\"d.m.y\"); // �����.�����.���\r\n".
"$"."time=date(\"H:i\"); // ����:������ \r\n?>";

$file=file("config.php");
$fp=fopen("config.php","a+");
flock ($fp,LOCK_EX);
ftruncate ($fp,0);//������� ���������� �����
fputs($fp,$configdata);
fflush ($fp);//�������� ��������� ������
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("config.php", 0644);
Header("Location: admin.php?pswrd=$_POST[password]"); exit; }




}   else   {  // if isset($event)


if (isset($_GET['page'])) {$page=$_GET['page'];} else {$page="1";}

print "$shapka";

if ((!isset($_GET['event'])) or (isset($_GET['event'])) & ($_GET['event']!="add"))  {
$lines=file($datafile);
$itogo=count($lines);
$maxi=$itogo-1;

if ($maxi>=0) {

// ������� qq ��������� �� ������� ��������
if ($page=="0") {$page="1";} else {$page=abs($page);}

$maxpage=ceil(($maxi+1)/$qq); if ($page>$maxpage) {$page=$maxpage;}

if ($msginout=="1") 
{ $fm=$qq*($page-1); if ($fm>$maxi) {$fm=$maxi-$qq;}
  $lm=$fm+$qq; if ($lm>$maxi) {$lm=$maxi+1;} }
else 
{ $fm=$maxi-$qq*($page-1); if ($fm<"0") {$fm=$qq;}
  $lm=$fm-$qq; if ($lm<"0") {$lm="-1";} }

print"<table align=center valign=top border=0><TR>";

do { $dt = explode("|", $lines[$fm]);
if ($msginout=="1") {$fm++;} else {$fm--;}
$num=$itogo-$fm;
$tp=$fm; $teknum=$maxi-$tp; $tnp=$teknum-1;
// �������� ��������� �������� �� �����������


$msnum=$dt[10]; $addrem="";
if (is_file("$datadir/$msnum.dat"))  {
$rlines=file("$datadir/$msnum.dat"); $ri=count($rlines);
$addrem="����������� [<B><a href='admin.php?pswrd=$password&event=coment&msnum=$msnum'> $ri </a></B>]";
}



print"<td>
<table width=220 cellpadding=1 cellspacing=8 bgcolor=#E9E9E9><tr><td>
<table width=219 height=240 cellpadding=1 cellspacing=0 bgcolor=#FFFFFF><tr><td valign=top align=center>
<font size=-1>���� � $teknum</font>
<table cellspacing=5 cellpadding=2 border=0><TR>
<TD bgcolor=#22FF44><a href='admin.php?pswrd=$password&rd=$num&page=$page'>.P.</a></TD>
<TD bgcolor=#FF2244><a href='admin.php?pswrd=$password&id=$num&page=$page'>..</a></TD>
<TD bgcolor=#B36F94><a href='admin.php?pswrd=$password&movetopic=$tnp&where=1' title='�����'>��</a></TD>
<TD bgcolor=#7A86A7><a href='admin.php?pswrd=$password&movetopic=$tnp&where=0' title='����'>��</a></TD>
</TR></TABLE>

<BR>
<table border=0 width=210 height=210 cellpadding=1 cellspacing=0><tr><td align=center colspan=2><a href='index.php?event=showimg&msnum=$dt[10]'><img src='data/$dt[5]' alt='$dt[0]' border=0></a></td></tr>
<TR height=25><TD colspan=2 align=center>$dt[0]<BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>����������: <B>$dt[8] $dt[9]</B></small><BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>������: <B>$dt[7]</B> ��.</small><BR></td></tr>
<TR><TD colspan=2 align=center>$addrem &nbsp;</TD></TR>
<TR height=30><TD><b><a href=mailto:$dt[2]>$dt[1]</a></b></TD><TD align=right><small><b>$dt[3]</B></small><BR><small>$dt[4]</small></td></tr>
</table>
</td></tr></table>
</td></tr></table>
";

$cm=1;   // ��������!     // ����� ��� ������� �� �������
$zz=$maxi-$fm/$colrubperpage;
if ((round(($maxi-$fm)/$colrubperpage))==(($maxi-$fm)/$colrubperpage)) {$cm++; print "</TR><TR>";}


if ($msginout=="1") {$whm=$fm; $whe=$lm;} else {$whm=$lm; $whe=$fm;}
} while($whm < $whe);

print "</td></tr></table><center>";


// ������� ������ ��������� ������� ������� �����
print "��������:&nbsp; ";
for($i=0; $i<$maxi+1;) {$ip=$i/$qq+1;
if ($page==$ip) {print "<B>$ip</B> &nbsp;";} else {print "<a href='admin.php?pswrd=$password&page=$ip'>$ip</a> &nbsp;";}
$i=$i+$qq;} print "(��������� = <B>$qq</B>)";
$itogofoto=$maxi+1; print"<BR><BR>����� ����: <B>$itogofoto</B><BR><BR>";
} // if ($maxi>=0)
 else {print"<BR><BR><BR><BR><BR><center><h3>���� ���!</h3></center><BR><BR><BR><BR><BR>";}


// ���� ��������� ��� �������������� � ������� ��� � �����
if (isset($_GET['rd']))  {
if ($msginout==1) {$rd=$maxi-$_GET['rd'];} else {$rd=$maxi-$_GET['rd']+2;}

$dt=explode("|",$lines[$rd]);
$dt[0]=str_replace("<br>", "\r\n", $dt[0]);

print "<BR><BR>
<table border=1 width=500 align=center cellpadding=3 cellspacing=0 bordercolor=#DDDDDD><tr bgcolor=#BBBBBB height=25 align=center>
<td width=200><B>��������</B></td><td><B>��������</B></td></TR><form action=admin.php?pswrd=$password&event=add&rd=$rd method=POST name=REPLIER>
<tr bgcolor=#FFFFFF><td><B>���</B></td><td><input type=text value='$dt[1]' name=name class=maxiinput></td></tr>
<tr bgcolor=#EEEEEE><td>�����</td><td><input type=text value='$dt[2]' name=email class=maxiinput></td></tr>
<tr bgcolor=#FFFFFF><td><B>���� / �����</B></td><td><input type=text value='$dt[3]' name=fdate class=maininput style='Width=140px'> &nbsp;&nbsp;&nbsp; <input type=text value='$dt[4]' name=ftime class=maininput style='Width=140px'></td></tr>
<tr bgcolor=#EEEEEE><td><B>���������</B></td><td><textarea cols=59 rows=4 size=500 name=msg class=maxiinput style='Height=60px'>$dt[0]</textarea></td></tr>
<tr bgcolor=#FFFFFF><td><B>������ / �������</B> ����</td><td><input type=text value='$dt[5]' name=smallfoto class=maininput> &nbsp;&nbsp; <input type=text value='$dt[6]' name=foto class=maininput></td></tr>
<tr bgcolor=#EEEEEE><td><B>����� / ������</B> ��������</td><td><input type=text value='$dt[8]' name=fwidth class=maininput> &nbsp;&nbsp; <input type=text value='$dt[9]' name=fheight class=maininput></td></tr>
<tr bgcolor=#EEEEEE><td><B>������ � ��.</B></td><td><input type=text value='$dt[7]' name=fotoksize class=maininput></td></tr>
</table><input type=hidden name=page value='$page'><BR>
<input type=hidden name=uid value='$dt[10]'>
<center><input type=submit value='��������� ��� ���� �� �������'></form>";
}

print"</td></tr></table></TBODY></TABLE>";
}
}



}



}
?>

<center><font size=-2>Powered by <a href='http://www.wr-script.ru/'>WR-Gallery</a> &copy;</font></center></body></html>
