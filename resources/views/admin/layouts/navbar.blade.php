<nav class="navbar navbar-light bg-white shadow-sm px-4">
    
    <h5 class="mb-0">
        Admin Dashboard
    </h5>

    <div class="d-flex align-items-center">

        <span class="me-3">
            👋 {{ auth()->user()->name }}
        </span>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>

    </div>

</nav>
