<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75jXsVXJ+jT0"
		crossorigin="anonymous">
	<style>
		body {
			background-color: #f8f9fa;
			font-family: 'Open Sans', sans-serif;
			font-size: 1rem;
		}
		h1 {
			margin-top: 2rem;
			margin-bottom: 2rem;
			font-weight: bold;
			font-size: 3rem;
			text-align: center;
			color: #3a3f44;
		}
		.form-container {
			max-width: 500px;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 2rem;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
		}
		label {
			font-weight: bold;
			color: #3a3f44;
		}
		input[type="text"],
		input[type="password"] {
			border-radius: 5px;
			padding: 0.5rem 1rem;
			margin-bottom: 1rem;
			border: none;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}
		input[type="button"] {
			border: none;
			border-radius: 5px;
			padding: 0.5rem 1rem;
			color: #ffffff;
			background-color: #3a3f44;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}
		input[type="button"]:hover {
			background-color: #575f6b;
		}
		input[type="button"]:focus {
			outline: none;
		}
	</style>
</head>
<body>
	<header>
		<h1>FlyOn</h1>
	</header>
	<main>
		<div class="form-container">
			<h2>Login</h2>
            <form action="aunthenticate.php" method="POST" id="login-form">
				<label for="username">User Name:</label> <br>
				<input type="text" name="username" id="username" required/><br>
				<label for="password">Password:</label> <br>
				<input type="password" name="password" id="password" required/><br>
                <input type="button" name="login" id="login" value="Log In" onclick="submitLoginForm()"/><br><br>
            </form>
            <script>
                function submitLoginForm(){
                    document.getElementById('login-form').submit();
                }
            </script>
			<input type="button" name="Create Account" id="create" value="Create Account" onclick="window.location.href='createAccount.php'"/>
		</div>
	</main>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamo
