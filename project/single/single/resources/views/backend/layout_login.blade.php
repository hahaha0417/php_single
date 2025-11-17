<!doctype html>
<html lang="zh-Hant">
    <head>
        

        <?php \hahaha\view\layout\backend\layout::instance()->view_meta(); ?>

        <?php \hahaha\view\layout\backend\layout::instance()->view_css(); ?>
        <?php \hahaha\view\layout\backend\layout::instance()->view_js(); ?>
        
        <style>
            body {
                height: 100vh;
                margin: 0;

                /* ⭐⭐⭐ 讓整個畫面置中 */
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body class="bg-dark text-light">

        <!-- Hero -->
        @yield('content')

        <?php \hahaha\view\component\backend\footer::instance()->view(); ?>
        
        
        <?php \hahaha\view\layout\backend\layout::instance()->view_js_page(); ?>

        
    </body>
</html>