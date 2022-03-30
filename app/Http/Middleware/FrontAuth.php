<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;

use App\Helper\CurrentLang;

class FrontAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
		
        $ar = $request->route()->parameters();
        $ar['lang'];

        CurrentLang::set($ar['lang']);

        return $next($request);
    }
}
