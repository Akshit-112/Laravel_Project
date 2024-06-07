@extends('master')

@section('content')
    <h1>Edit Category Form</h1>

    <form method="POST" action="{{ action([\App\Http\Controllers\CategoryController::class, 'update'], $category->id) }}"
    >
        {{ method_field('PATCH') }}
        @include('partials.categoriesForm',
        [
            'buttonName' => 'Edit',
            'name' => old('name', $category->name),
            'description' => old('description', $category->description)
        ])
    </form>

    @include('partials.errors')
@endsection
