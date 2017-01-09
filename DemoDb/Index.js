/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Assume jQuery Loaded

var AjaxURL = "webservice.php";

var filter = "";

function GetBooks()
{
    var SendData = {};
    SendData["action"] = "select";
    SendData["filter"] = $("#filter").val();
    
    //AjaxRequest(type, url, sendData, responseType, fncSuccess, fncFail)
    AjaxRequest("GET", AjaxURL, SendData, "json", ShowBooks, ErrorHandler);
}

function GetBooks2()
{
    var SendData = {};
    SendData["action"] = "select";
    SendData["filter"] = filter;
    
    //AjaxRequest(type, url, sendData, responseType, fncSuccess, fncFail)
    AjaxRequest("GET", AjaxURL, SendData, "json", ShowBooks, ErrorHandler);
}

function UpdateBooks()
{
    if($.isNumeric($("#P").val()))
    {        
    var SendData = {};
    SendData["action"] = "update";
    SendData["fixed"] = $("#P").val();
    filter = $("#filter").val();
    SendData["filter"] = filter;
    AjaxRequest("GET", AjaxURL, SendData, "json", UpdateBooksDone(), ErrorHandler);
    }
}

function UpdateBooksDone(data, AjaxStatus)
{
    GetBooks2();
}

function ShowBooks(data, AjaxStatus)
{
    var str = "";
    var data = data["data"];
    
    for(var i =0; i < data.length; i ++)
    {
        for (item in data[i])
            str += "<span>" + data[i][item] + "</span>";
        str += "<br/>";
    }
    
    $("#out").find("code").first().empty().append(str);
    $("#status").empty().append(data["status"] + "<br/>" );
    $("#status").append("Retrived :" + data.length + "records<br/>");
    
}

function ErrorHandler(data, status)
{
    console.log(data);
    console.log(status);
}

$(document).ready(
function()
{
    GetBooks();
    
    $("#btnGetBooks").click(function(){
        GetBooks();
    });
    
    $("#btnUpdatePrice").click(function(){
        UpdateBooks();
    });
    
    
});
