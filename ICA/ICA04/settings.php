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
    <title>ica01_php</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="Inc/AJax.js" type="text/javascript"></script>
    <script src="Settings.js" type="text/javascript"></script>
    <style>
      @import url(//fonts.googleapis.com/css?family=Comfortaa|Raleway|Open+Sans:600|Ranchers&effect=3d);
      body, input { font-family: Comfortaa, Verdana, sans-serif; }
      h1 { font-family: Ranchers, cursive; }
      .footer { margin-top: 10px; }
      .row { margin-top: 5px; }
      .B {}
    </style>
  </head>
  <body>
    <div class="jumbotron text-center">
<?php
      echo "<h1 class='font-effect-3d'>ica03 Index : {$_SESSION["username"]}</h1>"
?>
    </div>
    <div class="container">
        <form name="Sample" method="Post">
        <div class="row">
           <div class="col-sm-3"></div>
          <div class="col-sm-3 text-right">UserName :</div>
          <div class="col-sm-3">
              <input id="D" name="UserName" type="text" placeholder="User Name" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-3 text-right">Password :</div>
          <div class="col-sm-3">
              <input id="C" name="Password" type="text" placeholder="Password" />
          </div>
        </div>
            <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
              <input id = "B" type="button" name="submit" value="Add" style="width: 100%;">
          </div>
          </div>
        </form>
    </div>
      <div class="container-fluid text-center">
          <table id="A" class="table table-striped">
          </table> 
          <div id="S" class="container-fluid text-center">
          </div>
       </div>
    <div class="container-fluid footer text-center">
      © Copyright 2016 by Angelo<br/>
      <script>document.write('Last Modified:' + document.lastModified);</script>
    </div>
  </body>
</html>

