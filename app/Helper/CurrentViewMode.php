<?php
namespace App\Helper;

use Illuminate\Support\Facades\Request;

class CurrentViewMode {
    static function get(){
        if (session('current_view_mode'))
            return session('current_view_mode');

        return 'desktop';
    }

    static function set($mode){
        if (!in_array($mode, ['desktop', 'phone']))
            return 'desktop';

        session(['current_view_mode' => $mode]);
        session()->save();

        return $mode;
    }
}
