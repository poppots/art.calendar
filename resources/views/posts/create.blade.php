<x-app-layout>
    <body>
        <div style="text-align: center">
            <h1 class="text-6xl text-blue-400">ART Event</h1>
            <br>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h2>イベント名</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div><br>
                
                <div class="start">
                    <h2>開始日時</h2>
                    <input type="datetime-local" name="post[start]" value="{{ old('post.start') }}">
                    <p class="start__error" style="color:red">{{ $errors->first('post.start') }}</p>
                </div><br>
                
                <div class="end">
                    <h2>終了日時</h2>
                    <input type="datetime-local" name="post[end]" value="{{ old('post.end') }}">
                    <p class="end__error" style="color:red">{{ $errors->first('post.end') }}</p>
                </div><br>
                
                <div class="body">
                    <h2>概要</h2>
                    <textarea name="post[body]" placeholder="料金、会場、内容など">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div><br>
                
                <div class="image">
                    <input type="file" name="image">
                </div><br>
                
                <div class='title text-xl'>
                    <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        投稿
                    </button>
                </div><br>
            </form>
            
            <div class="back">[<a href="/">戻る</a>]</div>
        </div>
    </body>
</x-app-layout>