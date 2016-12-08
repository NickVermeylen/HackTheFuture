<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class repeatedDigits extends Controller
{
    
    public $verifySend = 0;
    public $client;
    
    public function index()
    {
        $url = 'http://team2.htf.cloud.tothepoint.company:30213/validateMe';
        $this->client = new Client(['timeout'  => 2.0]);
    
        $res = $this->client->request('POST', $url,
            [ 'json' => ["url" => "http://5e69ea09.ngrok.io/digitsResult"]]
        );
    
        return "Sending our url";
    }
    
    public function value(Request $request)
    {
        if($this->verifySend == 0)
        {
            $input = $request->challenge;
            $result = $this->isRepeatedDigit($input);
    
            $url = "http://team2.htf.cloud.tothepoint.company:30213/verifyMe";
            $this->verifySend = 1;
    
            $this->client = new Client(['timeout'  => 2.0]);
            $res = $this->client->request('POST', $url, [
                'json' => [
                    "challenge" => $input,
                    "solution" => $result,
                ]
            ]);
        }
        else
        {
            Log::info("SuccesMessage: ". $request->success);
            return $request->success;
        }
    }
    
    public function isRepeatedDigit($input)
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
}
