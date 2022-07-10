<?php

namespace hahaha\config;

use hahaha\env;

/*
use hahaha\config\database as database;
use hahaha\config\database as config_database;
*/

/*
資料庫
*/
class database
{
    use \hahaha\instance;

    public $host = null;
    public $port = null;
    public $name = null;
    public $user = null;
    public $password = null;
    public $charset = null;
    

    public function initial()
    {
        $this->host = env::DATABASE_HOST;
        $this->port = env::DATABASE_PORT;
        $this->name = env::DATABASE_NAME;
        $this->user = env::DATABASE_USER;
        $this->password = env::DATABASE_PASSWORD;
        $this->charset = env::DATABASE_CHARSET;
        
        return $this;
    }

    public function initial_pdo(
        $host,
        $port,
        $name,
        $user,
        $password,
        $charset 
    )
    {
        $this->host = $host;
        $this->port = $port;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
        $this->charset = $charset;

        return $this;
    }
} 