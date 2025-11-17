<?php

namespace hahaha\view\frontend\component;

use hahaha\function_base as hahaha_function_base;

class author_experience
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
<!-- 經歷 -->
<section id="about-experience" class="about-section">
    <div class="container my-5">
        <h1 class="fw-bold border-bottom pb-2 mb-4">
            經歷
        </h1>

        <div class="plan-list">
            
            
            
            
            
            
            
            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">金硯科技工程資訊</div>
                        <div class="text-muted small">2022 / 11 ~ 2025 / 10</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>PHP後端工程師</h3>
                    </div>
                    <h5>web</h5>
                    <ul class="mb-0 ps-4 mb-2">
                        <li><a href="https://www.kingyaninfo.com.tw">官網 </a></li>
                        <li><a href="https://pave.kingyaninfo.com.tw">鋪面檢測系統 </a></li>
                        <li><a href="https://site.kingyaninfo.com.tw">智慧工程管理系統 </a></li>
                        <li><a href="https://predict.kingyaninfo.com.tw">智能預測鋪面管控系統 - 未完成 </a></li>
                        <li><a href="https://www.gcisds.com.tw">社團法人綠營建產業低碳淨零永續發展學會 </a></li>
                       
                    </ul>
                    <h5>c# winform</h5>
                    <ul class="mb-0 ps-4 mb-2">
                        <li>鋪面檢測系統：PCI部分，非動態dll架構</li>
                        <li>SafePave：安全帽反光衣偵測</li>
                      
                    </ul>
                    <h5>資料處理</h5>
                    <ul class="mb-0 ps-4 mb-2">
                   
                        <li>台南殯葬業：拔釘，建檔</li>
                        <li>中壢地政事務所：建檔，綁線</li>
                    </ul>
                    <h5>其他</h5>
                    <ul class="mb-0 ps-4 mb-2">
                        <li>arduino：溫度</li>
                        <li>樹莓派：簡易Api上傳</li>
                        <li>QGIS：地圖整理</li>
                    </ul>
                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">達義資訊整合</div>
                        <div class="text-muted small">2020 / 11 ~ 2022 / 3</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>PHP後端工程師</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>公司網站 </li>
                        <li>建築業app(未完成，只有底層建置好)</li>
                    </ul>
                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">台灣萬事達金流</div>
                        <div class="text-muted small">2020 / 2 ~ 2020 / 9</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>PHP後端工程師</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>OpenCart 購物車插件(金流 X 物流 X 發票) </li>
                        <li>WordPress 購物車插件(金流 X 物流 X 發票)</li>
                    </ul>
                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">光晨科技</div>
                        <div class="text-muted small">2019 / 9 ~ 2020 / 1</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>PHP後端工程師</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>PHP遊戲後端API </li>
                        <li>Bagisto電商網站修改 </li>
                        <li>laravel移植lumen</li>
                    </ul>
                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">創時系統</div>
                        <div class="text-muted small">2019 / 1 ~ 2019 / 9</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>PHP後端工程師</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>php測試</li>
                        <li>shukun 套版微調</li>
                        <li>good idea 套版</li>
                    </ul>
                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                    在家
                    </div>
                    <div>
                        <div class="fw-bold fs-5">無</div>
                        <div class="text-muted small">2016 / 6 ~ 2017 / 6</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>自己研究</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>hahahalib</li>
                        <li>Oring檢測系統 - 半成品</li>
                        <li>Custom檢測系統 - 架構部分 - 未完成 </li>
                        <li>Hahaha檢測系統 - 架構部份 - 未完成</li>
                    </ul>
                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">常鴻新科技</div>
                        <div class="text-muted small">2016 / 2 ~ 2016 / 5</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>軟體工程師</h3>
                    </div>

                </div>
            </div>

            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        公司
                    </div>
                    <div>
                        <div class="fw-bold fs-5">歐壹科技</div>
                        <div class="text-muted small">2013 / 9 ~ 2016 / 6</div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>軟體工程師</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>藥錠檢測系統</li>
                        <li>晶粒檢測系統</li>
                        <li>IC 導線架系統</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(function () {
            $('#about-experience .plan-item').css('opacity', 0);
            $('#about-experience .plan-item').each(function (i) {
                $(this).delay(100 * i).animate({ opacity: 1, left: 0 }, 400);
            });
        });
    </script>
</section>


<?php
    }
}
