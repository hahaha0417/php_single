<?php

namespace App\Http\Controllers\Backend\Backup\Base;

use hahaha\package\backup\base\define\key as define_key;
use hahaha\package\backup\base\define\statement as define_statement;
use hahaha\package\backup\base\env\env as define_env;
use hahaha\package\backup\base\config\backup as config_backup;
use Carbon\Carbon;

class Index_Controller extends \hahaha\base_ontroller
{
    public function Index()
    {
        $parameter = \hahaha\parameter::instance();
        $config_backup = config_backup::Instance()->Initial();

        $parameter->page = new \StdClass;
        $parameter->page->title = "hahaha官網 - 後台 - 備份";


        $dir_backup = FILE_PUBLIC . "/backup/base"; // 存到 public

        if(!is_dir($dir_backup))
        {
            mkdir($dir_backup, 0755, true);
        }

        $file = \hahahalib\file::Instance();

        $result = [];
        $dir_backup_backup = $dir_backup . "/backup";
        $file->Get_Directory_All($dir_backup_backup, $result, false);

        foreach($result as $key => &$item)
        {
            $result[$key] = basename($result[$key]);
        }

        // ---------------------------------------------------------
        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        // ---------------------------------------------------------
        $lock->Lock();
        foreach($result as $key => &$item)
        {
            $file_name_backup_state = $dir_backup . "/backup/{$result[$key]}/" . "state.json";
            $state = json_decode(file_get_contents($file_name_backup_state), true);

            $result[$key] = &$state;

            unset($state);
        }
        $lock->Un_Lock();



        $parameter->backup_list = $result;
        $config_backup->backup["無"] = "無";
        $parameter->config_backup = $config_backup->backup;


        $lock->Lock();
        $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        if(!file_exists($file_name_backup_queue))
        {
            file_put_contents(
                $file_name_backup_queue,
                json_encode(
                    [
                        // "hahaha" => [
                        //     define_key::NAME => "hahaha",
                        // ],
                    ],
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
        }
        $queue = json_decode(file_get_contents($file_name_backup_queue), true);
        $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------
        $lock->Lock();
        $file_name_backup_state = $dir_backup . "/" . "state.json";
        if(!file_exists($file_name_backup_state))
        {
            file_put_contents(
                $file_name_backup_state,
                json_encode(
                    [
                        define_key::NAME => "無",
                        define_key::ACTION => "無",
                        define_key::STATE => "無",
                        // define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
                        define_key::DATE => "無",
                        define_key::ERROR => "無",
                        define_key::MESSAGE => "無",
                    ],
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES
                )

            );
        }
        $state = json_decode(file_get_contents($file_name_backup_state), true);
        $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------

        // $lock->Lock();
        // $name = "hahaha";
        // if(!is_dir($dir_backup . "/backup/{$name}"))
        // {
        //     mkdir($dir_backup . "/backup/{$name}", 0755, true);
        // }
        // $file_name_backup_state = $dir_backup . "/backup/{$name}/" . "state.json";
        // if(!file_exists($file_name_backup_state))
        // {
        //     file_put_contents(
        //         $file_name_backup_state,
        //         json_encode(
        //             [
        //                 define_key::NAME => "無",
        //                 define_key::ACTION => "無",
        //                 define_key::STATE => "無",
        //                 // define_key::DATE => Carbon::now()->format('Y-m-d H:i:s'),
        //                 define_key::DATE => "無",
        //                 define_key::ERROR => "無",
        //                 define_key::MESSAGE => "無",
        //             ],
        //             JSON_PRETTY_PRINT |
        //             JSON_UNESCAPED_UNICODE |
        //             JSON_UNESCAPED_SLASHES
        //         )

        //     );
        // }
        // $state = json_decode(file_get_contents($file_name_backup_state), true);
        // $lock->Un_Lock();
        // ---------------------------------------------------------


        $parameter->state = &$state;
        $parameter->queue = &$queue;



        $file_name = public_path("../../../../public/[後端]_基本_備份頁.html"); // 存到 public
        $view = view('backend.backup.base.index', [
            'parameter' => $parameter,
        ])->render();

        $this->hahaha($view, $file_name);







        return $view;
    }


    // -----------------------------------------------------------
    //
    // -----------------------------------------------------------





}
