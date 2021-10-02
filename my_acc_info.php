<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
//echo $_SESSION["email"];
$address_text="";
//users.ID, users.FIRST_NAME, users.LAST_NAME, users.TELEPHONE, users.EMAIL, users.PASSWORD, addresses.ADDRESS,cities.CITY,regions.REGION

if($_SESSION["email"]){
	$email=$_SESSION["email"];
	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_user_details_my_profile(?)");
	mysqli_stmt_bind_param($call, 's', $email);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$id_user,$first_name,$last_name,$telephone,$email,$password);
	//echo $id_user;
	while (mysqli_stmt_fetch($call)) {}
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
	}

	$conn=mysqli_connect("localhost","root","","filmcave");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$call = mysqli_prepare($conn, "CALL get_user_address(?)");
	mysqli_stmt_bind_param($call, 'i', $id_user);
	mysqli_stmt_execute($call);

	mysqli_stmt_bind_result($call,$address, $region, $city,$active);
	//echo $id_user;
	$array_address = array();
	$array_active_address=array();
	$array_city=array();
	$array_region=array();
	while (mysqli_stmt_fetch($call)) {
        array_push($array_address, $address);
        array_push($array_active_address, $active);
        array_push($array_city, $city);
        array_push($array_region, $region);
      }
	$rows= mysqli_stmt_num_rows($call);
	if($rows>0){
		//echo $address;
	}

// echo $_POST["address_text"];				
// $_SESSION["address_text"]=$_POST["address_text"];
		

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmcave</title>
	<link rel="stylesheet" type="text/css" href="my_acc_info.css">
	<link rel="stylesheet" type="text/css" href="basic.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 -->	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form method="POST" action="save_my_profile.php">
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
<!-- 				<form method="post" action="search_results.php">
					<input type="text" name="search_bar" id="search_bar">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form> -->

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
			Начало -> Моят профил -> Моите данни
		</h5>
		<hr>
			<section>
				<aside>
					<input type="button" name="my_acc_info" class="side_menu active" onclick="window.location.href='my_acc_info.php'" value="Моите данни">
					<input type="button" name="my_acc_orders_simple" class="side_menu" onclick="window.location.href='my_acc_orders_simple.php'" value="История на поръчките">
					<input type="button" name="my_acc_fav" class="side_menu" onclick="window.location.href='my_acc_fav.php'" value="Любими продукти">
					<input type="button" name="my_acc_return1" class="side_menu" onclick="window.location.href='my_acc_return1.php'" value="Връщане на продукт">
					<input type="button" name="logout" class="side_menu" onclick="window.location.href='logout.php'" value="Изход">

					<div style="display: none;">
						<!-- Text of address -->
						<label>Text of address</label>
						<input type="text" id="address_text" name="address_text">
						<!-- Id of active address -->
						<label>Id of active address</label>
						<input type="text" id="id_address_text" name="id_address_text">
						<!-- ID of user -->
						<label> ID of user</label>
						<input type="text" id="id_user" name="id_user">
						<!-- ID of all addresses -->
						<label>ID of all addresses</label>
						<input type="text" id="id_address" name="id_address">
						<label>Add new address?</label>
						<input type="text" id="adding_address" name="adding_address">
					</div>
					
				</aside>
				<section>
					<h1>
						Моите данни
					</h1>
					<article class="my_info">
						<div>
							<h2>
								Лични данни
							</h2>
							<label>
								Име:
							</label>
							<input type="text" name="first_name" id="first_name">
							<br>
							<br>
							<label>
								Фамилия:
							</label>
							<input type="text" name="family_name" id="family_name">
							<br>
							<br>
							<label>
								Телефон:
							</label>
							<input type="number" name="telephone" id="telephone">
							<br>
							<br>
						</div>
						<div>
							<h2>
								Сигурност
							</h2>
							<label>
								Email:
							</label>
							<input type="text" name="email" id="email" disabled="disabled">
							<br>
							<br>
							<label>
								Стара парола:
							</label>
							<input type="password" name="old_pass" id="old_pass">
							<br>
							<br>
							<label>
								Нова парола:
							</label>
							<input type="password" name="new_pass" id="new_pass">
							<br>
							<br>
							<label>
								Потвърди парола:
							</label>
							<input type="password" name="conf_new_pass" id="conf_new_pass">
							<br>
							<br>
						</div>
					</article>
					<article>
						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
						    <span class="close">&times;</span>
						    
						    <div class="modal_address">
						    	<h2>
							    	Добави адрес
							    </h2>
							    <hr style="height: 2px;">
							    <label>
							    	Област:
							    </label>
							    <input type="text" name="region" id="region">
							    <br>
							    <label>
							    	Населено място:
							    </label>
							    <input type="text" name="city" id="city">
							    <br>
							    <label>
							    	Адрес:
							    </label>
							    <input type="text" name="modal_street" id="modal_street" placeholder="Улица, Квартал, Номер...">
							    <input type="text" style="display:none;" name="modal_street_copy" id="modal_street_copy" placeholder="Улица, Квартал, Номер..." >
						    </div>
						    <br><br>
						    <button type="submit" class="buttons">
						    	Запази
						    </button>

						  </div>

						</div>
						<div class="address_head">
							<h2>
								Адреси
							</h2>
							<input type="button" name="add_address" class="buttons" id="myBtn" data-toggle="modal" data-target="#exampleModal" value="+ Добави адрес">
								
						</div>
						<hr >
						<div class="address_all">
							
						</div>
					</article>
					<button type="submit" class="buttons" id="save_data" name="save_data">
						Запази
					</button>

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
</form>
</body>

