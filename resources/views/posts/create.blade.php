<x-app-layout>
    <body>
        <h1>ART Event</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>イベントタイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>概要</h2>
                <textarea name="post[body]" placeholder="実施日、会場、内容など">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="【保存】"/>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>
</x-app-layout>