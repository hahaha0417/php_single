<?php

namespace App\Http\Controllers\Frontend\Index;

class Index_Controller extends \hahaha\base_ontroller
{
    public function Index()
    {
        $parameter = \hahaha\parameter::instance();

        $parameter->page = new \StdClass;
        $parameter->page->title = "hahaha官網";

        $file_name = public_path("../../../../public/[前端]_首頁.html"); // 存到 public
        $view = view('frontend.index.index', [
            'parameter' => $parameter,
        ])->render(); 

        $this->hahaha($view, $file_name);

        

        return $view;
    }

    public function Login()
    {
        $parameter = \hahaha\parameter::instance();

        $parameter->page = new \StdClass;
        $parameter->page->title = "hahaha官網";

        $file_name = public_path("../../../../public/[前端]_登入.html"); // 存到 public
        $view = view('frontend.index.login', [
            'parameter' => $parameter,
        ])->render(); 

        $this->hahaha($view, $file_name);

        

        return $view;
    }

    public function About()
    {
        $parameter = \hahaha\parameter::instance();

        $parameter->page = new \StdClass;
        $parameter->page->title = "hahaha官網";

        $file_name = public_path("../../../../public/[前端]_關於哈哥.html"); // 存到 public
        $view = view('frontend.index.about', [
            'parameter' => $parameter,
        ])->render(); 

        $this->hahaha($view, $file_name);

        

        return $view;
    }
}
