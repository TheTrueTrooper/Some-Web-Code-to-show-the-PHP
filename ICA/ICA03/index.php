<?php
require_once 'function.php';


if( !isset($_SESSION['UserID']))
{ // shouldn't be here
  header("location:login.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ica03 Index</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <style>
      @import url(//fonts.googleapis.com/css?family=Comfortaa|Raleway|Open+Sans:600|Ranchers&effect=3d);
      body, h1, input { font-family: Comfortaa, Verdana, sans-serif; font-size: large; }
      .footer { margin-top: 10px; }
      .row { margin-top: 5px; }
    </style>
  </head>
  <body>
    <div class="jumbotron text-center">
<?php
      echo "<h1 class='font-effect-3d'>ica03 Index : {$_SESSION["username"]}</h1>"
?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center ">
                <a href="settings.php">Settings</a>
            </div>
            <div class="col-sm-6 text-center ">
                Messages
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-center ">
                Tag Admin
            </div>
            <div class="col-sm-6 text-center" >
                Real Time Monitor
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center ">
                <form action="login.php" method="post">
                    <input type="submit" name="submit" value="logout" style="width: 100%;">
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid footer text-center">
      © Copyright 2016 by Angelo<br/>
      <script>document.write('Last Modified:' + document.lastModified);</script>
    </div>
  </body>
</html>
