<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use View;

trait MainSystemMethods  {
    public function __construct(Request $request) {
		
	    View::share ('model', new $this->def_model());
        View::share ('route_path', $this->route_path);
        View::share ('request', $request);
    }
}