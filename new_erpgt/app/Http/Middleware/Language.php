<?php 
 
namespace App\Http\Middleware; 
 
use App; 
use Closure; 
use Config; 
use Session; 
 
class Language 
{ 
    /** 
     * Handle an incoming request. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @param  \Closure  $next 
     * @return mixed 
     */ 
    public function handle($request, Closure $next) 
    { 
        if (Session::has('locale')) { 
            $locale = Session::get('locale', Config::get('app.locale')); 
        } else { 
            $locale = 'fr'; 
        } 
 
        App::setLocale($locale); 
        $request->session()->put('locale', $locale); 
 
        return $next($request); 
    } 
}