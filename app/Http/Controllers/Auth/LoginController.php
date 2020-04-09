<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $authuser= $this->findOrCreateUser($user, 'google');
        Auth::login($authuser,true);
        return redirect($this->redirectTo);
    
        
    }

    public function findOrCreateUser($user,$provider){
        $authuser = User::where('provider_id',$user->id)->first();
        if($authuser)
         return $authuser;
        
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password'=> Hash::make(bin2hex(openssl_random_pseudo_bytes(4))),
            'provider' => $provider,
            'provider_id'=> $user->id
        ]);
    }
}
