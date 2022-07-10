<?php

namespace hahaha;

use hahahalib\pdo as pdo;
use hahaha\config\application as config_application;
use hahaha\config\database as config_database;
use hahaha\define\common\common as define_common_common;

/* 

use hahaha\application as application;
use hahaha\application as hahaha_application;

*/

/* 

函式庫引入

*/
class application
{
    use \hahaha\instance;

    public function initial()
    {
        // 必要初始化
        config_application::instance()->initial();
        config_database::instance()->initial();

        //
        $root = realpath(__DIR__  . "../..");
        
        define("ROOT", $root);

        define("URL_PUBLIC", "/");
        define("FILE_PUBLIC", "{$root}/public" );

        define("URL_PUBLIC_FRONTEND", "/public_frontend");
        define("URL_PUBLIC_BACKEND", "/public_backend");
        // define("URL_PUBLIC_API", "/public_api");
        // define("URL_PUBLIC_MIGRATE", "/public_migrate");
        // define("URL_PUBLIC_HAHAHA", "/public_hahaha");
        
        define("FILE_PUBLIC_FRONTEND", "{$root}/public/public_frontend" );
        define("FILE_PUBLIC_BACKEND", "{$root}/public/public_backend" );
        // define("FILE_PUBLIC_API", "{$root}/public/public_api" );
        // define("FILE_PUBLIC_MIGRATE", "{$root}/public/public_migrate" );
        // define("FILE_PUBLIC_HAHAHA", "{$root}/public/public_hahaha" );

        define("PROJECT_FRONTEND", "{$root}/project/frontend/frontend" );
        define("PROJECT_BACKEND", "{$root}/project/backend/backend" );
        // define("PROJECT_API", "{$root}/project/api/api" );
        // define("PROJECT_MIGRATE", "{$root}/project/migrate/migrate" );
        // define("PROJECT_HAHAHA", "{$root}/project/hahaha/hahaha" );


        return $this;  

    }

    
    // ----------------------------------------------------------------------


    public function initial_web()
    {
        // 網站
        pdo::instance()->initial();
        return $this;

    }

    public function initial_console()
    {
        // 主控台
        // 不一定連db，所以不預先初始化
        return $this;

    }

    // ----------------------------------------------------------------------


}