<?php

namespace hahaha\view\frontend\component;

use hahaha\function_base as hahaha_function_base;

class author_link
{
    use \hahaha\instance;

    public $Initial_ = false;
	// 建構子
    public function __construct() {
 
    }
    // 計數動畫(到位置才跳)
    public function view()
    {
        $hahaha_function_base = hahaha_function_base::instance();

        if(!$this->Initial_)
        {
?>

<?php 


            $this->Initial_ = true;
        }
?>
<section id="about-link" class="about-section">
    <div class="circle-row">

        <!-- 官網 -->
        <a href="/" class="circle">
            <i class="fa-solid fa-globe"></i>
        </a>

        <!-- GitHub -->
        <a href="https://github.com/hahaha0417" class="circle">
            <i class="fa-brands fa-github"></i>
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/in/%E5%82%91%E7%90%AA-%E9%99%B3-2282779b" class="circle">
            <i class="fa-brands fa-linkedin"></i>
        </a>

        <!-- CakeResume -->
        <a href="https://www.cake.me/hahaha0417" class="circle">
            <i class="fa-regular fa-file-lines"></i>
        </a>


        <!-- YouTube -->
        <a href="https://www.youtube.com/@%E5%82%91%E7%90%AA-c8x" class="circle">
            <i class="fa-brands fa-youtube"></i>
        </a>

        <!-- Blogger -->
        <a href="https://hahaha-cplusplus.blogspot.com/2025/10/hahaha-20251006.html" class="circle">
            <i class="fa-brands fa-blogger-b"></i>
        </a>

    </div>
</section>


<?php
    }
}
