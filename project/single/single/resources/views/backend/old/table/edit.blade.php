@extends('backend.layout')


@section('content')
<div class="layout mb-5">
    <?php \hahaha\view\component\backend\sidebar::instance()->view(); ?>
        
    <div class="content">
        <h3 class="mb-4">編輯資料</h3>

        <form id="editForm" class="p-4 bg-secondary rounded-3">

            <input type="hidden" id="id">

            <div class="mb-3">
                <label class="form-label">姓名</label>
                <input type="text" id="name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">職位</label>
                <input type="text" id="position" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Office</label>
                <input type="text" id="office" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">年齡</label>
                <input type="number" id="age" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">開始日期</label>
                <input type="date" id="start_date" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">薪水</label>
                <input type="text" id="salary" class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="/backend/table/base" class="btn btn-outline-light">返回列表</a>
                <button type="submit" class="btn btn-primary">儲存</button>
            </div>

        </form>
    </div>
    
</div>
@endsection