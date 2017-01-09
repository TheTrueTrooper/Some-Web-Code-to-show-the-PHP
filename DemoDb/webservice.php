<?php
require_once './inc/db.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$Row["col1"] = "Got here, Yea";
$Row["col2"] = "Sure you did";
$Rows[] = $Row;
$Reply["jsonData"] = $Rows;
$Reply["status"] = "success";

$ajaxData = array();

//function to GET our Title information with mySQL query
function QueryBooks($constraint)
{
    global $mysqli, $mysqli_response, $mysqli_status;
    global $ajaxData;
    $query = "select title, title_id, price";
    
    $query.= " from titles";
    $query.= " where title like '%{$constraint}%'";
    $constraint = $mysqli->real_escape_string($constraint);
    
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
        $status = "Success : {$numRows} affected";
    }
    else 
    {
        $status = "Error on Query";
    }
    $ajaxData["data"] = $outArr;
    $ajaxData["status"] = $status;
    
}

function UpdateBooks($Fixed, $constraint)
{
    global $mysqli, $mysqli_response, $mysqli_status;
    global $ajaxData;
    $query = "update titles";
    
    $query.= " set price = price + {$Fixed}";
    $query.= " where title like '%{$constraint}%'";
    $constraint = $mysqli->real_escape_string($constraint);
    $Fixed = $mysqli->real_escape_string($Fixed);
    
    $outArr = array();
    $status = "";
    
    if ($result = mysqliNonQuery($query))
    {
        $result = "Success : {$query}";
    }
    else 
    {
        $status = "Error on Query";
    }
    $ajaxData["data"] = $outArr;
    $ajaxData["status"] = $status;
    
}


if(isset($_GET["action"]) && $_GET["action"] == "select")
{
    QueryBooks($_GET["filter"]);
}

if(isset($_GET["action"]) && $_GET["action"] == "update")
{
    UpdateBooks($_GET["fixed"]);
}

echo json_encode($ajaxData);
die();
