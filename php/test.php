<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 20/05/2019
 * Time: 12:22
 */

$matches = [];
$regex = "&([!_)({};.<>:/+~#[\]\*\\\|,\?\$€£%§])+&";
$string = "hel!lo";



var_dump(preg_match_all($regex,$string,$matches));
