<?php
function getPalindrome($input)
{
    $output = palindrome($input);
    $stop = 0;
    while ($stop != 1) {
        $temp = palindrome($output);
        if ($output == $temp) {
            $stop = 1;
        } else {
            $output = $temp;
        }
    }

    return $output;
}
function palindrome($input)
{
    //$Array = array();
    $Array = str_split($input);
    $len = count($Array);
    $mirror = array();
    //do {
        for ($i = $len - 1; $i >= 0; $i--) {
            $mirror[$i] = $Array[$i];
        }
        if ((string)$input != implode("", $mirror)) {
            $input++;
        }
    //}while((string)$input != implode("",$mirror));
    return $input;
    //var_dump($input);
    //var_dump($mirror);
}

?>