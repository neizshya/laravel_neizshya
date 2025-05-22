<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 100%;"> <a href="/"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <span
            class="fs-4">Teramedik</span> </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"> <a href="{{ route('home') }}"
                class="nav-link text-white {{ strpos(Request::route()->getName(), 'home') !== false ? 'active' : '' }}"
                aria-current="page">
                Home
            </a> </li>
        <li> <a href="{{ route('rumah-sakit.index') }}"
                class="nav-link text-white {{ strpos(Request::route()->getName(), 'rumah-sakit') !== false ? 'active' : '' }}">
                Rumah Sakit
            </a> </li>
        <li> <a href="{{ route('pasien.index') }}"
                class="nav-link text-white {{ strpos(Request::route()->getName(), 'pasien') !== false ? 'active' : '' }}">
                Pasien
            </a> </li>

    </ul>
    <hr>

</div>
