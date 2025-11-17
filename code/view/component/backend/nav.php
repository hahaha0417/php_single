<?php

namespace hahaha\view\component\backend;

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
<!-- 後台 NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid">

        <!-- LOGO + 標題 -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="/image/iTW_icon.png" alt="Logo"
                 class="me-2" style="height:32px; width:auto;">
            <span class="fw-semibold">後台管理系統</span>
        </a>

        <!-- 漢堡按鈕 -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- 展開區 -->
        <div class="collapse navbar-collapse" id="adminNavbar">

            <!-- 左側選單 -->
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">訂單管理</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        會員管理
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">會員列表</a></li>
                        <li><a class="dropdown-item" href="#">黑名單</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">匯出報表</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">商品管理</a>
                </li> -->

            </ul>

            <!-- 搜尋 -->
            <!-- <form class="d-flex me-3" role="search">
                <input class="form-control form-control-sm bg-dark text-light border-secondary"
                       type="search" placeholder="搜尋…" style="width:140px;">
            </form> -->

            <!-- 管理員 -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link " href="/backend/login" >
                        登入
                    </a>
                  
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        hahaha
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">個人資料</a></li>
                        <li><a class="dropdown-item" href="#">修改密碼</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">登出</a></li>
                    </ul>
                </li> -->
            </ul>

        </div>
    </div>
</nav>
<?php

    }
}
