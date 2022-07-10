<?php

namespace hahaha\config\product;

use hahaha\env;

/*

use hahaha\config\product\item as item;
use hahaha\config\product\item as product_item;
use hahaha\config\product\item as hahaha_product_item;

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