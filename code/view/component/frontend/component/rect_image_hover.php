<?php

namespace hahaha\view\frontend\component;

use hahaha\function_base as hahaha_function_base;

// 矩形圖片(滑上去放大)
class rect_image_hover
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
<section class="resource-box my-5">
    <div class="container">
        <div class="row mb-3">
            <div class="resource-card col-6">
                <!-- 圖片 -->
                <div class="resource-img">
                    <img src="/image/arch/php_single.png" alt="php_single">
                </div>

                <!-- 文字內容 -->
                <div class="resource-content">
                    <h4 class="resource-title">php single</h4>
                    <p class="resource-text">
                        專為worker打造的殼，可以跑job
                    </p>
                </div>
            </div>
            <div class="resource-card col-6">
                <!-- 圖片 -->
                <div class="resource-img">
                    <img src="/image/arch/php_arch.jpg" alt="php_arch">
                </div>

                <!-- 文字內容 -->
                <div class="resource-content">
                    <h4 class="resource-title">php arch</h4>
                    <p class="resource-text">
                        原生套版法，code可以再利用
                    </p>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="resource-card col-6">
                <!-- 圖片 -->
                <div class="resource-img">
                    <img src="/image/arch/c_sharp_base.png" alt="c_sharp_base">
                </div>

                <!-- 文字內容 -->
                <div class="resource-content">
                    <h4 class="resource-title">c_sharp base</h4>
                    <p class="resource-text">
                        基礎winform做法
                    </p>
                </div>
            </div>
            <div class="resource-card col-6">
                <!-- 圖片 -->
                <div class="resource-img">
                    <img src="/image/arch/c_sharp_base_v2.png" alt="c_sharp_base_v2">
                </div>

                <!-- 文字內容 -->
                <div class="resource-content">
                    <h4 class="resource-title">c_sharp base v2</h4>
                    <p class="resource-text">
                        換頁面winform做法
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</section>
<script>
    $(function () {
        function revealResourceCards() {
            $('.resource-card').each(function () {
                var $card = $(this);
                if ($card.hasClass('show')) return;

                var cardTop = $card.offset().top;
                var scrollBottom = $(window).scrollTop() + $(window).height();

                // 元素進入畫面 80px 就顯示
                if (cardTop < scrollBottom - 80) {
                    $card.addClass('show');
                }
            });
        }

        // 初次執行
        revealResourceCards();

        // 滾動時檢查
        $(window).on('scroll', function () {
            revealResourceCards();
        });
    });
</script>


<?php
    }
}
