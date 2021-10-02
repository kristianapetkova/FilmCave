  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
    <input type="text" name="email_conf" id="email_conf">
    <input type="text" name="pass_conf" id="pass_conf">
  </body>
  </html>

<?php
  session_start();

   if(isset($_POST["login"])){

    $_SESSION['error_msg']="";
      
    if(empty($_POST['email'])||empty($_POST['password']))
    {
      $_SESSION['error_msg']="Моля попълнете всички полета";
      header("location:2login.php");
    }
    else
    {
      $email=$_POST['email'];
      $password=$_POST['password'];
      $conn=mysqli_connect("localhost","root","","filmcave");

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $call = mysqli_prepare($conn, "CALL check_login(?,?)");
      mysqli_stmt_bind_param($call, 'ss', $email, $password);
      mysqli_stmt_execute($call);

      mysqli_stmt_bind_result($call,$email,$password);

      while (mysqli_stmt_fetch($call)) {
        echo $col1;
      }

      $rows= mysqli_stmt_num_rows($call);
      echo $rows;

      
      if($rows>0){
        $email=$_POST['email'];
      $password=$_POST['password'];
      $conn=mysqli_connect("localhost","root","","filmcave");

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $call1 = mysqli_prepare($conn, "CALL change_login_status_true(?,?)");
        mysqli_stmt_bind_param($call1, 'ss', $email, $password);
        mysqli_stmt_execute($call1);
        $_SESSION["email"]=$_POST["email"];
         header("location: my_acc_info.php");
        
      }
      else
      {
           //header("location:1home.php");
        echo $email;
        echo $password;
        $_SESSION["email_conf"]=$email;
        $_SESSION["pass_conf"]=$password;

        $_SESSION['error_msg']="Грешен имейл или парола";
        header("location:2login.php");
      }
      mysqli_close($conn);
    }    
   }
   echo $_SESSION['error_msg'];
?>

<script type="text/javascript">
  var email="<?php echo $email; ?>";
  var pass =" <?php echo $password; ?>";

  document.getElementById("email_conf").value=email;
  document.getElementById("pass_conf").value=pass;
</script>
