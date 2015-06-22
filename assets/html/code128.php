<?php
define('IN_CB',true);
include('header.php');

$vals = array();
for($i = 0; $i <= 127; $i++) {
	$vals[] = '%'.sprintf('%02X', $i);
}
$keys = array(
	'NUL','SOH','STX','ETX','EOT','ENQ','ACK','BEL','BS','TAB','LF','VT','FF','CR','SO','SI','DLE','DC1','DC2','DC3','DC4','NAK','SYN','ETB','CAN','EM','SUB','ESC','FS','GS','RS','US',
	' ','!','"','#','$','%','&','\'','(',')','*','+',',','-','.','/','0','1','2','3','4','5','6','7','8','9',':',';','<','=','>','?',
	'@','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','[','\\',']','^','_',
	'`','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','{','|','}','~','DEL'
);
if($a2 === '')
	$a2 = 'B';
$n = $table->numRows();
$table->draw();

echo '</form>';

include('footer.php');
?>