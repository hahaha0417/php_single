<?php


namespace hahaha;



class env
{
    // --------------------------------------------------- 
    // 主要
    // --------------------------------------------------- 
    // 維修
	const MAINTAIN = false;
    // 紀錄
    const LOG = false;
    // 除錯
    const DEBUG = false;
    // 版本
    const VERSION = "1.0.0";
    // 線上
    const ONLINE = false;
    // --------------------------------------------------- 

    // --------------------------------------------------- 
    // Database
    // --------------------------------------------------- 
    const DATABASE_HOST = "127.0.0.1";
    const DATABASE_PORT = "3306";
    const DATABASE_NAME = "single";
    const DATABASE_USER = "hahaha";
    const DATABASE_PASSWORD = "hahaha";
    const DATABASE_CHARSET = "utf8mb4";
    // --------------------------------------------------- 
    const DATABASE_NAME_BACKUP_TW = "table_tw";
    const DATABASE_NAME_BACKUP_TW_TEMP = "table_tw_temp";

    // --------------------------------------------------- 
    // --------------------------------------------------- 
    // --------------------------------------------------- 
    // 主要
    // --------------------------------------------------- 
    // MIGRATE TYPE
    // "big_data"
    // "demo"
    // "migrate"
    // "publish"
    const MIGRATE_TYPE = "demo";

    // --------------------------------------------------- 

    // --------------------------------------------------- 
    const TABLE_PAGE = 1;
    const TABLE_COUNT = 30;
    const PAGINATION_COUNT = 10;

    // --------------------------------------------------- 
    const ROOT_SINGLE = "D:/web/web/hahaha_single/public";
    // --------------------------------------------------- 
    const EXE_MYSQLDUMP = "D:/web/xampp/mysql/bin/mysqldump.exe";
    const EXE_MYSQL = "D:/web/xampp/mysql/bin/mysql.exe";
    const ARTISAN_SINGLE = "D:/web/web/hahaha_single/project/single/single/artisan";
    const EXE_7_ZIP = "C:/Program Files/7-Zip/7z.exe";
    // --------------------------------------------------- 

    // --------------------------------------------------- 

    // --------------------------------------------------- 

    // --------------------------------------------------- 
}