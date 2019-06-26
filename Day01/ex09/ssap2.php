#!/usr/bin/php
<?php
$grabstuff = $argv[0];
function getchartype($c)
{
    if (ctype_alpha($c))
        return 0;
    if (ctype_digit($c))
        return 1;
    else
         return 2;
}

function cmp($a, $b)
{
    $i = 0;
    $a = strtolower($a);
    $b = strtolower($b);
    $shorter = min(strlen($a), strlen($b));
    while ($i < $shorter && ($a[$i] == $b[$i]))
        $i++;
    if ($i == $shorter && strlen($a) == $shorter)
        return -1;    
    if ($a[$i] && $b[$i])
    {
        $aChartype = getchartype($a[$i]);
        $bChartype = getchartype($b[$i]);
        if($aChartype > $bChartype)
            return 1;                
        else if($aChartype < $bChartype)
            return -1;
        else if($aChartype == $bChartype)
        {
            if($a[$i] > $b[$i])
                return 1;
            if($a[$i] < $b[$i])
                return -1;
            if($a[$i] == $b[$i])
                return 0;
        }
    }
}

array_shift($argv);
foreach($argv as $value)
{
    $grabstuff .= ' ';
    $grabstuff .= $value;
}

$array = explode(' ', $grabstuff);
    array_shift($array);
    natcasesort($array);
    usort($array, "cmp");
    foreach($array as $arg)
    {
        echo "$arg\n";
    }
?>