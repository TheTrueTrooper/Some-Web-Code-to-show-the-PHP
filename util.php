<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Generates 10 Numbers going from 1 - 10 and shuffles
// -Return the array 
function GenerateNumbers()
{
    global  $Status;
    $array = array();
    for ($I = 0; $I < 10; $I++ )
    {
        $array[$I] = $I;  
    }
    
    shuffle($array);
    $Status['Numbers'] = TRUE;
    return $array;
}

//Makes HTML unordered or orderedlist 
// -$data : the Array or List to list
// -$ListType : the type of list back -> Default = ul (Unorder list)
//      -option 1 : ul
//      -option 2 : ol
// -Return HTML list string
function MakeList(array $data)
{
    global $Status;
    $string = "<ol>";
        for ($I = 0; $I < count($data); $I++ )
        {
            $string .= "<li> {$data[$I]}</li>";  
        }
        $string .= "</ul>";
        $Status["list"] =TRUE;
        return $string;

}

