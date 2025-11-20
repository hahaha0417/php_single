<?php


namespace hahaha\package\backup\base\router\api;

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
        Route::post('add', [\hahaha\package\backup\base\controller\api\index_controller::class, "Add"]);
        Route::post('update', [\hahaha\package\backup\base\controller\api\index_controller::class, "Update"]);
        Route::post('delete', [\hahaha\package\backup\base\controller\api\index_controller::class, "Delete"]);
        Route::post('backup', [\hahaha\package\backup\base\controller\api\index_controller::class, "Backup"]);
        Route::post('restore', [\hahaha\package\backup\base\controller\api\index_controller::class, "Restore"]);           
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