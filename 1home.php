<?php
session_start();
$_SESSION["filename"]=basename($_SERVER['PHP_SELF']);
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];
$product_count=5;

//get newest products
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_newest_products(?)");
mysqli_stmt_bind_param($call,"i",$product_count);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_newest_product,$poster,$title,$type,$product_price,$rating);
	$array_id_newest_product=array();
	$array_title=array();
	$array_type=array();
	$array_product_price=array();
	$array_poster=array();
	$array_rating=array();

while (mysqli_stmt_fetch($call)) {
	array_push($array_id_newest_product, $id_newest_product);
	array_push($array_title, $title);
	array_push($array_type, $type);
	array_push($array_product_price, $product_price);
	array_push($array_poster, $poster);
	array_push($array_rating, $rating);
    }
$rows= mysqli_stmt_num_rows($call);
if($rows>0){}

//get promoted products
$conn=mysqli_connect("localhost","root","","filmcave");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$call = mysqli_prepare($conn, "CALL get_promoted_products(?)");
mysqli_stmt_bind_param($call,"i",$product_count);
mysqli_stmt_execute($call);

mysqli_stmt_bind_result($call,$id_promo_newest_product,$promo_poster,$promo_title,$promo_type,$promo_product_price,$promo_rating);
	$array_id_promo_newest_product=array();
	$array_promo_title=array();
	$array_promo_type=array();
	$array_promo_product_price=array();
	$array_promo_poster=array();
	$array_promo_rating=array();

while (mysqli_stmt_fetch($call)) {
	array_push($array_id_promo_newest_product, $id_promo_newest_product);
	array_push($array_promo_title, $promo_title);
	array_push($array_promo_type, $promo_type);
	array_push($array_promo_product_price, $promo_product_price);
	array_push($array_promo_poster, $promo_poster);
	array_push($array_promo_rating, $promo_rating);
    }
$rows= mysqli_stmt_num_rows($call);
if($rows>0){}	




?>

