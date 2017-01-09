<?php
require_once "util.php"; // must work or script fail
// include_once 'util.php'; // optional include

$ICAPath = $_SERVER['SCRIPT_FILENAME'] . "/ICA";
echo $ICAPath;
$ICA = array();      
$ICA = scandir ($ICA);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ica01 demo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <style>
      @import url(//fonts.googleapis.com/css?family=Comfortaa|Raleway|Open+Sans:600|Ranchers&effect=3d);
      body, input { font-family: Comfortaa, Verdana, sans-serif; font-size: large; }
      h1 { font-family: Ranchers, cursive; }
      .footer { margin-top: 10px; }
      .row { margin-top: 5px; }
    </style>
  </head>
  <body>
    <div class="jumbotron text-center">
      <h1 class='font-effect-3d'>CMPE2500 Index</h1>
    </div>
    <div class="container">
    </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6 text-right">
              <h2>ICA's</h2>
<?php
$int = 0;
$string = "<ol>";
foreach ($ICA as $value) 
    {
        $int++;
        $string .= "<li><a href='{$value}'> ICA {$int}</a></li>";
    }
$string .= "</ol>";
echo $string;
?>              
          </div>
        </div>
    </div>
    <div class="container-fluid footer text-center">
      Angelo's indexer<br/>
      <script>document.write('Last Modified:' + document.lastModified);</script>
    </div>
  </body>
</html>
