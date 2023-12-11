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
   @include('product-admin.nav')
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <form method="GET" action="{{ route('searchp') }}">
              <div class="input-group">
                  <input type="text" name="query" class="form-control" placeholder="Tìm kiếm tên sản phẩm">
                  <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                  </div>
              </div>

          </form>
            <div class="tm-product-table-container">
            <div>  @include('product-admin.flash2-message')</div>
            <br>
            <a href="{{url('addproduct')}}"
            class="btn btn-primary btn-block text-uppercase mb-3">Tạo Sản Phẩm Mới</a>
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">IN STOCK</th>
                    <th scope="col">EXPIRE DATE</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sanpham as $p)

                  <tr>
                    <th scope="row"><input type="checkbox" /></th>

                    <td  class="tm-product-name"><a style="color: white" href="{{url('edit-product',$p->id)}}">{{$p->Pname}}</a></td>

                    <td>{{number_format($p->price, 2, ',', '.')}}</td>

                    <td>550</td>
                    <td>28 March 2019</td>
                    <td>
                      <a style="color: white" onclick="return confirm('Bạn Muốn Xoá Sản Phẩm Này');" href="{{url('delete',$p->id)}}" class="tm-product-delete-link">
                        xoá
                      </a>
                    </td>

                  </tr>
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
            <h2 class="tm-block-title">Loại Sản Phẩm</h2>
            <div class="tm-product-table-container">
              <div>  @include('product-admin.flash2-message')</div>

              <table class="table tm-table-small tm-product-table">
                <tbody>
                  @foreach($cate as $ct)
                  <tr>
                    <td class="tm-product-name"> <a style="color: white" href="{{url('edit-category',$ct->id)}}"> {{$ct->nameChild}} </a> </td>
                    <td class="text-center">

                    <a style="color: white" onclick="return confirm('Bạn Muốn Xoá Phân Loại Này');" href="{{url('deletecate',$ct->id)}}" class="tm-product-delete-link">
                     xoá
                      </a>

                    </td>
                  </tr>

                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              Tạo Loại Sản Phẩm Mới
            </button>
            <div class="tm-product-table-container">
              <div>  @include('product-admin.flash2-message')</div>

              {{-- <table class="table tm-table-small tm-product-table">
                <tbody>
                  @foreach($branch as $ct)
                  <tr>
                    <td class="tm-product-name"> <a style="color: white" href="{{url('edit-category',$ct->id)}}"> {{$ct->name}} </a> </td>
                    <td class="text-center">

                    <a style="color: white" onclick="return confirm('Bạn Muốn Xoá Phân Loại Này');" href="{{Route('branch.destroy',$ct->id)}}" class="tm-product-delete-link">
                     xoá
                      </a>
                    </td>
                  </tr>

                  @endforeach

                </tbody>
              </table> --}}


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
