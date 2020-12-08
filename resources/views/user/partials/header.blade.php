<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an text logo -->
            <!-- <h1><a href="index.html">NewBiz</a></h1> -->
            <a href="/"><img src="{{ asset ('user/assets/img/logo.png')}}" alt="" class="img-fluid"></a>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li class="drop-down"><a href="#">Profile</a>
                    <ul>
                        <li><a href="{{ route('profil.sejarah') }}">Sejarah</a></li>
                        <li class="drop-down"><a href="#">Manajemen</a>
                            <ul>
                                <li><a href="{{ route('profil.struktur') }}">Struktur</a></li>
                                <li><a href="{{ route('profil.proker') }}">Program Kerja</a></li>
                                <li><a href="{{ route('profil.struktur_opera') }}">Struktur Operasional</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=""><a href="{{ route('post.list') }}">Acara & Info</a>
                    <ul>
                        {{-- @foreach($category_widget as $result1)
                        <li><a href="{{ route('post.category', $result1->slug )}}">{{ $result1->name }}</a></li>
                        @endforeach --}}
                    </ul>
                </li>
                <li class="drop-down"><a href="#" style="pointer-events: none; 
                    cursor: default;">Pelayanan</a>
                    <ul>
                        <li class="drop-down"><a href="#">Ibadah</a>
                            <ul class="ibadah">
                                {{-- <li><a href="#">Kutbah Jum'at</a></li>
                                <li><a href="#">Forum Halaqoh Qur'an</a></li>
                                <li><a href="#">Taman Pendidikan Qur'an</a></li>
                                <li><a href="#">Ramadhan</a></li> --}}
                                <li><a href="{{ route('qurban.index') }}">Qurban</a></li>
                            </ul>
                        </li>
                        <li class="drop-down"><a href="#">Sosial</a>
                            <ul>
                                <li><a href="{{ route('upj.index')}}">Unit Laporan Jenazah</a></li>
                                <li><a href="{{ route('lazhaq.index') }}">Lembaga Amil Zakat</a></li>
                                {{-- <li><a href="{{ route('qurban.index') }}">Donor Darah</a></li> --}}
                                {{-- <li><a href="#">Konsultasi Rohani</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- <li class="drop-down"><a href="#">Laporan</a>
                    <ul>
                        <li class="qurban"><a href="{{ route('qurban.index') }}">Qurban</a>
                            
                        </li>
                        <li class="sosial"><a href="{{ route('lazhaq.index') }}">Zakat Infaq Shodaqoh</a>
                            
                        </li>
                    </ul>
                </li> --}}

                <li><a href="{{ route('donation.list') }}" class="btn-get-started scrollto">Infaq & Wakaf</a></li>
                @guest

                <li class="drop-down"><a href="#"><i class="fa fa-user-circle-o fa-lg" style="color: rgb(255, 255, 255) !important" aria-hidden="true"></i></a>
                    <ul>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"
                                    aria-hidden="true"></i>&nbsp;{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus"
                            aria-hidden="true"></i>&nbsp;{{ __('Register') }}</a>
                        </li>
                        @endif
                    </ul>
                </li>


                @else
                {{-- <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="color:  #03877e; border-style: none;"
                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li> --}}

                <li class="drop-down"><a href="#"><img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user"
                    class="rounded-circle" width="30"></a>
                    <ul>
                        @can('DASHBOARD (WAJIB)')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.index')}}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a class="dropdown-item" style="color:  #03877e; border-style: none;"
                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                           <i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>
                    
                    </ul>
                </li>

                @endguest

            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->