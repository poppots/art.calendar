<x-app-layout>
    <body>
        <h1>ART Event</h1>
        
        <div>
          <form action="{{ route('posts.index') }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="イベント名、概要など">
            <input type="submit" value="検索">
          </form>
        </div>
        
        <div>
            <a href='/posts/create'>【新規投稿】</a>
        </div>
        
        <div>----------イベント一覧----------</div>
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    
                    <p class='body'>{{ $post->body }}</p>
                    
                    @if($post->user_id==Auth::id())
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">[削除]</button> 
                    </form>
                    @endif
                    <a href="/user/{{ $post->user_id }}">投稿者：{{ $post->user->name }}</a>
                </div>
            @endforeach
        </div>
       
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        <div>ログインユーザー：{{ Auth::user()->name }}</div>
        
    </body>
</x-app-layout>