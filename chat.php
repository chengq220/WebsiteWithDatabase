<?php
session_start();
	include("connection.php");
	include("functions.php");
	
	$user_data = check_login($con);
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$content = $_POST['search'];
		$date = Date("Y-m-d H:i:s");
		$id = $user_data['user_id'];
		$username = $user_data['username'];
	
		$query = "insert into chat(user_id, username, content, time) Values ('$id', '$username', '$content', '$date')";
		mysqli_query($con,$query);
	}
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css\style.css">
		<link rel="stylesheet" href="css\feed.css">
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
			   <li class="nav-item active">
				<a class="nav-link" href="chat.php">Chat</a>
			  </li>
			   <li class="nav-item dropdown">
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
		<section style = "padding: 4% 0;" class="search text-center">
			<div class="container">     
				<form method="POST">
					<input style = "border: solid;" type="search" name="search" placeholder="Your Message" required>
					<input style = "margin-left: 25px;padding-left: 20px; padding-right: 20px;"type="submit" name="submit" value="Post" class="btn btn-primary">
				</form>
			</div>
        </section>
		<section class = "text-center">
			<h2>Feed</h2>
			<div class = "feed">
				<?php
					$sel = "SELECT username, content, time FROM chat order by time desc";
					$result = $con-> query($sel);
					if($result-> num_rows > 0){
						while($row = $result-> fetch_assoc()){
							echo "<div class = 'feedLook'><span class = 'user'>". $row['username'] ."</span><span>". "  @  ". $row['time'] ."</span>";
							echo "<div>". $row['content'] ."</div></div>";
						}
					}
					else{
						echo "There is no MESSAGE";
					}
				?>
			</div>
		</section>
	</body>
</html>