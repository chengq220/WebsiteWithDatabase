<?php
session_start();
	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);
	$userid = $user_data['user_id'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Form 
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$about = $_POST['about'];
		
		//need to find a way to update user data
		//$check = "select * from user_info where user_id = '$userid' limit 1";
		//$result = mysqli_query($con, $check);
		//if(mysqli_num_rows($result) != 1){
			/*if(!empty($fname) && !is_numeric($fname) && !empty($lname) && !is_numeric($lname)
			&&!empty($gender) && !is_numeric($gender) &&!empty($address) && !is_numeric($address)
			&&!empty($city) && !is_numeric($city) &&!empty($country) && !is_numeric($country)
			&&!empty($age) && !empty($about)){*/
			
			    //$query = "insert into user_info (user_id, fname, lname, gender, address, city, country, age) 
				//values ('$userid', '$fname', '$lname', '$gender', '$address', '$city', '$country', '$age', '$about')";
				
			$query = "insert into user_info (user_id, fname, lname, gender, address, city, country, age, about_me)
			values ('$userid', '$fname', '$lname', '$gender','$address', '$city', '$country', '$age', '$about')";
			mysqli_query($con, $query);
				
				//$query = "insert into user_info (address, city, country, age, about_me) values ('$address', '$city', '$country', '$age', '$about') where user_id = $userid";
				//mysqli_query($con, $query);
				
				//header("Location: profile.php");
				//die;
			/*}else
			{
				echo "Please fill out the WHOLE form!";
			}*/
		/*}else{ //this still doesn't work -->>>>>>>>
			//if it already exists in the database, update the data
			$query = "update user_info set 
			fname = '$fname', lname = '$lname',
			gender = $gender, address = '$address',
			city = '$city', country = '$country', 
			age = '$age'
			where user_id = '$userid'";
			
			mysqli_query($con, $query);
					
				//header("Location: profile.php");
				//die;
		}*/
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/update.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css\style.css">
	<link rel="stylesheet" href="css\form.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<script>
		function adjust_textarea(h) {
			h.style.height = "20px";
			h.style.height = (h.scrollHeight)+"px";
		}
</script>
<body>
	<!-- Navbar Section Starts Here -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<nav class="navbar navbar-expand-lg navbar-light bg-light mynav">
	  <a class="navbar-brand" href="#">EyeBook</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		  </li>
		   <li class="nav-item">
				<a class="nav-link" href="chat.php">Chat</a>
		   </li>
		   <li class="nav-item dropdown nav-item active">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Profile
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="update.php">Update Profile</a>
			  <a class="dropdown-item" href="profile.php">Check Profile</a>
			</div>
		  </li>
		  <li class = "nav-item">
			<a class="nav-link" href = "login.php">Log Out</a>
		  </li>
		</ul>
	  </div>
	</nav>
	<div class="form-style-8">
		  <h2>Update Information</h2>
		  <form method="POST">
			<input type="text" name="fname" placeholder="First Name" />
			<input type="text" name="lname" placeholder="Last Name" />
			<input type="text" name="gender" placeholder="Gender" />
			<input type="number" name="age" placeholder="Age">
			<input type="text" name="address" placeholder="Address" />
			<input type="text" name="city" placeholder="City" />
			<input type="text" name="country" placeholder="Country" />
			<textarea placeholder="About Me" name = "about" onkeyup="adjust_textarea(this)"></textarea>
			<input id = "button" type="submit" value="Update"/>
			<br><br>
			<hr />
			<div>Already updated? <a href="profile.php">Check Profile</a><br><br></div>
	</form>
</body>

</html>