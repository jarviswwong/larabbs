@if(count($topics))
    @foreach($topics as $topic)
        <div class="card card-margin topic-card">
            <div class="card-wrapper">
                <div class="topic-card-header">
                    <div class="topic-category">
                        来自：<a href="{{route('categories.show', $topic->category_id)}}">{{$topic->category->name}}</a>
                    </div>
                    <div class="topic-author">
                        <div class="userAvatar">
                            <img src="{{$topic->user->avatar}}" alt="">
                        </div>
                        <div class="userName">
                            {{$topic->user->name}}
                        </div>
                        <div class="userIntroduction">
                            {{$topic->user->introduction}}
                        </div>
                    </div>
                    <div class="topic-title">
                        <a href="#">{{$topic->title}}</a>
                    </div>
                </div>
                <div class="topic-card-body">
                    <div class="titleMapThumbnail">
                        <img src="{{$topic->title_map}}" alt="">
                    </div>
                    <div class="topic-summary">
                        {{$topic->body}}
                    </div>
                    <div class="topic-actions">
                        <div class="Time topic-actions-item">
                            <i class="iconfont">&#xe6c9;</i>
                            更新于{{$topic->updated_at->diffForHumans()}}
                        </div>
                        <button type="button" class="Button Comments topic-actions-item">
                            <i class="iconfont">&#xe69b;</i>
                            {{$topic->reply_count}}条评论
                        </button>
                        <button type="button" class="Button Favourites topic-actions-item ">
                            <i class="iconfont">&#xe601;</i>
                            收藏
                        </button>
                        <button type="button" class="Button Share topic-actions-item">
                            <i class="iconfont">&#xe71d;</i>
                            分享
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endforeach
@endif