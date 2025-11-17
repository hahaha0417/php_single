// 範例：用 jQuery 根據網址自動加上 active
$(function () {
    var path = window.location.pathname.toLowerCase();
    $('.navbar-nav .nav-link').each(function () {
        var href = $(this).attr('href');
        if (!href) return;
        if (path.indexOf(href.toLowerCase()) !== -1 && href !== '#') {
            $('.navbar-nav .nav-item').removeClass('active');
            $(this).closest('.nav-item').addClass('active');
        }
    });
});



$(document).ready(function () {

    // 🔒 控制 sidebarToggle 是否失效
    let sidebarLocked = false;


    /* ---------------------------------------------------
     * 1️⃣ 三條線（sidebarToggle）行為
     * --------------------------------------------------- */
    $("#sidebarToggle").on("click", function () {

        // 若已被鎖住 → 不給按
        if (sidebarLocked) {
            console.log("🔒 Sidebar is locked.");
            return; 
        }

        // ✔ 正常 toggle
        $("#sidebar").toggleClass("full");
        $("#content").toggleClass("full");
    });




    /* ---------------------------------------------------
     * 2️⃣ mini 狀態 → 點選項目自動展開
     * --------------------------------------------------- */
    $("#sidebar .nav-link").not("#sidebarToggle").on("click", function () {
        if (!$("#sidebar").hasClass("full")) {
            $("#sidebar").addClass("full");
            $("#content").addClass("full");
        }
    });

    $("#sidebar").addClass("full");
    $("#content").addClass("full");




    /* ---------------------------------------------------
     * 3️⃣ submenu 展開 / 收合（關鍵修正版本）
     * --------------------------------------------------- */
    $(".menu-toggle").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        let current = $(this);
        let submenu = current.next(".submenu");

        // 👉 展開 / 收合 submenu（加 callback！）
        submenu.slideToggle(200, function () {

            // slide 動畫完成後再檢查是否所有 submenu 都收起
            if ($(".submenu:visible").length === 0) {
                sidebarLocked = false;   // 🔓 三條線恢復功能
                console.log("🔓 Sidebar unlocked.");
            } else {
                sidebarLocked = true;    // 🔒 三條線失效
                console.log("🔒 Sidebar locked.");
            }
        });

        // 箭頭旋轉
        current.find(".menu-arrow").toggleClass("rotate");

        // 收起其它 submenu
        let siblings = current.parent().children(".submenu").not(submenu);

        siblings.slideUp(200, function () {

            // slideUp 也必須檢查所有 submenu 是否已經關閉
            if ($(".submenu:visible").length === 0) {
                sidebarLocked = false;   // 🔓 三條線恢復功能
                console.log("🔓 Sidebar unlocked.");
            }
        });

        // 收起其它箭頭
        current.parent().find(".menu-arrow").not(current.find(".menu-arrow")).removeClass("rotate");
    });

});
