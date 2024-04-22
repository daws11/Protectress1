@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<body>
    <main>
        <!-- Form untuk mengelola profil -->
        <section id="manage-profile">
            <h2>Manage Progile</h2>
            <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                
                <label for="emergency-contact">Emergency Contact</label>
                <input type="text" id="emergency-contact" name="emergency_contact" value="{{ auth()->user()->emergency_contact }}">
                
                <label for="profile-picture">Profile Picture</label>
                <input type="file" id="profile-picture" name="profile_picture">
            
                <div class="additional-options" style="margin-top: 10px;">
                    <button id="change-password-btn" class="additional-options">Change Password</button>
                    <button id="delete-account-btn" class="additional-options">Delete Account</button>
                </div>
                 <button type="submit" style="margin-top: 10px;">Save Changes</button>
            </form>
            <!-- Pesan kesalahan dan pesan sukses -->
            <div id="error-message" style="display:none;">Pesan kesalahan ditampilkan di sini.</div>
            <div id="success-message" style="display:none;">Perubahan profil berhasil disimpan.</div>
        </section>
    </main>
</body>

@endsection