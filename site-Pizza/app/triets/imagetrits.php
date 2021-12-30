<?php
namespace App\triets;
trait imagetrits
{
    function saveimag($sendfileimag,$sendfolderimag){
$fileExt=$sendfileimag->getClientOriginalExtension();
$filename=time(). '.' .$fileExt;

$path=$sendfolderimag;
$sendfileimag->move($path,$filename);
return  $filename ;
}


}
