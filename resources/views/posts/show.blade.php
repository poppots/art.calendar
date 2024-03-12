<x-app-layout>
    <body>
        <div style="text-align: center">
            <h1 class="text-6xl text-blue-400">ART Event</h1>
            <br>
            <h2 class="title text-3xl">
                {{ $post->title }}
            </h2>
            @auth
            <small>投稿者：{{ $post->user->name }}</small>
            @endauth
            
            <div class="datetime">
                <p>開始日時：{{ $post->start }}</p> 
                <p>終了日時：{{ $post->end }}</p> 
            </div><br>
            
            <div class="content">
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" style="display: block; margin: auto;" alt="画像が読み込めません。"/>
                </div>
                @endif
                <div class="content__post">
                    <p>{{ $post->body }}</p>    
                </div>
            </div><br>
            
            <div class="post-control">
                @if (!Auth::user()->is_bookmark($post->id))
                <form action="{{ route('bookmark.store', $post) }}" method="post">
                    @csrf
                    <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        イベント登録
                    </button>
                </form>
                @else
                <form action="{{ route('bookmark.destroy', $post) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        イベント登録解除
                    </button>
                </form>
                <button onclick="location.href='/api/{{ $post->id }}'" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">
                    カレンダー保存
                </button>
                @endif
            </div><br>
            
            <div class="edit">
                <button onclick="location.href='/posts/{{ $post->id }}/edit'" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    編集
                </button>
            </div><br>
        
            <a href="/">[戻る]</a>
        </div>
    </body>
</x-app-layout>