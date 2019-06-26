#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");

$nbr_mois = array(
    1 => "janvier",
    2 => "février",
    3 => "mars",
    4 => "avril",
    5 => "mai",
    6 => "juin",
    7 => "juillet",
    8 => "août",
    9 => "septembre",
    10 => "octobre",
    11 => "novembre",
    12 => "décembre");

$nbr_week = array(
    1 => "lundi",
    2 => "mardi",
    3 => "mercredi",
    4 => "jeudi",
    5 => "vendredi",
    6 => "samedi",
    7 => "dimanche");

if ($argc < 2)
	exit();

$tab_date = explode(" ", $argv[1]);

if (count($tab_date) != 5 ||
	preg_match("#^[1-9]$|^0[1-9]$|^[1-2][0-9]$|^3[0-1]$#", $tab_date[1]) === 0 ||
	preg_match("#^[0-9]{4}$#", $tab_date[3]) === 0 ||
	preg_match("#^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$#", $tab_date[4]) === 0)
{
	echo "Wrong Format\n";
	exit();
}

$tab_date[0] = array_search(lcfirst($tab_date[0]), $nbr_week);
$tab_date[2] = array_search(lcfirst($tab_date[2]), $nbr_mois);

if ($tab_date[0] === False || $tab_date[2] === False)
{
	echo "Wrong Format\n";
	exit();
}

$str_date = $tab_date[3] . "-" . $tab_date[2] . "-" . $tab_date[1] . " " . $tab_date[4];
if (($result = strtotime($str_date)) === False )
	echo "Wrong Format\n";
else
	echo $result . "\n";
?>