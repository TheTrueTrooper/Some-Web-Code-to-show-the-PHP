/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Assume jQuery Loaded

var AjaxURL = "webservice.php";


function GetUsers()
{
    var SendData = {};
    SendData["action"] = "Get";
    SendData["filter"] = "";
    AjaxRequest("GET", AjaxURL, SendData, "json", PrintUsers, ErrorHandler);
}

function PrintUsers(data, AjaxStatus)
{
    REturn = data;//$.parseJSON(data);
    $("#A").empty();
    REturn.data.forEach(function(item, index)
        { 
            $("#A").append("<TR> <TD><input class=\"Del\" type=\"submit\" name=\"submit\" value=\"Add\" style=\"width: 100%;\">Delete</input></TD><TD>" + (index +1).toString()  +"</TD> <TD>" + item.userID.toString() +"</TD> <TD>" + item.username.toString() +"</TD> <TD>" + item.password.toString() +"</TD> </TR>");
        }
    );
}



function ErrorHandler(data, status)
{
    console.log(data);
    console.log(status);
}

$(document).ready(function(){
    GetUsers();
    $(".Del").click(function(e){
        e.target.id
    })
});

