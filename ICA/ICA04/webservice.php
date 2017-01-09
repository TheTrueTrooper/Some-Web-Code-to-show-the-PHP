<?php
require_once './Inc/db.php';

if( !isset($_SESSION['UserID']))
{ // shouldn't be here
  header("location:login.php");
  die();
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ajaxData = array();

//function to GET our Title information with mySQL query
function GetUsersFulls()
{
    global $mysqli, $mysqli_response, $mysqli_status;
    global $ajaxData;
    $query = "select userID, username, password";
    
    $query.= " from prj_users";
    
    $outArr = array();
    $status = "";
    
    if ($result = mysqliQuery($query))
    {
        $numRows = $result ->num_rows; // held in member ely
        
        while ($Row = $result->fetch_assoc())
        {
            // god if we know
            //$titleField = $Row["title"];
            //since row is an entrie rwo add to results
            $outArr[] = $Row; // add entire arry to end
        }
    }
    else 
    {
        $status = "Error";
    }
    $ajaxData["data"] = $outArr;
    $ajaxData["status"] = $status;
    
    Done();
}


function CreateUsersa($Params)
{
    global $mysqli, $mysqli_response, $mysqli_status;
    global $ajaxData;
    $query = "INSERT INTO `prj_users`";
    
    $query.= "(`userID`, `username`, `password`)";
    $query.= " VALUES ( default, '". $Params["UserName"] . "', '". password_hash($Params["Password"], PASSWORD_DEFAULT ) ."')";
    
    $status = "";
    
    if ($result = mysqliQuery($query))
    {
        $numRows = $result ->num_rows; // held in member ely
        $ajaxData["status"] = "success : $numRows affacted";
    }
    else 
    {
        $ajaxData["status"] = "Nope : $numRows affacted";
    }
    $ajaxData["data"] = $numRows;
    
    Done();
}

function DelUser($Params)
{
    global $mysqli, $mysqli_response, $mysqli_status;
    global $ajaxData;
    
    $query = "DELETE FROM `prj_users` WHERE `userID` = {$Params["ID"]} ";
    
    $status = "";
    
    if ($result = mysqliQuery($query))
    {
        $numRows = $result ->num_rows; // held in member ely
        $ajaxData["status"] = "success : $numRows affacted";
    }
    else 
    {
        $ajaxData["status"] = "Nope : $numRows affacted";
    }
    $ajaxData["data"] = $numRows;
    
    Done();
}



function Done()
{
    global $ajaxData;
    echo json_encode($ajaxData);
    die();
}



if(isset($_GET["action"]) && $_GET["action"] == "Get")
{
    GetUsersFulls();
}
 else if(isset($_GET["action"]) && $_GET["action"] == "Add")
{
    $In = array();
    $In["UserName"] = strip_tags($_GET["Name"]);
    $In["Password"] = strip_tags($_GET["Pass"]);
    CreateUsersa($In);
}
else if(isset($_GET["action"]) && $_GET["action"] == "Delete" && $_GET["ID"] != $_SESSION[UserID])
{
    $In = array();
    $In["ID"] = $_GET["ID"];
    DelUser($In);
    $ajaxData["data"] = 0;
    $ajaxData["status"] = "Delete Failed cannot Delete your self";
}

Done();

