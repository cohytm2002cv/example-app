<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('/asset/css/homepg/styles.css')}}" rel="stylesheet"/>
    <link href="{{asset('/asset/css/homepg/detail.css')}}" rel="stylesheet"/>
    <link href="{{asset('asset/assets/css/fontawesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet"/>
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet"/>
    <link href="{{asset('asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

</head>
<body>
<!-- Navigation-->
@include('home.nav')
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img height="600px" width="750px" class="card-img-top mb-5 mb-md-0"
                                       src="{{ asset('storage/' . $sanpham->images[0]->url) }}" alt="..."/></div>
            <div class="col-md-6">
                <div class="small mb-1"></div>
                <h1 class="display-5 fw-bolder">{{$sanpham->Pname}}</h1>
                @if($fav&&$fav->favP==1)
                    <a style="text-decoration: none;color: red" href="{{url('like',$sanpham->id)}}">Đã Yêu Thích</a>
                @else
                    <a style="text-decoration: none;color: red" href="{{url('like',$sanpham->id)}}">Yêu Thích</a>

                @endif

                <div class="fs-5 mb-5">
                    {{-- <span class="text-decoration-line-through"> {{number_format($sanpham->price, 2, ',', '.')}} </span> --}}
                    Giá: <span style="color:rgb(160, 13, 13);font-weight:bold"> {{number_format($sanpham->price, 0, ',', '.')}} đồng </span>
                </div>
                Mô Tả:<p class="lead">{{$sanpham->des}}</p>
                <div class="d-flex">


                </div>
                <br>
                <div>
                    <button id="local" class="local" onclick="showDiv()">cửa hàng gần nhất</button>
                </div>
                <div id="div1" class="address">
                    <table>
                        <form action="{{ route('addToCart', ['product' => $sanpham->id]) }}" method="post">

                            @csrf
                            <br>
                            <button type="submit" class="btn btn-outline-dark flex-shrink-0">
                                <i class="bi-cart-fill me-1"></i>
                                Thêm Vào Giỏ Hàng
                            </button>

                            <tbody>
                            <tr>
                                <td colspan="2"><h4>Tất cả cửa hàng</h4></td>
                            </tr>
                            <tr>

                                <th class="col-1">Tên Chi Nhánh</th>
                                <th class="col-2">Địa Chỉ</th>
                                <th class="col-2">Chọn chi nhánh</th>


                            @foreach ($branchs as $item)
                                <tr>

                                    <td class="col-1"> {{$item->branchs->name}}</td>
                                    <td class="col-1">{{$item->branchs->address}}</td>
                                    <td class="col-2"><input value="{{$item->branch_id}}" type="checkbox"
                                     name="branch_id" id=""></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </form>
                    </table>


                </div>
                <div id="div2" style="display:none" class="address">
                    <table>
                        <form action="{{ route('addToCart', ['product' => $sanpham->id]) }}" method="post">

                            @csrf
                        <br>
                        <button type="submit" class="btn btn-outline-dark flex-shrink-0">
                            <i class="bi-cart-fill me-1"></i>
                            Thêm Vào Giỏ Hàng
                        </button>
                        <tbody>
                        <tr>
                            <td colspan="2"><h4>Cửa hàng gần nhất</h4></td>
                        </tr>
                        <tr>
                            <th class="col-1">Tên Chi Nhánh</th>
                            <th class="col-2">Địa Chỉ</th>
                            <th class="col-2">Chọn chi nhánh</th>
                        </tr>
                        @foreach ($branch as $item)
                            <tr>
                                <td class="col-1"><a
                                        href="https://www.google.com/maps/place/Khoa+Du+l%E1%BB%8Bch+-+Kh%C3%A1ch+s%E1%BA%A1n,+Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+Ngo%E1%BA%A1i+ng%E1%BB%AF+-+Tin+h%E1%BB%8Dc+TP.+HCM+(HUFLIT)/@10.8202775,106.5965611,13z/data=!4m10!1m2!2m1!1shuflit!3m6!1s0x31752ecfbc6dba67:0x29b53d19c74ec371!8m2!3d10.7821305!4d106.6628541!15sCgZodWZsaXSSARV1bml2ZXJzaXR5X2RlcGFydG1lbnTgAQA!16s%2Fg%2F1tdfqn0h?entry=ttu ">
                                        {{$item->name}}</a></td>

                                <td class="col-1">{{$item->address}}</td>
                                <td class="col-2"><input value="{{$item->branch_id}}" type="checkbox" name="branch_id"
                                 id="">{{$item->branch_id}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                        </form>
                    </table>

                </div>
            </div>
        </div>
    </div>

</section>
<div style="margin:auto;width:70%">
    <h4>ĐÁNH GIÁ CỦA NGƯỜI DÙNG</h4>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Khách Hàng</th>
            <th scope="col">Đánh Giá</th>
            <th scope="col">Số Sao</th>
            <th scope="col">Ngày Đánh Giá</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($review as $rv)
            <tr>

                <th scope="row"><b>{{$rv->User->fullname}}</b></th>

                <td><b>{{$rv->comments}}</b></td>
                <td><b>
                        @if($rv->rating==1)
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                        @elseif($rv->rating==2)
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>

                        @elseif($rv->rating==3)
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>

                        @elseif($rv->rating==4)
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>

                        @elseif($rv->rating==5)
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>
                            <i style="color: rgb(237, 237, 59)" class="bi bi-star-fill"></i>

                        @endif


                    </b>

                </td>

                <td><b>{{$rv->created_at}} </b></td>

                @if(session('user_role')==1)
                <form action="{{ route('Review.destroy', $rv->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td>
                    <button type="submit" class="btn-danger" onclick="return confirm('Bạn có chắc muốn xóa đánh giá này không?')">Xóa</button>
                    </td>
                </form>
            @endif

        @endforeach

        </tbody>
    </table>
</div>
<div style="width:50%;margin:auto">
    <form action="{{ route('reviews.create') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="product_id" value="{{$sanpham->id}}">
            <input type="hidden" name="user_id" value="{{session('user_id')}}">
            <label for="rating">Đánh Giá</label>

            <select name="rating" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Bình Luận</label>
            <textarea name="comment" id="comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Đánh giá</button>
    </form>
</div>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Sản Phẩm Cùng Loại</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($list as $item)

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('storage/' . $item->images[0]->url) }}" alt="..."/>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$item->Pname}}</h5>
                                <!-- Product price-->
                                {{number_format($item->price, 0, ',', '.')}}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                                        href="{{ url('detail', $item->id) }}">Xem</a></div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('asset/js/scripts.js')}}"></script>


<script src="{{asset('asset/assets/js/custom.js')}}"></script>
<script src="{{asset('asset/assets/js/owl.js')}}"></script>
<script src="{{asset('asset/assets/js/isotope.js')}}"></script>
<script src="{{asset('asset/assets/js/accordions.js')}}"></script>
<script src="{{asset('asset/assets/js/slick.js')}}"></script>

<script src="{{asset('asset/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/accordions.js"></script>
<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>
<script>
    function showDiv() {
        let l = document.getElementById("local");
        var x = document.getElementById("div1");
        var y = document.getElementById("div2");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            l.textContent = "cửa hàng gần nhất";
        } else {
            x.style.display = "none";
            y.style.display = "block"
            l.textContent = "Tất cả cửa hàng";

        }
    }
</script>
</body>
</html>
