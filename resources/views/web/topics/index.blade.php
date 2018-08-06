@extends('web.layouts.app')

@section('title', isset($category->name) ?: '话题列表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 topic-list">
                @if(isset($category))
                    <div class="alert alert-info" role="alert">
                        {{ $category->name }}:{{ $category->description }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <nav class="nav nav-pills nav-justified">
                            <a class="nav-link {{ active_class(!if_query('order', 'recent')) }}"
                               href="{{ Request::url() }}?order=default">最后回复</a>
                            <a class="nav-link {{ active_class(!if_query('order', 'default')) }}"
                               href="{{ Request::url() }}?order=recent" href="{{ Request::url() }}?order=recent">最新回复</a>
                        </nav>
                    </div>
                    <div class="card-body">
                        {{--话题列表--}}
                        @include('web.topics._topic_list', ['topics' => $topics])

                        {{--话题分页--}}
                        {!! $topics->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                @include('web.topics._sidebar')
            </div>
        </div>
    </div>
@endsection