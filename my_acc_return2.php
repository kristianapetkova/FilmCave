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
	$call = mysqli_prepare($conn, "CALL get_orders_to_return(?)");
	mysqli_stmt_bind_param($call, 'i', $id_user);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$number_order,$date_ordered,$date_delivered,$state,$id_product,$title,$warranty,$quantity);
	$array_number_order=array();
	$array_date_ordered=array();
	$array_date_delivered=array();
	$array_state=array();
	$array_id_product=array();
	$array_title=array();
	$array_date_warranty=array();
	$array_quantity=array();
	while (mysqli_stmt_fetch($call)) {
		array_push($array_number_order, $number_order);
		array_push($array_date_ordered, $date_ordered);
		array_push($array_date_delivered, $date_delivered);
		array_push($array_state, $state);
		array_push($array_id_product, $id_product);
		array_push($array_title, $title);
		array_push($array_date_warranty, $warranty);
		array_push($array_quantity, $quantity);
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
	<link rel="stylesheet" type="text/css" href="my_acc_return2.css">
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
				<button class="buttons_return" onclick="window.location.href='my_acc_return1.php'">
					Обратно
				</button>
				<h1>
					Връщане на продукт
				</h1>
				<h2>
					Моля изберете кой продукт искате да върнете
				</h2>
				<form method="post" action="my_acc_return3.php">
					<label>ID selected rpoduct to return</label>
					<input type="text" name="id_product_return" id="id_product_return">
					<label>ID selected order</label>
					<input type="text" name="id_selected_order" id="id_selected_order">
				<table>
					<thead>
						<tr>
							<th>
								Продукт
							</th>
							<th>
								Кол.
							</th>
							<th>
								Поръчка №
							</th>
							<th>
								Дата на поръчка
							</th>
							<th>
								Право на връщане до
							</th>
						</tr>
					</thead>
					<tbody id="tbody"> 
						
						
					</tbody>
				</table>


				<button class="buttons">
					Попълни заявление
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
	var array_date_delivered=[];
    <?php 
    	for ($i = 0 ; $i<count($array_date_delivered); $i++) { ?>
    		array_date_delivered.push("<?php echo $array_date_delivered[$i]; ?>" ); <?php
    }

    ?>
    var array_state=[];
    <?php 
    for ($i = 0 ; $i<count($array_state); $i++) { ?>
    	array_state.push("<?php echo $array_state[$i]; ?>" ); <?php
    }

    ?>

    var array_id_product=[];
    <?php 
    for ($i = 0 ; $i<count($array_id_product); $i++) { ?>
    	array_id_product.push("<?php echo $array_id_product[$i]; ?>" ); <?php
    }

    ?>
    var array_title=[];
    <?php 
    for ($i = 0 ; $i<count($array_title); $i++) { ?>
    	array_title.push("<?php echo $array_title[$i]; ?>" ); <?php
    }

    ?>
	var array_date_warranty=[];
    <?php 
    	for ($i = 0 ; $i<count($array_date_warranty); $i++) { ?>
    		array_date_warranty.push("<?php echo $array_date_warranty[$i]; ?>" ); <?php
    }

    ?>
    var array_quantity=[];
    <?php 
    for ($i = 0 ; $i<count($array_quantity); $i++) { ?>
    	array_quantity.push("<?php echo $array_quantity[$i]; ?>" ); <?php
    }

    ?>
	//Shows every purchase
	for(var i =0;i<array_number_order.length;i++){
		$(document.getElementById("tbody")).append("<tr><td class='product_name'><input type='radio' name='product_check' id='product_check"+i+"'>"+array_title[i]+"</td><td>"+array_quantity[i]+"</td><td>"+array_number_order[i]+"</td><td>"+array_date_ordered[i]+"</td><td>"+array_date_warranty[i]+"</td></tr>");


	}
	$('.product_name input:radio').click(function() {
	    let temp=$(this).attr('id');
	    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
	    document.getElementById("id_product_return").value=array_id_product[pos];
	    document.getElementById("id_selected_order").value=array_number_order[pos];
	  });
</script>
</html>