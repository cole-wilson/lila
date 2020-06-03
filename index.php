<style>body{font-family:monospace;}</style>
<title>Bookmarklet Console</title>
<a title='x' href='javascript:(function()%7Bfunction%20callback()%7Binitbm()%7Dvar%20s%3Ddocument.createElement(%22script%22)%3Bs.src%3D%22https%3A%2F%2Flila--cwi.repl.co%2Fscript.php%22%3Bif(s.addEventListener)%7Bs.addEventListener(%22load%22%2Ccallback%2Cfalse)%7Delse%20if(s.readyState)%7Bs.onreadystatechange%3Dcallback%7Ddocument.body.appendChild(s)%3B%7D)()'>X</a>
<hr>
<br><br><br>
<b>Site Specific URLS:</b>
<form action='update.php'>
<div id='1'>
<?php

$data = json_decode(file_get_contents('data.json'),true);
$c = 0;
foreach ($data['urls'] as $k => $v){
	$c = $c + 1;
	echo "<textarea id='$c-key1' name='$c-key1' style='width:20vw;'>$k</textarea>&nbsp;&nbsp;<textarea id='$c-value1' name='$c-value1' style='width:70vw;'>$v</textarea><button type='button' onclick='document.getElementById(`$c-value1`).innerHTML = `[REMOVED]`;document.getElementById(`$c-key`).setAttribute(`readonly`,`readonly`);document.getElementById(`$c-value1`).setAttribute(`readonly`,`readonly`);document.getElementById(`$c-key`).setAttribute(`style`,`width:20vw;background:darkgrey;`);document.getElementById(`$c-value1`).setAttribute(`style`,`width:20vw;background:darkgrey;`);'>-</button><br>".PHP_EOL;
}
?>
</div>
<button type="button" onclick='newField(`1`)'>Add</button><br>
<br><br><br>

<br><br><br>
<b>Prompt</b>
<div id='2'>
<?php

$data = json_decode(file_get_contents('data.json'),true);
$c = 0;
foreach ($data['prompt'] as $k => $v){
	$c = $c + 1;
	echo "<textarea id='$c-key2' name='$c-key2' style='width:20vw;'>$k</textarea>&nbsp;&nbsp;<textarea id='$c-value2' name='$c-value2' style='width:70vw;'>$v</textarea><button type='button' onclick='document.getElementById(`$c-value2`).innerHTML = `[REMOVED]`;document.getElementById(`$c-key2`).setAttribute(`readonly`,`readonly`);document.getElementById(`$c-value2`).setAttribute(`readonly`,`readonly`);document.getElementById(`$c-key2`).setAttribute(`style`,`width:20vw;background:darkgrey;`);document.getElementById(`$c-value2`).setAttribute(`style`,`width:20vw;background:darkgrey;`);'>-</button><br>".PHP_EOL;
}
?>
</div>
<button type="button" onclick='newField(`2`)'>Add</button><br>
<br><br><br>



<hr>
<input type=submit value='Update'>
</form>

<script>
var co = <?php echo $c+1;?>;
function newField(id) {
	document.getElementById(id).innerHTML += "<textarea name='"+co+"-key"+id+"' style='width:20vw;'></textarea>&nbsp;&nbsp;<textarea name='"+co+"-value"+id+"' style='width:70vw;'></textarea><br>\n";
}
</script>