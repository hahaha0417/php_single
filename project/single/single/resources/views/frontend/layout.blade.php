<!doctype html>
<html lang="zh-Hant">
    <head>
        

        <?php \hahaha\view\layout\frontend\layout::instance()->view_meta(); ?>

        <?php \hahaha\view\layout\frontend\layout::instance()->view_css(); ?>
        <?php \hahaha\view\layout\frontend\layout::instance()->view_js(); ?>
    </head>
    <body class="bg-dark text-light">
        <?php \hahaha\view\component\frontend\nav::instance()->view(); ?>
        
        <!-- Hero -->
        @yield('content')

        <?php \hahaha\view\component\frontend\footer::instance()->view(); ?>
        
        
        <?php \hahaha\view\layout\frontend\layout::instance()->view_js_page(); ?>
    </body>
</html>