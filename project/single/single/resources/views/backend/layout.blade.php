<!doctype html>
<html lang="zh-Hant">
    <head>
        

        <?php \hahaha\view\layout\backend\layout::instance()->view_meta(); ?>

        <?php \hahaha\view\layout\backend\layout::instance()->view_css(); ?>
        <?php \hahaha\view\layout\backend\layout::instance()->view_js(); ?>
        
    </head>
    <body class="bg-dark text-light">
        <?php \hahaha\view\component\backend\nav::instance()->view(); ?>

        
        
        <!-- Hero -->
        @yield('content')

        <?php \hahaha\view\component\backend\footer::instance()->view(); ?>
        
        
        <?php \hahaha\view\layout\backend\layout::instance()->view_js_page(); ?>
    </body>
</html>