<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FlyOn</title>
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
    
    /* New styles for welcome message */
    .welcome {
      margin: 50px auto;
      padding: 20px;
      background-color: #4CAF50;
      color: white;
      text-align: center;
      font-size: 24px;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <h1>FlyOn</h1>
  <form action="view.php" method="GET">
    <input type="submit" name="view" value="View Flight Information" />
  </form>
  <form action="book.php" method="GET">
    <input type="submit" name="book" value="Book a Flight" />
  </form>
   
  <?php
  session_start();
  if(isset($_SESSION['username'])) {
    echo '<div class="welcome">Hello, ' . ucwords(strtolower($_SESSION['username'])) . '. Welcome to FlyOn.</div>';
  }
  ?>
</body>
</html>
