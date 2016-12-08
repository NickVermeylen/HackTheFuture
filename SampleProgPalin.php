<?php
$mystring = "leval"; // set the string
echo "String: " . $mystring;
$myArray = array(); // php array
$myArray = str_split($mystring); //split the array
$len = sizeof($myArray); // get the size of array
$newString = "";

for ($i = $len-1; $i >= 0; $i--)
{
    $newString.=$myArray[$i];
}
echo "<br>";
if ($mystring == $newString) {
    echo "Output: " . $mystring . " is a palindrome";
} else {
    echo "Output: " . $mystring . " is not a palindrome";
}
?>
