<header class="py-3 mb-4 border-bottom d-flex align-items-center px-3">

    <!-- Toggle Button (hanya tampil di mobile) -->
    <button class="btn btn-outline-dark d-md-none me-3" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
        ☰ Menu
    </button>

    <!-- Spacer -->
    <div class="flex-grow-1"></div>

    <!-- User Dropdown (selalu di kanan) -->
    <div class="dropdown">
        <a href="#" class="d-flex text-black align-items-center text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <strong>{{ auth()->user()->name ?? 'Guest' }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">Sign out</button>
                </form>
            </li>
        </ul>
    </div>

</header>
