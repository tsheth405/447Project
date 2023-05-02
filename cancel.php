<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Flight Cancelled</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php echo '<button style="position: absolute; top: 10px; right: 10px;" onclick="location.href=\'home.php\'">HOME</button>'; ?>
        <h1>Flight <?php echo $_GET['flight']; ?> has been cancelled</h1>
    </body>
</html>
