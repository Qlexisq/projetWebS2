<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 22/05/2019
 * Time: 11:18
 */
$specialchars = "[ ] ! _ ( ) { } ; . < > : / \ + ~ # * | , ? $ € £ % §";
function is_code($string){
    $matches = [];
    $regex = "&([!_)({};.<>:/+~#\]\*\\\|,\?\$€£%§])+&";
    if(preg_match_all($regex,$string,$matches) == 0) return false;
    else return true;
}