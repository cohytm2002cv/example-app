<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{asset('asset/css/product-admin/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('asset/css/product-admin/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('asset/css/product-admin/templatemo-style.css')}}">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
<div class="" id="home">
    @include('account.nav');
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-white mt-5 mb-5"><b></b></p>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">
            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">DANH SÁCH ĐƠN Hàng</h2>

                    <table class="table">
                        <thead>
                        <tr>
                            <form action="{{ route('orders.search') }}" method="post">
                                @csrf
                                <th scope="col">Từ</th>
                                <th scope="col"><input type="date" name="from-date" id=""></th>
                                <th scope="col">Đến</th>
                                <th scope="col"><input type="date" name="to-date" id=""></th>
                                <th scope="col">
                                    <button type="submit" class="btn-primary">Tìm</button>
                                </th>
                            </form>
                            <form action="{{ route('orders.status') }}" method="post">
                                @csrf
                                <th scope="col">
                                    <button name="status" type="submit" value="canceled" style="width: 80px;"
                                            class="btn-danger">Đã Huỷ
                                    </button>
                                </th>
                                <th scope="col">
                                    <button name="status" type="submit" value="completed" style="width: 100px;"
                                            class="btn-success">Hoàn tThành
                                    </button>
                                </th>

                                <th scope="col">
                                    <button name="status" type="submit" value="delivery" style="width: 100px;"
                                            class="btn-secondary">Đang Giao
                                    </button>
                                </th>
                            </form>

                        </tr>


                        <tr>
                            <th scope="col">ORDER NO.</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">Khách Hàng</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Ngày Mua</th>
                            <th scope="col">Giao Hàng</th>
                            <th scope="col">Thanh Toán</th>
                            <th scope="col"></th>
                        </tr>


                        </thead>
                        <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <th scope="row"><b>{{$item->id}}</b></th>
                                <td>
                                    @if ($item->status_order == 0)
                                        <span style="color: red;font-weight:bold">Đã huỷ</span>
                                    @elseif ($item->status_order == 1)
                                        <span>Đang xác nhận</span>
                                    @elseif ($item->status_order == 2)
                                        <span style="color: greenyellow;font-weight:bold">Hoàn Tất</span>
                                    @endif

                                </td>
                                <td><b>{{$item->Name}}</b></td>

                                <td> {{number_format($item->amount, 0, ',', '.')}}đ</td>
                                <td>{{$item->created_at}}</td>
                                <td>

                                    @if ($item->status_delivery == 0)
                                        <b>chưa giao</b>
                                    @elseif($item->status_delivery == 1)
                                        <b>Đang giao</b>
                                    @elseif($item->status_delivery == 2)
                                        <b>Đã giao</b>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status_payment == 1)
                                        <span>
                                        Đã thanh toán</span>
                                    @elseif($item->status_payment == 0)
                                        <span style="font-weight:bold"
                                        >Chưa thanh toán</span>
                                    @endif
                                </td>
                                <td>
                                    <b><a style="color: white" href="{{url('account/order',$item->id)}}">Xem</a></b>
                                </td>


                            </tr>

                        @endforeach

                        </tbody>

                    </table>
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
</div>

<script src="{{asset('asset/js/product-admin/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('asset/js/product-admin/moment.min.js')}}"></script>
<!-- https://momentjs.com/ -->
<script src="{{asset('asset/js/product-admin/Chart.min.js')}}"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="{{asset('asset/js/product-admin/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script src="{{asset('asset/js/product-admin/tooplate-scripts.js')}}"></script>
<script>
    Chart.defaults.global.defaultFontColor = 'white';
    let ctxLine,
        ctxBar,
        ctxPie,
        optionsLine,
        optionsBar,
        optionsPie,
        configLine,
        configBar,
        configPie,
        lineChart;
    barChart, pieChart;
    // DOM is ready
    $(function () {
        drawLineChart(); // Line Chart
        drawBarChart(); // Bar Chart
        drawPieChart(); // Pie Chart

        $(window).resize(function () {
            updateLineChart();
            updateBarChart();
        });
    })
</script>
</body>

</html>
