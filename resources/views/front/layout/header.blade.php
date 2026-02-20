<nav class="navbar navbar-expand-lg">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand brand" href="{{ url('/') }}">
            GlowCare
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="nav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}">
                        Cart
                        <span class="badge bg-danger">
                            {{ $cartCount }}
                        </span>
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my.orders') }}">
                            My Orders
                        </a>
                    </li>
                @endauth

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Hi, {{ auth()->user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @else 
                    <li class="nav-item">
                        <a href="{{ route('login' )}}" class="nav-link">Login</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
