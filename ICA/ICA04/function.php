<?php
require_once './Inc/db.php';

//session_start(); 

$userTable = array();

GetUsersFull();

function GetUsersFull()
{
    global $mysqli, $mysqli_response, $mysqli_status;
    global $userTable;
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
    $userTable = $outArr;
    
}

  
function Validate($params)
{
    global $userTable;

    foreach ($userTable as $Person) {
            if($Person["username"] != $params["UserName"])
            {
                $params["Response"] = "faild to find  {$params["UserName"]}. Try again";
                $params["Status"] = FALSE;
            } 
            else if (password_verify($params["Password"], $Person["password"]))
            {
                $_SESSION["username"] = $params["UserName"];
                $_SESSION["UserID"] = $Person["userID"];
                $params["Response"] = "authentication success. Invalid password";
                $params["Status"] = TRUE;
                break;
            }
            else 
            {
                $params["Response"] = "authentication failed. Invalid password";
                $params["Status"] = FALSE;
                break;
            }
        }
    
    return $params;
}
