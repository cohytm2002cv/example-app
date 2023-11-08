<?php

namespace App\Http\Controllers;
use App\Http\Controllers\trangchucontroller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
 use App\Models\product;
 use App\Models\Review;
 use App\Models\Branchs;
 use App\Models\Category;


 use App\Models\ImageModel;

 use Illuminate\Http\Request;


class trangchucontroller extends Controller

{
    public function show()
  {
    
    $u = product::with('images')->get();

    $category = Category::all();
    $reviews = [];
    $i=0;
    foreach ($u as $product) {
        $review = Review::where('product_id', $product->id)->count();
        $reviews[$i]=$review;
      $i++; 
    }


        return view('home.home',['name'=>$u,'category'=>$category,'reviews'=>$reviews]);

  } 
  public function list()
  {
    $category = Category::all();
  $products = Product::with('images')
  ->paginate(6); // 10 sản phẩm trên mỗi trang
  return view('home.list', ['products' => $products,'category'=>$category]);
  } 
  public function listcate($id)
  {
    $category = Category::all();
  $products = Product::with('images')
  ->where('cateid',$id)
  ->paginate(6); // 10 sản phẩm trên mỗi trang
  return view('home.list', ['products' => $products,'category'=>$category]);
  } 
  public function login(){
    return view('home.login');
  }
    
  public function detail($id)
  {    
     $u = product::with('branchproducts','images')
    ->where('id',$id)
    ->first();
    
    if (!$u) {
      // Xử lý khi không tìm thấy sản phẩm
      return redirect()->route('not-found'); // Điều hướng đến trang thông báo không tìm thấy
  }
    $u->dem += 1;
    $u->save();
    $comments = Review::with('User')
    ->where('product_id',$id)
    ->get();

    $limitedProducts = Product::take(4)
    ->where('cateid',$u->cateid)
    ->get(); // Lấy ra tối đa 4 sản phẩm



    $customerLatitude = 10.769315; // Latitude của khách hàng
    $customerLongitude =106.661201; // Longitude của khách hàng
    


    $branchesWithProducts = $u->branchproducts->where('qty', '>', 0);
    // Tạo một mảng khoảng cách
    $distances = [];

    // Tính toán khoảng cách từ khách hàng đến từng chi nhánh
    foreach ($branchesWithProducts as $branchProduct) {
        $branch = $branchProduct->branchs;
        // dd($branch->latitude);
        $branchLatitude = $branch->latitude;
        $branchLongitude = $branch->longitude;
        $distance = $this->calculateDistance($customerLatitude, $customerLongitude, $branchLatitude, $branchLongitude);
        $distances[$branch->id] = $distance;
    }

    // Sắp xếp mảng khoảng cách theo giá trị tăng dần
    asort($distances);

    // Lấy ra 2 chi nhánh gần nhất
    $nearestBranches = array_slice($distances, 0, 2, true);

    // Lấy thông tin chi tiết của các chi nhánh gần nhất
    $nearestBranchesInfo = Branchs::whereIn('id', array_keys($nearestBranches))->get();



    return view('home.detail',['sanpham'=>$u,
                'list'=>$limitedProducts,
                'review'=>$comments,
                'branch'=>$nearestBranchesInfo,
                'branchs'=>$branchesWithProducts
              ]);
    
  }

  public function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Bán kính Trái Đất (đơn vị: km)
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c; // Khoảng cách giữa hai điểm
    return $distance;
  }


  public function dangky(){
       return view('dangky');
  }



  public function submit(Request $request){
    // dd($_POST);
      $name = $request->input('ten');
      $pass = $request->input('pass');
      DB::table('product')->insert([
      ['Pname' => $name, 'price' => 3,'img'=>$pass]
      ]);
  }


  public function search(Request $request){
    // dd($_POST);
    $query = $request->input('query');
    $name =  Product::where('Pname', 'like', '%' . $query . '%')->get();
    return view('home.home', compact('name'));  

  }
  public function findByCategory(Request $request)
{
    $id = $request->input('category');
    $category = Category::all();

    if ($id) {
        
        if ($id) {
          $name =  Product::where('cateid', $id )->get();
          return view('homepage', compact('name', 'category'));
        }
    }

    return redirect()->route('homepage')->with('error', 'Không tìm thấy loại sản phẩm.');
}





}



