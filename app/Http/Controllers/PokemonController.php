<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokemonController extends Controller
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://pokeapi.co/api/v2/';
    }

    public function get($pokemon)
    {
        return view('only_pokemon', ['pokemon' => $pokemon]);
    }
}
