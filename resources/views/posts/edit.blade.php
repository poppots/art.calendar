<x-app-layout>
    <body>
        <h1 class="title">編集画面</h1>
        
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>イベントタイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>概要</h2>
                    <textarea name="post[body]" placeholder="実施日、会場、内容など">{{ $post->body }}</textarea>
                </div>
                <div>
                    <img src="{{ $post->image_url }}">
                </div>
                <div class="image">
                    <input type="file" name="image">
                </div>
                <input type="submit" value="【保存】">
            </form>
        </div>
    
    </body>
</x-app-layout>