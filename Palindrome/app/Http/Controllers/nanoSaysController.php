<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class nanoSaysController extends Controller
{
    public function index($id)
    {
        $url = 'http://team2.htf.cloud.tothepoint.company:30211/api/sounds/'.$id;
        $client = new Client(['timeout'  => 2.0]);
    
        $res = $client->request('PUT', $url,
            [ 'json' => ["data" => [ "code" => "sample :loop_amen, start: 1, finish: 0.02, attack: 5, rate: 0.5\n" ]]]
        );
        
        dd($res);
    }
}
