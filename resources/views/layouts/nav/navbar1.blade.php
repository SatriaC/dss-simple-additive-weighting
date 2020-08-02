
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="/dashboard"><img src="{{url('/')}}/assets/spk/img/core-img/logo.png" alt="" class="logo-dashboard"></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="/dashboard"><b>Dashboard</b></a></li>
                    <li>
                        <a href="#"><b>Data Jalan</b></a>
                        <ul>
                            <li>
                                <a href="/jalan">
                                <i class="far fa-eye nav-icon"></i>
                                    Lihat Data
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/jalan/create">
                                <i class="far fa-plus nav-icon"></i>
                                    Tambah Data
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <b>Kriteria</b>
                        </a>
                        <ul>
                            <li>
                                <a href="/kriteria">
                                <i class="far fa-eye nav-icon"></i>
                                    Lihat Data
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/kriteria/create">
                                <i class="far fa-plus nav-icon"></i>
                                    Tambah Data
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('nilai') }}">
                           <b>Input Nilai</b> 
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('perhitungan') }}">
                            <b>Hasil</b> 
                        </a>
                    </li>
                    <li><a href="/logout"><b>Keluar</b></a></li>
                </ul>
            </nav>
        </header>