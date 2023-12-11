<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Website Tin Tức</title>
    <link rel="stylesheet" href="{{asset('asset/css/news/new.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/news/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css')}}">
    <link href="{{asset('asset/assets/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

</head>
<body>
    @include('home.nav')
    <br>
    <br>
    <div class="grid-container">
        <div class="left-column">
            <div class="news-container">
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="{{route('postnews')}}">Đăng Bài </a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-house"></i>
                        <a href="">Tin tức tiền cổ </a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-house"></i>
                        <a href="">Tin tức Châu Á </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-column">
            <div class="breadcrumb">
                <ul>
                    <li><a href="">Trang chủ </a> <span> > </span></li>
                    <li><a href="">Tin tức</a><span> > </span></li>
                    <li><a href="">Tin tức apple</a><span> > </span></li>
                </ul>
                <div class="breadcrumb-search">
                    <div class="search-box">
                        <input type="text" placeholder="Tìm kiếm sản phẩm..." >
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="product-box">


              @foreach ($news as $new)

                <div class="product">
                    <div>
                    <img  src="{{ asset('storage/' . $new->img) }}" alt="Sản phẩm 2">
                    </div>
                    <p>{{$new->title}}</p>
                    <div style="justify-content:space-between;margin-bottom:0" class="date">
                        <i class="fas fa-calendar-alt"></i> {{$new->created_at}}
                        <a href="{{route('news.showedit', $new->id)}}"><button class="btn btn-info">sửa</button></a>
                        <a href="{{route('news.delete', $new->id)}}"><button class="btn btn-danger">xoá</button></a>

                    </div>

                </div>
                @endforeach
            </div>
            <!-- Thay thế điểm bằng các ô vuông chứa số từ 1 đến 5 -->
            <div class="product-pagination">
                <button class="prev-button">&#8249;</button>
                <div class="page-box">1</div>
                <div class="page-box">2</div>
                <div class="page-box">3</div>
                <div class="page-box">4</div>
                <div class="page-box">5</div>
                <button class="next-button">&#8250;</button>
            </div>


        </div>
    </div>
    <footer class="footer">
        <div class="container-footer">
            <div class="footer-column">
                <div class="footer-title">
                    Thông tin
                </div>
                <div class="footer-info">
                    <ul>
                        <li>Thông tin</li>
                        <li>Giới thiệu</li>
                        <li>Check IMEI</li>
                        <li>Phương thức thanh toán</li>
                        <li>Thuê điểm bán lẻ</li>
                        <li>Bảo hành sữa chữa</li>
                        <li>Tuyển dụng</li>
                        <li>Đánh giá chất lượng</li>
                        <li>Khiếu nại</li>
                        <li>Tra cứu hóa đơn điện tử</li>
                    </ul>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-title">
                    Thông tin
                </div>
                <div class="footer-info">
                    <ul>
                        <li>Thông tin</li>
                        <li>Giới thiệu</li>
                        <li>Check IMEI</li>
                        <li>Phương thức thanh toán</li>
                        <li>Thuê điểm bán lẻ</li>
                        <li>Bảo hành sữa chữa</li>
                        <li>Tuyển dụng</li>
                        <li>Đánh giá chất lượng</li>
                        <li>Khiếu nại</li>
                        <li>Tra cứu hóa đơn điện tử</li>
                    </ul>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-title">
                    Thông tin
                </div>
                <div class="footer-info">
                    <ul>
                        <li>Thông tin</li>
                        <li>Giới thiệu</li>
                        <li>Check IMEI</li>
                        <li>Phương thức thanh toán</li>
                        <li>Thuê điểm bán lẻ</li>
                        <li>Bảo hành sữa chữa</li>
                        <li>Tuyển dụng</li>
                        <li>Đánh giá chất lượng</li>
                        <li>Khiếu nại</li>
                        <li>Tra cứu hóa đơn điện tử</li>
                    </ul>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-title">
                    Thông tin
                </div>
                <div class="footer-info">
                    <ul>
                        <li>Thông tin</li>
                        <li>Giới thiệu</li>
                        <li>Check IMEI</li>
                        <li>Phương thức thanh toán</li>
                        <li>Thuê điểm bán lẻ</li>
                        <li>Bảo hành sữa chữa</li>
                        <li>Tuyển dụng</li>
                        <li>Đánh giá chất lượng</li>
                        <li>Khiếu nại</li>
                        <li>Tra cứu hóa đơn điện tử</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
