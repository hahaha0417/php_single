<?php

namespace hahaha\view\layout\frontend;

use hahaha\function_base as hahaha_function_base;
use hahaha\parameter\parameter as parameter;
use hahaha\view\block_header as view_block_header;
use hahaha\view\block_footer as view_block_footer;
/*

use hahaha\view\layout as layout;
use hahaha\view\layout as view_layout;

 */

class layout
{
    use \hahaha\instance;

    public function initial() 
    {
        return $this;
        
    }
    // -----------------------------------------
    //  base
    // -----------------------------------------
    public function view($content)
    {
        $parameter = \hahaha\parameter::instance();

        ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
        <?php $this->view_meta();?>
        <!-- css -->
        <?php $this->view_css();?>
        <!-- js -->
        <?php $this->view_js();?>
        <title>
            <?php echo $parameter->page->title; ?>
        </title>
    </head>
    <body>
        <!-- --------------------------------- -->
        <?php $this->view_begin();?>
        <?php $content->view_begin();?>
        <!-- --------------------------------- -->
        <?php $this->view_design();?>
        <?php $content->view_design();?>
        <!-- --------------------------------- -->
        <?php $content->content(); ?>
        <!-- --------------------------------- -->
        <?php $this->view_end();?>
        <?php $content->view_end();?>
        <!-- --------------------------------- -->
    </body>
</html>
        <?php
}

    // -----------------------------------------
    //
    // -----------------------------------------

    // -----------------------------------------
    //
    // -----------------------------------------
    // meta
    public function view_meta()
    {
        $parameter = \hahaha\parameter::instance();
        $hahaha_function_base = hahaha_function_base::instance();
?>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $parameter->page->title; ?></title>

<?php
    }

    // css
    public function view_css()
    {
        $hahaha_function_base = hahaha_function_base::instance();

        echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('bootstrap/dist/css/bootstrap.css'));
        echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('sweetalert2/dist/sweetalert2.css'));

        // echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('font-awesome/css/font-awesome.css'));
?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<?php
        echo $hahaha_function_base->Css($hahaha_function_base->Url_Asset('frontend/css/base.css'));
        echo $hahaha_function_base->Css($hahaha_function_base->Url_Asset('frontend/css/custom.css'));
        echo $hahaha_function_base->Css($hahaha_function_base->Url_Asset('frontend/css/hahaha.css'));
    }

    // js
    public function view_js()
    {
        $hahaha_function_base = hahaha_function_base::instance();

        echo $hahaha_function_base->Js($hahaha_function_base->Url_Plugin('jquery/dist/jquery.js'));
        echo $hahaha_function_base->Js($hahaha_function_base->Url_Plugin('bootstrap/dist/js/bootstrap.bundle.js'));
        echo $hahaha_function_base->Js($hahaha_function_base->Url_Plugin('sweetalert2/dist/sweetalert2.js'));



        // echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('font-awesome\js\font-awesome.js'));
    }

    public function view_js_page()
    {
        $hahaha_function_base = hahaha_function_base::instance();






        echo $hahaha_function_base->Js($hahaha_function_base->Url_Asset('frontend/js/base.js'));
        echo $hahaha_function_base->Js($hahaha_function_base->Url_Asset('frontend/js/custom.js'));
        echo $hahaha_function_base->Js($hahaha_function_base->Url_Asset('frontend/js/hahaha.js'));

        // echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('font-awesome\js\font-awesome.js'));
    }


    // -----------------------------------------
    //
    // -----------------------------------------
    // 開始
    public function view_begin()
    {
        // $view_block_header = view_block_header::instance()->initial();
        
        // $view_block_header->view();
        
        ?>
<script>
    // $( document ).ready(function() {
    //     Swal.fire(
    //         'The Internet?',
    //         'That thing is still around?',
    //         'question'
    //     )
    // });
</script>
        <?php
}

    // 設計
    public function view_design()
    {
        
        
        ?>

        <?php
}

    // 結束
    public function view_end()
    {
        // $view_block_footer = view_block_footer::instance()->initial();
        
        // $view_block_footer->view();
        
        
        ?>

        <?php
}
    // -----------------------------------------
    //
    // -----------------------------------------

    // -----------------------------------------
    //
    // -----------------------------------------
}