<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts - Product Admin Template</title>
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


  </head>

  <body id="reportsPage">
    <div class="" id="home">
     @include('product-admin.nav')
      <div class="container mt-5">

        <!-- row -->
        <div class="row tm-content-row">
            <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Change Avatar</h2>
              <div style="background-color:white" class="tm-product-img-dummy mx-auto">
                <img style="width:100%;height:100%" id="img-preview" alt="">
              </div>
            </div>
            <button   onclick="document.getElementById('fileInput').click();"
            class="btn btn-primary btn-block text-uppercase">
            Tải Ảnh Lên
           </button>
            </div>


          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title"></h2>
              <form action="{{route('addaccount')}}" method="POST" class="tm-signup-form row" enctype="multipart/form-data"  >
                 @csrf
                 <input id="fileInput" required name="hinh" type="file"  style="display:none;" />
                <div class="form-group col-lg-6">
                  <label for="name">Họ Tên</label>
                  <input
                    id="name"
                    name="fullname"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <input name="id" type="hidden" >
                  <div class="form-group col-lg-6">
                      <label for="phone">UserName</label>
                      <input
                          id="phone"
                          name="username"
                          type="text"
                          class="form-control validate"
                      />
                  </div>
                <div class="form-group col-lg-6">
                  <label for="email">Email</label>
                  <input
                    id="email"
                    name="email"
                    type="text"
                    class="form-control validate"
                  />

                </div>
                <div class="form-group col-lg-6">
                    <label for="email">Địa Chỉ</label>
                    <input
                      id="email"
                      name="address"
                      type="text"
                      class="form-control validate"
                    />

                  </div>
                  <div class="form-group col-lg-6">
                    <label for="phone">Phone</label>
                    <input
                      id="email"
                      name="phone"
                      type="text"
                      class="form-control validate"
                    />

                  </div>
                <div class="form-group col-lg-6">
                        <p class="text-white">Giới Tính</p>
                        <select name="gender" class="custom-select">
                            <option value="0" >Nữ</option>
                            <option value="1" >Nam</option>
                        </select>

                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Password</label>
                  <input
                    id="password2"
                    type="text"
                    name="pass"
                    class="form-control validate"
                  />
                </div>

                <div class="form-group col-lg-6">
                    <p class="text-white">Trạng Thái</p>
                    <select name="status" class="custom-select">
                        <option value="1" >Kích Hoạt</option>
                        <option value="2" >Vô Hiệu Hoá</option>
                    </select>

                </div>
                <div class="form-group col-lg-6">
                  <p class="text-white">Chi Nhánh</p>
                  <select name="branch" class="custom-select">
                    @foreach ($branchs as $branch)
                      <option value="{{$branch->id}}" >{{$branch->name}}</option>
                      @endforeach
                  </select>

              </div>
                <div class="col-12">
                  <button
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                  >
                    Cập Nhật Tài Khoản
                  </button>
                </div>
              </form>
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
    <script src="{{asset('asset/js/product-admin/bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->
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
