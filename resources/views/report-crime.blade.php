@extends('layouts.app')

@section('title', 'Report Crime')

@section('content')
<div class="container">
    <h1>Report a Crime</h1>
    <form method="POST" action="{{ route('report-crime.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="details">Detail Kejadian:</label>
            <textarea id="details" name="details" class="form-control" required aria-describedby="detailsHelpBlock"></textarea>
            <small id="detailsHelpBlock" class="form-text text-muted">
                Tuliskan secara detail apa yang terjadi.
            </small>
        </div>
        <div class="form-group">
            <label for="location">Lokasi Kejadian:</label>
            <input type="text" id="location" name="location" class="form-control" required aria-describedby="locationHelpBlock">
            <small id="locationHelpBlock" class="form-text text-muted">
                Masukkan lokasi spesifik kejadian.
            </small>
        </div>
        <div class="form-group">
            <label for="evidence">Bukti Kejahatan (gambar):</label>
            <input type="file" id="evidence" name="evidence" class="form-control-file" required aria-describedby="evidenceHelpBlock">
            <small id="evidenceHelpBlock" class="form-text text-muted">
                Unggah bukti kejadian, seperti foto atau video.
            </small>
        </div>
        <button type="submit" class="btn btn-primary">Submit Report</button>
    </form>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        
        @if(session('success'))
            alert('{{ session('success') }}');  
        @endif
    });
</script>
</div>
@endsection
