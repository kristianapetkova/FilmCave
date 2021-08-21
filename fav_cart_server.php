<?php
session_start();
$id_favourite=$_POST["id_favourite"];
$id_cart=$_POST["id_cart"];
echo $id_favourite;
$email=$_SESSION["email"];
$return_page=$_SESSION["filename"];
$_SESSION["error_msg_fav_cart"]="false";

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