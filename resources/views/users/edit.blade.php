@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 user-info">
            <div class="card">
                <div class="user-header">
                    <img class="card-img-top user-header-img"
                         src="{{url('https://ws2.sinaimg.cn/large/006tNbRwgy1fuh20ej1j7j30sg0sgmyl.jpg')}}"
                         alt="user-header-img">
                </div>
                <div class="card-body user-body">
                    <div class="user-avatar">
                        <img class="user-avatar-img"
                             src="https://ws2.sinaimg.cn/large/006tNbRwgy1fuh23auerrj309x09eq2x.jpg" alt="">
                        <div class="float-layer">
                            <div class="avatar-edit-bg"></div>
                            <div class="avatar-edit-title">
                                <div>
                                    <i class="iconfont" style="font-size: 30px;">&#xe7c9;</i>
                                    <div class="edit-title">修改个人头像</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="user-details">
                        <div class="user-details-header">
                            <h2 class="user-details-title">{{$user->name}}</h2>
                        </div>
                        <div class="user-edit-body">
                            {{--性别修改--}}
                            <div class="user-edit-item">
                                <div class="item-title">性别</div>
                                <div class="item-entry">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="userGenderInput"
                                               id="RadioForMale" value="M" @if($user->gender === 'M') checked @endif>
                                        <label class="form-check-label" for="RadioForMale">男</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="userGenderInput"
                                               id="RadioForFemale" value="F" @if($user->gender === 'F') checked @endif>
                                        <label class="form-check-label" for="RadioForFemale">女</label>
                                    </div>
                                </div>
                            </div>
                            {{--个人介绍修改--}}
                            <div class="user-edit-item">
                                <div class="item-title" style="line-height: 37px;">个人简介</div>
                                <div class="item-entry">
                                    <input type="text" class="form-control l-input" placeholder="请用一句话介绍你自己.."
                                           name="introduction" value="{{$user->introduction}}">
                                </div>
                            </div>
                            {{--提交--}}
                            <div class="user-edit-item">
                                <button type="button" class="btn" style="background-color: #0984e3;color: #fff;">保存修改
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection