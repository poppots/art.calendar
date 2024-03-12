<x-app-layout>
    <body>
        <div style="text-align: center">
            <h1 class="text-6xl text-blue-400">ART Event</h1><br>
            <h2 class="text-3xl">登録済イベント</h2><br>
        </div>
        
        <div class="border-solid border-2 border-blue-400">
            <hr>
        </div>
        
        <div style="text-align: center" class="border-solid border-2 border-blue-400">
            @foreach($posts as $post)
                <div>
                    <h2 class='title text-xl'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <p class='datetime'>{{ $post->start }} ~ {{ $post->end }}</p>
                    <p class='title text-xs'>
                        <a href="/user/{{ $post->user_id }}">投稿者：{{ $post->user->name }}</a>
                    </p>
                </div>
                <div class="border-solid border-2 border-blue-400">
                    <hr>
                </div>
            @endforeach
        </div>
        
        <div style="text-align: center">
            <div class='paginate'>
                {{ $posts->links() }}
            </div><br>
            <a href="/">[戻る]</a>
            <div class='text-sm'>ログインユーザー：{{ Auth::user()->name }}</div>
        </div>
    </body>
</x-app-layout>