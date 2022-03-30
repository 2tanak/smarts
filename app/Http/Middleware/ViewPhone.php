<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use App\Helper\CurrentViewMode;

class ViewPhone {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        CurrentViewMode::set('phone');

        return $next($request);
    }
}
