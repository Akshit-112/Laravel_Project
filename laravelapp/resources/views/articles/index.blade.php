@extends('master')

@section('content')

    <h1> All Articles</h1>
    @foreach($articles as $article)
        id: {{ $article->id }}<br>
        name: {{$article->name}}<br>
        body: {{$article->body}}<br>
        author_id: {{$article->author_id}}<br>
        Tags: @foreach($article->tags as $tag)
            {{ $tag->name }}
        @endforeach<br><br>

        <form method="post" action="{{ action([\App\Http\Controllers\ArticleController::class, 'destroy'], ['article' => $article->id]) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete">
        </form>

        @isset($article->file)
            <img src="{{ asset('storage/' . $article->file) }}" width="100px" height="100px"><br>
        @endisset

    @endforeach
    {{ $articles->links() }}
@endsection

