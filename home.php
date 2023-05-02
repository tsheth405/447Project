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
      position: relative;
      min-height: 100vh;
    }
    
    h1, h2 {
      text-align: center;
      font-size:48px;
    }
    
    .buttons {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }
    
    .button {
      background-color: #4CAF50;
      color: white;
      font-size: 18px;
      padding: 14px 24px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin: 0 10px;
    }
    
    .button:hover {
      background-color: #45a049;
    }
    
    /* New styles for welcome message */
    .welcome {
        position: absolute;
        top: 25px;
        right: 20px;
        padding: 20px;
        color: black;
        text-align: center;
        font-size: 24px;
    }
    
    /* New styles for log out button */
    .logout {
      position: absolute;
      bottom: 50px;
      right: 20px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .logout:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>FlyOn</h1>
  
  <div class="buttons">
    <form action="view.php" method="GET">
      <input class="button" type="submit" name="view" value="View Flight Information" />
    </form>
    <form action="book.php" method="GET">
      <input class="button" type="submit" name="book" value="Book a Flight" />
    </form>
  </div>
   
  <?php
  session_start();
  if(isset($_SESSION['username'])) {
    echo '<div class="welcome">Hello, ' . ucwords(strtolower($_SESSION['username']));
    echo '<button class="logout" onclick="location.href=\'logout.php\'">Log out</button>';
  }
  ?>
</body>
</html>
