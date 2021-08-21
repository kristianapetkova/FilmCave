<?php
session_start();
$to_address=5.00;
$to_ekont=3.00;
//error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];
echo $_POST["number_of_order"];
$number_of_order=$_POST["number_of_order"];
//SELECT orders.DATE_DELIVERED, addresses.ADDRESS, cities.CITY, regions.REGION, users.FIRST_NAME, users.LAST_NAME, shippings.SHIPPING, payments.PAYMENT, orders.PRICE, ordered_product.QUANTITY, products.POSTER, titles.TITLE, genres.GENRE, types.TYPE

$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_orders_all(?)");
mysqli_stmt_bind_param($call, 'i', $number_of_order);
mysqli_stmt_execute($call);
mysqli_stmt_bind_result($call,$date_delivered, $street_address, $city, $region, $first_name, $last_name, $shipping, $payment, $total_price, $quantity, $poster, $title, $genre, $type, $product_price);
$array_quantity=array();
$array_poster=array();
$array_title=array();
$array_genre=array();
$array_type=array();
$array_product_price=array();
while (mysqli_stmt_fetch($call)) {
        array_push($array_quantity,$quantity);
        array_push($array_poster,$poster);
        array_push($array_title,$title);
        array_push($array_genre,$genre);
        array_push($array_type,$type);
        array_push($array_product_price,$product_price);
}
$rows= mysqli_stmt_num_rows($call);
if($rows>0){
	//echo $address;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="my_acc_orders_all.css">
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
				<button class="buttons" onclick="window.location.href='my_acc_orders_simple.php'">
					Обратно
				</button>
				<h1>
					Поръчка № <?php echo $number_of_order; ?>
				</h1>
				<h4>
					Доставена на  <?php echo $date_delivered; ?>
				</h4>
				<div class="order_info">
					<div class="order_address">
						<h4>
							Адрес на доставка
						</h4>
						<hr>
						<span>
							<?php echo $street_address ?>
							<br>
							<?php echo $region.", ".$city ?>
							<br>
							<?php echo $first_name." ".$last_name ?>
						</span>
						<br>
						<br>
						<h4>
							Начин на доставка
						</h4>
						<hr>
						<span>
							<?php echo $shipping ?>
						</span>
						<br>
						<br>
						<h4>
							Начин на плащане
						</h4>
						<hr>
						<span>
							<?php echo $payment ?>
						</span>
					</div>
					<div class="order_product">
						<table>
							<thead>
								<tr>
									<th>
										Продукт
									</th>
									<th>
										Цена
									</th>
									<th>
										Кол.
									</th>
									<th>
										Сума
									</th>
								</tr>
							</thead>
							<tbody id="tbody">
								
							</tbody>
							<tfoot>
								<tr>
									<td>
										Доставка
									</td>
									<td>
										<?php 
										if($shipping=="до адрес"){
											$shipping_price=$to_address;
										}else{
											$shipping_price=$to_ekont;
										}
										echo $shipping_price;
										?>
										лв
									</td>
									<td>
										1
									</td>
									<td>
										<?php
										$total_shipping_price=$shipping_price*1;
										echo $total_shipping_price;
										?>
										лв

									</td>
								</tr>
							</tfoot>
						</table>
						<span>
							<h3 id="total_pay">
								ОБЩО: 
								<?php
								$total_payment=0;
								for ($i=0; $i <$rows ; $i++) { 
									$total_payment+=$array_product_price[$i]*$array_quantity[$i];
								}
									$total_payment+=$total_shipping_price;
									echo $total_payment;

								?>
							</h3>
						</span>
					</div>
				</div>
				
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

	var array_quantity=[];
    <?php 
    for ($i = 0 ; $i<count($array_quantity); $i++) { ?>
    	array_quantity.push("<?php echo $array_quantity[$i]; ?>" ); <?php
    }

    ?>

    var array_poster=[];
    <?php 
    for ($i = 0 ; $i<count($array_poster); $i++) { ?>
    	array_poster.push("<?php echo $array_poster[$i]; ?>" ); <?php
    }

    ?>

    var array_title=[];
    <?php 
    for ($i = 0 ; $i<count($array_title); $i++) { ?>
    	array_title.push("<?php echo $array_title[$i]; ?>" ); <?php
    }

    ?>

    var array_genre=[];
    <?php 
    for ($i = 0 ; $i<count($array_genre); $i++) { ?>
    	array_genre.push("<?php echo $array_genre[$i]; ?>" ); <?php
    }

    ?>

    var array_type=[];
    <?php 
    for ($i = 0 ; $i<count($array_type); $i++) { ?>
    	array_type.push("<?php echo $array_type[$i]; ?>" ); <?php
    }

    ?>

    var array_product_price=[];
    <?php 
    for ($i = 0 ; $i<count($array_product_price); $i++) { ?>
    	array_product_price.push("<?php echo $array_product_price[$i]; ?>" ); <?php
    }

    ?>

    var result = "<?php echo $rows ?>";
	//Shows every purchase
	for(var i =0;i<result;i++){
		$(document.getElementById("tbody")).append("<tr><td><img src='pictures/products/"+array_poster[i]+".jpg' alt='product photo' id='movie_poster'>"+array_title[i]+"</td><td>"+array_product_price[i]+"</td><td>"+array_quantity[i]+"</td><td>"+array_product_price[i]*array_quantity[i]+"</td></tr>");	
	}
</script>
</html>