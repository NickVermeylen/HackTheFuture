<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class longestSeqController extends Controller
{
    public function index()
    {
        // http://team2.htf.cloud.tothepoint.company:30208/validateMe
        // request and response values
        
        // antwoord => /verifyMe --> solution:value
    
        $url = 'http://team2.htf.cloud.tothepoint.company:30208/validateMe';
        $client = new Client(['timeout'  => 2.0]);
    
        $res = $client->request('POST', $url,
            [ 'json' => [ "url" => "http://5e69ea09.ngrok.io/longestSeqData" ] ]
        );
        
        return "sending request";
    }
    
    public function data(Request $request)
    {
        $input1 = $request->get("request");
        $input2 = $request->get("response");
        
        $result = $this->getLongestSubstring($input1, $input2);
    
        $url = 'http://team2.htf.cloud.tothepoint.company:30208/verifyMe';
        $client = new Client(['timeout'  => 2.0]);
    
        $res = $client->request('POST', $url,
            [ 'json' => [ "solution" => $result ] ]
        );
        
        return $res;
        
    }
    
    public function getLongestSubstring($input1, $input2)
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
                if(!(($match = strpos($grootste,$toFind)) === false) )
                {
                    if($matchFound == 0 || $windowSize > $bestLength)
                    {
                        $matchFound = 1;
                        $bestMatch = $match;
                        $bestLength = $windowSize;
                        return substr($grootste,$match,$windowSize);
                    }
                    
                }
            }
        }
    }
}
