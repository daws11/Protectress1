@extends('layouts.app')

@section('title', 'Buat Postingan Baru')

@section('content')
    <div class="container mt-4">
        <h1>Buat Postingan Baru</h1>
        <form action="{{ route('forum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="content">Konten</label>
                <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Posting</button>
            </div>
        </form>
    </div>
@endsection
