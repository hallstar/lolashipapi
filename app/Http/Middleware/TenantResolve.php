<?php

namespace App\Http\Middleware;
use App\Models\Tenant;

use Closure;

class TenantResolve
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
        $resolved = false;
        $check = 'subdomain';
        //try to resolve otherwise

            $part = $request->header("LolaHost");

            if($part!=null)
                $check = 'domain';
                
            if($check=='subdomain')
            {
                $domain = $request->getHost();
                $domain = str_replace("www.", '', $domain); //get rid of www.
                $domain = str_replace(".".env("MAIN_HOST"), '', $domain);
                //subdomain
                $parts = explode(".", $domain);
                $part = $parts[0];
            }
            $tenant = Tenant::where($check, $part)->first(); 
            if($tenant!=null)
            {
                $request->merge(['tenant_id'=>$tenant->id]);
                $resolved = true;
            }

            if($resolved)
            {
                //set cookie domain and accept next request
                \Config::set("session.domain", $domain);
                return $next($request);
            }
            //redirect away to 404
            return redirect()->away(env("APP_URL").'/404');


    }



}
