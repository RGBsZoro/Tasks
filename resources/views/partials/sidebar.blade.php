<ul class="nav flex-column">
    <li class="nav-item mb-2">
        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
           href="{{ route('dashboard') }}">
            Dashboard
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('users') ? 'active' : '' }}"
           href="{{ route('users') }}">
            Users
        </a>
    </li>
</ul>