<?php
$data = json_decode(file_get_contents('data.json'),true);

foreach($_GET as $k => $v) {
	if (strpos($k, '-key1') !== false) {
		if ($_GET[str_replace('-key1','',$k).'-value1'] != '[REMOVED]') {
    	$data['urls'][$v] = $_GET[str_replace('-key1','',$k).'-value1'];
		}
		else {
			unset($data['urls'][$v]);
		}
	}
}


foreach($_GET as $k => $v) {
	if (strpos($k, '-key2') !== false) {
		if ($_GET[str_replace('-key2','',$k).'-value2'] != '[REMOVED]') {
    	$data['prompt'][$v] = $_GET[str_replace('-key2','',$k).'-value2'];
		}
		else {
			unset($data['prompt'][$v]);
		}
	}
}


file_put_contents('data.json',json_encode($data,JSON_PRETTY_PRINT));
header('Location: /');