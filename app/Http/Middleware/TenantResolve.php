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
        //try to resolve otherwise

        $domain = $request->getHost();
        $domain = str_replace("www.", '', $domain); //get rid of www.
        $domain = str_replace(".".env("MAIN_HOST"), '', $domain);

        if($domain=='site')
        {
            $tenant = Tenant::where('domain', $request->header("LolaHost"))->first(); 
        }
        else
        {
            $tenant = Tenant::where('subdomain', $domain)->orWhere('domain', $domain)->first(); 
        }
        
        //subdomain
        if($tenant!=null)
        {
            $request->merge(['tenant_id'=>$tenant->id]);
            app()->singleton('tenant', function() use($tenant) {
                return $tenant;
            });
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
