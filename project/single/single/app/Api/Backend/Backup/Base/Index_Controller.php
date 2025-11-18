<?php

namespace App\Api\Backend\Backup\Base;

use hahaha\package\backup\base\define\key as define_key;
use hahaha\package\backup\base\define\statement as define_statement;
use hahaha\package\backup\base\define\api as define_api;
use hahaha\package\backup\base\env\env as define_env;

use Illuminate\Http\Request;


use Carbon\Carbon;

class Index_Controller extends \hahaha\base_controller_api
{
    public function Add(Request $request)
    {
        $post = $request->post();

        $data = [];

        $result = true;

        $name = $post[define_key::NAME];

        $dir_backup = public_path(define_env::BACKUP_DIR); // 存到 public

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
            $file_name = $result[$key];
            $result[$key] = [
                define_statement::FILE_NAME => $file_name,
                define_key::NAME => basename($file_name),
            ];
        }

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if($result[$key][define_key::NAME] == $name)
            {
                $is_exist = true;
                break;
            }

        }

        if($is_exist)
        {
            return json_encode([
                define_api::RESULT => define_api::FAILURE,
                define_api::MESSAGE => "已有項目",
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            );

        }

        // ---------------------------------------------------------

        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        // ---------------------------------------------------------


        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        // if(!file_exists($file_name_backup_queue))
        // {
        //     file_put_contents(
        //         $file_name_backup_queue,
        //         json_encode(
        //             [
        //                 // "hahaha" => [
        //                 //     define_key::NAME => "hahaha",
        //                 // ],
        //             ],
        //             JSON_PRETTY_PRINT |
        //             JSON_UNESCAPED_UNICODE |
        //             JSON_UNESCAPED_SLASHES
        //         )

        //     );
        // }
        // $queue = json_decode(file_get_contents($file_name_backup_queue), true);
        // $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_state = $dir_backup . "/" . "state.json";
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

        // ---------------------------------------------------------

        $lock->Lock();
        if(!is_dir($dir_backup . "/backup/{$name}"))
        {
            mkdir($dir_backup . "/backup/{$name}", 0755, true);
        }
        $file_name_backup_state = $dir_backup . "/backup/{$name}/" . "state.json";
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

        return json_encode([
            define_api::RESULT => define_api::SUCCESS,
            define_api::DATA => $data,
            define_api::MESSAGE => "新增成功",
        ], JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        // if($result)
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::SUCCESS,
        //         define_api::DATA => $data,
        //         define_api::MESSAGE => "新增成功",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );
        // }
        // else
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::FAILURE,
        //         define_api::MESSAGE => "新增失敗",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // }

    }

    public function Update(Request $request)
    {
        $post = $request->post();

        $data = [];

        $result = true;

        $name = $post[define_key::NAME];
        $name_new = $post[define_statement::NAME_NEW];

        $dir_backup = public_path(define_env::BACKUP_DIR); // 存到 public

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
            $file_name = $result[$key];
            $result[$key] = [
                define_statement::FILE_NAME => $file_name,
                define_key::NAME => basename($file_name),
            ];
        }

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if($result[$key][define_key::NAME] == $name)
            {
                $is_exist = true;
                break;
            }

        }

        if(!$is_exist)
        {
            return json_encode([
                define_api::RESULT => define_api::FAILURE,
                define_api::MESSAGE => "沒有項目",
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            );

        }

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if($result[$key][define_key::NAME] == $name_new)
            {
                $is_exist = true;
                break;
            }

        }

        // if($is_exist)
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::FAILURE,
        //         define_api::MESSAGE => "新項目重覆",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // }



        // ---------------------------------------------------------



        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        $lock->Lock();



        // 檢查queue
        $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        $queue = json_decode(file_get_contents($file_name_backup_queue), true);

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if(!empty($queue[$key]) && $queue[$key][define_key::NAME] == $name)
            {
                $is_exist = true;
                break;
            }

        }

        if($is_exist)
        {
            $lock->Un_Lock();
            return json_encode([
                define_api::RESULT => define_api::FAILURE,
                define_api::MESSAGE => "項目已在Queue",
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            );
        }

        // 不在queue

        // 檔案搬移
        rename($dir_backup . "/backup/{$name}",
            $dir_backup . "/backup/{$name_new}"
        );



        $lock->Un_Lock();
        // ---------------------------------------------------------


        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        // if(!file_exists($file_name_backup_queue))
        // {
        //     file_put_contents(
        //         $file_name_backup_queue,
        //         json_encode(
        //             [
        //                 // "hahaha" => [
        //                 //     define_key::NAME => "hahaha",
        //                 // ],
        //             ],
        //             JSON_PRETTY_PRINT |
        //             JSON_UNESCAPED_UNICODE |
        //             JSON_UNESCAPED_SLASHES
        //         )

        //     );
        // }
        // $queue = json_decode(file_get_contents($file_name_backup_queue), true);
        // $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_state = $dir_backup . "/" . "state.json";
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

        // ---------------------------------------------------------

        // $lock->Lock();
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

        return json_encode([
            define_api::RESULT => define_api::SUCCESS,
            define_api::DATA => $data,
            define_api::MESSAGE => "更新成功",
        ], JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        // if($result)
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::SUCCESS,
        //         define_api::DATA => $data,
        //         define_api::MESSAGE => "更新成功",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );
        // }
        // else
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::FAILURE,
        //         define_api::MESSAGE => "更新失敗",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // }
    }

    public function Delete(Request $request)
    {
        $post = $request->post();

        $data = [];

        $result = true;

        $name = $post[define_key::NAME];

        $dir_backup = public_path(define_env::BACKUP_DIR); // 存到 public

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
            $file_name = $result[$key];
            $result[$key] = [
                define_statement::FILE_NAME => $file_name,
                define_key::NAME => basename($file_name),
            ];
        }

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if($result[$key][define_key::NAME] == $name)
            {
                $is_exist = true;
                break;
            }

        }

        if(!$is_exist)
        {
            return json_encode([
                define_api::RESULT => define_api::FAILURE,
                define_api::MESSAGE => "沒有項目",
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            );

        }




        // ---------------------------------------------------------



        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        $lock->Lock();

        $file->Delete_Tree($dir_backup . "/backup/{$name}");


        $lock->Un_Lock();
        // ---------------------------------------------------------


        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        // if(!file_exists($file_name_backup_queue))
        // {
        //     file_put_contents(
        //         $file_name_backup_queue,
        //         json_encode(
        //             [
        //                 // "hahaha" => [
        //                 //     define_key::NAME => "hahaha",
        //                 // ],
        //             ],
        //             JSON_PRETTY_PRINT |
        //             JSON_UNESCAPED_UNICODE |
        //             JSON_UNESCAPED_SLASHES
        //         )

        //     );
        // }
        // $queue = json_decode(file_get_contents($file_name_backup_queue), true);
        // $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_state = $dir_backup . "/" . "state.json";
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

        // ---------------------------------------------------------

        // $lock->Lock();
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

        return json_encode([
            define_api::RESULT => define_api::SUCCESS,
            define_api::DATA => $data,
            define_api::MESSAGE => "刪除成功",
        ], JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        // if($result)
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::SUCCESS,
        //         define_api::DATA => $data,
        //         define_api::MESSAGE => "刪除成功",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );
        // }
        // else
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::FAILURE,
        //         define_api::MESSAGE => "刪除失敗",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // }
    }



    public function Backup(Request $request)
    {


        $post = $request->post();

        $data = [];

        $result = true;

        $name = $post[define_key::NAME];

        $dir_backup = public_path(define_env::BACKUP_DIR); // 存到 public

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
            $file_name = $result[$key];
            $result[$key] = [
                define_statement::FILE_NAME => $file_name,
                define_key::NAME => basename($file_name),
            ];
        }

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if($result[$key][define_key::NAME] == $name)
            {
                $is_exist = true;
                break;
            }

        }

        if(!$is_exist)
        {
            return json_encode([
                define_api::RESULT => define_api::FAILURE,
                define_api::MESSAGE => "沒有項目",
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            );

        }





        // ---------------------------------------------------------



        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        $lock->Lock();

        // 檢查queue
        $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        $queue = json_decode(file_get_contents($file_name_backup_queue), true);




        $queue[] = [
            define_key::NAME => $name,
            define_key::ACTION => define_key::BACKUP,
        ];

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
        // ---------------------------------------------------------


        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        // if(!file_exists($file_name_backup_queue))
        // {
        //     file_put_contents(
        //         $file_name_backup_queue,
        //         json_encode(
        //             [
        //                 [
        //                     define_key::NAME => "hahaha",
        //                     define_key::ACTION => define_key::BUTTON_BACKUP,
        //                 ],
        //             ],
        //             JSON_PRETTY_PRINT |
        //             JSON_UNESCAPED_UNICODE |
        //             JSON_UNESCAPED_SLASHES
        //         )

        //     );
        // }
        // $queue = json_decode(file_get_contents($file_name_backup_queue), true);
        // $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_state = $dir_backup . "/" . "state.json";
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

        // ---------------------------------------------------------

        // $lock->Lock();
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

        return json_encode([
            define_api::RESULT => define_api::SUCCESS,
            define_api::DATA => $data,
            define_api::MESSAGE => "備份成功",
        ], JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        // if($result)
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::SUCCESS,
        //         define_api::DATA => $data,
        //         define_api::MESSAGE => "備份成功",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );
        // }
        // else
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::FAILURE,
        //         define_api::MESSAGE => "備份失敗",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // }
    }

    public function Restore(Request $request)
    {
        $post = $request->post();

        $data = [];

        $result = true;

        $name = $post[define_key::NAME];

        $dir_backup = public_path(define_env::BACKUP_DIR); // 存到 public

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
            $file_name = $result[$key];
            $result[$key] = [
                define_statement::FILE_NAME => $file_name,
                define_key::NAME => basename($file_name),
            ];
        }

        $is_exist = false;
        foreach($result as $key => &$item)
        {
            if($result[$key][define_key::NAME] == $name)
            {
                $is_exist = true;
                break;
            }

        }

        if(!$is_exist)
        {
            return json_encode([
                define_api::RESULT => define_api::FAILURE,
                define_api::MESSAGE => "沒有項目",
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            );

        }





        // ---------------------------------------------------------



        $file_name_backup_lock = $dir_backup . "/" . "hahaha.lock";
        $lock = \hahahalib\Lock::Instance()->Initial_Lock($file_name_backup_lock,
            $retry_time = 500000
        );
        $lock->Lock();

        // 檢查queue
        $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        $queue = json_decode(file_get_contents($file_name_backup_queue), true);




        $queue[] = [
            define_key::NAME => $name,
            define_key::ACTION => define_key::RESTORE,
        ];

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
        // ---------------------------------------------------------


        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_queue = $dir_backup . "/" . "queue.json";
        // if(!file_exists($file_name_backup_queue))
        // {
        //     file_put_contents(
        //         $file_name_backup_queue,
        //         json_encode(
        //             [
        //                 [
        //                     define_key::NAME => "hahaha",
        //                     define_key::ACTION => define_key::BUTTON_BACKUP,
        //                 ],
        //             ],
        //             JSON_PRETTY_PRINT |
        //             JSON_UNESCAPED_UNICODE |
        //             JSON_UNESCAPED_SLASHES
        //         )

        //     );
        // }
        // $queue = json_decode(file_get_contents($file_name_backup_queue), true);
        // $lock->Un_Lock();
        // ---------------------------------------------------------

        // ---------------------------------------------------------
        // $lock->Lock();
        // $file_name_backup_state = $dir_backup . "/" . "state.json";
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

        // ---------------------------------------------------------

        // $lock->Lock();
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

        return json_encode([
            define_api::RESULT => define_api::SUCCESS,
            define_api::DATA => $data,
            define_api::MESSAGE => "還原成功",
        ], JSON_PRETTY_PRINT |
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        // if($result)
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::SUCCESS,
        //         define_api::DATA => $data,
        //         define_api::MESSAGE => "還原成功",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );
        // }
        // else
        // {
        //     return json_encode([
        //         define_api::RESULT => define_api::FAILURE,
        //         define_api::MESSAGE => "還原失敗",
        //     ], JSON_PRETTY_PRINT |
        //         JSON_UNESCAPED_UNICODE |
        //         JSON_UNESCAPED_SLASHES
        //     );

        // }
    }


    // -----------------------------------------------------------
    //
    // -----------------------------------------------------------





}
