<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet" />


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


    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                 <a href="{{url('home/product')}}"> <li class="active" data-filter="*" >Tất Cả</li></a>
                  @foreach ($category as $item)


                 <a href="{{url('home/product',$item->id)}}"> <li data-filter=".des">{{$item->nameChild }}</li></a>
                  @endforeach

              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">

                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                        @if($product->images->count() > 0)
                        <a  href="{{ url('detail', $product->id) }}"><img height="230px" src="{{ asset('storage/' . $product->images[0]->url) }}" alt=""></a>
                        @endif
                        <div class="down-content">
                          <h6>                          {{number_format($product->price, 0, ',', '.')}} Vnđ
                          </h6>
                          <a href="#"><h4>{{$product->Pname}}</h4></a>


                          <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
{{--                          <span>Reviews (12)</span>--}}
                        </div>
                      </div>
                    </div>
                   @endforeach

                </div>

            </div>
          </div>

          <div class="col-md-12">
            <ul class="pages">
                     @for ($i = 1; $i <= $products->lastPage(); $i++)
                     <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                        <a  href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor
                </ul>
            </div>


        </div>
      </div>
    </div>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

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


  </body>

</html>