<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="1.homepage.css">
	<link rel="stylesheet" type="text/css" href="basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
	<header>
		<div class="head">
			<div class="logo">
				<a href="1home.php">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 737.3 279" style="enable-background:new 0 0 737.3 279;" xml:space="preserve" class="logo_picture" id="logo_picture">
					<style type="text/css">
						
					</style>
					<g>
						<path class="st0 logo_picture" d="M117.9,152h108.9c4.3,0,7.8,3.5,7.8,7.8v64.8c0,0,0,14.3-12.9,14.3c-9.1,0-103.6,0-103.6,0h46.3
							c0,0-94.5,0-103.6,0c-12.9,0-12.9-14.3-12.9-14.3v-64.8c0-4.3,3.5-7.8,7.8-7.8h108.9"/>
						<path class="st0" d="M181.8,162.1"/>
						<g>
							<polygon class="st0" points="67.4,123.8 99.4,146.3 128,146.3 95.8,123.6 		"/>
							<polygon class="st0" points="110.9,123.8 142.9,146.3 171.6,146.3 139.3,123.6 		"/>
							<polygon class="st0" points="158.5,123.8 190.6,146.4 219.1,146.4 186.9,123.7 		"/>
							<path class="st0" d="M47.9,123.8L48,140c0,3.5,4,6.3,9,6.3h24.7"/>
							<path class="st0" d="M234.5,146.3l-0.1-16.3c0-3.5-4.1-6.3-9-6.3h-24.7"/>
							<polygon class="st0" points="190.2,26.3 172.1,61.1 146.7,74.2 164.9,39.2 		"/>
							<polygon class="st0" points="151.6,46.3 133.5,81 108.1,94.2 126.3,59.2 		"/>
							<polygon class="st0" points="109.3,68.2 91.2,102.9 65.8,116.1 84,81.1 		"/>
							<path class="st0" d="M207.6,17.4l7.4,14.5c1.6,3.1-0.7,7.5-5.1,9.8l-21.9,11.3"/>
							<path class="st0" d="M48.5,124.5L41.1,110c-1.6-3.1,0.7-7.5,5.1-9.8l21.9-11.3"/>
						</g>
					</g>
					<line class="st1" x1="269.5" y1="73.1" x2="269.5" y2="194.4"/>
					<g>
						<path class="st2" d="M301,101.1h38.8v11.2h-24.4v17.1h18.8v11.2h-18.8v25.8H301V101.1z"/>
						<path class="st2" d="M344.4,101.1h14.4v65.3h-14.4V101.1z"/>
						<path class="st2" d="M371.1,101.1h14.4v53.1h21v12.2h-35.4V101.1z"/>
						<path class="st2" d="M412.8,101.1h21l9.2,40.3l10.4-40.3h20.4v65.3h-13.4v-54.7l-13.4,54.7h-10.4l-12.2-54.7v54.7h-11.7
							L412.8,101.1L412.8,101.1z"/>
						<path class="st2" d="M518,142.6l13.2,0.8c-0.5,7.1-2.7,12.8-6.8,17.3c-4,4.4-9.3,6.7-15.9,6.7c-8,0-14.2-3-18.4-8.9
							c-4.2-6-6.3-14.2-6.3-24.6c0-10.6,2.1-18.8,6.3-24.8c4.2-6,10.4-8.9,18.6-8.9c13.6,0,21,8.4,22.2,25.3l-13.1,1
							c-0.3-9.7-3.4-14.5-9.1-14.5c-3,0-5.4,1.6-7.1,4.7c-1.8,3.1-2.7,9.2-2.7,18.2c0,8,0.8,13.6,2.4,16.6c1.6,3,4.1,4.5,7.3,4.5
							C514,155.7,517.1,151.3,518,142.6z"/>
						<path class="st2" d="M552,101.1h14.5l18.7,65.3h-14.7l-3.3-13.5h-18.4l-3.2,13.5h-13.2L552,101.1z M564.4,141.7l-6.6-26.8
							l-6.3,26.8H564.4z"/>
						<path class="st2" d="M581.9,101.1h15l10,49.8l10.4-49.8h12.3l-16,65.6l-16.1-0.3L581.9,101.1z"/>
						<path class="st2" d="M634.5,101.1h39.7v11.2h-25.3v15.2h19.7v11.2h-19.7v16.1h25.3v11.7h-39.7V101.1z"/>
					</g>
					</svg>
				</a>
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
		<div class="slideshow-container">

			<div class="mySlides fade">
			  <div class="numbertext">1 / 3</div>
			  <img src="pictures\advertises\HarryPotter.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">2 / 3</div>
			  <img src="pictures\advertises\BOOK.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">3 / 3</div>
			  <img src="pictures\advertises\Pose.jpg" style="width:100%">
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<br>
		</div>

		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span> 
		  <span class="dot" onclick="currentSlide(2)"></span> 
		  <span class="dot" onclick="currentSlide(3)"></span> 
		</div>
	</header>
	<main>
		<form action="fav_cart_server.php" method="post">
			<label style="display: none;">id fav</label >
			<input type="text" name="id_favourite" id="id_favourite" style="display: none;" placeholder="fav">
			<label style="display: none;">id cart</label>
			<input type="text" name="id_cart" id="id_cart" style="display: none;" placeholder="cart">
		

			<div class="newest">
				<h1>
					НАЙ-НОВО:
				</h1>
				<hr>
				<div class="newest_gallery" id="newest_gallery">

				</div>
				<!-- The Modal -->
				<div id="myModal" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <span class="close">&times;</span>
				    <p>Some text in the Modal..</p>
				  </div>

				</div>
			</div>
			<div class="promos">
				<h1>
					ПРОМОЦИИ:
				</h1>
				<hr>
				<div class="promos_gallery" id="promos_gallery">
					

				</div>
				<!-- The Modal for New Fav -->
				<div id="new_fav" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <span class="close_new_fav">&times;</span>
				    <p>Успешно добавено в любими</p>
				  </div>

				</div>

				<!-- The Modal for Promo Fav -->
				<div id="promo_fav" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <span class="close_promo_fav">&times;</span>
				    <p>promo_fav</p>
				  </div>

				</div>

				<!-- The Modal for New Cart -->
				<div id="new_cart" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <span class="close_new_cart">&times;</span>
				    <p>new_cart</p>
				  </div>

				</div>

				<!-- The Modal for Promo Cart -->
				<div id="promo_cart" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <span class="close_promo_cart">&times;</span>
				    <p>promo_cart</p>
				  </div>

				</div>
			</div>
		</form>
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
<script>

	//gallery slideshow
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}


