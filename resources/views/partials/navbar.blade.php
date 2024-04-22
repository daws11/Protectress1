<header>
    <div class="logo">
        <span class="material-icons">eco</span>
        <h1>Protectrees</h1>
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
        </ul>
    </nav>
    <div class="user-actions">
        @auth

        <a href="{{ route('profile') }}" class="profile-button">
            <button id="profile-btn">
                <span class="material-icons">account_circle</span>
            </button>
        </a>
 
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-button" id="logout-btn">
                <span class="material-icons">logout</span>
            </button>
        </form>
        @else
   
        <a href="{{ route('login') }}" class="login-button">  
            <button type="submit">Login</button>
        </a>
        @endauth
    </div>
</header>
