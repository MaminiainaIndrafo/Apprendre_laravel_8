@extends('layouts.app')

@section('contect')
<br>
<h3>Créer un nouveau post</h3>
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title" class="border-gray-600 border-2">
    <textarea name="content" cols="30" rows="10" class="border-gray-600 border-2"></textarea>
    <button tpe="submit" class="bg-green-500">Créer</button>
</form>
@endsection
