<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Branchs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
class UserController extends Controller
{


    public function editaccount($id)
    {
        $user = User::find($id);
        return view('product-admin.detail-account', compact('user'));
    }

    public function index()
    {
    $users = User::all();
    return view('product-admin.accounts', [
        'orders'=>$users
    ]);
    }
    public function customer($id)
    {
        // Lấy thông tin của người dùng
        $user = User::find($id);

        $orders  = Orders::where('User_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('account.account', ['user' => $user, 'orders' => $orders]);
    }
    public function editcustomer($id)
    {
        $user = User::find($id);
        return view('account.detail', compact('user'));
    }
    public function updateuser(Request $request){
        $id=$request->input('id');
        if ($request->hasFile('hinh')) {
            $user = User::find($id);
            // Lưu ảnh vào thư mục lưu trữ
            $image = $request->file('hinh');
            $path = $image->store('uploads/img/user', 'public');
            // Tạo bản ghi trong cơ sở dữ liệu
            // $user->name = $image->getClientOriginalName();
            $user->img=$path;
            $user->email = $request->input('email');
            $user->pass = $request->input('pass');
            $user->address = $request->input('address');
            $user->fullname = $request->input('fullname');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->status = $request->input('status');
            $user->access = $request->input('access');
            $user->save();
            }
            else{
                $user = User::find($id);
                $user->email = $request->input('email');
                $user->pass = $request->input('pass');
                $user->address = $request->input('address');
                $user->fullname = $request->input('fullname');
                $user->gender = $request->input('gender');
                $user->phone = $request->input('phone');
                $user->status = $request->input('status');
                $user->access = $request->input('access');
                $user->save();

            }

            return redirect()->back();
    }
    public function detailordercustomer($id){
        $order = Orders::find($id); // Truy xuất thông tin đơn hàng bằng ID đơn hàng
        $orderDetails = OrderDetails::where('order_id', $id)->get(); // Truy xuất chi tiết đơn hàng bằng ID đơn hàng
        return view('account.order', ['order' => $order, 'orderDetails' => $orderDetails]);
    }

    public function delete($id){

    $user = User::find($id);
    $user->delete();
    return redirect()->route('user');
    }
    public function editaccount2($id){

        {   $u =User::find($id)
            ->where('id',$id)
            ->first();
            return view('product-admin.detail-account',['sanpham'=>$u]);

        }
    }
    public function update(Request $request){
        $id=$request->input('id');
        if ($request->hasFile('hinh')) {
            $user = User::find($id);
            // Lưu ảnh vào thư mục lưu trữ
            $image = $request->file('hinh');
            $path = $image->store('uploads/img/user', 'public');
            // Tạo bản ghi trong cơ sở dữ liệu
            // $user->name = $image->getClientOriginalName();
            $user->img=$path;
            $user->email = $request->input('email');
            $user->pass = $request->input('pass');
            $user->address = $request->input('address');
            $user->fullname = $request->input('fullname');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->status = $request->input('status');
            $user->access = $request->input('access');
            $user->save();
            }
            else{
                $user = User::find($id);
                $user->email = $request->input('email');
                $user->pass = $request->input('pass');
                $user->address = $request->input('address');
                $user->fullname = $request->input('fullname');
                $user->gender = $request->input('gender');
                $user->phone = $request->input('phone');
                $user->status = $request->input('status');
                $user->access = $request->input('access');
                $user->save();

            }

       return redirect('accounts');
    }

    function addaccount(){
        $ct=DB::table('ChildCategory')->get();
        $branchs=Branchs::all();
        return view('product-admin.add-account',[
            'cate'=>$ct,
            'branchs'=>$branchs
        ]);
    }

    public function add(Request $request){
        // dd($_POST);

        if ($request->hasFile('hinh')) {
            // Lưu ảnh vào thư mục lưu trữ
            $image = $request->file('hinh');
            $path = $image->store('uploads/img/user', 'public');
            // Tạo bản ghi trong cơ sở dữ liệu
            $user = new User();
            // $user->name = $image->getClientOriginalName();
            $user->img=$path;
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->pass = $request->input('pass');
            $user->address = $request->input('address');
            $user->fullname = $request->input('fullname');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->status = $request->input('status');
            $user->access = $request->input('status');
            $user->branch_id = $request->input('branch');
            $user->role = 1;

            $user->save();
            }

            return redirect('accounts');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $users =  User::where('fullname', 'like', '%' . $query . '%')->get();
        return view('product-admin.accounts', compact('users'));
    }

    public function showLoginForm()
    {
        return view('product-admin.login');
    }
    public function login(Request $request)
    {

        $username=$request->input('username');
        $pass=$request->input('pass');
        $user2 = User::where('username', $username)->first();

        // $credentials = $request->only('username', 'pass');
        $user = DB::select('SELECT * FROM users WHERE username = ? AND pass = ?', [$username, $pass]);
        if ($user) {
        // ID tồn tại
        if ($user2->status == 0) {
            // Tài khoản bị khóa (status = 1)
            return redirect('/home/login')->with('error', 'Tài khoản của bạn đã bị khóa.');
        }


        $request->session()->put('username',$username);
        // session(['nameuser' => $user->fullname]);
        session(['user_address' => $user[0]->address]); // Lấy địa chỉ từ kết quả truy vấn
        session(['user_phone' => $user[0]->phone]); // Lấy địa chỉ từ kết quả truy vấn
        session(['fullname' => $user[0]->fullname]); // Lấy địa chỉ từ kết quả truy vấn
        session(['user_id' => $user[0]->id]); // Lấy địa chỉ từ kết quả truy vấn
        session(['user_role' => $user[0]->role]);
        session(['user_branch' => $user[0]->branch_id]);
        return redirect()->intended('/trangchu');
        // Điều hướng sau khi đăng nhập thành công\
        } else {
        // ID không tồn tại
        return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');
        }
    }
    public function logout(Request $request)
    {
    // Auth::logout(); // Đăng xuất người dùng
    $request->session()->forget('username'); // Xóa tên người dùng khỏi session
    $request->session()->forget('user_address'); // Xóa tên người dùng khỏi session
    $request->session()->forget('user_phone'); // Xóa tên người dùng khỏi session
    $request->session()->forget('fullname'); // Xóa tên người dùng khỏi session
    $request->session()->forget('user_id'); // Xóa tên người dùng khỏi session

    return redirect('/home/login'); // Chuyển hướng người dùng về trang chính sau khi đăng xuất
    }

    public function useraccount(){
        $order=Orders::All();
        return view('user.user',['order' => $order]);
    }
    public function detailorder($id){
        $order = Orders::find($id); // Truy xuất thông tin đơn hàng bằng ID đơn hàng
        $orderDetails = OrderDetails::where('order_id', $id)->get(); // Truy xuất chi tiết đơn hàng bằng ID đơn hàng
        return view('user.order', ['order' => $order, 'orderDetails' => $orderDetails]);
    }
    public function register(){
        return view('home.register');
    }
    public function registerform(Request $request){

        $username = $request->input('username');
        $phone = $request->input('phone');

        // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
        $existingUser = User::where('username', $username)->first();
        $existingPhone = User::where('phone', $phone)->first();

        if ($existingUser) {
            // Nếu tên người dùng đã tồn tại, thông báo lỗi và thực hiện xử lý tương ứng
            return redirect('/register')->with('error', 'Tên người dùng đã tồn tại');
        }

        if ($existingPhone) {
            // Nếu tên người dùng đã tồn tại, thông báo lỗi và thực hiện xử lý tương ứng
            return redirect('/register')->with('error', 'Số điện thoại đã tồn tại');
        }
            $user = new User();
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->phone = $request->input('phone');
            $user->pass=$request->input('pass');
            $user->status=1;
            $user->role=0;
            $user->save();
            return redirect('/register')->with('success', 'Đăng ký thành công');

    }

}
