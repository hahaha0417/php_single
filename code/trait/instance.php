<?php

namespace hahaha;

trait instance
{
    public static $instance = null;

    public static function Instance() 
    {
        if(self::$instance == null) 
        {
            self::$instance = new self();

        }
        return self::$instance;
    }




}