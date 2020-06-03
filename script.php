<?php

header('Content-Type: application/javascript');

$data = json_decode(file_get_contents('data.json'),true);

?>
function initbm() {
	if (typeof icount === 'undefined') {
		icount = 1;
		setTimeout(function () {
  		if (icount == 1) {
				delete icount; 
				bmone(); 
			}
  	}, 500);
	}
	else {
		delete icount;
		bmtwo();
	}
}

//==================================================== 
// One Click:

function bmone() {
	var hn = window.location.href;
<?php
foreach ($data['urls'] as $k => $v){
	$nk = $k;
	echo "	if ( /$nk/.test(hn) ) { $v }".PHP_EOL;
}
?>
}

//==================================================== 
// Two Clicks:

function bmtwo() {
<?php
$c = 0;
echo "	choicebm = prompt(`Welcome Lila, You have several choices:\\n";
foreach ($data['prompt'] as $k => $v){
	$c = $c + 1;
	$nk = $k;
	echo "".$c.".  ".$k."\\n"."";
}
echo "`);".PHP_EOL;

$c = 0;
foreach ($data['prompt'] as $k => $v){
	$c = $c + 1;
	echo "if (choicebm == $c) {".$v."}".PHP_EOL;
}


?>
}
