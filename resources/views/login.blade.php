@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <h2 class="app-name">Welcome Back!</h2> 
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
        <div class="signup-link">
            <a href="{{ route('register') }}">Don't have an account? Sign Up</a>
        </div>
    </form>
</div>
@endsection
