<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
//echo $_SESSION["email"];
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

	//Get products in cart
	$email=$_SESSION["email"];
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_products_in_cart(?)");
	mysqli_stmt_bind_param($call, 'i', $id_user);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_product,$title,$type,$product_price,$poster,$promotion,$promo_percent,$quantity);
	$array_id_product=array();
	$array_title=array();
	$array_type=array();
	$array_product_price=array();
	$array_poster=array();
	$array_promotion=array();
	$array_promo_percent=array();
	$array_quantity=array();
	$_SESSION["array_id_products"]=array();
	$_SESSION["quantity"]=array();
	while (mysqli_stmt_fetch($call)) {
		array_push($array_id_product,$id_product);
        array_push($array_title,$title);
        array_push($array_type,$type);
        array_push($array_product_price,$product_price);
        array_push($array_poster,$poster);
        array_push($array_promotion,$promotion);
        array_push($array_promo_percent, $promo_percent);
        array_push($array_quantity, $quantity);
        array_push($_SESSION["array_id_products"],$id_product);
        array_push($_SESSION["quantity"],$id_product);
      }
	$rows_product= mysqli_stmt_num_rows($call);
	if($rows_product>0){
		
	}

	//get user info
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_user_details_my_profile(?)");
	mysqli_stmt_bind_param($call, 's', $email);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_user,$first_name,$last_name,$telephone,$email,$password);
	while (mysqli_stmt_fetch($call)) {}
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
		//echo $address;
	}

	//get user address
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_user_address(?)");
	mysqli_stmt_bind_param($call, 'i', $id_user);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$address, $region, $city,$active);
	//echo $id_user;
	while (mysqli_stmt_fetch($call)) {
      }
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
		echo $address;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="my_cart.css">
	<link rel="stylesheet" type="text/css" href="basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<div class="head">
			<div class="logo">
				<a href="1home.php">
					<svg version="1.1" id="logo_picture"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 737.3 279" style="enable-background:new 0 0 737.3 279;" xml:space="preserve">
					<style type="text/css">
						
					</style>
					<g>
						<path class="st0" d="M117.9,152h108.9c4.3,0,7.8,3.5,7.8,7.8v64.8c0,0,0,14.3-12.9,14.3c-9.1,0-103.6,0-103.6,0h46.3
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
				<form method="post" action="search_results.php">
					<input type="text" name="search_bar" id="search_bar">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>

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
				<svg version="1.1" id="Layer_1" class="icon_myprofile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
		<g>
			<g>
				<path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z"/>
			</g>
		</g>
		<g>
			<g>
				<path d="M423.966,358.195C387.006,320.667,338.009,300,286,300h-60c-52.008,0-101.006,20.667-137.966,58.195
					C51.255,395.539,31,444.833,31,497c0,8.284,6.716,15,15,15h420c8.284,0,15-6.716,15-15
					C481,444.833,460.745,395.539,423.966,358.195z"/>
			</g>
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
				<svg id='color' class="icon_favourites" enable-background='new 0 0 24 24'  viewBox='0 0 24 24'  xmlns='http://www.w3.org/2000/svg'><path d='m11.466 22.776c.141.144.333.224.534.224s.393-.08.534-.224l9.594-9.721c4.001-4.053 1.158-11.055-4.532-11.055-3.417 0-4.985 2.511-5.596 2.98-.614-.471-2.172-2.98-5.596-2.98-5.672 0-8.55 6.984-4.531 11.055z' /></svg>
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
				<svg id="Layer_1" class="icon_cart"  enable-background="new 0 0 511.728 511.728"  viewBox="0 0 511.728 511.728"  xmlns="http://www.w3.org/2000/svg"><path class="icon_cart" d="m147.925 379.116c-22.357-1.142-21.936-32.588-.001-33.68 62.135.216 226.021.058 290.132.103 17.535 0 32.537-11.933 36.481-29.017l36.404-157.641c2.085-9.026-.019-18.368-5.771-25.629s-14.363-11.484-23.626-11.484c-25.791 0-244.716-.991-356.849-1.438l-17.775-65.953c-4.267-15.761-18.65-26.768-34.978-26.768h-56.942c-8.284 0-15 6.716-15 15s6.716 15 15 15h56.942c2.811 0 5.286 1.895 6.017 4.592l68.265 253.276c-12.003.436-23.183 5.318-31.661 13.92-8.908 9.04-13.692 21.006-13.471 33.695.442 25.377 21.451 46.023 46.833 46.023h21.872c-3.251 6.824-5.076 14.453-5.076 22.501 0 28.95 23.552 52.502 52.502 52.502s52.502-23.552 52.502-52.502c0-8.049-1.826-15.677-5.077-22.501h94.716c-3.248 6.822-5.073 14.447-5.073 22.493 0 28.95 23.553 52.502 52.502 52.502 28.95 0 52.503-23.553 52.503-52.502 0-8.359-1.974-16.263-5.464-23.285 5.936-1.999 10.216-7.598 10.216-14.207 0-8.284-6.716-15-15-15zm91.799 52.501c0 12.408-10.094 22.502-22.502 22.502s-22.502-10.094-22.502-22.502c0-12.401 10.084-22.491 22.483-22.501h.038c12.399.01 22.483 10.1 22.483 22.501zm167.07 22.494c-12.407 0-22.502-10.095-22.502-22.502 0-12.285 9.898-22.296 22.137-22.493h.731c12.24.197 22.138 10.208 22.138 22.493-.001 12.407-10.096 22.502-22.504 22.502zm74.86-302.233c.089.112.076.165.057.251l-15.339 66.425h-51.942l8.845-67.023 58.149.234c.089.002.142.002.23.113zm-154.645 163.66v-66.984h53.202l-8.84 66.984zm-74.382 0-8.912-66.984h53.294v66.984zm-69.053 0h-.047c-3.656-.001-6.877-2.467-7.828-5.98l-16.442-61.004h54.193l8.912 66.984zm56.149-96.983-9.021-67.799 66.306.267v67.532zm87.286 0v-67.411l66.022.266-8.861 67.145zm-126.588-67.922 9.037 67.921h-58.287l-18.38-68.194zm237.635 164.905h-36.426l8.84-66.984h48.973l-14.137 61.217c-.784 3.396-3.765 5.767-7.25 5.767z"/></svg>
				</a>
			</div>
		</div>
		<div class="menu">
			<ul>
				<li>
					<a href="special_offers.php">
						????????????????
					</a>
				</li>
				<li>
					<a href="movies.php">
						??????????
					</a>
				</li>
				<li>
					<a href="bluray.php">
						Blu-Ray
					</a>
				</li>
				<li>
					<a href="books.php">
						??????????
					</a>
				</li>
				<li>
					<a href="nashata_kauza.php">
						???????????? ??????????
					</a>
				</li>
				<li>
					<a href="subscribe.php">
						???????????????? ????
					</a>
				</li>
				<li>
					<a href="contacts.php">
						????????????????
					</a>
				</li>
			</ul>
		</div>
	
	</header>
	<main>
		<h5>
			???????????? -> ??????????????
		</h5>
		<hr>
		<section>
				<h1>
					???????????? ??????????????
				</h1>
				<div>
					<div class="product_client">
					
						<table>
							<thead>
								<tr>
									<th>
										??????????????
									</th>
									<th>
										????. ????????
									</th>
									<th>
										????????
									</th>
									<th>
										????????
									</th>
								</tr>
							</thead>
							<tbody id="tbody">
								
							</tbody>
						</table>
			<form method="post" action="place_order_server.php">

						<h3>
							?????????? ???? ????????????????:
						</h3>
						<input type="radio" name="dostavka" value="address">
						???? ?????????? - 5????
						<br>
						<input type="radio" name="dostavka" value="ekont">
						???? ???????? ???? ?????????? - 3????

						<h3>
							?????????? ???? ??????????????
						</h3>
						<input type="radio" name="plashtane" value="nalojen">
						?????????????? ????????????
						<br>
						<input type="radio" name="plashtane" value="karta">
						?????????????? ?? ??????????
						<br><br>
						<div class="client_info">
							
							<label>
								??????:
							</label>
							<input type="text" name="first_name" id="first_name">
							<br>
							<label>
								??????????????:
							</label>
							<input type="text" name="family_name" id="family_name">
							<br>
							<label>
								??????????????:
							</label>
							<input type="number" name="telephone" id="telephone">
							<br>
							<label>
								????????????:
							</label>
							<input type="text" name="region" id="region">
							<br>
							<label>
								???????????????? ??????????:
							</label>
							<input type="text" name="city" id="city">
							<br>
							<label>
								?????????? ???? ????????????????:
							</label>
							<input type="text" name="address" id="address">
							<br>
							<label>
								????????????????
							</label>
							<textarea>
								
							</textarea>
						</div>
						<br>
						<input type="checkbox" name="opakovka" id="opakovka">
						?????????? ?????????????????? ???????????????? +1????
						<br>
						<input type="checkbox" name="save_data">
						???????????? ?????????????? ???? ???? ???????????????????? ??????????????

						<br>
						<br>
						<hr>
						<h2>
							???????????? ??????????
						</h2>
						<p>
							Cras posuere eu mauris a commodo. Pellentesque eu metus at justo luctus blandit. Suspendisse imperdiet vulputate orci, vitae consectetur augue vehicula in. Nulla facilisi. Fusce eget orci et augue mattis accumsan. Maecenas diam urna, accumsan quis porttitor eget, efficitur nec lacus. Aenean nec ullamcorper sem. Sed dapibus, nisi eget hendrerit interdum, turpis lectus bibendum velit, non porttitor nunc massa ut dolor.


						</p>
					</div>
					<div class="total_pay">
						<h3>
							?????????????? ????????:
						</h3>
						<hr>
						<div class="suma">
							<span>
								???????????????? ????????:
								<br>
								????????????????:
								<br>
								?????????????????? ????????????????:
							</span>
							<span>
								<input type="text" name="mid_price" id="mid_price" class="price_to_pay" disabled="true">

								<br>
								<input type="text" name="shipping" id="shipping" class="price_to_pay" disabled="true">

								<br>
								<input type="text" name="gift" id="gift" class="price_to_pay" disabled="true">

							</span>
						</div>
						<hr>
						<div class="suma">
							<span>
								????????:
							</span>
							<span>
								<input type="text" id="total_price" class="price_to_pay total" disabled="true">
							</span>
						</div>
						<div class="end_purchase">
							<input type="text" name="method_shipping" id="method_shipping" style="display: none;" placeholder="Shipping">
							<input type="text" name="method_pay" id="method_pay" style="display: none;" placeholder="Payment">
							<input type="text" name="is_gift" id="is_gift" style="display: none;" placeholder="Gift">
							<input type="text" name="is_save_data" id="is_save_data" style="display: none;" placeholder="Save data">
							<input type="text" id="total_price_id" name="total_price_id" class="price_to_pay total" style="display: none;" placeholder="Total Price">
							<button class="buttons" >
								?????????????? ??????????????????
							</button>
						</div>
					</div>
					</form>
				</div>
			
		</section>
	</main>
	<footer>
		<div>
			<ul>
				<li>
					<a href="za_nas.php">
						???? ??????
					</a>
				</li>
				<li>
					<a href="contacts.php">
						????????????????
					</a>
				</li>
				<li>
					<a href="nashata_kauza.php">
						???????????? ??????????
					</a>
				</li>
				<li>
					<a href="special_offers.php">
						????????????????
					</a>
				</li>
				<li>
					<a href="subscribe.php">
						???????????????? ????
					</a>
				</li>
			</ul>
		</div>
		<div>
			<ul>
				<li>
					<a href="help.php">
						?????????? ???????????????? ??????????????
					</a>
				</li>
				<li>
					<a href="shipping.php">
						????????????????
					</a>
				</li>
				<li>
					<a href="usloviq.php">
						???????? ??????????????
					</a>
				</li>
				<li>
					<a href="policy.php">
						???????????????? ???? ??????????????????????????
					</a>
				</li>
			</ul>
		</div>
		<div>
			<div>
				?????????????????????? ???? ?? ???????????????????? ??????????:
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
<script>

	$(function() {
	  $('#logo_picture').hover(function() {
	    $('.st0').css('fill', '#afeeee');
	    $('.st1').css('stroke', '#afeeee');
	    $('.st2').css('fill', '#afeeee');
	  }, function() {
	    // on mouseout, reset the background colour
	    $('.st0').css('fill', '');
	    $('.st1').css('stroke', '');
	    $('.st2').css('fill', '');
	  });
	});

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
    //new promo price

    var array_promo_percent=[];
    <?php 
    for ($i = 0 ; $i<count($array_promo_percent); $i++) { ?>
    	array_promo_percent.push(parseInt("<?php echo $array_promo_percent[$i]; ?>" )); <?php
    }

    ?>
    
    var array_new_product_price=[];
    for (var i=0;i<array_product_price.length;i++){
    	array_new_product_price[i]=(array_product_price[i]-array_product_price[i]*(array_promo_percent[i]/100)).toFixed(2);
	}

    var array_poster=[];
    <?php 
    for ($i = 0 ; $i<count($array_poster); $i++) { ?>
    	array_poster.push("<?php echo $array_poster[$i]; ?>" ); <?php
    }

    ?>

    var array_promotion=[];
    <?php 
    for ($i = 0 ; $i<count($array_promotion); $i++) { ?>
    	array_promotion.push(parseInt("<?php echo $array_promotion[$i]; ?>" )); <?php
    }

    ?>	

    var array_quantity=[];
    <?php 
    for ($i = 0 ; $i<count($array_quantity); $i++) { ?>
    	array_quantity.push(parseInt("<?php echo $array_quantity[$i]; ?>" )); <?php
    }

    ?>

    var result = "<?php echo $rows_product ?>";
	for(var i =0;i<result;i++){
		if(array_promotion[i]==1){
	    	$(document.getElementById("tbody")).append("<tr><td><div class='poster'><img src='pictures/products/"+array_poster[i]+".jpg' alt='movie poster' class='movie_poster'></div><div class='table_product'><span>"+array_title[i]+"</span><br><span>"+array_type[i]+"</span></div></td><td><span id='old_price' class='old_price'>"+array_product_price[i]+"</span><br>"+array_new_product_price[i]+"</td><td>"+array_quantity[i]+"</td><td>"+(array_new_product_price[i]*array_quantity[i]).toFixed(2)+"</td></tr>");			
		}
		else{
	    	$(document.getElementById("tbody")).append("<tr><td><div class='poster'><img src='pictures/products/"+array_poster[i]+".jpg' alt='movie poster' class='movie_poster'></div><div class='table_product'><span>"+array_title[i]+"</span><br><span>"+array_type[i]+"<span></div></td><td>"+array_product_price[i]+"</td><td>"+array_quantity[i]+"</td><td>"+(array_product_price[i]*array_quantity[i]).toFixed(2)+"</td></tr>");
		}
	}

	document.getElementById("first_name").value="<?php echo $first_name ?>";
	document.getElementById("family_name").value="<?php echo $last_name ?>";
	document.getElementById("telephone").value="<?php echo $telephone ?>";
	document.getElementById("region").value="<?php echo $region ?>";
	document.getElementById("city").value="<?php echo $city ?>";
	document.getElementById("address").value="<?php echo $address ?>";

	//calculate price
	var mid_price=0;
	var shipping = 0;
	var total_price = 0;
	var gift=0;
	for(var i=0;i<result;i++){
		if(array_promotion[i]==1){
			mid_price+=parseFloat((parseFloat(array_new_product_price[i])*parseInt(array_quantity[i])).toFixed(2));
		}
		else{
			mid_price+=parseFloat((parseFloat(array_product_price[i])*parseInt(array_quantity[i])).toFixed(2));
		}
	}
	mid_price=mid_price.toFixed(2);
	$(document.getElementById("mid_price")).val(mid_price);

	//checkbox for gift
	$('input:checkbox[name="opakovka"]').click(function(){
		if($(this).prop("checked") == true){
            gift=1;
            document.getElementById("is_gift").value="true";

        }
        else if($(this).prop("checked") == false){
            gift=0;
            document.getElementById("is_gift").value="false";
        }
		$(document.getElementById("gift")).val(gift.toFixed(2));
		total_price=parseFloat(mid_price)+parseFloat(shipping)+parseFloat(gift);
		$(document.getElementById("total_price")).val(total_price);
		$(document.getElementById("total_price_id")).val(total_price);
	});

	//choose shipping method
	$('input:radio[name="dostavka"]').change(function(){
	    if($(this).val() == 'address'){
	    	shipping=5.00.toFixed(2);
	    	document.getElementById("method_shipping").value="address";
	    }
	    if($(this).val() == 'ekont'){
	       shipping=3.00.toFixed(2);
	       document.getElementById("method_shipping").value="ekont";
	    }
		$(document.getElementById("shipping")).val(shipping);
		total_price=parseFloat(mid_price)+parseFloat(shipping)+parseFloat(gift);
		$(document.getElementById("total_price")).val(total_price);
		$(document.getElementById("total_price_id")).val(total_price);
	});

	//choose payment method
	$('input:radio[name="plashtane"]').change(function(){
	    if($(this).val() == 'nalojen'){
	    	document.getElementById("method_pay").value="nalojen";
	    }
	    if($(this).val() == 'karta'){
	       document.getElementById("method_pay").value="karta";
	    }
	});

	//checkbox for save data
	$('input:checkbox[name="save_data"]').click(function(){
		if($(this).prop("checked") == true){
            document.getElementById("is_save_data").value="true";
        }
        else if($(this).prop("checked") == false){
            document.getElementById("is_save_data").value="false";
        }
	});	

</script>
</html>