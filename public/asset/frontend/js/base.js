$(function () {

    // 搜尋列 toggle
    $('#hahaha-search-toggle').on('click', function () {
        $('#hahaha-searchbar').stop(true, true).slideToggle(160);
    });

    // 桌機版：hover 展開 mega menu（兼容 Bootstrap 5）
    function bindDesktopMega() {
        if (window.matchMedia('(min-width: 992px)').matches) {
            $('.dropdown-mega').each(function () {
                var $dd = $(this);
                var $menu = $dd.find('.dropdown-menu').first();
                $dd.off('mouseenter mouseleave').on('mouseenter', function () {
                    $dd.addClass('show');
                    $menu.addClass('show');
                }).on('mouseleave', function () {
                    $dd.removeClass('show');
                    $menu.removeClass('show');
                });
            });
        } else {
            // 手機就用 bootstrap 自己的 offcanvas，不用 hover
            $('.dropdown-mega').off('mouseenter mouseleave');
        }
    }

    bindDesktopMega();
    $(window).on('resize', bindDesktopMega);

    // 手機多層選單箭頭動畫（可有可無）
    $('.hahaha-mobile-toggle, .hahaha-mobile-toggle2').on('click', function () {
        var $btn = $(this);
        setTimeout(function () {
            // aria-expanded 會由 Bootstrap 自己改
        }, 200);
    });

    $(".footer-title").click(function () {
        if ($(window).width() < 768) {
            $($(this).data("target")).collapse('toggle');
        }
    });

    // 點問題標題展開 / 收合
    $('.question-header').on('click', function () {
      
        var $item = $(this).closest('.question-item');
        var $body = $item.find('.question-body');

        // 如果只想「單一」展開，先把其他關掉
        $('.question-item').not($item).removeClass('open').find('.question-body').slideUp(150);

        // 切換自己
        $item.toggleClass('open');
        $body.stop(true, true).slideToggle(150);
    });

    
});

