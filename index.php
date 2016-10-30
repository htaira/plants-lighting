<?php

require("phpMQTT.php");

$input_mode = $_POST['mode'];
$err_message = '';
$feed = 'plants/light'

$mqtt = new phpMQTT("example.com", 1883, "Plants Lighting");

if ($mqtt->connect()) {
    switch($input_mode){
    case 'off':
	$mqtt->publish($feed,'{"mode":"off"}');
        break;
    case 'on':
	$mqtt->publish($feed,'{"mode":"on"}');
        break;
    case 'red':
	$mqtt->publish($feed,'{"mode":"red"}');
        break;
    case 'blue':
	$mqtt->publish($feed,'{"mode":"blue"}');
        break;
    case 'center':
	$mqtt->publish($feed,'{"mode":"center"}');
        break;
    case 'side':
	$mqtt->publish($feed,'{"mode":"side"}');
        break;
    }

    $mqtt->close();
} else {
    $err_message = 'Connection Error:';
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=320,initial-scale=1">
<link rel="stylesheet" href="buttons.css">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" rel="stylesheet">
<title>AgriTech Lighting System</title>
</head>
<body>
<div align="center">
<?php
    switch($input_mode){
    case 'off':
	print("状態: 消灯しました");
        break;
    case 'on':
	print("状態: 全灯しました");
        break;
    case 'red':
	print("状態: 赤色LED点灯しました");
        break;
    case 'blue':
	print("状態: 青色LED点灯しました");
        break;
    case 'center':
	print("状態: 中央部LEDのみ点灯しました");
        break;
    case 'side':
	print("状態: 側面部LEDのみ点灯しました");
        break;
    }
?>
<form method="POST" action="index.php">
	<span class="button-wrap">
		<button class="button button-caution button-pill" name="mode" value="off"><i class="fa fa-power-off"></i> 消灯</button>
	</span>
	<br />
	<br />
	<span class="button-wrap">
		<button class="button button-action button-pill" name="mode" value="on"><i class="fa fa-lightbulb-o"></i> 点灯</button>
	</span>
	<br />
	<br />
	<span class="button-wrap">
		<button class="button button-action button-pill" name="mode" value="red"><i class="fa fa-lightbulb-o"></i> 赤色LED</button>
	</span>
	<br />
	<br />
	<span class="button-wrap">
		<button class="button button-action button-pill" name="mode" value="blue"><i class="fa fa-lightbulb-o"></i> 青色LED</button>
	</span>
	<br />
	<br />
</form>
<hr />
Powered by<br />
<a href="https://www.openshift.com/"><img src="openshift_online_logo.png" /></a>
</div>
<br />
<?php print($err_message); ?>
</body>
</html>
