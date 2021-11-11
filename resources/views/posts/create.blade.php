<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Type</h2>
                <select name="post[type]">
                    <option value="train">トレーニング</option>
                    <option value="meal">食事</option>
                    <option value="body">身体変化</option>
                </select>
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/><br>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                <h2>画像ファイル</h2>
                <input type="file" name="post[img]"><br>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
            
            <!--一時的なuserID-->
            <input type="hidden" name="post[user_id]" value="master"/>
            
        </form>
        <div class="back">[<a href="/posts">back</a>]</div>
    </body>
</html>