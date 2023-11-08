<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Website Tin Tức</title>
    <link rel="stylesheet" href="{{asset('asset/css/news/new.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <i class="fa-solid fa-house"></i>
                        <a href="">Tin tức </a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-newspaper"></i>
                        <a href="">Tin tức apple</a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="">Bài viết review</a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-earth-americas"></i>
                        <a href="">Khám phá</a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-wallet"></i>>
                        <a href="">Thủ thuật</a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <a href="">Khuyến mãi</a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-regular fa-lightbulb"></i>
                        <a href="">Tin khác</a>
                    </div>
                </div>
                <div class="news-title-box">
                    <div class="news-title">
                        <i class="fa-solid fa-video"></i>
                        <a href="">Video</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-column" style="min-height: 850px">
            <div class="container mt-4">
                <h1>Đăng bài báo</h1>
            
                <form method="POST" action="{{route('news.edit',$news->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="articleTitle">Tiêu đề bài báo</label>
                        <input type="text" name="title" value="{{$news->title}}" class="form-control" id="articleTitle" placeholder="Nhập tiêu đề">
                    </div>
            
                    <div class="form-group">
                        <label for="articleImage">Hình ảnh</label>
                        <input type="file" name="img" class="form-control-file" id="articleImage">
                    </div>
            
                    <div class="form-group">
                        <label for="articleContent">Nội dung bài báo</label>
                        <textarea  class="form-control" name="content" id="articleContent" rows="8" placeholder="Nhập nội dung bài báo">{{ $news->content }}</textarea>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Đăng bài</button>
                </form>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
