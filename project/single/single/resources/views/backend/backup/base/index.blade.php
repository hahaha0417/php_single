@php
use hahaha\package\backup\base\define\key as define_key;
use hahaha\package\backup\base\env\env as define_env;
use hahaha\package\backup\base\define\api as define_api;
use hahaha\package\backup\base\define\statement as define_statement;

@endphp

@extends('backend.layout')


@section('content')
    <div class="layout mb-5">
        <?php \hahaha\view\component\backend\sidebar::instance()->view(); ?>

        <div class="content">

            <div class="row mb-2">
                <h3 class="mb-4">
                    <span>
                        備份管理
                    </span>

                </h3>

                <!-- 🔹 上排 Select 1 -->
                <div class="col-6">
                    <div class="mb-3">
                        <div class="row justify-content-between mb-2">
                            <div class="col-4">
                                <label class="form-label ">名稱</label>
                            </div>
                            <div class="col-8">
                                <div class="row g-2">
                                    <div class="col-3 ms-auto">
                                        <button class="btn btn-success w-100 {{ define_key::BUTTON_BACKUP }}">
                                            <i class="fa-solid fa-cloud-arrow-up"></i> 備份
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-success w-100 {{ define_key::BUTTON_RESTORE }}">
                                            <i class="fa-solid fa-cloud-arrow-down"></i> 還原
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-between mb-1 " style="margin-left:1px;margin-right:1px;">

                            <input type="text" name="{{ define_key::NAME }}" class="form-control {{ define_key::NAME }}">

                        </div>
                    </div>
                    <select id="category" class="form-control bg-dark text-light border-secondary {{ define_key::LIST }}" style="overflow-y: auto;" size="10" multiple>
                        @foreach($parameter->backup_list as $key => &$item)
                            <option value="{{ $parameter->backup_list[$key] }}">{{ $parameter->backup_list[$key] }}</option>
                        @endforeach

                    </select>
                    <div class="row ms-1 mt-3">
                        <button class="btn btn-success col-2 me-1 {{ define_key::BUTTON_ADD }}">
                            <i class="fa-solid fa-circle-plus me-1"></i> 新增
                        </button>
                        <button class="btn btn-success col-2 me-1 {{ define_key::BUTTON_UPDATE }}">
                            <i class="fa-solid fa-pen me-1"></i> 更名
                        </button>
                        <button class="btn btn-success col-2 me-1 {{ define_key::BUTTON_DELETE }}">
                            <i class="fa-solid fa-trash me-1"></i> 刪除
                        </button>

                    </div>
                </div>

                <!-- 🔹 上排 Select 2 -->
                <div class="col-6 ">
                    <label class="form-label mb-3">狀態</label>
                    <textarea class="form-control bg-dark text-light border-secondary mb-3 {{ define_key::STATE }}" rows="13" readonly>
名稱：{{ $parameter->state[define_key::NAME] }}
動作：{{ $parameter->state[define_key::ACTION] }}
狀態：{{ $parameter->state[define_key::STATE] }}
日期：{{ $parameter->state[define_key::DATE] }}

錯誤：{{ $parameter->state[define_key::ERROR] }}

訊息：{{ $parameter->state[define_key::MESSAGE] }}

</textarea>


                </div>

                <div class="col-6 mt-4" style="height:300px; display:flex; justify-content:center; align-items:center;">
                    <img src="/image/php.png"
                        style="max-width:100%; max-height:100%; object-fit:contain; object-position:center;">
                </div>





@php
$queue_text = "";
foreach ($parameter->queue as $key => &$item) {
    $queue_text .= $parameter->queue[$key][define_key::NAME] . " " . $parameter->config_backup[$parameter->queue[$key][define_key::ACTION]] . "\n";
}
@endphp
                <div class="col-6 mt-3">
                    <label class="form-label mb-3">排程</label>
                    <textarea class="form-control bg-dark text-light border-secondary" rows="11" readonly>
{{ $queue_text }}

