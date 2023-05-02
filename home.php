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
      background: url('https://images.unsplash.com/photo-1566566220367-af8d77269124?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGFpcnBvcnR8ZW58MHx8MHx8&w=1000&q=80') no-repeat center center fixed;
      background-size: cover;
      position: relative;
      min-height: 100vh;
    }
    
    h1, h2 {
      text-align: center;
      font-size:48px;
      color: white;
      text-shadow: 2px 2px #000000;
    }
    
    .buttons {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }
    
    .button {
      background-color: #3a3f44;
      color: white;
      font-size: 18px;
      padding: 14px 24px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin: 0 10px;
    }
    
    .button:hover {
      background-color: #3a3f44;
    }

    .button[name="book"] {
      background-color: #3a3f44;
    }
    .button[name="view"] {
      background-color: #3a3f44;
    }
    /* New styles for welcome message */
    .welcome {
        position: absolute;
        top: 25px;
        right: 20px;
        padding: 20px;
        color: white;
        text-align: center;
        font-size: 24px;
        text-shadow: 2px 2px #000000;
    }
    
    /* New styles for log out button */
    .logout {
      position: absolute;
      bottom: 50px;
      right: 20px;
      background-color: #3a3f44;
      color: white;
      font-size: 16px;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .logout:hover {
      background-color: #3a3f44;
    }
  </style>
</head>
<body>
  <h1>FlyOn</h1>
  
  <div class="buttons">
    <form action="view.php" method="GET">
      <input class="button" type="submit" name="view" value="View Your Upcoming Flights" />
    </form>
    <form action="search_flight.html" method="GET">
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
