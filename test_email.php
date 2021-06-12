<!DOCTYPE html>
<html>
<head>
	<title>Email sender</title>
</head>
<body>
	<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

$headers="From:kristylowe33@gmail.com";

// send email
mail("kristianapet@abv.bg","My subject",$msg);

$time=time();

print("Script run with $time");
?>
</body>
</html>