<?php


namespace hahaha\package\backup\base\router\web;

use Illuminate\Support\Facades\Route;

/*

use hahaha\package\backup\base\env as define_env;
use hahaha\package\backup\base\env as base_define_env;
use hahaha\package\backup\base\env as backup_base_define_env;

*/



class router
{
    use \hahaha\instance;

    public function All()
    {

    }

    public function Backup()
    {
        Route::get('/', [\hahaha\package\backup\base\controller\web\index_controller::class, "Index"]);              
    }







    // --------------------------------------------------- 
    // 主要
    // --------------------------------------------------- 
    // 維修
	
    // --------------------------------------------------- 

    // --------------------------------------------------- 

    // --------------------------------------------------- 

    // --------------------------------------------------- 

    // --------------------------------------------------- 

    // --------------------------------------------------- 
}