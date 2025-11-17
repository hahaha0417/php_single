<?php

namespace hahaha\view\component\frontend;

class nav
{
    use \hahaha\instance;

	// 建構子
    public function __construct() {
 
    }
    //

    public function view()
    {
?>
<!-- hahaha FULL HEADER -->
<header id="hahaha-header">

   

    <!-- 主導覽列 -->
    <nav class="navbar navbar-expand-lg navbar-dark hahaha-navbar px-3 px-lg-4">
        <div class="container-fluid">


            <a class="navbar-brand d-flex " href="/">
                <img src="/image/iTW_icon.png" alt="Logo"
                    class="me-2" style="height:32px; width:auto;">
                <span class="fw-semibold " style="color:#ffffff;">hahaha</span>
            </a>

            <!-- 手機漢堡 -->
            <button class="navbar-toggler border-0" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#hahahaOffcanvas"
                    aria-controls="hahahaOffcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 桌機主選單 -->
            <div class="collapse navbar-collapse" id="hahahaMainNav">
                <ul class="navbar-nav hahaha-main-nav">

                    <!-- 1. Mobile / Handhelds -->
                    <!-- <li class="nav-item dropdown dropdown-mega position-static">
                        <a class="nav-link dropdown-toggle" href="#" role="button">
                            Mobile / Handhelds
                        </a>
                        <div class="dropdown-menu hahaha-megamenu">
                            <div class="container py-4">
                                <div class="row g-4">
                                    <div class="col-lg-3">
                                        <h6 class="hahaha-menu-title">PHONES</h6>
                                        <a href="#" class="hahaha-menu-item">ROG Phone</a>
                                        <a href="#" class="hahaha-menu-item">Zenfone</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="hahaha-menu-title">ACCESSORIES</h6>
                                        <a href="#" class="hahaha-menu-item">Controllers</a>
                                        <a href="#" class="hahaha-menu-item">Chargers &amp; Cables</a>
                                        <a href="#" class="hahaha-menu-item">Covers &amp; Cases</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="hahaha-menu-title">BY USAGE</h6>
                                        <a href="#" class="hahaha-menu-item">Gaming</a>
                                        <a href="#" class="hahaha-menu-item">Photography</a>
                                        <a href="#" class="hahaha-menu-item">Everyday</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="hahaha-menu-product mb-3">
                                            <img src="https://dlcdnwebimgs.hahaha.com/gain/64f61a74-4322-4c7f-a836-29b65832274b/"
                                                 class="img-fluid" alt="">
                                            <div class="hahaha-menu-product-title">ROG Phone Series</div>
                                        </div>
                                        <div class="hahaha-menu-product">
                                            <img src="https://dlcdnwebimgs.hahaha.com/gain/2fbf6218-fffb-4c79-b199-7b82bd5d70ee/"
                                                 class="img-fluid" alt="">
                                            <div class="hahaha-menu-product-title">Zenfone Series</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="/about">關於哈哥</a>
                    </li>

                    <!--  -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="https://www.hahaha.com.tw/support/">Support</a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="/backend">後台</a>
                    </li>

                </ul>

                <!-- ⭐ 右邊登入按鈕（用 ms-auto 推到右側） -->
                <div class="ms-auto d-flex align-items-center">
                    <a class="nav-link" href="/login">登入</a>
                </div>

        

            </div>

        </div>
    </nav>

    <!-- 搜尋列 -->
    <div class="hahaha-search-bar" id="hahaha-searchbar">
        <div class="container px-3 px-lg-4 py-2">
            <form class="d-flex">
                <input class="form-control rounded-pill" type="search" placeholder="Search hahaha.com">
                <button class="btn ms-2 rounded-pill hahaha-search-btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <!-- 手機版 OFFCANVAS -->
    <div class="offcanvas offcanvas-start hahaha-offcanvas bg-dark text-light" tabindex="-1" id="hahahaOffcanvas">
        <div class="offcanvas-header">
            <span class="hahaha-logo-text"></span>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body hahaha-mobile-menu">

            <!-- 手機版上方 logo 列 -->
            <!-- <div class="d-flex gap-3 mb-3">
                <img src="https://www.hahaha.com/media/Odin/images/header/ROG_hover.svg" height="20" alt="">
                <img src="https://www.hahaha.com/media/Odin/images/header/ProArt_hover.svg" height="20" alt="">
                <img src="https://www.hahaha.com/media/Odin/images/header/IoT_hover.svg" height="20" alt="">
            </div> -->

            <!-- 每一個主分類：多層 collapse -->
            <!-- Mobile / Handhelds -->
            <!-- <div class="hahaha-mobile-item">
                <button class="hahaha-mobile-toggle" data-bs-toggle="collapse" data-bs-target="#mMobile">
                    Mobile / Handhelds <span class="arrow"></span>
                </button>
                <div class="collapse" id="mMobile">
                    <div class="hahaha-mobile-subitem">
                        <button class="hahaha-mobile-toggle2" data-bs-toggle="collapse" data-bs-target="#mMobilePhones">
                            Phones <span class="arrow"></span>
                        </button>
                        <div class="collapse" id="mMobilePhones">
                            <a class="hahaha-mobile-link">ROG Phone</a>
                            <a class="hahaha-mobile-link">Zenfone</a>
                        </div>
                    </div>
                    <div class="hahaha-mobile-subitem">
                        <button class="hahaha-mobile-toggle2" data-bs-toggle="collapse" data-bs-target="#mMobileAcc">
                            Accessories <span class="arrow"></span>
                        </button>
                        <div class="collapse" id="mMobileAcc">
                            <a class="hahaha-mobile-link">Controllers</a>
                            <a class="hahaha-mobile-link">Chargers &amp; Cables</a>
                        </div>
                    </div>
                </div>
            </div> -->

          

            <!-- Support -->
            <a class="hahaha-mobile-link" href="https://www.hahaha.com.tw/support/">Support</a>

        </div>
    </div>

</header>

<?php

    }
}
