<?php
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];

if($_SESSION["email"]){
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

	// orders.NUMBER_ORDER, orders.DATE_ORDERED, users.FIRST_NAME, users.LAST_NAME, orders.PRICE, states.STATE 
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_orders_simple(?)");
	mysqli_stmt_bind_param($call, 'i', $id_user);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$number_order,$date_ordered,$first_name,$last_name,$price,$state);
	$array_number_order=array();
	$array_date_ordered=array();
	$array_price=array();
	$array_state=array();
	while (mysqli_stmt_fetch($call)) {
		array_push($array_number_order, $number_order);
		array_push($array_date_ordered, $date_ordered);
		array_push($array_price, $price);
		array_push($array_state, $state);
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
	<link rel="stylesheet" type="text/css" href="my_acc_orders_simple.css">
	<link rel="stylesheet" type="text/css" href="basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
	<header>
		<div class="head">
			<div class="logo">
				<a href="1home.php"><img src="pictures\FilmCave.svg" class="logo_picture"></a>
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
			Начало -> Моят профил -> История на поръчките
		</h5>
		<hr>
		<section>
			<aside>
				<button class="side_menu " onclick="window.location.href='my_acc_info.php'">
					Моите данни
				</button>
				<button class="side_menu active" onclick="window.location.href='my_acc_orders_simple.php'">
					История на поръчките
				</button>
				<button class="side_menu" onclick="window.location.href='my_acc_fav.php'">
					Любими продукти
				</button>
				<button class="side_menu" onclick="window.location.href='my_acc_return1.php'">
					Връщане на продукт
				</button>
				<button class="side_menu" onclick="window.location.href='logout.php'">
					Изход
				</button>
				
			</aside>
			<section>
				<h1>
					История на поръчките
				</h1>
				<form method="POST" action="my_acc_orders_all.php">
					<input type="text" name="number_of_order" id="number_of_order" style="display: none;">
					<table>
						<thead>
							<tr>
								<th>
									Поръчка №
								</th>
								<th>
									Дата
								</th>
								<th>
									Получател
								</th>
								<th>
									Цена
								</th>
								<th>
									Статус
								</th>
								<th>
									Действия
								</th>
							</tr>
						</thead>
						<tbody id="purchases_list">
							
							
						</tbody>
					</table>
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

	var first_name="<?php echo $first_name ?>";
	var last_name="<?php echo $last_name ?>";

	var array_number_order=[];
    <?php 
    for ($i = 0 ; $i<count($array_number_order); $i++) { ?>
    	array_number_order.push("<?php echo $array_number_order[$i]; ?>" ); <?php
    }

    ?>
    var array_date_ordered=[];
    <?php 
    for ($i = 0 ; $i<count($array_date_ordered); $i++) { ?>
    	array_date_ordered.push("<?php echo $array_date_ordered[$i]; ?>" ); <?php
    }

    ?>
    var array_price=[];
    <?php 
    for ($i = 0 ; $i<count($array_price); $i++) { ?>
    	array_price.push("<?php echo $array_price[$i]; ?>" ); <?php
    }

    ?>
    var array_state=[];
    <?php 
    for ($i = 0 ; $i<count($array_state); $i++) { ?>
    	array_state.push("<?php echo $array_state[$i]; ?>" ); <?php
    }

    ?>
	//Shows every purchase
	for(var i =0;i<array_number_order.length;i++){
		$(document.getElementById("purchases_list")).append("<tr><td>"+array_number_order[i]+"</td><td>"+array_date_ordered[i]+"</td><td>"+first_name+" "+last_name+"</td><td>"+array_price[i]+"</td><td>"+array_state[i]+"</td><td><u><button id='see_more"+i+"' class='see_more' name='see_more"+i+"'>Повече</button></u></td></tr>");

	$('.see_more').click(function() {
	    let temp=$(this).attr('id');
	    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
	    document.getElementById("number_of_order").value=array_number_order[pos];    
	  });
	}
</script>
</html>