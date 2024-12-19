<style>
    /* Style umum untuk navigasi utama dan user options */
    .nav-link, .user_option a, .user_option button {
        color: #000; /* Warna font hitam */
        font-weight: 500; /* Ketebalan font medium */
        text-decoration: none; /* Menghilangkan garis bawah */
    }

    /* Warna dan ketebalan untuk item yang sedang aktif */
    .nav-link.active, .user_option a.active {
        font-weight: bold; /* Ketebalan lebih untuk menandai item aktif */
        color: #000; /* Warna hitam pada item aktif */
    }

    /* Style untuk ikon dalam user options, agar konsisten dengan teks */
    .user_option a i, .user_option button i {
        color: #000; /* Warna hitam untuk ikon */
    }

    /* Style untuk header agar tetap terlihat saat di-scroll */
    .header_section {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000; /* Pastikan header selalu di atas elemen lain */
        background-color: #fff; /* Warna background agar tidak transparan */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk efek lebih elegan */
    }

    /* Tambahkan padding pada konten agar tidak tertutup header */
    body {
        padding-top: 180px; /* Sesuaikan dengan tinggi header */
    }

    /* Flexbox untuk navbar */
    .navbar-nav {
        display: flex;
        align-items: center; /* Vertically center items */
    }

    /* Style untuk user options */
    .user_option {
        display: flex;
        align-items: center; /* Vertically center user options */
        margin-left: auto; /* Push user options to the right */
    }

    .user_option li {
        margin-left: 15px; /* Spasi antar item user options */
    }
</style>

<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <span>Rahdatu Wooden Furniture</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>

        <li class="nav-item {{ request()->is('shop') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
        </li>

        <li class="nav-item {{ request()->is('why') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/why') }}">Why Us</a>
        </li>

        <li class="nav-item {{ request()->is('contact_us') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/contact_us') }}">Chat With Us</a>
        </li>
        
        <div class="user_option">
        @if (Route::has('login'))
        @auth
          <li class="nav-item {{ request()->is('myorders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('myorders') }}">My Orders</a>
          </li>

          <li class="nav-item {{ request()->is('mycart') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('mycart') }}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{ $count }}]
            </a>
          </li>
            
          <li>
            <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
              @csrf <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>Logout</span>
              </button>
            </form>
          </li>
          @else
          <li>
            <a href="{{ url('/login') }}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>Login</span>
            </a>
          </li>

          <li>
            <a href="{{ url('/register') }}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>Register</span>
            </a>
          </li>
        @endauth
        @endif
        </div>
      </ul>
    </div>
  </nav>
</header>