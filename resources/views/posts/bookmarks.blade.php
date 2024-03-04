<x-app-layout>
    <body>
        <div class="bookmark_posts">
            @foreach($posts as $post)
                <div>
                    <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                    <small>{{ $post->user->name }}</small>
                    <p>{{ $post->body }}</p>
                </div>
            @endforeach
       
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </body>
</x-app-layout>