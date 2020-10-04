<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @param int $pokemon
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function login(Request $request, $pokemon = 1)
    {
        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials, true)) {
            return view('only_pokemon' ,['pokemon' => $pokemon]);
        } else {
            return response()->json([
                'errors' => ['errors' => "Credentials not match"],
            ], 422);
        }
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout()
    {
        Auth::logout();
        return view('pokemons');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        $user = new User($request->all());
        $user->save();

        \Auth::login($user, true);

        return  view('pokemons');
    }
}
