<?php

namespace hahaha\view\component\backend;

class sidebar
{
    use \hahaha\instance;

	// 建構子
    public function __construct() {
 
    }
    //
    public function view()
    {
?>
<!-- 🔻 左側 Sidebar -->
<div id="sidebar">
    <!-- ⭐ Sidebar Toggle -->
    <a class="nav-link" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </a>
<?php
    // <!-- 第一層 -->
    // <a class="nav-link menu-toggle">
    //     <i class="fa-solid fa-box"></i>
    //     <span class="text">表單</span>
    //     <i class="menu-arrow fa-solid fa-chevron-right"></i>
    // </a>
    // <div class="submenu">

    //     <!-- 第二層 -->
    //     <a class="nav-link" href="/backend/table/base">
    //         <i class="fa-solid fa-list"></i>
    //         <span class="text">基本</span>
    //     </a>
    //     <a class="nav-link" href="/backend/table/modal">
    //         <i class="fa-solid fa-list"></i>
    //         <span class="text">對話框</span>
    //     </a>
    // </div>

    // <!-- 第一層 -->
    // <a class="nav-link menu-toggle">
    //     <i class="fa-solid fa-box"></i>
    //     <span class="text">權限</span>
    //     <i class="menu-arrow fa-solid fa-chevron-right"></i>
    // </a>
    // <div class="submenu">

    //     <!-- 第二層 -->
    //     <a class="nav-link" href="/backend/permission">
    //         <i class="fa-solid fa-list"></i>
    //         <span class="text">權限</span>
    //     </a>

    // </div>
?>
    <!-- 第一層 -->
    <a class="nav-link menu-toggle">
        <i class="fa-solid fa-box"></i>
        <span class="text">備份</span>
        <i class="menu-arrow fa-solid fa-chevron-right"></i>
    </a>
    <div class="submenu">

        <!-- 第二層 -->
        <a class="nav-link" href="/backend/backup">
            <i class="fa-solid fa-list"></i>
            <span class="text">基本</span>
        </a>

    </div>
<?php

    // <a class="nav-link menu-toggle">
    //     <i class="fa-solid fa-box"></i>
    //     <span class="text">商品管理</span>
    //     <i class="menu-arrow fa-solid fa-chevron-right"></i>
    // </a>
    // <div class="submenu">

    //     <!-- 第二層 -->
    //     <a class="nav-link menu-toggle">
    //         <i class="fa-solid fa-list"></i>
    //         <span class="text">商品列表</span>
    //         <i class="menu-arrow fa-solid fa-chevron-right"></i>
    //     </a>
    //     <div class="submenu">

    //         <!-- 第三層 -->
    //         <a class="nav-link menu-toggle">
    //             <i class="fa-solid fa-tags"></i>
    //             <span class="text">商品分類</span>
    //             <i class="menu-arrow fa-solid fa-chevron-right"></i>
    //         </a>
    //         <div class="submenu">

    //             <!-- 第四層 -->
    //             <a class="nav-link"><i class="fa-solid fa-circle"></i><span class="text">分類 A</span></a>
    //             <a class="nav-link"><i class="fa-solid fa-circle"></i><span class="text">分類 B</span></a>
    //             <a class="nav-link"><i class="fa-solid fa-circle"></i><span class="text">分類 C</span></a>

    //         </div>

    //     </div>

    // </div>
?>

</div>


<?php

    }
}
