<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAccountService;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to social api.
     *
     * @return void
     */
    public function redirect($service)
    {
        session()->put('previous_url', url()->previous());
        return Socialite::driver($service)->redirect();
    }

    /**
     * Return a callback method from social api.
     *
     * @return callback URL from social
     */
    public function callback($provider,SocialAccountService $service)
    {
        //dd(Socialite::driver($service)->user());
        $user = $service->createOrGetUser(Socialite::driver($provider)->user(),$provider);
        auth()->login($user);
        \Cart::instance(getInstanceCart())->restore(getInstanceCart());
        \Cart::instance('cart')->content()->each(function ($item,$key){
            \Cart::instance(getInstanceCart())->add($item->id,$item->name,$item->qty,$item->price,$item->options->toArray());
        });
        \Cart::instance(getInstanceCart())->store(getInstanceCart());
        $previous_url = session()->pull('previous_url', route('users.edit'));
        return redirect($previous_url);
    }
}