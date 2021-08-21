<?php
	session_start();

		$user=$_SESSION['email'];
      $pass=$_SESSION['password'];

      $conn=mysqli_connect("localhost","root","","filmcave");

            if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
      $change_login_status = mysqli_prepare($conn, "CALL change_login_status_false(?,?)");
      mysqli_stmt_bind_param($change_login_status, 'ss', $user, $pass);
      mysqli_stmt_execute($change_login_status);
	//destroy all session value
	session_destroy();
	mysqli_close($conn);
	header("location:1home.php");
?>