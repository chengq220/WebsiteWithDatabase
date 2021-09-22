<?php
session_start();
	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);
	$user_info = check_info($con,$user_data['user_id']);
	if($user_info['fname'] == null){
		header("Location: error.php");
	}

?>
<!DOCTYPE html>
<html>
	<head>
	   <!-- <link rel = "stylesheet" href = "imageshiftingCSS.css"> -->
		<title>Profile</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css\profile.css"> 
		<link rel="stylesheet" href="css\style.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	</head>
	<body>
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
	<header class="ScriptHeader">

</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="images\notAvailable.png" alt="student dp">
            <h3><?php echo $user_info['fname']." ".$user_info['lname'];?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Age:</strong><?php echo $user_info['age'];?> years old</p>
            <p class="mb-0"><strong class="pr-1">Gender:</strong><?php echo $user_info['gender'];?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Address</th>
                <td width="2%">:</td>
                <td><?php echo $user_info['address'];?></td>
              </tr>
              <tr>
                <th width="30%">City	</th>
                <td width="2%">:</td>
                <td><?php echo $user_info['city'];?></td>
              </tr>
              <tr>
                <th width="30%">Country</th>
                <td width="2%">:</td>
                <td><?php echo $user_info['country'];?></td>
              </tr>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>About me</h3>
          </div>
          <div class="card-body pt-0">
              <p><?php echo $user_info['about_me'];?></p>
		  </div>
        </div>
      </div>
    </div>
  </div>
</div>
    		</div>
		</div>
    </div>
</section>
     


	</body>
</html>