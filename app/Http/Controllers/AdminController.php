<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;

use App\Models\Branchs;
use App\Models\ImageModel;
use App\Models\BranchProduct;
use App\Models\Orders;
use App\Models\Review;
use App\Models\Fav;

use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AdminController extends Controller
{
//    public function show()
//    {
//        $order = Orders::orderBy('created_at', 'DESC')->get();
//        $topProducts = Product::orderBy('dem', 'desc')
//            ->take(10) // Lấy 10 sản phẩm đầu tiên
//            ->get();
//        $revenue = Orders::where('status_payment', 1)->sum('amount');
//        $weeklyRevenue = Orders::where('status_payment', 1)
//            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('WEEK(created_at) as week'), DB::raw('SUM(amount) as revenue'))
//            ->groupBy('year', 'week')
//            ->get();
//
//        return view('product-admin.index', ['order' => $order,
//            'dem' => $topProducts,
//            'revenue' => $revenue,
//            'dailyRevenue' => $weeklyRevenue,
//
//        ]);
//    }
//    public function status_admin(Request $request)
//    {
//        $status = $request->input('status');
//
//        if ($status === 'canceled') {
//            $order = Orders::where('status_order', 0)
//                ->get(); // Assuming status = 1 means cancelled
//        } elseif ($status === 'completed') {
//            $order = Orders::where('status_order', 2)
//                ->get(); // Assuming status = 1 means cancelled
//        }
//        elseif ($status === 'delivery') {
//            $order = Orders::where('status_order', 1)
//                ->get(); // Assuming status = 1 means cancelled
//        }
//
//        else {
//            // Handle other cases or set default behavior
//            $order = Orders::all();
//        }
//        return view('product-admin.index', compact('order'));
//    }
    public function show()
    {
        $data = $this->getData();
        return view('product-admin.index', $data);
    }

    public function status_admin(Request $request)
    {
        $status = $request->input('status');
        $order = $this->getFilteredOrders($status);

        return view('product-admin.index', ['order' => $order] + $this->getData());
    }

    private function getData()
    {
        $order = Orders::orderBy('created_at', 'DESC')->get();
        $topProducts = Product::orderBy('dem', 'desc')->take(10)->get();
        $revenue = Orders::where('status_payment', 1)->sum('amount');
        $weeklyRevenue = Orders::where('status_payment', 1)
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('WEEK(created_at) as week'), DB::raw('SUM(amount) as revenue'))
            ->groupBy('year', 'week')
            ->get();

        return [
            'order' => $order,
            'dem' => $topProducts,
            'revenue' => $revenue,
            'dailyRevenue' => $weeklyRevenue,
        ];
    }

    public function revenueStatistics(Request $request)
    {
        $selectedMonth = $request->input('month', date('n'));

        $revenue = Orders::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total_revenue')
        )
            ->whereMonth('created_at', $selectedMonth)
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('product-admin.index', ['revenue' => $revenue] + $this->getData());
    }

    public function search_admin(Request $request)
    {
        $fromDate = $request->input('from-date');
        $toDate = $request->input('to-date');
        if ($fromDate && $toDate) {
            $orders = Orders::whereBetween('created_at', [$fromDate, $toDate])->get();

        } else {
            $orders = Orders::all();

        }
        return view('product-admin.index', ['order' => $orders] + $this->getData());
    }

    private function getFilteredOrders($status)
    {
        if ($status === 'canceled') {
            return Orders::where('status_order', 0)->get();
        } elseif ($status === 'completed') {
            return Orders::where('status_order', 2)->get();
        } elseif ($status === 'delivery') {
            return Orders::where('status_order', 1)->get();
        } else {
            // Handle other cases or set default behavior
            return Orders::all();
        }
    }

    public function products()
    {
        $branch = Branchs::All();
        $u = Product::with('branchproducts')->get();
        $ct = DB::table('ChildCategory')
            ->get();
        return view('product-admin.products', ['sanpham' => $u, 'cate' => $ct, 'branch' => $branch]);
    }

    public function searchp(Request $request)
    {
        $query = $request->input('query');
        // Xử lý tìm kiếm dựa trên biến $query
        // Ví dụ: Sử dụng Eloquent để truy vấn cơ sở dữ liệu
        $u = $u = Product::with('branchproducts')->where('Pname', 'like', '%' . $query . '%')->get();
        $ct = DB::table('ChildCategory')->get();
        return view('product-admin.products', ['sanpham' => $u, 'cate' => $ct]);

    }

    function addproduct()
    {
        $ct = DB::table('ChildCategory')->get();
        $branchs = Branchs::All();
        return view('product-admin.add-product', [
            'cate' => $ct,
            'branchs' => $branchs
        ]);
    }

    public function delete($id)
    {

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
            return back()->with('success', 'Xoá Thành Công!');


        }
    }

    public function deletecate($id)
    {

        {
            $cate = DB::table('Product')
                ->where('cateid', $id)
                ->count();

            if ($cate <= 0) {
                $cate = DB::table('ChildCategory')
                    ->where('id', $id)
                    ->get();
                $deleted = DB::table('ChildCategory')->where('id', '=', $id)->delete();
                return back()->with('success', 'Xoá Thành Công!');

            } else {

                return back()->with('error', 'Phân loại đang được sử dụng!');
            }
        }


    }

    public function editproduct($id)
    {

        $u = product::with('images')->find($id)
            ->where('id', $id)
            ->first();
        $ct = DB::table('ChildCategory')->get();
        $branchs = Branchs::where('id', session('user_branch'))->get();
        return view('product-admin.edit-product', [
            'sanpham' => $u,
            'cate' => $ct,
            'branchs' => $branchs
        ]);

    }


    public function update(Request $request)
    {
        // dd($_POST);
        $name = $request->input('name');
        $id = $request->input('id');
        $price = $request->input('price');
        $cate = $request->input('cate');
        $img = $request->input('hinh');

        if ($img != null) {
            $pro = DB::table('product')
                ->where('id', $id)
                ->update(['Pname' => $name, 'price' => $price, 'cateid' => $cate]);


        } else {
            DB::table('product')
                ->where('id', $id)
                ->update(['Pname' => $name, 'price' => $price, 'cateid' => $cate]);
            $exists = BranchProduct::where('product_id', $id)
                ->where('branch_id', session('user_branch'))->first();

            if ($exists) {
                $exists->qty = $request->input('qty');
                $exists->save();
            } else {

                $branchproduct = new BranchProduct;
                $branchproduct->qty = $request->input('qty');
                $branchproduct->branch_id = session('user_branch');
                $branchproduct->product_id = $id;
                $branchproduct->save();
            }
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
        $product->nguon = $request->input('nguon');
        $product->des = $request->input('des');
        $product->save();

        $branchproduct = new BranchProduct;
        $branchproduct->qty = $request->input('qty');
        $branchproduct->branch_id = session('user_branch');
        $branchproduct->product_id = $product->id;
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


        $u = DB::table("product")
            ->get();
        $ct = DB::table('ChildCategory')->get();
        return view('product-admin.products', [
            'sanpham' => $u, 'cate' => $ct
        ]);
    }


    public function editcategory($id)
    {
        $ct = DB::table('ChildCategory')
            ->where('id', $id)
            ->first();
        return view('product-admin.edit-category', ['cate' => $ct]);

    }

    public function updatecate(Request $request)
    {
        // dd($_POST);
        $name = $request->input('name');
        $id = $request->input('id');

        DB::table('ChildCategory')
            ->where('id', $id)
            ->update(['nameChild' => $name]);
        return redirect('products');
    }

    public function addcate()
    {
        return view('product-admin.add-cate');
    }
    public function cratecate(Request $request){

        $name =$request->input('name');
        $cate = new Category();
        $cate->nameChild=$name;
        $cate->parentid=1;
        $cate->save();
        return redirect()->route('listproduct')->with('success', 'Tạo thành công ');
    }

    public function showbranchs()
    {
        $branchs = Branchs::all();
        return view('product-admin.createbranch', [
            'branchs' => $branchs
        ]);
    }

    public function destroybranch($id)
    {

        {
            $branch = DB::table('branch_product')
                ->where('branch_id', $id)
                ->count();

            if ($branch <= 0) {
                $deleted = DB::table('Branch')->where('id', '=', $id)->delete();
                return back()->with('success', 'Xoá Thành Công!');

            } else {

                return back()->with('error', 'Chi Nhánh đang được sử dụng!');
            }
        }
    }

    public function createbranch(Request $request)
    {
        $branch = new Branchs;

        $branch->name = $request->input('name');
        $branch->phone = $request->input('phone');
        $branch->address = $request->input('address');
        $branch->email = $request->input('email');
        $branch->longitude = $request->input('long');
        $branch->latitude = $request->input('lat');
        $branch->save();
        return redirect()->route('listbranchs')->with('success', ' Tạo chi nhánh thành công.');
    }


    public function listFav($id)
    {
        $favs = Fav::where('user_id', $id)->get();
        return view('account.fav', [
            'fav' => $favs
        ]);
    }

    public function dellike($id)
    {
        $existingFav = Fav::where('id', $id)
            ->first();

        $existingFav->delete();
        return back();
    }

    public function listbranchs()
    {
        $branchs = Branchs::all();
        return view('branch.list', ['branchs' => $branchs]);
    }

    public function destroy($id)
    {
        $voucher = Branchs::findOrFail($id);
        $voucher->delete();

        return redirect()->route('branch.list')->with('success', 'xoá chi nhánh thành công.');
    }

    public function updatebranch($id, Request $request)
    {
        $branch = Branchs::findOrFail($id);
        $branch->update($request->all());

        return redirect()->route('listbranchs')->with('success', 'Chi nhánh đã cập nhật.');
    }

    public function editbranch(Branchs $branch)
    {

        return view('branch.edit', ['branch' => $branch]);
    }

}
