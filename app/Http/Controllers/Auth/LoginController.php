<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //

   

    public function redirectToProvider($driver)
    {
        $drivers=['facebook','google'];

        if(in_array($driver,$drivers))
        {
            return Socialite::driver($driver)->redirect();
        }
        else
        {
            return redirect()->route('login');
        }
        
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $driver)
    {
        
        if($request->error)
        {
            return redirect()->route('login');
        }
        
        
        //$user=Socialite::driver($driver)->user();
        $userSocialite = Socialite::driver($driver)->stateless()->user();

        $social_profile=SocialProfile::where('social_id',$userSocialite->id)

                                        ->where('social_name',$driver)->first();

        
    
        if(!$social_profile)
        {

            $usuario=User::where('email',$userSocialite->email)->first();

            if(!$usuario)
            {
                $usuario=User::create([
                    'name'=>$userSocialite->name,
                    'email'=>$userSocialite->email,
                ]);
            }

            $social_profile=SocialProfile::create([
                'user_id'=>$usuario->id,
                'social_id'=>$userSocialite->id,
                'social_name'=>$driver,
                'social_avatar'=>$userSocialite->avatar,
            ]);
        }

        auth()->login($social_profile->user);
        return redirect()->route('home');
        

        
        // $user->token;
    }

    
}
