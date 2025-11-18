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
    Route::post('add', [Api_Backend_Backup_Base_Index_Controller::class, "Add"]);
    Route::post('update', [Api_Backend_Backup_Base_Index_Controller::class, "Update"]);
    Route::post('delete', [Api_Backend_Backup_Base_Index_Controller::class, "Delete"]);
    Route::post('backup', [Api_Backend_Backup_Base_Index_Controller::class, "Backup"]);
    Route::post('restore', [Api_Backend_Backup_Base_Index_Controller::class, "Restore"]);

    // -----------------------------------------------------

});
