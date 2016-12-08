<?php
/**
 * Created by PhpStorm.
 * User: Nick Vermeylen
 * Date: 8/12/2016
 * Time: 11:14
 */
$input = 1122334455667788987654321;
$output = getRepeatedDigit($input);
if($output)
{
    echo "TRUE";
}
else
{
    echo "FALSE";
}

function getRepeatedDigit($input)
{
    $Array = str_split($input);
    $len = count($Array);
    $temp = 0;
    $counter = 0;
    $output = false;
    for($i = 0; $i < $len; $i++)
    {
        if($temp == $Array[$i])
        {
            $counter++;
        }
        else{
            $temp = $Array[$i];
            $counter = 0;
        }
        if($counter == 3)
        {
            $output = true;
        }
    }
 return $output;
}