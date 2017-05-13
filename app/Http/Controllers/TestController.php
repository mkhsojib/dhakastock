<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function index()
    {
        $client = new Client();
        $res = $client->request('GET', 'http://www.dsebd.org/');

        $data = $res->getBody();
        $match = '/\<h2 class=\"Bodyheading\">(.+)<\/h2>/';
        preg_match($match, $data, $result);

        print_r($result[1]);
    }
}
