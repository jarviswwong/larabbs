@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 user-info">
            <div class="card">
                <div class="user-header">
                    <img class="card-img-top user-header-img"
                         src="{{$user->header_img}}"
                         alt="user-header-img">
                </div>
                <div class="card-body user-body">
                    <div class="user-avatar">
                        <img class="user-avatar-img"
                             src="{{$user->avatar}}" alt="">
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
                            <form action="{{route('users.update',$user->id)}}" method="POST" accept-charset="UTF-8">
                                {{ method_field('PUT') }}
                                @csrf
                                {{--性别修改--}}
                                <div class="user-edit-item">
                                    <div class="item-title">性别</div>
                                    <div class="item-entry">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="RadioForMale" value="M"
                                                   @if($user->gender === 'M') checked @endif>
                                            <label class="form-check-label" for="RadioForMale">男</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="RadioForFemale" value="F"
                                                   @if($user->gender === 'F') checked @endif>
                                            <label class="form-check-label" for="RadioForFemale">女</label>
                                        </div>
                                    </div>
                                </div>
                                {{--个人介绍修改--}}
                                <div class="user-edit-item">
                                    <div class="item-title" style="line-height: 37px;">个人简介</div>
                                    <div class="item-entry">
                                        <input type="text"
                                               class="form-control l-input {{$errors->has('introduction') ? 'is-invalid' : ''}}"
                                               placeholder="请用一句话介绍你自己.."
                                               name="introduction" value="{{$user->introduction}}">
                                        @if($errors->has('introduction'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('introduction')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{--提交--}}
                                <div class="user-edit-item">
                                    <button type="submit" class="btn" style="background-color: #0984e3;color: #fff;">
                                        保存修改
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--裁剪图片弹出框--}}
    <div class="modal fade" id="upLoadImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: 1px solid #ebebeb;">
                {{--上传图片隐藏input--}}
                <input type="file" style="display:none" accept="image/png,image/gif,image/jpg,image/jpeg"
                       id="upLoadInput">
                <div class="modal-header">
                    <h5 class="modal-title">编辑头像（剪裁功能尚未完成）</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="imageViewWrapper" style="text-align: center;">
                        <canvas id="loadedImage"></canvas>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn btn-primary submitAvatar" style="width: 300px;">保存头像</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('external_js')
    <script>
        //暂时局部刷新,用土办法
        function refreshAvatar(path) {
            $("img.user-avatar-img").attr('src', path);
            $(".navbar-user img.avatar-thumbnail").attr("src", path);
        }

        //获取头像的dataURL
        function getDataUrl(e, onLoadCallback) {
            var file = e;
            var reader = new FileReader();
            //采用回调函数的方式来自定义处理数据
            reader.onload = onLoadCallback;
            reader.readAsDataURL(file);
        }

        //预览头像
        function viewImage(dataURL) {
            var img = new Image();
            img.src = dataURL;
            img.onload = () => {
                var w = Math.min(300, img.width);
                var h = img.height * (w / img.width);
                var canvas = document.getElementById('loadedImage');
                var ctx = canvas.getContext('2d');

                // 设置 canvas 的宽度和高度
                canvas.width = w;
                canvas.height = h;

                // 把图片绘制到 canvas 中
                ctx.drawImage(img, 0, 0, w, h);
            }
        }

        $(document).on('click', '.avatar-edit-title', function (e) {
            document.getElementById("upLoadInput").click();
        });

        $("input#upLoadInput").change(function (e) {
            getDataUrl(e.target.files[0], function (f) {
                var bs = f.target.result;
                viewImage(bs);
                $("#upLoadImageModal").modal();
            });
        });

        //保存头像
        $(document).on('click', ".submitAvatar", function () {
            //jq中获取files二进制数据的方式
            var _input = $("input#upLoadInput").prop('files')[0];
            var val = $("input#upLoadInput").val();
            //获得扩展名
            var extension = val.substr(val.indexOf("."));
            getDataUrl(_input, function (e) {
                var fd = new FormData();
                fd.append('avatar', e.target.result);
                fd.append('_token', $('meta[name="csrf-token"]').attr('content'));
                fd.append('extension', extension);

                $.ajax({
                    type: 'POST',
                    url: '{{route('users.avatar.edit', Auth::id())}}',
                    data: fd,
                    processData: false, // 不会将 data 参数序列化字符串
                    contentType: false, // 根据表单 input 提交的数据使用其默认的 contentType
                    success: function (res) {
                        $('#upLoadImageModal').modal('hide');
                        if (res["status"] === 1) {
                            toastr.success(res["msg"]);
                            refreshAvatar(res["avatar_path"]);
                        }
                        else {
                            toastr.error("服务器内部错误，上传失败！");
                        }
                    },
                    error: function (res) {
                        $('#upLoadImageModal').modal('hide');
                        toastr.error("上传失败，请重试！");
                    }
                });

            });
        });
    </script>
@endsection