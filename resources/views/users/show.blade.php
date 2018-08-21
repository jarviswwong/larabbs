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
                    </div>
                    <div class="user-details">
                        <div class="user-details-header">
                            <h2>{{$user->name}}</h2>
                        </div>
                        <div class="user-details-body">
                            <div class="user-details-item">
                                <p>相识是偶然 无奈爱心顷刻变
                                    你在我 又或是我在你 内心曾许下诺言
                                    谁说有不散筵席 谁说生死不变
                                    此刻共对亦无言 流露我心中凄怨
                                    此刻共对亦无言 流露我心中凄怨
                                    看着你 我愁怀满脸 泪水有如洒在面前
                                    我的心怎忍说离别 凝望你轻忽走远
                                    已别去 是已别去 让时光洗去悲怨</p>

                            </div>
                            <div class="user-details-item">
                                注册于：3年前
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection