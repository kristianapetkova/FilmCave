<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];
echo $_POST["id_product_return"];
$id_product_return=$_POST["id_product_return"];
$id_selected_order=$_POST["id_selected_order"];
if($_SESSION["email"]){
	$email=$_SESSION["email"];
	//get user ID
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

	}

	//get product and user info to fill inputs

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_info_to_return_product(?,?,?)");
	mysqli_stmt_bind_param($call, 'iii', $id_user,$id_selected_order,$id_product_return);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$title,$type,$first_name,$last_name,$telephone, $email,$region, $city,$address,$active_address);
	while (mysqli_stmt_fetch($call)) {
        
      }
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="my_acc_return3.css">
	<link rel="stylesheet" type="text/css" href="basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<div class="head">
			<div class="logo">
				<a href="1home.php"><img src="pictures\filmcave_logo.png" class="logo_picture"></a>
			</div>
			<div class="search_bar">
				<input type="text" name="search_bar" id="search_bar">
				<button type="submit"><i class="fa fa-search"></i></button>

			</div>
			<div class="head_icons">
				<?php
					if($_SESSION["email"])
					{
						echo "<a href='my_acc_info.php'>";
					}
					else{
						echo "<a href='2login.php'>";
					}
				?>
					<img src="pictures\my-account-icon-3.png" id="icon_myprofile">
				</a>
				<?php
					if($_SESSION["email"])
					{
						echo "<a href='my_acc_fav.php'>";
					}
					else{
						echo "<a href='2login.php'>";
					}
				?>
					<img src="pictures\icons8-heart-48.png" id="icon_favourites">
				</a>
				<?php
					if($_SESSION["email"])
					{
						echo "<a href='my_cart.php'>";
					}
					else{
						echo "<a href='2login.php'>";
					}
				?>
					<img src="pictures\cart_new.png" id="icon_cart">
				</a>
			</div>
		</div>
		<div class="menu">
			<ul>
				<li>
					<a href="special_offers.php">
						Промоции
					</a>
				</li>
				<li>
					<a href="movies.php">
						Филми
					</a>
				</li>
				<li>
					<a href="bluray.php">
						Blu-Ray
					</a>
				</li>
				<li>
					<a href="books.php">
						Книги
					</a>
				</li>
				<li>
					<a href="nashata_kauza.php">
						Нашата кауза
					</a>
				</li>
				<li>
					<a href="subscribe.php">
						Абонирай се
					</a>
				</li>
				<li>
					<a href="contacts.php">
						Контакти
					</a>
				</li>
			</ul>
		</div>
	
	</header>
	<main>
		
		<h5>
			Начало -> Моят профил -> Връщане на продукт
		</h5>
		<hr>
		<section>
			<aside>
				<button class="side_menu " onclick="window.location.href='my_acc_info.php'">
					Моите данни
				</button>
				<button class="side_menu " onclick="window.location.href='my_acc_orders_simple.php'">
					История на поръчките
				</button>
				<button class="side_menu " onclick="window.location.href='my_acc_fav.php'">
					Любими продукти
				</button>
				<button class="side_menu active" onclick="window.location.href='my_acc_return1.php'">
					Връщане на продукт
				</button>
				<button class="side_menu" onclick="window.location.href='logout.php'">
					Изход
				</button>
			</aside>
			<section>
				<button class="buttons_return" onclick="window.location.href='my_acc_return2.php'">
					Обратно
				</button>
				<h1>
					Връщане на продукт
				</h1>
				<h2>
					Заявление
				</h2>
				<form method="POST" action="validate_return3.php">
					<input type="text" name="id_product_return" id="id_product_return" style="display: none;">
				<section class="declaration">

					<article>
						<h2>
							Данни на продукти
						</h2>
						<hr>
						<label>
							Продукт:
						</label>
						<input type="text" name="product_number" id="product_number" disabled="disabled">
						<br><br>
						<label>
							Поръчка №:
						</label>
						<input type="text" name="order_number" id="order_number" disabled="disabled">
						<br><br>
						<label>
							Причина:
						</label>
						<br>
						<select name="reason" id="reason">
						  <option value="broken_product">Нарушена цялост</option>
						  <option value="wrong_product">Грешен продукт</option>
						  <option value="other">Друго</option>
						  
						</select>
						<br><br>
						<label>
							Коментар:
						</label>
						<textarea>
							
						</textarea>
					</article>
					<article>
						<h2>
							Данни на клиент
						</h2>
						<hr>
						<label>
							Име:
						</label>
						<input type="text" name="first_name" id="first_name">
						<br><br>
						<label>
							Фамилия:
						</label>
						<input type="text" name="last_name" id="last_name">
						<br><br>
						<label>
							Телефон:
						</label>
						<input type="number" name="telephone" id="telephone">
						<br><br>
						<label>
							Email:
						</label>
						<input type="text" name="email" id="email" disabled="disabled">
						<br><br>
						<label>
							Област:
						</label>
						<input type="text" name="region" id="region">
						<br><br>
						<label>
							Населено място:
						</label>
						<input type="text" name="city" id="city">
						<br><br>
						<label>
							Адрес за вземане от куриер:
						</label>
						<input type="text" name="address" id="address">
						<br><br>
						<label>
							Удобна за Вас дата:
						</label>
						<input type="date" name="date" id="date">
						<br><br>
						<label>
							Удобен за Вас час:
						</label>
						<input type="time" name="hour" id="hour">
						<br><br>
					</article>
				</section>
				<hr>
				<h2>
					Условия
				</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel porttitor nisl, vel lobortis turpis. Maecenas iaculis neque sed gravida rutrum. Cras urna enim, ullamcorper et scelerisque non, pellentesque in elit. Nunc sollicitudin rutrum enim, sagittis auctor est malesuada sed. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ac dapibus diam, eu tincidunt lorem. Mauris et blandit nisi, aliquet elementum leo. Morbi at ex mattis, lobortis quam nec, sodales felis.


				</p>
				<input type="checkbox" name="i_agree">
				Съгласен/на съм и приемам условията
				<br>
				<br>
				<br>
				<button class="buttons">
					Подай заявление
				</button>
				</form>
			</section>
		</section>
	</main>
	<footer>
		<div>
			<ul>
				<li>
					<a href="za_nas.php">
						За нас
					</a>
				</li>
				<li>
					<a href="contacts.php">
						Контакти
					</a>
				</li>
				<li>
					<a href="nashata_kauza.php">
						Нашата кауза
					</a>
				</li>
				<li>
					<a href="special_offers.php">
						Промоции
					</a>
				</li>
				<li>
					<a href="subscribe.php">
						Абонирай се
					</a>
				</li>
			</ul>
		</div>
		<div>
			<ul>
				<li>
					<a href="help.php">
						Често задавани въпроси
					</a>
				</li>
				<li>
					<a href="shipping.php">
						Доставка
					</a>
				</li>
				<li>
					<a href="usloviq.php">
						Общи условия
					</a>
				</li>
				<li>
					<a href="policy.php">
						Политика за поверителност
					</a>
				</li>
			</ul>
		</div>
		<div>
			<div>
				Последвайте ни в социалните мрежи:
			</div>
			<a href="https://www.facebook.com/">
				<img src="pictures\icon_fb.png" class="footer_icons">
			</a>
			<a href="https://www.instagram.com/">
				<img src="pictures\icon_instagram.png" class="footer_icons">
			</a>
			<a href="https://twitter.com/">
				<img src="pictures\icon_twitter.png" class="footer_icons">
			</a>
				
				
				
			
		</div>
	</footer>

</body>

<script type="text/javascript">
	var title = "<?php echo $title ?>";
	var type = "<?php echo $type ?>";
	var first_name = "<?php echo $first_name ?>";
	var last_name = "<?php echo $last_name ?>";
	var telephone = "<?php echo $telephone ?>";
	var email = "<?php echo $email ?>";
	var region = "<?php echo $region ?>";
	var city = "<?php echo $city ?>";
	var address = "<?php echo $address ?>";
	var active_address = "<?php echo $active_address ?>";
	var id_selected_order="<?php echo $id_selected_order ?>";
	var id_product_return="<?php echo $id_product_return ?>";

	//fill inputs
	document.getElementById("product_number").value=title+", "+type;
	document.getElementById("order_number").value=id_selected_order;
	document.getElementById("first_name").value=first_name;
	document.getElementById("last_name").value=last_name;
	document.getElementById("telephone").value=telephone;
	document.getElementById("email").value=email;
	document.getElementById("region").value=region;
	document.getElementById("city").value=city;
	document.getElementById("address").value=address;

	document.getElementById("id_product_return").value=id_product_return;

	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();
	var month="";
	console.log(mm);
	// switch(mm){
	// 	case "01": month="Jan";
	// 	break;
	// 	case "02": month="Feb";
	// 	break;
	// 	case "03": month="Mar";
	// 	break;
	// 	case "04": month="Apr";
	// 	break;
	// 	case "05": month="May";
	// 	break;
	// 	case "06": month="Jun";
	// 	break;
	// 	case "07": month="Jul";
	// 	break;
	// 	case '08': month="Aug";
	// 	break;
	// 	case "09": month="Sep";
	// 	break;
	// 	case "10": month="Oct";
	// 	break;
	// 	case "11": month="Nov";
	// 	break;
	// 	case "12": month="Dec";
	// 	break;
	// 	default: console.log("error");
	// }

	// todat = yyyy+'-'+mm+'-'+dd;
	today = yyyy + '-' + mm + '-' + dd;
	console.log(today);
	document.getElementById("date").value=today;
</script>
</html>