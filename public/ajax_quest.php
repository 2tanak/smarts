<?php
//use Illuminate\Support\Facades\Session;

if(isset($_GET['width'])){
	\Session::put('calc_mobil', $_GET['width']);
		echo \Session::get('calc_mobil');exit();
}






?>