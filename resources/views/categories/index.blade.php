@extends('layouts.app')

@section('title', isset($category->name) ? $category->name : "新分类")

@section('content')
    <div class="row">
        <div class="col-lg-9 col-md-9 category-container">
            <div class="card card-margin categoryHeader">
                <div class="c_main">
                    <div class="c_thumbnail">
                        <img src="{{url('http://cdn.imcavoy.com/larabbs/20180828091622_QQ6NDn_X-Men_Days_of_Future_Past_Wolverine.jpeg')}}"
                             alt="">
                    </div>
                    <div class="c_details_wrapper">
                        <div class="c_title">
                            {{$category->name}}
                        </div>
                        <div class="c_desc">
                            {{$category->description}}
                        </div>
                    </div>
                </div>
                <div class="c_actions">
                    <button class="btn btn-primary btn_focus">关注分类</button>
                </div>
            </div>
            <div class="c_topicList">
                @include("categories.c_topic_list", ['topics' => $topics])
                {{--{!! $topics->appends(Request::except('page'))->render() !!}--}}
            </div>
        </div>
        <div class="col-lg-3 col-md-3 sidebar">
            <div class="card c_statistics">
                <div class="c_statistics_wrapper">
                    <div class="l_item">
                        <div class="post_counts">
                            <div class="title">
                                问题数
                            </div>
                            <div class="datas">
                                {{$category->post_count}}
                            </div>
                        </div>
                    </div>
                    <div class="r_item">
                        <div class="focus_counts">
                            <div class="title">
                                关注数
                            </div>
                            <div class="datas">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection