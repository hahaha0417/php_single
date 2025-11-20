<?php

use Illuminate\Support\Facades\Route;
use App\Api\Backend\Backup\Base\Index_Controller as Api_Backend_Backup_Base_Index_Controller;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('backend/backup/base')
    ->middleware([
        // '',
    ])->group(function () {
    \hahaha\package\backup\base\router\api\router::Instance()->Backup();

    // -----------------------------------------------------

});
