<?php
session_start();
//Delete address
echo $_SESSION["id_user"];
	$id_user=$_POST["id_user"];
	$modal_street_copy=$_POST["id_address"];
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_id_address(?,?)");
	mysqli_stmt_bind_param($call, 'is',$id_user,$modal_street_copy);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_address);
	while (mysqli_stmt_fetch($call)) {
		
	}

    $rows= mysqli_stmt_num_rows($call);
    echo $id_address;

?>