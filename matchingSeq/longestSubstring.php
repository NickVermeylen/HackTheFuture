<?php

$input1 = "ugc4qk4bbi3heev30osbvnkd8sal0jqpsoae1u89abjbgla5d83oeao06907sv993s8q87d060t4eaqbq8g242hvua0f79iahpo94qa03ur0i57v8mjk5s77ure45trugptn1khq32ns9l5vpbju3c1q43v1ihku28rjqctltojrhjltiksgqtmpdfsh4sm788se3qlbrmov7tc1uo6valh81tcoq50nkncp4t48ctd7ific0hm1k9g9rd3pnked5a";

$input2 = "jhebmbqkn44kgk8ng39o1vvp8c9061mr9vt9smah0o5b8fq6h9as9ai12t4j0j1c664gnp2s8cuuhh4f85gnds4eag7qibeb35n5t41r136fq4ad21l0rcspu5upnp5afot9gnllkrgrjj70iqe38j8kcrgqro9o6hgauh2tvm6gepv982uh9lskmoiofljdirf16dav3p2skk696g04hu0kiqnueuqpiu8g15rhed1rnmb8ecosqbdsbdp0apokgrhm";

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

	