<?php

namespace hahaha\view\frontend\component;

use hahaha\function_base as hahaha_function_base;

class author_skill
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
<!-- 技能 -->
<section id="about-skill" class="about-section">
    <div class="container my-5">
        <h1 class="fw-bold border-bottom pb-2 mb-4">
            技能
        </h1>

        <div class="plan-list">
            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        軟體
                    </div>
                    <div>
                        <div class="fw-bold fs-5">程式語言</div>
                        <div class="text-muted small"> - </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>視窗</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>C++</li>
                        <li>C#</li>
                        <li>Python：初學</li>
                    
                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>網頁</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>PHP</li>
                        <li>Html 5</li>
                        <li>Css</li>
                        <li>Js</li>
                        <li>Asp.net mvc core：初學</li>
                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>資料庫</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>MySQL</li>
                        <li>SQL Server：初學</li>
                        <li>SQLite：初學</li>
                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>框架</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>VCL</li>
                        <li>C# Winform</li>
                        <li>Laravel</li>
                        <li>Arduino</li>
                        <li>Asp.Net Mvc Core：初學</li>

                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>進階</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>基礎架構</li>
                        <li>執行緒</li>
                        <li>Dynamic DLL</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="plan-list">
            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        軟體
                    </div>
                    <div>
                        <div class="fw-bold fs-5">電腦</div>
                        <div class="text-muted small"> - </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>OS</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>Windows</li>
                        <li>Linux</li>
                    
                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>IDE</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>C++ Builder XE 13</li>
                        <li>Visual Studio 2026</li>
                        <li>Visual Studio Code</li>
                        <li>Arduino</li>
                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>文書處理</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>Word</li>
                        <li>Excel</li>
                        <li>Power Point</li>
                    </ul>
                </div>
                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>版本管理</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>SVN</li>
                        <li>Git</li>
                    </ul>
                </div>
            </div>
         
            <div class="plan-list">
            <div class="plan-item experience-item p-3 p-md-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="plan-num rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center ms-2 me-3">
                        硬體
                    </div>
                    <div>
                        <div class="fw-bold fs-5">電腦</div>
                        <div class="text-muted small"> - </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="text-primary fw-semibold mb-2">
                        <h3>維修</h3>
                    </div>
                    <ul class="mb-0 ps-4">
                        <li>個人電腦裝修</li>
                        <li>RJ45接頭製作</li>
                    
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    
    <script>
        $(function () {
            $('#about-skill .plan-item').css('opacity', 0);
            $('#about-skill .plan-item').each(function (i) {
                $(this).delay(100 * i).animate({ opacity: 1, left: 0 }, 400);
            });
        });
    </script>
</section>


<?php
    }
}
