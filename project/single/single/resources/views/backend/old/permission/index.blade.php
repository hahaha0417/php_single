@extends('backend.layout')


@section('content')
    <div class="layout">
        <?php \hahaha\view\component\backend\sidebar::instance()->view(); ?>
        
        <div class="content">
            <h3 class="mb-4">權限管理</h3>
        <div>

        <!-- Tag 切換列 -->
        <div id="tagMenu" class="mb-4">

            <button class="btn btn-lg btn-secondary rounded-pill me-2 tech" data-tag="tech">
                科技
            </button>
            <button class="btn btn-lg btn-secondary rounded-pill me-2 life" data-tag="life">
                生活
            </button>
            <button class="btn btn-lg btn-secondary rounded-pill me-2 fun" data-tag="fun">
                娛樂
            </button>
            <button class="btn btn-lg btn-secondary rounded-pill me-2 notice" data-tag="notice">
                公告
            </button>
        </div>

        <!-- 卡片內容 -->
        <div class="row g-3">

            <div class="col-md-12 tag-item" data-tag="tech">
                <div class="card bg-secondary text-light">
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 A</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 A</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>

                </div>
            </div>

            <div class="col-md-12 tag-item" data-tag="life">
                <div class="card bg-secondary text-light">
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 B</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">
                        
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 B</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                </div>
            </div>

            <div class="col-md-12 tag-item" data-tag="fun">
                <div class="card bg-secondary text-light">
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 C</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 C</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                </div>
            </div>

            <div class="col-md-12 tag-item" data-tag="notice">
                <div class="card bg-secondary text-light">
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 D</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                    <div class="card-body row">
                        <h5 class="card-title col-2 mt-2">科技新聞 D</h5>
                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">全選</span>
                        </label>
                    </div>
                    <div class="vote-group row mb-2 ms-2">

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">顯示</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">新增</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">編輯</span>
                        </label>

                        <label class="vote-item col-3">
                            <input type="checkbox" class="vote-check">
                            <span class="vote-circle"></span>
                            <span class="vote-text">刪除</span>
                        </label>

                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="/backend/table/base" class="btn btn-outline-light">返回列表</a>
            <button type="submit" class="btn btn-primary">儲存</button>
        </div>
    </div>

    <script>
    $("#tagMenu button").on("click", function () {

        // 切換 active 樣式
        $("#tagMenu button").removeClass("active");
        $(this).addClass("active");

        let tag = $(this).data("tag");

        if (tag === "all") {
            $(".tag-item").show();
        } else {
            $(".tag-item").hide();
            $(`.tag-item[data-tag='${tag}']`).show();
        }
    });

    $("#tagMenu button.tech").click();
    </script>
@endsection