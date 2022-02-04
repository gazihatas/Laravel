
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ders 2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Anasayfa</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Kayıt Ol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Giriş Yap</a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.addPost')}}">
                           Yeni Makale Ekle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                            {{ auth()->user()->name }}

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
                            Çıkış Yap
                        </a>
                        <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                            @csrf
                        </form>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
