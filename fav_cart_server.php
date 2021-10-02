<?php
session_start();
$id_favourite=$_POST["id_favourite"];
$id_cart=$_POST["id_cart"];
echo $id_favourite;
$return_page=$_SESSION["filename"];
$_SESSION["error_msg_fav_cart"]="false";

if(isset($_POST["filter"]))
{
	$_SESSION["years"]=$_POST["filter_year"];
	$_SESSION["genre"]=$_POST["filter_genre"];
	$_SESSION["serie"]=$_POST["filter_serie"];
	$_SESSION["lang"]=$_POST["filter_lang"];
	$_SESSION["sub"]=$_POST["filter_sub"];

}


if($_SESSION["email"]){
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_user_id(?)");
	mysqli_stmt_bind_param($call, 's', $email);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$col1);
	while (mysqli_stmt_fetch($call)) {
	}

	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
		$id_user=$col1;
	}

	if($id_favourite!=""){
		$conn=mysqli_connect("localhost","root","","filmcave");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$call = mysqli_prepare($conn, "CALL search_in_favourites(?,?)");
		mysqli_stmt_bind_param($call, 'ii', $id_user,$id_favourite);
		mysqli_stmt_execute($call);

		mysqli_stmt_bind_result($call,$col1);

		while (mysqli_stmt_fetch($call)) {}

		$rows= mysqli_stmt_num_rows($call);
		if($rows>0){

		}
		else{
			$conn=mysqli_connect("localhost","root","","filmcave");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$call1 = mysqli_prepare($conn, "CALL add_favourite(?,?)");
			mysqli_stmt_bind_param($call1, 'ii', $id_user,$id_favourite);
			mysqli_stmt_execute($call1);
		}
	}
	if($id_cart!=""){
		$conn=mysqli_connect("localhost","root","","filmcave");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$call = mysqli_prepare($conn, "CALL search_in_cart(?,?)");
		mysqli_stmt_bind_param($call, 'ii', $id_user,$id_cart);
		mysqli_stmt_execute($call);

		mysqli_stmt_bind_result($call,$col1);

		while (mysqli_stmt_fetch($call)) {}

		$rows= mysqli_stmt_num_rows($call);
		if($rows>0){

		}
		else{
			$conn=mysqli_connect("localhost","root","","filmcave");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$call1 = mysqli_prepare($conn, "CALL add_to_cart(?,?)");
			mysqli_stmt_bind_param($call1, 'ii', $id_user,$id_cart);
			mysqli_stmt_execute($call1);
		}

	}
	header("location: $return_page");	
}
else{
	$_SESSION["error_msg_fav_cart"]="true";
	header("location: $return_page");
}






?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		filter_year
			<input type="text" name="filter_year" id="filter_year" style="display: block;" placeholder="filter_year">
			filter_serie
			<input type="text" name="filter_serie" id="filter_serie" style="display: block;" placeholder="filter_serie">
			filter_genre
			<input type="text" name="filter_genre" id="filter_genre" style="display: block;" placeholder="filter_genre">
			filter_lang
			<input type="text" name="filter_lang" id="filter_lang" style="display: block;" placeholder="filter_lang">
			filter_sub
			<input type="text" name="filter_sub" id="filter_sub" style="display: block;" placeholder="filter_sub">
	</form>
</body>
</html>