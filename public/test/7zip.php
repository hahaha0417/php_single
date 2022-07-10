<?php

use hahahalib\function_base as function_base;
use hahaha\define\key as define_key;
use hahaha\api\api\table as api_table;
use hahaha\define\backend\api as backend_api;
// use hahaha\config\table as config_table;


require __DIR__ . "/../../project/single/single/vendor/autoload.php";

// 統一寫在這，進行加鎖
// 不容易錯亂

// phpinfo();

// --------------------------------------------------------------------------
// hahaha 初始化
// --------------------------------------------------------------------------
hahaha\application::instance()
    ->initial()
    ->initial_web();
// config_table::instance()
//     ->initial();
// --------------------------------------------------------------------------
// 
// --------------------------------------------------------------------------

$result = [];
$function_base = function_base::Instance();

$exe = "C:\\Program Files\\7-Zip\\7z.exe";
$_7zip = \hahahalib\_7zip::Instance()->Initial_7zip($exe);

$archive_file = "D:\\Desktop\\ttt\\xxxx.zip";
$list = [
    "D:\\Desktop\\ttt\\xampp",
    "D:\\Desktop\\ttt\\bash.sh",
    "D:\\Desktop\\ttt\\xxx.zip",
];
$_7zip->Archive($archive_file, $list);