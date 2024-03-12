<x-app-layout>
    <body>
        <div style="text-align: center">
            <h1 class="text-6xl text-blue-400">ART Event</h1>
            <br>
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class='content__title'>
                        <h2>イベント名</h2>
                        <input type='text' name='post[title]' value="{{ $post->title }}">
                    </div>
                    
                    <div class="content__start">
                        <h2>開始日時</h2>
                        <input type="datetime-local" name="post[start]" value="{{ $post->start }}">
                    </div>
                    <div class="content__end">
                        <h2>終了日時</h2>
                        <input type="datetime-local" name="post[end]" value="{{ $post->end }}">
                    </div>
                    
                    <div class='content__body'>
                        <h2>概要</h2>
                        <textarea name="post[body]" placeholder="実施日、会場、内容など">{{ $post->body }}</textarea>
                    </div><br>
                    
                    <div>
                        <img src="{{ $post->image_url }}" style="display: block; margin: auto;"/>
                    </div><br>
                    <div class="image">
                        <input type="file" name="image">
                    </div>
                    
                    <div class='title text-xl'>
                        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            保存
                        </button>
                    </div><br>
                </form>
            </div>
            
            <div class="back">
                <a href="/posts/{{ $post->id }}">[戻る</a>]
            </div>
        </div>
    </body>
</x-app-layout>