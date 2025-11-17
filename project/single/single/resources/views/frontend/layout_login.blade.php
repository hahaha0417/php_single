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
    <body class="bg-dark text-light" style="height: 100vh; margin: 0;">

        
        <!-- Hero -->
        @yield('content')


        
        <?php \hahaha\view\layout\backend\layout::instance()->view_js_page(); ?>

        <footer class="bg-dark text-light py-3 fixed-bottom">
            <div class="container d-flex justify-content-between align-items-center">
                <span>© 2025 hahaha Company</span>

                <div>
                    <a href="#" class="text-light me-3 text-decoration-none">隱私權</a>
                    <a href="#" class="text-light me-3 text-decoration-none">使用條款</a>

                    <a href="#" class="text-light me-2">
                        <i class="fa-brands fa-facebook fs-5"></i>
                    </a>
                    <a href="#" class="text-light me-2">
                        <i class="fa-brands fa-instagram fs-5"></i>
                    </a>
                    <a href="#" class="text-light">
                        <i class="fa-brands fa-youtube fs-5"></i>
                    </a>
                </div>
            </div>
        </footer>

        
    </body>
</html>