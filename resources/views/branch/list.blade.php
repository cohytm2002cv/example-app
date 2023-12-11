

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
                <form method="GET" action="{{ route('search') }}">


                </form>
                <div class="tm-product-table-container">

                    <div>  @include('product-admin.flash-message')</div>
                    <br>


                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                        <tr>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">Code</th>
                            <th scope="col">Chiết khấu</th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <table class="table tm-table-small tm-product-table">

                            <tbody>
                            @foreach($branchs as $branch)

                                <tr>
                                    <td >
                                        <a style="color: white" href="{{route('branch.edit',$branch->id)}}">
                                            {{$branch->name}}
                                        </a></td>
                                    <td>{{$branch->address}}</td>
                                    <td>{{$branch->phone}}</td>
                                    <td>{{$branch->email}}</td>
                                    <td>
                                        <a onclick="return confirm('Bạn Muốn Xoá Voucher này');" href="{{url('branch/delete',$branch->id)}}"  class="tm-product-delete-link">
                                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                        </a>
                                    </td>

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




</body>
</html>
