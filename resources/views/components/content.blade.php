{{-- dashboard.blade.php --}}

{{-- Main Content Section --}}
<div class="container mt-5">

    {{-- User Information Section --}}
    <div class="card">
        <div class="card-body">
            {{-- Display the Username --}}
            <h5 class="card-title">Welcome, {{ $user->name }}!</h5>

            {{-- Additional User Information --}}
            <p class="card-text">
                {{-- Example of showing user-specific information --}}
                Email: {{ $user->email }} <br>
                Account Created: {{ $user->created_at->format('d M, Y') }} <br>
                Last Login: {{ $user->last_login ? $user->last_login->diffForHumans() : 'Never logged in' }}
            </p>
        </div>
    </div>

    {{-- Example of a Section for User-Specific Actions --}}
    <div class="mt-4">
        <h6>User Actions</h6>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('user.profile') }}">View Profile</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.settings') }}">Account Settings</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.logout') }}">Logout</a>
            </li>
        </ul>
    </div>

</div>
