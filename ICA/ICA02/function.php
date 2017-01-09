<?php
session_start(); 

$userTable = array();
$userTable['admin'] = password_hash('god', PASSWORD_DEFAULT );
$userTable['germf'] = password_hash('new123', PASSWORD_DEFAULT );
  
function Validate($params)
{
    global $userTable;
    if(!isset($userTable[$params["UserName"]]))
    {
        $params["Response"] = "faild to find  {$params["UserName"]}. Try again";
        $params["Status"] = FALSE;
    } 
    else if (password_verify($params["Password"], $userTable[$params["UserName"]]))
    {
        $_SESSION["username"] = $params["UserName"];
        $params["Response"] = "authentication success. Invalid password";
        $params["Status"] = TRUE;
    }
    else 
    {
        $params["Response"] = "authentication failed. Invalid password";
        $params["Status"] = FALSE;
    }
    return $params;
}
