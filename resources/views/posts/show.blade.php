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
        </div>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>