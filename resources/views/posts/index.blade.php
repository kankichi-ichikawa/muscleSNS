<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link href="https:/fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
        <link rel="stylesheet" href="{{asset('css/icon.min.css')}}">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
    </head>
    <body>
        <div id="app"></div>
        <!--  <h1>Index</h1>-->
        <!--    <div class='posts'>-->
        <!--    [<a href="/posts/create">create</a>]-->
        <!--    @foreach ($posts as $post)-->
        <!--        <div class='post'>-->
        <!--            <h2 class='title'>-->
        <!--                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>-->
        <!--            </h2>-->
        <!--            <small>type: {{ $post->type }}</small>-->
        <!--            <p class='body'>{{ $post->body }}</p>-->
        <!--        </div>-->
        <!--    @endforeach-->
        <!--</div>-->
        <!--<div class='paginate'>-->
        <!--    {{ $posts->links() }}-->
        <!--</div>-->
    </body>
</html>