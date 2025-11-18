<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Index\Index_Controller as Backend_Index_Index_Controller;
use App\Http\Controllers\Backend\Table\Index_Controller as Backend_Table_Index_Controller;
use App\Http\Controllers\Backend\Permission\Index_Controller as Backend_Permission_Index_Controller;
use App\Http\Controllers\Backend\Backup\Index_Controller as Backend_Backup_Index_Controller;
use App\Http\Controllers\Backend\Backup\Base\Index_Controller as Backend_Backup_Base_Index_Controller;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('')
//     ->middleware([
//         // '',
//     ])->group(function () {
//     Route::get('/deal', function () {
//         $front_end_index_controller = new Frontend_Index_Index_Controller();
//         $front_end_index_controller->Index();
        
//         echo "全部產生完成";
//     });
//     // -----------------------------------------------------

// });

Route::prefix('backend')
    ->middleware([
        // '',
    ])->group(function () {
    Route::get('/', [Backend_Index_Index_Controller::class, "Index"]);
    Route::get('/login', [Backend_Index_Index_Controller::class, "Login"]);
    
    // -----------------------------------------------------

});

// Route::prefix('backend/table')
//     ->middleware([
//         // '',
//     ])->group(function () {
//     Route::get('/base', [Backend_Table_Index_Controller::class, "Base"]);
//     Route::get('/base/edit/{id}', [Backend_Table_Index_Controller::class, "Edit"]);
//     // 
//     Route::get('/modal', [Backend_Table_Index_Controller::class, "Modal"]);

//     // -----------------------------------------------------

// });

// Route::prefix('backend/permission')
//     ->middleware([
//         // '',
//     ])->group(function () {
//     Route::get('/', [Backend_Permission_Index_Controller::class, "Index"]);

//     // -----------------------------------------------------

// });

Route::prefix('backend/backup/base')
    ->middleware([
        // '',
    ])->group(function () {
    Route::get('/', [Backend_Backup_Base_Index_Controller::class, "Index"]);

    // -----------------------------------------------------

});