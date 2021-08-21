<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="movies.css">
	<link rel="stylesheet" type="text/css" href="basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			Начало -> Филми
		</h5>
		<hr>
		<section>
			<aside>
				<button class="accordeon">
					КАТЕГОРИИ
				</button>
				<div class="panel">
					<ul>
						<li>
							<span>
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
								Филми DVD
							</span>
						</li>
						<li>
							<span>
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
								Филми Blu-Ray
							</span>
						</li>
						<li>
							<span>
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
								Сериали
							</span>
						</li>
						
					</ul>
				</div>



				<button class="accordeon">
					ЖАНР
				</button>
				<div class="panel">
					<ul>
						<li>
							<input type="checkbox" name="cb_comedy">
							<span>
								Комедия
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_fantasy">
							<span>
								Фентъзи
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_action">
							<span>
								Екшън
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_adventure">
							<span>
								Приключенски
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_horror">
							<span>
								Ужаси
							</span>
						</li>
					</ul>
				</div>



				<button class="accordeon">
					ЕЗИК
				</button>
				<div class="panel">
					<ul>
						<li>
							<input type="checkbox" name="cb_lang_bg">
							<span>
								Български
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_eng">
							<span>
								Английски
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_ger">
							<span>
								Немски
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_rus">
							<span>
								Руски
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_fr">
							<span>
								Френски
							</span>
						</li>
					</ul>
				</div>



				<button class="accordeon">
					СУБТИТРИ
				</button>
				<div class="panel">
					<ul>
						<li>
							<input type="checkbox" name="cb_lang_none">
							<span>
								Без
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_bg">
							<span>
								Български
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_eng">
							<span>
								Английски
							</span>
						</li>
						<li>
							<input type="checkbox" name="cb_lang_ger">
							<span>
								Немски
							</span>
						</li>
					</ul>
				</div>
			</aside>

			<section>
				<h1>
					ФИЛМИ
				</h1>
				<hr>
				<div>
					<div>
						<label>
							Сортирай по:
						</label>
						<select>
							<option>
								По подразбиране
							</option>
							<option>
								Цена: възходяща
							</option>
							<option>
								Цена: низходяща
							</option>
							<option>
								Най-нови
							</option>
						</select>
					</div>

				</div>
				<hr>
				<div class="products">
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
					</div>
					<div class="pg_product">
						<img src="pictures\movie_poster.jpg" class="ngp_poster">
						<div>
							<span class="rating">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_full.png" class="stars">
								<img src="pictures\star_half.png" class="stars">
							</span>
							<span class="add_to_fav">
								<img src="pictures\favourite_add.png" class="heart">
							</span>
							<span class="add_to_cart">
								<img src="pictures\cart_new.png" class="cart">
							</span>
						</div>
								
						<h3>Avengers</h5>
						<h5>Blu-Ray</h5>
						<h4>19,99лв</h4>
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

</script>
</html>