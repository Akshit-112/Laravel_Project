@extends('master')

@section('content')

    <h1>Category{{$category->id}}</h1>
    name: {{$category->name}}<br>
    description: {{$category->description}}<br>

    <h1>Articles</h1>
    @foreach($category->articles as $article)

        ID: {{$article->id}}<br>
        Name: {{$article->name}}<br>
        Body: {{$article->body}}<br>
        Author ID: {{$article->author_id}}<br><br>
    @endforeach


@endsection
