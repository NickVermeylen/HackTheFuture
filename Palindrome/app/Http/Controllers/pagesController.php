<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class pagesController extends Controller
{
    
    public $palindromeFound = 0;
    public $client;
    
    public function index()
    {
        
        $url = 'http://team2.htf.cloud.tothepoint.company:30212/palindroom/validateMe';
        $this->client = new Client(['timeout'  => 2.0]);
        
        $res = $this->client->request('POST', $url,
            [ 'json' => ["url" => "http://5e69ea09.ngrok.io/palindroomResult"]]
        );
        
        return "Sending our url";
    }
    
    public function result(Request $request)
    {
        if($this->palindromeFound == 0)
        {
            $input =  $request->value;
            $output = $this->getPalindrome($input);
            $this->palindromeFound = 1;
            return ["value" => $output];
        }
        
        return "ok";
    }
    
    public function getPalindrome($input)
    {
        $output = $this->palindrome($input);
        $stop = 0;
        while ($stop != 1) {
            $temp = $this->palindrome($output);
            if ($output == $temp) {
                $stop = 1;
            } else {
                $output = $temp;
            }
        }
        
        return $output;
    }
    public function palindrome($input)
    {
        $Array = str_split($input);
        $len = count($Array);
        $mirror = array();

        for ($i = $len - 1; $i >= 0; $i--) {
            $mirror[$i] = $Array[$i];
        }
        if ((string)$input != implode("", $mirror)) {
            $input++;
        }
        return $input;

    }
}
