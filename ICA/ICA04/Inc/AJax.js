/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//ajax lib
//jquerie loaded

//Args
//tags : One of GET , POST, DELETE, PUT
//url : where is it going
//sendData : js object with data to send
//ResposeType : one of : text, html, json, jsonp, xml
//Target function : object Target to invoke to handle data
//Fnc Success and fncFail
function AjaxRequest(type, url, sendData, responseType, fncSuccess, fncFail)
{
    var options = {};
    options["type"] = type;
    options["url"] = url;
    options["data"] = sendData;
    options["dataType"] = responseType;
    options["success"] = fncSuccess;
    options["error"] = fncFail;
    $.ajax(options);
}
