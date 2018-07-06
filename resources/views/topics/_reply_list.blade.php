<div class="reply-list">
    @foreach ($replies as $index => $reply)
        <div class="media" id="reply{{ $reply->id }}">
            <div class="avatar media-left">
                <a href="{{ route('users.show', [$reply->user_id]) }}">
                    <img class="media-object img-thumbnail" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}"  style="width:48px;height:48px;"/>
                </a>
            </div>

            <div class="infos media-body mx-2">
                <div class="media-heading">
                    <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>
                    <span> •  </span>
                    <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

                    {{-- 回复删除按钮 --}}
                    <span class="meta float-right">
                        <a title="删除回复">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                        </a>
                    </span>
                </div>
                <div class="reply-content">
                    {!! $reply->content !!}
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>