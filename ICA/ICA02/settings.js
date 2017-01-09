/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Assume jQuery Loaded
var testData = { data : [{userID :"123", username : "Kirk", password : "NCC1701"},
{userID :"667", username : "Spock", password : "Fascinating"}], status : "Passed"};



function GetIt(data)
{
    REturn = data;//$.parseJSON(data);
    $("#A").empty();
    REturn.data.forEach(function(item, index)
        { 
            $("#A").append("<TR> <TD>" + (index +1).toString()  +"</TD> <TD>" + item.userID.toString() +"</TD> <TD>" + item.username.toString() +"</TD> <TD>" + item.password.toString() +"</TD> </TR>");
        }
    );
}

$(document).ready(function(){
    GetIt(testData);
});