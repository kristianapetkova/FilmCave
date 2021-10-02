<?php
$title=$_POST["title"];
$series=$_POST["series"];
$genre=$_POST["genre"];
$producer=$_POST["producer"];
$type=$_POST["type"];
$language=$_POST["language"];
$subtitle=$_POST["subtitle"];
$duration=$_POST["duration"];
$rating=$_POST["rating"];
$price=$_POST["price"];
$stock=$_POST["stock"];
$poster=$_POST["poster"];
$promotion=$_POST["promotion"];
$year=$_POST["year"];
$promotion_percent=$_POST["promotion_percent"];


//check if series exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_series(?)");
mysqli_stmt_bind_param($call,"s",$series);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_series);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
//if doesnt exist
if($rows<1){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call1 = mysqli_prepare($conn, "CALL add_series(?)");
	mysqli_stmt_bind_param($call1, 's', $series);
	mysqli_stmt_execute($call1);

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_series(?)");
	mysqli_stmt_bind_param($call,"s",$series);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_series);

	while (mysqli_stmt_fetch($call)){}
}

//check if genre exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_genre(?)");
mysqli_stmt_bind_param($call,"s",$genre);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_genre);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
//if doesnt exist
if($rows<1){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call1 = mysqli_prepare($conn, "CALL add_genre(?)");
	mysqli_stmt_bind_param($call1, 's', $genre);
	mysqli_stmt_execute($call1);

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_genre(?)");
	mysqli_stmt_bind_param($call,"s",$genre);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_genre);

	while (mysqli_stmt_fetch($call)){}
}

//check if producer exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_producer(?)");
mysqli_stmt_bind_param($call,"s",$producer);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_producer);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
//if doesnt exist
if($rows<1){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call1 = mysqli_prepare($conn, "CALL add_producer(?)");
	mysqli_stmt_bind_param($call1, 's', $producer);
	mysqli_stmt_execute($call1);

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_producer(?)");
	mysqli_stmt_bind_param($call,"s",$producer);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_producer);

	while (mysqli_stmt_fetch($call)){}
}
//check if type exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_type(?)");
mysqli_stmt_bind_param($call,"s",$type);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_type);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
if($rows>0){}

//check if title exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_title(?)");
mysqli_stmt_bind_param($call,"s",$title);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_title);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
//if doesnt exist
if($rows<1){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call1 = mysqli_prepare($conn, "CALL add_title(?,?,?)");
	mysqli_stmt_bind_param($call1, 'sii', $title,$id_series,$id_genre);
	mysqli_stmt_execute($call1);

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_title(?)");
	mysqli_stmt_bind_param($call,"s",$title);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_title);

	while (mysqli_stmt_fetch($call)){}
}

//check if language exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_language(?)");
mysqli_stmt_bind_param($call,"s",$language);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_language);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
//if doesnt exist
if($rows<1){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call1 = mysqli_prepare($conn, "CALL add_language(?)");
	mysqli_stmt_bind_param($call1, 's', $language);
	mysqli_stmt_execute($call1);

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_language(?)");
	mysqli_stmt_bind_param($call,"s",$language);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_language);

	while (mysqli_stmt_fetch($call)){}
}

//check if subtitles exist
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_id_subtitle(?)");
mysqli_stmt_bind_param($call,"s",$subtitle);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_subtitle);

while (mysqli_stmt_fetch($call)){}

$rows= mysqli_stmt_num_rows($call);
//if doesnt exist
if($rows<1){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call1 = mysqli_prepare($conn, "CALL add_subtitle(?)");
	mysqli_stmt_bind_param($call1, 's', $subtitle);
	mysqli_stmt_execute($call1);

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_subtitle(?)");
	mysqli_stmt_bind_param($call,"s",$subtitle);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_subtitle);

	while (mysqli_stmt_fetch($call)){}
}


//add product
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call1 = mysqli_prepare($conn, "CALL add_product(?,?,?,?,?,?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($call1, 'iiiiiissisisi', $id_title,$id_producer,$id_type,$id_language,$id_subtitle,$duration,$rating,$price,$stock,$poster,$promotion,$year,$promotion_percent);
mysqli_stmt_execute($call1);

echo "brawo ma";
?>