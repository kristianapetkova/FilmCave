<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="my_cart.css">
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
			Начало -> Количка
		</h5>
		<hr>
		<section>
			<h1>
				Твоята количка
			</h1>
			<div>
				<div class="product_client">
				
					<table>
						<thead>
							<tr>
								<th>
									Продукт
								</th>
								<th>
									Ед. цена
								</th>
								<th>
									Брой
								</th>
								<th>
									Сума
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="poster">
										<img src="pictures/movie_poster.jpg" alt="movie poster" class="movie_poster">
									</div>
									<div class="table_product">
										<span>
											Хари Потър
										</span>
										<br>
										<span>
											Книга
										</span>
									</div>
								</td>
								<td>
									<span class="old_price">
										17,00лв
									</span>
									15,00лв
								</td>
								<td>
									1
								</td>
								<td>
									15,00лв
								</td>
							</tr>
						</tbody>
					</table>

					<h3>
						Метод за доставка:
					</h3>
					<input type="radio" name="dostavka">
					до адрес - 5лв
					<br>
					<input type="radio" name="dostavka">
					до офис на Еконт - 3лв

					<h3>
						Начин на плащане
					</h3>
					<input type="radio" name="plashtane">
					Наложен платеж
					<br>
					<input type="radio" name="plashtane">
					Плащане с карта
					<br><br>
					<div class="client_info">
						
						<label>
							Име:
						</label>
						<input type="text" name="first_name">
						<br>
						<label>
							Фамилия:
						</label>
						<input type="text" name="family_name">
						<br>
						<label>
							Телефон:
						</label>
						<input type="number" name="telephone">
						<br>
						<label>
							Област:
						</label>
						<input type="text" name="region">
						<br>
						<label>
							Населено място:
						</label>
						<input type="text" name="city">
						<br>
						<label>
							Адрес за доставка:
						</label>
						<input type="text" name="address">
						<br>
						<label>
							Коментар
						</label>
						<textarea>
							
						</textarea>
					</div>
					<br>
					<input type="checkbox" name="opakovka">
					Желая подаръчна опаковка +1лв
					<br>
					<input type="checkbox" name="save_data">
					Запази данните ми за следващите поръчки

					<br>
					<br>
					<hr>
					<h2>
						Нашата кауза
					</h2>
					<p>
						Cras posuere eu mauris a commodo. Pellentesque eu metus at justo luctus blandit. Suspendisse imperdiet vulputate orci, vitae consectetur augue vehicula in. Nulla facilisi. Fusce eget orci et augue mattis accumsan. Maecenas diam urna, accumsan quis porttitor eget, efficitur nec lacus. Aenean nec ullamcorper sem. Sed dapibus, nisi eget hendrerit interdum, turpis lectus bibendum velit, non porttitor nunc massa ut dolor.


					</p>
				</div>
				<div class="total_pay">
					<h3>
						Дължима сума:
					</h3>
					<hr>
					<div class="suma">
						<span>
							Междинна сума:
							<br>
							Доставка:
							<br>
							Подаръчна опаковка:
						</span>
						<span>
							15,00лв
							<br>
							3,00лв
							<br>
							0,00лв
						</span>
					</div>
					<hr>
					<div class="suma">
						<span>
							ОБЩО:
						</span>
						<span>
							18,00лв
						</span>
					</div>
					<div class="end_purchase">
						<button class="buttons" onclick="window.location.href='thank_you.php'">
							Завърши поръчката
						</button>
					</div>
				</div>
			</div>
			
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