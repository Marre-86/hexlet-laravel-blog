@extends('layouts.app')

@section('content')

@if ($message = Session::get('flash'))
<div>
    <strong>{{ $message }}</strong>
</div>
@endif

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <a href="{{ route('articles.show', $article->id) }}">{{$article->name}}</a>
        <a href="{{ route('articles.edit', $article->id) }}">EDIT</a>
        <a href="{{ route('articles.destroy', $article->id) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 12)}}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
