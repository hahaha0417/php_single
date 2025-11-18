<?php

namespace hahaha\package\backup\base\config;


/*

use hahaha\package\backup\base\config\backup as config_backup;
use hahaha\package\backup\base\config\backup as base_config_backup;
use hahaha\package\backup\base\config\backup as backup_base_config_backup;

*/

use hahaha\package\backup\base\define\key as define_key;

class backup
{
    use \hahahalib\Instance;

    public $backup;

	public function Initial()
    {
        // --------------------------------------------------- 
        // 主要
        // --------------------------------------------------- 
        $this->backup = [
            define_key::BACKUP => "備份",
            define_key::RESTORE => "還原",
        ];
        // --------------------------------------------------- 
        
        return $this;
    }


    // ---------------------------------------------- 

    // ---------------------------------------------- 
    // ---------------------------------------------- 
    // ---------------------------------------------- 
}



/*

// 其他附加---------------------------------------------------------- 

*/
