<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=device=width, initial-scale=1.0">
        <title>Create an Account</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
            }

            h1 {
                font-size: 2.5rem;
                text-align: center;
                margin-top: 2rem;
                margin-bottom: 2rem;
            }

            form {
                max-width: 600px;
                margin: 0 auto;
                padding: 2rem;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
            }

            label {
                font-size: 1.2rem;
                font-weight: bold;
            }

            input[type=text],
            input[type=email],
            input[type=number],
            input[type=password] {
                width: 100%;
                padding: 0.5rem;
                margin-bottom: 1rem;
                font-size: 1.2rem;
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            select {
                width: 100%;
                padding: 0.5rem;
                margin-bottom: 1rem;
                font-size: 1.2rem;
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            input[type=button],
            input[type=submit] {
                background-color: #007bff;
                color: #fff;
                padding: 0.5rem 1rem;
                font-size: 1.2rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=button]:hover,
            input[type=submit]:hover {
                background-color: #0069d9;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .form-group label {
                display: block;
            }

            .form-group:last-of-type {
                margin-bottom: 0;
            }

            .form-group.error input,
            .form-group.error select {
                border-color: #dc3545;
            }

            .form-group.error .error-message {
                display: block;
                margin-top: 0.5rem;
                font-size: 1rem;
                color: #dc3545;
            }

            .error-message {
                display: none;
            }
        </style>
    </head>
    <h1>Create an Account</h1>
    <body>
        <form action='Accountconnect.php' method="POST">
            <label for="firstname">First Name:</label> <br>
            <input type='text' name='firstname' id='firstname' required/> <br>

            <label for="lastname">Last Name:</label> <br>
            <input type='text' name='lastname' id='lastname' required/> <br>

            <label for="email">Email:</label> <br>
            <input type='email' name='email' id='email' required/> <br>

            <label for="phone">Phone:</label> <br>
            <input type='text' name='phone' id='phone' required/> <br>

            <label for="username">Username:</label> <br>
            <input type='text' name='username' id='username' required/> <br>

            <label for="password">Password:</label> <br>
            <input type='text' name='password' id='password' required/> <br>

            <label for="ssn">SSN:</label> <br>
            <input type='text' name='ssn' id='ssn' required/> <br>

            <label for="passportid">Passport ID:</label> <br>
            <input type='text' name='passportid' id='passportid' required/> <br>

            <input type='submit' name='submit' id="submit" />
        </form>
    </body>
</html>
