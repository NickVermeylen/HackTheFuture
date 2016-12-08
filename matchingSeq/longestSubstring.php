<?php

$input1 = "abc123abc123";

$input2 = "rtbc123a78";

getLongestSubstring($input1, $input2);

function getLongestSubstring($input1, $input2)
{
	if(strlen($input1) <= strlen($input2))
	{
		$kleinste = $input1;
		$grootste = $input2;
	}
	else
	{
		$kleinste = $input2;
		$grootste = $input1;
	}

	$matchFound = 0;
	$matchLength = 0;
	$bestMatch = 0;
	
	for ($windowSize = strlen($kleinste); $windowSize > 0; $windowSize--) 
	{ 
		for ($windowPlace = 0; $windowPlace < strlen($kleinste)-$windowSize; $windowPlace++) 
		{ 
			$toFind = substr($kleinste,$windowPlace,$windowSize);
			//echo $toFind . " " . "";
			if(!(($match = strpos($grootste,$toFind)) === false) )
			{
				//echo "Window: ". $windowSize . "  " . substr($grootste,$match,$windowSize);
				if($matchFound == 0 || $windowSize > $bestLength)
				{
					$matchFound = 1;
					$bestMatch = $match;
					$bestLength = $windowSize;
					echo " Bestmatch: " . substr($grootste,$match,$windowSize) . "\n";
				}
				
			}
		}
		//echo "\n";
	}	
}

	