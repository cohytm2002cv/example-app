




    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Edit Product - Dashboard Admin Template</title>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:400,700"
        />
        <!-- https://fonts.google.com/specimen/Roboto -->
        <link rel="stylesheet" href="{{asset('asset/css/product-admin/fontawesome.min.css')}}" />
        <!-- https://fontawesome.com/ -->
        <link rel="stylesheet" href="{{asset('asset/jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
        <!-- http://api.jqueryui.com/datepicker/ -->
        <link rel="stylesheet" href="{{asset('asset/css/product-admin/bootstrap.min.css')}}" />
        <!-- https://getbootstrap.com/ -->
        <link rel="stylesheet" href="{{asset('asset/css/product-admin/templatemo-style.css')}}">
        <!--
        Product Admin CSS Template
        https://templatemo.com/tm-524-product-admin
        -->
    </head>

    <body>
    @include('product-admin.nav')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Cập Nhật Sản Phẩm </h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="{{ route('voucher.update', $voucher->id) }}" method="POST">
                                @csrf
                                @method('PUT')


                                <div class="form-group mb-3">
                                    <label
                                        for="name"
                                    > Mã code
                                    </label>
                                    <input
                                        id="name"
                                        name="code"
                                        type="text"
                                        value="{{$voucher->code}}"

                                        class="form-control validate"
                                    />
                                    <label
                                        for="name"
                                    > Chiết khấu
                                    </label>
                                    <input
                                        id="discount"
                                        name="discount"
                                        type="number"
                                        value="{{$voucher->discount}}"

                                        class="form-control validate"
                                    />
                                    <label
                                        for="name"
                                    >Số lượng
                                    </label>
                                    <input
                                        id="name"
                                        name="sl"
                                        type="number"
                                        value="{{$voucher->sl}}"

                                        class="form-control validate"
                                    />
                                    <label
                                        for="name"
                                    > Ngày bắt đầu
                                    </label>
                                    <input
                                        id="name"
                                        name="start_date"
                                        type="date"
                                        value="{{$voucher->start_date}}"

                                        class="form-control validate"
                                    />
                                    <label
                                        for="name"
                                    > Ngày kết thúc
                                    </label>
                                    <input
                                        id="name"
                                        name="end_date"
                                        type="date"
                                        value="{{$voucher->end_date}}"

                                        class="form-control validate"
                                    />
                                    <br>
                                    <button type="submit" class="btn btn-primary">Cập nhật Voucher</button>
                                </div>
                            </form>
                        </div>
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
        <script src="{{asset('asset/jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
        <!-- https://jqueryui.com/download/ -->
        <script src="{{asset('asset/js/product-admin/bootstrap.min.js')}}"></script>
        <script>
            $(function() {
                $("#expire_date").datepicker({
                    defaultDate: "10/22/2020"
                });
            });
        </script>
        <script>
            const input = document.getElementById('fileInput');
            const image = document.getElementById('img-preview');

            input.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
        </script>
    </body>
    </html>

