<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="{{url('trangchu')}}">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('account',session('user_id'))}}">

                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                {{-- <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-file-alt"></i>
                        <span>
                            Reports <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Daily Report</a>
                        <a class="dropdown-item" href="#">Weekly Report</a>
                        <a class="dropdown-item" href="#">Yearly Report</a>
                    </div>
                </li> --}}


                <li class="nav-item">
                    <a class="nav-link" href="{{url('account/edit',session('user_id'))}}">

                        Tài Khoản
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('account/fav',session('user_id'))}}">

                        Sản Phẩm Yêu Thích
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-block" href="{{route('logout')}}">
                       <b>{{session('username')}}</b>   , Đăng Xuất
                    </a>

                </li>
            </ul>
        </div>
    </div>

</nav>
