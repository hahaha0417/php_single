<?php

namespace hahaha\view\frontend\component;

use hahaha\function_base as hahaha_function_base;

class author_education
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
<!-- 學歷 -->
<section id="about-education" class="about-section">
    <div class="container my-5">
        <h1 class="fw-bold border-bottom pb-2 mb-4">
            學歷
        </h1>

        <div class="plan-list">
            
            
            
            
            
            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        碩士
                    </div>
                    <div>
                        <div class="fw-bold fs-5">國立中山大學</div>
                        <div class="text-muted small">2009 / 9 ~ 2013 / 1</div>
                    </div>
                </div>

              
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        大學
                    </div>
                    <div>
                        <div class="fw-bold fs-5">國立嘉義大學</div>
                        <div class="text-muted small">2003 / 9 ~ 2009 / 6</div>
                    </div>
                </div>

              
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        高中
                    </div>
                    <div>
                        <div class="fw-bold fs-5">國立內壢高中</div>
                        <div class="text-muted small">2000 / 9 ~ 2003 / 6</div>
                    </div>
                </div>

              
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        國中
                    </div>
                    <div>
                        <div class="fw-bold fs-5">國立龍潭國國中</div>
                        <div class="text-muted small">1997 / 9 ~ 2000 / 6</div>
                    </div>
                </div>

              
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        國小
                    </div>
                    <div>
                        <div class="fw-bold fs-5">國立武漢國小</div>
                        <div class="text-muted small">1993 / 9 ~ 1997 / 6</div>
                    </div>
                </div>

              
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        國小
                    </div>
                    <div>
                        <div class="fw-bold fs-5">國立永和國小</div>
                        <div class="text-muted small">1991 / 9 ~ 1993 / 6</div>
                    </div>
                </div>

              
            </div>
          
        </div>
    </div>
    
    <script>
        $(function () {
            $('#about-education .plan-item').css('opacity', 0);
            $('#about-education .plan-item').each(function (i) {
                $(this).delay(100 * i).animate({ opacity: 1, left: 0 }, 400);
            });
        });
    </script>
</section>


<?php
    }
}