//Newest products

	var array_id_newest_product=[];
    <?php 
    for ($i = 0 ; $i<count($array_id_newest_product); $i++) { ?>
    	array_id_newest_product.push("<?php echo $array_id_newest_product[$i]; ?>" ); <?php
    }

    ?>

    var array_title=[];
    <?php 
    for ($i = 0 ; $i<count($array_title); $i++) { ?>
    	array_title.push("<?php echo $array_title[$i]; ?>" ); <?php
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
    	array_product_price.push("<?php echo $array_product_price[$i]; ?>" ).toFixed(2); <?php
    }

    ?>


    var array_poster=[];
    <?php 
    for ($i = 0 ; $i<count($array_poster); $i++) { ?>
    	array_poster.push("<?php echo $array_poster[$i]; ?>" ); <?php
    }

    ?>

    var array_rating=[];
    <?php 
    for ($i = 0 ; $i<count($array_rating); $i++) { ?>
    	array_rating.push("<?php echo $array_rating[$i]; ?>" ); <?php
    }

    ?>


//Promoted products

	var array_id_promo_newest_product=[];
    <?php 
    for ($i = 0 ; $i<count($array_id_promo_newest_product); $i++) { ?>
    	array_id_promo_newest_product.push("<?php echo $array_id_promo_newest_product[$i]; ?>" ); <?php
    }

    ?>

    var array_promo_title=[];
    <?php 
    for ($i = 0 ; $i<count($array_promo_title); $i++) { ?>
    	array_promo_title.push("<?php echo $array_promo_title[$i]; ?>" ); <?php
    }

    ?>

    var array_promo_type=[];
    <?php 
    for ($i = 0 ; $i<count($array_promo_type); $i++) { ?>
    	array_promo_type.push("<?php echo $array_promo_type[$i]; ?>" ); <?php
    }

    ?>

    var array_promo_product_price=[];
    <?php 
    for ($i = 0 ; $i<count($array_promo_product_price); $i++) { ?>
    	array_promo_product_price.push("<?php echo $array_promo_product_price[$i]; ?>" ); <?php
    }

    ?>
    //new promo price
    var array_new_product_price=[];
    for (var i=0;i<array_promo_product_price.length;i++){
    	array_new_product_price[i]=(array_promo_product_price[i]-array_promo_product_price[i]*0.1).toFixed(2);
	}

    var array_promo_poster=[];
    <?php 
    for ($i = 0 ; $i<count($array_promo_poster); $i++) { ?>
    	array_promo_poster.push("<?php echo $array_promo_poster[$i]; ?>" ); <?php
    }

    ?>

    var array_promo_rating=[];
    <?php 
    for ($i = 0 ; $i<count($array_promo_rating); $i++) { ?>
    	array_promo_rating.push("<?php echo $array_promo_rating[$i]; ?>" ); <?php
    }

    ?>

    var result = "<?php echo $rows ?>";

    var error_msg_fav_cart="<?php echo $_SESSION['error_msg_fav_cart'] ?>";
    				
	for(var i =0;i<result;i++){

	    $(document.getElementById("newest_gallery")).append("<div class='ng_product'><span class='product_info'><img src='pictures/products/"+array_poster[i]+".jpg' class='ngp_poster'><div class='first_line'><span class='rating'></span><span class='add_to_fav' id='favourite_new"+i+"'><button class='heart_button'><svg class='heart' name='heart' enable-background='new 0 0 24 24'  height='24' viewBox='0 0 24 24' width='24'  xmlns='http://www.w3.org/2000/svg'><path class='heart' d='m11.466 22.776c.141.144.333.224.534.224s.393-.08.534-.224l9.594-9.721c4.001-4.053 1.158-11.055-4.532-11.055-3.417 0-4.985 2.511-5.596 2.98-.614-.471-2.172-2.98-5.596-2.98-5.672 0-8.55 6.984-4.531 11.055z' /></svg></button></span></div><h3>"+array_title[i]+"</h3><h5>"+array_type[i]+"</h5></span><span class='price_cart'><h4>"+array_product_price[i]+"лв.</h4><button class='buttons' id='cart_new"+i+"'>Добави в количка</button></span></div>");


	    $(document.getElementById("promos_gallery")).append("<div class='pg_product'><span class='product_info'><img src='pictures/products/"+array_promo_poster[i]+".jpg' class='ngp_poster'><div class='first_line'><span class='rating'></svg></span><span class='add_to_fav' id='favourite_promo"+i+"'><button class='heart_button'><svg class='heart' name='heart' enable-background='new 0 0 24 24'  height='24' viewBox='0 0 24 24' width='24'  xmlns='http://www.w3.org/2000/svg'><path class='heart' d='m11.466 22.776c.141.144.333.224.534.224s.393-.08.534-.224l9.594-9.721c4.001-4.053 1.158-11.055-4.532-11.055-3.417 0-4.985 2.511-5.596 2.98-.614-.471-2.172-2.98-5.596-2.98-5.672 0-8.55 6.984-4.531 11.055z' /></svg></button></span></div><h3>"+array_promo_title[i]+"</h3><h5>"+array_promo_type[i]+"</h5></span><span class='price_cart'><h4><span class='promo'>"+array_promo_product_price[i]+"лв.</span>"+array_new_product_price[i]+"лв.</h4><button class='buttons' id='cart_promo"+i+"'>Добави в количка</button></span></div>");
	}

		//add to favourites
		$('.add_to_fav').click(function() {
		    let temp=$(this).attr('id');
		    if(temp.match(/favourite_promo/)){
		    	let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
		    	console.log(array_id_promo_newest_product[pos]);
		    	document.getElementById("id_favourite").value=array_id_promo_newest_product[pos];

		    	window.location="fav_cart_server.php";
		    	if(error_msg_fav_cart=="true"){
					// Get the modal
					var modal = document.getElementById("promo_fav");

					// When the user clicks on the button, open the modal
					modal.style.display = "block";

					$('.modal-content').find('p').append("Моля, влезте си в профила или направете регистрация")
					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close_promo_fav")[0];

					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
					  modal.style.display = "none";
					}

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					  if (event.target == modal) {
					    modal.style.display = "none";
					  }
					}	
		    	}
		    	else{
					// Get the modal
					var modal = document.getElementById("promo_fav");

					// When the user clicks on the button, open the modal
					modal.style.display = "block";
					$('.modal-content').find('p').append("Успешно добавено в любими!");


										// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close_promo_fav")[0];

					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
					  modal.style.display = "none";
					}

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					  if (event.target == modal) {
					    modal.style.display = "none";
					  }
					}
		    	}

 
		    }
		    if(temp.match(/favourite_new/)){
		    	let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
		    	console.log(array_id_newest_product[pos]);
		    	document.getElementById("id_favourite").value=array_id_newest_product[pos];


				// Get the modal
				var modal = document.getElementById("new_fav");

				

				// When the user clicks on the button, open the modal
				modal.style.display = "block";

									// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close_new_fav")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				  modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
				    modal.style.display = "none";
				  }
				}	 
		    }
	  });

		//add to cart
		$('.buttons').click(function() {
		    let temp=$(this).attr('id');
		    if(temp.match(/cart_promo/)){
		    	let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
		    	console.log(array_id_promo_newest_product[pos]);
		    	document.getElementById("id_cart").value=array_id_promo_newest_product[pos];

				// Get the modal
				var modal = document.getElementById("promo_cart");

				// When the user clicks on the button, open the modal
				modal.style.display = "block";

									// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close_promo_cart")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				  modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
				    modal.style.display = "none";
				  }
				}	 
		    }
		    if(temp.match(/cart_new/)){
		    	let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
		    	console.log(array_id_newest_product[pos]);
		    	document.getElementById("id_cart").value=array_id_newest_product[pos];

				// Get the modal
				var modal = document.getElementById("new_cart");

				// When the user clicks on the button, open the modal
				modal.style.display = "block";

									// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close_new_cart")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				  modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
				    modal.style.display = "none";
				  }
				}	 
		    }
	  });
	$(window).bind('beforeunload',function(){

	     //save info somewhere

	    <?php 
	    $_SESSION["error_msg_fav_cart"]="false";
	    ?>;

	});


</script>
</body>


</html>