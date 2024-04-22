@extends('layouts.app')

@section('title', 'Forum Home')

@section('content')
<div class="container">
<div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Buat Postingan Baru</a>
    </div>
    @foreach ($posts as $post)
        <div class="post mb-4">
            <h3>{{ $post->content }}</h3>
            <p>{{ $post->created_at->format('d M, Y') }} by {{ $post->user->name }}</p>
            <p>{{ $post->likes_count }} likes</p>
            <p>{{ $post->comments_count }} comments</p>
            <div>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Lihat Forum</a>
                <a href="{{ route('posts.show', $post->id) }}#comments" class="btn btn-secondary">Lihat Komentar</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
