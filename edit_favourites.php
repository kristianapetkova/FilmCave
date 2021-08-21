<?php
session_start();
$email=$_SESSION["email"];

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_user_id(?)");
	mysqli_stmt_bind_param($call, 's', $email);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_user);
	while (mysqli_stmt_fetch($call)) {
        
      }
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
		//echo $address;
	}

	if($_POST["id_of_product_to_delete"]!=""){
		$id_of_product_to_delete=$_POST["id_of_product_to_delete"];
		
		$conn=mysqli_connect("localhost","root","","filmcave");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$call = mysqli_prepare($conn, "CALL delete_favourite(?)");
		mysqli_stmt_bind_param($call, 'i', $id_of_product_to_delete);
		mysqli_stmt_execute($call);

		header("location: my_acc_fav.php");
	}
	else{
		$id_of_product_to_cart=$_POST["id_of_product_to_cart"];

		$conn=mysqli_connect("localhost","root","","filmcave");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$call = mysqli_prepare($conn, "CALL add_to_cart(?,?)");
		mysqli_stmt_bind_param($call, 'ii',$id_user, $id_of_product_to_cart);
		mysqli_stmt_execute($call);

		header("location: my_acc_fav.php");
	}


?>