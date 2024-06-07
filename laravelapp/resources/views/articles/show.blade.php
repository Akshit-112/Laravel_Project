@extends('master')
@section('content')
    <h1> Article {{ $article->id }}</h1>
    name: {{ $article->name }}<br>
    body: {{ $article->body }}<br>
    author_id: {{ $article->author_id }}<br>
    Tags:<br>
    @foreach($article->tags as $tag)
        {{ $tag->name }}
    @endforeach<br>

    @isset($article->file)
        <img src="{{ asset('storage/' . $article->file) }}"
             width="100px" height="100px"><br>
    @endisset
    <h2> Belongs to </h2>
    Category: {{$article->category->name}}<br>
    description: {{$article->category->description}}<br><br>


@endsection
