<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FlyOn - Flight Booking System</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f2f2f2;
    }
    
    h1, h2 {
      text-align: center;
    }

    form {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>FlyOn</h1>
  <h2>Flight Booking System</h2>
  <form action="view.php" method="GET">
    <input type="submit" name="view" value="View Flight Information" />
  </form>
  <form action="book.php" method="GET">
    <input type="submit" name="book" value="Book a Flight" />
  </form>
</body>
</html>