</textarea>


                </div>

            </div>

            <!-- 🔥 左右兩顆按鈕 -->
            <!-- <div class="d-flex justify-content-between mb-3">
                <div>
                    <button id="btnAdd" class="btn btn-success">
                        <i class="fa-solid fa-plus me-1"></i> 新增
                    </button>
                    <button id="btnAdd" class="btn btn-success">
                        <i class="fa-solid fa-plus me-1"></i> 更名
                    </button>
                    <button id="btnAdd" class="btn btn-success">
                        <i class="fa-solid fa-plus me-1"></i> 刪除
                    </button>
                    <button id="btnAdd" class="btn btn-success">
                        <i class="fa-solid fa-plus me-1"></i> 刷新
                    </button>
                </div>
                <div>
                    <button id="btnExport" class="btn btn-warning">
                        <i class="fa-solid fa-file-export me-1"></i> 匯出
                    </button>
                </div>
            </div> -->

        </div>
    </div>

    <script>
        $(document).ready(function() {

        })

        $(".{{ define_key::BUTTON_ADD }}").click(function() {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{ define_api::BACKEND_BACKUP_BASE_ADD }}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    {{ define_key::NAME }}: $(".{{ define_key::NAME }}").val(),
                },
                success: function(data) {
                    if (data["{{ define_api::RESULT }}"] == "{{ define_api::SUCCESS }}")
                    { //如果後端回傳 json 資料有 nickname
                        Swal.fire({
                            title: "成功",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::SUCCESS }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");

                        });
                        location.reload()
                    }
                    else
                    { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                        Swal.fire({
                            title: "錯誤",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::FAILURE }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });

                    }
                },
                error: function(jqXHR) {
                    Swal.fire({
                        title: "錯誤",
                        text: "出錯!",
                        icon: "{{ define_api::FAILURE }}",
                    }).then(() => {
                        // console.log("使用者按下 OK");
                    });
                }
            });
        });

        $(".{{ define_key::BUTTON_UPDATE }}").click(function() {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{ define_api::BACKEND_BACKUP_BASE_UPDATE }}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    {{ define_key::NAME }}: $(".{{ define_key::LIST }} option:selected").val(),
                    {{ define_statement::NAME_NEW }}: $(".{{ define_key::NAME }}").val(),
                },
                success: function(data) {
                    if (data["{{ define_api::RESULT }}"] == "{{ define_api::SUCCESS }}")
                    { //如果後端回傳 json 資料有 nickname
                        Swal.fire({
                            title: "成功",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::SUCCESS }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });
                        location.reload()
                    }
                    else
                    { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                        Swal.fire({
                            title: "錯誤",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::FAILURE }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });
                    }
                },
                error: function(jqXHR) {
                    Swal.fire({
                        title: "錯誤",
                        text: "出錯!",
                        icon: "{{ define_api::FAILURE }}",
                    }).then(() => {
                        // console.log("使用者按下 OK");
                    });
                }
            });
        });

        $(".{{ define_key::BUTTON_DELETE }}").click(function() {
            $name = $(".{{ define_key::NAME }}").val();
            Swal.fire({
                title: `確定要刪除${$name}嗎？`,
                text: "刪除後將無法復原！",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#228722',
                cancelButtonColor: '#121212',
                background: '#1e1e1e', // 暗黑背景
                color: '#ffffff',
                confirmButtonText: '是的，刪除！',
                cancelButtonText: '取消',
            }).then((result) => {
                if (result.isConfirmed) {
                    // 執行刪除動作
                    $.ajax({
                        type: "POST", //傳送方式
                        url: "{{ define_api::BACKEND_BACKUP_BASE_DELETE }}", //傳送目的地
                        dataType: "json", //資料格式
                        data: { //傳送資料
                            {{ define_key::NAME }}: $name,
                        },
                        success: function(data) {
                            if (data["{{ define_api::RESULT }}"] == "{{ define_api::SUCCESS }}")
                            { //如果後端回傳 json 資料有 nickname
                                Swal.fire({
                                    title: "成功",
                                    text: data["{{ define_api::MESSAGE }}"],
                                    icon: "{{ define_api::SUCCESS }}",
                                }).then(() => {
                                    // console.log("使用者按下 OK");
                                });
                                location.reload()
                            }
                            else
                            { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                                Swal.fire({
                                    title: "錯誤",
                                    text: data["{{ define_api::MESSAGE }}"],
                                    icon: "{{ define_api::FAILURE }}",
                                }).then(() => {
                                    // console.log("使用者按下 OK");
                                });
                            }
                        },
                        error: function(jqXHR) {
                            Swal.fire({
                                title: "錯誤",
                                text: "出錯!",
                                icon: "{{ define_api::FAILURE }}",
                            }).then(() => {
                                // console.log("使用者按下 OK");
                            });
                        }
                    });
                }
            });

        });


        $(".{{ define_key::BUTTON_BACKUP }}").click(function() {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{ define_api::BACKEND_BACKUP_BASE_BACKUP }}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    {{ define_key::NAME }}: $(".{{ define_key::NAME }}").val(),
                },
                success: function(data) {
                    if (data["{{ define_api::RESULT }}"] == "{{ define_api::SUCCESS }}")
                    { //如果後端回傳 json 資料有 nickname
                        Swal.fire({
                            title: "成功",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::SUCCESS }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });
                        location.reload()
                    }
                    else
                    { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                        Swal.fire({
                            title: "錯誤",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::FAILURE }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });
                    }
                },
                error: function(jqXHR) {
                    Swal.fire({
                        title: "錯誤",
                        text: "出錯!",
                        icon: "{{ define_api::FAILURE }}",
                    }).then(() => {
                        // console.log("使用者按下 OK");
                    });
                }
            });
        });

        $(".{{ define_key::BUTTON_RESTORE }}").click(function() {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{ define_api::BACKEND_BACKUP_BASE_RESTORE }}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    {{ define_key::NAME }}: $(".{{ define_key::NAME }}").val(),
                },
                success: function(data) {
                    if (data["{{ define_api::RESULT }}"] == "{{ define_api::SUCCESS }}")
                    { //如果後端回傳 json 資料有 nickname
                        Swal.fire({
                            title: "成功",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::SUCCESS }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });
                        location.reload()
                    }
                    else
                    { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                        Swal.fire({
                            title: "錯誤",
                            text: data["{{ define_api::MESSAGE }}"],
                            icon: "{{ define_api::FAILURE }}",
                        }).then(() => {
                            // console.log("使用者按下 OK");
                        });
                    }
                },
                error: function(jqXHR) {
                    Swal.fire({
                        title: "錯誤",
                        text: "出錯!",
                        icon: "{{ define_api::FAILURE }}",
                    }).then(() => {
                        // console.log("使用者按下 OK");
                    });
                }
            });
        });

        $(".{{ define_key::LIST }}").change(function() {
            $(".{{ define_key::NAME }}").val($(".{{ define_key::LIST }} option:selected").val());






        });
    </script>
@endsection
