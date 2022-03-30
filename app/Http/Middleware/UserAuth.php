<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;

class UserAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        if ($this->auth->guest() || !in_array($this->auth->user()->type_id, [SysUserType::USER])){
            return redirect()->to(lroute('student_login'));
        }
        
        return $next($request);
    }
}
