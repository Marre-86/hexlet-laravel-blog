@extends('layouts.app')

@section('content')
@if ($message = Session::get('flash'))
<div>
    <strong>{{ $message }}</strong>
</div>
@endif
    <h1>{{ $article->name }}</h1>
    <div>{{ $article->body }}</div>
@endsection
