<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="contacts.css">
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
			Начало -> Контакти
		</h5>
		<hr>
		<h1>
			КОНТАКТИ
		</h1>
		<section>
			
			<article>
				<div>
					<div>
						<span>
							<b>Телефони:</b>
						</span>
						<span>
							+35988 422 5666
							<br>
							+35989 555 5555
						</span>
					</div>
					<br>
					<div>
						<span>
							<b>E-mail:</b>
						</span>
						<span>
							filmcave@gmail.com
						</span>
					</div>
					<br>
					<div>
						<span>
							<b>Работно Време:</b>
							<br>
							Пон - Петък:
							<br>
							Събота - Неделя:
						</span>
						<span>
							<br>
							<time>
								09:00 - 21:00
								<br>
								10:00 - 20:00
							</time>
						</span>
					</div>
				</div>
				<hr>
				<div>
					<div>
						<span>
							<b>Централен офис:</b>
							<br>
							гр. Варна, България
							<br>
							<br>
						</span>
					</div>
					<div>
						<img src="pictures/contact_map.png" alt="Location of Main Office" id="contact_map">
					</div>
				</div>
			</article>
			<article>
				<h2>
					Форма за контакт
				</h2>
				<label>
					Име:
				</label>
				<br>
				<input type="text" name="name">
				<br><br>
				<label>
					E-mail:
				</label>
				<br>
				<input type="text" name="email">
				<br><br>
				<label>
					Телефон:
				</label>
				<br>
				<input type="number" name="telephone">
				<br><br>
				<label>
					Тема:
				</label>
				<br>
				<input type="text" name="title">
				<br><br>
				<label>
					Съобщение:
				</label>
				<br>
				<textarea>
					
				</textarea>
				<br><br>
				<button class="buttons">
					Изпрати съобщение
				</button>
			</article>
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