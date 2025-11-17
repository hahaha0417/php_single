<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Index\Index_Controller as Frontend_Index_Index_Controller;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('')
//     ->namespace('\App\Http\Controllers\Frontend\Index')
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

Route::prefix('')
    ->middleware([
        // '',
    ])->group(function () {
    Route::get('/', [Frontend_Index_Index_Controller::class, "Index"]);
    Route::get('/login', [Frontend_Index_Index_Controller::class, "Login"]);
    Route::get('/about', [Frontend_Index_Index_Controller::class, "About"]);
    // -----------------------------------------------------

});
