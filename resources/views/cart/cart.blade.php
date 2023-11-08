{{-- @foreach ($cart as $productId => $item)
    <div>
        <h4>{{ $item['product']->name }}</h4>
        <p>Số lượng: {{ $item['quantity'] }}</p>
        <p>Giá: {{ $item['product']->price }}</p>
    </div>
@endforeach --}}

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('asset/css/homepg/styles.css')}}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />


    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('asset/css/cart/cart.css')}}">


    <link href="{{asset('asset/assets/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet" />

</head>
<body>
    @include('home.nav')
    <div style="width:100%">
        <div style="margin-bottom: 5%" >
        
        </div>
        <div class="card">
        
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>GIỎ HÀNG </b></h4></div>
                            <div class="col align-self-center text-right text-muted"></div>
                        </div>
                    </div>    

                    @foreach ($cart as $productId => $item)
    
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-4"><img class="img-fluid" src="{{ asset('storage/' . $item['product']->images[0]->url) }}" ></div>
                            <div class="col-2">
                                <div class="row text-muted"></div>
                                <div class="row"> {{ $item['product']->Pname }}</div>
                            </div>
                            <div class="col" style="text-align: center">
                                <a href="{{ route('decreaseQuantity', ['productId' => $productId]) }}">-</a>
                                <a href="#" class="border">{{ $item['quantity'] }}</a>
                                <a href="{{ route('increaseQuantity', ['productId' => $productId]) }}">+</a>
                            </div>
                            <div class="col" style="color: rgb(215, 100, 90)">
                                @if(session('error'))
                                <div >
                                    {{ session('error') }}
                                </div>
                            @endif
                            </div>
                            <div class="col">&euro;   {{number_format($item['product']->price*$item['quantity'], 0, ',', '.')}}     đ<a href="{{ route('removeItemFromCart', ['productId' => $productId]) }}"><span class="close">&#10005;</span></a></div>
                          
                        </div>
                    </div>
                    @endforeach
    
                   
                    <div class="back-to-shop"><a href="{{route('trangchu')}}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">Tên Khách Hàng</div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    <form method="post" action="{{route('checkout')}}">
                        @csrf


                        <label for="pickupOption">
                            <input type="radio" name="deliveryOption" id="pickupOption" value="pickup"> Nhận tại cửa hàng
                        </label>
                    
                        <label for="deliveryOption">
                            <input type="radio" name="deliveryOption" id="deliveryOption"  value="delivery"> Nhận tại nhà
                        </label>
                    
                        <div id="pickupAddress" style="display: none;">
                            
                    
                            <label for="district">Chi Nhánh:</label>
                            <select id="district" name="district">
                                <option value="">Chọn chi nhánh</option>
                                <option value="District1">số 233, phường 12, Q.10, TP.HCM</option>
                                <option value="District2">số 33, phường 17, Q.5, TP.HCM</option>
                                <!-- Thêm các quận/huyện khác tại đây -->
                            </select>
                            
                        </div>
                    
                        <div id="deliveryAddress" style="display: none;">
                            <label for="deliveryAddressField">Địa chỉ giao hàng:</label>
                            <input class="input" type="text" placeholder="Nhập địa chỉ" id="deliveryAddressField">
                        </div>
                        <p>GIVE CODE</p>
                        <input class="input" type="text" value="{{ session('fullname') }}" name="user_fullname" placeholder="ho ten">
                        <input class="input" type="text" value="{{ session('user_address') }}" name="user_address" placeholder="email">
                        <input class="input" type="text" value="{{ session('user_phone') }}" name="user_phone" placeholder="phone">
                        <input class="input" type="text" value="{{ session('user_id') }}" name="user_id" placeholder="id">
                        <input id="tongtien"  name="tongtien" type="hidden" value={{$total-$total*$discount/100 }}  >
                        <input id="total"  name="total" type="hidden" value={{$vnd}}  >

                        <input class="input"   value="{{ session('cartTotal') }}" placeholder="Enter your code">
                        <button id="submit" style="display:none" type="submit"></button>
                    </form>
                    <tr>
                        <td>
                            <form action="/checkvoucher" method="post">
                                @csrf
                                <input type="text" placeholder="Nhập mã voucher" name="code">
                                <button type="submit" value>Kiểm tra</button>
                                <input id="discount" name="discount" type="hidden" value={{$discount}}>
                
                            </form>
                        </td>
                    </tr>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">Tổng Tiền</div>
                        <div class="col text-right">&euro; 
                        <span style="font-size: 20px">   {{number_format( $vnd-$vnd*$discount/100 , 0, ',', '.')}} đ</span>
                    </div>
                    </div>
                  
                    <div  id="paypal-button-container" ></div>

                </div>
            </div>
            </div>


    
   
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AZShK1CZSvUJOHptbwB7VJlQbxHfjacLI00FE3-2zfMoNV_V7m4PUKfH2EhVmVDRDtbdJWdCMLe8avPQ"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // var cartTotal = document.getElementById('tongtien').value;
            var tien = document.getElementById('tongtien').value;
             var tien = parseFloat(tien);
                 tmp = (+tien).toFixed(2);
         // Thực hiện các thao tác để tạo đơn hàng (order) ở đây và trả về ID của đơn hàng
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: tmp, // Thay đổi số tiền thanh toán tại đây
                      
                    }
                    
                }]
            });
        },
        onApprove: function(data, actions) {
            // Thực hiện các thao tác khi thanh toán được phê duyệt
            return actions.order.capture().then(function(details) {
                // alert('Transaction completed by ' + details.payer.name.given_name);
                var submitButton = document.getElementById('submit');
        if (submitButton) {
            submitButton.click();
        }          
             });
        }
    }).render('#paypal-button-container');
</script>
<script>
    const pickupOption = document.getElementById("pickupOption");
    const deliveryOption = document.getElementById("deliveryOption");
    const pickupAddress = document.getElementById("pickupAddress");
    const deliveryAddress = document.getElementById("deliveryAddress");
    const deliveryAddressField = document.getElementById("deliveryAddressField");

    // Lắng nghe sự kiện thay đổi radio button
    pickupOption.addEventListener("change", function() {
        pickupAddress.style.display = "block";
        deliveryAddress.style.display = "none";
    });

    deliveryOption.addEventListener("change", function() {
        pickupAddress.style.display = "none";
        deliveryAddress.style.display = "block";
    });
</script>
</html>