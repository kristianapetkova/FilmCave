<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
echo $_SESSION["email"];
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

	mysqli_stmt_bind_result($call,$id_user,$first_name,$last_name,$telephone,$email,$password,$address,$active,$city,$region);
	echo $id_user;
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

	// echo $first_name;
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
							    <input type="text" name="modal_street_copy" id="modal_street_copy" placeholder="Улица, Квартал, Номер..." >
						    </div>
						    <br><br>
						    <button class="buttons">
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