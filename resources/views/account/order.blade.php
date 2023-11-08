<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{asset('asset/css/product-admin/fontawesome.min.css')}}" />

    <!-- https://fontawesome.com/ -->
     <link rel="stylesheet" href="{{asset('asset/css/product-admin/bootstrap.min.css')}}" />

    <!-- https://getbootstrap.com/ -->
     <link rel="stylesheet" href="{{asset('asset/css/product-admin/templatemo-style.css')}}" />

    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
   @include('account.nav')
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
  
            <div class="tm-product-table-container">
            <div>  @include('product-admin.flash2-message')</div>
            <br> 
            <h2 style="color: white">Đơn Hàng</h2>
            
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>

                    <th scope="col">ID</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">SL</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orderDetails as $p)
                 
                  <tr>
                    <th scope="row">{{$p->id}}</th>
                    
                    <td  class="tm-product-name"><a style="color: white" href="{{url('detail',$p->Product_id)}}">{{$p->Product_name}}</a></td>
      
                    <td>{{number_format($p->price, 2, ',', '.')}}</td>
                    
                    <td>{{$p->quantity}}</td>
               
                  
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- table container -->
    
              <!-- <button class="btn btn-primary btn-block text-uppercase">
                
              </button> -->
          </div>
        </div>    
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Thông Tin Mua Hàng</h2>
            <div class="tm-product-table-container">
            <div>  @include('product-admin.flash2-message')</div>

              <table class="table tm-table-small tm-product-table">
                <tbody style="color: white">
                  
                    <tr>
                        <td > Họ Tên</td>
                        <td class="tm-product-name">  {{$order->Name}} </a> </td>
                        

                    </tr>
                    <tr>
                        <td>Liên Hệ</td>
                        <td class="tm-product-name">  {{$order->Phone}} </a> </td>    
                    </tr>
                    <tr>
                        <td>Liên Hệ</td>
                        <td class="tm-product-name">  {{$order->address}} </a> </td>    
                    </tr>
                    <tr>
                      <td>Tổng Đơn</td>
                      <td class="tm-product-name"> {{number_format($order->amount, 0, ',', '.')}} đ</a> </td>    
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            @if ($order->status_payment==0)
            <a href="{{url('order/pay',$order->id)}}">
            <button class="btn btn-primary btn-block text-uppercase mb-3">
               Thanh Toán
              </button></a>
              @else
              <button class="btn btn-primary btn-block text-uppercase mb-3">
                Đã Thanh Toán
                </button>
            @endif

            @if($order->status_order==3)
            <a href="{{url('order/confirm',$order->id)}}">
            <button class="btn btn-success btn-block text-uppercase mb-3">
             xác Nhận
            </button>


          @elseif($order->status_order==1&& $order->status_delivery==0)
          {{-- <a href="{{url('order/delivering',$order->id)}}">
            <button class="btn btn-success btn-block text-uppercase mb-3">
           Giao Hàng
           </button> </a> --}}
           <a href="{{url('order/cancel',$order->id)}}">
            <button class="btn btn-danger btn-block text-uppercase mb-3">
             Huỷ Đơn
            </button> 

        </a>        
           @elseif($order->status_delivery==1)
           
           <button class="btn btn-success btn-block text-uppercase mb-3">
            Đang Giao Hàng
            </button> 

          @elseif($order->status_delivery==2 && $order->status_payment==1 )
          <button class="btn btn-success btn-block text-uppercase mb-3">
            Đơn Hàng Hoàn Tất
            </button>   
          @endif
       
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>

    <script src="{{asset('asset/js/product-admin/jquery-3.3.1.min.js')}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{asset('asset/js/product-admin/bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->

    <script>
</script>
  </body>
</html>