<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			//read from database
			$query = "select * from user where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result){
				if($result && mysqli_num_rows($result) > 0){

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password){

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
		}
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
		  display: flex;
		  justify-content: center;
		  font-family: Roboto, Arial, sans-serif;
		  font-size: 15px;
		  }
		  form {
		  border: 5px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
		  width: 100%;
		  padding: 16px 8px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
      }
      button {
		  background-color: #c8c9c6;
		  color: black;
		  padding: 14px 0;
		  margin: 10px 0;
		  border: none;
		  cursor: grabbing;
		  width: 100%;
      }
      h1 {
		text-align:center;
		fone-size:18;
      }
      button:hover {
		opacity: 0.8;
      }
      .formcontainer {
		  text-align: left;
		  margin: 24px 50px 12px;
      }
      .container {
		  padding: 16px 0;
		  text-align:left;
      }
      span.psw {
		  float: right;
		  padding-top: 0;
		  padding-right: 15px;
      }
      @media screen and (max-width: 300px) {
		  span.psw {
		  display: block;
		  float: none;
      }
    </style>
  </head>
  <body>
    <form method = "post">
      <h1>Login</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="user_name" required>
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <button type="submit">Login</button>
	  <div class="container" style="background-color: #eee">
        <span style="padding-left: 15px">Are you registered? </span>
        <span class="psw"><a href="signup.php">Register</a></span>
      </div>
    </form>
  </body>
</html>