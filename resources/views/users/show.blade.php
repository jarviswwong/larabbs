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
                             src="{{$user->avatar}}" alt="">
                    </div>
                    <div class="user-details">
                        <div class="user-details-header">
                            <h2>{{$user->name}}</h2>
                        </div>
                        <div class="user-details-body">
                            <div class="user-details-item">
                                <p>{{$user->introduction}}</p>

                            </div>
                            <div class="user-details-item">
                                注册于：{{$user->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="user-details-footer">
                            <div class="toUserEdit">
                                <a class="btn btn-outline-primary" href="{{route('users.edit', Auth::id())}}"
                                   role="button">编辑个人资料</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection