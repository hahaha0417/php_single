<?php

namespace hahaha\package\backup\base\job;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use hahaha\package\backup\base\define\key as define_key;
use hahaha\package\backup\base\env\env as define_env;
use hahaha\package\backup\base\config\backup as config_backup;
use Carbon\Carbon;
use hahahalib\pdo as pdo;

class restore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $Job_;

    // public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(&$job)
    {
        $this->Job_ = $job;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try
        {
            $dir_backup = FILE_PUBLIC . "/backup/base"; // 存到 public

            if(!is_dir($dir_backup))
            {
                mkdir($dir_backup, 0755, true);
            }

            $file = \hahahalib\file::Instance();
            // ---------------------------------------------------------
            $file_name = str_replace("\\", "/", $dir_backup) . '/backup/' . $this->Job_[define_key::NAME] . "/" . "backup" . '.sql';

            // 確保目錄存在
            if (!is_dir(dirname($file_name))) {
                mkdir(dirname($file_name), 0777, true);
            } 

            // ---------------------------------------------------------
            
            $host = \hahaha\env::DATABASE_HOST;
            $port = \hahaha\env::DATABASE_PORT; 
            $user = \hahaha\env::DATABASE_USER; 
            $password = \hahaha\env::DATABASE_PASSWORD;
            $database = \hahaha\env::DATABASE_NAME_BACKUP_TW;
            $database_temp = \hahaha\env::DATABASE_NAME_BACKUP_TW_TEMP;
            //
            $file_name_exe_mysqldump = \hahaha\env::EXE_MYSQLDUMP;
            $file_name_exe_mysql = \hahaha\env::EXE_MYSQL;
            $file_name_exe_7_zip = \hahaha\env::EXE_7_ZIP;
            $file_name_artisan_single = \hahaha\env::ARTISAN_SINGLE;
            // ---------------------------------------------------------


            $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
            $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
                $retry_time = 500000
            );
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "初始化",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
            

            $lock->Un_Lock();

            // ---------------------------------------------------------
            
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "解壓縮檔",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
            
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // --------------------------------------------------------- 
            
            
            $_7_zip = \hahahalib\command\_7_zip::Instance()->Initial($file_name_exe_7_zip);

            $file_name_zip = str_replace("\\", "/", $dir_backup) . '/backup/' . $this->Job_[define_key::NAME] . "/" . "backup" . '.zip';

            // 確保目錄存在
            if (!is_dir(dirname($file_name_zip))) {
                mkdir(dirname($file_name_zip), 0777, true);
            } 

            $dir_temp = str_replace("\\", "/", $dir_backup) . '/backup/' . $this->Job_[define_key::NAME] . "/" . "temp";

            



            $items = &$this->Job_[define_key::ITEMS];
        
            if(file_exists($file_name))
            {
                unlink($file_name);
            }

            if(is_dir($dir_temp))
            {
                // 可能有git，清除唯讀
                exec("rmdir /s /q \"{$dir_temp}\"");
              
            }

            // 確保目錄存在
            if (!is_dir($dir_temp)) {
                mkdir($dir_temp, 0777, true);
            } 

            $_7_zip->Un_Zip($file_name_zip,
                $dir_temp
            );
            echo "解壓縮成功\n";

            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "建立暫存資料庫",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // ---------------------------------------------------------
            $pdo = pdo::instance()->Initial();
            $database = "table_tw_temp";
            
            if($pdo->Is_Database($database_temp)) 
            {
                $pdo->Drop_Database($database_temp);
            }

            if(!$pdo->Is_Database($database_temp)) 
            {
                $pdo->Create_Database($database_temp);
            }
            echo "建立暫存資料庫\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "匯入暫存資料庫",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // ---------------------------------------------------------
            $file_name = str_replace("\\", "/", $dir_backup) . '/backup/' . $this->Job_[define_key::NAME] . "/temp/" . "backup" . '.sql';


            $exe_mysql = \hahahalib\command\mysql::Instance()->Initial($file_name_exe_mysql, 
                $host,
                $port,
                $user,
                $password
            );

            $exe_mysql->Import($database_temp, 
                $file_name
            );
            echo "匯入暫存資料庫\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "建立資料庫",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // ---------------------------------------------------------
            $pdo = pdo::instance();
            if($pdo->Is_Database($database)) 
            {
                $pdo->Drop_Database($database);
            }

            if(!$pdo->Is_Database($database)) 
            {
                $pdo->Create_Database($database);
            }
            echo "建立資料庫\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "解除外鍵",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // ---------------------------------------------------------
            $exe_migrate = \hahahalib\command\migrate::Instance()->Initial($file_name_artisan_single);

            $file_name = "database/migrations/9999_01_01_000000_foreign_key_table.php";
            $exe_migrate->Rollback($database_temp, 
                $file_name
            );
            echo "解除外鍵\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "移動資料表",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $lock->Un_Lock();
            // ---------------------------------------------------------
            $pdo = pdo::instance();
            $result = [];
            $pdo->Get_Tables($database, $result);

            foreach($result as $key => &$item) {
                $pdo->Alter_Table("{$database}.{$result[$key]}","{$database_temp}.{$result[$key]}");
            }

            echo "移動資料表\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "還原外鍵",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $lock->Un_Lock();
            // ---------------------------------------------------------
            $exe_migrate = \hahahalib\command\migrate::Instance()->Initial($file_name_artisan_single);

            $file_name = "database/migrations/9999_01_01_000000_foreign_key_table.php";
            $exe_migrate->Migrate($database, 
                $file_name
            );

            echo "還原外鍵\n";
            // --------------------------------------------------------- 
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "刪除暫存資料庫",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // ---------------------------------------------------------
            $pdo = pdo::instance();
            if($pdo->Is_Database($database_temp)) 
            {
                $pdo->Drop_Database($database_temp);
            }

            echo "刪除暫存資料庫\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "檔案複製",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
         
            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $lock->Un_Lock();
            // ---------------------------------------------------------
            $items = &$this->Job_[define_key::ITEMS];

            $dir_temp = str_replace("\\", "/", $dir_backup) . '/backup/' . $this->Job_[define_key::NAME] . "/" . "temp";

            foreach($items as $key => &$item)
            {
                
                if(is_dir($items[$key]))
                {
                    if(is_dir($items[$key]))
                    {
                        $dir = $dir_temp . "/" . $key;
                        exec("rmdir /s /q \"{$items[$key]}\"");
                        exec("move \"{$dir}\" \"{$items[$key]}\"");
                    }
                    
                } 
                else if(file_exists($items[$key])) 
                {
                    if(file_exists($items[$key])) 
                    {
                        unlink($items[$key]);
                        exec("move \"{$items[$key]}\" \"{$items[$key]}\"");
                    }
                    
                }
                else
                {

                }
                
            }

            if(is_dir($dir_temp))
            {
                exec("rmdir /s /q \"{$dir_temp}\"");
            } 

            echo "檔案複製\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "還原成功",
                define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                define_key::ERROR => "無",
                define_key::MESSAGE => "無",
            ];

            file_put_contents(
                $file_name_backup_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );

            $file_name_backup_state = $dir_backup . "/" . "state.json";
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    $state,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );


            $file_name_backup_queue = $dir_backup . "/" . "queue.json";
            if(file_exists($file_name_backup_queue))
            {
                $queue = json_decode(file_get_contents($file_name_backup_queue), true);
                array_shift($queue);
            }
            
            file_put_contents(
                $file_name_backup_queue,
                json_encode(
                    $queue,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );



            echo "還原成功\n";

            $lock->Un_Lock();
            // ---------------------------------------------------------
            // ---------------------------------------------------------
            // ---------------------------------------------------------
            // ---------------------------------------------------------
            

            // ---------------------------------------------------------
           
            // ---------------------------------------------------------
            // ---------------------------------------------------------
            // ---------------------------------------------------------

            // ---------------------------------------------------------
            //
        }
        catch(\Exception $exception)
        {
            echo "{$exception->getMessage()}\n";
            throw new \Exception($exception->getMessage());
        }
    }

    // ⭐ 所有 retry 都失敗後才會呼叫這裡
    public function failed(\Throwable $exception)
    {
        $dir_backup = FILE_PUBLIC . "/backup/base"; // 存到 public

        if(!is_dir($dir_backup))
        {
            mkdir($dir_backup, 0755, true);
        }

        $file = \hahahalib\file::Instance();
        // ---------------------------------------------------------
        $file_name = str_replace("\\", "/", $dir_backup) . '/backup/' . $this->Job_[define_key::NAME] . "/" . "backup" . '.sql';

        // 確保目錄存在
        if (!is_dir(dirname($file_name))) {
            mkdir(dirname($file_name), 0777, true);
        } 

        // ---------------------------------------------------------
        


        // ---------------------------------------------------------


        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        // ---------------------------------------------------------
        $lock->Lock();

        $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        if(file_exists($file_name_backup_queue))
        {
            $queue = json_decode(file_get_contents($file_name_backup_queue), true);
            array_shift($queue);
        }
        
        file_put_contents(
            $file_name_backup_queue,
            json_encode(
                $queue,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            )

        );

        $lock->Un_Lock();
    }
}
