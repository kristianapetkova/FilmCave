<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];
if($_SESSION["email"]){
	//Get user ID
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

	//Get favourite products
	$email=$_SESSION["email"];
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_favourites_products(?)");
	mysqli_stmt_bind_param($call, 'i', $id_user);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_product,$title,$type,$genre,$producer,$product_price,$poster,$promotion);
	$array_id_product=array();
	$array_title=array();
	$array_type=array();
	$array_genre=array();
	$array_producer=array();
	$array_product_price=array();
	$array_poster=array();
	$array_promotion=array();
	while (mysqli_stmt_fetch($call)) {
		array_push($array_id_product,$id_product);
        array_push($array_title,$title);
        array_push($array_type,$type);
        array_push($array_genre,$genre);
        array_push($array_producer,$producer);
        array_push($array_product_price,$product_price);
        array_push($array_poster,$poster);
        array_push($array_promotion,$promotion);
      }
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
		//echo $address;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="my_acc_fav.css">
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
			Начало -> Моят профил -> Любими продукти
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
				<button class="side_menu active" onclick="window.location.href='my_acc_fav.php'">
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
					Любими продукти
				</h1>
				<form method="post" action="edit_favourites.php">
					<label style="display: none;">ID product</label>
				<input type="text" name="id_of_product_to_delete" id="id_of_product_to_delete" style="display: none;">
				<input type="text" name="id_of_product_to_cart" id="id_of_product_to_cart" style="display: none;">
					<section id="favourite_products">


					</section>
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



	var array_producer=[];
    <?php 
    for ($i = 0 ; $i<count($array_producer); $i++) { ?>
    	array_producer.push("<?php echo $array_producer[$i]; ?>" ); <?php
    }

    ?>

    var array_promotion=[];
    <?php 
    for ($i = 0 ; $i<count($array_promotion); $i++) { ?>
    	array_promotion.push("<?php echo $array_promotion[$i]; ?>" ); <?php
    }

    ?>

	var array_id_product=[];
    <?php 
    for ($i = 0 ; $i<count($array_id_product); $i++) { ?>
    	array_id_product.push("<?php echo $array_id_product[$i]; ?>" ); <?php
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

    var array_new_price=[]
    for (var i = 0; i <result; i++) {
    	if(array_promotion[i]==1){
    		array_new_price[i]=(array_product_price[i]-array_product_price[i]*0.1).toFixed(2);
    	}
    	else{
    		array_new_price[i]=array_product_price[i];
    	}
    }


	//Shows every purchase
	for(var i =0;i<result;i++){
		if(array_type[i]=="Книга"){
			if(array_promotion[i]==1){
	    		$(document.getElementById("favourite_products")).append("<article><div class='product'><div class='pr_poster'><img src='pictures/products/"+array_poster[i]+".jpg' alt='Product Photo' id='movie_poster'></div><div class='pr_info'><div><h2>"+array_title[i]+"</h2><span>"+array_type[i]+"<br>Жанр: "+array_genre[i]+"<br>Автор: "+array_producer[i]+"<br></span></div><div><span id='old_price' class='old_price'>"+array_product_price[i]+"лв.</span>"+array_new_price[i]+"лв.</div></div></div><div class='activity'><button class='buttons_add_cart' id='add_cart"+i+"'>Добави в количка</button><br><button class='remove_from_fav' id='remove_from_fav"+i+"'><u>Премахни от любими</u></button></div></article><hr style='margin:2% 0%; height:1px;'>");
	    	}
	    	else{
	    		$(document.getElementById("favourite_products")).append("<article><div class='product'><div class='pr_poster'><img src='pictures/products/"+array_poster[i]+".jpg' alt='Product Photo' id='movie_poster'></div><div class='pr_info'><div><h2>"+array_title[i]+"</h2><span>"+array_type[i]+"<br>Жанр: "+array_genre[i]+"<br>Автор: "+array_producer[i]+"<br></span></div><div>"+array_new_price[i]+"лв.</div></div></div><div class='activity'><button class='buttons_add_cart' id='add_cart"+i+"'>Добави в количка</button><br><button class='remove_from_fav' id='remove_from_fav"+i+"'><u>Премахни от любими</u></button></div></article><hr style='margin:2% 0%; height:1px;'>");
	    	}
		}else{
			if(array_promotion[i]==1){
	    		$(document.getElementById("favourite_products")).append("<article><div class='product'><div class='pr_poster'><img src='pictures/products/"+array_poster[i]+".jpg' alt='Product Photo' id='movie_poster'></div><div class='pr_info'><div><h2>"+array_title[i]+"</h2><span>"+array_type[i]+"<br>Жанр: "+array_genre[i]+"<br>Режисьор: "+array_producer[i]+"<br></span></div><div><span id='old_price' class='old_price'>"+array_product_price[i]+"лв.</span>"+array_new_price[i]+"лв.</div></div></div><div class='activity'><button class='buttons_add_cart' id='add_cart"+i+"'>Добави в количка</button><br><button class='remove_from_fav' id='remove_from_fav"+i+"'><u>Премахни от любими</u></button></div></article><hr style='margin:2% 0%; height:1px;'>");
	    	}
	    	else{
	    		$(document.getElementById("favourite_products")).append("<article><div class='product'><div class='pr_poster'><img src='pictures/products/"+array_poster[i]+".jpg' alt='Product Photo' id='movie_poster'></div><div class='pr_info'><div><h2>"+array_title[i]+"</h2><span>"+array_type[i]+"<br>Жанр: "+array_genre[i]+"<br>Режисьор: "+array_producer[i]+"<br></span></div><div>"+array_new_price[i]+"лв.</div></div></div><div class='activity'><button class='buttons_add_cart' id='add_to_cart' id='add_cart"+i+"'>Добави в количка</button><br><button class='remove_from_fav' id='remove_from_fav"+i+"'><u>Премахни от любими</u></button></div></article><hr style='margin:2% 0%; height:1px;'>");
	    	}
		}
	}

	$('.remove_from_fav').click(function() {
	    let temp=$(this).attr('id');
	    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
	    console.log(array_title[pos]);
	    document.getElementById("id_of_product_to_delete").value=array_id_product[pos];

	  });

	$('.buttons_add_cart').click(function() {
	    let temp=$(this).attr('id');
	    console.log(temp);
	    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
	    console.log(array_title[pos]);
	    document.getElementById("id_of_product_to_cart").value=array_id_product[pos];

	  });

</script>

</html>