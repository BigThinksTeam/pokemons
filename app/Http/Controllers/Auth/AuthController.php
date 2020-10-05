<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\RegisterSave;


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
            $request->session()->flash('success', 'Login Success');
            return view('pokemons');
        } else {
            $request->session()->flash('error', 'this credentials not match');
            return view('Auth.login');
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
    public function register(RegisterSave $request)
    {
        $user = new User($request->all());
        $user->save();
        \DB::commit();

        \Auth::login($user, true);

        return  view('pokemons');
    }
}
