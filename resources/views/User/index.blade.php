<x-app-layout>
    <body>
        <div style="text-align: center">
            <h1 class="text-6xl text-blue-400">ART Event</h1><br>
            <h2 class="text-3xl"></h2><br>
        </div>
        
        <div class="border-solid border-2 border-blue-400">
            <hr>
        </div>
        
        <div style="text-align: center" class="user_posts border-solid border-2 border-blue-400">
            @foreach($user_posts as $post)
                <div>
                    <h2 class='title text-xl'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <small>投稿者：{{ $post->user->name }}</small>
                    <p>{{ $post->body }}</p>
                    <p class='datetime'>{{ $post->start }} ~ {{ $post->end }}</p>
                </div>
                <div class="border-solid border-2 border-blue-400">
                    <hr>
                </div>
            @endforeach
        </div>
        
        <div style="text-align: center">
            <div class='paginate'>
                {{ $user_posts->links() }}
            </div><br>
            <a href="/">[戻る]</a>
            <div class='text-sm'>ログインユーザー：{{ Auth::user()->name }}</div>
        </div>
    </body>
</x-app-layout>