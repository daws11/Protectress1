@extends('layouts.app')

@section('title', 'Detail Forum')

@section('content')
<div class="container mt-4">
    <h1>{{ $post->content }}</h1>
    <small>Diposting oleh {{ $post->user->name }} pada {{ $post->created_at->format('d M Y') }}</small>

    <form action="{{ route('posts.likes.toggle', $post->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">{{ $post->likes->contains('user_id', auth()->id()) ? 'Batal Suka' : 'Suka' }}</button>
    </form>

    @if(auth()->id() == $post->user_id)
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2">Hapus Posting</button>
        </form>
    @endif

    <hr>
    <h4 id="comments">Komentar:</h4>
    @foreach ($post->comments as $comment)
        <div class="comment mb-3">
            <p>{{ $comment->body }}</p>
            <small>Dikomentari oleh {{ $comment->user->name }} pada {{ $comment->created_at->format('d M Y H:i') }}</small>
        </div>
    @endforeach

    <h4>Tambah Komentar:</h4>
    <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control" rows="3" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Kirim Komentar</button>
        </div>
    </form>
</div>
@endsection
