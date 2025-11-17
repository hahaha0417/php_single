@extends('frontend.layout')


@section('content')
    <!-- 資訊 -->
    <?php \hahaha\view\frontend\component\author_info::instance()->view(); ?>
    <!-- 連結 -->
    <?php \hahaha\view\frontend\component\author_link::instance()->view(); ?>
    <!-- 學歷 -->
    <?php \hahaha\view\frontend\component\author_education::instance()->view(); ?>
    <!-- 經歷 -->
    <?php \hahaha\view\frontend\component\author_experience::instance()->view(); ?>
    <!-- 技能 -->
    <?php \hahaha\view\frontend\component\author_skill::instance()->view(); ?>





    
@endsection