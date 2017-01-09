/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Assume jQuery Loaded

var AjaxURL = "webservice.php";
var Status = new Array();

function GetUsers()
{
    var SendData = {};
    SendData["action"] = "Get";
    SendData["filter"] = "";
    AjaxRequest("GET", AjaxURL, SendData, "json", PrintUsers, ErrorHandler);
}

function PrintUsers(data, status)
{
    REturn = data;//$.parseJSON(data);
    $("#A").empty();
    REturn.data.forEach(function(item, index)
        { 
            
            $("#A").append("<TR><TD><input class = \"B\" id =\"B"+ item.userID.toString() +"\" type=\"button\" name=\"submit\" value=\"Delete\" style=\"width: 100%;\"> </TD><TD>" + (index +1).toString()  +"</TD> <TD>" + item.userID.toString() +"</TD> <TD>" + item.username.toString() +"</TD> <TD>" + item.password.toString() +"</TD> </TR>");
        }
    );
    $("#S").empty();
    Status.forEach(function(item, index)
    {
    $("#S").append(item.status);
    });
    $("#S").append(status);
}

function CreateUsers()
{
    var SendData = {};
    SendData["action"] = "Add";
    SendData["Name"] = $("#D").val();
    SendData["Pass"] = $("#C").val();
    AjaxRequest("GET", AjaxURL, SendData, "json", HandleUserAddDelete, ErrorHandler);
}

function deleteUser(ID)
{
    var SendData = {};
    SendData["action"] = "Delete";
    SendData["ID"] = ID;
    AjaxRequest("GET", AjaxURL, SendData, "json", HandleUserAddDelete, ErrorHandler);
}

function HandleUserAddDelete(data, status)
{
    console.log(data);
    console.log(status);
    GetUsers();
    Status[0] = status;
}

function ErrorHandler(data, status)
{
    console.log(data);
    console.log(status);
    
    $("#S").empty();
    $("#S").append(status);
}

$(document).ready(function(){
    GetUsers();
    Status = new Array();
    
    $("#B").click(function(){
        CreateUsers();
        Status = new Array();
    });

    $(document).on('click', '.B', function () {
    // your function here
     deleteUser(this.id.replace('B', ""));
     Status = new Array();
    });
});

