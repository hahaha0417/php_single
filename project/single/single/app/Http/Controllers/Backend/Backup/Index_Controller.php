<?php

namespace App\Http\Controllers\Backend\Backup;

class Index_Controller extends \hahaha\base_ontroller
{
    public function Index()
    {
        $parameter = \hahaha\parameter::instance();

        $parameter->page = new \StdClass;
        $parameter->page->title = "hahaha官網 - 後台 - 備份";
      
        $file_name = public_path("../../../../public/[後端]_備份頁.html"); // 存到 public
        $view = view('backend.backup.index', [
            'parameter' => $parameter,
        ])->render(); 

        $this->hahaha($view, $file_name);

        

        return $view;
    }

    
    // ----------------------------------------------------------- 
    // 
    // ----------------------------------------------------------- 





}
