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
                <form action="{{route('updatecate')}}" method="post" class="tm-edit-product-form"
                > 
                
                @csrf
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      > Tên Sản Phẩm
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      value="{{$cate->nameChild}}"
                     
                      class="form-control validate"
                    />
                    <input name="id" type="hidden" value="{{$cate->id}}"> 
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Mô Tả</label
                    >
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="5"
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="cate" name="cate"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category" name='cate'
                    >
                    
                  </div>
                  <div class="row">
                      
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Giá
                          </label>
                          <input
                            id="stock"
                            name="price"
                            type="text"
                            value=""
                            class="form-control validate"
                          />
                        </div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
               
                </div>
     
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">CẬP NHẬT</button>
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
