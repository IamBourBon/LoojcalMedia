<?php

namespace App\Http\Middleware;

use Closure,Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Users;

class ValidateSignin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): response
    {
        $hasLogin = Session::get('email');
        
        if(empty($hasLogin)){
            return redirect('/login');
        }else{
            $active = Users::where('email',$hasLogin)->pluck('Active')->first();

            if($active === 1){
                return $next($request);
            }else{
                return redirect('/activeAccount/'.$hasLogin);
            }
    
        } 
        
    }
}
