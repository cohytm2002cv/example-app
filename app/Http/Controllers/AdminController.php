<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\product;
use App\Models\Category;
use App\Models\Branchs;
use App\Models\ImageModel;
use App\Models\BranchProduct;
use App\Models\Branch_Product;
use App\Models\Orders;
use App\Models\Review;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
    
      $order=Orders::All();
      $topProducts = Product::orderBy('dem', 'desc')
      ->take(10) // Lấy 10 sản phẩm đầu tiên
      ->get();
      $revenue = Orders::where('status_payment', 1)->sum('amount');
      $weeklyRevenue = Orders::where('status_payment', 1)
      ->select(DB::raw('YEAR(created_at) as year'), DB::raw('WEEK(created_at) as week'), DB::raw('SUM(amount) as revenue'))
      ->groupBy('year', 'week')
      ->get();

      return view('product-admin.index',['order' => $order,
      'dem'=>$topProducts,
      'revenue'=>$revenue,
      'dailyRevenue'=>$weeklyRevenue,

    ]);
        // return view('product-admin.index');
    }
    public function products(){
      $branch=Branchs::All();
        $u=DB::table("product")
        ->get();
        $ct = DB::table('ChildCategory')
        ->get();
       return view('product-admin.products',['sanpham'=> $u,'cate'=>$ct,'branch'=>$branch]);
    }

    function addproduct(){  
        $ct=DB::table('ChildCategory')->get();
        $branchs=Branchs::All();
        return view('product-admin.add-product',[
          'cate'=>$ct,
          'branchs'=>$branchs
      ]);
    }

    public function delete($id){

        {     
          $product = Product::find($id);

         // Kiểm tra xem sản phẩm có tồn tại không
           if (!$product) {
        return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại.');
        }

          // Xóa tất cả các hình ảnh liên quan
          $product->images()->delete();
          
            // Nếu có, trước tiên xóa dữ liệu trong bảng liên kết với nhãn hiệu
            BranchProduct::where('product_id', $product->id)->delete();
            Review::where('product_id', $product->id)->delete();

            // Xóa sản phẩm
            $product->delete();
          return back()->with('success','Xoá Thành Công!');


            }
      }

      public function deletecate($id){

        {     
            $cate =DB::table('Product') 
            ->where('cateid',$id)
            ->count();
            
            if($cate <= 0){
            $cate = DB::table('ChildCategory')
            ->where('id',$id)
            ->get();
           $deleted = DB::table('ChildCategory')->where('id', '=', $id)->delete();
           return back()->with('success','Xoá Thành Công!');

            }
            else{
                
                return back()->with('error','Phân loại đang được sử dụng!');
            }
        }

      
      }
      public function editproduct($id){

        // {   $u =Product::find($id)
          $u = product::with('images')->find($id)
            ->where('id',$id)
            ->first();
            $ct = DB::table('ChildCategory')->get();
            return view('product-admin.edit-product',['sanpham'=>$u,'cate'=>$ct]);

        }
      
   
      public function update(Request $request){
        // dd($_POST);
        $name = $request->input('name');
        $id = $request->input('id');
        $price=$request->input('price');
        $cate=$request->input('cate');
        
        $img=$request->input('img');

          if($img!=null){
            DB::table('product')
            ->where('id', $id)
            ->update(['Pname' => $name,'price' => $price,'cateid' => $cate]);
        
          }
          else{
            DB::table('product')
            ->where('id', $id)
            ->update(['Pname' => $name,'price' => $price,'cateid' => $cate]);

            $image = $request->file('hinh');
            // Lưu ảnh vào thư mục lưu trữ
            $path = $image->store('uploads/img/product', 'public');
            // DB::table('Image')
            // ->where('Product_id', $id)
            // ->update(['url' => $path]);
            ImageModel::updateOrCreate(
              ['Product_id' => $id], // Điều kiện xác định bản ghi cần cập nhật hoặc thêm mới
              ['url' => $path,'Product_id'=>$id,'name'=> $image->getClientOriginalName()]);
            
          }
     

       return redirect('products');
    }
    


    public function add(Request $request)
{
    // $request->validate([
    //     'name' => 'required',
    //     'price' => 'required|numeric',
    //     'img' => 'required|image|mimes:jpeg,png,jpg,gif',
    // ]);

    $product = new product;
    $product->Pname = $request->input('name');
    $product->price = $request->input('price');
    $product->cateid = $request->input('cate');
    $product->des=$request->input('des');
    $product->save();
    $branchproduct=new Branch_Product;
    
    $branchproduct->qty=$request->input('qty');
    $branchproduct->branchs_id = $request->input('branch');
    $branchproduct->product_id=$product->id;
    $branchproduct->save();


    if ($request->hasFile('hinh')) {
      $image = $request->file('hinh');
      // Lưu ảnh vào thư mục lưu trữ
      $path = $image->store('uploads/img/product', 'public');
      // Tạo bản ghi trong cơ sở dữ liệu
      $imageModel = new ImageModel();
      $imageModel->name = $image->getClientOriginalName();
      $imageModel->url = $path;
      $imageModel->Product_id = $product->id; // Gán khoá ngoại sản phẩm (thay thế bằng cách tương ứng)
      $imageModel->save();

      }
       $branches = $request->input('branches');
        $quantities = $request->input('quantities');

        foreach ($branches as $branch) {
            BranchProduct::create([
                'product_id' => $product->id,
                'branchs_id' => $branch,
                'qty' => $quantities[$branch],
            ]);
        }
        $u=DB::table("product")
            ->get();
            $ct = DB::table('ChildCategory')->get();
           return view('product-admin.products',[
            'sanpham'=> $u,'cate'=>$ct
          ]);
          

    }



    public function editcategory($id){
            $ct = DB::table('ChildCategory')
            ->where('id',$id)
            ->first();
            return view('product-admin.edit-category',['cate'=>$ct]);

    }

    public function updatecate(Request $request){
        // dd($_POST);
        $name = $request->input('name');
        $id = $request->input('id');
       
            DB::table('ChildCategory')
            ->where('id', $id)
            ->update(['nameChild' => $name]);
            return redirect('products');
    }


    public function searchp(Request $request)
    {
        $query = $request->input('query');
        // Xử lý tìm kiếm dựa trên biến $query
        // Ví dụ: Sử dụng Eloquent để truy vấn cơ sở dữ liệu
        $u =DB::table('Product') ->where('Pname', 'like', '%' . $query . '%')->get();
        $ct =DB::table('ChildCategory') ->get();
        return view('product-admin.products',['sanpham'=> $u,'cate'=>$ct]);
      
    }
    public function showbranchs(){
      $branchs=Branchs::all();
      return view('product-admin.createbranch',[
        'branchs'=>$branchs
      ]);
    }
    public function destroybranch($id){

      {     
          $branch =DB::table('branch_product') 
          ->where('branchs_id',$id)
          ->count();
          
          if($branch <= 0){
         $deleted = DB::table('Branch')->where('id', '=', $id)->delete();
         return back()->with('success','Xoá Thành Công!');

          }
          else{
              
              return back()->with('error','Phân loại đang được sử dụng!');
          }
      }
    }
    public function createbranch(Request $request){
      $branch=new Branchs;
    
      $branch->name=$request->input('name');
      $branch->phone = $request->input('phone');
      $branch->address = $request->input('address');
      $branch->email=$request->input('email');
      $branch->longitude=$request->input('long');
      $branch->latitude=$request->input('lat');
      $branch->save();
      return back();
    }
    
}
