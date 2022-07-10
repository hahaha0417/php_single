<?php

use hahahalib\function_base as function_base;
use hahaha\define\key as define_key;

require __DIR__ . "/../../../../project/backend/backend/vendor/autoload.php";

// 統一寫在這，進行加鎖
// 不容易錯亂

// phpinfo();

// --------------------------------------------------------------------------
// hahaha 初始化
// --------------------------------------------------------------------------
hahaha\application::instance()
    ->initial()
    ->initial_web();
// --------------------------------------------------------------------------
// 
// --------------------------------------------------------------------------

$function_base = function_base::Instance();

try 
{

if($function_base->Is_Post()) 
{
    // ------------------------------------------------- 
    // 基本
    // ------------------------------------------------- 
    // 取得數據
    if($_POST[define_key::TYPE] == define_key::GET)
    {

    }
    // 新增
    else if($_POST[define_key::TYPE] == define_key::ADD)
    {

    }
    // 更新
    else if($_POST[define_key::TYPE] == define_key::UPDATE)
    {

    }
    // 刪除
    else if($_POST[define_key::TYPE] == define_key::DELETE)
    {

    }
    // 上傳
    else if($_POST[define_key::TYPE] == define_key::UPLOAD)
    {

    }
    else 
    {

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

    }
    // 新增
    else if($_GET[define_key::TYPE] == define_key::ADD)
    {

    }
    // 更新
    else if($_GET[define_key::TYPE] == define_key::UPDATE)
    {

    }
    // 刪除
    else if($_GET[define_key::TYPE] == define_key::DELETE)
    {

    }
    // 上傳
    else if($_GET[define_key::TYPE] == define_key::UPLOAD)
    {

    }
    else 
    {

    }
}
else 
{

}


} 
catch (\Exception $e) 
{
    echo json_encode([
            define_key::MESSAGE => $e->getMessage(), 
            define_key::CODE => $e->getCode(),
         
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    );
}