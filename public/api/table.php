<?php

use hahahalib\function_base as function_base;
use hahaha\define\key as define_key;
use hahaha\api\api\table as api_table;
use hahaha\define\backend\api as backend_api;
use hahaha\config\table as config_table;


require __DIR__ . "/../../../project/backend/backend/vendor/autoload.php";

// 統一寫在這，進行加鎖
// 不容易錯亂

// phpinfo();

// --------------------------------------------------------------------------
// hahaha 初始化
// --------------------------------------------------------------------------
hahaha\application::instance()
    ->initial()
    ->initial_web();
config_table::instance()
    ->initial();
// --------------------------------------------------------------------------
// 
// --------------------------------------------------------------------------

$result = [];
$function_base = function_base::Instance();

try {

if($function_base->Is_Post()) 
{
    // ------------------------------------------------- 
    // 基本
    // ------------------------------------------------- 
    // 取得數據
    if($_POST[define_key::TYPE] == define_key::GET) 
    {
        api_table::instance()->get($_POST, $result);
    }
    // 新增
    else if($_POST[define_key::TYPE] == define_key::ADD)
    {
        api_table::instance()->add($_POST, $result);
    }
    // 更新
    else if($_POST[define_key::TYPE] == define_key::UPDATE)
    {
        api_table::instance()->update($_POST, $result);
    }
    // 刪除
    else if($_POST[define_key::TYPE] == define_key::DELETE)
    {
        api_table::instance()->delete($_POST, $result);
    }
    // 上傳
    else if($_POST[define_key::TYPE] == define_key::UPLOAD)
    {
        api_table::instance()->upload($_POST, $result);
    }
    else 
    {
        api_table::instance()->none($_POST, $result);
    }
}
else if($function_base->Is_Get()) 
{
    // ------------------------------------------------- 
    // 基本
    // ------------------------------------------------- 
    // 取得數據
    if($_GET[define_key::TYPE] == define_key::GET)
    {
        $rrr = 0;
    }
    // 新增
    else if($_GET[define_key::TYPE] == define_key::ADD)
    {
        $rrr = 0;
    }
    // 更新
    else if($_GET[define_key::TYPE] == define_key::UPDATE)
    {
        $rrr = 0;
    }
    // 刪除
    else if($_GET[define_key::TYPE] == define_key::DELETE)
    {
        $rrr = 0;
    }
    // 上傳
    else if($_GET[define_key::TYPE] == define_key::UPLOAD)
    {
        $rrr = 0;
    }
    else 
    {
        $rrr = 0;
    }
}
else 
{
    $rrr = 0;
}

} catch (\Exception $e) {
    echo json_encode([
        define_key::MESSAGE => $e->getMessage(), 
        define_key::CODE => $e->getCode(),
     
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);
}