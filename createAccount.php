<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Create Account</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Create Account</h1>
        <form action="connect.php" method="POST">
				<label for="firstName">First Name:</label> <br>
				<input type="text" name="firstName" id="firstName" required/> <br>


				<label for="lastName">Last Name:</label> <br>
				<input type="lastName" name="lastName" id="lastName" required/> <br>


                <label for="email">Email:</label> <br>
				<input type="email" name="email" id="email" required/> <br>


				<label for="phoneno">Phone No:</label> <br>
				<input type="phoneno" name="phoneno" id="phoneno" required/> <br>

				<input type="button" name="login" id="login" value="Log In"/>		
            </form>
    </body>
</html>