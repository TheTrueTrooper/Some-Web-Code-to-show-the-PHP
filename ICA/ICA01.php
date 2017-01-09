<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// NO output until page has started
require_once "../util.php";
$Status = array();
$Get = array();
if (isset($_GET['fName']) 
        && strlen($_GET['fName']) > 0 
        && isset($_GET['fHobby']) 
        && strlen($_GET['fHobby']) > 0 
        && isset($_GET['fHowMuch'])
        && strlen($_GET['fHowMuch']) > 0)
{
    $Get['fName'] =  strip_tags($_GET['fName']);
    $Get['fHobby'] =  strip_tags($_GET['fHobby']);
    $Get['fHowMuch'] =  strip_tags($_GET['fHowMuch']);
    $Status['Form'] = TRUE;
}

function PrintHobby()
{
    global $Status;
    global $Get;
    $string = "<ul>";
    for ($I = 0; $I < count($data); $I++ )
        {
            $string .= "<li> {$data[$I]}</li>";  
        }
    $string .= "</ul>";
    $Status['Show'] = TRUE;
    return $string;
}

function PrintHobby2()
{
    global $Status;
    $Status[ShowArray] = TRUE;
    global $Get;
    if(isset($Get['fName']))
    {
        $string = "{$Get['fName']} ";
        for ($I = 0; $I < intval($Get['fHowMuch']); $I++ )
        {
            $string .= "really ";  
        }
        $string .= "likes {$Get['fHobby']}";
    }
    return $string;
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
    <link href="ICA01.css" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <style>
      @import url(//fonts.googleapis.com/css?family=Comfortaa|Raleway|Open+Sans:600|Ranchers&effect=3d);
      body, input { font-family: Comfortaa, Verdana, sans-serif; }
      h1 { font-family: Ranchers, cursive; }
      .footer { margin-top: 10px; }
      .row { margin-top: 5px; }
    </style>
  </head>
  <body>
    <div class="jumbotron text-center">
      <h1 class="font-effect-3d">ica01 - Forms</h1>
    </div>
    <div class="container">
<?php

echo "<ul style=\"list-style-type:none\"><li>Your IP is            " . $_SERVER['REMOTE_ADDR'] ."</li>" . 
        "<li>Found : " . count($_GET) . ' in the $GET</li>' .
        "<li>Found : " . count($_POST) . ' in the $Post</li>' .
        "</ul>";
    $Status['Info'] = TRUE;
?>
            </div>
    <div class="container">
        <div class="row">
           <div class="col-sm-3"></div>
           <div class="col-sm-3">
<?php
echo PrintHobby();
?>
    </div>
</div>
    </div>
    <div class="container">
<?php
echo MakeList(GenerateNumbers());
?>
    </div>
    <div class="container BackGround">
      <form name="Sample" method="get">
        <div class="row">
           <div class="col-sm-3"></div>
          <div class="col-sm-3 text-right">Name :</div>
          <div class="col-sm-3"><input name="fName" type="text" placeholder="Name" /></div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-3 text-right">Hobby :</div>
          <div class="col-sm-3"><input name="fHobby" type="text" placeholder="Hobby" /></div>
        </div>
        <div class="row">
                <div class="col-sm-3"></div>
          <div class="col-sm-3 text-right">How Much :</div>
          <div class="col-sm-3"><input name="fHowMuch" type="range" min="0" max="6" placeholder="Much" /></div>
        </div>
        <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6"><input type="submit" value="Go NOW!" style="width: 100%;"/></div>
        </div>
      </form>
    </div>
          </div>
    <div class="container-fluid text-center BackGround">
<?php
echo PrintHobby2();
?>
    </div>
  <div class="container-fluid text-center BackGround">
<?php
$str = "Status:";
if($Status['Form'] == TRUE)
{
    $str .= "+FormProcess";
}
if($Status['Info'] == TRUE)
{
    $str .= "+ServerInfo";
}
if($Status['Get'] == TRUE)
{
    $str .= "+GETData";
}
if($Status['Numbers'] == TRUE)
{
    $str .= "+GenerateNumbers";
}
if($Status["list"] == TRUE)
{
    $str .= "+MakeList";
}
if ($Status['Show'] == TRUE)
{
$str .= "+ShowArray";
}
echo $str;
?>
</div>
    <div class="container-fluid footer text-center">
      © Copyright 2016 by Λαηsεζσω<br/>
      <script>document.write('Last Modified:' + document.lastModified);</script>
    </div>
  </body>
</html>