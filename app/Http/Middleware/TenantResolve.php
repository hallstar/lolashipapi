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
    
        $domain = $request->getHost();
        if($domain==env('MAIN_HOST')) // if incoming host name is main host, do nothing
            return $next($request);

        //try to resolve otherwise

        $domain = str_replace("www.", '', $domain); //get rid of www.

        $parts = explode(".", $domain); // need the parts

        $parts_count = count($parts);

        if($parts_count==2)
        {
            
            $tenant = Tenant::where('domain', $domain)->first(); 
            if($tenant!=null)
            {
                $request->merge(['tenant_id'=>$tenant->id]);
                return $next($request);
            }
            else
            {
                return redirect()->route("404");
            }
        }

        if($parts_count==3)
        {
            //top level domain. We got to improve this to check for co.uk, .com.au etc
            //need a way to handle a domain here lets say if its a toplevel co.uk domain

            //subdomain
            $tenant = Tenant::where('subdomain', $parts[0])->first(); 
            if($tenant!=null)
            {
                $request->merge(['tenant_id'=>$tenant->id]);
                return $next($request);
            }
            else
            {
                return redirect()->route("404");
            }
        }

    }
}
