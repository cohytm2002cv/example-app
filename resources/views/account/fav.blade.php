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
                <p class="text-white mt-5 mb-5"> <b></b></p>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row">


            <div class="col-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">SẢN PHẨM YÊU THÍCH</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">GIÁ</th>
                            <th scope="col">Thao Tác</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($fav as $item)
                            <tr>

                                <td><b><a style="color: white" href="{{url('detail',$item->product_id)}}">{{$item->name}}  </a></b></td>

                                <td> {{number_format($item->price, 0, ',', '.')}}đ</td>
                                <td><b>
                                        <a style="color: white" href="{{url('dellike',$item->id)}}">Bỏ Yêu Thích</a>
                                    </b></td>
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
