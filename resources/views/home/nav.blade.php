<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="{{route('trangchu')}}"><h2>SHOP <em>Tiền Cổ</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('trangchu')}}">Trang Chủ
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('product')}}">Loại Sản Phẩm</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('location')}}">Tìm theo khu vực</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('news')}}">Tin Tức</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Liên Hệ</a>
            </li>
            <li  class="nav-item">
                <a  class="nav-link" href="{{route('cart')}}">
                        <i style="font-size:23px" class="fa fa-shopping-cart" ></i>
                        <span id="cart-count" class="badge bg-dark text-white ms-1 rounded-pill"></span>

                </a>
            </li>
            <li class="nav.item">
                <a  href="{{route('cart')}}">
                    @if(session('username')&&session('user_role')==0)
                    <a class="nav-link"  href="{{url('account',session('user_id'))}}">
                        <i class="fa fa-user" style="font-size: 24px"></i>
                         {{ session('username') }}
                    </a>
                @elseif(session('username')&&session('user_role')==1)
                <a class="nav-link"  href="{{route('admin')}}">
                  <i class="fa fa-user" style="font-size: 24px"></i>
                   {{ session('username') }}
              </a>
                @else
                    <a class="nav-link"  href="{{ route('login') }}">Đăng nhập</a>
                @endif
                </a>
            </li>


          </ul>
        </div>
      </div>
    </nav>
  </header>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
        // Sử dụng AJAX để tải số lượng sản phẩm từ trang cart.blade.php
        $.get('/cart-count', function(data) {
            $('#cart-count').text(data);
        });
    });
</script>
