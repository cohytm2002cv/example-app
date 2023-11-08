<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('asset/css/login.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('/asset/css/homepg/styles.css')}}" rel="stylesheet" />

    <link href="{{asset('asset/assets/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/css/templatemo-sixteen.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
</head>

<body>
    @include('home.nav')
	<section class="login">
		<div class="login_box">
			<div class="left">

				<div class="top_link"><a href="{{route('trangchu')}}"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">
                    Quay Lại </a></div>
				
                <div class="contact">
                    
					<form id="registration-form" action="{{route('registerform')}}" method="POST">
                        @csrf
						<h3>Đăng Ký</h3>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
						<input name="username" required type="text" placeholder="Tài Khoản">
                        <span id="phone-error" style="color: red;"></span>

                        <input name="phone" required id="phone" type="text" placeholder="số điện thoại">
                        <span id="repass-error" style="color: red;"></span>

						<input name="pass" id="pass" required type="text" placeholder="Mật Khẩu">
                        <input name="repass" id="repass" required type="text" placeholder="Xác Nhận Mật Khẩu">
						<button class="submit">Đăng Ký</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>Shop Tiền Cổ</h2>
					<h5>Giá Trị Vượt Thời Gian</h5>
				</div>
				{{-- <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div> --}}
			</div>
		</div>
	</section>
    <script>
        // Get the elements for phone, pass, and repass
        var phoneInput = document.getElementById('phone');
        var passInput = document.getElementById('pass');
        var repassInput = document.getElementById('repass');
        var repassError = document.getElementById('repass-error');

        // Add an event listener to repass input to check for password matching
        repassInput.onchange = function () {
            if (passInput.value !== repassInput.value) {
                repassError.textContent = 'Mật khẩu không khớp';
            } else {
                repassError.textContent = '';
            }
        };

        document.getElementById('registration-form').addEventListener('submit', function (e) {
            // Prevent the form from submitting
            e.preventDefault();

            // Get the value of the phone number field
            var phone = phoneInput.value;

            // Get the error message element for phone
            var phoneError = document.getElementById('phone-error');

            // Check if the phone number is valid
            if (!/^\d{10}$/.test(phone)) {
                phoneError.textContent = 'Số điện thoại không hợp lệ (yêu cầu 10 chữ số)';
            } else {
                phoneError.textContent = '';

                // Check if the passwords match
                if (passInput.value !== repassInput.value) {
                    repassError.textContent = 'Mật khẩu không khớp';
                } else {
                    // Phone number and passwords are valid, remove any error messages
                    repassError.textContent = '';

                    // Submit the form (or you can use AJAX to submit the form data)
                    this.submit();
                }
            }
        });
    </script>
</body>
</html>
