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
function GetUsersFull()
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
        echo "Error on Query";
    }
    $ajaxData["data"] = $outArr;
    $ajaxData["status"] = $status;
    
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
    GetUsersFull();
}
 else if(isset($_GET["action"]) && $_GET["action"] == "update")
{
    UpdateBooks($_GET["fixed"]);
}

Done();

