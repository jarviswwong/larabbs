@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 topic-container">
            <div class="card card-margin topicHeader">
                <a href="#" class="topicHeaderItem">写文章</a>
                <a href="#" class="topicHeaderItem">写心情</a>
            </div>
            <div class="topicList">
                @include("topics._topic_list", ['topics' => $topics])
                {!! $topics->appends(Request::except('page'))->render() !!}
            </div>
        </div>
        <div class="col-lg-3 col-md-3 sidebar">

        </div>
    </div>

@endsection