<?php

namespace hahaha\config;

use hahaha\env;

/*

use hahaha\config\application as application;
use hahaha\config\application as config_application;
use hahaha\config\application as hahaha_config_application;

*/

class application
{
    use \hahaha\instance;

   
    public function initial()
    {
        // --------------------------------------------------- 
        // 主要
        // --------------------------------------------------- 
        // 維修
        $this->maintain = env::MAINTAIN;
        // 紀錄
        $this->log = env::LOG;
        // 除錯
        $this->debug = env::DEBUG;
        // 版本
        $this->version = env::VERSION;
        // 線上
        $this->online = env::ONLINE;
        //
        $this->time = time();
        // --------------------------------------------------- 
        
        return $this;
    }
}