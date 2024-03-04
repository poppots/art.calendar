<x-app-layout>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        @auth
        <small>{{ $post->user->name }}</small>
        @endauth
        <div class="content">
            <div class="content__post">
                <p>{{ $post->body }}</p>    
            </div>
            @if($post->image_url)
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
            </div>
            @endif
        </div>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">[編集]</a></div>
        
        <div class="post-control">
            @if (!Auth::user()->is_bookmark($post->id))
            <form action="{{ route('bookmark.store', $post) }}" method="post">
                @csrf
                <button><イベント登録></button>
            </form>
            @else
            <form action="{{ route('bookmark.destroy', $post) }}" method="post">
                @csrf
                @method('delete')
                <button><イベント登録解除></button>
            </form>
            @endif
        </div>
        
        <div class="footer">
            <a href="/">[戻る]</a>
        </div>
    </body>
</x-app-layout>