<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="help.css">
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
			Начало -> Често задавани въпроси
		</h5>
		<hr>
		<section>
			<h1>
				Често задавани въпроси
			</h1>
			<h3>
				Поръчки
			</h3>
			<details>
				<summary>
					Как да поръчам?
				</summary>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet euismod diam, vel vestibulum metus congue id. Donec ullamcorper est quis placerat euismod. Sed elit lorem, ultricies vel consequat ac, venenatis non libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ex orci, semper sed ligula non, maximus fringilla ligula. Vivamus ut purus id metus sagittis porta. Quisque placerat dictum nunc ut auctor. Integer in quam volutpat, consequat eros a, dapibus nibh. Cras tristique varius porttitor.


				</p>
			</details>
			<details>
				<summary>
					Кога ще пристигне поръчката?
				</summary>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet euismod diam, vel vestibulum metus congue id. Donec ullamcorper est quis placerat euismod. Sed elit lorem, ultricies vel consequat ac, venenatis non libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ex orci, semper sed ligula non, maximus fringilla ligula. Vivamus ut purus id metus sagittis porta. Quisque placerat dictum nunc ut auctor. Integer in quam volutpat, consequat eros a, dapibus nibh. Cras tristique varius porttitor.


				</p>
			</details>
			<details>
				<summary>
					Къде да проследя поръчката?
				</summary>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet euismod diam, vel vestibulum metus congue id. Donec ullamcorper est quis placerat euismod. Sed elit lorem, ultricies vel consequat ac, venenatis non libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ex orci, semper sed ligula non, maximus fringilla ligula. Vivamus ut purus id metus sagittis porta. Quisque placerat dictum nunc ut auctor. Integer in quam volutpat, consequat eros a, dapibus nibh. Cras tristique varius porttitor.


				</p>
			</details>
			
				
			<h3>
				Общи
			</h3>
			<details>
				<summary>
					Кога ще пристигне поръчката?
				</summary>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet euismod diam, vel vestibulum metus congue id. Donec ullamcorper est quis placerat euismod. Sed elit lorem, ultricies vel consequat ac, venenatis non libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ex orci, semper sed ligula non, maximus fringilla ligula. Vivamus ut purus id metus sagittis porta. Quisque placerat dictum nunc ut auctor. Integer in quam volutpat, consequat eros a, dapibus nibh. Cras tristique varius porttitor.


				</p>
			</details>
			<details>
				<summary>
					Как да се свържа с офиса?
				</summary>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet euismod diam, vel vestibulum metus congue id. Donec ullamcorper est quis placerat euismod. Sed elit lorem, ultricies vel consequat ac, venenatis non libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ex orci, semper sed ligula non, maximus fringilla ligula. Vivamus ut purus id metus sagittis porta. Quisque placerat dictum nunc ut auctor. Integer in quam volutpat, consequat eros a, dapibus nibh. Cras tristique varius porttitor.


				</p>
				
			</details>
			<details>
				<summary>
					Какво представлява месечния каталог?
				</summary>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet euismod diam, vel vestibulum metus congue id. Donec ullamcorper est quis placerat euismod. Sed elit lorem, ultricies vel consequat ac, venenatis non libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ex orci, semper sed ligula non, maximus fringilla ligula. Vivamus ut purus id metus sagittis porta. Quisque placerat dictum nunc ut auctor. Integer in quam volutpat, consequat eros a, dapibus nibh. Cras tristique varius porttitor.


				</p>
			</details>
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