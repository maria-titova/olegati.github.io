<html><body bgcolor=#999999>
<? // WR-Gallery v 1.3.1  //  16.09.07 �.  //  Miha-ingener@yandex.ru

error_reporting (E_ALL);

include "config.php";

$valid_types=array("gif","jpg","png","jpeg");  // ���������� ����������
$shapka="<html><head><META content='text/html; charset=windows-1251' http-equiv=Content-Type><link rel=stylesheet type='text/css' href='images/$skin/style.css'></head><body>";

// ������� ����������
function prcmp ($a, $b) {if ($a==$b) return 0; if ($a<$b) return -1; return 1;}

if (isset($_GET['event'])) {


if ($_GET['event']=="add") {  // ���������� ����

if (isset ($_POST['name']) & isset ($_POST['msg']) & isset ($_POST['email'])) {$name=$_POST['name']; $msg=$_POST['msg']; $email=$_POST['email'];} else {exit;}
$name=trim($name); $msg=trim($msg); $email=trim($email); // �������� ���������� �������
$name=str_replace("|","I",$name); $email=str_replace("|","I",$email); $msg=str_replace("|","I",$msg); // ���� �� �� "�������"!
if ($name==="" || strlen($name)>$maxname) {print "$shapka $back ���� ��� ��� ������, ��� ��������� $maxname ��������!</B></center>"; exit;}
if ($msg==="" || strlen($msg)>$maxmsg) {print "$shapka $back ���� ��������� ��� ������ ��� ��������� $maxmsg ��������.</B></center>"; exit;}
if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)$", $email) and strlen($email)>30 and $email!=="") {print "$shapka $back � ������� ���������� E-mail �����!</B></center>"; exit;}









$fotoname = $_FILES['file']['name']; // ���������� ��� �����
$fotosize=$_FILES['file']['size']; // ���������� ������ �����
// ��������� ���������� �����
$ext = strtolower(substr($fotoname, 1 + strrpos($fotoname, ".")));
if (!in_array($ext, $valid_types)) {echo '<B>���� �� ��������.</B> ��������� �������:<BR>
- ��������� �������� ������ ������ � ������ ������������: gif, jpg, jpeg, png<BR>
- �� ��������� ��������� �� ����������� ����;<BR>
- ������� ����� ����� ��� ������ ����;</B><BR>'; exit;}


//                    ������ �� ������

// 1. ������� ���-�� ����� � ��������� - ���� ������� ����� - ��������!
$findtchka=substr_count($fotoname, "."); if ($findtchka>1) {echo "����� ����������� � ����� ����� $findtchka ���(�). ��� ���������! <BR>\r\n";}

// 2. ���� � ����� ���� .php, .html, .htm - ��������! 
$bago="��������. � ����� ����� <B>���������</B> ������������ .php, .html, .htm";
if (preg_match("/\.php/i",$fotoname))  {echo "��������� <B>\".php\"</B> �������. $bago"; exit;}
if (preg_match("/\.html/i",$fotoname)) {echo "��������� <B>\".html\"</B> �������. $bago"; exit;}
if (preg_match("/\.htm/i",$fotoname))  {echo "��������� <B>\".htm\"</B> �������. $bago"; exit;}

// 3. �������� �� ������� ���� � ����� ����� � ��������� ���������� ����� 
if (!preg_match("/^[a-z0-9\.\-_]+\.(jpg|gif|png|)+$/is",$fotoname)) {print "��������� ������������ ������� ����� � ����� �����!"; exit;}

// 4. ���������, ����� ���� ���� � ����� ������ ��� ���� �� �������
if (file_exists("$datadir/$fotoname")) {print "���� � ����� ������ ��� ���������� �� �������! �������� ��� �� ������!"; exit;}
// ����� ����� �� ����� �����

// 5. ������ ����
$fotoksize=round($fotosize/10.24)/100; // ������ ������������ ���� � ��.
$fotomax=round($max_file_size/10.24)/100; // ������������ ������ ���� � ��.
if ($fotoksize>$fotomax) {print"�� ��������� ���������� ������ ����! <BR><B>����������� ����������</B> ������ ����: <B>$fotomax </B>��.<BR> <B>�� ���������</B> ��������� �����������: <B>$fotoksize</B> ��!"; exit;}

// 6. "��������" ���� > $maxwidth � $maxheight - �� ��������! :-)
$size=getimagesize($_FILES['file']['tmp_name']);
if ($size[0]>$maxwidth or $size[1]>$maxheight) {print "$size[0] x $size[1] - �� ���������� �������� ����. ��������� ���� $maxwidth � $maxheight px!"; exit;}

if   ($fotosize>"0" and $fotosize<$max_file_size) {
     copy($_FILES['file']['tmp_name'], $datadir."/".$fotoname);
     print "<br><br>���� ������� ���������: $fotoname (������: $fotosize ����)";}
else { print "<B>���� �� �������� - ������ �������! ���������� � ��������������!<B>"; exit;}

$size=getimagesize("$datadir/$fotoname");

// ��������� ������ ����. ���� "��������" ������ �������� � ������� 150 � 120 - �� ������ � ��� �� ������
// ���� ������ ������� ����������� �������� ����� - � �������� ���������
if ($size[0]>$smwidth or $size[1]>$smheight) {
$smallfoto="sm-$fotoname";
require ('tumbmaker.php');
if (img_resize("$datadir/$fotoname", "$datadir/$smallfoto", $smwidth, $smheight))  echo '����������� �������������� <B>�������</B>.'; else  echo '<font color=red><B>������ �������������� ����! ������� � GD-�����������!</B></font> ���������� � ��������������';
} else {$smallfoto="$fotoname";}

// ���������� ��������� ���� - msnum-���� 
$z=1; do {$key=mt_rand(10000,99999); if (strlen($key)==5) {$z++;} } while ($z<1);

// ������ ������:  ��������|���|�����|����|�����|����_�����|����_�������|������_��|������|������|UID|�������|�������������|
$text="$msg|$name|$email|$date|$time|$smallfoto|$fotoname|$fotoksize|$size[0]|$size[1]|$key|-1|0|";
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

$fp=fopen($datafile,"a+");
flock ($fp,LOCK_EX);
fputs($fp,"$text\r\n");
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("$datafile", 0644);

if ($sendmail =="1")  { // �������� ��������� ������ � �� ����
$headers=null;
$headers.="Content-Type: text/plain; charset=windows-1251\r\n";
$headers.="From: ".$name." <".$email.">\r\n";
$headers.="X-Mailer: PHP/".phpversion()."\r\n";

$host=$_SERVER["HTTP_HOST"]; $self=$_SERVER["PHP_SELF"]; $glurl="http://$host$self";
$allmsg = $glname.chr(13).chr(10).'��������� ����� �����������: '.$glurl.chr(13).chr(10).'���: '.$name.chr(13).chr(10).'E-mail: '.$email.chr(13).chr(10).'���������: '.$msg.chr(13).chr(10);
mail("$adminemail", "$glname (���������)", $allmsg, $headers); }

//  ���������� ������������ ���� �� ������
if (isset($_POST['file'])) {
if (!copy($file, $file.'.bak')) {print ("��� ����������� ����� $file ��������� ������...<br>\n");}}

print "$shapka <script language='Javascript'>function reload() {location = 'index.php'}; setTimeout('reload()', 1500);</script>
<BR><BR><BR><center><table border=1 cellpadding=7 cellspacing=0 bordercolor=#224488 width=350><tr><td><center>
������� <B>$name</B>, ���� ���� ������� ���������. ����� ��������� ������ �� ������ ���������� �� ������� �������� �����������.
���� ����� �� ����������, �� ��� �������� ������� <B><a href='index.php'> �����</a></B> </td></tr></table></center><BR><BR><BR>";
exit; }




include "showfoto.php";

if ($_GET['event']=="showimg") { // ���������� ������� �����������
if (!isset($_GET['msnum'])) {exit("$back. ������� ������. ������� ����� �� �����.");}
$msnum=$_GET['msnum']; $msnum=trim($msnum);
if (!ctype_digit($msnum) or strlen($msnum)!=5) {exit("$back. ������� ������. ������� ����� �� �����.");}
$lines=file($datafile); $maxi=count($lines); $i="0";
echo "<br><br>";


do {$dt=explode("|", $lines[$i]); $i++; $number=$i;
    if ($dt[10]===$msnum) { print "$shapka <center><table border=0 width=70% height=50%><tr align=center valign=middle><td><img src='data/$dt[6]' alt='$dt[0]' border=0></td></tr></table>"; $ok="1";
print"<table width=200 border=0><TR align=center><TD width=10>";

print"<td>
<table border=0 width=255 cellpadding=1 cellspacing=8 class=maintbl><tr><td>
<table  border=0 width=236 height=150 cellpadding=1 cellspacing=0 class=seredina><tr><td valign=top align=center>

<table width=300 height=0 cellpadding=1 cellspacing=0>
<TR height=20><TD colspan=2 align=center>$dt[0]<BR></td></tr>
";
print"<table border=0 width=300><TR align=center><TD width=70>";

echo "<br>";
if ($number<$maxi) {$next=$number; $dtlast=explode("|",$lines[$next]); print "<A href='index.php?event=showimg&msnum=$dtlast[10]'><IMG alt='���������� ����' border=0 src='images/forward.gif'></A>";}
echo "<br><br>";
    print "</td><td width=90><A href='index.php'><IMG alt='��������� �� �������' border=0 src='images/back.gif'></A></td><td width=80>";
if ($number>1) {$last=$number-2; $dtnext=explode("|",$lines[$last]);

 print "<A href='index.php?event=showimg&msnum=$dtnext[10]'><IMG alt='��������� ����' border=0 src='images/next.gif'></A>";}
print "</td></tr></table></td></tr></table>";    
}

} while($i < $maxi);
if (!isset($ok)) {exit("$back. ������ ����������� ����������� � �����������. ��������, ��� ������ �����!");}
exit;}









if ($_GET['event']=="addform") { // ������� ����� ��� �������� �����
$fotomax=round($max_file_size/10.24)/100; // ������������ ������ ���� � ��.
print "$shapka <BR><BR><form action='index.php?event=add' method=post name=form enctype=\"multipart/form-data\">
<table border=0 class=bakfon align=center cellpadding=2 cellspacing=1><TBODY>
<tr class=toptable><td colspan=3 align=center height=25><font style='font-size: 13px'><b>���������� ����</b></td></tr>
<tr class=row2><td>���</td><TD colspan=2><input type=text value='' class=maininput style='FONT-SIZE: 14px; WIDTH: 350px' name=name size=30 maxlength=$maxname></TD></tr>
<tr class=row1><td>�-����</td><TD colspan=2><input type=text value='' name=email size=26 maxlength=$maxname class=maininput style='FONT-SIZE: 14px; WIDTH: 350px'></td></tr>

<tr class=row2><td>���������� ����</td><TD colspan=2><input type=file name=file size=48 class=maininput style='FONT-SIZE: 14px; WIDTH: 350px'></TD></tr>


<TR class=row1 height=25><TD colspan=3><font color=black>*</font>����������� ����������� ������ ����: $fotomax ��.</TD></TR>

<tr class=row2><td>������� � ����</td><TD colspan=2><textarea cols=51 rows=4 size=500 name=msg maxlength=$maxmsg class=maininput style='FONT-SIZE: 14px; WIDTH: 350px'></textarea></TD></tr>
<tr class=row1><td colspan=3 align=center><BR><input type=submit class=longok style='FONT-SIZE: 13px; color: black;' value='�������� ����'></form></td></tr>
</table></td></tr></table><BR><BR>"; }




if ($_GET['event']=="coment")  {  // �������� ������������ � ����
if (isset($_GET['msnum'])) {$msnum=$_GET['msnum'];} else {exit("$back. ������� ������. ������� ����� �� �����.");}
if (!ctype_digit($msnum) or strlen($msnum)<5) {exit("$back. ������� ������. ������� ����� �� �����.");}
$lines=file($datafile); $maxi=count($lines); $i="0";

do {$dt=explode("|", $lines[$i]); $i++;
if ($dt[10]===$msnum) { print"<BR><center><td>
<table width=220 cellpadding=1 cellspacing=8 class=maintbl><tr><td>
<table width=219 height=240 cellpadding=1 cellspacing=0 class=seredina><tr><td valign=top align=center>
<font size=-1>���� � $i</font><BR>
<table border=0 width=210 height=210 cellpadding=1 cellspacing=0><tr><td align=center height=120 colspan=2><a href='index.php?event=showimg&msnum=$msnum'><img src='data/$dt[5]' alt='$dt[0]' border=0></a></td></tr>
<TR height=25><TD colspan=2 align=center>$dt[0]<BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>����������: <B>$dt[8] � $dt[9]</B></small><BR></td></tr>
<TR height=25><TD colspan=2 align=center><small>������: <B>$dt[7]</B> ��.</small><BR></td></tr></table></td></tr></table></td></tr></table>"; }
} while($i < $maxi);

if (is_file("$datadir/$msnum.dat")) {
$rlines=file("$datadir/$msnum.dat"); $ri=count($rlines); $bals=0; $all=0;
print"<BR><table class=toptable align=center cellPadding=2 cellSpacing=1 width=560><TR><TD class=main align=center height=25 width=560 class=main colspan=3>����������� �����������:</TD></TR>
<TR class=row1 height=20 align=center><TD>���, �����, ����</TD><TD>����� �����������</TD><TD>������</TD></TR>";
do {$ri--; $edt=explode("|",$rlines[$ri]);
$edt[3]=date("d.m.Y H:i:s",$edt[3]);
if ($edt[4]!=0) {$bals=$bals+$edt[4]; $all++;} else {$edt[4]="-";}
print"<TR class=row1><TD><B>$edt[0]</B><BR>$edt[1]<BR>$edt[3]</TD><TD>$edt[2]</TD><TD align=center>$edt[4]</TD></TR>";
} while($ri>0);
if ($bals==0) {$itogobals="-";} else {$itogobals=round($bals*10/$all)/10;}
print "</TD></TR><TR class=row1><TD colspan=3 align=center height=28><font style='FONT-SIZE: 13px'>������� ������ ����: <B>$itogobals</B> / 10</font></TD></TR>
<TR><TD height=35 class=row1 colspan=3 align=center><a href='addmsg.php?id=&msnum=$msnum'><B>�������� �����������</B></a></TD></TR></TABLE><BR>";
}} // $event=="coment"





} else {   // ���� ������� ��������

include "images/$skin/top.html";

if (isset($_GET['type'])) {$type=$_GET['type']; if (!ctype_digit($type) or strlen($type)>2) {exit("<B>$back. ������� ������. ������� ����� �� �����.</B>");}}

$lines=file($datafile);
$itogo=count($lines); $maxi=$itogo-1; $i=0;

if ($maxi>=0) {

// ���� 1. ����������� �� (�������� ��� � ���� ����� ������).
//      2. ������������� ���-�� ������� �� �����.
do {$tdt=explode("|",$lines[$i]); $msnum=$tdt[10];
$itogobals="-1"; $all="";
if (is_file("$datadir/$msnum.dat")) {
$rlines=file("$datadir/$msnum.dat"); $ri=count($rlines); $bals=0; $all=0;
do {$ri--; $edt=explode("|",$rlines[$ri]);
if ($edt[4]!=0) {$bals=$bals+$edt[4]; $all++;}
} while($ri>0);
if ($bals==0) {$itogobals="-1";} else {$itogobals=round($bals*10/$all)/10;}
}

if ($tdt[11]!=$itogobals or $tdt[12]!=$all) {$yes="yes"; $nlines[$i]="$tdt[0]|$tdt[1]|$tdt[2]|$tdt[3]|$tdt[4]|$tdt[5]|$tdt[6]|$tdt[7]|$tdt[8]|$tdt[9]|$tdt[10]|$itogobals|$all|\r\n";} else {$nlines[$i]=$lines[$i];}
$i++;
} while($i<=$maxi);

if (isset($yes)) {

//$fsize1=filesize($datafile); $fsize2=filesize("fototmp.dat");
//if ($fsize1!=$fsize2) { // ���� ������ ������ ��������, ������ ��������� � ������ ���!

$fp=fopen("fototmp.dat","w");
flock ($fp,LOCK_EX);
for ($ii=0;$ii<count($lines); $ii++) { fputs($fp,"$lines[$ii]"); }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("fototmp.dat", 0644);

$fp=fopen("fotobase.dat","w");
flock ($fp,LOCK_EX);
for ($ii=0;$ii<count($nlines); $ii++) { fputs($fp,"$nlines[$ii]"); }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("fotobase.dat", 0644);
}

$lines=file($datafile);
$maxi=count($lines)-1; $i=0;

//} // if ($fsize1!=$fsize2)
//exit;


// ���� ���������� ����� � ����������� �� ����
/*
   1 - ��������;
   2 - ���-�� ��������������� (����� ��������� ��������...);
   3 - ���� ��������;-------
   4 - ��������� (������ �������� �� ������);
   5 - ������� (� ������);
*/













if (isset($_GET['page'])) {$page=$_GET['page'];} else {$page="1";}
if ($page=="0" or $page=="") {$page="1";} //else {$page=abs($page);}
if (!ctype_digit($page)) {print"������� ������! �������� ����� ������ ���� ������!"; exit;}

$t11=""; $t12="";

$t01=""; $t02=""; $t21=""; $t22=""; $t31=""; $t32=""; $t41=""; $t42=""; $t51=""; $t52="";
if (isset($type)) {
if ($type=="1") {$t11="<B>"; $t12="</B>";}
if ($type=="2") {$t21="<B>"; $t22="</B>";}
if ($type=="3") {$t31="<B>"; $t32="</B>";}
if ($type=="4") {$t41="<B>"; $t42="</B>";}
if ($type=="5") {$t51="<B>"; $t52="</B>";} } else {$t01="<B>"; $t02="</B>";}
print "<small>


<table border=1 width=800 align=center cellpadding=0 cellspacing=5 bgcolor=#cccccc><TR align=center>";

//<tr><TD colspan=$colrubperpage><img src=\"images/blank.gif\" height=10 border=0></TD></TR>

// ������� qq ���� �� ������� ��������
$maxpage=ceil(($maxi+1)/$qq); if ($page>$maxpage) {$page=$maxpage;}

if ($msginout=="1") 
{ $fm=$qq*($page-1); if ($fm>$maxi) {$fm=$maxi-$qq;}
  $lm=$fm+$qq; if ($lm>$maxi) {$lm=$maxi+1;} }
else 
{ $fm=$maxi-$qq*($page-1); if ($fm<"0") {$fm=$qq;}
  $lm=$fm-$qq; if ($lm<"0") {$lm="-1";} }

do { $dt = explode("|", $lines[$fm]); $msnum=$dt[10];
if ($msginout=="1") {$fm++;} else {$fm--;}
$tp=$fm; $teknum=$maxi-$tp;

print"<td>
<table width=255 cellpadding=1 cellspacing=8 class=maintbl><tr><td>
<table width=236 height=150 cellpadding=1 cellspacing=0 class=seredina><tr><td valign=top align=center>

<table width=210 height=100 cellpadding=1 cellspacing=0><tr><td align=center height=40 colspan=2><a href='index.php?event=showimg&msnum=$msnum'><img src='data/$dt[5]' alt='$dt[0]' border=0></a></td></tr>
<TR height=2><TD colspan=2 align=center>$dt[0]<BR></td></tr>
";


print"<TR height=30><TD></TD><TD align=right><BR><br></td></tr>
</table>
</td></tr></table>
</td></tr></table>
</td>";

$cm=1;   // ��������!   // ����� ��� ������� �� �������
$zz=$maxi-$fm/$colrubperpage;
if ((round(($maxi-$fm)/$colrubperpage))==(($maxi-$fm)/$colrubperpage)) {$cm++; print "</TR><TR>";}

if ($msginout=="1") {$whm=$fm; $whe=$lm;} else {$whm=$lm; $whe=$fm;}
} while($whm < $whe);

print"</table>";



$lines=file($datafile); $maxi = count($lines)-1;
$maxpage=ceil(($maxi+1)/$qq); if ($page>$maxpage) {$page=$maxpage;}

print "<center><br><small><font size=-1>��������:&nbsp; "; // ������� ������ ������� ������

for($i=0; $i<$maxi+1;) {$ip=$i/$qq+1;
if ($page==$ip) {print "<B>$ip</B> &nbsp;";} else {print "<a href=index.php?page=$ip>$ip</a> &nbsp;";}
$i=$i+$qq;};
$itogofoto=$maxi+1; print"<BR><font size=-1,5><BR>����� ����: $itogofoto</font>";
} // if ($maxi>=0)
 else {print"<BR><BR><BR><BR><BR><center><h3>���� ���!</h3></center><BR><BR><BR><BR><BR>";}
}
print "</td></tr></table></td></tr></table>";
include ("images/bottom.html");
?>

<center><font size=-2>Powered by <a href='http://www.wr-script.ru/'>WR-Gallery</a> &copy; 1.3</font><br></body></html>
