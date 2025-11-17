<?php

namespace hahaha\view\frontend\component;

use hahaha\function_base as hahaha_function_base;

class counter
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>
<?php 


            $this->Initial_ = true;
        }
?>
<div class="container py-5">
    <h1 class="text-center mb-4">
        hahaha
    </h1>
    <h3 class="text-center mb-4">
        命名規則
    </h3>
    

    <div class="row text-center">
        <div class="col-4">
            <div class="counter-box p-4">
                <div class="display-5 fw-bold counter" data-num="15">0</div>
                <p class="mb-0">hahaha</p>
            </div>

            
        </div>

        <div class="col-4">
            <div class="counter-box p-4">
                <div class="display-5 fw-bold counter" data-num="38">0</div>
                <p class="mb-0">hehehe</p>
            </div>

            
        </div>

        <div class="col-4">
            <div class="counter-box p-4">
                <div class="display-5 fw-bold counter" data-num="976">0</div>
                <p class="mb-0">hohoho</p>
            </div>

            
        </div>
    </div>
</div>
<script>
    $('.counter').each(function () {
        var $this = $(this);

        $this.waypoint(function () {
            var target = $this.data('num');

            $this.animateNumber(
                { number: target },
                1500 // 動畫時間
            );

            this.destroy(); // ⭐ 只執行一次
        }, {
            offset: '80%' // 元素出現在視窗 80% 高度時啟動
        });
    });
</script>


<?php
    }
}
