@extends('layouts.app')

@section('contect')
<h1>Liste des articles</h1>
<h3>{{ $post->content }}</h3>
<span>{{ $post->image ? $post->image->path :  "pas d'image" }}</span>
<br><hr>
@forelse($post->comments as $comment)
<span>{{ $comment->content }} | créer le {{ $comment->created_at->format('d/m/Y')}}</span><br>
@empty
<span>Aucun commentaire</span>
@endforelse
<hr>
@forelse($post->tags as $tag)
<span>{{ $tag->name }}</span><hr>
@empty
<span>Aucun tags </span>
@endforelse

@endsection
