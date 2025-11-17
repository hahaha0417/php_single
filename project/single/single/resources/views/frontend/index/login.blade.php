@extends('frontend.layout_login')


@section('content')
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="fs-4 fw-bold">hahaha 後台</div>
            <div class="small text-secondary">會員登入</div>
        </div>

        <form id="loginForm">
            <div class="mb-3">
                <label class="form-label">帳號</label>
                <input type="text" class="form-control" id="username" placeholder="請輸入帳號">
            </div>

            <div class="mb-3">
                <label class="form-label">密碼</label>
                <input type="password" class="form-control" id="password" placeholder="請輸入密碼">
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label small" for="rememberMe">記住我</label>
                </div>
                <a href="#" class="small link-muted">忘記密碼？</a>
            </div>

            <button class="btn btn-primary w-100 fw-bold">登入</button>

            <div class="text-center small mt-3">
                還沒有帳號？<a href="#" class="link-muted">建立帳號</a>
            </div>
        </form>
    </div>
@endsection