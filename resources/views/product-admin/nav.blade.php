<nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="{{url('trangchu')}}">
                    <h1 class="tm-site-title mb-0">ADMIN</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('admin')}}">
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
                            <a class="nav-link" href="{{url('products')}}">

                                Sản Phẩm
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('accounts')}}">

                                Tài Khoản
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('newsadmin')}}">

                                Tin Tức
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">

                                <span>
                                   Chi Nhánh
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('showbranchs')}}"> Tạo chi nhánh</a>
                                <a class="dropdown-item" href="{{route('listbranchs')}}">Danh sách chi nhánh</a>
                                {{--                                <a class="dropdown-item" href="#">Customize</a>--}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <span>
                                   Voucher
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('voucher.create')}}"> Tạo Voucher</a>
                                <a class="dropdown-item" href="{{route('voucher.index')}}">Danh sách Voucher</a>
{{--                                <a class="dropdown-item" href="#">Customize</a>--}}
                            </div>
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
