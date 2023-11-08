<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <title>ShopTienCo</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
        
            <link href="{{asset('asset/assets/css/fontawesome.css')}}" rel="stylesheet" />
            <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
            <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
            {{-- <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet" /> --}}

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   --}}
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
   @include('home.nav');

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner ">
      <div class="page-heading products-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text-content">
                <h4>Tiêu Chí</h4>
                <h2>Giá Trị Vượt Thời Gian</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div> --}}
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form method="GET" action="{{ route('searchhome') }}">
              <div style="width:35%;margin-left:65%" class="input-group">
                  <input type="text" name="query" class="form-control" placeholder="Tìm kiếm...">
                  <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                  </div>
              </div>
          </form> 
            <div class="section-heading">
              <h2>Sản Phẩm</h2>
             
              <a href="{{route('product')}}">Xem tất cả <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
<?php 
$i=0;
?>
          @foreach ($name as $p)

          <div class="col-md-4">
            <div class="product-item">
              @if($p->images->count() > 0)
              <a  href="{{ url('detail', $p->id) }}"><img height="200PX"  src="{{ asset('storage/' . $p->images[0]->url) }}" alt=""></a>
              @endif
              <div class="down-content">
                <a href="#"><h4>{{$p->Pname}}</h4></a>
                <h6>  {{number_format($p->price, 0, ',', '.')}} đ</h6>
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                  <span> {{$reviews[$i]}}</span>
                  <?php 
                  $i++;
                  ?>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Shop Tiền Cổ</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for the best products?</h4>
              <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a>  <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
                <li><a href="#">Non cum id reprehenderit</a></li>
              </ul>
              <a href="about.html" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2023ShopTienCo Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('asset/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Additional Scripts -->

    <script src="{{asset('asset/assets/js/custom.js')}}"></script>
    <script src="{{asset('asset/assets/js/owl.js')}}"></script>
    <script src="{{asset('asset/assets/js/isotope.js')}}"></script>
    <script src="{{asset('asset/assets/js/accordions.js')}}"></script>
    <script src="{{asset('asset/assets/js/slick.js')}}"></script>

    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/654ae29cf2439e1631ecd428/1hem8ada6';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->

  </body>

</html>
