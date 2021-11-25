<?php
use GuzzleHttp\Client;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsomApiController extends Controller
{
    public function getApiData()
    {
        $client = new  \GuzzleHttp\Client();
        $res = $client->request('GET', 'localhost/mrayed.ridha.formation/public/api/articles');

        $resultat= json_decode($res->getBody());
        $articles = $resultat->data->articles;
        //dd($resultat->data);
       return view('articles',compact('articles'));

    }
}
