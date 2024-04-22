<?php
$sos_server="http://www.sos-brigada.spb.ru/";
if (substr($site,(strlen($site)-1),1)<>"/") {$site="$site/";}
if (substr($site,0,7)<>"http://") {$site='http://'.$site;}
if (!isset($state)) {$state=0;} 
$sos_xml="main.php?site=$site&state=$state";
$xml_tg[]="xml_state_file";
$xml_tg[]="xml_tags";
$xml_tg[]="html_tags";
$xml_tg[]="css_tags";
$html_tags[]="";
$css_tags[]="";
$output_meta="";
$output_main="";
function analytic($j, $str, $xml_tag) {
	$str = trim($str,"\n "); 
	$str=substr($str,strlen("<$xml_tag>"),(strlen($str)-strlen("<$xml_tag>")));
	$str=substr($str,0,(strlen($str)-strlen("</$xml_tag>")-1));
	$str = trim($str,"\n "); 
	return $str;
}
function readxml($sos_server,$sos_xml,$xml_tags,$html_tags,$css_tags) {
for($j=0;$j<sizeof($xml_tags);++$j) { $strings[$j]="";}
$tag=0;
$tag_num=0;
$array_entry=0;
$data=file("$sos_server$sos_xml");
for($i=0;$i<sizeof($data);++$i){ 
	if ($tag==0) {for($j=0;$j<sizeof($xml_tags);++$j) {
		if ($tag==0) {$xml_tag=strstr($data[$i],"<$xml_tags[$j]>"); }
		if (($tag==0)&($xml_tag<>"")) {	
			$tag=1;
			$old_tag_num=$tag_num;
			$tag_num=$j;
			$xml_tag="";
			}		}	}
	if ($tag==1) {$xml_tag="$xml_tag $data[$i]";}
	if (($tag==1)&(strstr($data[$i],"</$xml_tags[$tag_num]>")<>"")) {	
			$tag=0;
			$xml_tag=analytic($tag_num,$xml_tag, $xml_tags[$tag_num]); 
			$strings[$tag_num]=$xml_tag;
			if ($old_tag_num<>$tag_num) { $array_entry=0; }
			$fn_output[$tag_num][$array_entry]=$strings[$tag_num];
			++$array_entry;	}}
return $fn_output;
}
$sos_content=readxml($sos_server,$sos_xml,$xml_tg,$html_tags,$css_tags);
for($i=0;$i<sizeof($sos_content[1]);++$i){$xml_tags[$i]=$sos_content[1][$i];}
for($i=0;$i<sizeof($sos_content[2]);++$i){$html_tags[$i]=$sos_content[2][$i];}
for($i=0;$i<sizeof($sos_content[3]);++$i){$css_tags[$i]=$sos_content[3][$i];}
$sos_content=readxml($sos_server,$sos_content[0][0],$xml_tags,$html_tags,$css_tags);
for($i=0;$i<sizeof($sos_content);++$i) {
	$out = join(" ", $sos_content[$i]);
	if ($html_tags[$i]=="meta") {$output_meta="$output_meta<$html_tags[$i] $css_tags[$i]'$out' />\n";}
		else if ($html_tags[$i]=="title") {$output_meta="$output_meta<$html_tags[$i] $css_tags[$i]>$out</$html_tags[$i]>\n";} 
		else{ $output_main="$output_main<$html_tags[$i] $css_tags[$i]>$out</$html_tags[$i]>\n";}
	}
?>