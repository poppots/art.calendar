<x-app-layout>
    <body>
        <div class="user_posts">
            @foreach($user_posts as $post)
                <div>
                    <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                    <small>{{ $post->user->name }}</small>
                    <p>{{ $post->body }}</p>
                </div>
            @endforeach
       
            <div class='paginate'>
                {{ $user_posts->links() }}
            </div>
        </div>
    </body>
</x-app-layout>