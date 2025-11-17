@extends('backend.layout')


@section('content')
    <div class="layout">
        <?php \hahaha\view\component\backend\sidebar::instance()->view(); ?>

        <div class="content">
        </div>
    </div>   
@endsection