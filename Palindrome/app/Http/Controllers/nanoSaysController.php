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
            [ 'json' => ["data" => [ "code" => "live_loop :bass do\n  synth :prophet, note: :e1, release: 4, cutoff: 120, cutoff_attack: 1\n  sleep 4\nend\n" ]]]
        );
        
        dd($res);
    }
}
