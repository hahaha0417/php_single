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

class backup implements ShouldQueue
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
            //
            $file_name_exe_mysqldump = \hahaha\env::EXE_MYSQLDUMP;
            $file_name_exe_mysql = \hahaha\env::EXE_MYSQL;
            $file_name_exe_7_zip = \hahaha\env::EXE_7_ZIP;

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
                define_key::STATE => "匯出SQL",
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
            $exe_mysqldump = \hahahalib\command\mysqldump::Instance()->Initial($file_name_exe_mysqldump, 
                $host,
                $port,
                $user,
                $password
            );

            if(file_exists($file_name))
            {
                unlink($file_name);
            }

            $exe_mysqldump->Export($database, 
                $file_name
            );
            echo "匯出成功\n";
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "打包壓縮檔",
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

            $items = &$this->Job_[define_key::ITEMS];
        
            if(file_exists($file_name_zip))
            {
                unlink($file_name_zip);
            }

            $_7_zip->Zip($file_name_zip,
                $items
            );
            echo "壓縮成功\n";
            if(file_exists($file_name))
            {
                unlink($file_name);
            }
            // ---------------------------------------------------------
            $lock->Lock();

            $file_name_backup_backup_state = $dir_backup . "/backup/{$this->Job_[define_key::NAME]}/" . "state.json";
            
            $state = json_decode(file_get_contents($file_name_backup_backup_state), true);
            
            $state = [
                define_key::NAME => $this->Job_[define_key::NAME],
                define_key::ACTION => $this->Job_[define_key::ACTION],
                define_key::STATE => "備份成功",
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

            echo "備份成功\n";

            $lock->Un_Lock();
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