<script type="text/javascript">
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

	// Fill inputs

	var first_name = "<?php echo $first_name ?>";
	var family_name = "<?php echo $last_name ?>";
	var telephone = "<?php echo $telephone ?>";
	var email = "<?php echo $email ?>";
	var address = "<?php echo $address ?>";
	var city = "<?php echo $city ?>";
	var region = "<?php echo $region ?>";
	var save_data=document.getElementById("save_data");

	document.getElementById("first_name").value=first_name;
	document.getElementById("family_name").value=family_name;
	document.getElementById("telephone").value=telephone;
	document.getElementById("email").value=email;
	document.getElementById("id_user").value="<?php echo $id_user ?>";
	document.getElementById("id_address_text").value=0;

	var array_address=[];
    <?php 
    for ($i = 0 ; $i<count($array_address); $i++) { ?>
    	array_address.push("<?php echo $array_address[$i]; ?>" ); <?php
    }

    ?>

    var array_active_address=[];
    <?php 
    for ($i = 0 ; $i<count($array_active_address); $i++) { ?>
    	array_active_address.push("<?php echo $array_active_address[$i]; ?>" ); <?php
    }

    ?>

    var array_city=[];
    <?php 
    for ($i = 0 ; $i<count($array_city); $i++) { ?>
    	array_city.push("<?php echo $array_city[$i]; ?>" ); <?php
    }

    ?>

    var array_region=[];
    <?php 
    for ($i = 0 ; $i<count($array_region); $i++) { ?>
    	array_region.push("<?php echo $array_region[$i]; ?>" ); <?php
    }

    ?>

	//Shows every users' address in database
	for(var i =0;i<array_address.length;i++){
		if(array_active_address[i]==1){
			$(document.getElementsByClassName("address_all")).append("<div class='address_list' id='address_list'><div style='display: flex;'><input type='radio' name='address' id='address"+i+"' checked='checked'><input type='text' name='region_city_address' disabled class='region_city_address' value='"+array_region[i]+", "+array_city[i]+", "+array_address[i]+"'></div><div><u><i><span class='edit_address' id='edit_address"+i+"'>Редактирай</span></i></u>&emsp;<u><i><button class='delete_address' id='delete_address"+i+"' name='delete_address'>Изтрий</button></i></u></div>	</div><hr>");
		}	
		else{
			$(document.getElementsByClassName("address_all")).append("<div class='address_list' id='address_list'><div style='display: flex;'><input type='radio' name='address' id='address"+i+"'><input type='text' name='region_city_address' disabled class='region_city_address' value='"+array_region[i]+", "+array_city[i]+", "+array_address[i]+"'></div><div><u><i><span class='edit_address' id='edit_address"+i+"'>Редактирай</span></i></u>&emsp;<u><i><button class='delete_address' id='delete_address"+i+"' name='delete_address'>Изтрий</button></i></u></div>	</div><hr>");	

		}	
		
	}
	$('.address_list input:radio').click(function() {
	    let temp=$(this).attr('id');
	    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
	    console.log(pos);
	    document.getElementById("address_text").value=array_address[pos];

	    document.getElementById("id_address_text").value=pos;
	  });

	

	

			// Get the modal to edit
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal to edit
	var btn = document.getElementById("myBtn");

	//Get the button that opens the modal to add an address
	var add_new_address=document.getElementById("add_new_address");

	//Get every edit address button
	var array_buttons_edit = [];
	for (var i=0;i<array_address.length;i++){
		array_buttons_edit.push(document.getElementById('edit_address'+i));
	}

	//Get every delete address button
	var array_buttons_delete = [];
	for (var i=0;i<array_address.length;i++){
		array_buttons_delete.push(document.getElementById('delete_address'+i));
	}
	
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	  modal.style.display = "block";
	}

	//Edit address button to show modal dialog
	$( document ).ready(function() {
		$('.address_all span').on('click', function(e){
			let temp=$(this).attr('id');
		    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
			modal.style.display = "block";
			$('#region').val(array_region[pos]);
			$('#city').val(array_city[pos]);
			$('#modal_street').val(array_address[pos]);
			$('#modal_street_copy').val(array_address[pos]);
		});
	});


	//Delete address button
	$( document ).ready(function() {
		$('.address_all button').on('click', function(e){
			let temp=$(this).attr('id');
		    let pos=(temp.match(/\d/))[Object.keys(temp.match(/\d/))[0]];
		    document.getElementById("id_address").value=array_address[pos];
		});
	});

	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	  $('#adding_address').val("0");
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	    $('#adding_address').val("0");
	  }
	}

	//Add address button to show modal dialog
	$( document ).ready(function() {
		$('.address_head input:button').on('click', function(e){
			modal.style.display = "block";
			$('#region').val("");
			$('#city').val("");
			$('#modal_street').val("");
			$('#modal_street_copy').val("");
			$('#adding_address').val("1");
		});
	});

</script>

</html>