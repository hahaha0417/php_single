<?php

namespace hahaha\view\component\frontend;

class footer
{
    use \hahaha\instance;

	// 建構子
    public function __construct() {
 
    }
    //
    public function view()
    {
?>
<footer class="hahaha-footer bg-[#111] text-gray-300 pt-10 pb-6">
    <div class="container">
        <div class="row">

            <!-- 個人 -->
            <div class="col-12 col-md-3 mb-4 footer-group">
                <div class="footer-title d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#f1">
                    <span>個人</span>
                    <i class="fa fa-chevron-down d-md-none"></i>
                </div>
                <ul class="collapse d-md-block list-unstyled mt-2" id="f1">
                    <li><a href="#">hahaha</a></li>
                    <!-- <li><a href="#">桌上型電腦</a></li>
                    <li><a href="#">手機</a></li>
                    <li><a href="#">主機板</a></li>
                    <li><a href="#">顯示卡</a></li> -->
                </ul>
            </div>

            <!-- 支援服務 -->
            <!-- <div class="col-12 col-md-3 mb-4 footer-group">
                <div class="footer-title d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#f2">
                    <span>支援服務</span>
                    <i class="fa fa-chevron-down d-md-none"></i>
                </div>
                <ul class="collapse d-md-block list-unstyled mt-2" id="f2">
                    <li><a href="#">產品註冊</a></li>
                    <li><a href="#">技術支援</a></li>
                    <li><a href="#">保固查詢</a></li>
                    <li><a href="#">下載中心</a></li>
                </ul>
            </div> -->

            <!-- 探索 -->
            <!-- <div class="col-12 col-md-3 mb-4 footer-group">
                <div class="footer-title d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#f3">
                    <span>探索</span>
                    <i class="fa fa-chevron-down d-md-none"></i>
                </div>
                <ul class="collapse d-md-block list-unstyled mt-2" id="f3">
                    <li><a href="#">最新消息</a></li>
                    <li><a href="#">活動專區</a></li>
                    <li><a href="#">影片</a></li>
                    <li><a href="#">社群媒體</a></li>
                </ul>
            </div> -->

            <!-- 關於 hahaha -->
            <!-- <div class="col-12 col-md-3 mb-4 footer-group">
                <div class="footer-title d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#f4">
                    <span>關於 hahaha</span>
                    <i class="fa fa-chevron-down d-md-none"></i>
                </div>
                <ul class="collapse d-md-block list-unstyled mt-2" id="f4">
                    <li><a href="#">關於我們</a></li>
                    <li><a href="#">投資人關係</a></li>
                    <li><a href="#">企業永續</a></li>
                    <li><a href="#">職涯機會</a></li>
                </ul>
            </div> -->

        </div>

        <hr class="border-gray-700 my-4" />

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-gray-400 text-sm">
            <div>© 2025 hahaha. All Rights Reserved.</div>
            <div class="footer-links mt-2 mt-md-0">
                <a href="#">隱私權政策</a>
                <span class="mx-2">|</span>
                <a href="#">使用條款</a>
            </div>
        </div>
    </div>
</footer>




<?php

    }
}
