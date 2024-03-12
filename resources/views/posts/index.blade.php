<x-app-layout>
    <body>
        <div style="text-align: center">
            <h1 class="text-6xl text-blue-400">ART Event</h1><br>
            <form action="{{ route('posts.index') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="イベント名、概要など">
                <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    検索
                </button>
            </form><br>
            <button onclick="location.href='/posts/create'" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                新規投稿
            </button>
            <button onclick="location.href='/bookmarks'" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                登録済イベント
            </button>
        </div><br>
        
        <div class="border-solid border-2 border-blue-400">
            <hr>
        </div>
        
        <div style="text-align: center" class="border-solid border-2 border-blue-400">
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title text-xl'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <p class='datetime'>{{ $post->start }} ~ {{ $post->end }}</p>
                    
                    @if($post->user_id==Auth::id())
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">[削除]</button> 
                    </form>
                    @endif
                    <p class='title text-xs'>
                    <a href="/user/{{ $post->user_id }}">投稿者：{{ $post->user->name }}</a>
                    </p>
                    <div class="border-solid border-2 border-blue-400">
                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
       
        <div style="text-align: center">
            <div class='paginate'>
                {{ $posts->links() }}
            </div><br>
            <div class='text-sm'>ログインユーザー：{{ Auth::user()->name }}</div>
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>